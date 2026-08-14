import json, os, re, shutil, sys, math
from pathlib import Path

try:
    import cv2
    import numpy as np
    import pytesseract
    from pytesseract import Output
except Exception as exc:
    print(json.dumps({"ok": False, "error": f"Dependência do OCR ausente: {exc}"}, ensure_ascii=False))
    raise SystemExit(2)

DIGITS = re.compile(r'\d+')


def configure_tesseract():
    explicit = os.environ.get('TESSERACT_CMD')
    candidates = [explicit] if explicit else []
    if os.name == 'nt':
        candidates += [
            r'C:\\Program Files\\Tesseract-OCR\\tesseract.exe',
            r'C:\\Program Files (x86)\\Tesseract-OCR\\tesseract.exe',
        ]
    found = shutil.which('tesseract')
    if found:
        candidates.append(found)
    for item in candidates:
        if item and Path(item).exists():
            pytesseract.pytesseract.tesseract_cmd = str(item)
            return str(item)
    return pytesseract.pytesseract.tesseract_cmd


def read_image(path):
    # IMREAD_COLOR keeps processing predictable. OpenCV 4.x honors EXIF orientation by default.
    image = cv2.imread(str(path), cv2.IMREAD_COLOR)
    if image is None:
        raise RuntimeError('Não foi possível abrir a imagem.')
    return image


def safe_resize(image, target_width=None, scale=None):
    h, w = image.shape[:2]
    if target_width:
        scale = target_width / max(1, w)
    if not scale or abs(scale - 1.0) < 0.03:
        return image
    nw, nh = max(1, int(w * scale)), max(1, int(h * scale))
    interp = cv2.INTER_CUBIC if scale > 1 else cv2.INTER_AREA
    return cv2.resize(image, (nw, nh), interpolation=interp)


def prep_variants(image):
    gray = cv2.cvtColor(image, cv2.COLOR_BGR2GRAY)
    # Denoise lightly, then boost local contrast. Avoid strong blur: bib digits are often already soft.
    denoise = cv2.bilateralFilter(gray, 5, 35, 35)
    clahe = cv2.createCLAHE(clipLimit=2.5, tileGridSize=(8, 8)).apply(denoise)
    sharp = cv2.addWeighted(clahe, 1.7, cv2.GaussianBlur(clahe, (0, 0), 1.2), -0.7, 0)
    _, otsu = cv2.threshold(sharp, 0, 255, cv2.THRESH_BINARY + cv2.THRESH_OTSU)
    adaptive = cv2.adaptiveThreshold(
        sharp, 255, cv2.ADAPTIVE_THRESH_GAUSSIAN_C,
        cv2.THRESH_BINARY, 41, 9
    )
    inv = cv2.bitwise_not(otsu)
    return [('sharp', sharp), ('otsu', otsu)]


def normalize_digits(text):
    # With the whitelist Tesseract should emit digits, but normalization is kept defensive.
    digits = ''.join(DIGITS.findall(text or ''))
    return digits if 1 <= len(digits) <= 6 else ''


def add_candidate(best, number, confidence, box, source, variant, psm):
    if not number or len(number) > 6:
        return
    confidence = float(max(0, min(100, confidence)))
    x, y, w, h = [int(v) for v in box]
    candidate = {
        'number': number,
        'confidence': round(confidence, 1),
        'x': x, 'y': y, 'w': w, 'h': h,
        'source': source,
        'variant': variant,
        'psm': psm,
    }
    old = best.get(number)
    if old is None or confidence > old['confidence']:
        best[number] = candidate


def ocr_data(img, offset, ratio_back, source, variant, psm, best):
    cfg = f'--oem 3 --psm {psm} -c tessedit_char_whitelist=0123456789 -c classify_bln_numeric_mode=1'
    data = pytesseract.image_to_data(img, output_type=Output.DICT, config=cfg)
    ox, oy = offset
    tokens_by_line = {}
    n = len(data.get('text', []))
    for idx in range(n):
        raw = data['text'][idx] or ''
        number = normalize_digits(raw)
        try:
            conf = float(data['conf'][idx])
        except Exception:
            conf = -1
        left, top = int(data['left'][idx]), int(data['top'][idx])
        width, height = int(data['width'][idx]), int(data['height'][idx])
        if number and conf >= 0:
            bx = ox + int(left * ratio_back)
            by = oy + int(top * ratio_back)
            bw = max(1, int(width * ratio_back))
            bh = max(1, int(height * ratio_back))
            # Keep even low-confidence reads for review. Tiny 1-digit detections need a little confidence.
            if len(number) > 1 or conf >= 25:
                add_candidate(best, number, conf, (bx, by, bw, bh), source, variant, psm)

        # Tesseract sometimes splits a bib into individual digit tokens. Group nearby tokens on a line.
        if number:
            key = (data.get('block_num', [0]*n)[idx], data.get('par_num', [0]*n)[idx], data.get('line_num', [0]*n)[idx])
            tokens_by_line.setdefault(key, []).append((left, top, width, height, number, max(0, conf)))

    for tokens in tokens_by_line.values():
        tokens.sort(key=lambda z: z[0])
        group = []
        for tok in tokens:
            if not group:
                group = [tok]
                continue
            prev = group[-1]
            gap = tok[0] - (prev[0] + prev[2])
            height_ref = max(prev[3], tok[3], 1)
            # Digits on the same bib can have moderate spacing.
            if gap <= height_ref * 1.35:
                group.append(tok)
            else:
                maybe_add_group(group, offset, ratio_back, source, variant, psm, best)
                group = [tok]
        maybe_add_group(group, offset, ratio_back, source, variant, psm, best)


def maybe_add_group(group, offset, ratio_back, source, variant, psm, best):
    if len(group) < 2:
        return
    number = ''.join(x[4] for x in group)
    if not (2 <= len(number) <= 6):
        return
    x1 = min(x[0] for x in group); y1 = min(x[1] for x in group)
    x2 = max(x[0] + x[2] for x in group); y2 = max(x[1] + x[3] for x in group)
    confs = [x[5] for x in group]
    conf = sum(confs) / max(1, len(confs))
    ox, oy = offset
    add_candidate(
        best, number, conf,
        (ox + int(x1 * ratio_back), oy + int(y1 * ratio_back),
         max(1, int((x2-x1)*ratio_back)), max(1, int((y2-y1)*ratio_back))),
        source + '-grouped', variant, psm
    )


def scan_region(region, offset, source, best, target_width=1800, psms=(11, 12)):
    h, w = region.shape[:2]
    # Upscale small regions aggressively; bib numbers often occupy only tens of pixels in the original.
    desired = max(w, min(target_width, w * 3)) if w < target_width else w
    scaled = safe_resize(region, target_width=desired)
    ratio_back = w / max(1, scaled.shape[1])
    variants = prep_variants(scaled)
    # Local crops behave better as a small text block/line than as sparse-page text.
    local_variants = variants[:1]
    for variant_name, variant in local_variants:
        for psm in psms:
            ocr_data(variant, offset, ratio_back, source, variant_name, psm, best)


def tile_regions(image):
    h, w = image.shape[:2]
    regions = []
    # 2x2 overlapping tiles and a 3-column middle-body band. This captures bibs without shrinking the full image.
    for rows, cols, overlap in [(2, 2, 0.12)]:
        tile_w, tile_h = w / cols, h / rows
        for r in range(rows):
            for c in range(cols):
                x1 = max(0, int(c * tile_w - overlap * tile_w))
                y1 = max(0, int(r * tile_h - overlap * tile_h))
                x2 = min(w, int((c + 1) * tile_w + overlap * tile_w))
                y2 = min(h, int((r + 1) * tile_h + overlap * tile_h))
                if x2-x1 >= 120 and y2-y1 >= 120:
                    regions.append((x1, y1, x2, y2, f'tile-{rows}x{cols}-{r}-{c}'))
    # Center-biased region: most race photographs place the athlete around the middle.
    x1, x2 = int(w*0.15), int(w*0.85)
    y1, y2 = int(h*0.12), int(h*0.88)
    if x2 > x1 and y2 > y1:
        regions.append((x1, y1, x2, y2, 'center'))
    return regions


def collect(image):
    h, w = image.shape[:2]
    best = {}

    # Full-frame pass: do NOT crush a 6000px sports photo down to 2200px.
    # Cap only truly huge images to control memory, preserving substantially more detail.
    full = image
    if w > 5000:
        full = safe_resize(image, target_width=5000)
    full_ratio = w / full.shape[1]
    for variant_name, variant in prep_variants(full):
        ocr_data(variant, (0, 0), full_ratio, 'full', variant_name, 11, best)

    # Local passes: crop first, then upscale. This is the biggest improvement for small bibs.
    for x1, y1, x2, y2, name in tile_regions(image):
        region = image[y1:y2, x1:x2]
        scan_region(region, (x1, y1), name, best, target_width=1900, psms=(6, 7))

    values = list(best.values())
    # Score: confidence first, but favor normal bib lengths and larger detected glyph boxes.
    for c in values:
        length_bonus = 8 if 2 <= len(c['number']) <= 5 else 0
        area = max(1, c['w'] * c['h'])
        area_bonus = min(10, math.log10(area + 1) * 1.8)
        c['_score'] = c['confidence'] + length_bonus + area_bonus
    values.sort(key=lambda c: (-c['_score'], -len(c['number'])))

    # Remove partial duplicate reads such as 847 when the same box already produced 1847.
    filtered = []
    def overlap_ratio(a, b):
        ax1, ay1, ax2, ay2 = a['x'], a['y'], a['x']+a['w'], a['y']+a['h']
        bx1, by1, bx2, by2 = b['x'], b['y'], b['x']+b['w'], b['y']+b['h']
        ix1, iy1, ix2, iy2 = max(ax1,bx1), max(ay1,by1), min(ax2,bx2), min(ay2,by2)
        inter = max(0, ix2-ix1) * max(0, iy2-iy1)
        smaller = max(1, min(a['w']*a['h'], b['w']*b['h']))
        return inter / smaller
    for c in values:
        duplicate = False
        for kept in filtered:
            if overlap_ratio(c, kept) >= 0.55 and (c['number'] in kept['number'] or kept['number'] in c['number']):
                duplicate = True
                break
        if not duplicate:
            filtered.append(c)

    for c in filtered:
        c.pop('_score', None)
    return filtered[:15]


def main():
    if len(sys.argv) < 2:
        raise RuntimeError('Caminho da imagem não informado.')
    path = Path(sys.argv[1])
    if not path.exists():
        raise RuntimeError('Arquivo da imagem não encontrado.')
    tesseract = configure_tesseract()
    image = read_image(path)
    candidates = collect(image)
    # Suggestions are conservative. Lower-confidence candidates remain visible for manual review.
    # Prefer local crop detections over full-frame numbers (years/signage are common false positives).
    strong_local = [c for c in candidates if c['confidence'] >= 45 and len(c['number']) >= 2 and c.get('source') != 'full']
    pool = strong_local if strong_local else [c for c in candidates if c['confidence'] >= 45 and len(c['number']) >= 2]
    suggested = list(dict.fromkeys(c['number'] for c in pool))[:4]
    h, w = image.shape[:2]
    print(json.dumps({
        'ok': True,
        'engine': 'Tesseract + OpenCV multi-scale',
        'tesseract': tesseract,
        'image': {'width': w, 'height': h},
        'candidates': candidates,
        'suggested': suggested,
        'diagnostics': {
            'candidate_count': len(candidates),
            'message': 'OCR multi-escala: imagem completa + recortes ampliados.'
        }
    }, ensure_ascii=False))

if __name__ == '__main__':
    try:
        main()
    except Exception as exc:
        print(json.dumps({'ok': False, 'error': str(exc)}, ensure_ascii=False))
        raise SystemExit(1)

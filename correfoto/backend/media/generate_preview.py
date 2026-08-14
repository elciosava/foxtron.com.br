import json, os, sys
from PIL import Image, ImageDraw, ImageFont, ImageOps

MAX_SIDE = 1400
QUALITY = 84


def font(size):
    candidates = [
        r'C:\\Windows\\Fonts\\arialbd.ttf',
        r'C:\\Windows\\Fonts\\arial.ttf',
        '/usr/share/fonts/truetype/dejavu/DejaVuSans-Bold.ttf',
        '/usr/share/fonts/truetype/dejavu/DejaVuSans.ttf',
    ]
    for p in candidates:
        if os.path.isfile(p):
            try:
                return ImageFont.truetype(p, size=size)
            except Exception:
                pass
    return ImageFont.load_default()


def make_watermark(base):
    w, h = base.size
    overlay = Image.new('RGBA', (w, h), (0, 0, 0, 0))
    text = 'CORREFOTO  •  PRÉVIA'
    fs = max(24, int(min(w, h) * 0.045))
    fnt = font(fs)

    # cria um selo rotacionado e repete pela imagem inteira
    bbox = ImageDraw.Draw(Image.new('RGBA', (10, 10))).textbbox((0, 0), text, font=fnt, stroke_width=2)
    tw = max(1, bbox[2] - bbox[0])
    th = max(1, bbox[3] - bbox[1])
    tile = Image.new('RGBA', (tw + 60, th + 60), (0, 0, 0, 0))
    td = ImageDraw.Draw(tile)
    td.text((30, 30), text, font=fnt, fill=(255, 255, 255, 95), stroke_width=2, stroke_fill=(0, 0, 0, 70))
    tile = tile.rotate(28, expand=True, resample=Image.Resampling.BICUBIC)

    step_x = max(240, tile.width + 70)
    step_y = max(180, tile.height + 45)
    for y in range(-tile.height, h + tile.height, step_y):
        offset = 0 if ((y // step_y) % 2 == 0) else step_x // 2
        for x in range(-tile.width, w + tile.width, step_x):
            overlay.alpha_composite(tile, (x + offset, y))

    # selo inferior reforçando que é prévia
    d = ImageDraw.Draw(overlay)
    strip_h = max(42, int(h * 0.055))
    d.rectangle((0, h - strip_h, w, h), fill=(0, 0, 0, 100))
    bottom_font = font(max(18, int(strip_h * 0.42)))
    bottom = 'PRÉVIA COM MARCA D’ÁGUA • ORIGINAL LIBERADO APÓS A COMPRA'
    bb = d.textbbox((0, 0), bottom, font=bottom_font)
    bx = max(12, (w - (bb[2] - bb[0])) // 2)
    by = h - strip_h + max(5, (strip_h - (bb[3] - bb[1])) // 2)
    d.text((bx, by), bottom, font=bottom_font, fill=(255, 255, 255, 220))

    return Image.alpha_composite(base.convert('RGBA'), overlay).convert('RGB')


def main():
    if len(sys.argv) != 3:
        print(json.dumps({'ok': False, 'error': 'Uso: generate_preview.py ORIGINAL PREVIEW'}, ensure_ascii=False))
        return 2

    src, dst = sys.argv[1], sys.argv[2]
    try:
        with Image.open(src) as im:
            im = ImageOps.exif_transpose(im)
            if im.mode not in ('RGB', 'RGBA'):
                im = im.convert('RGB')
            im.thumbnail((MAX_SIDE, MAX_SIDE), Image.Resampling.LANCZOS)
            out = make_watermark(im)
            os.makedirs(os.path.dirname(dst), exist_ok=True)
            out.save(dst, 'WEBP', quality=QUALITY, method=6)
            print(json.dumps({'ok': True, 'width': out.width, 'height': out.height, 'preview': dst}, ensure_ascii=False))
            return 0
    except Exception as e:
        print(json.dumps({'ok': False, 'error': str(e)}, ensure_ascii=False))
        return 1

if __name__ == '__main__':
    raise SystemExit(main())

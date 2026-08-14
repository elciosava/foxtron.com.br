import sys, json
import cv2
import numpy as np

PALETTE = [
    "preto","branco","cinza","vermelho","azul","verde",
    "amarelo","laranja","roxo","rosa","marrom","multicolor","outro"
]

def load_image(path):
    try:
        data = np.fromfile(path, dtype=np.uint8)
        if data.size == 0:
            return None
        return cv2.imdecode(data, cv2.IMREAD_COLOR)
    except Exception:
        return None

def classify_pixels(bgr):
    hsv = cv2.cvtColor(bgr, cv2.COLOR_BGR2HSV)
    h = hsv[:,:,0].astype(np.int16)
    s = hsv[:,:,1].astype(np.int16)
    v = hsv[:,:,2].astype(np.int16)

    # Ignora pixels quase sem informação.
    valid = (v > 22)
    total = int(valid.sum())
    if total < 100:
        return {"outro": 1.0}

    masks = {}
    masks["preto"] = valid & (v < 65)
    masks["branco"] = valid & (v >= 185) & (s < 38)
    masks["cinza"] = valid & (v >= 65) & (v < 185) & (s < 42)

    colorful = valid & (s >= 42) & (v >= 55)
    masks["vermelho"] = colorful & ((h <= 8) | (h >= 172))
    masks["laranja"] = colorful & (h >= 9) & (h <= 20)
    masks["amarelo"] = colorful & (h >= 21) & (h <= 36)
    masks["verde"] = colorful & (h >= 37) & (h <= 88)
    masks["azul"] = colorful & (h >= 89) & (h <= 132)
    masks["roxo"] = colorful & (h >= 133) & (h <= 158)
    masks["rosa"] = colorful & (h >= 159) & (h <= 171)

    # Marrom: laranja/vermelho escuro.
    masks["marrom"] = valid & (s >= 45) & (v >= 45) & (v < 150) & (h >= 5) & (h <= 24)

    # Evita dupla contagem do marrom como laranja/vermelho.
    masks["laranja"] &= ~masks["marrom"]
    masks["vermelho"] &= ~masks["marrom"]

    counts = {k:int(m.sum()) for k,m in masks.items()}
    denom = max(1, sum(counts.values()))
    return {k:c/denom for k,c in counts.items()}

def roi_candidates(img):
    h,w = img.shape[:2]
    # Regiões de tronco para uma foto esportiva típica:
    # principal central + duas variações mais largas.
    boxes = [
        (0.32,0.28,0.68,0.58),
        (0.25,0.30,0.75,0.62),
        (0.36,0.32,0.64,0.64),
    ]
    rois=[]
    for x1,y1,x2,y2 in boxes:
        xa,xb=int(w*x1),int(w*x2)
        ya,yb=int(h*y1),int(h*y2)
        crop=img[ya:yb,xa:xb]
        if crop.size:
            rois.append(crop)
    return rois

def analyze(path):
    img=load_image(path)
    if img is None:
        return {"ok":False,"error":"Não foi possível abrir a imagem."}

    # Limita custo para fotos muito grandes.
    h,w=img.shape[:2]
    max_side=max(h,w)
    if max_side>1800:
        scale=1800/max_side
        img=cv2.resize(img,(int(w*scale),int(h*scale)),interpolation=cv2.INTER_AREA)

    scores={}
    for idx,roi in enumerate(roi_candidates(img)):
        # Peso maior para o recorte principal.
        weight=[1.0,0.65,0.55][idx]
        parts=classify_pixels(roi)
        for color,ratio in parts.items():
            scores[color]=scores.get(color,0.0)+ratio*weight

    if not scores:
        return {"ok":True,"color":"outro","confidence":0.0}

    ordered=sorted(scores.items(),key=lambda kv:kv[1],reverse=True)
    best,best_score=ordered[0]
    second_score=ordered[1][1] if len(ordered)>1 else 0.0
    total=sum(scores.values()) or 1.0
    confidence=best_score/total
    second=second_score/total

    # Duas cores muito equilibradas: marca como multicolor.
    if confidence < 0.34 and second > 0.22:
        color="multicolor"
    elif confidence < 0.24:
        color="outro"
    else:
        color=best

    return {
        "ok":True,
        "color":color,
        "confidence":round(float(confidence*100),1),
        "scores":{k:round(float(v/total*100),1) for k,v in ordered[:5]}
    }

if __name__=="__main__":
    if len(sys.argv)<2:
        print(json.dumps({"ok":False,"error":"Informe a imagem."},ensure_ascii=False))
        sys.exit(1)
    result=analyze(sys.argv[1])
    print(json.dumps(result,ensure_ascii=False))

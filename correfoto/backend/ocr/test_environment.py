import sys

print("Python:", sys.executable)
print("Versao:", sys.version)

try:
    import cv2
    print("cv2 OK:", cv2.__version__)
except Exception as e:
    print("cv2 ERRO:", repr(e))

try:
    import pytesseract
    print("pytesseract OK")
    print("Tesseract:", pytesseract.get_tesseract_version())
except Exception as e:
    print("pytesseract/Tesseract ERRO:", repr(e))

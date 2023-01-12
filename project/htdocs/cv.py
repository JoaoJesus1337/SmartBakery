import cv2 as cv
import sys
import os

camera = cv.VideoCapture(0)
delay = 5000

def gravarficheiro():
	pasta = os.listdir("imagens/")
	numero = len(pasta)
	cv.imwrite('imagens/webcam' + str(numero + 1) + '.jpg', image)
	
try:
	print("Prima CTRL+C para terminar")
	while True:
		print("A capturar a imagem")
		ret, image = camera.read()
		gravarficheiro()
		cv.waitKey(delay)


except KeyboardInterrupt:
	print("Programa terminado pelo utilizador!")

except:
	print("Ocorreu um erro", sys.exc_info())

finally:
	print("Fim do Programa")
	camera.release()
	cv.destroyAllWindows()
       
import mysql.connector
from datetime import date

#import sqlite3
#import pandas as pd
from exames import *
import cv2

from mahotas import gaussian_filter
import os

mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  password="",
  database="bd_adhans"
)

def get_fotos_by_exame(id_exame):
  mycursor = mydb.cursor()

  # A query abaixo faz o JOIN entre as tabelas fotos e exames,
  # onde fotos.id é igual ao id_foto1 ou id_foto2 de exames.
  sql = """
      SELECT exames.id,fotos.*
      FROM fotos
      INNER JOIN exames ON fotos.id = exames.id_foto1 OR fotos.id = exames.id_foto2
      WHERE exames.id = %s
  """
  
  # Executando a consulta com o parâmetro id_exame
  mycursor.execute(sql, (id_exame,))
  
  # Obtendo o resultado
  myresult = mycursor.fetchall()
  
  return myresult

def get_coordenadas(exame):
  coordenadas=[]
  coordenadas.append(exame[3])
  coordenadas.append(exame[4])
  coordenadas.append(exame[5])
  coordenadas.append(exame[6])
  coordenadas.append(exame[7])
  coordenadas.append(exame[8])
  dimensao = exame[10]
  return [coordenadas,dimensao]
  
def cria_objetos(id):
  resultados = get_fotos_by_exame(id)
  coord,dimen = get_coordenadas(resultados[0])    
  
  # Criando o objeto corretamente
  foto1 = Exame(resultados[0][0],resultados[0][1], coord, resultados[0][2], resultados[0][9], dimen)
  foto2 = Exame(resultados[1][0],resultados[1][1], coord, resultados[1][2], resultados[1][9], dimen) 
  
  return [foto1,foto2]


#pegar as fotos, coordenadas e dimensões no bd - [id, coordenadas, local, tempo, dimensao]
foto1,foto2=cria_objetos(1)#cria objeto com todos os dados que preciso
print(foto1.id_foto)
print(foto2.id_foto)
print(foto1)
    
#imagem = cv2.imread(foto1.local)
#altura, largura = imagem.shape[:2]
#dimensao = f"{altura};{largura}"
#print(cv2.__version__)

caminho_absoluto = os.path.abspath(foto1.local)  # Converte para caminho absoluto
print("caminho absoluto:")
print(caminho_absoluto)

caminho = "C:/wamp64/www"+foto1.local
caminho2 = "C:/wamp64/www"+foto2.local

img = cv2.imread(caminho)
img2 = cv2.imread(caminho2)

dimensao = str(img.shape[1])+";"+str(img.shape[0])
dimensao2 = str(img2.shape[1])+";"+str(img2.shape[0])
#if img is not None:
#    cv2.waitKey(1)  # Pequeno delay antes de exibir a janela
#    cv2.imshow('Imagem', img)
#    cv2.waitKey(0)
#    cv2.destroyAllWindows()
#else:
#    print("Erro: Imagem não carregada!")

print("Dimensao registrada")
print(foto1.dimensao)
print("coordenadas registradas")
print(foto1.coordenadas)
print("Dimensao do arquivo 1")
print(dimensao)




#print(dimensao2)
#cv2.waitKey(0)
#cv2.destroyAllWindows()
#print(caminho)



#converter as coordenadas com as dimensões
def corrigir_coordenadas(dimensao_antiga, dimensao_nova, coordenadas, lado):
    largura_antiga, altura_antiga = map(int, dimensao_antiga.split(";"))
    largura_nova, altura_nova = map(int, dimensao_nova.split(";"))
    
    fator_largura = largura_nova / largura_antiga
    fator_altura = altura_nova / altura_antiga
    
    coordenadas_corrigidas = []
    for coord in coordenadas:
        x, y = map(int, coord.split(";"))
        novo_x = round(x * fator_largura)
        novo_y = round(y * fator_altura)
        coordenadas_corrigidas.append(f"{novo_x};{novo_y}")
    
    # Corrigir o lado do quadrado (média dos fatores de escala)
    fator_escala = (fator_largura + fator_altura) / 2
    novo_lado = round(lado * fator_escala)

    return coordenadas_corrigidas, novo_lado


def desenha(caminho,coordenadas, lado):
  

  # Carregar a imagem
  img = cv2.imread(caminho)

  # Verificar se a imagem foi carregada corretamente
  if img is None:
      print("Erro: Imagem não encontrada!")
  else:
      # Converter coordenadas para inteiros e desenhar quadrados
      for coord in coordenadas:
          x, y = map(int, coord.split(';'))
          cv2.rectangle(img, (x, y), (x + lado, y + lado), (0, 0, 255), 2)  # Quadrado vermelho

      # Exibir a imagem com os quadrados desenhados
      cv2.imshow("Imagem com Quadrados", img)
      cv2.waitKey(0)
      cv2.destroyAllWindows()

print("coordenadas calculadas")
nova_coo,novo_lado = corrigir_coordenadas(foto1.dimensao,dimensao,foto1.coordenadas,10)
print(nova_coo)
print(novo_lado)
desenha(caminho,nova_coo, novo_lado)
#pegar o valor de pixel mais comun naquelas coordenadas
#tacar na tabela - pixel_comum

#fazer a formula |dentro - fora|
#fazer a formula |antes - depois|



#filtros F1 e F2
#F1 - em |dentro - fora| na foto 1 para a exclusão do grupo V -> S<40
#F2 - em |antes - depois| para a seleção do grupo H -> R >= 10


#probabilidade de acerto do sistema
#salvar na tabela exames - probabilidade / diagnostico_sistema

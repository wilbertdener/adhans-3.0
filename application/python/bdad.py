       
import mysql.connector
from datetime import date

import sqlite3
import pandas as pd
from exames import *
import cv2
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
    
#imagem = cv2.imread(foto1.local)
#altura, largura = imagem.shape[:2]
#dimensao = f"{altura};{largura}"


caminho_absoluto = os.path.abspath(foto1.local)  # Converte para caminho absoluto
print(caminho_absoluto)
caminho = "http://192.168.137.1"+foto1.local
print(caminho)

if os.path.exists(caminho):
    print("O arquivo existe!")
else:
    print("Erro: Arquivo não encontrado! Verifique o caminho.")




#converter as coordenadas com as dimensões
def corrigir_coordenadas(dimensao_antiga, dimensao_nova, coordenadas):
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
    
    return coordenadas_corrigidas

#pegar o valor de pixel mais comun naquelas coordenadas
#tacar na tabela - pixel_comum

#fazer a formula |dentro - fora|
#fazer a formula |antes - depois|



#filtros F1 e F2
#F1 - em |dentro - fora| na foto 1 para a exclusão do grupo V -> S<40
#F2 - em |antes - depois| para a seleção do grupo H -> R >= 10


#probabilidade de acerto do sistema
#salvar na tabela exames - probabilidade / diagnostico_sistema

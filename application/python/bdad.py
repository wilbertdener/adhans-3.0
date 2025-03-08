       
import mysql.connector
from datetime import date

#import sqlite3
#import pandas as pd
from exames import *
import cv2

from mahotas import gaussian_filter
import os
from collections import Counter

mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  password="",
  database="bd_adhans"
)

def get_prob():
  mycursor = mydb.cursor()
  sql = """  
  SELECT 
      COUNT(*) AS total_exames,
      SUM(CASE WHEN diagnostico = 1 THEN 1 ELSE 0 END) AS total_diagnostico,
      SUM(CASE WHEN diagnostico_sistema = 1 AND diagnostico = 1 THEN 1 ELSE 0 END) AS total_diagnostico_sistema,  -- Aqui foi a mudança
      SUM(CASE WHEN diagnostico = diagnostico_sistema THEN 1 ELSE 0 END) AS total_acertos
  FROM exames
  WHERE diagnostico IS NOT NULL AND diagnostico_sistema IS NOT NULL;
  """
  mycursor.execute(sql)
  myresult = mycursor.fetchone()  # Retorna (total_exames, total_diagnostico, total_diagnostico_sistema, total_acertos)

  # Convertendo valores Decimal para inteiro
  return tuple(int(x) for x in myresult)



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

#apenas para vizualizar, apagar depois
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

def atualizar_diagnostico_sistema( exame_id, valor):
  mycursor = mydb.cursor()
  sql = "UPDATE exames SET diagnostico_sistema = %s WHERE id = %s"
  val = (valor,exame_id,)
  
  mycursor.execute(sql, val)
  mydb.commit()  # Confirma a atualização no banco



def coleta_canais(img, cood,lado):
  #hsv1 = cv2.cvtColor(roi1, cv2.COLOR_BGR2HSV)
  #hsv2 = cv2.cvtColor(roi2, cv2.COLOR_BGR2HSV)
  #hsv3 = cv2.cvtColor(roi3, cv2.COLOR_BGR2HSV)
  imgfinal=[]
  imgcut = img.copy()
  for i in range(len(cood)):
        
    x, y = map(int, cood[i].split(";"))

    x1 = int( x - (lado/2))
    x2 = int( x + (lado/2))
    y1 =int( y - (lado/2))
    y2 = int( y + (lado/2))
    
    imgfinal.append(imgcut[y1:y2, x1:x2])
    
  
  canalR1=[]
  canalS1=[]
  canalR2=[]
  canalS2=[]
  n=0
  for roi in imgfinal:
    
    for x in range(roi.shape[0]):
      for y in range(roi.shape[0]):
        if(n<3):# Vai de 0 até x-1
          
          canalR1.append(roi[x][y][2])
          
          
          hsv = cv2.cvtColor(roi, cv2.COLOR_BGR2HSV)
          canalS1.append(hsv[x][y][1])
          
        else:
          
          canalR2.append(roi[x][y][2])
          
          
          hsv = cv2.cvtColor(roi, cv2.COLOR_BGR2HSV)
          canalS2.append(hsv[x][y][1])
             
        
    n=n+1
  
  canalR1_comum = Counter(canalR1).most_common(1)[0][0]
  canalR2_comum = Counter(canalR2).most_common(1)[0][0]

  canalS1_comum = Counter(canalS1).most_common(1)[0][0]
  canalS2_comum = Counter(canalS2).most_common(1)[0][0]
  #canalRD2, canalHD2,canalRF2, canalHF2
  return canalR1_comum,canalS1_comum,canalR2_comum,canalS2_comum
      
#print(coleta_canais(roidentro1[0]))     
#depois.append(convertponto(pasta+"/" + nome, v))




#pegar o valor de pixel mais comun naquelas coordenadas
#tacar na tabela - pixel_comum




#probabilidade de acerto do sistema
#salvar na tabela exames - probabilidade / diagnostico_sistema

def main(id):
  #pegar as fotos, coordenadas e dimensões no bd - [id, coordenadas, local, tempo, dimensao]
  foto1,foto2=cria_objetos(id)#cria objeto com todos os dados que preciso

  #iniciando algumas variaveis
  #caminho_absoluto = os.path.abspath(foto1.local)  # Converte para caminho absoluto
  #print("caminho absoluto:")
  #print(caminho_absoluto)
  
  caminho = "C:/wamp64/www"+foto1.local
  img1 = cv2.imread(caminho)
  dimensao1 = str(img1.shape[1])+";"+str(img1.shape[0])
  nova_coo1,novo_lado1 = corrigir_coordenadas(foto1.dimensao,dimensao1,foto1.coordenadas,10)
  canalRD1, canalSD1,canalRF1, canalSF1 = coleta_canais(img1, nova_coo1,novo_lado1)
  


  caminho2 = "C:/wamp64/www"+foto2.local
  img2 = cv2.imread(caminho2)
  dimensao2 = str(img2.shape[1])+";"+str(img2.shape[0])
  nova_coo2,novo_lado2 = corrigir_coordenadas(foto2.dimensao,dimensao2,foto2.coordenadas,10)
  
  canalRD2, canalSD2,canalRF2, canalSF2 = coleta_canais(img2, nova_coo2,novo_lado2)
  

  #print(str(imagemffff.shape[1])+";"+str(imagemffff.shape[0]))
  #imgcut2 = img.copy()

  #fazer a formula |dentro - fora|
  F1_R = abs(int(canalRD1) - int(canalRF1))
  F1_S = abs(int(canalSD1) - int(canalSF1))
  
  F2_R = abs(int(canalRD2) - int(canalRF2))
  F2_S = abs(int(canalSD2) - int(canalSF2))
  
  T = abs(int(F1_R)-int(F2_R))
  
  prob = get_prob()
  print(prob)
  total_exames = prob[0]
  diag_pos_med = prob[1]
  diag_pos_sis_med = prob[2]
  total_med_sis = prob[3]
 
  
  if(F1_S<40):
    if(T>=10):
      atualizar_diagnostico_sistema(id, 1)
      print("id: "+str(id)+" recebeu "+str(1)) 
      print("Vermelhidão com diferença relavante, pode ser hanseniase")
      #sistema sim/medico sim
      #(sistema= medico)/ total -acertividade do sistema
      if(diag_pos_med!=0  ):
        print("Probabilidade: "+ str(diag_pos_sis_med/diag_pos_med))
        print("Probabilidade: " + str(round((diag_pos_sis_med / diag_pos_med) * 100, 1)) + "%")
        print("Acertividade: " + str(round((total_med_sis/total_exames)*100,1)) + "%") 
      else:
        print("Positivo med: "+ str(diag_pos_sis_med))
        print("Positivo med: "+ str(diag_pos_med))
        print("Acertividade: " + str(round((total_med_sis/total_exames)*100,1)) + "%")  
     
      
    else:
      atualizar_diagnostico_sistema(id, 0)
      print("id: "+str(id)+" recebeu "+str(0)) 
      print("Vermelhidão sem diferença relavante, a lesão pode não ser hanseniase nem vitigo") 
      #sistema não/medico não
      #(sistema= medico)/ total -acertividade do sistema
      if(diag_pos_med!=0  ):
        print("Probabilidade: " + str(round((1 - (diag_pos_sis_med / diag_pos_med)) * 100, 1)) + "%")
        print("Acertividade: " + str(round((total_med_sis/total_exames)*100,1)) + "%") 
      else:
        print("Positivo med: "+ str(diag_pos_sis_med))
        print("Positivo med: "+ str(diag_pos_med))
        print("Acertividade: " + str(round((total_med_sis/total_exames)*100,1)) + "%") 
  else:
    atualizar_diagnostico_sistema(id, 0)
    print("id: "+str(id)+" recebeu "+str(0)) 
    print("Lesão muito clara, pode não ser hanseniase, talvez vitiligo")  
    if(diag_pos_med!=0):
      print("Probabilidade: " + str(round((1 - (diag_pos_sis_med / diag_pos_med)) * 100, 1)) + "%")
      print("Acertividade: " + str(round((total_med_sis/total_exames)*100,1)) + "%") 
    else:
      print("Positivo med: "+ str(diag_pos_sis_med))
      print("Positivo med: "+ str(diag_pos_med))
      print("Acertividade: " + str(round((total_med_sis/total_exames)*100,1)) + "%")   
  
  
  
  
  
  
  #fazer a formula |antes - depois|



  #filtros F1 e F2
  #F1 - em |dentro - fora| na foto 1 para a exclusão do grupo V -> S<40
  #F2 - em |antes - depois| para a seleção do grupo H -> R >= 10

  #cv2.imshow("Roi H", cv2.cvtColor(roidentro1, cv2.COLOR_BGR2HSV))
  #desenha(caminho,nova_coo, novo_lado)
  #cv2.waitKey(0)
  #cv2.destroyAllWindows()

  
  
main(1)












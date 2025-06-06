import sys
import json

import mysql.connector

from datetime import date
from bdad import *




id_recebido = sys.argv[1] if len(sys.argv) > 1 else "0"

resultado = {
    "titulo": "Diagnóstico gerado com sucesso",
    "Probabilidade": "85%",
    "Acertividade": "92%",
    "id_processado": id_recebido
}

print(json.dumps(resultado))
main(id_recebido)


#print(json.dumps({"erro_python": str(e), "tipo": type(e).__name__}))






























def antigo():
    # sys.argv[0] é o nome do script, então o primeiro argumento real é sys.argv[1]
    if len(sys.argv) > 1:
        id_recebido = sys.argv[1].strip()
        #print(id_recebido)  # Apenas para depuração


    def testar_biblioteca():
        try:
            import cv2
            print("CV importado com sucesso")
        except Exception as e:
            print(f"Erro ao importar cv: {e}")
            sys.exit(1)

    #print("76%")
    #testar_biblioteca()
    id=6
    #result = main(id)

    #print(main(id_recebido))
    #print('oiiiii')
    #print(id_recebido)
    id_recebido = sys.argv[1] if len(sys.argv) > 1 else "Nenhum ID recebido"

    data7 = {
        "titulo": "Lesão muito clara, pode não ser hanseniase, talvez vitiligo", 
        "Probabilidade": "80%", 
        "Acertividade": "90%",
        "id_recebido": id_recebido  # Adicionando o ID recebido para demonstração
    }

    print(json.dumps(data7))

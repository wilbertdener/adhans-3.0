import sys

from datetime import date
from bdad import *

import sys

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

print(main(id_recebido))
#print(id_recebido)

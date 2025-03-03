import sys


def probabilidade(id):
    try:
        # Conectar ao banco de dados
        db = mysql.connector.connect(
            host="localhost",
            user="root",
            password="",
            database="bd_adhans"
        )

        cursor = db.cursor()

        # Consultar a tabela "fotos" com o id
        query = "SELECT * FROM fotos WHERE id = %s"
        cursor.execute(query, (id,))
        result = cursor.fetchone()

        if result:
            return {"resultado": result}
        else:
            return {"erro": "ID não encontrado"}

    except Exception as e:
        return {"erro": str(e)}

# Recuperar o id passado do comando
if len(sys.argv) > 1:
    id = sys.argv[1]
    #result = probabilidade(id)
    print("2%")  # Exibe o resultado para o PHP
else:
    print('Erro: Nenhum ID fornecido.')

class Exame:
    def __init__(self, id,id_foto, coordenadas, local, tempo, dimensao):
        self.id = id
        self.id_foto = id_foto
        self.coordenadas = coordenadas
        self.local = local
        self.tempo = tempo
        self.dimensao = dimensao

    def object(self):  # Corrigido de objct para object
        return [self.id, self.id_foto, self.coordenadas, self.local, self.tempo, self.dimensao]

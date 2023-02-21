from django.urls import path
from relatorios import views 

urlpatterns = [
   path('gerarRelatorioCurso', views.gerarRelatorioCurso, name='gerarRelatorioCurso'),
]
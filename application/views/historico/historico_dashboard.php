<style>
.center {
  line-height: 200px;
  height: 200px;
  
  text-align: center;
  padding: 70px 0;
}

.center b{
  line-height: 0px;
  height: 0px;
  
  text-align: center;
  
}
 /* Garante que os quadrados sejam posicionados corretamente */
 #imageLabel {
        position: relative;
        display: inline-block;
    }

    .square {
        position: absolute;
        width: 10px; /* Tamanho do quadrado */
        height: 10px;
        border: 2px solid;
        background: transparent; /* Torna o quadrado vazado */
    }
    

    
</style>


        
        

<div class="row justify-content-center align-items-center mb-1" style="color:#FFFFFF;font-size:250%;" >
    

    <div class="col-md-3 pr-md-0 " style="display: flex; justify-content: center; align-items: center; ">
        <a class="card card-pricing "  style="background:#650086;margin-bottom:10px;border-radius: 50px; padding: 0px 10px;width: 90%; ">
            <div class="card-header">
                    <i class="fa-solid fa-backward" style="color:#B319D0;font-size: 2rem; position: absolute; left: 20px; top: 30px;" onclick="window.location.href='<?php echo base_url('dashboard'); ?>'"></i>
                    <span class="price " style="color:#FFFFFF; font-size:2rem">Histórico</span>
                    
                
            </div>
        </a>
    </div>

</div>















<?php foreach($exames as $exame){?>
<div class="row justify-content-center align-items-center mb-1" style="color:#FFFFFF;font-size:250%;background:#B319D0" >

    <div class="row justify-content-center align-items-center d-flex flex-wrap ">
        <div class="col-1 col-md-3 d-flex justify-content-center align-items-center " style="display: flex; justify-content: center; align-items: center; ">
            <i class="fa-solid fa-file-invoice" style="color:#9223B3;font-size: 6rem;" ></i>

        </div>
        <div class="col-6 col-md-6 d-flex justify-content-center align-items-center" style="display: flex; justify-content: center; align-items: center; ">
            <div style="display: flex; flex-direction: column; ">
                <span style="color: #ffffff; font-size: 20px; font-family: Bookman Old Style, sans-serif; ">
                    <?php echo $exame->nome_pac; ?>
                </span>
                <span style="color: #ffffff; font-size: 15px; font-family: Bookman Old Style, sans-serif; margin: 0;">
                Hanseníase: <?php if($exame->diagnostico){echo 'Positivo';}else{echo 'Negativo';} ?>
                </span>
                <span style="color: #ffffff; font-size: 15px; font-family: Bookman Old Style, sans-serif; margin: 0;">
                    <i class="fa-solid fa-calendar-days"style="color:#650086;font-size: 1.5rem;"></i>   <?php echo date("d/m/Y", strtotime($exame->data)); ?>
                </span>
            </div>
        </div>
        <div class="col-2 col-md-3 d-flex justify-content-center align-items-center" style="display: flex; justify-content: center; align-items: center; ">
            
            <i class="fa-solid fa-camera abrirModal"style="color:#650086;margin-bottom:20px;border-radius: 50px; padding: 10px 20px;width: 90%;"
                
                data-nome="<?php echo $exame->nome_pac; ?>" 
                data-data="<?php echo date("d/m/Y", strtotime($exame->data)); ?>" 
                data-diagnostico="Hanseníase: <?php if($exame->diagnostico){echo 'Positivo';}else{echo 'Negativo';} ?>" 
                data-foto1="<?php echo $exame->id_foto1; ?>" 
                data-foto2="<?php echo $exame->id_foto2; ?>" 
                data-bs-toggle="modal" 
                data-bs-target="#meuModal"
               
            ></i>
            
            
        </div>
    </div>

    
    

    <div class="row justify-content-center align-items-center d-flex flex-wrap " style="background:#B319D0"> 
        <br>
        <div style="width: 100%; height: 2px; background-color: white;width: 80%;"></div>
    </div>

</div>
<?php }?>
 
<!-- Modal único -->
<div class="modal fade" id="meuModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background:#B319D0">
                <h5 class="modal-title" id="modalTitulo"></h5>
                
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p id="modalData"></p>
                <p id="modalSubtitulo"></p>
                <p>Foto Antes</p>
                <div class="row d-flex justify-content-center" style="width: 100%; position: relative;">
                    <label id="imageLabel1">
                        <img id="modalFoto1" src="" style="object-fit: cover;width: 100%;"/>
                    </label>
                    <canvas id="myCanvas1" style="position: absolute; top: 0; left: 0; z-index: 10; pointer-events: none;"></canvas>
                </div>
                <p>Foto Após</p>
                <div class="row d-flex justify-content-center" style="width: 100%; position: relative;">
                    <label id="imageLabel2">
                        <img id="modalFoto2" src="" style="object-fit: cover;width: 100%;"/>
                    </label>
                    <canvas id="myCanvas2" style="position: absolute; top: 0; left: 0; z-index: 10; pointer-events: none;"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript para preencher o modal -->
<script>
    let fotos = <?php echo json_encode($fotos); ?>;

document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".abrirModal").forEach(button => {
        button.addEventListener("click", function () {
            let nome = this.getAttribute("data-nome");
            let data = this.getAttribute("data-data");
            let id_foto1 = this.getAttribute("data-foto1");
            let id_foto2 = this.getAttribute("data-foto2");
            let diagnostico = this.getAttribute("data-diagnostico");
            

            document.getElementById("modalTitulo").innerText = "Dados de " + nome;
            document.getElementById("modalSubtitulo").innerText = diagnostico;
             
            document.getElementById("modalData").innerText = "Data: " + data;

            let exameSelecionado1 = fotos.find(fotos => fotos.id == id_foto1);
            let exameSelecionado2 = fotos.find(exame => exame.id == id_foto2);

            document.getElementById("modalFoto1").src = exameSelecionado1.local;
            document.getElementById("modalFoto2").src = exameSelecionado2.local;

            coordenadas_f1 = [
                exameSelecionado1.Roi_dentro1,
                exameSelecionado1.Roi_dentro2,
                exameSelecionado1.Roi_dentro3,
                exameSelecionado1.Roi_fora1,
                exameSelecionado1.Roi_fora2,
                exameSelecionado1.Roi_fora3
            ];

            coordenadas_f2 = [
                exameSelecionado2.Roi_dentro1,
                exameSelecionado2.Roi_dentro2,
                exameSelecionado2.Roi_dentro3,
                exameSelecionado2.Roi_fora1,
                exameSelecionado2.Roi_fora2,
                exameSelecionado2.Roi_fora3
            ];

            
            desenharQuadrados(coordenadas_f1, '1',exameSelecionado1.dimensao); // Desenhar para a primeira imagem
            desenharQuadrados(coordenadas_f2, '2',exameSelecionado2.dimensao); // Desenhar para a segunda imagem
        });
    });
});

// Função para desenhar os quadrados
function desenharQuadrados(coordenadas, foto,dimensao) {
    
    const imageLabel = document.getElementById("imageLabel"+ foto);
    const img = document.getElementById('modalFoto' + foto);
    

    // Adicionar um atraso de 1 segundo antes de começar a desenhar
    setTimeout(function() {
        img.onload = function() {
            // Limpar quadrados anteriores
            let existingSquares = imageLabel.querySelectorAll('.square');
            existingSquares.forEach(square => square.remove());

            // Ajustar o tamanho do canvas para o tamanho da imagem
            const imgWidth = img.offsetWidth;
            const imgHeight = img.offsetHeight;
            const novadim = imgWidth+";"+imgHeight;
            //correção da coordenadas para a nova dimensao
            coordenadas = corrigirCoordenadas(dimensao, novadim, coordenadas);
            
            

            // Desenhar os quadrados nas coordenadas
            coordenadas.forEach((coordenada, index) => {
                const [x, y] = coordenada.split(';').map(Number);  // Converter para inteiros
                

                // Verificar se a coordenada está dentro da área da imagem (canvas)
                if (x > 0 && x < imgWidth && y > 0 && y < imgHeight) {
                    // Criar o quadrado como uma div
                    const square = document.createElement('div');
                    square.classList.add('square');

                    // Posicionar o quadrado
                    square.style.left = `${x - 5}px`; // Ajuste da posição do quadrado
                    square.style.top = `${y - 5}px`; // Ajuste da posição do quadrado

                    // Definir a cor do quadrado
                    square.style.borderColor = (index < 3) ? 'white' : 'purple';  // Branco para as 3 primeiras, roxo para as últimas 3

                    // Adicionar o quadrado à imagem
                    imageLabel.appendChild(square);
                }
            });
        };

        // Se a imagem já estiver carregada (caso o onload não seja acionado)
        if (img.complete) {
            img.onload(); // Chamamos manualmente se já carregada
        }
    }, 1000);  // 1000 milissegundos de atraso (1 segundo)
}


function corrigirCoordenadas(dimensaoAntiga, dimensaoNova, coordenadas) {
    let [larguraAntiga, alturaAntiga] = dimensaoAntiga.split(";").map(Number);
    let [larguraNova, alturaNova] = dimensaoNova.split(";").map(Number);

    let fatorLargura = larguraNova / larguraAntiga;
    let fatorAltura = alturaNova / alturaAntiga;

    let coordenadasCorrigidas = coordenadas.map(coord => {
        let [x, y] = coord.split(";").map(Number);
        let novoX = Math.round(x * fatorLargura);
        let novoY = Math.round(y * fatorAltura);
        return `${novoX};${novoY}`;
    });

    return coordenadasCorrigidas;
}

    
</script>




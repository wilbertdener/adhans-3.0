<style>


</style>


        
    <div  style="background:#B319D0" >    

        <div class="row justify-content-center align-items-center mb-1" style="color:#FFFFFF;font-size:250%;" >
            

            <div class="col-md-3 pr-md-0 " style="display: flex; justify-content: center; align-items: center; ">
                <a class="card card-pricing "  style="background:#650086;margin-bottom:10px;border-radius: 50px; padding: 0px 10px;width: 90%; ">
                    <div class="card-header">
                        <i class="fa-solid fa-backward" style="color:#B319D0;font-size: 2rem; position: absolute; left: 20px; top: 30px;" onclick="window.location.href='<?php echo base_url('dashboard'); ?>'"></i>
                            <span class="price " style="color:#FFFFFF; font-size:2rem">Enviar fotos</span>
                            
                        
                    </div>
                </a>
            </div>
        
        </div>

        <div class="row d-flex justify-content-center" style="width: 100%; position: relative;">
    <label id="imageLabel">
        <img id="previewImage" src="<?php echo $foto->local ?>" 
            alt="Clique na imagem"
            style="object-fit: cover; width: 100%; cursor: pointer; border-radius: 10px; box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);">
    </label>

    <!-- Canvas sobre a imagem -->
    <canvas id="myCanvas" style="position: absolute; top: 0; left: 0; z-index: 10; pointer-events: none;"></canvas>
</div>





    </div>

    <!-- Botão que ficará invisível inicialmente e será centralizado -->
     <br>
    <!-- Botão para enviar a imagem -->
    

    



       


     
<script>
   
    // Coordenadas em formato 'x;y' do array
    

// Função para desenhar os quadrados sobre a imagem
    function desenharQuadrados() {

        /*$coordenadas = [
        '100;200',
        '150;250',
        '200;300',
        '50;100',
        '75;125',
        '125;175'
    ];*/

        //let coordenadas = <?php #echo $coordenadas; ?>;
        const canvas = document.getElementById('myCanvas');
        const ctx = canvas.getContext('2d');

        // Obter a imagem
        const img = document.getElementById('previewImage');

        // Ajustar o tamanho do canvas para o tamanho da imagem
        canvas.width = img.offsetWidth;
        canvas.height = img.offsetHeight;

        // Quando a imagem for carregada, desenhar sobre o canvas
        img.onload = function() {
            // Desenhar os quadrados nas coordenadas
            coordenadas.forEach((coordenada, index) => {
                const [x, y] = coordenada.split(';').map(Number);  // Converter para inteiros
                
                // Definir a cor do quadrado
                ctx.strokeStyle = (index < 3) ? 'white' : 'purple';  // Branco para as 3 primeiras, roxo para as últimas 3
                ctx.lineWidth = 1.5;  // Tamanho da linha

                // Desenhar o quadrado (posição x, y e tamanho)
                ctx.strokeRect(x - 5, y - 5, 10, 10);  // Ajuste o tamanho do quadrado se necessário
            });
        };
    }

    // Chamar a função para desenhar os quadrados sobre a imagem
    desenharQuadrados();

    
    
    
</script>


            
            
        
        
        


        

 
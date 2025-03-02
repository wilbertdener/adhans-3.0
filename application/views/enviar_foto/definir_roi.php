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

.custom-input {
    width: 80%; /* Ajuste conforme necessário */
    max-width: 400px; /* Para evitar que fique muito grande */
    border-radius: 50px; /* Deixa as bordas circulares */
    padding: 10px 20px; /* Ajusta o espaçamento interno */
    border: 1px solid #ccc; /* Define uma borda sutil */
    box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2); /* Adiciona uma sombra leve */
    outline: none; /* Remove o contorno padrão ao clicar */
    transition: 0.3s; /* Efeito suave nas mudanças */
}

.custom-input:focus {
    border-color: #650086; /* Cor da borda ao focar */
    box-shadow: 2px 2px 12px rgba(101, 0, 134, 0.5); /* Realce a sombra ao focar */
}

/* Garante que os quadrados sejam posicionados corretamente */
#imageLabel {
        position: relative;
        display: inline-block;
    }

    .square {
        position: absolute;
        width: 10px;/*20 ak - 10 no js*/
        height: 10px;
        border: 2px solid;
        background: transparent; /* Torna o quadrado vazado */
    }

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

        <div class="row justify-content-center align-items-center mb-1" style="color:#FFFFFF;font-size:250%;" >
        <div class="row d-flex justify-content-center mb-3" style="width: 100%;">
            <h1  style="color:#FFFFFF; font-size:2rem justify-content: center; align-items: center;">Toque na imagem para selecionar os rois.</h1>
        </div>
        <?php if($foto->tempo=='0'){?>
        <div class="row d-flex justify-content-center mb-3" style="width: 100%;">
            <h1  style="color:#FFFFFF; font-size:2rem justify-content: center; align-items: center;">Imagem antes da aplicação do teste</h1>
        </div>   
        <?php }else{?>    
            <div class="row d-flex justify-content-center mb-3" style="width: 100%;">
            <h1  style="color:#FFFFFF; font-size:2rem justify-content: center; align-items: center;">Imagem após 30 segundos da aplicação do teste</h1>
        </div> 

        <?php }?>    
        <div class="row d-flex justify-content-center mb-3" style="width: 100%;">
            <h4  id='definirroi' style="color:#FFFFFF; font-size:2rem justify-content: center; align-items: center;">Selecione 3 Rois dentro da lesão</h4>
        </div> 

        <div class="row d-flex justify-content-center" style="width: 100%;">
            <label id="imageLabel">
                <img id="previewImage" src="<?php echo $foto->local?>" 
                    alt="Clique na imagem"
                    style="object-fit: cover; width: 100%; cursor: pointer; border-radius: 10px; 
                        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);">
            </label>
        </div>

    </div>

    <!-- Botão que ficará invisível inicialmente e será centralizado -->
     <br>
    <!-- Botão para enviar a imagem -->
    <div class="row justify-content-end" style="width: 100%; display: flex;">
        

        <button
            class="card card-pricing" 
            id="selectROIsButton" 
            style="background:#650086; margin-bottom:20px; border-radius: 50px; padding: 10px 0px; width: 40%; cursor: pointer; display: none;">
            <span style="color:#FFFFFF; font-size:1rem;" onclick="enviarCoordenadas(<?php echo $foto->id?>)" value=<?php echo $foto->id?>>
            
            
            
            <span style="color:#FFFFFF; font-size:1rem; ">Proxima foto</span>
        </button>

        <button
            class="card card-pricing" 
            id="selecttempo" 
            style="background:#650086; margin-bottom:20px; border-radius: 50px; padding: 10px 0px; width: 40%; cursor: pointer;display: none; "
            onclick="spinner_on(this,uploadImage)"
            value=<?php echo $foto->tempo?>
            >
            <span style="color:#FFFFFF; font-size:1rem;"></span>
        </button>
    </div>
    
        
       
<script>
    let clickCount = 0;
    let coordenadas = []; // Lista para armazenar as coordenadas

    document.getElementById("previewImage").addEventListener("click", function(event) {
        if (clickCount >= 6) return; // Garante que apenas 6 quadrados sejam criados
        if(clickCount == 2){
            document.getElementById('definirroi').innerText = 'Selecione 3 areas fora da lesão';
        }
        let img = event.target;
        let rect = img.getBoundingClientRect();
        let x = event.clientX - rect.left; // Calcula a posição X relativa à imagem
        let y = event.clientY - rect.top;  // Calcula a posição Y relativa à imagem

        let square = document.createElement("div");
        square.classList.add("square");
        square.style.borderColor = clickCount < 3 ? "white" : "purple"; // 3 primeiros brancos, 3 últimos roxos
        
        square.style.left = `${x }px`; // Centraliza o quadrado no clique
        square.style.top = `${y }px`;

        document.getElementById("imageLabel").appendChild(square);

        // Salva as coordenadas
        coordenadas.push({ x: x, y: y });
        if(clickCount == 5){
            
            enableButton();
        }
        

        clickCount++; // Incrementa o contador de cliques
    });

    

    function enableButton() {
        
        const button = document.getElementById('selectROIsButton');

        button.style.display = 'block'; // Torna o botão visível
        
        
    }

   
    // Função para enviar coordenadas ao Controller
    function enviarCoordenadas(id_foto) {
        
        
        if (coordenadas.length === 0) {
            alert("Nenhuma coordenada selecionada!");
            return;
        }

        if (id_foto == null) {
            alert("Nenhuma usuario vinculado");
            return;
        }
        
        const img = document.getElementById('previewImage');
        const imgWidth = img.offsetWidth;
        const imgHeight = img.offsetHeight;
        let dimensao = imgWidth+";"+ imgHeight;
        //let url2 = `<?php #echo base_url('fotos/rois_definidos/'); ?>${encodeURIComponent(id_foto)}`;
        fetch("<?php echo base_url('foto/rois_definidos'); ?>", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({ coordenadas: coordenadas, id_foto: id_foto, dimensao: dimensao }),
        })
        .then(response => response.json())
        .then(data => {
            alert("Coordenadas salvas com sucesso!");
            let tempo = document.getElementById("selecttempo").value;
            
            if(tempo=='0'){
                
                id_foto2 = id_foto+"/1";
                let url = `<?php echo base_url('foto/definir_roi/'); ?>${id_foto2}`;
                
                window.location.href = url;
            }else{
                let url = `<?php echo base_url('foto/resultado/'); ?>${id_foto}`;
                window.location.href = url;
            }
        })
        .catch(error => {
            console.error("Erro ao salvar coordenadas:", error);
        });
    }
    
    
    
    
</script>

        


        

 
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
            <h1 style="color:#FFFFFF; font-size:2rem justify-content: center; align-items: center;">Toque na imagem abaixo para enviar a fotografia após 30 segundos da aplicação do teste de histamina endógena.</h1>
        </div>   
            
        <div class="row d-flex justify-content-center mb-3" style="width: 100%;">
            <input name="login" class="form-control form-control-user custom-input" id="nome_pac" placeholder="Nome do paciente" >
        </div>


        <!-- Imagem clicável para upload -->
        <div class="row d-flex justify-content-center" style="width: 100%;">
            <label for="uploadInput">
                <img style=" object-fit: cover;width: 100%;" id="previewImage" src="/adhans/img/sistema/foto1.png" 
                    alt="Clique para enviar uma imagem" style="cursor: pointer; border-radius: 10px; box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);">
            </label>
            <input type="file" id="uploadInput" accept="image/*" style="display: none;">
        </div>
    </div>

    <div class="row" style="width: 100%; display: flex; justify-content: space-between;">
    <!-- Primeiro botão - Atualiza a página -->
    <div class="col-6 col-md-3 d-flex justify-content-center align-items-center gap-1rem p-2">
        <a class="card card-pricing" href="javascript:void(0);" onclick="location.reload();" style="background:#650086; margin-bottom:20px; border-radius: 50px; padding: 10px 0px; width: 90%;">
            <div class="card-header">
                <div class="card-price">
                    <span class="price" style="color:#FFFFFF; font-size:1rem;">Enviar outra foto</span>
                </div>
            </div>
        </a>                                                                                                                                
    </div>

    <!-- Segundo botão - Redireciona para outra página -->
    <div class="col-6 col-md-3 d-flex justify-content-center align-items-center p-2">
        <a class="card card-pricing" href="<?php echo base_url('dashboard')?>" style="background:#650086; margin-bottom:20px; border-radius: 50px; padding: 10px 0px; width: 90%;">
            <div class="card-header">
                <div class="card-price">
                    <span class="price" style="color:#FFFFFF; font-size:1rem;">Selecionar ROIs</span>
                </div>
            </div>
        </a>                                                                                                                                
    </div>
</div>


       

<script>
    document.getElementById("uploadInput").addEventListener("change", function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById("previewImage").src = e.target.result; // Atualiza a imagem
                document.getElementById("uploadInput").disabled = true; // Desabilita o input
                document.getElementById("imageLabel").style.pointerEvents = "none"; // Remove o clique na imagem
            };
            reader.readAsDataURL(file);
        }
    });
    // Envia a imagem para o servidor
    document.getElementById("sendImageButton").addEventListener("click", function() {
        const fileInput = document.getElementById("uploadInput");
        const file = fileInput.files[0];

        if (file) {
            const formData = new FormData();
            formData.append("image", file);  // Adiciona a imagem ao FormData

            // Envia o arquivo para o servidor usando Fetch API
            fetch("/upload", {  // Ajuste o endpoint "/upload" conforme sua necessidade no backend
                method: "POST",
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                alert("Imagem enviada com sucesso!");
            })
            .catch(error => {
                alert("Erro ao enviar a imagem");
                console.error(error);
            });
        }
    });

    
</script>
        
        

            
            
        
        
        


        

 
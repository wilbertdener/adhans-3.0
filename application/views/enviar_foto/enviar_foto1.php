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
            <h1 style="color:#FFFFFF; font-size:2rem justify-content: center; align-items: center;">Toque na imagem abaixo para enviar a fotografia antes da aplicação do teste de histamina endógena.</h1>
        </div>   
            
        <div class="row d-flex justify-content-center mb-3" style="width: 100%;">
            <input name="login" class="form-control form-control-user custom-input" id="nome_pac" placeholder="Nome do paciente" >
        </div>


        <!-- Imagem clicável para upload -->
        <div class="row d-flex justify-content-center" style="width: 100%;">
            <label for="uploadInput" id="imageLabel">
                <img style=" object-fit: cover;width: 100%;" id="previewImage" src="/adhans/img/sistema/foto1.png" 
                    alt="Clique para enviar uma imagem" style="cursor: pointer; border-radius: 10px; box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);">
            </label>
            <input type="file" id="uploadInput" accept="image/*" style="display: none;" onchange="enableButton()">
        </div>
    </div>

    <!-- Botão que ficará invisível inicialmente e será centralizado -->
     <br>
    <!-- Botão para enviar a imagem -->
    <div class="row justify-content-end" style="width: 100%; display: flex;">
        <button
            class="card card-pricing" 
            id="selectROIsButton" 
            style="background:#650086; margin-bottom:20px; border-radius: 50px; padding: 10px 0px; width: 40%; cursor: pointer; display: none;"
            onclick="uploadImageAndRedirect()">
            <span style="color:#FFFFFF; font-size:1rem;">Selecionar ROIs</span>
        </button>
    </div>





       

<script>
    document.getElementById("uploadInput").addEventListener("change", function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById("previewImage").src = e.target.result; // Atualiza a imagem
                //document.getElementById("uploadInput").disabled = true; // Desabilita o input
                //document.getElementById("imageLabel").style.pointerEvents = "none"; // Remove o clique na imagem
            };
            reader.readAsDataURL(file);
        }
    });
    const upload = multer({ dest: 'adhans/img/exames/' });
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

    
    function enableButton() {
        const input = document.getElementById('uploadInput');
        const button = document.getElementById('selectROIsButton');

        // Exibe o botão apenas quando uma imagem for carregada
        if (input.files && input.files[0]) {
            button.style.display = 'block'; // Torna o botão visível
        } else {
            button.style.display = 'none'; // Mantém o botão invisível
        }
    }

    function uploadImageAndRedirect() {
        const imageInput = document.getElementById('imageInput');
        const file = imageInput.files[0];

        if (!file) {
            alert('Por favor, selecione uma imagem antes de enviar!');
            return;
        }

        // Criando um FormData para enviar a imagem
        const formData = new FormData();
        formData.append('image', file);

        // Enviando a imagem via POST para o servidor
        fetch('adhans/img/exames', {  // Substitua pelo caminho do seu script de upload
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (response.ok) {
                // Redireciona após o upload
                window.location.href = '<?php echo base_url('foto/foto2')?>';
            } else {
                alert('Falha no upload. Tente novamente.');
            }
        })
        .catch(error => {
            alert('Erro ao enviar a imagem: ' + error);
        });
    }

</script>
        
        

            
            
        
        
        


        

 
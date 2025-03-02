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
            <input name="nome_pac" class="custom-input" id="nome_pac" placeholder="Nome do paciente" style="height: 40px;font-size: 20px;" >
        </div>
        
        <div class="row d-flex justify-content-center mb-3" style="width: 100%;">
            <h1 style="color:#FFFFFF; font-size:2rem justify-content: center; align-items: center;">Toque na imagem abaixo para enviar a fotografia antes da aplicação do teste de histamina endógena.</h1>
        </div>   
            
        


        <!-- Imagem clicável para upload -->
        <div class="row d-flex justify-content-center" style="width: 100%;">
            <label for="uploadInput" id="imageLabel">
                <img style=" object-fit: cover;width: 100%;" id="previewImage" src="/adhans/img/sistema/foto1.png" 
                    alt="Clique para enviar uma imagem" style="cursor: pointer; border-radius: 10px; box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);">
            </label>
            <input type="file" id="uploadInput" accept="image/*" style="display: none;" max-size="20480" onchange="enableButton()">
        </div>




        <div class="row d-flex justify-content-center mb-3" style="width: 100%;">
            <h1 style="color:#FFFFFF; font-size:2rem justify-content: center; align-items: center;">Toque na imagem abaixo para enviar a fotografia após 30 segundos da aplicação do teste de histamina endógena.</h1>
        </div>   
            
        


        <!-- Imagem clicável para upload -->
        <div class="row d-flex justify-content-center" style="width: 100%;">
            <label for="uploadInput2" id="imageLabel">
                <img style=" object-fit: cover;width: 100%;" id="previewImage2" src="/adhans/img/sistema/foto2.png" 
                    alt="Clique para enviar uma imagem" style="cursor: pointer; border-radius: 10px; box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);">
            </label>
            <input type="file" id="uploadInput2" accept="image/*" style="display: none;" onchange="enableButton()">
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
            onclick="spinner_on(this,uploadImage)">
            <span style="color:#FFFFFF; font-size:1rem;">Selecionar ROIs</span>
        </button>
    </div>

    



       

<script>
    function spinner_on(button, callback) {
        // Desativa o botão e altera o texto
        button.disabled = true;
        button.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Processando...';

        // Se houver uma função de callback, executa
        if (typeof callback === "function") {
            callback();
        }
        
    }

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
    //const upload = multer({ dest: 'adhans/img/exames/' });
    // Envia a imagem para o servidor

    document.getElementById("uploadInput2").addEventListener("change", function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById("previewImage2").src = e.target.result; // Atualiza a imagem
                //document.getElementById("uploadInput2").disabled = true; // Desabilita o input
                //document.getElementById("imageLabel").style.pointerEvents = "none"; // Remove o clique na imagem
            };
            reader.readAsDataURL(file);
        }
    });
    
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

    
    
    // Envia a imagem para o servidor
    document.getElementById("sendImageButton").addEventListener("click", function() {
        const fileInput = document.getElementById("uploadInput2");
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
        const input2 = document.getElementById('uploadInput2');
        const button = document.getElementById('selectROIsButton');

        // Exibe o botão apenas quando uma imagem for carregada
        if (input.files && input.files[0] && input2.files && input2.files[0]) {
            button.style.display = 'block'; // Torna o botão visível
        } else {
            button.style.display = 'none'; // Mantém o botão invisível
        }
    }

    function uploadImageAndRedirect() {
        window.location.href = '<?php echo base_url('foto/foto2')?>';
        const imageInput = document.getElementById('imageInput');
        const file = imageInput.files[0];

        if (!file) {
            alert('Por favor, selecione uma imagem antes de enviar!');
            return;
        }

        const imageInput2 = document.getElementById('imageInput2');
        const file2 = imageInput.files[0];

        if (!file2) {
            alert('Por favor, selecione a segunda imagem antes de enviar!');
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
                uploadImageAndRedirect2();
            } else {
                alert('Falha no upload. Tente novamente.');
            }
        })
        .catch(error => {
            alert('Erro ao enviar a imagem: ' + error);
        });
    }

    function uploadImageAndRedirect2() {
        window.location.href = '<?php echo base_url('foto/foto2')?>';
        const imageInput = document.getElementById('imageInput2');
        const file = imageInput.files[0];

        if (!file) {
            alert('Por favor, selecione a segunda imagem antes de enviar!');
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

    

    function uploadImage() {
        let input = document.getElementById("uploadInput");

        if (!input || input.files.length === 0) {
            alert("Por favor, selecione uma imagem.");
            return;
        }

        let input2 = document.getElementById("uploadInput2");

        if (!input2 || input2.files.length === 0) {
            alert("Por favor, selecione uma imagem.");
            return;
        }

        let file = input.files[0];
        
        let formData = new FormData();
        formData.append("imagem", file);
        

        
        

        fetch("<?php echo base_url('foto/upload/0'); ?>", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            

            if (data.success) {
                
                uploadImage2();
            } else {
                alert("Erro ao salvar a imagem: " + data.message);
            }
        })
        .catch(error => {
            console.error("Erro ao enviar a imagem:", error);
            alert("Ocorreu um erro ao enviar a imagem.");
        });
    }

    function uploadImage2() {
        let input = document.getElementById("uploadInput2");


        let file = input.files[0];
     
        let formData = new FormData();
        formData.append("imagem", file);
        

        
        let nome =  document.getElementById("nome_pac").value;
        let nome_paciente ='';
        if (nome === null || nome === '') {  // Verifica se é null ou string vazia
            nome_paciente = 'Anonimo';
        } else {
            nome_paciente =  nome;
        }
        
        let url = `<?php echo base_url('foto/upload/1/'); ?>${encodeURIComponent(nome_paciente)}`;
        fetch(url, {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
           
            let id_foto = data.id;
            id_foto = id_foto.toString();
           
            if (data.success) {
                let url2 = `<?php echo base_url('foto/definir_roi/'); ?>${encodeURIComponent(id_foto)}`;
                window.location.href = url2; // Redireciona após salvar
            } else {
                alert("Erro ao salvar a imagem: " + data.message);
            }
        })
        .catch(error => {
            console.error("Erro ao enviar a imagem:", error);
            alert("Ocorreu um erro ao enviar a imagem.");
        });
    }

    document.getElementById("selectROIsButton").addEventListener("click", function() {
        let fileInput = document.getElementById("uploadInput");
        let file = fileInput.files[0];

        let fileInput2 = document.getElementById("uploadInput2");
        let file2 = fileInput2.files[0]; // Correção: pegar o arquivo do segundo input

        if (!file) {
            alert("Nenhuma imagem selecionada no primeiro campo!");
            return;
        }
        if (!file2) {
            alert("Nenhuma imagem selecionada no segundo campo!");
            return;
        }

        let formData = new FormData();
        formData.append("imagem", file);

        fetch("adhans/foto/upload", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) { // Alterado de `data.status` para `data.success`
                let formData2 = new FormData();
                formData2.append("imagem", file2);

                return fetch("adhans/foto/upload", {
                    method: "POST",
                    body: formData2
                });
            } else {
                throw new Error("Erro no upload da primeira imagem: " + data.message);
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) { // Alterado de `data.status` para `data.success`
                alert("Imagens salvas com sucesso!");
                window.location.href = "adhans/foto/foto2";
            } else {
                throw new Error("Erro no upload da segunda imagem: " + data.message);
            }
        })
        .catch(error => {
            console.error("Erro ao enviar a imagem:", error);
            alert(error.message);
        });
    });


    
    



</script>
        
        

            
            
        
        
        


        

 
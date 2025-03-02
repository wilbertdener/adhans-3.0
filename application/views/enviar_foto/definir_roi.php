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

        let img = event.target;
        let rect = img.getBoundingClientRect();
        let x = event.clientX - rect.left; // Calcula a posição X relativa à imagem
        let y = event.clientY - rect.top;  // Calcula a posição Y relativa à imagem

        let square = document.createElement("div");
        square.classList.add("square");
        square.style.borderColor = clickCount < 3 ? "white" : "purple"; // 3 primeiros brancos, 3 últimos roxos
        square.style.left = `${x - 10}px`; // Centraliza o quadrado no clique
        square.style.top = `${y - 10}px`;

        document.getElementById("imageLabel").appendChild(square);

        // Salva as coordenadas
        coordenadas.push({ x: x, y: y });
        if(clickCount == 5){
            console.log("Coordenadas salvas:", coordenadas);
            enableButton();
        }
        //console.log("Coordenadas salvas:", coordenadas); // Exibe no console

        clickCount++; // Incrementa o contador de cliques
    });

    // Outra função que acessa a variável global
    function exibirCoordenadas() {
        console.log("Acessando coordenadas de outra função:", coordenadas);
    }

    function enableButton() {
        
        const button = document.getElementById('selectROIsButton');

        button.style.display = 'block'; // Torna o botão visível
        const img = document.getElementById('previewImage');
        const imgWidth = img.offsetWidth;
        const imgHeight = img.offsetHeight;
        let variav = imgWidth+";"+ imgHeight;
        console.log("Imagem carregada com dimensões:", variav);
        
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
        console.log(coordenadas);
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
            console.log("Resposta do servidor:", data);
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

            
            
        
<script>
    /*
    function spinner_on(button, callback) {
        // Desativa o botão e altera o texto
        button.disabled = true;
        button.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Processando...';

        // Se houver uma função de callback, executa
        if (typeof callback === "function") {
            //definir_roi($id,$foto='0')
            let tempo = document.getElementById("selecttempo").value;
            
            if(tempo=='0'){
                let id_foto2 = document.getElementById("selectROIsButton").value;
                id_foto2 = id_foto2+"/1";
                let url = `<?php #echo base_url('foto/definir_roi/'); ?>${id_foto2}`;
                
                window.location.href = url;
            }else{
                let id_foto2 = document.getElementById("selectROIsButton").value;
                let url = `<?php #echo base_url('foto/resultado/'); ?>${id_foto2}`;
                window.location.href = url;
            }
            
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
        window.location.href = '<?php #echo base_url('dashboard')?>';
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
                window.location.href = '<?php #echo base_url('dashboard')?>';
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

        let file = input.files[0];
        console.log(file);
        let formData = new FormData();
        formData.append("imagem", file);
        

        console.log("Enviando imagem:", file.name);
        let nome =  document.getElementById("nome_pac").value;
        let nome_paciente ='';
        if (nome === null || nome === '') {  // Verifica se é null ou string vazia
            nome_paciente = 'Semnome';
        } else {
            nome_paciente =  nome;
        }
        console.log('aqui:');
        console.log(nome_paciente);
        let url = `<?php #echo base_url('foto/upload/1/'); ?>${encodeURIComponent(nome_paciente)}`;
        fetch(url, {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            console.log("Resposta do servidor:", data);

            if (data.success) {
                
                window.location.href = "<?php #echo base_url('dashboard'); ?>"; // Redireciona após salvar
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

        if (!file) {
            alert("Nenhuma imagem selecionada!");
            return;
        }

        let formData = new FormData();
        formData.append("imagem", file);

        fetch("http://192.168.137.1/adhans/foto/upload", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === "sucesso") {
                alert("Imagem salva!");
                window.location.href = "http://192.168.137.1/adhans/dashboard";
            } else {
                alert("Erro: " + data.mensagem);
            }
        })
        .catch(error => console.error("Erro ao enviar a imagem:", error));
    });
    




    */


</script> 
        


        

 
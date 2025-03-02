<!DOCTYPE html>
<html lang="pt-br">
  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ADHans</title>

    <!-- Fonts and icons -->
    <script src=<?php echo base_url('/assets/js/plugin/webfont/webfont.min.js') ?>></script>
    <script>
      WebFont.load({
        google: {"families":["Lato:300,400,700,900"]},
        custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['<?php echo base_url('/assets/css/fonts.min.css') ?>']},
        active: function() {
          sessionStorage.fonts = true;
        }
      });
    </script>

    <!-- Bootstrap V5.2.0 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/f862649525.js" crossorigin="anonymous"></script>
    
    <!-- Date Picker -->
    <link type="text/css" href=<?php echo base_url('/assets/jsCalendar/jsCalendar.css')?> rel="stylesheet">
    <link type="text/css" href=<?php echo base_url('/assets/jsCalendar/jsCalendar.micro.css')?> rel="stylesheet">
    <script type="text/javascript" src=<?php echo base_url('/assets/jsCalendar/jsCalendar.js')?>></script>
    <script type="text/javascript" src=<?php echo base_url('/assets/jsCalendar/jsCalendar.lang.pt.js')?>></script>
    <script type="text/javascript" src=<?php echo base_url('/assets/jsCalendar/jsCalendar.datepicker.js')?>></script>

    <!-- Custom styles for this template-->
    <link href=<?php echo base_url('/assets/css/bootstrap.min.css') ?> rel="stylesheet">
    <link href=<?php echo base_url('/assets/css/atlantis.min.css') ?> rel="stylesheet">
    <link href=<?php echo base_url('/assets/css/demo.css') ?> rel="stylesheet">

    <!-- Imprimir/Salvar em pdf -->
    <script type="text/javascript" src=<?php echo base_url('/assets/js/html2canvas.js')?>></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>

    

    <script src="<?php echo base_url("assets/bootstrap/js/bootstrap.bundle.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/js/sweetalert2.all.min.js"); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <link rel="manifest" href="manifest.json">  <!-- Referência ao manifesto -->
    

    <style>
      /* Add in style file. */
      body{
        background-color: #B319D0; /* Cor de fundo (cinza claro) */
      }

      .custom-confirm-btn {
          background-color: #650086 !important; /* Cor personalizada */
          border-color: #650086 !important;
          color: white !important;
      }
      .custom-confirm-btn:hover {
          background-color: #4b0063 !important; /* Cor mais escura no hover */
          border-color: #4b0063 !important;
      }

      * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
        }

        .container {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        main {
            flex-grow: 1;  /* Faz o conteúdo crescer para ocupar o espaço disponível */
        }

        .footer {
            display: flex;
            align-items: center;
            
            background: #B319D0;
            color: #FFFFFF;
            font-size: 1rem;
            padding: 10px;
        }



        
    </style>
      

  
    
      <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
      <!-- Bootstrap JS (com dependência do Popper.js) -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
      <div class="main-panel" style="background-color: #B319D0">
        <div class="content" >
          <head>
          <div style="display: flex;  gap: 1rem;padding-left: 1rem;">
            <div class="flex-md-row">
              <div class="profile-pic pb-3">
                <div class="row d-flex justify-content-center" style="width: 100%;">
                  <label for="uploadInputperfil" id="imagePerfilLabel">
                    <img id="previewperfil" src="<?php echo $foto?>" id="foto-perfil-menu" style="width: 7rem; height: 7rem; border-radius: 50%; object-fit: cover;" alt="Clique para enviar uma imagem">
                      
                  </label>
                  <input type="file" id="uploadInputperfil" accept="image/*" style="display: none;" max-size="20480" >
                </div>
              </div>
            </div>

            <div style="display: flex; flex-direction: column; line-height: 1; gap: 2px;">
                <span style="color: #ffffff; font-size: 40px; font-family: Bookman Old Style, sans-serif; margin: 0;font-weight: bold;">ADHans</span>
                <span style="color: #ffffff; font-size: 20px; font-family: Bookman Old Style, sans-serif; margin: 0;">
                    <?php echo $_SESSION['nome']; ?>
                </span>
                <span style="color: #ffffff; font-size: 20px; font-family: Bookman Old Style, sans-serif; margin: 0;">
                    <?php echo $_SESSION['crm']; ?>
                </span>
            </div>

            <div class="col-2 col-md-3 d-flex justify-content-center align-items-center" style="display: flex; justify-content: center; align-items: center; ">
              <i class="fa-solid fa-right-from-bracket" onclick="sair()" style="color:#650086;margin-bottom:60px;border-radius: 90px; padding: 10px 20px;width: 90%;font-size: 35px; "></i> 
            </div>

          </div>

          <script src="<?php echo base_url('assets/js/jquery-3.6.4.min.js');?>"></script>
          <!-- SweetAlert2 CDN -->

          </head>

          <body>
<script>
  function sair(){
    Swal.fire({
      title: "Atenção",
      text: "Certeza que deseja deslogar do sistema?",
      
      
      iconHtml: '<i class="fa-solid fa-circle-exclamation" style="color: #650086; font-size: 6rem;"></i>', // Ícone personalizado
      showCancelButton: true,
      cancelButtonText: "Não",
      confirmButtonText: "Sim",
      reverseButtons: true,
      customClass: {
          cancelButton: "btn btn-lg btn-outline-secondary me-3",
          confirmButton: "btn btn-lg custom-confirm-btn", // Classe personalizada para o botão "Sim"
      },
      buttonsStyling: false
    }).then((result) => {
          
        if (result.isConfirmed) {
          window.location.href = "<?php echo base_url('login/logout'); ?>";
        }
    });
  }

  document.getElementById("uploadInputperfil").addEventListener("change", function(event) {
      const file = event.target.files[0];
      if (file) {
          const reader = new FileReader();
          reader.onload = function(e) {
              document.getElementById("previewperfil").src = e.target.result; // Atualiza a imagem
              //document.getElementById("uploadInput").disabled = true; // Desabilita o input
              //document.getElementById("imageLabel").style.pointerEvents = "none"; // Remove o clique na imagem
          };
          reader.readAsDataURL(file);
          //upload()
          uploadImage();
      }
  });
  
  function uploadImage() {
    
        let input = document.getElementById("uploadInputperfil");

        if (!input || input.files.length === 0) {
            alert("Por favor, selecione uma imagem.");
            return;
        }

        let file = input.files[0];
        
        let formData = new FormData();
        formData.append("imagem", file);
        
        fetch("<?php echo base_url('users/upload'); ?>", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            

            if (data.success) {
                
                
            } else {
                alert("Erro ao salvar a imagem: " + data.message);
            }
        })
        .catch(error => {
            console.error("Erro ao enviar a imagem:", error);
            alert("Ocorreu um erro ao enviar a imagem.");
        });
    }

</script>





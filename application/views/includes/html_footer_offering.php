    </div>
    <!--   Core JS Files   -->
    <script src=<?php echo base_url('/assets/js/core/jquery.3.2.1.min.js') ?>></script>
    <script src=<?php echo base_url('/assets/js/core/popper.min.js') ?>></script>
    <script src=<?php echo base_url('/assets/js/core/bootstrap.min.js')?>></script>

    <!-- jQuery UI -->
    <script src=<?php echo base_url('/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')?>></script>
    <script src=<?php echo base_url('/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')?>></script>

    <!-- jQuery Scrollbar -->
    <script src=<?php echo base_url('/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')?> ></script>
    
    <!-- Chart JS -->
    <script src=<?php echo base_url('/assets/js/plugin/chart.js/chart.min.js')?>></script>
    
    <!-- Datatables -->
    <script src=<?php echo base_url('/assets/js/plugin/datatables/datatables.min.js')?> ></script>

    <!-- Bootstrap Notify -->
    <script src=<?php echo base_url('/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js')?> ></script>

    <!-- Sweet Alert -->
    <script src=<?php echo base_url('/assets/js/plugin/sweetalert/sweetalert.min.js')?> ></script>

    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js"></script>
    <script src="http://ajax.microsoft.com/ajax/jquery.validate/1.11.1/additional-methods.js"></script>


    <!-- Atlantis JS -->
      <script src=<?php echo base_url('/assets/js/atlantis.min.js')?> ></script>


  </body>
</html>

<script>

  //Criar PDf do Questionario
  function saveQuestPDF(class_code,offering,forWhom,idUser) {
    swal({
          title: 'Tem certeza?',
          text: "As suas respostas serão enviadas para o CAEG. Esta ação não é reversível!",
          icon: 'warning',
          buttons:{
          confirm: {
            text : 'Sim, desejo finalizar meu questionário!',
            className : 'btn btn-success',
            value: 'sim',
          },
          cancel: {
            text : 'Cancelar',
            visible: true,
            className: 'btn btn-danger',
          }
        }
      }).then((value) => {
      switch (value){
        case "sim":
          var continuar = saveForm(idUser,1);
          if(continuar){
            window.scrollTo(0,0);  
            var HTML_Width = $("#quest_form").width();
            var HTML_Height = $("#quest_form").height();
            var top_left_margin = 15;
            var PDF_Width = HTML_Width + (top_left_margin * 2);
            var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
            var canvas_image_width = HTML_Width;
            var canvas_image_height = HTML_Height;

            var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;

            html2canvas($("#quest_form")[0]).then(function (canvas) {
              var imgData = canvas.toDataURL("image/pdf", 1.0);
              var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
              pdf.addImage(imgData, 'PDF', top_left_margin, top_left_margin, canvas_image_width, canvas_image_height);
              for (var i = 1; i <= totalPDFPages; i++) { 
                  pdf.addPage(PDF_Width, PDF_Height);
                  pdf.addImage(imgData, 'PDF', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
              }

              //Salva o formulario
              offering = offering.replace('-', '_');
              nameChosen = class_code.concat("_", offering, "_", forWhom);
              var url = "<?php echo site_url('offerings/addNewDocument/');?>";
              var url = String(url+'.pdf/'+nameChosen+'/'+forWhom);
              console.log(url);

              var formData = btoa(pdf.output()); 
              
              $.ajaxSetup({async:false});
              $.ajax({
                  type: "POST",
                  enctype: "multipart/form-data",
                  url: url,
                  data: formData,
                  processData: false, // impedir que o jQuery tranforma a "data" em querystring
                  contentType: false, // desabilitar o cabeçalho "Content-Type"
                  cache: false, // desabilitar o "cache"
                  //timeout: 600000, // definir um tempo limite (opcional)
                  //contentType: "application/json; charset=utf-8",
                  // manipular o sucesso da requisição
                  success: function (data) {
                    $.post("<?php echo site_url('offerings/deleteAnswers/');?>", {id:idUser},
                      function(data, status) {
                          if (status) {
                            // console.log(data);
                            //location.reload();
                            hideQuest();
                          } else {
                              swal({
                              title: 'Não permitido!',
                              text: 'Erro desconhecido. Entre em contato com o administrador do sistema.',
                              icon: 'error',
                              buttons : {
                                  confirm: {
                                  className : 'btn btn-danger'
                                  }
                              }
                              }).then(function(){
                              swal.close();
                              location.reload();
                              });// fecha o swal
                          } //fecha o else
                      }// fecha a função callback
                    );
                  },
                  // manipular erros da requisição
                  error: function (e) {
                    swal({
                    title: 'Erro ao salvar documento!',
                    text: 'Erro desconhecido. Entre em contato com o administrador do sistema.',
                    icon: 'error',
                    buttons : {
                        confirm: {
                        className : 'btn btn-danger'
                        }
                    }
                    }).then(function(){
                    swal.close();
                    location.reload();
                    });// fecha o swal
                  }
              });
            });
          }            
        break;

        default:
        swal("Operação cancelada!");
        break;
      }

    }); // fecha o then
    
  }

    

  function removeOptions(selectElement) {
      var i, L = selectElement.options.length - 1;
      for(i = L; i >= 0; i--) {
          selectElement.remove(i);
      }
  }

  function changeActiveTab(active_tab, active_tab_content){
    if(active_tab_content == "tabs-2"){
      showQuest();
    }
    if(active_tab_content == "tabs-3"){
      showQuestPar();
    }

    if(active_tab_content == "tabs-4"){
      showStatistics(document.getElementById('id_oferecimentos').value, document.getElementById('estatisticas'), 'a');
    }

    localStorage.setItem('last_tab', active_tab);
    localStorage.setItem('last_tab_content', active_tab_content);
  }

  $(document).ready(function() {

    //Carrega a tab atual ao recarregar a página
    var last_tab = localStorage.getItem("last_tab");
    var last_tab_content = localStorage.getItem("last_tab_content");
    if(last_tab_content == "tabs-2"){
      showQuest();
    }

    if(last_tab_content == "tabs-3"){
      showQuestPar();
    }

    if(last_tab_content == "tabs-4"){
      showStatistics(document.getElementById('id_oferecimentos').value, document.getElementById('estatisticas'), 'a');
    }

    if(last_tab === null){
        last_tab = "v-pills-createquest-tab-icons";
        last_tab_content = "tabs-1";
    }else if(last_tab_content === null){
        last_tab_content = "tabs-1";
    }

    document.getElementById(last_tab).className = "nav-link active";
    document.getElementById(last_tab_content).className = "tab-pane fade active show";
    // Attempt to restore from local storage
    try {
      var header = JSON.parse(window.localStorage.header);
      var rows = JSON.parse(window.localStorage.rows);
      buildTable(header, rows);
      $('p.message').append('<br/><em>' + window.localStorage.date + '</em>');
    } catch (err) {}

  });
</script>
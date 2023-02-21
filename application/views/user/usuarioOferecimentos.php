<!-- configurações Tabela -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/dataTables.bootstrap.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.0/moment.min.js'></script>
<link type="text/css" href="<?php echo base_url('assets/css/dataTables.min.css');?>" rel="stylesheet" />
<link type="text/css" href="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/css/dataTables.checkboxes.css" rel="stylesheet" />
<script type="text/javascript" src="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>
<style>
  body{
  }

  .table thead{
    background-color: rgb(21,114,232);
    color: white;
  }

  .table-hover tbody tr:hover td{
    background-color: rgba(21,114,232,0.2);
  }

  .btn-warning{
    background-color: white;
  }

  .fa-solid{
    color:rgb(21,114,232);
  }

  .fa-solid:hover{
    color:rgb(21,114,232,0.2);
  }

  .fa-solid, .fas, #olho{
    font-size: 20px;
  }

  #olho{
    color: rgba(0,0,0,0.5)
  }

  #olho:hover{
    color: rgba(0,0,0,0.8)
  }

  #lapis{
    color: rgba(200,200,20,1);
  }

  #lapis:hover{
    color: rgba(230,230,20);
  }

  .fa-solid:hover, .fas:hover, #olho:hover{
    font-size: 20px;
    background-color: rgba(0,0,0,0) !important;
  }

  .btn-light, .btn-light:hover{
    background-color: rgba(235,235,235,0.0) !important;
  }

  .table-modal{
    background-color: rgba(235,235,235,0.4);
    border-collapse: separate;
    border-spacing: 10px;
  }
  
  #td, #td .btn-light{
    padding:0;
    
    text-align: center;
  }

  #td{
    width: 10px;
  }

  #td-lc{
    display:none;
  }

  .label_doc_name{
    border: 1px solid #ccc;
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
    text-transform: lowercase !important;
    color: blue !important;
  }
</style>
<div class="main-panel">
  <div class="content">

    <div class="page-inner">

      <div class="page-header">
        <h4 class="page-title">Usuários</h4>

        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="<?php echo base_url('dashboard')?>">
                    <i class="flaticon-home"></i>
                    &nbspInício
                </a>
            </li>

            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>

            <li class="nav-item">
                <a href="<?php echo base_url('users')?>">Gerenciar usuários</a>
            </li>

            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>

            <li class="nav-item">
                <a href="#">Oferecimentos do usuário</a>
            </li>
        </ul>

      </div>

      <br>

      <div class="page-body">
        <div class="card full-height">
          <div class="card-header">
            <div class="row">
              <!-- Título -->
              <div class="col-md-6" style="margin-bottom:20px;">
                  <div class="card-title fw-mediumbold">Oferecimentos ativos para o usuário</div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                <div class="row">
                  <div class="col-sm-12">
                    <table id="offerings_table" class="responsive display table table-striped table-hover dataTable">
                      <thead>
                        <tr>
                          <th>Código</th>
                          <th>Disciplina</th>
                          <th>Bloco</th>
                          <th>Curso</th>
                          <th style='width : 10px'><input type="checkbox" onclick="toggle(this)" ></input></th>
                        </tr>
                      </thead>
                    <?php
                      foreach($oferecimentos_ativos as $oferecimento){
                        if($oferecimento->nome_bloco){$nome_bloco = $oferecimento->nome_bloco;}else{$nome_bloco = '';};
                        echo'<tr>
                        <td>'.$oferecimento->ano.'-'.$oferecimento->semestre.'</td>
                        <td>'.$oferecimento->codigo_disciplina.'/'.$oferecimento->nome_disciplina.'</td>
                        <td>'.$nome_bloco.'</td>
                        <td>'.$oferecimento->nome_curso.'</td>
                        <td><input type="checkbox" name="selectOffering" id= "checkbox_'.$oferecimento->id.'"value="'.$oferecimento->id.'" onclick="changeUsuarioHasOferecimentos(this)"></input></td>
                      </tr>';
                      }
                    ?>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function () {
    var table = $('#offerings_table').DataTable( {
      columns: [
        null,
        null,
        null,
        null,
        { orderable: false }
      ]
    });

    // Marcar os oferecimentos que estão ligados ao usuário
    $.ajaxSetup({async:false});
      $.post("<?php echo site_url('users/getUsuarioOferecimentosAtivos');?>",{id_usuario:<?php echo $id_usuario;?>}, 
        function(data){
          oferecimentosUsuario = JSON.parse(data);

          for (let key in oferecimentosUsuario){
            var checkbox = 'checkbox_' + oferecimentosUsuario[key]['id'];
            var checkboxElement = document.getElementById(checkbox);
            checkboxElement.checked = true;
          }
        }
      );
  });

  function toggle(source) {
    checkboxes = document.getElementsByName('selectOffering');
    for(var i=0, n=checkboxes.length;i<n;i++) {
      checkboxes[i].checked = !source.checked;
      checkboxes[i].click();
    }
  }

  function changeUsuarioHasOferecimentos(source){
    var id_oferecimento = source.id.split('_')[1];
    $.ajaxSetup({async:false});
    $.post("<?php echo site_url('users/setUsuarioHasOferecimento');?>",{id_usuario:<?php echo $id_usuario;?>, id_oferecimento: id_oferecimento, inserirDado: source.checked}, 
      function(data){
        if(!data){
          swal({
            title: 'Erro!',
            text: 'Algum problema foi encontrado.',
            icon: 'error',
            buttons : {
                confirm: {
                className : 'btn btn-danger'
                }
            }
            //swal.close();
            }).then(function(){ 
                location.reload();
            }
          );// fecha o swal
        }
      }
    );
  }
</script>

	
</body>
</html>
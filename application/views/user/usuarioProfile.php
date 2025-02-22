<style>
  .profile{
    padding-left: 15%;
    padding-right: 15%;
    padding-top: 3%;
  }
</style>

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
              <div class="page-header">
                  <h4 class="page-title">Perfil</h4>
                  <ul class="breadcrumbs">
                    <li class="nav-home">
                      <a href="<?php echo base_url('dashboard_hans')?>">
                      <i class="flaticon-home"></i>
                        &nbspInício
                      </a>
                    </li>
                    <li class="separator">
                      <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                      <a href="">&nbspPerfil</a>
                    </li>
                  </ul>
              </div>

            


            <div class="card">
              <div class="card-header">
                <div class="d-flex align-items-center">
                  <h4 class="card-title">Atualizar senha</h4>
                </div>
              </div>
              
              <div class="card-body">
                <div class="profile">
                  <table width=100% class="table-modal">
                  
                  <tr>
                  <th><?php echo form_label('Senha atual:*','senhaat');
                  $senhaat = [
                    'name'  => 'senhaat',
                    'id'    => 'senhaat',
                    'class' => 'form-control',
                    'maxlength' => '50',
                    'minlength' => '4',
                    'type' => 'password',
                    'onkeypress' => 'CheckSpace(event)'
                  ];
                  echo form_input($senhaat,'');?></th>
                  </tr>
                  <tr>
                  <th><?php echo form_label('Senha nova:*','senhanova');
                  $senhanova = [
                    'name'  => 'senhanova',
                    'id'    => 'senhanova',
                    'class' => 'form-control',
                    'maxlength' => '50',
                    'minlength' => '4',
                    'onkeypress' => 'CheckSpace(event)'
                  ];
                  echo form_input($senhanova,'');?></th>
                  </tr>
                  <tr>
                  <th><?php echo form_label('Confirmar senha:*','senhanova2');
                  $senhanova2 = [
                    'name'  => 'senhanova2',
                    'id'    => 'senhanova2',
                    'class' => 'form-control',
                    'maxlength' => '50',
                    'minlength' => '4',
                    'onkeypress' => 'CheckSpace(event)'
                  ];
                  echo form_input($senhanova2,'');?></th>
                  </tr>
                  
                  <tr>
                  <th colspan="3"  style="padding-top: 5%;text-align:center"><?php 
                  $botao = [
                    'class' => 'btn btn-warning',
                    'type' => 'submite',
                    'content' => 'Atualizar senha'
                  ];
                  echo form_button($botao);?></th>

                  <?php 
                  $senhaconf = [
                    'name'  => 'senhaconf',
                    'id'    => 'senhaconf',
                    'class' => 'form-control',
                    'maxlength' => '50',
                    'minlength' => '4',
                    'type' => 'hidden'
                  ];
                  
                    
                  $id = [
                    'name'  => 'id',
                    'id'    => 'id',
                    'class' => 'form-control',
                    'maxlength' => '250',
                    'readonly' => 'readonly',
                    'type' => 'hidden'
                  ];
                  ?>
                  </tr>
                
                  <?php echo form_close();?>
                  </table>

                </div>
              </div>
            </div>
    


        </div>
    </div>
</div>


<script>

  function CheckSpace(event){
    if(event.which ==32){
      event.preventDefault();
      return false;
    }
  }

  document.getElementById("login").addEventListener("blur", function() {
    login = document.getElementById("login").value;
    matricula = document.getElementById("matricula").value;
    //console.log(login,matricula);
    $.post("<?php echo site_url('users/verificaLogin');?>", {login: login,matricula: matricula},
    function(data, status){
      if (data == 1){
        // Já existe esse login cadastrado
        login_campo = document.getElementById("login");
        login_campo.setAttribute('class','form-control is-invalid');
        document.getElementById("atualizar_dados").disabled = true;
        swal("Erro", 'Nome de usuário já existente', {icon:'error'});
      } else {
        login_campo = document.getElementById("login");
        login_campo.setAttribute('class','form-control');
        document.getElementById("atualizar_dados").disabled = false;
      }
    });
  });

  // Máscara para Telefone -----------------------------
  // Garantir que só irá ser digitado números no campo
  var input = document.querySelector("#telefone");
  input.addEventListener("keypress", function(e) {
      if(!checkChar(e)) {
        e.preventDefault();
    }
  });
  function checkChar(e) {
      var char = String.fromCharCode(e.keyCode);
    
    //console.log(char);
      var pattern = '[0-9]';
      if (char.match(pattern)) {
        return true;
    }
  }

  // Máscara
  document.getElementById('telefone').addEventListener('input', function (e) {
    var x = e.target.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,5})(\d{0,4})/);
    e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
  });

  // Transformar valores numéricos do banco no formato de telefone
  $(document).ready(function() {
    var telefone = document.querySelector("#telefone");
    var telefoneValue = telefone.value;
    const chars = telefoneValue.split("");
    var newTelefone = "(" + chars[0] + chars[1] + ") " + chars[2] + chars[3] + chars[4] + chars[5] + chars[6] + "-"  + chars[7] + chars[8] + chars[9] + chars[10];
    telefone.value = newTelefone;

    //console.log(newTelefone);
  });

  function attProfile() {
    // Pegar todas variaveis do formulário
    var matricula = document.getElementById("matricula").value;
    var nome = document.getElementById("nome").value;
    var nome_social = document.getElementById("nome_social").value;
    var login = document.getElementById("login").value;
    var telefone = document.getElementById("telefone").value;
    var email = document.getElementById("email").value;
    var id_curso = document.getElementById("id_curso").value;
    var turma = document.getElementById("turma").value;
    var ano_de_ingresso = document.getElementById("ano_de_ingresso").value;
    var data_de_nascimento = document.getElementById("data_de_nascimento").value;

    // outras variaveis
    var id = document.getElementById("id").value;
    var ativo = document.getElementById("ativo").value;
    var papel = document.getElementById("papel").value;
    var senha = "<?php echo $usuario['senha']; ?>";

    // Tratamento do ZERO
    if (id_curso == "") {
      id_curso = undefined;
    }
    if (ano_de_ingresso == "") {
      ano_de_ingresso = undefined;
    }
    if (data_de_nascimento == "") {
      data_de_nascimento = undefined;
    }
    if (telefone == ""){
      telefone = undefined;
    } else {
      const chars = telefone.split("");
      var newTelefone = chars[1] + chars[2] + chars[5] + chars[6] + chars[7] + chars[8] + chars[9] + chars[11] + chars[12] + chars[13] + chars[14];
    }

    // console.log(matricula, nome, nome_social, login, telefone, email, id_curso, turma, ano_de_ingresso, data_de_nascimento);
    // console.log(id, ativo, papel, senha);

    $.ajaxSetup({async:false});
    $.post("<?php echo site_url('users/attProfile');?>", {id:id, matricula:matricula, nome:nome, nome_social:nome_social, login:login, telefone:newTelefone, email:email, id_curso:id_curso, turma:turma, ano_de_ingresso:ano_de_ingresso, data_de_nascimento:data_de_nascimento, ativo:ativo, papel:papel, senha:senha},
    function(data, status){
      if(data){
        swal({
            title: 'Sucesso!',
            text: 'A ação foi executada com sucesso!',
            icon: 'success',
            buttons : {
                confirm: {
                className : 'btn btn-info'
                }
            }
            }).then(function(){ 
                location.reload();
            });
      }else{
        swal("Erro", 'Houve erro ao atualizar perfil', {icon:'error'});
      }
    });
  }
</script>


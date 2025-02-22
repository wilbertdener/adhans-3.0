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





        <!--Novo paciente-->
      <div class="card-header py-3">
        <div class="row">   
          <div class="col-md-10">
          <h4 class="card-title">Gerenciar usuarios</h4>
          </div>
          <div class="col-md-2">

            <button id="addUs" data-toggle="modal" data-target="#modalNewUser" data-id="add" class="open-AddUser btn btn-success float-right btn-round" style="background:#7927A5!important" title="Inserir Usuário">
                <span class="btn-label">
                    <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                </span>&nbsp;Adicionar usuário
            </button>

                
          </div>
        </div>
          </div>
          <div class="container-fluid modal fade" id="modalNewUser" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="row justify-content-center" style="margin-bottom:20px;margin-top:20px;">
            
                <div class="col-sm-10 col-sm-offset-1 col-md-10 col-lx-6 col-md-offset-3 main" style="background-color:#fff; padding:20px;border-radius:10px;">
                    <div class = "modal-content">
                        
                        <div class="modal-header no-bd" >
                            <h1 class="modal-title" id="modalNewUserTitle">
                                <span class="fw-mediumbold">
                                Adicionar novo usuário</span> 
                                
                            </h1>
                            
                            <button type="button" class="close" data-dismiss="modal" data-bs-dismiss="modal" aria-label="Close" onclick="reload()" >
                                <span aria-hidden="true" >&times;</span>
                                
                            </button>
                            

                        </div>
                    
                        <div class="modal-body">

                            <p></p>
                            <form action="/action_page.php">

                                <p>Login</p>
                                <input type="text" class="form-control form-control-user" id="new_login" placeholder="Nome completo" value=""><br>
                                <p>Senha</p>
                                <input type="text" class="form-control form-control-user" id="new_senha"  value=""><br>
                                <p>Email</p>
                                <input type="text" class="form-control form-control-user" id="new_email" placeholder="Resumo" value=""><br>
                                <p>Nome</p>
                                <input type="text" class="form-control form-control-user" id="new_nome" placeholder="Nome completo" value=""><br>
                                <p>Nome Social</p>
                                <input type="text" class="form-control form-control-user" id="new_nomesoc"  value=""><br>
                                <p>Data de nascimento</p>
                                <input type="date" class="form-control form-control-user" id="new_data" placeholder="Resumo" value=""><br>
                                <p>Tipo de usuario</p>
                                <input type="radio" id="admin" name="papel" value="admin">
                                <label for="admin">Administrador</label><br>
                                <input type="radio" id="normal" name="papel" value="">
                                <label for="normal">Usuario padrão</label><br>
                                
                                
                            </form>
                            

                        </div>

                        <div class="modal-tail" >
                            <p align="right">
                                <input type="submit" class="btn btn-primary btn-lg" style="background:#7927A5!important" onclick="setuser()" >
                            </p>
                        </div>

                        
                        
                    </div>
                </div>
            </div>
        </div>




















            <div class="page-body">
                <div class="card full-height">
                    <div class="col-md-12">
                            
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card full-height">
                    <div class="col-md-12">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title">Atualizar dados</h4>
                                </div>
                            </div>
                            <div class="card-body">
                              <div class="profile">
                                <!-- <form action="<?php //echo base_url('users/attProfile'); ?>" method="post"> -->
                                <table width="100%" class="table-modal">
                                  <?php //echo var_dump($usuario); ?>
                                  <tr>
                                    <input name="id" id="id" class="form-control" maxlength="250" readonly="readonly" type="hidden" value="<?php echo $usuario['id']?>"></input>
                                    <input name="ativo" id="ativo" class="form-control" maxlength="250" readonly="readonly" type="hidden" value="<?php echo $usuario['ativo']?>"></input>
                                    <input name="papel" id="papel" class="form-control" maxlength="250" readonly="readonly" type="hidden" value="<?php echo $usuario['papel']?>"></input>
                                    <input name="senha" id="senha" class="form-control" maxlength="250" readonly="readonly" type="hidden" value="<?php echo $usuario['senha']?>"></input>
                                  </tr>

                                  <tr>
                                    <th>
                                      <div class="form-group">
                                        <label class="control-label" for="matricula">
                                          Matrícula:
                                        </label>
                                        <input name="matricula" id="matricula" class="form-control" maxlength="50" readonly="readonly"  value="<?php echo $usuario['matricula']?>"></input>
                                      </div>
                                    </th>
                                    <th>
                                      <div class="form-group">
                                        <label class="control-label" for="nome">
                                          Nome:
                                        </label>
                                        <input name="nome" id="nome" class="form-control" maxlength="250" placeholder="nome" value="<?php echo $usuario['nome']?>"></input>
                                      </div>
                                    </th>
                                  </tr>

                                  <tr>
                                    <th>
                                      <div class="form-group">
                                        <label class="control-label" for="nome_social">
                                          Nome social:
                                        </label>
                                        <input name="nome_social" id="nome_social" class="form-control"  value="<?php echo ($usuario['nome_social']==NULL?'-':$usuario['nome_social'])?>"></input>
                                      </div>
                                    </th>
                                    <th>
                                      <div class="form-group">
                                        <label class="control-label" for="login">
                                          Login:
                                        </label>
                                        <input name="login" id="login" class="form-control" maxlength="250"  value="<?php echo $usuario['login']?>"></input>
                                      </div>
                                    </th>
                                  </tr>

                                  <tr>
                                    <th>
                                      <div class="form-group" id="tel_div">
                                        <label class="control-label" for="telefone">
                                          Telefone:
                                        </label>
                                        <input name="telefone" id="telefone" class="form-control" maxlength="15" type="text" value="<?php echo $usuario['telefone']?>" placeholder="(XX) 99999-9999"></input>
                                      </div>
                                    </th>
                                    <th>
                                      <div class="form-group">
                                        <label class="control-label" for="email">
                                          Email:
                                        </label>
                                        <input name="email" id="email" class="form-control" maxlength="250"  value="<?php echo ($usuario['email']==NULL?'-':$usuario['email'])?>"></input>
                                      </div>
                                    </th>
                                  </tr>

                                  <tr>
                                    <th>
                                      <div class="form-group">
                                        <label class="control-label" for="id_curso">
                                          ID Curso:
                                        </label>
                                        <input name="id_curso" id="id_curso" class="form-control" maxlength="50"  type="number" value="<?php echo $usuario['id_curso']?>"></input>
                                      </div>
                                    </th>
                                    <th>
                                      <div class="form-group">
                                        <label class="control-label" for="turma">
                                          Turma:
                                        </label>
                                        <input name="turma" id="turma" class="form-control" maxlength="250"  value="<?php echo ($usuario['turma']==NULL?'-':$usuario['turma'])?>"></input>
                                      </div>
                                    </th>
                                  </tr>

                                  <tr>
                                    <th>
                                      <div class="form-group">
                                        <label class="control-label" for="ano_de_ingresso">
                                          Ano Ingresso:
                                        </label>
                                        <input name="ano_de_ingresso" id="ano_de_ingresso" class="form-control" type="number" min="1900" max="9999" value="<?php echo $usuario['ano_de_ingresso']?>"></input>
                                      </div>
                                    </th>
                                    <th>
                                      <div class="form-group">
                                        <label class="control-label" for="data_de_nascimento">
                                          Data de Nascimento:
                                        </label>
                                        <input name="data_de_nascimento" id="data_de_nascimento" class="form-control" maxlength="250"  type="date" value="<?php echo $usuario['data_de_nascimento'] ?>"></input>
                                      </div>
                                    </th>
                                  </tr>

                                  <tr>
                                    <th colspan="2"  style="padding-top:5% ;text-align:center">
                                      <button class="btn btn-warning"  onclick="attProfile()">Atualizar Dados</button>
                                    </th>
                                  </tr>

                                </table>
                              </div>
                            </div>
                    </div>
                </div>
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
                  <?php
                  echo form_open('users/attSenha/');?>
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
                  echo form_input($senhaconf,$usuario['senha']);
                    
                  $id = [
                    'name'  => 'id',
                    'id'    => 'id',
                    'class' => 'form-control',
                    'maxlength' => '250',
                    'readonly' => 'readonly',
                    'type' => 'hidden'
                  ];
                  echo form_input($id,$usuario['id']);?>
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


  function setuser(){
    
    var login = document.getElementById("new_login").value;
    var senha = document.getElementById("new_senha").value;
    var email = document.getElementById("new_email").value;
    var nome = document.getElementById("new_nome").value;
    var nomesoc = document.getElementById("new_nomesoc").value;
    var data = document.getElementById("new_data").value;
    

    var papel = document.getElementByName("papel").value;

    $.post("<?php echo site_url('profile/setuser/');?>", {id_login:login,id_senha:senha,id_email:email,id_nome:nome,id_nomesoc:nomesoc,id_data:data,id_papel:papel},
    
    );
    location.reload();

    

  }
</script>


<style>
    /* Set a background image by replacing the URL below */
    body {
      /*background: url(<?php //echo base_url('dist/img/login_bg.jpeg') ?>) no-repeat center center fixed;*/
      background-color: #792796;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      background-size: cover;
      -o-background-size: cover;
    }
</style>

<body>

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body">
              <!-- Nested Row within Card Body -->
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">ADHans </h1>
                  </div>

                  <?php if(isset($alerta)){ ?>
                    <div class="alert alert-<?php echo $alerta['class']; ?>">
                        <?php echo $alerta['mensagem']; ?>
                    </div>
                  <?php }?>

                  <form class="user" action="<?php echo base_url('login/login_user'); ?>" method="post">
                    <input type="hidden" name="captcha">
                    <div class="form-group">
                      <input name="login" class="form-control form-control-user" id="login" placeholder="Digite seu ID de usuário..." required>
                    </div>
                    <div class="form-group">
                      <input name="senha" type="password" class="form-control form-control-user" id="senha" placeholder="Senha" required>
                    </div>

                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck" >
                        <label class="custom-control-label" for="customCheck">Lembrar senha</label>
                      </div>
                    </div>

                    <div class="form-group" >
                      <button style = "background:#792796!important; border-color:#792796!important" type="submit" name="entrar" value="entrar" class="btn btn-primary btn-user btn-block" >Entrar</button>
                    </div>
                  </form>
                  
                  <hr>
                  <div class="text-center">
                    <a class="small" style = "color:#792796"href="<?php echo base_url('login/forgot'); ?>">Esqueceu sua senha?</a>
                  </div>
                </div>
          </div>
        </div>

      </div>

    </div>

  </div>

</body>

</html>
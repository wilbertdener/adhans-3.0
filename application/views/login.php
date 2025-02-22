<style>
    /* Set a background image by replacing the URL below */
    body {
      /*background: url(<?php //echo base_url('dist/img/login_bg.jpeg') ?>) no-repeat center center fixed;*/
      background-color: #B319D0;
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
                    <h1 class="h4 text-gray-900 mb-4" style="color: #B319D0; font-size: 60px; font-family: Bookman Old Style, sans-serif; font-weight: bold;">ADHans </h1>
                  </div>
                  
                  <div class="text-center">
                  <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src= <?php echo '/adhans/img/logo.bmp' ?> alt="...">
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

                    


                    <div class="form-group" >
                      <button style = "background:#B319D0!important; border-color:#B319D0!important" type="submit" name="entrar" value="entrar" class="btn btn-primary btn-user btn-block" >Entrar</button>
                    </div>
                  </form>
                  
                  <hr>
                  <div class="text-center">
                    <a class="small" style = "color:#B319D0"href="<?php echo base_url('login/forgot'); ?>">Esqueceu sua senha?</a>
                  </div>
                </div>
          </div>
        </div>

      </div>

    </div>

  </div>

</body>

</html>
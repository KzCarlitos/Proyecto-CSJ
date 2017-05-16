<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CSJ-Consultas Judiciales | </title>

    <!-- Bootstrap -->
    <link href="<?=  base_url()?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?=  base_url()?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?=  base_url()?>assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?=  base_url()?>assets/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?=  base_url()?>assets/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
              <form method="post" action="<?php echo base_url('index.php/Inicio/login/');?>">
              <h1>Bienvenido a CSJ</h1>
              <div>
                  <input type="text" name="user" class="form-control" placeholder="Usuario" required="" />
              </div>
              <div>
                  <input type="password" name="pass" class="form-control" placeholder="Contraseña" required="" />
              </div>
              <div>
                  <input type="submit" value="Acceder" class="btn btn-default submit">
                
                <?php echo anchor("Inicio/reset", "¿Has olvidado tu contraseña?", "class='reset_pass'") ?>
                 
              </div>

              <div class="clearfix"></div>
              
              
              <div class="separator">
                <?php if(isset($error)){echo "El usuario o la contraseña son incorrecto";}?>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-balance-scale"></i> Consultas Judiciales</h1>
                  <p>©2017 All Rights Reserved. Proyecto Final 2DAW. Carlos Ojeda Pichardo</p>
                </div>
              </div>
            </form>
          </section>
        </div>

       
      </div>
    </div>
  </body>
</html>


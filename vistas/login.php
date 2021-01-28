<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Hospital Nuestra Familia</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../public/css/font-awesome.css">
   
    <!-- Theme style -->
    <link rel="stylesheet" href="../public/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../public/css/blue.css">
    <link rel="stylesheet" href="../public/css/centrar.css">
    
    <link rel="shortcut icon" href="../files/img/LOGO.png">

  </head>
  <body class="hold-transition login-page fondo">
    <div class="login-box">
      <div class="login-logo">
        <b class="estilo">HOSPITAL NUESTRA FAMILIA</b>
      </div>
      <div class="login-box-body">
        
        <p class="login-box-msg" style="font-size: 40px;" >LOGIN</p>
        <div class="container-img">
        <img src="../files/img/LOGO.png" height="90" width="150">
        </div>
        <br>
        <form method="post" id="frmAcceso">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" id="logina" name="logina" placeholder="Username" required >
            <span class="fa fa-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" id="clavea" name="clavea" class="form-control" placeholder="Password" required>
            <span class="fa fa-key form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <select name="rol_idrol" id="rol_idrol"class="form-control"></select>
          </div>
          <div class="row">
            <div class="col-xs-8">

            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
            </div><!-- /.col -->
          </div>
        </form>

        
        <a href="#"> <u> Olvidé mi password</u></a><br>

        <a href="registro.php">Crear Cuenta</a><br>
        

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="../public/js/jquery-3.1.1.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../public/js/bootstrap.min.js"></script>
    <!-- Bootbox -->
    <script src="../public/js/bootbox.min.js"></script>
    <script type="text/javascript" src="scripts/login.js"></script>
    <script type="text/javascript" src="scripts/rol.js"></script>
  </body>
</html>
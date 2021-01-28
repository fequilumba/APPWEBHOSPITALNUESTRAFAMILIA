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
        <!--<b class="estilo">HOSPITAL NUESTRA FAMILIA</b>-->
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        
        <p class="login-box-msg" style="font-size: 25px;" >REGISTRO</p>
        <div class="container-img">
        <img src="../files/img/LOGO.png" height="50" width="90">
        </div>
        <br>
        <form method="post" id="frmRegistro">
          <div class="form-group has-feedback">
            <label for="">Cédula</label>
            <input type="text" class="form-control" id="cedula" name="cedula" placeholder="Cédula" required>
            <span class="form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <label for="">Nombres</label>
            <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres" required>
            <span class="form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <label for="">Apellidos</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos" required>
            <span class="form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <label for="">Email</label>
            <input type="text" name="email" id="email" maxlength="45" class="form-control"  placeholder="email@address.com" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" required>
            </div>                  
          <div class="form-group has-feedback">
            <label for="">Teléfono</label>
            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" required>
            <span class="form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <label for="">Dirección</label>
            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección" required>
            <span class="form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <label for="">Ciudad de Residencia</label>
            <input type="text" class="form-control" id="ciudad_residencia" name="ciudad_residencia" placeholder="Ciudad" required>
            <span class="form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <label for="">Fecha de nacimiento</label>
            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
          </div>
          <div class="form-group has-feedback">
            <label for="">Género</label>
            <br>
            <label for="">Hombre </label>
            <input type="radio" name="genero" value="M" id="masculino">
            <label for=""> Mujer</label>
            <input type="radio" name="genero" value="F" id="femenino">
          </div>
          <div class="form-group has-feedback">
            <label>Imagen:</label>
            <input type="file" class="form-control" name="imagen" id="imagen" accept="image/x-png,image/gif,image/jpeg">
            <span class="fa fa-camera form-control-feedback"></span>
          </div>

          <!--<div class="form-group has-feedback">
            <input type="password" id="clavea" name="clavea" class="form-control" placeholder="Password">
            <span class="fa fa-key form-control-feedback"></span>
          </div>-->
          <div class="row">
            <div class="col-xs-8">

            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Registrarse</button>
            </div><!-- /.col -->
          </div>
        </form>

        <a href="login.php"> <u>LOG IN</u></a><br>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="../public/js/jquery-3.1.1.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../public/js/bootstrap.min.js"></script>
    <!-- Bootbox -->
    <script src="../public/js/bootbox.min.js"></script>
    <script type="text/javascript" src="scripts/registro.js"></script>
  </body>
</html>

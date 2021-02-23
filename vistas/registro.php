<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Hospital Nuestra Familia</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../public/AdminLTE/plugins/fontawesome-free/css/all.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../public/css/blue.css">
    <link rel="stylesheet" href="../public/css/centrar.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../public/AdminLTE/dist/css/adminlte.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../public/AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="shortcut icon" href="../files/img/LOGO.png">

  </head>
  <body class="hold-transition login-page fondo">
    <div class="login-box">
      <div class="login-logo">
        <!--<b class="estilo">HOSPITAL NUESTRA FAMILIA</b>-->
      </div><!-- /.login-logo -->
      
      
      
      <!-- Horizontal Form -->
      <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">REGISTRO</h3>
                <div class="text-right">
                    <img src="../files/img/LOGO.png" height="40" width="70">
                  </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" method='POST' action='' id="frmRegistro">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="" class="col-sm-5 col-form-label">Cédula(*)</label>
                    <div class="col-sm-12">
                    <input type="text" class="form-control" maxlength="10" minlength="10" id="cedula" name="cedula" onkeypress="return soloNumeros(event)" placeholder="Cédula" required>  
                    <span class=""></span>  
                  </div>
                    
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-sm-5 col-form-label">Nombres(*)</label>
                    <div class="col-sm-12">
                    <input type="text" class="form-control" id="nombres" name="nombres" onkeypress="return soloLetras(event)"  placeholder="Nombres" required>                    
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-sm-5 col-form-label">Apellidos(*)</label>
                    <div class="col-sm-12">
                    <input type="text" class="form-control" id="apellidos" name="apellidos" onkeypress="return soloLetras(event)" placeholder="Apellidos" required>                    
                  </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-sm-5 col-form-label">Email(*)</label>
                    <div class="col-sm-12">
                    <input type="text" name="email" id="email" maxlength="45" class="form-control"  placeholder="email@address.com" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-sm-5 col-form-label">Teléfono(*)</label>
                    <div class="col-sm-12">
                    <input type="text" class="form-control" id="telefono" name="telefono" onkeypress="return soloNumeros(event)" placeholder="Teléfono" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-sm-5 col-form-label">Dirección(*)</label>
                    <div class="col-sm-12">
                    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-sm-12 col-form-label">Ciudad de Residencia(*)</label>
                    <div class="col-sm-12">
                    <input type="text" class="form-control" id="ciudad_residencia" onkeypress="return soloLetras(event)"  name="ciudad_residencia" placeholder="Ciudad" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-sm-12 col-form-label">Fecha de nacimiento(*)</label>
                    <div class="col-sm-12">
                    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-sm-5 col-form-label">Género(*)</label>
                    <div class="col-sm-12">
                      <label for="">Hombre </label>
                      <input type="radio" name="genero" value="Masculino" id="masculino">
                      <label for=""> Mujer</label>
                      <input type="radio" name="genero" value="Femenino" id="femenino">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-sm-5 col-form-label">Imagen:</label>
                    <input type="file" class="form-control" name="imagen" id="imagen" accept="image/x-png,image/gif,image/jpeg">
                    <input type="hidden" class="form-control" name="imagenactual" id="imagenactual" accept="image/x-png,image/gif,image/jpeg">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info float-right">Registrarse</button>
                  <a href="login.php" class="float-left">Login</a><br>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->
      
      
      <!--
      <div class="login-box-body">
        
        <p class="login-box-msg" style="font-size: 25px;" >REGISTRO</p>
        <div class="container-img">
        <img src="../files/img/LOGO.png" height="50" width="90">
        </div>
        <br>
        <form method='POST' action='' id="frmRegistro">
          <div class="form-group has-feedback">
            <label for="">Cédula(*)</label>
            <input type="text" class="form-control" maxlength="10" minlength="10" id="cedula" name="cedula" onkeypress="return soloNumeros(event)" placeholder="Cédula" required>
            <span class="fa fa-phone"></span>
          </div>
          <div class="form-group has-feedback">
            <label for="">Nombres(*)</label>
            <input type="text" class="form-control" id="nombres" name="nombres" onkeypress="return soloLetras(event)"  placeholder="Nombres" required>
            <span class="form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <label for="">Apellidos(*)</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos" onkeypress="return soloLetras(event)" placeholder="Apellidos" required>
            <span class="form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <label for="">Email(*)</label>
            <input type="text" name="email" id="email" maxlength="45" class="form-control"  placeholder="email@address.com" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" required>
            </div>                  
          <div class="form-group has-feedback">
            <label for="">Teléfono(*)</label>
            <input type="text" class="form-control" id="telefono" name="telefono" onkeypress="return soloNumeros(event)" placeholder="Teléfono" required>
            <span class="form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <label for="">Dirección(*)</label>
            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección" required>
            <span class="form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <label for="">Ciudad de Residencia(*)</label>
            <input type="text" class="form-control" id="ciudad_residencia" onkeypress="return soloLetras(event)"  name="ciudad_residencia" placeholder="Ciudad" required>
            <span class="form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <label for="">Fecha de nacimiento(*)</label>
            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
          </div>
          <div class="form-group has-feedback">
            <label for="">Género(*)</label>
            <br>
            <label for="">Hombre </label>
            <input type="radio" name="genero" value="Masculino" id="masculino">
            <label for=""> Mujer</label>
            <input type="radio" name="genero" value="Femenino" id="femenino">
          </div>
          <div class="form-group has-feedback">
            <label>Imagen:</label>
            <input type="file" class="form-control" name="imagen" id="imagen" accept="image/x-png,image/gif,image/jpeg">
            <input type="hidden" class="form-control" name="imagenactual" id="imagenactual" accept="image/x-png,image/gif,image/jpeg">
            <span class="fa fa-camera form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">

            </div>
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Registrarse</button>
            </div>
          </div>
        </form>

        <a href="login.php"> <u>LOG IN</u></a><br>

      </div>
    </div>--login-box -->

    <!-- jQuery -->
    <script src="../public/AdminLTE/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="../public/AdminLTE/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../public/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../public/AdminLTE/dist/js/adminlte.min.js"></script>
    <!-- Bootbox -->
    <script src="../public/js/bootbox.min.js"></script>
    <script type="text/javascript" src="scripts/registro.js"></script>
    <script type="text/javascript" src="scripts/validar.js"></script>
  </body>
</html>

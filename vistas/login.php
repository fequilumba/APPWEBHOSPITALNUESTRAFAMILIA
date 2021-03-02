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
    <link rel="stylesheet" type="text/css" href="../public/css/estilo.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../public/AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="shortcut icon" href="../files/img/LOGO.png">

  </head>
  <body class="hold-transition login-page fondo">
      <div class="login-logo">
        <b class="estilo">HOSPITAL NUESTRA FAMILIA</b>
      </div>
    <!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">LOGIN</h3>
                <div class="text-right">
                    <img src="../files/img/LOGO.png" height="40" width="70">
                  </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" method="post" id="frmAcceso">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="" class="col-sm-5 col-form-label">Usuario</label> <br>
                    <div class="col-sm-12 inner-addon left-addon">
                      <i class="glyphicon fas fa-user"></i>
                      <input type="text" class="form-control" id="logina" name="logina" placeholder="Usuario" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-sm-12 col-form-label">Contraseña</label>
                    
                      <div class="col-sm-10 inner-addon left-addon">
                        <i class="glyphicon fas fa-key"></i>
                        <input type="password" id="clavea" name="clavea" class="form-control"placeholder="Contraseña" required>
                        
                      </div>
                      <div class="col-sm-2">
                        
                      <img src="../public/img/mostrar.png" id="boton">                        
                      </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-sm-5 col-form-label"><i class="fas fa-user-tag"></i> Rol</label>
                    <div class="col-sm-12">
                      <select name="rol_idrol" id="rol_idrol"class="form-control"></select>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info float-right">Ingresar</button>
                  <a href="registro.php" class="float-left">Crear Cuenta</a><br>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->
    <script>
      var boton = document.getElementById('boton');
      var input = document.getElementById('clavea');

      boton.addEventListener('click', mostrarContrasenia)

      function mostrarContrasenia() {
        if (input.type == "password") {
          input.type = "text"; 
          boton.src = "../public/img/ocultar.png";
          setTimeout("ocultar()",3000);
        }else{
          input.type = "password"; 
          boton.src = "../public/img/mostrar.png";
        }
      }
      function ocultar() {  
        input.type = "password"; 
        boton.src = "../public/img/mostrar.png";
      }

    </script>
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
    <script type="text/javascript" src="scripts/login.js"></script>
    <script type="text/javascript" src="scripts/rol.js"></script>
    </body>
</html>
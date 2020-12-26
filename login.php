<!DOCTYPE html>
<html lang="en">
<head >
    <meta charset="UTF-8">
    <link rel="icon" href="Vista/Recursos/img/logo.png">
    <link rel="stylesheet" type="text/css" href="Vista/Recursos/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="fonts.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hospital Nuestra Familia</title>
    
    <link rel="stylesheet" href="Vista/Recursos/css/normalize.css">
    <link rel="stylesheet" href="Vista/Recursos/css/estilos.css">
</head>
<body class="fondo-login"> 
  <br>
  <br>
<div class="login-box">
  <div class="img-login" style="text-align: left">
  <img  src="Vista/Recursos/img/logo.png" alt="" style="right: 50px;" >
</div>
  <br>
  <br>
  <h1>LOGIN</h1>
  <form action="Controlador/UsuarioController.php" method="POST">
    <label for="username" >Usuario</label>
    <input type="text" name="usuario" placeholder="Enter Username">
    <label for="password">Password</label>
    <input type="password" name="contrasenia" placeholder="Enter Password" >
    <button >Log In</button>
    <!--<input type="button" value="Log In">
    <a href="#">Lost your Password?</a><br>
    <a href="#">Don't have An account?</a>-->
  </form>
</div>


</body>
</html>
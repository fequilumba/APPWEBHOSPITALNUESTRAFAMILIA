<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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

<body>
  <div class="container-fluid">
    <br>
  
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#"><img class="logo" src="Vista/Recursos/img/logo.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            
            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Hospital
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Historia</a>
                  <a class="dropdown-item" href="#">Misión y Visión</a>
                </div>
            </li>

            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Guía del paciente
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Registrar</a>
                  <a class="dropdown-item" href="#">Buscar</a>
                </div>
            </li>

            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Guía del médico
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Registrar</a>
                  <a class="dropdown-item" href="#">Buscar</a>
                </div>
            </li>

            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Citas
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Registrar</a>
                  <a class="dropdown-item" href="#">Cancelar</a>
                </div>
            </li>

            <li class="nav-item dropdown active">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Visualizar
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Recetas</a>
                <a class="dropdown-item" href="#">Citas</a>
              </div>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="#">Contactos</a>
            </li>
           

          </ul>
          <ul class="navbar-nav mr-auto">
          <li class="nav-item dropdown active">
            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="user" src="Vista/Recursos/img/profile-user.png" alt="">
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Salir</a>
              <a class="dropdown-item" href="#">Configurar</a>
            </div>
          </li>
        </ul>
        </div>
      </nav>

      <br>
      <img class="img-especialidad" src="Vista/Recursos/img/mision-vision.png" alt="Misión y Visión">
      <br>
      <div class="row">
        <br>
        <div class="col-md-4 text-justify contenedor">
          <h2 class="centrar-texto">Misión</h2>
          <div>
            <p class="parrafo">El Hospital “Nuestra Familia, es una entidad privada que promueve la 
              atención de alta calidad y proporciona atención médica basada en principios éticos y morales, 
              con responsabilidad en la atención inmediata a pacientes siguiendo las medidas de seguridad requeridas.
            </p>
          </div>
        </div>

        <div class="col-md-4 text-justify contenedor">
          <h2 class="centrar-texto">Visión</h2>
          <div>
            <p class="parrafo">Ser un referente de salud, calidad y seguridad del paciente a nivel nacional, 
              convirtiéndose en un hospital docente en varias especialidades médicas.
            </p>
          </div>
        </div>

        <div class="col-md-4 text-justify contenedor">
          <h2 class="centrar-texto">Valores</h2>
          <div>
            <p class="parrafo">Los valores fundamentales que se inculcan en nuestra casa de salud se basan en
              el respeto, integridad, transparencia, calidez y calidad hacia nuestros pacientes.
            </p>
          </div>
        </div>

      </div>
    <br>
    <footer class="site-footer">
      <p>Autor: Fausto Quilumba</p>
      <p>Todos los Derechos Reservados 2020 - 2021 &copy;</p>
    </footer>
  </div>
    
        
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
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

    <h1 class="centrar-texto titulo">"HOSPITAL NUESTRA FAMILIA"</h1>   
    <div>
        <p class="parrafo">El Hospital Nuestra Familia  cuenta con acreditación internacional tipo oro otorgada por la prestigiosa organización 

            Acreditación Canadá International (ACI), gracias a los estándares de calidad, calidez y seguridad en sus prácticas 
            
            profesionales</p>
    </div>
    
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="padding-top: 20px;">
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img class="d-block w-100 responsive col-xs-12 col-sm-12 col-md-12 col-lg-12" src="Vista/Recursos/img/doctor-portada.jpg" alt="" height="450px">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100 responsive col-xs-12 col-sm-12 col-md-12 col-lg-12" src="Vista/Recursos/img/odontologia.jpg" alt="" height="450px">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100 responsive col-xs-12 col-sm-12 col-md-12 col-lg-12" src="Vista/Recursos/img/laboratorio.jpg" alt="" height="450px">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class=" carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Siguiente</span>
        </a>
    </div>
    <br> 
    <br>
        <h2 style="text-align: center;">ESPECIALIDADES</h2>
    <br>

    <div class="row">	
        <aside class="col-md-4 text-justify">
            <img class="img-especialidad" src="Vista/Recursos/img/medicina-interna.jpg" alt="Imagen Medicina Interna" width="350px" height="200px">
        <p>
          
          <h3>Medicina Interna</h3>
          Es una especialidad médica que se dedica a la atención integral del adulto enfermo, enfocada al diagnóstico y el 
          tratamiento no quirúrgico de las enfermedades que afectan a sus órganos y sistemas internos, y a su prevención</p>
      </aside>
      
      <aside class="col-md-4 text-justify">
        <img class="img-especialidad" src="Vista/Recursos/img/endocrinologia.jpg" alt="Imagen Endocrinologia" width="350px" height="200px">
      <p>
          <h3>Endocrinología</h3>
          Rama de la medicina que se especializa en el diagnóstico y tratamiento de trastornos del sistema endocrino, 
          que incluye las glándulas y órganos que elaboran hormonas. Estos trastornos incluyen diabetes, infertilidad, 
          y problemas tiroideos, suprarrenales y de la hipófisis.
      </p>
      </aside>       
      
      <aside class="col-md-4 text-justify">
        <img class="img-especialidad" src="Vista/Recursos/img/ginecologia.jpg" alt="Imagen Ginecologia" width="350px" height="200px">
        <p>
          <h3>Ginecología</h3>
          La especialidad de Ginecología y Obstetricia es el campo de la medicina que se ocupa de la salud integral 
          de la mujer, así como de los fenómenos fisiológicos relacionados con la reproducción humana, incluyendo la 
          gestación, el parto y el puerperio.</p>
      </aside>
  </div>
</div>
</body>
</html>
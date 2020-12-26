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
            <a class="navbar-brand" href="index.php"><img class="logo" src="Vista/Recursos/img/logo.png" alt=""></a>
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
                        <a class="dropdown-item" href="historia.php">Historia</a>
                        <a class="dropdown-item" href="misionVision.php">Misión y Visión</a>
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
                        <a class="nav-link" href="contactos.php">Contactos</a>
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
        </nav><!-- Cierre barra navbar -->
        <h1 class="centrar-texto">Contactos</h1>
        <img class="img-contacto" src="Vista/Recursos/img/contactos.png" alt="imagen contacto">
        <br>
        <h2 class="centrar-texto">Llena el formulario de Contacto</h2>
        <br>
        <main class="seccion contenido-centrado">
            <form class="contacto" action="">
                <fieldset class="contenedor">
                    <legend >Información Personal</legend>
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" placeholder="Tu Nombre">
                    <label for="email">E-mail: </label>
                    <input type="email" id="email" placeholder="Tu Correo electrónico" required>
                    <label for="telefono">Teléfono:</label>
                    <input type="tel" id="telefono" placeholder="Tu Teléfono" required>
                    <label for="mensaje">Mensaje: </label>
                    <textarea  id="mensaje"></textarea>
                </fieldset>
                <br>
                <fieldset class="contenedor">
                    <legend>Contacto</legend>
                    <p>Como desea ser Contactado:</p>
                    <div class="forma-contacto">
                        <label for="telefono">Teléfono</label>
                        <input type="radio" name="contacto" value="telefono" id="telefono">
                        <label for="correo">E-mail</label>
                        <input type="radio" name="contacto" value="correo" id="correo">
                    </div>
                    <p>Si elige Teléfono, elija la fecha y la hora</p>
                    <label for="fecha">Fecha:</label>
                    <input type="date" id="fecha">
                    <label for="hora">Hora:</label>
                    <input type="time" id="hora" min="09:00" max="18:00">
                </fieldset>
                <input type="submit" value="Enviar" class="boton boton-celeste">
            </form>
        </main>
        
        </div>
                <br>
                <footer class="site-footer">
                    <p>Autor: Fausto Quilumba</p>
                    <p>Todos los Derechos Reservados 2020 - 2021 &copy;</p>
                </footer>
            </div>
        </div>
        
    </div>
    
        
</body>
</html>
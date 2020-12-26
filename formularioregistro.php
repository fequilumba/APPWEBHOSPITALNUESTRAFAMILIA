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
        </nav><!-- Cierre barra navbar -->

        <h1 class="centrar-texto">Llena el formulario de Registro</h1>
        
        <main class="seccion contenido-centrado">

            <form class="contacto" action="">
                <fieldset class="contenedor">
                    <legend >Información Personal</legend>

                    <label for="cedula">Cédula:</label>
                    <input type="text" id="cedula" placeholder="Tu cédula">

                    <label for="nombre">Nombres:</label>
                    <input type="text" id="nombre" placeholder="Tus Nombres">

                    <label for="apellido">Apellidos:</label>
                    <input type="text" id="apellido" placeholder="Tus Apellidos">

                    <label for="email">E-mail: </label>
                    <input type="email" id="email" placeholder="Tu Correo electrónico" required>

                    <label for="telefono">Teléfono:</label>
                    <input type="tel" id="telefono" placeholder="Tu Teléfono" required>

                    <label for="direccion">Dirección:</label>
                    <input type="direc" id="direccion" placeholder="Tu dirección" required>

                    <label for="ciudadresidencia">Ciudad de Residencia:</label>
                    <input type="ciu_residencia" id="ciudadresidencia" placeholder="Tu ciudad de residencia" required>

                    <label for="fecha_naci">Fecha de Nacimiento:</label>
                    <input type="date" id="fecha_naci">


                    <p>Género:</p>
                    <br>
                   <div class="forma-contacto">
                        <label for="masculino">Masculino</label>
                        <input type="radio" name="contacto" value="masculino" id="masculino">
                        <label for="femenino">Femenino</label>
                        <input type="radio" name="contacto" value="femenino" id="femenino">
                    </div>

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
<?php
//Activamos el almacenamiento en el buffer
ob_start();
session_start();
if(!isset($_SESSION["nombres"])) //si la validable de sesion no existe.. significa que no se ha logeado al sistema
{
  header("Location: login.php");
}else
{
  require 'header.php';
  if ($_SESSION['rol_idrol']==1||$_SESSION['rol_idrol']==2||$_SESSION['rol_idrol']==3) {
?>

<div class="content-wrapper">
  <section class="content">
    <h1 class="titulo">"HOSPITAL NUESTRA FAMILIA"</h1>   
    <div>
      <p class="parrafo">El Hospital "Nuestra Familia"  cuenta con acreditación internacional tipo oro otorgada por la prestigiosa organización 
      Acreditación Canadá International (ACI), gracias a los estándares de calidad, calidez y seguridad en sus prácticas 
      profesionales</p>
    </div>
    
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>

      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="../public/img/doctor-portada.jpg" height=450px alt="First slide">
        </div>

        <div class="carousel-item">
          <img class="d-block w-100" src="../public/img/odontologia.jpg" height=450px alt="Second slide">
        </div>

        <div class="carousel-item">
          <img class="d-block w-100" src="../public/img/laboratorio.jpg" height=450px alt="Third slide">
        </div>
      </div>

      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>

      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <br>
    
    <div >
      <h2 class="titulo">ESPECIALIDADES</h2>
    </div>  
    <div class="row">
      
      <aside class="col-md-4">
        <h3 class="titulo1">Medicina Interna</h3>
        <div class="img">
          <img src="../public/img/medicina-interna.jpg" alt="Imagen Medicina Interna" width="350px" height="200px">
        </div>
        <p class="parrafo">
          Es una especialidad médica que se dedica a la atención integral del adulto enfermo, enfocada al diagnóstico y el 
          tratamiento no quirúrgico de las enfermedades que afectan a sus órganos y sistemas internos, y a su prevención.
        </p>
      </aside>
      
      <aside class="col-md-4">
        <h3 class="titulo1">Endocrinología</h3>
        <div class="img">
          <img src="../public/img/endocrinologia.jpg" alt="Imagen Endocrinologia" width="350px" height="200px">
        </div>
        <p class="parrafo">
          Rama de la medicina que se especializa en el diagnóstico y tratamiento de trastornos del sistema endocrino, 
          que incluye las glándulas y órganos que elaboran hormonas. Estos trastornos incluyen diabetes, infertilidad, 
          y problemas tiroideos, suprarrenales y de la hipófisis.
        </p>
      </aside>       
        
      <aside class="col-md-4">
        <h3 class="titulo1">Ginecología</h3>
        <div class="img">
          <img src="../public/img/ginecologia.jpg" alt="Imagen Ginecologia" width="350px" height="200px">
        </div>
        <p class="parrafo">
          La especialidad de Ginecología y Obstetricia es el campo de la medicina que se ocupa de la salud integral 
          de la mujer, así como de los fenómenos fisiológicos relacionados con la reproducción humana, incluyendo la 
          gestación, el parto y el puerperio.
        </p>
      </aside>
    </div>
  </section><!-- /.content -->

</div
<?php
}
else {
  require 'noacceso.php';
}
  require 'footer.php';
?>
<?php
}
ob_end_flush();
?>
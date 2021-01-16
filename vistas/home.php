<?php
//Activamos el almacenamiento en el buffer
ob_start();
session_start();
if(!isset($_SESSION["nombres"])) //si la validable de sesion no existe.. significa que no se ha logeado al sistema
{
  header("Location: login.html");
}else
{
  require 'header.php';
?>

<div class="content-wrapper">
        
        <!-- Main content -->
        <section class="content">
            <h1 class="centrar-texto titulo">"HOSPITAL NUESTRA FAMILIA"</h1>   
    <div>
        <p class="parrafo">El Hospital "Nuestra Familia"  cuenta con acreditación internacional tipo oro otorgada por la prestigiosa organización 

            Acreditación Canadá International (ACI), gracias a los estándares de calidad, calidez y seguridad en sus prácticas 
            
            profesionales</p>
    </div>
    
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="padding-top: 20px;">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100 responsive col-xs-12 col-sm-12 col-md-12 col-lg-12" src="Recursos/img/doctor-portada.jpg" alt="" height="450px">
        </div>

        <div class="carousel-item">
          <img class="d-block w-100 responsive col-xs-12 col-sm-12 col-md-12 col-lg-12" src="Recursos/img/odontologia.jpg" alt="" height="450px">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100 responsive col-xs-12 col-sm-12 col-md-12 col-lg-12" src="Recursos/img/laboratorio.jpg" alt="" height="450px">
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
    </div><!--Cierre clase carousel-->
    <br> 
    <br>
      <h2 style="text-align: center;">ESPECIALIDADES</h2>
    <br>
    <div class="container">
      <div class="row">	
      
        <aside class="col-md-4 text-justify">
          <img class="img-especialidad" src="Recursos/img/medicina-interna.jpg" alt="Imagen Medicina Interna" width="350px" height="200px">
          <p>
            <h3 style="text-align: center;">Medicina Interna</h3>
              Es una especialidad médica que se dedica a la atención integral del adulto enfermo, enfocada al diagnóstico y el 
              tratamiento no quirúrgico de las enfermedades que afectan a sus órganos y sistemas internos, y a su prevención.
          </p>
        </aside>
      
        <aside class="col-md-4 text-justify">
          <img class="img-especialidad" src="Recursos/img/endocrinologia.jpg" alt="Imagen Endocrinologia" width="350px" height="200px">
          <p>
            <h3 style="text-align: center;">Endocrinología</h3>
            Rama de la medicina que se especializa en el diagnóstico y tratamiento de trastornos del sistema endocrino, 
            que incluye las glándulas y órganos que elaboran hormonas. Estos trastornos incluyen diabetes, infertilidad, 
            y problemas tiroideos, suprarrenales y de la hipófisis.
          </p>
        </aside>       
        
        <aside class="col-md-4 text-justify">
          <img class="img-especialidad" src="Recursos/img/ginecologia.jpg" alt="Imagen Ginecologia" width="350px" height="200px">
          <p>
            <h3 style="text-align: center;">Ginecología</h3>
            La especialidad de Ginecología y Obstetricia es el campo de la medicina que se ocupa de la salud integral 
            de la mujer, así como de los fenómenos fisiológicos relacionados con la reproducción humana, incluyendo la 
            gestación, el parto y el puerperio.
          </p>
        </aside>
      </div>
    </div>
      </section><!-- /.content -->

    </div


<?php
  require 'footer.php';
?>
<?php
}
ob_end_flush();
?>
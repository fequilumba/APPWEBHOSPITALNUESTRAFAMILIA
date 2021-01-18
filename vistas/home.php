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
  //if ($_SESSION['home']==1) {
?>

<div class="content-wrapper">
  <section class="content">
    <h1 class="h1 text-center text-primary">"HOSPITAL NUESTRA FAMILIA"</h1>   
    <div>
      <p class="h4">El Hospital "Nuestra Familia"  cuenta con acreditación internacional tipo oro otorgada por la prestigiosa organización 
      Acreditación Canadá International (ACI), gracias a los estándares de calidad, calidez y seguridad en sus prácticas 
      profesionales</p>
    </div>
    
    <div class="col-md-10 col-md-offset-1">
      <div class="carousel slide" data-ride="carousel" data-type="multi" data-interval="3000" id="myCarousel">
        <div class="carousel-inner">
          
          <div class="item active">
            <div class=""><a href="#"><img src="../public/img/doctor-portada.jpg" class="" height="450px"></a></div>
          </div>

          <div class="item">
            <div class=""><a href="#"><img src="../public/img/odontologia.jpg" class="" height="450px"></a></div>
          </div>

          <div class="item">
            <div class=""><a href="#"><img src="../public/img/laboratorio.jpg" class="" height="450px"></a></div>
          </div>

        </div>
        <a class="left carousel-control" href="#myCarousel" data-slide="prev"><i class="glyphicon-chevron-left"></i></a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next"><i class="glyphicon-chevron-right"></i></a>
        <br>
      </div><!--Cierre clase carousel-->
    </div>
    
    
    
    <div class="row">
      <h2 class="h1 text-center text-primary">ESPECIALIDADES</h2>	
      <aside class="col-md-4 text-justify">
        <h3 style="text-align: center;">Medicina Interna</h3>
        <img class="mx-auto d-block" src="../public/img/medicina-interna.jpg" alt="Imagen Medicina Interna" width="350px" height="200px">
        <p class="h4">
          Es una especialidad médica que se dedica a la atención integral del adulto enfermo, enfocada al diagnóstico y el 
          tratamiento no quirúrgico de las enfermedades que afectan a sus órganos y sistemas internos, y a su prevención.
        </p>
      </aside>
      
      <aside class="col-md-4 text-justify">
        <h3 style="text-align: center;">Endocrinología</h3>
        <img class="img-especialidad" src="../public/img/endocrinologia.jpg" alt="Imagen Endocrinologia" width="350px" height="200px">
        <p class="h4">
          Rama de la medicina que se especializa en el diagnóstico y tratamiento de trastornos del sistema endocrino, 
          que incluye las glándulas y órganos que elaboran hormonas. Estos trastornos incluyen diabetes, infertilidad, 
          y problemas tiroideos, suprarrenales y de la hipófisis.
        </p>
      </aside>       
        
      <aside class="col-md-4 text-justify">
        <h3 style="text-align: center;">Ginecología</h3>
        <img class="img-especialidad" src="../public/img/ginecologia.jpg" alt="Imagen Ginecologia" width="350px" height="200px">
        <p class="h4">
          La especialidad de Ginecología y Obstetricia es el campo de la medicina que se ocupa de la salud integral 
          de la mujer, así como de los fenómenos fisiológicos relacionados con la reproducción humana, incluyendo la 
          gestación, el parto y el puerperio.
        </p>
      </aside>
    </div>
  </section><!-- /.content -->

</div
<?php
/*}
else {
  require 'noacceso.php';
}*/
  require 'footer.php';
?>
<?php
}
ob_end_flush();
?>
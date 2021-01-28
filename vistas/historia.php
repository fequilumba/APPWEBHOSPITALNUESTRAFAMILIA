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
  if ($_SESSION['hospital']==1) {
?>
<div class="content-wrapper">
  <section class="content">
    <h1 class="titulo">"HOSPITAL NUESTRA FAMILIA"</h1>
    
    <div class="col-md-10 col-md-offset-1">
      <div class="carousel slide" data-ride="carousel" data-type="multi" data-interval="3000" id="myCarousel">
        <div class="carousel-inner">
            
          <div class="item active">
            <div class=""><a href="#"><img src="../public/img/ecografia.jpg" class=""height="450px" ></a></div>
          </div>
            
          <div class="item">
            <div class=""><a href="#"><img src="../public/img/radiologia.jpg" class=""height="450px" ></a></div>
          </div>
            
          <div class="item">
            <div class=""><a href="#"><img src="../public/img/imagenologia.jpg" class=""height="450px" ></a></div>
          </div>
    
        </div>
        <a class="left carousel-control" href="#myCarousel" data-slide="prev"><i class="glyphicon-chevron-left"></i></a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next"><i class="glyphicon-chevron-right"></i></a>
        <br>
      </div> <!--Cierre clase carousel-->
    </div>
     
    <div>
      <h2 class="titulo">Historia</h2>
      
      <div>
        <div>
          <p class="parrafo">El Hospital “Nuestra Familia” es la institución con 93 años de servicio a la comunidad sus 
            secretos e inspiraciones para mantenerse en un constante crecimiento durante mucho tiempo esta en la 
            esencia de su misión y visión.
            Durante su incesante y perseverante historia de esta Casa de Salud, se ha caracterizado por la creciente 
            valor de servicios lo que conlleva al desarrollo institucional, además por albergar y forjar a los más notables
            profesionales que ha dado la medicina ecuatoriana.
          </p>

          <p class="parrafo">Contamos con 10 especialidades médicas, 5 especialidades quirúrgicas, 1 unidades especial y 1 servicio general; en este
            periodo, el Ministerio de Salud ha invertido significativamente para equiparlo de una moderna infraestructura que se
            revierte en la óptimna atención de todos los pacientes. Contamos con salas de laborotario e imagen que cubre las necesidades
            más recientes y exigentes de la comunidad.
          </p>
        </div>
  </div>
    </div>
  </section>
</div>
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
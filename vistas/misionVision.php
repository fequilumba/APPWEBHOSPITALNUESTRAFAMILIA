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
  //if ($_SESSION['hospital']==1) {
?>

<div class="content-wrapper">
  <section class="content">
    <div style="text-align:center;">
      <img src="../files/img/LOGO.png" alt="Imagen Logo" height="150px" width="250px">
    </div>
  
    <div>
      <br>
      <div>
        <h2 class="titulo">Misión</h2>
        <p class="parrafo">El Hospital “Nuestra Familia", es una entidad privada que promueve la 
            atención de alta calidad y proporciona atención médica basada en principios éticos y morales, 
            con responsabilidad en la atención inmediata a pacientes.
        </p>
      </div>
    
      <br>
      <div>
        <h2 class="titulo">Visión</h2>
        <p class="parrafo">Ser un referente de salud, calidad y seguridad del paciente a nivel nacional, 
           convirtiéndose en un hospital docente en varias especialidades médicas.
        </p>
      </div>

      <br>
      <div>
        <h2 class="titulo">Valores</h2>
        <p class="parrafo">Los valores fundamentales que se inculcan en nuestra casa de salud se basan en
          el respeto, integridad, transparencia, calidez y calidad hacia nuestros pacientes.
        </p>
      </div>
    </div>
  </section>
</div>
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
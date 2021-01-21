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
  //if ($_SESSION['miagenda']==1) {
?>



<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                          <h1 class="box-title">AGENDA DE CITAS</h1>
                          <div id='calendar'></div>
                    </div>

                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->

<!-- The modal -->
<div class="modal fade" id="flipFlop" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="titulo">CITA MÉDICA</h4>
      </div>
        <div class="modal-body">
          <label for="">Paciente</label>
            <select name="paciente" id="paciente" class="form-control selectpicker" data-live-search="true" data-live-search-style="startsWith"></select> <br>
          <label for="">Especialidad</label>
            <select name="especialidad" id="especialidad" class="form-control"></select> <br>
          <label for="">Fecha</label>
            <input type="date" id="fecha"class="form-control" disabled> <br>
          <label for="">Motivo Cita</label>
          <textarea name="motivo" id="motivo" class="form-control" rows="3"></textarea><br>
          <label for="">Horario</label>
            <select name="hora" id="hora" class="form-control"></select> <br>
        </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-info">Guardar</button>
      <button type="button" class="btn btn-danger">Eliminar</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
	  </div>
  </div>
</div>

  
<?php
/*}
else {
  require 'noacceso.php';
}*/
  require 'footer.php';
?>
<script type="text/javascript" src="scripts/calendario.js"></script>
    
<?php
}
ob_end_flush();
?>
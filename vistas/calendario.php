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
  if ($_SESSION['rol_idrol']==3) {
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

<!-- The modal 
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
            <select name="paciente" id="pacienteF" class="form-control selectpicker" data-live-search="true" data-live-search-style="startsWith"></select> <br>
          <label for="">Especialidad</label>
            <select name="especialidad" id="especialidadF" class="form-control"></select> <br>
          <label for="">Fecha</label>
            <input type="date" id="fechaF"class="form-control" disabled> <br>
          <label for="">Motivo Cita</label>
          <textarea name="motivo" id="motivoF" class="form-control" rows="3"></textarea><br>
          <label for="">Horario</label>
            <select name="hora" id="horaF" class="form-control"></select> <br>
        </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-info">Guardar</button>
      <button type="button" class="btn btn-danger">Eliminar</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
	  </div>
  </div>
</div>-->

<!-- The modal CRUD -->

<div class="modal fade" id="modalCitas" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="titulo">CITA MÉDICA</h4>
      </div>
      <form id="formCitas"  method="POST">
        <div class="modal-body">
        
          <label for="">Especialidad</label>
            <input type="hidden" name="idcita_medica" id="idcita_medica">
            <select name="especialidad_idespecialidad" id="especialidad_idespecialidad" class="form-control"></select> <br>
          <label for="">Paciente</label>
            <select name="persona_idpersona" id="persona_idpersona" class="form-control selectpicker" data-live-search="true" data-live-search-style="startsWith" placeholder="seleccionar"></select> <br>
          
          <label for="">Fecha</label>
            <input type="date" name="fecha_cita" id="fecha_cita" class="form-control"> <br>
          <label for="">Motivo Cita</label>
          <textarea name="motivo_consulta" id="motivo_consulta" class="form-control" rows="3"></textarea><br>
          <label for="">Horario</label>
            <select name="horario_idhorario" id="horario_idhorario" class="form-control"></select> <br>
            
        </div>
      <div class="modal-footer">
          <button type="submit" id="btnAgregar" class="btn btn-info">Guardar</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
      </form>
	  </div>
  </div>
</div>
  
<?php
}
else {
  require 'noacceso.php';
}
  require 'footer.php';
?>
<script type="text/javascript" src="scripts/calendario.js"></script>
    
<?php
}
ob_end_flush();
?>
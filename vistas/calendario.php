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
  if ($_SESSION['rol_idrol']==3||$_SESSION['rol_idrol']==1) {
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
            <select name="especialidad_idespecialidad" id="especialidad_idespecialidad" class="form-control" data-live-search="true" data-live-search-style="startsWith" placeholder="seleccionar"></select> <br>
          <label for="">Paciente</label>
            <select name="personaPaciente_idpersona" id="personaPaciente_idpersona" class="form-control" data-live-search="true" data-live-search-style="startsWith" placeholder="seleccionar"></select> <br>
            <label for="">Medico</label>
            <select name="personaMedico_idpersona" id="personaMedico_idpersona" class="form-control" data-live-search="true" data-live-search-style="startsWith" placeholder="seleccionar"></select> <br>
          <label for="">Fecha</label>
            <input type="date" name="fecha_cita" id="fecha_cita" class="form-control" > <br>
          <label for="">Motivo Cita</label>
          <textarea name="motivo_consulta" id="motivo_consulta" class="form-control" rows="3"></textarea><br>
          <label for="">Horario</label>
            <select name="horario_idhorario" id="horario_idhorario" class="form-control"></select> <br>
            
        </div>
      <div class="modal-footer">
          <button type="submit" id="btnAgregar" class="btn btn-info">Guardar</button>
          <button type="button" id="btnCancelar" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
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
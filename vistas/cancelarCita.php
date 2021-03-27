<?php
//Activamos el almacenamiento en el buffer
ob_start();
session_start();
if(!isset($_SESSION["nombres"])) { //si la validable de sesion no existe.. significa que no se ha logeado al sistema
  header("Location: login.php");
} else{
  require 'header.php';

  if ($_SESSION['rol_idrol']==1) {   
?>

<!--Contenido-->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- Main content -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="box-title">Cancelar Citas </h1>
        </div>
      </div>
    </div> <!-- /.container-fluid -->
  </section> <!-- /.content-header -->

  <!-- centro -->                  
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">

              <div class="panel-body" id="listadoregistros">
                <table id="tbllistadoe" class="table table-striped table-bordered table-hover dt-responsive DT" style="width:100%">
                  <thead>
                    <th>Opciones</th>
                    <th>Especialidad</th>
                    <th>Paciente</th>
                    <th>Médico</th>
                    <th>Teléfono</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                  </thead>

                  <tbody>
                  </tbody>

                  <tfoot>
                    <th>Opciones</th>
                    <th>Especialidad</th>
                    <th>Paciente</th>
                    <th>Médico</th>
                    <th>Teléfono</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                  </tfoot>
                </table> <!-- .tbllistadoe-->
              </div> <!-- .panel-body-->

              <div class="panel-body"  id="formularioregistros">
                <form name="formularioe" id="formularioe" method="POST">
                  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <input type="hidden" name="idcita_medica" id="idcita_medica">
                  </div> <!-- .form-group-->
                              
                  <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <button 
                      class="btn btn-primary" 
                      type="submit" 
                      id="btnGuardar">
                      <i class="fa fa-save"> Guardar</i>
                    </button> <!-- .btn-primary-->

                    <button 
                      class="btn btn-danger" 
                      onclick="cancelarform()" 
                      type="button">
                      <i class="fa fa-arrow-circle-left">Cancelar</i>
                    </button> <!-- .btn-danger-->
                  </div> <!-- .form-group-->
                </form> <!-- .formularioe-->
              </div> <!-- .panel-body-->

            </div> <!-- /.card-body -->  
          </div> <!-- /.card -->
        </div> <!-- /.col-12 -->
      </div> <!-- /.row -->
    </div> <!-- /.container-fluid -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<!--Fin-Contenido-->

<?php
}
else {
  require 'noacceso.php';
}
  require 'footer.php';
?>

<script type="text/javascript" src="scripts/cancelarCita.js"></script>
<?php
}
ob_end_flush();
?>
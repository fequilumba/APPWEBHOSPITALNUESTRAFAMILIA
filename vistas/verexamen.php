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

  if ($_SESSION['rol_idrol']==3||$_SESSION['rol_idrol']==1||$_SESSION['rol_idrol']==2) {
    
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        
  <!-- Main content -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6"> 
          <h1 class="box-title">Exámenes</h1>
        </div>
      </div>      
    </div> <!-- /.container-fluid -->
  </section> <!-- .content-header -->
                    
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="panel-body table-responsive" id="listadoregistros">
                <table id="tbllistadoe" class="table table-striped table-bordered table-hover dt-responsive DT nowrap">
                  <thead>
                    <th>Opciones</th>
                    <th>Especialidad</th>
                    <th>Paciente</th>
                    <th>Médico</th>
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
                    <th>Fecha</th>
                    <th>Hora</th>
                  </tfoot>
                </table> <!-- /.tbllistadoe -->
              </div> <!-- /.panel-body -->

              <div class="panel-body"  id="formularioregistros">
                <form name="formularioe" id="formularioe" method="POST">
                  <div class="form-row">
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <label for="">Especialidad</label>
                      <input type="hidden" name="idpedido_examen" id="idpedido_examen">
                      <input type="text" name="especialidad" id="especialidad" class="form-control" maxlength="45" placeholder="Nombre especialidad" disabled>
                    </div>
                    
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <label for="">Paciente</label>
                      <input type="text" name="paciente" id="paciente" class="form-control" maxlength="45" placeholder="Nombre especialidad" disabled>
                    </div>
                    
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <label for="">Médico</label>
                      <input type="text" name="medico" id="medico" class="form-control" maxlength="45" placeholder="Nombre especialidad" disabled>
                    </div>
                  </div> <!-- .form-row -->
                  
                  <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                    <table id="examenes" class="table table-striped table-bordered table-hover nowrap">
                      <thead style="background-color:#A9D0F5">
                        <th>Nombre</th>
                        <th>Tipo</th>
                      </thead>
                      <tbody>            
                      </tbody>
                    </table>
                  </div>
                          
                  <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <button class="btn btn-danger" onclick="cancelarform()"
                      type="button"><i class="fa fa-arrow-circle-left"> Cancelar</i></button>
                  </div>
                </form> <!-- /.formularioe -->
              </div> <!-- /.panel-body -->
              
            </div> <!-- /.card-body -->
          </div> <!-- /.card --> <!--Fin centro -->
        </div> <!-- /.col-12 -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
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
<script type="text/javascript" src="scripts/verexamen.js"></script>
<?php
}
ob_end_flush();
?>
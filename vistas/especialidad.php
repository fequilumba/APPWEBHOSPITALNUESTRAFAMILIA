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

  //if ($_SESSION['guiamedico']==1) {
    
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
                          <h1 class="box-title">Especialidad <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Nueva Especialidad</button></h1>
                        <div class="box-tools pull-right"></div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro style="height: 400px;" -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistadoe" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Nombre</th>
                            <th>Estado</th>
                          </thead>
                          <tbody>
                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>Nombre</th>
                            <th>Estado</th>
                          </tfoot>
                        </table>
                    </div>

                    <div class="panel-body"  id="formularioregistros">
                        <form name="formularioe" id="formularioe" method="POST">
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label for="">Nombre</label>
                              <input type="hidden" name="idespecialidad" id="idespecialidad">
                              <input type="text" name="nombre" id="nombre" class="form-control" maxlength="45" placeholder="Nombre especialidad" required>
                            </div>
                          
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <button class="btn btn-primary" type="submit" 
                                id="btnGuardar"><i class="fa fa-save"> Guardar</i></button>
                                <button class="btn btn-danger" onclick="cancelarform()"
                                type="button"><i class="fa fa-arrow-circle-left"> Cancelar</i></button>
                            </div>
                        </form>
                    </div>
                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
<?php
/*}
else {
  require 'noacceso.php';
}*/
  require 'footer.php';
?>
<script type="text/javascript" src="scripts/especialidad.js"></script>
<?php
}
ob_end_flush();
?>
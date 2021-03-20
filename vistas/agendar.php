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

  if ($_SESSION['rol_idrol']==1 ||$_SESSION['rol_idrol']==3) {
    
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
                          <h1 class="box-title">Agendar Cita <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agendar</button></h1>
                        <div class="box-tools pull-right"></div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro style="height: 400px;" -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistadoe" class="table table-striped table-bordered table-condensed table-hover dt-responsive DT">
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
                        <div class="form-row">
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label for="">Especialidad</label>
                                <select name="especialidad_idespecialidad" id="especialidad_idespecialidad" class="form-control" data-live-search="true" data-live-search-style="startsWith" placeholder="seleccionar" required></select>
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label for="">Médico</label>
                                <select name="personaMedico_idpersona" id="personaMedico_idpersona" class="form-control" data-live-search="true" data-live-search-style="startsWith" placeholder="seleccionar" required></select> <br>
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label for="">Paciente</label>
                                <select name="personaPaciente_idpersona" id="personaPaciente_idpersona" class="form-control" data-live-search="true" data-live-search-style="startsWith" placeholder="seleccionar" required></select>
                                <br>
                                <label for="">Motivo</label>
                                <textarea class="form-control" name="motivo_consulta" id="motivo_consulta" cols="4" required></textarea>
                            </div>

                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label for="">Fecha</label>
                                <input class="form-control"  type="date" name="fecha_cita" id="fecha_cita" required>   <br>                         
                                <button class="btn btn-info" type="submit" name="btnHora"
                                id="btnHora"><i class="far fa-clock"> horario disponible</i></button> <br><br>

                                <select class="form-control" name="idcita_medica" id="idcita_medica"></select>

                            </div>

                            
                        </div> <!--fin row-->
                          
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
}
else {
  require 'noacceso.php';
}
  require 'footer.php';
?>
<script type="text/javascript" src="scripts/agendar.js"></script>
<?php
}
ob_end_flush();
?>
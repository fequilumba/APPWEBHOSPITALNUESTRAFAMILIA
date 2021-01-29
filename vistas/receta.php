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
  if ($_SESSION['rol_idrol']==2) {
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
                          <h1 class="box-title">Receta <!--<button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Proxima Cita</button>--></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistadocita" class="table table-striped
                        table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Especialidad</th>
                            <th>Nombre Completo</th>
                            <th>Teléfono</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Estado</th>
                          </thead>
                          <tbody>

                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>Especialidad</th>
                            <th>Nombre Completo</th>
                            <th>Teléfono</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Estado</th>
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" id="formularioregistros">
                        <form name="formulariocita" id="formulariocita" method="POST">
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label for="">Especialidad</label>
                              <input type="hidden" name="idreceta" id="idreceta">
                              <input type="hidden" name="idcita_medica" id="idcita_medica">
                              <select name="especialidad_idespecialidad" id="especialidad_idespecialidad"  class="form-control" placeholder="seleccionar" ></select>
                            </div>


                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label for="">Paciente</label>
                              <select name="persona_idpersona" id="persona_idpersona" class="form-control selectpicker" data-live-search="true" data-live-search-style="startsWith" placeholder="seleccionar"></select>
                            </div>

                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label for="">Fecha</label>
                              <input type="date" name="fecha_cita" class="form-control" id="fecha_cita" required>
                              <br>
                            </div>

                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label for="">Observaciones</label>
                              <textarea name="observaciones" id="observaciones" class="form-control" cols="" rows="3"></textarea>
                            </div>

                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label for="">Medicamentos</label>
                              <textarea name="medicamentos" id="medicamentos" class="form-control" cols="" rows="3"></textarea>
                            </div>                        
                          
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit"  
                            id="btnGuardar"><i class="fa fa-save"> Guardar</i></button>

                            <button class="btn btn-danger" onclick="cancelarform()"
                            type="button"><i class="fa fa-arrow-circle-left"> Cancelar</i></button>

                          </div>
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
<script type="text/javascript" src="scripts/receta.js"></script>
<?php
}
ob_end_flush();
?>
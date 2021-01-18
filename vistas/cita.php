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
                          <h1 class="box-title">Citas <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Nueva Cita</button></h1>
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
                              <input type="hidden" name="idcita_medica" id="idcita_medica">
                              <select name="especialidad_idespecialidad" id="especialidad_idespecialidad"  class="form-control" placeholder="seleccionar" ></select>
                            </div>


                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label for="">Paciente</label>
                              <select name="persona_idpersona" id="persona_idpersona" class="form-control" class="form-control" ></select>
                            </div>

                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label for="">Fecha/Hora</label>
                              <input type="date" name="fecha_cita" class="form-control" id="fecha_cita" required>
                              <br>
                              <input type="time" name="hora_cita" class="form-control" id="hora_cita" required>
                            </div>

                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label for="">Diagnóstico</label>
                              <input type="text" name="diagnostico" id="diagnostico" class="form-control" maxlength="255" placeholder=" " required>
                            </div>

                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label for="">Sintomas</label>
                              <input type="text" name="sintomas" id="sintomas" class="form-control" maxlength="255" placeholder=" "required>
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label for="">Motivo</label>
                              <input type="text" name="motivo_consulta" id="motivo_consulta" class="form-control" maxlength="255" placeholder=" "required>
                            </div>

                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label for="">Estado</label>
                              <select name="estado_idestado" id="estado_idestado"  class="form-control" placeholder="seleccionar"></select>
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
/*}
else {
  require 'noacceso.php';
}*/
  require 'footer.php';
?>
<script type="text/javascript" src="scripts/cita.js"></script>

<script src="../public/js/jquery.min.js"></script>
    <script src="../public/js/moment.min.js"></script>
    <script src="../public/js/fullcalendar.min.js"></script>
<?php
}
ob_end_flush();
?>
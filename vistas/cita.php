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
  if ($_SESSION['rol_idrol']==2||$_SESSION['rol_idrol']==1) {
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
                          <h1 class="box-title">Atención Médica <!--<button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Proxima Cita</button>--></h1>
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
                            <th>Paciente</th>
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
                            <th>Paciente</th>
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
                              <input type="text" name="especialidad_idespecialidad" id="especialidad_idespecialidad" class="form-control" disabled>
                              <!--<select name="especialidad_idespecialidad" id="especialidad_idespecialidad"  class="form-control selectpicker " data-live-search="true" data-live-search-style="startsWith" disabled></select>-->
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" >
                              <label for="">Paciente</label>
                              <input type="text" name="personaPaciente_idpersona" id="personaPaciente_idpersona" class="form-control" disabled>
                              <!--<select name="personaPaciente_idpersona" id="personaPaciente_idpersona" class="form-control selectpicker" data-live-search="true" data-live-search-style="startsWith" disabled></select>-->
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label for="">Motivo</label>
                              <textarea name="motivo_consulta" id="motivo_consulta" class="form-control" cols="" rows="3" disabled></textarea>
                            </div>

                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label for="">Diagnóstico(*)</label>
                              <textarea name="diagnostico" id="diagnostico" class="form-control" cols="" rows="3" required></textarea>
                            </div>

                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label for="">Síntomas(*)</label>
                              <textarea name="sintomas" id="sintomas" class="form-control" cols="" rows="3" required></textarea>
                            </div>

                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <h2>Receta</h2>
                          </div>

                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                              <a data-toggle="modal" href="#myModal">
                              <button id="btnAgregarMedi" type="button" class="btn btn-primary">
                              <span class="fa fa-plus"></span> Agregar Medicamentos <span class="fa fa-pills"></span></button>
                              </a>
                          </div>
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                              <table id="medicamentos" class="table table-striped table-bordered table-condensed table-hover">
                                <thead style="background-color:#A9D0F5">
                                  <th>Opciones</th>
                                  <th>Medicamento</th>
                                  <th>Descripción</th>
                                  <th>Cantidad</th>
                                  <th>Indicaciones</th>
                                </thead>
                                <tbody>
                                
                                </tbody>
                              </table>
                          </div>

                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <h2>Exámenes</h2>
                          </div>

                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <a data-toggle="modal" href="#myModal2">
                              <button id="btnAgregarExa" type="button" class="btn btn-primary">
                              <span class="fa fa-plus"></span> Agregar Exámenes <span class="fa fa-microscope"></button>
                              </a>
                            </div>
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                              <table id="examenes" class="table table-striped table-bordered table-condensed table-hover">
                                <thead style="background-color:#A9D0F5">
                                  <th>Opciones</th>
                                  <th>Nombre</th>
                                  <th>Tipo</th>
                                </thead>
                                <tbody>
                                
                                </tbody>
                              </table>
                            </div>
                          
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" id="estado">
                              <label for="">Estado(*)</label>
                              <select name="estado_idestado" id="estado_idestado"  class="form-control" requiered ></select>
                            </div>
                          
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12" id="guardar">
                            <button class="btn btn-primary" type="submit"  
                            id="btnGuardar"><i class="fa fa-save"> Guardar</i></button>

                            <button id="btnCancelar"class="btn btn-danger" onclick="cancelarform()"
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

  <!--Modal receta-->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Seleccione un Medicamento</h4>
        </div>
        <div class="modal-body table-responsive">
          <table id="tblmedicamentos" class="table table-striped table-bordered table-condensed table-hover">
            <thead>
                <th>Opciones</th>
                <th>Nombre</th>
                <th>Descripción</th>
            </thead>
            <tbody>
              
            </tbody>
            <tfoot>
              <th>Opciones</th>
                <th>Nombre</th>
                <th>Descripción</th>
            </tfoot>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>        
      </div>
    </div>
  </div> 

  <!--Fin Modal receta-->


  <!--Modal examen-->
  <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Seleccione un Examen</h4>
        </div>
        <div class="modal-body table-responsive">
          <table id="tblexamenes" class="table table-striped table-bordered table-condensed table-hover">
            <thead>
                <th>Opciones</th>
                <th>Nombre</th>
                <th>Tipo</th>
            </thead>
            <tbody>
              
            </tbody>
            <tfoot>
              <th>Opciones</th>
                <th>Nombre</th>
                <th>Tipo</th>
            </tfoot>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>        
      </div>
    </div>
  </div> 

  <!--Fin Modal examen-->
<?php
}
else {
  require 'noacceso.php';
}
  require 'footer.php';
?>
<script type="text/javascript" src="scripts/cita.js"></script>
<?php
}
ob_end_flush();
?>
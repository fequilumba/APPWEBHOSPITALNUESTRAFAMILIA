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
  if ($_SESSION['guiapaciente']=1) {
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
                          <h1 class="box-title">Paciente <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Nuevo Paciente</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped
                        table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Cédula</th>
                            <th>Nombres</th>
                            <th>Email</th>
                            <th>teléfono</th>
                            <th>Dirección</th>
                            <th>Ciudad</th>
                            <th>Fecha Nacimiento</th>
                            <th>Género</th>
                            <th>Estado</th>
                          </thead>
                          <tbody>

                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>Cédula</th>
                            <th>Nombres</th>
                            <th>Email</th>
                            <th>Teléfono</th>
                            <th>Dirección</th>
                            <th>Ciudad</th>
                            <th>Fecha Nacimiento</th>
                            <th>Género</th>
                            <th>Estado</th>
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" style="height: 600px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label for="">Cédula</label>
                            <input type="hidden" name="idpersona" id="idpersona">
                            <input type="text" name="cedula" id="cedula" class="form-control"  maxlength="45" placeholder="Cédula" required>
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label for="">Nombres</label>
                              <input type="text" name="nombres" id="nombres" class="form-control"  maxlength="45" placeholder="Nombres" required>
                            </div>

                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label for="">Apellidos</label>
                              <input type="text" name="apellidos" id="apellidos" class="form-control"  maxlength="45" placeholder="Apellidos"required>
                            </div>

                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label for="">Email</label>
                              <input type="text" name="email" id="email" maxlength="45" class="form-control"  placeholder="email@address.com" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" >
                            </div>

                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label for="">Teléfono</label>
                              <input type="text" name="telefono" id="telefono" class="form-control"  placeholder="Teléfono">
                            </div>

                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label for="">Dirección</label>
                              <input type="text" name="direccion" id="direccion" class="form-control"  maxlength="45" placeholder="Dirección"required>
                            </div>

                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label for="">Ciudad</label>
                              <input type="text" name="ciudad_residencia" id="ciudad_residencia" class="form-control"  maxlength="45" placeholder="Ciudad"required>
                            </div>

                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label for="">Fecha Nacimiento</label>
                              <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control"  required>
                            </div>
                            
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label for="">Genero</label>
                              <br>
                              <label for="">Hombre</label>
                              <input type="radio" name="genero" value="M" id="masculino">
                              <label for="">Mujer</label>
                              <input type="radio" name="genero" value="F" id="femenino">
                            </div>

                            <!--<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label for="">Roles:</label><br>
                              <ul style="list-style: none;" id="roles">

                              </ul>
                            </div>-->

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
<script type="text/javascript" src="scripts/paciente.js"></script>
<?php
}
ob_end_flush();
?>
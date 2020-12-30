<?php
  require 'header.php';
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
                          <h1 class="box-title">Medico <button class="btn btn-success" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado3" class="table table-striped
                        table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones    </th>
                            <th>Cédula</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Email</th>
                            <th>teléfono</th>
                            <th>Dirección</th>
                            <th>Ciudad</th>
                            <th>Fecha Nacimiento</th>
                            <th>Género</th>
                          </thead>
                          <tbody>

                          </tbody>
                          <tfoot>
                            <th>Opciones    </th>
                            <th>Cédula</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Email</th>
                            <th>Teléfono</th>
                            <th>Dirección</th>
                            <th>Ciudad</th>
                            <th>Fecha Nacimiento</th>
                            <th>Género</th>
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" style="height: 600px;" id="formularioregistros">
                        <form name="formulario3" id="formulario3" method="POST">
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label for="">Cédula</label>
                            <input type="hidden" name="idpersona" id="idpersona">
                            <input type="text" name="cedula" id="cedula" maxlength="45" placeholder="Cédula" require>
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label for="">Nombres</label>
                              <input type="text" name="nombres" id="nombres" maxlength="45" placeholder="Nombres" require>
                            </div>

                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label for="">Apellidos</label>
                              <input type="text" name="apellidos" id="apellidos" maxlength="45" placeholder="Apellidos"require>
                            </div>

                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label for="">Email</label>
                              <input type="text" name="email" id="email" maxlength="45" placeholder="Email">
                            </div>

                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label for="">Teléfono</label>
                              <input type="text" name="telefono" id="telefono"  placeholder="Teléfono"require>
                            </div>

                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label for="">Dirección</label>
                              <input type="text" name="direccion" id="direccion" maxlength="45" placeholder="Dirección"require>
                            </div>

                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label for="">Ciudad</label>
                              <input type="text" name="ciudad" id="ciudad" maxlength="45" placeholder="Ciudad"require>
                            </div>

                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label for="">Fecha Nacimiento</label>
                              <input type="date" name="fnacimiento" id="fnacimiento" require>
                            </div>
                            
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label for="">Genero</label>
                            <!--  <input type="text" name="genero" id="genero"  placeholder="Genero" require>-->
                              <label for="telefono">M</label>
                              <input type="radio" name="genero" value="M" id="masculino">
                              <label for="correo">F</label>
                              <input type="radio" name="genero" value="F" id="femenino">
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
  require 'footer.php';
?>
<script type="text/javascript" src="scripts/persona.js"></script>

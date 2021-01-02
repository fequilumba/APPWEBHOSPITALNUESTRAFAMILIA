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
                          <h1 class="box-title">Horario <button class="btn btn-success" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right"></div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro style="height: 400px;" -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistadoe" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Especialidad</th>
                            <th>Hora inicio</th>
                            <th>Hora fin</th>
                            <th>Fecha</th>
                          </thead>
                          <tbody>
                          </tbody>
                          <tfoot>
                          <th>Opciones</th>
                            <th>Especialidad</th>
                            <th>Hora inicio</th>
                            <th>Hora fin</th>
                            <th>Fecha</th>
                          </tfoot>
                        </table>
                    </div>

                    <div class="panel-body" style="height: 400px;" id="formularioregistros">
                        <form name="formularioh" id="formularioh" method="POST">
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label for="">Nombre</label>
                              <input type="hidden" name="idespecialidad" id="idespecialidad">
                              <input type="text" name="nombre" id="nombre" maxlength="45" placeholder="Nombre" required>
                            </div>

                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label for="">Hora Inicio</label>
                                <input type="time" class="form-control clockpicker" data-placement="left" data-align="top" data-autoclose="true" placeholder="00:00" readonly="">
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label for="">Hora Fin</label>
                                <input type="time" class="form-control clockpicker" data-placement="left" data-align="top" data-autoclose="true" placeholder="00:00" readonly="">
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label for="">Fecha</label>
                                <input type="date" class="form-control"  readonly="">
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
  require 'footer.php';
?>
<script type="text/javascript" src="scripts/especialidad.js"></script>

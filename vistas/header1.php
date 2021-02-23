<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HOSPITAL NUESTRA FAMILIA</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Tell the browser to be responsive to screen width -->

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plublic/AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../plublic/AdminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plublic/AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../plublic/AdminLTE/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../plublic/AdminLTE/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plublic/AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plublic/AdminLTE/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plublic/AdminLTE/plugins/summernote/summernote-bs4.min.css">



    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../public/css/_all-skins.min.css">
    <link rel="icon" href="../public/img/apple-touch-icon.png">
    <link rel="shortcut icon" href="../public/img/favicon.ico">

    <!--full calendar-->
    <link href='../public/AdminLTE/fullcalendar/main.css' rel='stylesheet'/>
    


    <!--DATA TABLES-->
    <link rel="stylesheet" type="text/css" href="../public/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="../public/AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="../public/AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <link rel="stylesheet" type="text/css" href="../public/css/bootstrap-select.min.css">
    
    <!--mis estilos personalizados-->    
    <link rel="stylesheet" type="text/css" href="../public/css/estilo.css">
    <!--alertify-->
    <link rel="stylesheet" type="text/css" href="../public/css/alertify.css">

  </head>
  <body class="hold-transition skin-blue-light sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="#" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>HNF</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Hospital</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          <i class="fa fa-home"></i></a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="../files/usuarios/<?php echo $_SESSION['imagen'] ?>" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $_SESSION['nombres'] ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="../files/usuarios/<?php echo $_SESSION['imagen'] ?>" class="img-circle" alt="User Image">
                    <p>
                    <?php echo $_SESSION['nombres']?>
                    </p>
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    
                    <div class="pull-right">
                      <a href="../ajax/usuario.php?op=salir" class="btn btn-warning ">Cerrar Sesión</a> 
                    </div>
                    <div class="pull-left">
                      <a href="miperfil.php" class="btn btn-info ">Mi perfil</a>
                    </div>
                  </li>
                </ul>
              </li>
              
            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">       
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>
            
            <?php
            if ($_SESSION['rol_idrol']==1||$_SESSION['rol_idrol']==2||$_SESSION['rol_idrol']==3)
            {
              echo '<li>
              <a href="home.php">
                <i class="fa fa-home"></i> <span>Home</span>
              </a>
            </li> ';
            }
            ?>

            <?php
            if ($_SESSION['rol_idrol']==1||$_SESSION['rol_idrol']==2||$_SESSION['rol_idrol']==3)
            {
              echo '<li class="treeview">
              <a href="#">
                <i class="fa fa-hospital"></i>
                <span>Hospital</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="historia.php"><i class="fa fa-history"></i> Historia</a></li>
                <li><a href="misionVision.php"><i class="fa fa-bullseye"></i> Misión/Visón</a></li>
              </ul>
            </li>';
            }
            ?>

            <?php
            if ($_SESSION['rol_idrol']==3)
            {
              echo '<li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i>
                <span>Guía del Paciente</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="paciente.php"><i class="fa fa-user-injured"></i> Registrar Paciente</a></li>
              </ul>
            </li>';
            }
            ?>

            <?php
            if ($_SESSION['rol_idrol']==1)
            {
              echo '<li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i>
                <span>Guía del Paciente</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="cliente.php"><i class="fa fa-user-plus"></i> Registrar Cliente</a></li>
                <li><a href="pacienteasociado.php"><i class="fa fa-user-injured"></i> Registrar Paciente</a></li>
              </ul>
            </li>';
            }
            ?>

            <?php
            if ($_SESSION['rol_idrol']==1)
            {
              echo '<li class="treeview">
              <a href="#">
                <i class="fa fa-user-md"></i>
                <span>Guía del Médico</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="medico.php"><i class="fa fa-stethoscope"></i> Registrar Médico</a></li>
                <li><a href="especialidad.php"><i class="fa fa-hand-holding-medical"></i> Especialidades</a></li>
                <li><a href="examentipo.php"><i class="fa fa-microscope"></i> Tipo Examen</a></li>
                <li><a href="examen.php"><i class="fa fa-syringe"></i> Examen</a></li>
                <li><a href="medicamento.php"><i class="fa fa-pills"></i> Medicamento</a></li>
              </ul>
            </li>';
            }
            ?>      
            
            <?php
            if ($_SESSION['rol_idrol']==2)
            {
              echo '<li class="treeview">
              <a href="#">
                <i class="fa fa-list-alt"></i>
                <span>Mi Agenda</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="cita.php"><i class="fa fa-book-medical"></i> Ver Agenda</a></li>
                <li><a href="citaatendida.php"><i class="fa fa-calendar-check"></i> Citas Atendidas</a></li>
              </ul>
            </li>';
            }
            ?>  

            <?php
            if ($_SESSION['rol_idrol']==3)
            {
              
                echo '<li class="treeview">
                    <a href="#">
                      <i class="fa fa-list-alt"></i> <span>Citas</span>
                      <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="calendario.php"><i class="fa fa-calendar"></i> Agendar</a></li>
                    </ul>
                  </li>';
            
            }
            ?> 

            <?php
            if ($_SESSION['rol_idrol']==1)
            {
              
                echo '<li class="treeview">
                <a href="#">
                  <i class="fa fa-list-alt"></i> <span>Citas</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="calendario.php"><i class="fa fa-calendar"></i> Agendar</a></li>
                  <li><a href="cancelarCita.php"><i class="fa fa-times-circle"></i> Cancelar</a></li>
                </ul>
              </li>';
            
            }
            ?> 
            
            <?php
            if ($_SESSION['rol_idrol']==1||$_SESSION['rol_idrol']==2||$_SESSION['rol_idrol']==3)
            {
              
                echo '<li class="treeview">
                <a href="#">
                  <i class="fa fa-eye"></i> <span>Visualizar</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="historialmedico.php"><i class="fa fa-notes-medical"></i> Historial Medico</a></li>
                  <li><a href="verreceta.php"><i class="fa fa-file-prescription"></i> Recetas</a></li>
                  <li><a href="verexamen.php"><i class="fa fa-microscope"></i> Examenes</a></li>                
                </ul>
              </li>';
            
            }
            ?> 

            <?php
            if ($_SESSION['rol_idrol']==1||$_SESSION['rol_idrol']==2||$_SESSION['rol_idrol']==3)
            {
              echo '<li class="treeview">
              <a href="contactos.php">
                <i class="fa fa-phone"></i> <span>Contactos</span>
              </a>
            </li>';
            }
            ?>

            <!--
            <li>
              <a href="#">
                <i class="fa fa-plus-square"></i> <span>Ayuda</span>
                <small class="label pull-right bg-red">PDF</small>
              </a>
            </li> 
            -->
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
</body>
</html>
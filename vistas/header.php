<?php
include_once('bd/funcion.php');
session_start();

if ($_SESSION['s_usuario'] === null) {
  header("Location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sistema de Control</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="vendor/datatables/datatables.min.css" />
  <!--datables estilo bootstrap 4 CSS-->
  <link rel="stylesheet" type="text/css" href="vendor/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="css/foto.css">
  <link rel="stylesheet" href="css/formestilos.css">
  <link rel="stylesheet" href="css/boxes.css">
  

 


</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home.php">
        <div class="sidebar-brand-icon">
          <i class="fas fa-user"></i>
        </div>
        <div class="sidebar-brand-text mx-3"><?php echo $_SESSION['s_nombre']; ?></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="home.php">
          <i class="fas fa-fw fa-home"></i>
          <span>Inicio</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Menú
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="cntagpo.php">
        <i class="fas fa-swimming-pool"></i>
          <span>Grupos</span>
        </a>

      </li>

      <li class="nav-item">
        <a class="nav-link" href="cntaalumno.php">
        <i class="fas fa-swimmer"></i>
          <span>Alumnos</span>
        </a>
      </li>

      <hr class="sidebar-divider">

      <li class="nav-item">
        <a class="nav-link" href="eval.php">
        <i class="fas fa-medal"></i>
          <span>Evaluación</span>
        </a>

      </li>
      <hr class="sidebar-divider">

      <li class="nav-item">
        <a class="nav-link" href="cntaoficina.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Oficinas</span></a>
      </li>
      <hr class="sidebar-divider">

      <li class="nav-item">
        <a class="nav-link" href="home.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Reportes</span></a>
      </li>

      <?php
          if ($_SESSION['s_rol'] == 2) {
      ?>

      <hr class="sidebar-divider">

      <li class="nav-item">
        <a class="nav-link" href="cntausuario.php">
          <i class="fas fa-user-shield"></i>
          <span>Usuarios</span></a>
      </li>
      <?php
}
      ?>

      <hr class="sidebar-divider">
      <li class="nav-item">
        <a class="nav-link" href="bd/logout.php">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Salir</span></a>
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav id="head" class="navbar navbar-expand navbar-light bg-light topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->


          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 medium"><?php echo fechaC(); ?></span>
              </a>
            </li>
            <!-- Nav Item - Search Dropdown (Visible Only XS) -->

            <!-- Dropdown - Messages -->


            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['s_nombre']; ?></span>
                <img class="img-profile rounded-circle" src="img/batman.jpg">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="bd/logout.php" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Salir
                </a>

            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->
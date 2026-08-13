
<?php if (!empty($data)) {
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $data['page_title']; ?></title>
  <link rel="shortcut icon" href="<?php echo base_url; ?>/Assets/img/isotipo.ico" type="image/x-icon">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="<?php echo base_url; ?>/Assets/css/google-fonts.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url; ?>/Assets/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url; ?>/Assets/css/adminlte.min.css">
  <!-- Noty Alert -->
  <link rel="stylesheet" href="<?php echo base_url; ?>/Assets/plugins/noty/noty.min.css">
</head>

<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <!-- <a href="../../index3.html" class="nav-link">Home</a> -->
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <!-- <a href="#" class="nav-link">Contact</a> -->
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item dropdown user-menu">
          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
            <img src="<?php echo base_url; ?>/Assets/img/user2-160x160.jpg" class="user-image img-circle elevation-2" alt="User Image">
            <span class="d-none d-md-inline">Administrador</span>
          </a>
          <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <!-- User image -->
            <li class="user-header bg-primary">
              <img src="<?php echo base_url; ?>/Assets/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">

              <p>
                Administrador del Sistema
                <small>Member since Nov. 2012</small>
              </p>
            </li>
            <!-- Menu Body -->
            <li class="user-body">
              <div class="row">
                <!-- <div class="col-4 text-center">
                <a href="#">Followers</a>
              </div>
              <div class="col-4 text-center">
                <a href="#">Sales</a>
              </div>
              <div class="col-4 text-center">
                <a href="#">Friends</a>
              </div> -->
              </div>
              <!-- /.row -->
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <a href="#" class="btn btn-default btn-flat">Perfil</a>
              <a href="<?php echo base_url(); ?>/Logout" class="btn btn-default btn-flat float-right">Cerrar Sesión</a>
            </li>
          </ul>
        </li>

      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="<?= base_url; ?>" class="brand-link">
        <!-- <img src="<?php echo base_url; ?>/Assets/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
        <img src="<?php echo base_url; ?>/Assets/img/nombre.png" class="img-fluid" alt="nombre" style="width: 91%; height: 50px;  margin-left: 3px; margin-top: -1px;">
        <!-- <span class="brand-text font-weight-light">Mini Market</span> -->
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?php echo base_url; ?>/Assets/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Adminstrador</a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search old" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>
      <?php } ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="<?php echo base_url; ?>/Assets/img/isotipo.ico" type="image/x-icon">
  <title>Minimarket | Login</title>
<!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="<?php echo base_url; ?>/Assets/css/google-fonts.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url; ?>/Assets/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url; ?>/Assets/css/adminlte.min.css">
   <!-- icheck bootstrap -->
  <!-- <link type="text/css" rel="stylesheet" href="<?php echo base_url; ?>/Assets/css/icheck-bootstrap.min.css"> -->

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <!-- <a href="../../index2.html" class="h1"><b>Admin</b>LTE</a> -->
      <img src="<?php echo base_url; ?>/Assets/img/nombre.png" class="img-fluid" alt="nombre" style="width: 100%; height: 100px; margin-top: -1px;">
    </div>
    <div class="card-body">
      <p class="login-box-msg">Iniciar Sesión</p>

      <form action="../../index3.html" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Contraseña">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">

          <!-- /.col -->
          <div class="col-4 mb-2">
            <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      

      <p class="mb-2">
        <a href="forgot-password.html">Solicitar cambio de contraseña</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
 <!-- jQuery -->
<script src="<?php echo base_url; ?>/Assets/js/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url; ?>/Assets/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url; ?>/Assets/js/adminlte.min.js"></script>
</body>
</html>

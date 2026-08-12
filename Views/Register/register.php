<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="<?php echo base_url; ?>/Assets/img/isotipo.ico" type="image/x-icon">
  <title>Minimarket | Registrarse</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="<?php echo base_url; ?>/Assets/css/google-fonts.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url; ?>/Assets/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url; ?>/Assets/css/adminlte.min.css">
   <!-- Noty Alert -->
  <link rel="stylesheet" href="<?php echo base_url; ?>/Assets/plugins/noty/noty.min.css">
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
        <p class="login-box-msg">Registrarse</p>

        <form id="frmRegister" method="post">

          <div class="input-group mb-3">
            <input type="text" id="name" name="name" class="form-control" placeholder="Nombre del usuario">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="email" id="email" name="email" class="form-control" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Confirmar Contraseña">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">

            <!-- /.col -->
            <div class="col-6 mb-3 mt-2">
              <button type="submit" onclick="save(event);" class="btn btn-primary btn-block mb-3">Registrarse</button>
            </div>
            <!-- /.col -->
          </div>
        </form>



        <p class="mb-2">
          !Ya tienes cuenta? <a href="<?php echo base_url; ?>/Login">Ingresa aqui</a>
        </p>
      </div>
      <!-- /.card-body -->

      <!-- jQuery -->
      <!-- jQuery -->
      <script src="<?php echo base_url; ?>/Assets/js/jquery.min.js"></script>
      <!-- Bootstrap 4 -->
      <script src="<?php echo base_url; ?>/Assets/js/bootstrap.bundle.min.js"></script>
      <!-- AdminLTE App -->
      <script src="<?php echo base_url; ?>/Assets/js/adminlte.min.js"></script>
      <!-- Script personalizado -->
      <script  src="<?php echo base_url; ?>/Assets/plugins/noty/noty.min.js"></script>
      <script>
        const base_url = "<?php echo base_url(); ?>";
      </script>
      <script src="<?php echo base_url; ?>/Assets/app/js/<?php echo $data['functions_js']; ?>"></script>
</body>

</html>
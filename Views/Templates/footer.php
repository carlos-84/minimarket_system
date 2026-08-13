 <?php if (!empty($data)) {?>
 
 <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; <?php echo date("Y"); ?> <a href="<?php echo base_url; ?>">Mini Market System</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url; ?>/Assets/js/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url; ?>/Assets/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url; ?>/Assets/js/adminlte.min.js"></script>

<script src="<?php echo base_url; ?>/Assets/plugins/noty/noty.min.js"></script>
<!-- Script personalizado -->
 <script>
  const base_url = "<?php echo base_url(); ?>";
</script>
<script src="<?php echo base_url; ?>/Assets/app/js/<?php echo $data['functions_js']; ?>"></script>
</body>
</html>

<?php } ?>
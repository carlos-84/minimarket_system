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

<!-- DataTables  & Plugins -->
<script src="<?php echo base_url; ?>/Assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url; ?>/Assets/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url; ?>/Assets/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url; ?>/Assets/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url; ?>/Assets/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url; ?>/Assets/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url; ?>/Assets/js/jszip.min.js"></script>
<script src="<?php echo base_url; ?>/Assets/js/pdfmake.min.js"></script>
<script src="<?php echo base_url; ?>/Assets/js/vfs_fonts.js"></script>
<script src="<?php echo base_url; ?>/Assets/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url; ?>/Assets/js/buttons.print.min.js"></script>
<script src="<?php echo base_url; ?>/Assets/js/buttons.colVis.min.js"></script>

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
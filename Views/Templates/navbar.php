<!-- Sidebar Menu -->
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
    <li class="nav-item">
      <a href="<?= base_url(); ?>/Perfil" class="nav-link">
       <i class="far fa-address-card fa-lg"></i>
        <p>
          Perfil
          <!-- Todos entran -->
        </p>
      </a>

    </li>

    <?php if (!empty($_SESSION['permisos'][2]['r'])) :?>
    <li class="nav-header">PANEL DE ADMINISTRACION</li>
    <li class="nav-item">
      <a href="<?= base_url(); ?>/Home" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
          Dashboard
          <!-- <i class="right fas fa-angle-left"></i> -->
        </p>
      </a>

    </li>
    <?php endif ?>

    <?php if (!empty($_SESSION['permisos'][3]['r'])) :?>
    <li class="nav-header">USUARIOS</li>
    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-users"></i>
        <p>
          Usuarios
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="<?= base_url(); ?>/Usuarios" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Listar usuarios</p>
          </a>
        </li>
      </ul>
    </li>
    <?php endif ?>

    <?php if (!empty($_SESSION['permisos'][5]['r'])) :?>
    <li class="nav-header">PRODUCCION</li>
    <li class="nav-item">
      <a href="<?= base_url(); ?>/Categorias" class="nav-link">
        <i class="fas fa-layer-group"></i>
        <p>Catégorias</p>
      </a>
    </li>
  <?php endif ?>
  <?php if (!empty($_SESSION['permisos'][4]['r'])) :?>

    <li class="nav-item">
      <a href="<?= base_url(); ?>/Productos" class="nav-link">
        <i class="fab fa-product-hunt"></i>
        <p>Productos</p>
      </a>
    </li>
  <?php endif ?>
  </ul>
</nav>
<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>
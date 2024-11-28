<header>
  <nav class="navbar navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        HairPro 
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menú</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <hr>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">

            <?php
            $session = session();
            if ($session->get('tipo') == 'administrador'): ?>
              <a class="nav-link active" aria-current="page" href="<?= base_url('/producto/listaBack'); ?>"><i class="bi bi-house-door fs-5 me-2"></i>Home</a>
            <?php endif ?>
            <?php
            $session = session();
            if ($session->get('tipo') == 'empleado'): ?>
              <a class="nav-link active" aria-current="page" href="<?= base_url('/citaBack'); ?>"><i class="bi bi-house-door fs-5 me-2"></i>Home</a>
            <?php endif ?>
            <?php
            $session = session();
            if ($session->get('tipo') == 'administrador'): ?>
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url('/citaAdmin'); ?>"><i class="bi bi-calendar-event fs-5 me-2"></i>Citas</a>
              </li>
            <?php endif ?>
            <?php
            $session = session();
            if ($session->get('tipo') == 'empleado'): ?>
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url('/cita'); ?>"><i class="bi bi-calendar-event fs-5 me-2"></i>Citas</a>
              </li>
            <?php endif ?>
            <?php if (session()->get('tipo') != 'empleado'): ?>
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url('/producto'); ?>"><i class="bi bi-gem fs-5 me-2"></i>Productos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url('/tipo/addTipo'); ?>"><i class="bi bi-bookmark-star fs-5 me-2"></i>Categorías</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="<?= base_url('/proveedor/addProveedor'); ?>"><i class="bi bi-person-standing fs-5 me-2"></i>Proveedores</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url('/compra'); ?>"><i class="bi bi-bag-check fs-5 me-2"></i>Compras</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url('/pedido'); ?>"><i class="bi bi-cart-check fs-5 me-2"></i>Pedidos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url('/vistaUsuario'); ?>">Vista Usuario</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bi bi-three-dots-vertical fs-5 me-2"></i>
                  Otras consultas
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="<?= base_url('/empleado'); ?>"><i class="bi bi-person-rolodex fs-5 me-2"></i>Empleado</a></li>
                  <li><a class="dropdown-item" href="<?= base_url('/cliente'); ?>"><i class="bi bi-person-check-fill fs-5 me-2"></i>Cliente</a></li>
                  <li><a class="dropdown-item" href="<?= base_url('/marca/addMarca'); ?>"><i class="bi bi-cookie fs-5 me-2"></i>Marcas</a></li>
                  <li><a class="dropdown-item" href="<?= base_url('/evento'); ?>"><i class="bi bi-calendar3-event fs-5 me-2"></i>Evento</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>

                </ul>
              </li>
            <?php endif; ?>
            <?php
            $session = session();
            if ($session->get('logged_in') != true): ?>
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url('/loginBack'); ?>">
                  <i class="bi bi-door-closed-fill"></i>
                  Iniciar sesión</a>
              </li>

            <?php endif ?>
            <?php if (session()->get('tipo') == 'empleado'): ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bi bi-person-circle fs-5 me-2"></i>
                  <?= session()->get('nombreEmpleado') ?>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="<?= base_url('cuenta/salir'); ?>"><i class="bi bi-door-open fs-5 me-2"></i>Cerrar sesión</a></li>
                </ul>
              </li>
            <?php endif; ?>
            <?php if (session()->get('tipo') == 'administrador'): ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bi bi-person-circle fs-5 me-2"></i>
                  <?= session()->get('nombreAdmin') ?>
                </a>
                <ul class="dropdown-menu">

              </li>
              <li><a class="dropdown-item" href="<?= base_url('cuenta/salir'); ?>"><i class="bi bi-door-open fs-5 me-2"></i>Cerrar sesión</a></li>
          </ul>
          </li>
        <?php endif; ?>

        </ul>
        </div>
      </div>
    </div>
  </nav>

</header>
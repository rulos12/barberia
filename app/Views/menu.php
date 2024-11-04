<nav class="navbar navbar-expand-lg bg-body-tertiary"> <!--barra Menu del usuario-->
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Barberia</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/producto">Productos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('/tipo/addTipo'); ?>">Categorias</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('/cita'); ?>">Citas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('/proveedor/addProveedor'); ?>">Proveedores</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('/compra'); ?>">Compras</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('/pedido'); ?>">Pedidos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('/pagina/inicio'); ?>">Vista Usuario</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Otras consultas
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?= base_url('/empleado'); ?>">Empleado</a></li>
            <li><a class="dropdown-item" href="<?= base_url('/cliente'); ?>">Cliente</a></li>
            <li><a class="dropdown-item" href="<?= base_url('/marca/addMarca'); ?>">Marcas</a></li>
            <li><a class="dropdown-item" href="<?= base_url('/evento'); ?>">Evento</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">Conócenos</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<div class="anuncion-bar">
    <p class="announcement-bar__message">
        <span>ENVÍO GRATIS A PARTIR DE $799</span>
    </p>
</div>
<div class="container">
    <header class="">
        <div class="row">
            <div class="col-4 pt-5">
                <div class="Search">
                    <a href="#">
                        <i class="bi bi-search fs-3"></i>
                    </a>
                </div>
            </div>
            <div class="col-4">
                <div class="container-logo">
                    <a href="<?= base_url('pagina/inicio'); ?>">
                        <div class="">
                            <img src="<?php echo base_url('imagenes/logoBarber.png'); ?>" alt="BarberShop" width="110" height="auto">
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
                <div class="Image1">
                    <?php
                    $session = session();
                    if ($session->get('logged_in') != null): ?>

                        <a href="<?= base_url('cuenta/editar'); ?>"> hola<i class="bi bi-person fs-3"></i> </a>

                    <?php endif ?>
                    <?php
                    $session = session();
                    if ($session->get('logged_in') == null): ?>
                        <a href="<?= base_url('cuenta/iniciarSesion'); ?>"><i class="bi bi-person fs-3"></i> </a>
                    <?php endif ?>
                    <!--validacion de sesión con carrito -->
                    <?php
                    $session = session();
                    if ($session->get('carrito') != null): ?>

                        <a href="<?= base_url('cart/'); ?>"><i class="bi bi-cart fs-3"></i> </a>

                    <?php endif ?>
                    <?php
                    $session = session();
                    if ($session->get('carrito') == null): ?>
                        <a href="<?= base_url('cart/empty'); ?>"><i class="bi bi-cart fs-3"></i> </a>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </header>
    <nav class="border-bottom lh-1 py-4">
        <div class="text-center me-5">
            <ul class="menu list-unstyled d-flex justify-content-center ">
                <li><a href="<?= base_url('cita/registrar'); ?>">Haz una cita</a></li>
                <li>
                    <?php
                    $session = session();
                    if ($session->get('logged_in') != null): ?>
                        <a href="<?= base_url('cita/historial'); ?>">Historial</a>
                    <?php endif ?>
                </li>
                <li><a href="<?= base_url('producto/lista'); ?>">Tienda</a></li>
            </ul>
        </div>
    </nav>
</div>
<header> <!--Header del usuario -->
    <div class="container-hero">
        <div class="anuncion-bar">
            <p class="announcement-bar__message">
                <span>ENVÍO GRATIS A PARTIR DE $799</span>
            </p>
        </div>
        <div class="container-nav-bar ">
            <div class="Search">
                <a href="#">
                    <i class="bi bi-search fs-3"></i>
                </a>
            </div>
            <div class="container-logo">
                <a href="<?= base_url('pagina/inicio'); ?>">
                    <div class="">
                        <img src="<?php echo base_url('imagenes/logoBarber.png'); ?>" alt="BarberShop" width="125" height="auto">
                    </div>
                </a>
            </div>

            <div class="Image1">
                <?php
                $session = session();
                if ($session->get('logged_in') != null): ?>

                    <a href="<?= base_url('cuenta/editar'); ?>" > hola<i class="bi bi-person fs-3"></i> </a>

                <?php endif ?>
                <?php
                $session = session();
                if ($session->get('logged_in') == null): ?>
                    <a href="<?= base_url('cuenta/iniciarSesion'); ?>"><i class="bi bi-person fs-3"></i> </a>
                <?php endif ?>
                
                <a href="#"><i class="bi bi-cart fs-3"></i> </a>


            </div>
        </div>
        <nav class="navbar container">
            <div class="menu-container">
                <ul class="menu">
                    <li><a href="<?= base_url('cita/registrar'); ?>">Haz una cita</a></li>
                    <li><a href="<?= base_url('producto/lista'); ?>">Tienda</a></li>
                </ul>
            </div>
        </nav>

    </div>
</header>
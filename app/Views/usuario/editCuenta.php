<main> <!--Formulario Editar Cuenta -->
    <div class="container">
        <div class="row">
            <div class="mainSesion text-center  m-2">
                <h1 class="InicioDeSesiN">Editar usuario</h1>
            </div>
            <div class="col-md-6">
                <?php $session = session(); ?>
                <div class="textEdit">
                    <p><?= $session->get('nombreCliente') ?></p>
                    <p><?= $session->get('email') ?></p>
                    <p>Contraseña: ********</p>
                    <p><?= $session->get('telefono') ?></p>
                    <p><?= $session->get('direccion') ?></p>
                    <div class="text-center ">
                        <?php
                        $session = session();
                        if ($session->get('logged_in') != null): ?>
                            <ul class="menu">
                                <li>
                                    <a href="<?= base_url('cuenta/salir') ?>" class=""> Cerrar sesión </a>
                                </li>
                            </ul>
                        <?php endif ?>
                    </div>
                </div>

            </div>
            <div class="right col-md-6">
                <form action="<?= base_url('cuenta/update'); ?>" method="POST">
                    <input type="text" placeholder="Nombre" name="nombreCliente">
                    <input type="email" placeholder="Correo Electrónico" name="email">
                    <input type="password" placeholder="Contraseña" name="password">
                    <input type="text" placeholder="Telefono" name="telefono">
                    <input type="text" placeholder="Dirección" name="direccion">
                    <div class="d-flex justify-content-center mt-3">
                        <button type="submit" class="btn-custom ">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
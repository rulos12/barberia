<main> <!--Formulario Editar Cuenta -->
    <hr>
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

                </div>

            </div>
            <div class="right">
                <form action="<?= base_url('cuenta/update'); ?>" method="POST">
                    <input type="text" placeholder="Nombre" name="nombreCliente">
                    <input type="email" placeholder="Correo Electrónico" name="email">
                    <input type="password" placeholder="Contraseña" name="password">
                    <input type="text" placeholder="Telefono" name="telefono">
                    <input type="text" placeholder="Dirección" name="direccion">
                    <div class="text-center">
                        <br>
                        <button type="submit" class="btn-custom ">Guardar</button>
                        <br>
                        <?php
                        $session = session();
                        if ($session->get('logged_in') != null): ?>
                            <a href="<?= base_url('cuenta/salir') ?>"> Cerrar sesión  </a>
                        <?php endif ?>

                    </div>
                </form>

            </div>

        </div>
    </div>


</main>
<main>
    <div class="container">
        <div class="row">
            <div class="mainSesion text-center">
                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-dark text-center" role="alert">
                        <?= session()->getFlashdata('error'); ?>
                    </div>
                <?php endif; ?>
                <h1 class="InicioDeSesiN">Inicio de sesión</h1>
                <div class="input-container mx-auto" style="max-width: 400px;">
                    <form action="<?= base_url('pagina/validaUsuario'); ?>" method="POST">
                        <input type="email" placeholder="Correo Electrónico" class="form-control" name="usuario">
                        <input type="password" placeholder="Contraseña" class="form-control" name="password">
                        <input type="hidden" value="cliente" name="tipo">
                        <button type="submit" class="btn-custom mt-3">Iniciar Sesión </button>

                    </form>
                </div>
            </div>
        </div>

    </div>

</main>
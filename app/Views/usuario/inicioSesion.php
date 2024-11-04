<main>
    <hr>
    <div class="mainSesion text-center">
        <h1 class="InicioDeSesiN">Inicio de sesión</h1>
        <div class="input-container mx-auto" style="max-width: 400px;">
            <form action="<?=base_url('pagina/validaUsuario');?>" method="POST">
                <input type="email" placeholder="Correo Electrónico" class="form-control" name="usuario">
                <input type="password" placeholder="Contraseña" class="form-control" name="password">
                <button type="submit" class="btn-custom mt-3">Iniciar Sesión </button>
                <a href="#" class="log">Crear cuenta</a>
            </form>

        </div>
    </div>
</main>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body,
        html {
            height: 100%;
        }

        .background {
            background-image: url('<?php echo base_url('imagenes/barberiaClasica.webp'); ?>');
            background-size: cover;
            background-position: center;
            height: 100%;
        }

        .login-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(255, 255, 255, 0.8);
            padding: 30px;
            border-radius: 10px;
            width: 100%;
            max-width: 400px;
        }
    </style>
</head>

<body>

    <div class="background">
        <div class="login-container">
            <h2 class="text-center mb-4">Iniciar sesión</h2>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('error'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <form action="<?= base_url('pagina/validaUsuario'); ?>" method="POST">
                <div class="mb-3">
                    <label for="usuario" class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control" id="usuario" name="usuario" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3">
                    <label for="tipo" class="form-label">Selecciona tu rol</label>
                    <select name="tipo" id="tipo" class="form-select" required>
                        <option value="">Selecciona tu rol</option>
                        <option value="administrador">Administrador</option>
                        <option value="empleado">Empleado</option>
                    </select>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
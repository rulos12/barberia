<div class="container mt-5"> <!--Lista de Productos -->
    <div class="row">
        <div class="alert  text-center my-3" role="alert">
            <h2>Bienvenido, <?= session()->get('nombreAdmin'); ?>!</h2>
            <p class="mb-0">Aquí puedes gestionar productos, citas, empleados y más.</p>
        </div>
        <div class="">
            <h1 class="">Productos</h1>
        </div>
        <?php foreach ($productos as $key) : ?>
            <div class="col-4 productos">
                <a href="#">
                    <div class="text-center">
                        <img src="<?= site_url('upload/getFile/' . esc($key->id_producto)) ?>" class="imgSecundaria" alt="Producto">
                    </div>
                </a>
                <p><?= $key->nombre ?> <br><?= $key->nombreMarca ?> <br> $ <?= $key->precio ?> </p>
            </div>
        <?php endforeach ?>

    </div>
</div>
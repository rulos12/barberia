<div class="container"> <!--Lista de Productos -->
    <div class="row">
        <div class=" mainSesion  text-center">
            <h1 class="InicioDeSesiN">Productos</h1>
        </div>
        <?php foreach ($productos as $key) : ?>
            <div class="col-4 productos">
                <a href="<?= base_url('producto/detalle/') . $key->id_producto ?>">
                    <div class="imgSecundaria"> </div>
                </a>
                <p><?= $key->nombre ?> <br><?= $key->nombreMarca ?> <br> $ <?= $key->precio ?> </p>
            </div>
        <?php endforeach ?>
    </div>
</div>
<div class="container">
<!-- show.php -->
    <div class="row">
        <div class="col">
            <h1>Productos</h1>
            <a href="<?= base_url('producto/add/'); ?> " class="btn btn-success">Agregar</a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <table class="table table-striped table-bordered">
                <thead>
                    <th>idProducto</th>
                    <th>nombre</th>
                    <th>precio</th>
                    <th>cantidad</th>
                    <th>descripción</th>
                    <th>Acción</th>
                </thead>
                <tbody>
                    <?php foreach ($productos as $key) : ?>
                        <tr>
                            <td><?= $key->idProducto ?></td>
                            <td><?= $key->nombre ?></td>
                            <td><?= $key->precio ?></td>
                            <td><?= $key->cantidad ?></td>
                            <td><?= $key->descripcion ?></td>
                            <td>
                                <a href="<?= base_url('producto/delete/' . $key->idProducto); ?> " class="btn btn-danger">Borrar</a>
                                <a href="<?= base_url('marcas/edit/' . $key->nombre); ?> " class="btn btn-warning">Modificar</a>

                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
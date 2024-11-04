<div class="container">
    <!-- Tabla Detalle Compra -->
    <div class="row">
        <div class="col">
            <h1>Detalle de la Compra</h1>
            <br>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID Detalle</th>
                            <th>ID Compra</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio Unitario</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($detalleCompras as $detalle) : ?>
                            <tr>
                                <td><?= $detalle->id_detalle_compra ?></td>
                                <td><?= $detalle->id_compra ?></td>
                                <td><?= $detalle->nombre ?></td> 
                                <td><?= $detalle->cantidad ?></td>
                                <td><?= $detalle->precio_unitario ?></td>
                                <td>
                                    <a href="<?= base_url('detalleCompra/deleteDetalle/' . $detalle->id_detalle_compra); ?>" class="btn btn-danger">Borrar</a>
                                    <a href="<?= base_url('detalleCompra/editarDetalle/' . $detalle->id_detalle_compra); ?>" class="btn btn-warning">Modificar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <br>
                <a href="<?= base_url('detalleCompra/addDetalle/'); ?>" class="btn btn-success">Agregar Detalle</a>
            </div>
        </div>
    </div>
</div>

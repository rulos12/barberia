<div class="container">
    <!-- Tabla Compra -->
    <div class="row">
        <div class="col">
            <h1>Compras</h1>
            </br>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-striped table-bordered">
                    <thead>
                        <th>id</th>
                        <th>Proveedor</th>
                        <th>Fecha de compra</th>
                        <th>Estado</th>
                        <th>Total</th>
                        <th>Fecha recepción</th>
                        <th>Acciones</th>
                    </thead>
                    <tbody>
                        <?php foreach ($compras as $key) : ?>
                            <tr>
                                <td><?= $key->id_compra ?></td>
                                <td><?= $key->nombreProveedor ?></td>
                                <td><?= $key->fecha_compra ?></td>
                                <td><?= $key->estado ?></td>
                                <td><?= $key->total ?></td>
                                <td><?= $key->fecha_recepcion ?></td>
                                <td>

                                    <a href="<?= base_url('compra/verDetalle/' . $key->id_compra); ?>" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-secondary"><i class="bi bi-binoculars"></i></a>
                                    <a href="<?= base_url('compra/deleteCompra/' . $key->id_compra); ?> " class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                    <a href="<?= base_url('compra/editarCompra/' . $key->id_compra); ?> " class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Detalle de la compra</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <table>
                                    <thead>
                                        <th>id_compra</th>
                                        <th>Cantidad</th>
                                        <th>Precio unitario</th>
                                    </thead>
                                    <tbody>
                                        <td>
                                            <?php foreach ($detallecomprasWhere as $key) : ?>
                                                <tr>
                                                    <td><?= $key->id_compra ?></td>
                                                    <td><?= $key->cantidad ?></td>
                                                    <td><?= $key->precio_unitario ?></td>
                                                </tr>
                                            <?php endforeach ?>
                                        </td>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                </br>
                <a href="<?= base_url('compra/addCompra/'); ?> " class="btn btn-success">Agregar</a>
            </div>
        </div>
    </div>
</div>
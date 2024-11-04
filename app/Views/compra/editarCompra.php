<div class="container">
    <div class="row">
        <div class="col">
            <h2>Actualizar Compra</h2>
            <form action="<?= base_url('compra/update/'); ?>" method="POST">
                <label for="id_proveedor" class="form-label">Proveedor</label>
                <div class="input-group mb-3">
                    <a href="<?= base_url('proveedor/addProveedor'); ?>" class="btn btn-outline-secondary">Nuevo</a>
                    <select name="id_proveedor" class="form-select">
                        <option selected>Elegir...</option>
                        <?php foreach ($proveedores as $key) : ?>
                            <option value="<?= $key->id_proveedor ?>" <?= $compras[0]->id_proveedor == $key->id_proveedor  ? 'selected' : '' ?>>
                                <?= $key->nombreProveedor ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="fecha_compra" class="form-label">Fecha de compra</label>
                    <input name="fecha_compra" type="date" value="<?= $compras[0]->fecha_compra; ?>"
                        class="form-control" id="fecha_compra" placeholder="fecha_compra">
                    <input type="hidden" name="id_compra" value="<?= $compras[0]->id_compra; ?>">
                </div>
                <label for="estado">Estado</label>
                <div class="input-group mb-3">
                    <select class="form-select" name="estado" id="estado" required>
                        <option selected>Elegir...</option>
                        <option value="pendiente" <?= $estados == 'pendiente' ? 'selected' : '' ?>>Pendiente</option>
                        <option value="completada" <?= $estados == 'completada' ? 'selected' : '' ?>>Completada</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="total" class="form-label">Total</label>
                    <input name="total" type="text" required
                         value="<?= $compras[0]->total; ?>"
                        class="form-control" id="total" placeholder="total">
                    <input type="hidden" name="id_compra" value="<?= $compras[0]->id_compra; ?>">
                </div>
                <div class="mb-3">
                    <label for="fecha_recepcion" class="form-label">Fecha recepción</label>
                    <input name="fecha_recepcion" type="date" required
                         value="<?= $compras[0]->fecha_recepcion; ?>"
                        class="form-control" id="fecha_recepcion" placeholder="fecha_recepcion">
                    <input type="hidden" name="id_compra" value="<?= $compras[0]->id_compra; ?>">
                </div>
                <h2>Actualizar Detalle de la Compra</h2>

                <label for="id_producto" class="form-label">Producto</label>
                <div class="input-group mb-3">
                    <a href="<?= base_url('producto/addProductos'); ?>" class="btn btn-outline-secondary">Nuevo</a>
                    <select name="id_producto" class="form-select">
                        <option selected>Elegir...</option>
                        <?php foreach ($productos as $key) : ?>
                            <option value="<?= $key->id_producto?>" <?= $detallecompras[0]->id_producto == $key->id_producto  ? 'selected' : '' ?>>
                                <?= $key->nombre?> : <?= $key->nombreProveedor?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="cantidad" class="form-label">Cantidad</label>
                    <input name="cantidad" type="text" required
                         value="<?= $detallecompras[0]->cantidad; ?>"
                        class="form-control" id="cantidad" placeholder="cantidad">
                    <input type="hidden" name="id_detalle_compra" value="<?= $detallecompras[0]->id_detalle_compra; ?>">
                </div>
                <div class="mb-3">
                    <label for="precio_unitario" class="form-label">Precio unitario</label>
                    <input name="precio_unitario" type="text" required
                         value="<?= $detallecompras[0]->precio_unitario; ?>"
                        class="form-control" id="precio_unitario" placeholder="precio_unitario">
                    <input type="hidden" name="id_detalle_compra" value="<?= $detallecompras[0]->id_detalle_compra; ?>">
                </div>



                <input type="submit" class="btn btn-success" name="Modificar" value="Modificar">


            </form>
        </div>
    </div>
</div>
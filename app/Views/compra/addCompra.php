<!-- Formulario para agregar nueva Compra -->
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Agregar Compra</h2>
            <form action="<?= base_url('compra/insert'); ?>" method="POST">


                <label for="id_proveedor" class="form-label">Proveedor</label>
                <div class="input-group mb-3">
                    <a href="<?= base_url('proveedor/addProveedor'); ?>" class="btn btn-outline-secondary">Nuevo</a>
                    <select name="id_proveedor" class="form-select">
                        <option selected>Elegir...</option>
                        <?php foreach ($proveedores as $key) : ?>
                            <option value="<?= $key->id_proveedor ?>"><?= $key->nombreProveedor ?></option>
                        <?php endforeach ?>
                    </select>
                </div>


                <label for="fecha_compra">Fecha de compra</label>
                <input type="date" class="form-control" name="fecha_compra">

                <label for="total">Total</label>
                <input type="text" class="form-control" name="total">

                <label for="fecha_recepcion">Fecha de recepción</label>
                <input type="date" class="form-control" name="fecha_recepcion">

                <label for="estado">Estado</label>
                <select class="form-select" name="estado" id="estado">
                    <option selected>Elegir...</option>
                    <option value="pendiente">Pendiente</option>
                    <option value="completada">Completada</option>
                </select>
                <h2>Detalles de la Compra</h2>
                <label for="id_producto" class="form-label">Producto</label>
                <div class="input-group mb-3">
                    <a href="<?= base_url('producto/add'); ?>" class="btn btn-outline-secondary">Nuevo</a>
                    <select name="id_producto" class="form-select">
                        <option selected>Producto: Proveedor</option>
                        <?php foreach ($productos as $key) : ?>
                            <option value="<?= $key->id_producto ?>"><?= $key->nombre ?>: <?= $key->nombreProveedor ?> </option>
                        <?php endforeach ?>
                    </select>
                </div>


                <label for="cantidad">Cantidad</label>
                <input type="text" class="form-control" name="cantidad">

                <label for="precio_unitario">Precio unitario</label>
                <input type="text" class="form-control" name="precio_unitario">
                <input type="submit" class="btn btn-success mt-3 d-block" name="Guardar" value="Guardar">
            </form>

        </div>
    </div>
</div>
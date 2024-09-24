<!---Formulario para actualizar productos --->
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Actualizar Producto</h2>
            <form action="<?= base_url('producto/update/'); ?>" method="POST">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input name="nombre" type="text" value="<?= $producto[0]->nombre; ?>"
                        class="form-control" id="nombre" placeholder="Nombre">
                    <input type="hidden" name="id_producto" value="<?= $producto[0]->id_producto; ?>">

                    <label for="precio" class="form-label">Precio</label>
                    <input name="precio" type="text" value="<?= $producto[0]->precio; ?>"
                        class="form-control" id="precio" placeholder="Precio">
                    <input type="hidden" name="id_producto" value="<?= $producto[0]->id_producto; ?>">

                    <label for="stock" class="form-label">Stock</label>
                    <input name="stock" type="text" value="<?= $producto[0]->stock; ?>"
                        class="form-control" id="stock" placeholder="Stock">
                    <input type="hidden" name="id_producto" value="<?= $producto[0]->id_producto; ?>">

                    <label for="descripcion" class="form-label">Descripción</label>
                    <input name="descripcion" type="text" value="<?= $producto[0]->descripcion; ?>"
                        class="form-control" id="descripcion" placeholder="descripcion">
                    <input type="hidden" name="id_producto" value="<?= $producto[0]->id_producto; ?>">

                    <label for="id_marca" class="form-label">Marcas</label>
                    <div class="input-group mb-3">
                        <a href="<?= base_url('marca/addMarca'); ?>" class="btn btn-outline-secondary">Nuevo</a>
                        <select name="id_marca" class="form-select">
                            <option selected>Elegir...</option>
                            <?php foreach ($marcas as $key) : ?>
                                <option value="<?= $key->id_marca ?>"><?= $key->nombreMarca ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <label for="id_tipo" class="form-label">Categoria</label>
                    <div class="input-group mb-3">
                        <a href="<?= base_url('tipo/addTipo'); ?>" class="btn btn-outline-secondary">Nuevo</a>
                        <select name="id_tipo" class="form-select">
                            <option selected>Elegir...</option>
                            <?php foreach ($tipo as $key) : ?>
                                <option value="<?= $key->id_tipo ?>"><?= $key->nombreTipo ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>


                    <label for="id_proveedor" class="form-label">Proveedor</label>
                    <div class="input-group mb-3">
                        <a href="<?= base_url('proveedor/addProveedor'); ?>" class="btn btn-outline-secondary">Nuevo</a>
                        <select name="id_proveedor" class="form-select">
                            <option selected>Elegir...</option>
                            <?php foreach ($proveedor as $key) : ?>
                                <option value="<?= $key->id_proveedor ?>"><?= $key->nombreProveedor ?></option>
                            <?php endforeach ?>

                        </select>
                    </div>
                </div>
                <input type="submit" class="btn btn-success" name="Modificar" value="Modificar">
            </form>

        </div>
    </div>
</div>
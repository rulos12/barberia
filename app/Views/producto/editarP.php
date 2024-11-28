<div class=" container mt-5">
    <div class="row">
        <form action="<?= base_url('producto/update/'); ?>" method="POST" enctype="multipart/form-data">
            <div class="col-12">
                <div class="my-4">
                    <h2>Actualizar Producto</h2>
                </div>
                <input type="hidden" name="id_producto" value="<?= $producto[0]->id_producto; ?>">

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input name="nombre" type="text" value="<?= $producto[0]->nombre; ?>"
                        class="form-control" id="nombre" placeholder="Nombre">

                    <label for="precio" class="form-label">Precio</label>
                    <input name="precio" type="text" value="<?= $producto[0]->precio; ?>"
                        class="form-control" id="precio" placeholder="Precio">

                    <label for="stock" class="form-label">Stock</label>
                    <input name="stock" type="text" value="<?= $producto[0]->stock; ?>"
                        class="form-control" id="stock" placeholder="Stock">

                    <label for="descripcion" class="form-label">Descripción</label>
                    <input name="descripcion" type="text" value="<?= $producto[0]->descripcion; ?>"
                        class="form-control" id="descripcion" placeholder="Descripción">

                    <label for="id_marca" class="form-label">Marcas</label>
                    <div class="input-group mb-3">
                        <a href="<?= base_url('marca/addMarca'); ?>" class="btn btn-outline-secondary">Nuevo</a>
                        <select name="id_marca" class="form-select">
                            <option selected>Elegir...</option>
                            <?php foreach ($marcas as $key) : ?>
                                <option value="<?= $key->id_marca ?>" <?= $producto[0]->id_marca == $key->id_marca  ? 'selected' : '' ?>><?= $key->nombreMarca ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <label for="id_tipo" class="form-label">Categoría</label>
                    <div class="input-group mb-3">
                        <a href="<?= base_url('tipo/addTipo'); ?>" class="btn btn-outline-secondary">Nuevo</a>
                        <select name="id_tipo" class="form-select">
                            <option selected>Elegir...</option>
                            <?php foreach ($tipo as $key) : ?>
                                <option value="<?= $key->id_tipo ?>" <?= $producto[0]->id_tipo == $key->id_tipo  ? 'selected' : '' ?>><?= $key->nombreTipo ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <label for="id_proveedor" class="form-label">Proveedor</label>
                    <div class="input-group mb-3">
                        <a href="<?= base_url('proveedor/addProveedor'); ?>" class="btn btn-outline-secondary">Nuevo</a>
                        <select name="id_proveedor" class="form-select">
                            <option selected>Elegir...</option>
                            <?php foreach ($proveedor as $key) : ?>
                                <option value="<?= $key->id_proveedor ?>" <?= $producto[0]->id_proveedor == $key->id_proveedor  ? 'selected' : '' ?>><?= $key->nombreProveedor ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-9">
                            <label for="imagen" class="form-label">Imagen</label>
                            <input name="imagen" type="file" class="form-control" id="imagen" placeholder="agrega tu imagen">
                        </div>
                        <div class="col-md-3 " style="text-align: right;">
                            <div class="">
                                <img src="<?= site_url('upload/getFile/' . esc($producto[0]->id_producto)) ?>" class="imgEditar" alt="Producto">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <input type="submit" class="btn btn-success" name="Modificar" value="Modificar">
        </form>
    </div>
</div>
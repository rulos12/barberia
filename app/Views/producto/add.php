<!-- Formulario para agregar productos -->
<div class=" container mt-5">
    <div class="row">
        <div class="col-12">
            <div class="my-4">
                <h2>Agregar producto</h2>
            </div>
            <?= validation_list_errors() ?>

            <form action="<?= base_url('producto/insert'); ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />


                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre"
                    required
                    placeholder="Nombre" value="<?= set_value('nombre') ?>">

                <label for="precio">Precio</label>
                <input type="text" class="form-control" name="precio" id="precio"
                    required
                    placeholder="Precio" value="<?= set_value('precio') ?>">

                <label for="stock">Stock</label>
                <input type="text" class="form-control" name="stock" id="stock"
                    required
                    placeholder="Stock" value="<?= set_value('stock') ?>">

                <label for="descripcion">Descripción</label>
                <input type="text" class="form-control" name="descripcion" id="descripcion "
                    required
                    placeholder="Descripcion" value="<?= set_value('descripcion') ?>">

                <label for="id_marca" class="form-label">Marcas</label>
                <div class="input-group mb-3">
                    <a href="<?= base_url('marca/addMarca'); ?>" class="btn btn-outline-secondary">Nuevo</a>
                    <select name="id_marca" class="form-select" required>
                        <option selected>Elegir...</option>
                        <?php foreach ($marcas as $key) : ?>
                            <option value="<?= $key->id_marca ?>"><?= $key->nombreMarca ?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <label for="id_tipo" class="form-label">Categoria</label>
                <div class="input-group mb-3">
                    <a href="<?= base_url('tipo/addTipo'); ?>" class="btn btn-outline-secondary">Nuevo</a>
                    <select name="id_tipo" class="form-select" required>
                        <option selected>Elegir...</option>
                        <?php foreach ($tipo as $key) : ?>
                            <option value="<?= $key->id_tipo ?>"><?= $key->nombreTipo ?></option>
                        <?php endforeach ?>
                    </select>
                </div>


                <label for="id_proveedor" class="form-label">Proveedor</label>
                <div class="input-group mb-3">
                    <a href="<?= base_url('proveedor/addProveedor'); ?>" class="btn btn-outline-secondary">Nuevo</a>
                    <select name="id_proveedor" class="form-select" required>
                        <option selected>Elegir...</option>
                        <?php foreach ($proveedor as $key) : ?>
                            <option value="<?= $key->id_proveedor ?>"><?= $key->nombreProveedor ?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <label for="imagen">Imagen del producto</label>
                <input type="file" class="form-control" name="imagen" id="imagen" required
                    placeholder="imagen" value="<?= set_value('imagen') ?>">

                <input type="submit" class="btn btn-success mt-3 d-block" name="Guardar" value="Guardar">
            </form>
        </div>
    </div>
</div>
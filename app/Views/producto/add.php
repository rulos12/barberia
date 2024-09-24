<!-- Formulario para agregar productos -->
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Agregar producto</h2>

            <form action="<?= base_url('producto/insert'); ?>" method="POST">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre">

                <label for="precio">Precio</label>
                <input type="text" class="form-control" name="precio">

                <label for="stock">Stock</label>
                <input type="text" class="form-control" name="stock">

                <label for="descripcion">Descripción</label>
                <input type="text" class="form-control" name="descripcion">

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

                <input type="submit" class="btn btn-success mt-3 d-block" name="Guardar" value="Guardar">
            </form>
        </div>
    </div>
</div>
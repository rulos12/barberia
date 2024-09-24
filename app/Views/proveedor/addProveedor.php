<!-- Formulario que muestra los proveedores -->
<div class="container">
    <div class="row">
        <div class="col-4 p-4">
            <h2>Agregar Proveedor</h2>

            <form action="<?= base_url('proveedor/insert'); ?>" method="POST" >

                <label for="nombreProveedor">Nombre</label>
                <input type="text" class="form-control" name="nombreProveedor">

                <label for="direccion">Dirección</label>
                <input type="text" class="form-control" name="direccion">

                <label for="telefono">Telefono</label>
                <input type="text" class="form-control" name="telefono">

                <label for="email">Email</label>
                <input type="text" class="form-control" name="email">

                <label for="contacto">Contacto</label>
                <input type="text" class="form-control" name="contacto">

                <label for="producto">Producto</label>
                <input type="text" class="form-control" name="producto">
                <input type="submit" class="btn btn-success mt-3" name="Guardar" value="Guardar">

            </form>
        </div>
        <div class="col-8 p-4">
        <table class="table table-striped table-bordered">
                <thead>
                    <th>idProveedor</th>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Telefono</th>
                    <th>Email</th>
                    <th>Contacto</th>
                    <th>Productos</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    <?php foreach ($proveedor as $key) : ?>
                        <tr>
                            <td><?= $key->id_proveedor;?></td>
                            <td><?= $key->nombreProveedor;?></td>
                            <td><?= $key->direccion;?></td>
                            <td><?= $key->telefono;?></td>
                            <td><?= $key->email;?></td>
                            <td><?= $key->contacto;?></td>
                            <td><?= $key->productos;?></td>
                            <td>
                                <a href="<?= base_url('proveedor/delete/' . $key->id_proveedor); ?> " class="btn btn-danger">Borrar</a>
                                <a href="<?= base_url('proveedor/editarProveedor/' . $key->id_proveedor); ?> " class="btn btn-warning">Modificar</a>

                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
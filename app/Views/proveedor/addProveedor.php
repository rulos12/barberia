<!-- Formulario que muestra los proveedores -->
<div class="container mt-5">
    <div class="row">
        <div class="col-4 p-3">
            <div class="my-3">
                <h2>Agregar Proveedor</h2>
            </div>

            <form action="<?= base_url('proveedor/insert'); ?>" method="POST">

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
                <input type="submit" class="btn btn-success mt-3" name="Guardar" value="Guardar">

            </form>
        </div>
        <div class="col-4 p-3">
            <table class="table table-striped table-bordered">
                <thead>
                    <th>idProveedor</th>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Telefono</th>
                    <th>Email</th>
                    <th>Contacto</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    <?php foreach ($proveedor as $key) : ?>
                        <tr>
                            <td><?= $key->id_proveedor; ?></td>
                            <td><?= $key->nombreProveedor; ?></td>
                            <td><?= $key->direccion; ?></td>
                            <td><?= $key->telefono; ?></td>
                            <td><?= $key->email; ?></td>
                            <td><?= $key->contacto; ?></td>
                            <td>
                                <a href="<?= base_url('proveedor/delete/' . $key->id_proveedor); ?> " class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                <a href="<?= base_url('proveedor/editarProveedor/' . $key->id_proveedor); ?> " class="btn btn-warning"><i class="bi bi-pencil"></i></a>

                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
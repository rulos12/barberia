<!-- Formulario que actualiza el proveedor -->
<div class="container">
    <div class="row">
        <div class="col-4 p-3">
            <h2>Actualizar Proveedor</h2>

            <form action="<?= base_url('proveedor/update'); ?>" method="POST">

                <label for="nombreProveedor" class="form-label">Nombre</label>
                <input name="nombreProveedor" type="text" value="<?= $proveedor[0]->nombreProveedor; ?>"
                    class="form-control" id="nombreProveedor" placeholder="nombreProveedor">
                <input type="hidden" name="id_proveedor" value="<?= $proveedor[0]->id_proveedor; ?>">

                <label for="direccion" class="form-label">Dirección</label>
                <input name="direccion" type="text" value="<?= $proveedor[0]->direccion; ?>"
                    class="form-control" id="direccion" placeholder="direccion">
                <input type="hidden" name="id_proveedor" value="<?= $proveedor[0]->id_proveedor; ?>">

                <label for="telefono" class="form-label">Telefono</label>
                <input name="telefono" type="text" value="<?= $proveedor[0]->telefono; ?>"
                    class="form-control" id="telefono" placeholder="telefono">
                <input type="hidden" name="id_proveedor" value="<?= $proveedor[0]->id_proveedor; ?>">

                <label for="email" class="form-label">Email</label>
                <input name="email" type="text" value="<?= $proveedor[0]->email; ?>"
                    class="form-control" id="email" placeholder="email">
                <input type="hidden" name="id_proveedor" value="<?= $proveedor[0]->id_proveedor; ?>">


                <label for="contacto" class="form-label">Contacto</label>
                <input name="contacto" type="text" value="<?= $proveedor[0]->contacto; ?>"
                    class="form-control" id="contacto" placeholder="contacto">
                <input type="hidden" name="id_proveedor" value="<?= $proveedor[0]->id_proveedor; ?>">




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
                    <?php foreach ($proveedores as $key) : ?>
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
<div class=" container mt-5">
    <!-- Tabla empleados -->
    <div class="row">
        <div class="my-2">
            <h1>Empleados</h1>
            <a href="<?= base_url('empleado/addEmpleado/'); ?> " class="btn btn-success">Agregar</a>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-striped table-bordered">
                    <thead>
                        <th>id</th>
                        <th>nombre</th>
                        <th>direccion</th>
                        <th>telefono</th>
                        <th>email</th>
                        <th>puesto</th>
                        <th>fecha de contratación</th>
                        <th>Acciones</th>
                    </thead>
                    <tbody>
                        <?php foreach ($empleados as $key) : ?>
                            <tr>
                                <td><?= $key->id_empleado ?></td>
                                <td><?= $key->nombreEmpleado ?></td>
                                <td><?= $key->direccion ?></td>
                                <td><?= $key->telefono ?></td>
                                <td><?= $key->email ?></td>
                                <td><?= $key->puesto ?></td>
                                <td><?= $key->fecha_contratacion ?></td>
                                <td>
                                    <a href="<?= base_url('empleado/delete/' . $key->id_empleado); ?> " class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                    <a href="<?= base_url('empleado/edit/' . $key->id_empleado); ?> " class="btn btn-warning"><i class="bi bi-pencil"></i></a>

                                </td>
                            </tr>
                        <?php endforeach ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="container container mt-5">
    <!-- Tabla cita -->
    <div class="row">
        <div class="my-3">
            <h1>Citas</h1>
            <a href="<?= base_url('cita/add/'); ?>" class="btn btn-success">Agregar</a>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-striped table-bordered">
                    <thead>
                        <th>id</th>
                        <th>Cliente</th>
                        <th>Empleado</th>
                        <th>Fecha cita</th>
                        <th>Hora cita</th>
                        <th>servicio</th>
                        <th>Estado
                            <a href="<?= base_url('citaAdmin') ?>" style="color: black; text-decoration-line: none;">
                                ↑
                            </a>
                            <a href="<?= base_url('cita/citaOrdenada') ?>" style="color: black; text-decoration-line: none;">
                                ↓
                            </a>
                        </th>
                        <th>Acciones</th>
                    </thead>
                    <tbody>
                        <?php foreach ($citas as $key) : ?>
                            <tr>
                                <td><?= $key->id_cita ?></td>
                                <td><?= $key->nombreCliente ?></td>
                                <td><?= $key->nombreEmpleado ?></td>
                                <td><?= $key->fecha_cita ?></td>
                                <td><?= $key->hora_cita ?></td>
                                <td><?= $key->servicio ?></td>
                                <td><?= $key->estado ?></td>
                                <td>
                                    <div class="Image1">
                                        <a href="<?= base_url('cita/deleteCita/' . $key->id_cita); ?> " class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                        <a href="<?= base_url('cita/editarCita/' . $key->id_cita); ?> " class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>




</div>
<div class="container container mt-5">
    <!-- Tabla cita -->
    <div class="row">
        <div class="alert  text-center my-3" role="alert">
            <h2>Bienvenido, <?= session()->get('nombreEmpleado'); ?>!</h2>
            <p class="mb-0">Aquí puedes gestionar las citas asignadas.</p>
        </div>
        <div class="">
            <h1>Citas</h1>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-striped">
                    <thead>
                        <th>Cliente</th>
                        <th>Empleado</th>
                        <th>Fecha cita</th>
                        <th>Hora cita</th>
                        <th>servicio</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </thead>
                    <tbody>
                        <?php foreach ($citas as $key) : ?>
                            <tr>
                                <td><?= $key->nombreCliente ?></td>
                                <td><?= $key->nombreEmpleado ?></td>
                                <td><?= $key->fecha_cita ?></td>
                                <td><?= $key->hora_cita ?></td>
                                <td><?= $key->servicio ?></td>
                                <td><?= $key->estado ?></td>
                                <td class="text-center">

                                    <form action="<?= base_url('confirmarCita/'); ?>" method="POST">
                                        <input type="hidden" value="<?= $key->id_cita ?>" name="id_cita">
                                        <input type="hidden" value="<?= $key->id_cliente ?>" name="id_cliente">
                                        <input type="hidden" value="<?= $key->id_empleado ?>" name="id_empleado">
                                        <input type="hidden" value="<?= $key->fecha_cita ?>" name="fecha_cita">
                                        <input type="hidden" value="<?= $key->hora_cita ?>" name="hora_cita">
                                        <input type="hidden" value="<?= $key->servicio ?>" name="servicio">
                                        <input type="hidden" value="completada" name="estado">
                                        <button type="submit" class="btn btn-success">
                                            Completada <i class="bi bi-check2"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
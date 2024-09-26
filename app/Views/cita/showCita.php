<div class="container">
<!-- Tabla empleados -->
<div class="row">
        <div class="col">
            <h1>Citas</h1>
            </br>
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
                    <th>Estado</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    <?php foreach ($citas as $key) : ?>
                        <tr>
                            <td><?= $key->id_cita ?></td>
                            <td><?= $key->nombreCliente?></td>
                            <td><?= $key->nombreEmpleado?></td>
                            <td><?= $key->fecha_cita?></td>
                            <td><?= $key->hora_cita?></td>
                            <td><?= $key->servicio?></td>
                            <td><?= $key->estado?></td>
                            <td>
                                <a href="<?= base_url('cita/deleteCita/' . $key->id_cita); ?> " class="btn btn-danger">Borrar</a>
                                <a href="<?= base_url('cita/editarCita/' . $key->id_cita); ?> " class="btn btn-warning">Modificar</a>

                            </td>
                        </tr>
                    <?php endforeach ?>
                    
                </tbody>
            </table>
            </br>                
            <a href="<?= base_url('cita/add/'); ?> " class="btn btn-success">Agregar</a>
            </div>
        </div>
    </div>
</div>
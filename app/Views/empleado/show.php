<div class="container">
<!-- Tabla empleados -->
<div class="row">
        <div class="col">
            <h1>Empleados</h1>
            </br>
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
                            <td><?= $key->nombreEmpleado?></td>
                            <td><?= $key->direccion ?></td>
                            <td><?= $key->telefono ?></td>
                            <td><?= $key->email ?></td>
                            <td><?= $key->puesto ?></td>
                            <td><?= $key->fecha_contratacion ?></td>
                            <td>
                                <a href="<?= base_url('empleado/delete/' . $key->id_empleado); ?> " class="btn btn-danger">Borrar</a>
                                <a href="<?= base_url('empleado/edit/' . $key->id_empleado); ?> " class="btn btn-warning">Modificar</a>

                            </td>
                        </tr>
                    <?php endforeach ?>
                    
                </tbody>
            </table>
            </br>                
            <a href="<?= base_url('empleado/addEmpleado/'); ?> " class="btn btn-success">Agregar</a>
            </div>
        </div>
    </div>
</div>
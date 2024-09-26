<div class="container">
<!-- tabla de los eventos  -->
<div class="row">
        <div class="col">
            <h1>Eventos</h1>
            </br>
            </div>
    <div class="row">
        <div class="col">
            <table class="table table-striped table-bordered">
                <thead>
                    <th>id</th>
                    <th>Titulo</th>
                    <th>Descripción</th>
                    <th>Fecha_evento</th>
                    <th>Empleado</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    <?php foreach ($eventos as $key) : ?>
                        <tr>
                            <td><?= $key->id_evento?></td>
                            <td><?= $key->titulo?></td>
                            <td><?= $key->descripcion ?></td>
                            <td><?= $key->fecha_evento ?></td>
                            <td><?= $key->nombreEmpleado?></td>
                            <td>
                                <a href="<?= base_url('evento/delete/' . $key->id_evento); ?> " class="btn btn-danger">Borrar</a>
                                <a href="<?= base_url('evento/edit/' . $key->id_evento); ?> " class="btn btn-warning">Modificar</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                    
                </tbody>
            </table>
            </br>                
            <a href="<?= base_url('evento/addEvento/'); ?> " class="btn btn-success">Agregar</a>
            </div>
        </div>
    </div>
</div>
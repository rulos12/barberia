<div class="container">
<!-- ver cliente -->
<div class="row">
        <div class="col">
            <h1>Clientes</h1>
            <a href="<?= base_url('cliente/addCliente/'); ?> " class="btn btn-success">Agregar</a>
            </div>
    <div class="row">
        <div class="col">
            <table class="table table-striped table-bordered">
                <thead>
                    <th>id</th>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Telefono</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    <?php foreach ($clientes as $key) : ?>
                        <tr>
                            <td><?= $key->id_cliente ?></td>
                            <td><?= $key->nombreCliente?></td>
                            <td><?= $key->direccion ?></td>
                            <td><?= $key->telefono ?></td>
                            <td><?= $key->email ?></td>
                            <td>
                                <a href="<?= base_url('cliente/delete/' . $key->id_cliente); ?> " class="btn btn-danger">Borrar</a>
                                <a href="<?= base_url('cliente/edit/' . $key->id_cliente); ?> " class="btn btn-warning">Modificar</a>

                            </td>
                        </tr>
                    <?php endforeach ?>
                    
                </tbody>
            </table>
            </br>                
            
            </div>
        </div>
    </div>
</div>
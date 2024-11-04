<div class="container">
<!-- Tabla pedido -->
<div class="row">
        <div class="col">
            <h1>Pedidos</h1>
            </br>
            </div>
    <div class="row">
        <div class="col">
            <table class="table table-striped table-bordered">
                <thead>
                    <th>id</th>
                    <th>Cliente</th>
                    <th>Fecha de pedido</th>
                    <th>Estado</th>
                    <th>Total</th>
                    <th>Fecha entrega</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    <?php foreach ($pedidos as $key) : ?>
                        <tr>
                            <td><?= $key->id_pedido?></td>
                            <td><?= $key->nombreCliente?></td>
                            <td><?= $key->fecha_pedido?></td>
                            <td><?= $key->estado?></td>
                            <td><?= $key->total?></td>
                            <td><?= $key->fecha_entrega?></td>
                            <td>
                                <a href="<?= base_url('pedido/deletePedido/' . $key->id_pedido); ?> " class="btn btn-danger">Borrar</a>
                                <a href="<?= base_url('pedido/editarPedido/' . $key->id_pedido); ?> " class="btn btn-warning">Modificar</a>

                            </td>
                        </tr>
                    <?php endforeach ?>
                    
                </tbody>
            </table>
            </br>                
            <a href="<?= base_url('pedido/addPedido/'); ?> " class="btn btn-success">Agregar</a>
            </div>
        </div>
    </div>
</div>
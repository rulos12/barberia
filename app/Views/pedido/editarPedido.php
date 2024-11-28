<div class="container mt-5">
    <div class="row">
        <div class="col">
            <div class="my-3">
                <h2>Actualizar Pedido</h2>
            </div>
            <form action="<?= base_url('pedido/update/'); ?>" method="POST">
                <label for="id_cliente" class="form-label">Cliente</label>
                <div class="input-group mb-3">
                    <a href="<?= base_url('cliente/addCliente'); ?>" class="btn btn-outline-secondary">Nuevo</a>
                    <select name="id_cliente" class="form-select">
                        <option selected>Elegir...</option>
                        <?php foreach ($clientes as $key) : ?>
                            <option value="<?= $key->id_cliente ?>" <?= $pedidos[0]->id_cliente == $key->id_cliente  ? 'selected' : '' ?>>
                                <?= $key->nombreCliente ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="fecha_pedido" class="form-label">Fecha de pedido</label>
                    <input name="fecha_pedido" type="date" value="<?= $pedidos[0]->fecha_pedido; ?>"
                        class="form-control" id="fecha_pedido" placeholder="fecha_pedido">
                    <input type="hidden" name="id_pedido" value="<?= $pedidos[0]->id_pedido; ?>">
                </div>
                <label for="estado">Estado</label>
                <div class="input-group mb-3">
                    <select class="form-select" name="estado" id="estado" required>
                        <option selected>Elegir...</option>
                        <option value="pendiente" <?= $estados == 'pendiente' ? 'selected' : '' ?>>Pendiente</option>
                        <option value="completado" <?= $estados == 'completado' ? 'selected' : '' ?>>Completado</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="total" class="form-label">Total</label>
                    <input name="total" type="text" required
                        value="<?= $pedidos[0]->total; ?>"
                        class="form-control" id="total" placeholder="total">
                    <input type="hidden" name="id_pedido" value="<?= $pedidos[0]->id_pedido; ?>">
                </div>


                <input type="submit" class="btn btn-success" name="Modificar" value="Modificar">
            </form>
        </div>
    </div>
</div>
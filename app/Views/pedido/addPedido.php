<!-- Formulario para agregar un nuevo pedido -->
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Agregar pedido</h2>

            <form action="<?= base_url('pedido/insert'); ?>" method="POST">


                <label for="id_cliente" class="form-label">Cliente</label>
                <div class="input-group mb-3">
                    <a href="<?= base_url('cliente/addCliente'); ?>" class="btn btn-outline-secondary">Nuevo</a>
                    <select name="id_cliente" class="form-select">
                        <option selected>Elegir...</option>
                        <?php foreach ($clientes as $key) : ?>
                            <option value="<?= $key->id_cliente ?>"><?= $key->nombreCliente ?></option>
                        <?php endforeach ?>
                    </select>
                </div>


                <label for="fecha_pedido">Fecha de pedido</label>
                <input type="date" class="form-control" name="fecha_pedido">

                <label for="estado">Estado</label>
                <select class="form-select" name="estado" id="estado">
                    <option selected>Elegir...</option>
                    <option value="pendiente">Pendiente</option>
                    <option value="completa">Procesado</option>
                    <option value="completa">Enviado</option>
                    <option value="completa">Completa</option>
                </select>

                <label for="total">Total</label>
                <input type="text" class="form-control" name="total">

                <label for="fecha_entrega">Fecha de entrega</label>
                <input type="date" class="form-control" name="fecha_entrega">


                <input type="submit" class="btn btn-success mt-3 d-block" name="Guardar" value="Guardar">
            </form>
            <h2>Detalles del pedido</h2>
            <label for="id_producto" class="form-label">Producto</label>
            


            <label for="cantidad">Cantidad</label>
            <input type="text" class="form-control" name="cantidad">

            <label for="precio_unitario">Precio unitario</label>
            <input type="text" class="form-control" name="precio_unitario">
            <input type="submit" class="btn btn-success mt-3 d-block" name="Guardar" value="Guardar">
            </form>

        </div>
    </div>
</div>
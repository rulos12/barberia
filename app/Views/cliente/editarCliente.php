<div class="container">
    <div class="row">
        <div class="col">
            <h2>Actualizar Cliente</h2>
            <form action="<?= base_url('cliente/update/'); ?>" method="POST">
                <div class="mb-3">
                    <label for="nombreCliente" class="form-label">Nombre</label>
                    <input name="nombreCliente" type="text"
                        value="<?= $cliente[0]->nombreCliente; ?>"
                        class="form-control" id="nombreCliente" cliente="nombreCliente">
                    <input type="hidden" name="id_cliente" value="<?= $cliente[0]->id_cliente; ?>">
                </div>
                <div class="mb-3">
                    <label for="direccion" class="form-label">Dirección</label>
                    <input name="direccion" type="text" value="<?= $cliente[0]->direccion; ?>"
                        class="form-control" id="direccion" placeholder="direccion">
                    <input type="hidden" name="id_cliente" value="<?= $cliente[0]->id_cliente; ?>">
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Telefono</label>
                    <input name="telefono" type="text" value="<?= $cliente[0]->telefono; ?>"
                        class="form-control" id="telefono" cliente="telefono">
                    <input type="hidden" name="id_cliente" value="<?= $cliente[0]->id_cliente; ?>">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input name="email" type="text" required
                        placeholder="@ejemplo.com" value="<?= $cliente[0]->email; ?>"
                        class="form-control" id="email" cliente="email">
                    <input type="hidden" name="id_cliente" value="<?= $cliente[0]->id_cliente; ?>">
                </div>
                <input type="submit" class="btn btn-success" name="Modificar" value="Modificar">
            </form>
        </div>
    </div>
</div>
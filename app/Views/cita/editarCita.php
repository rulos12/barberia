<div class="container mt-5">
    <div class="row">
        <div class="col">
            <div class="my-4">
                <h2>Actualizar Cita</h2>
            </div>
            <form action="<?= base_url('cita/update/'); ?>" method="POST">
                <label for="id_cliente" class="form-label">Cliente</label>
                <div class="input-group mb-3">
                    <a href="<?= base_url('cliente/addCliente'); ?>" class="btn btn-outline-secondary">Nuevo</a>
                    <select name="id_cliente" class="form-select">
                        <option selected>Elegir...</option>
                        <?php foreach ($clientes as $key) : ?>
                            <option value="<?= $key->id_cliente ?>" <?= $citas[0]->id_cliente == $key->id_cliente  ? 'selected' : '' ?>>
                                <?= $key->nombreCliente ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>
                <label for="id_empleado" class="form-label">Empleado</label>
                <div class="input-group mb-3">
                    <a href="<?= base_url('empleado/addEmpleado'); ?>" class="btn btn-outline-secondary">Nuevo</a>
                    <select name="id_empleado" class="form-select">
                        <option selected>Elegir...</option>
                        <?php foreach ($empleados as $key) : ?>
                            <option value="<?= $key->id_empleado ?>" <?= $citas[0]->id_empleado == $key->id_empleado  ? 'selected' : '' ?>>
                                <?= $key->nombreEmpleado ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="fecha_cita" class="form-label">Fecha cita</label>
                    <input name="fecha_cita" type="date" value="<?= $citas[0]->fecha_cita; ?>"
                        class="form-control" id="fecha_cita" placeholder="fecha_cita">
                    <input type="hidden" name="id_cita" value="<?= $citas[0]->id_cita; ?>">
                </div>
                <div class="mb-3">
                    <label for="hora_cita" class="form-label">Hora de la cita</label>
                    <input name="hora_cita" type="time" required
                        placeholder="@ejemplo.com" value="<?= $citas[0]->hora_cita; ?>"
                        class="form-control" id="hora_cita" placeholder="hora_cita">
                    <input type="hidden" name="id_cita" value="<?= $citas[0]->id_cita; ?>">
                </div>
                <label for="servicio">Servicio</label>
                <div class="input-group mb-3">
                    <select class="form-select" name="servicio" id="servicio" required>
                        <option selected>Elegir...</option>
                        <option value="Corte de cabello" <?= $servicio == 'Corte de cabello' ? 'selected' : '' ?>>Corte de cabello</option>
                        <option value="Corte y Barba" <?= $servicio == 'Corte y Barba' ? 'selected' : '' ?>>Corte y Barba</option>
                        <option value="Coloración" <?= $servicio == 'Coloración' ? 'selected' : '' ?>>Coloración</option>
                        <option value="Corte y afeitado" <?= $servicio == 'Corte y afeitado' ? 'selected' : '' ?>>Corte y afeitado</option>
                        <option value="Afeitado" <?= $servicio == 'Afeitado' ? 'selected' : '' ?>>Afeitado</option>
                    </select>
                </div>
                <label for="estado">Estado</label>
                <div class="input-group mb-3">
                    <select class="form-select" name="estado" id="estado" required>
                        <option selected>Elegir...</option>
                        <option value="programada" <?= $estados == 'programada' ? 'selected' : '' ?>>Programada</option>
                        <option value="completada" <?= $estados == 'completada' ? 'selected' : '' ?>>Completada</option>
                        <option value="cancelada" <?= $estados == 'cancelada' ? 'selected' : '' ?>>Cancelada</option>
                    </select>
                </div>
                <input type="submit" class="btn btn-success" name="Modificar" value="Modificar">
            </form>
        </div>
    </div>
</div>
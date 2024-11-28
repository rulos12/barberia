<!-- Formulario para agregar cita -->
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <div class="my-4">
              <h2>Agregar Cita</h2>  
            </div>
            

            <form action="<?= base_url('cita/insert'); ?>" method="POST">
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

                <label for="id_empleado" class="form-label">Empleado</label>
                <div class="input-group mb-3">
                    <a href="<?= base_url('empleado/addEmpleado'); ?>" class="btn btn-outline-secondary">Nuevo</a>
                    <select name="id_empleado" class="form-select">
                        <option selected>Elegir...</option>
                        <?php foreach ($empleados as $key) : ?>
                            <option value="<?= $key->id_empleado ?>"><?= $key->nombreEmpleado ?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <label for="fecha_cita">fecha de cita</label>
                <input type="date" class="form-control" name="fecha_cita">

                <label for="hora_cita">Hora de cita</label>
                <input type="time" class="form-control" name="hora_cita">

                <label for="servicio">Servicio</label>
                <select class="form-select" name="servicio" id="servicio">
                    <option selected>Elegir...</option>
                    <option value="Corte de cabello">Corte de cabello</option>
                    <option value="Corte y Barba">Corte y Barba</option>
                    <option value="Coloración">Coloración</option>
                    <option value="Corte y afeitado">Corte y afeitado</option>
                    <option value="Afeitado">Afeitado</option>
                </select>

                <label for="estado">Estado</label>
                <select class="form-select" name="estado" id="estado">
                    <option selected>Elegir...</option>
                    <option value="programada">Programada</option>
                    <option value="completada">Completada</option>
                    <option value="cancelada">Cancelada</option>
                </select>

                <input type="submit" class="btn btn-success mt-3 d-block" name="Guardar" value="Guardar">
            </form>
        </div>
    </div>
</div>
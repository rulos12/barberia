<div class="container mt-5">
    <div class="row">
        <div class="col">
            <div class="my-3">
                <h2>Actualizar Empleado</h2>
            </div>
            <form action="<?= base_url('empleado/update/'); ?>" method="POST">
                <div class="mb-3">
                    <label for="nombreEmpleado" class="form-label">Nombre</label>
                    <input name="nombreEmpleado" type="text"
                        value="<?= $empleado[0]->nombreEmpleado; ?>"
                        class="form-control" id="nombreEmpleado" empleado="nombreEmpleado">
                    <input type="hidden" name="id_empleado" value="<?= $empleado[0]->id_empleado; ?>">
                </div>
                <div class="mb-3">
                    <label for="direccion" class="form-label">Dirección</label>
                    <input name="direccion" type="text" value="<?= $empleado[0]->direccion; ?>"
                        class="form-control" id="direccion" placeholder="direccion">
                    <input type="hidden" name="id_empleado" value="<?= $empleado[0]->id_empleado; ?>">
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Telefono</label>
                    <input name="telefono" type="text" value="<?= $empleado[0]->telefono; ?>"
                        class="form-control" id="telefono" empleado="telefono">
                    <input type="hidden" name="id_empleado" value="<?= $empleado[0]->id_empleado; ?>">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input name="email" type="text" required
                        placeholder="@ejemplo.com" value="<?= $empleado[0]->email; ?>"
                        class="form-control" id="email" empleado="email">
                    <input type="hidden" name="id_empleado" value="<?= $empleado[0]->id_empleado; ?>">
                </div>
                <div class="mb-3">
                    <label for="puesto" class="form-label">Puesto</label>
                    <input name="puesto" type="text" value="<?= $empleado[0]->puesto; ?>"
                        class="form-control" id="puesto" placeholder="puesto">
                    <input type="hidden" name="id_empleado" value="<?= $empleado[0]->id_empleado; ?>">
                </div>
                <div class="mb-3">
                    <label for="fecha_contratacion" class="form-label">Fecha de contratación</label>
                    <input name="fecha_contratacion" type="date" value="<?= $empleado[0]->fecha_contratacion; ?>"
                        class="form-control" id="fecha_contratacion" placeholder="fecha_contratacion">
                    <input type="hidden" name="id_empleado" value="<?= $empleado[0]->id_empleado; ?>">
                </div>
                <input type="submit" class="btn btn-success" name="Modificar" value="Modificar">
            </form>
        </div>
    </div>
</div>
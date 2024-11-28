<div class="container mt-5">
    <div class="row">
        <div class="col">
            <div class="my-3">
                <h2>Agregar empleado</h2>
            </div>
            <?= validation_list_errors() ?>

            <form action="<?= base_url('empleado/insert'); ?>" method="POST">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />

                <div class="mb-3">
                    <label for="nombreEmpleado" class="form-label">Nombre</label>
                    <input name="nombreEmpleado" type="text"
                        class="form-control" id="nombreEmpleado"
                        required
                        placeholder="Inserta el nombre" value="<?= set_value('nombreEmpleado') ?>">
                </div>

                <div class="mb-3">
                    <label for="direccion" class="form-label">Direccion</label>
                    <input name="direccion" type="text"
                        class="form-control" id="direccion"
                        required
                        placeholder="Municipio, calle, no. de casa" value="<?= set_value('direccion') ?>">
                </div>

                <div class="mb-3">
                    <label for="telefono" class="form-label">Telefono</label>
                    <input name="telefono" type="text"
                        class="form-control" id="telefono"
                        required
                        placeholder="+52 000-000-00-00..." value="<?= set_value('telefono') ?>">
                </div>


                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input name="email" type="text"
                        class="form-control" id="email "
                        required
                        placeholder="@ejemplo.com" value="<?= set_value('email') ?>">
                </div>


                <div class="mb-3">
                    <label for="puesto" class="form-label">Puesto</label>
                    <input name="puesto" type="text"
                        class="form-control" id="puesto"
                        required
                        placeholder="(Gerente, Estilista)" value="<?= set_value('puesto') ?>">
                </div>


                <div class="mb-3">
                    <label for="fecha_contratacion" class="form-label">Fecha de contratación</label>
                    <input name="fecha_contratacion" type="date"
                        class="form-control" id="fecha_contratacion "
                        required
                        placeholder="aaaa-mm-dd" value="<?= set_value('fecha_contratacion') ?>">
                </div>
                <input type="submit" class="btn btn-success nt-3" name="Guardar" value="Guardar">
            </form>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Agregar Evento</h2>
            <?= validation_list_errors() ?>

            <form action="<?= base_url('evento/insert'); ?>" method="POST">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />

                <div class="mb-3">
                    <label for="titulo" class="form-label">Titulo</label>
                    <input name="titulo" type="text"
                        class="form-control" id="titulo"
                        required
                        placeholder="Inserta el titulo" value="<?= set_value('titulo') ?>">
                </div>

                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <input name="descripcion" type="text"
                        class="form-control" id="descripcion"
                        required
                        placeholder="Descripción corta" value="<?= set_value('descripcion') ?>">
                </div>

                <div class="mb-3">
                    <label for="fecha_evento" class="form-label">Fecha del evento</label>
                    <input name="fecha_evento" type="date"
                        class="form-control" id="fecha_evento"
                        required
                        placeholder="" value="<?= set_value('fecha_evento') ?>">
                </div>

                <label for="id_tipo" class="form-label">Empleado</label>
                <div class="input-group mb-3">
                    <a href="<?= base_url('empleado/addEmpleado'); ?>" class="btn btn-outline-secondary">Nuevo</a>
                    <select name="id_empleado" class="form-select" required>
                        <option selected value="">Elegir...</option>
                        <?php foreach ($empleados as $key) : ?>
                            <option value="<?= $key->id_empleado ?>"><?= $key->nombreEmpleado ?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <input type="submit" class="btn btn-success nt-3" name="Guardar" value="Guardar">
            </form>
        </div>
    </div>
</div>
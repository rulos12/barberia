<div class="container mt-5">
    <div class="row">
        <div class="col">
            <div class="my-3">
                <h2>Actualizar Evento</h2>
            </div>

            <form action="<?= base_url('evento/update/'); ?>" method="POST">
                <div class="mb-3">
                    <label for="titulo" class="form-label">Titulo</label>
                    <input name="titulo" type="text" value="<?= $evento[0]->titulo; ?>"
                        class="form-control" id="titulo" placeholder="titulo">
                    <input type="hidden" name="id_evento" value="<?= $evento[0]->id_evento; ?>">
                </div>
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <input name="descripcion" type="text" value="<?= $evento[0]->descripcion; ?>"
                        class="form-control" id="descripcion" placeholder="descripcion">
                    <input type="hidden" name="id_evento" value="<?= $evento[0]->id_evento; ?>">
                </div>
                <div class="mb-3">
                    <label for="fecha_evento" class="form-label">Fecha de evento</label>
                    <input name="fecha_evento" type="date" required
                        placeholder="@ejemplo.com" value="<?= $evento[0]->fecha_evento; ?>"
                        class="form-control" id="fecha_evento" placeholder="fecha_evento">
                    <input type="hidden" name="id_evento" value="<?= $evento[0]->id_evento; ?>">
                </div>
                <label for="id_marca" class="form-label">Empleado</label>
                <div class="input-group mb-3">
                    <a href="<?= base_url('empleado/addEmpleado'); ?>" class="btn btn-outline-secondary">Nuevo</a>
                    <select name="id_empleado" class="form-select">
                        <option selected>Elegir...</option>
                        <?php foreach ($empleados as $key) : ?>
                            <option value="<?= $key->id_empleado ?>"><?= $key->nombreEmpleado ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <input type="submit" class="btn btn-success" name="Modificar" value="Modificar">
            </form>
        </div>
    </div>
</div>
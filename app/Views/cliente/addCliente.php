
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Agregar Cliente</h2>
            <?= validation_list_errors() ?>

            <form action="<?=base_url('cliente/insert'); ?>" method = "POST">
            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />

            <div class="mb-3">
            <label for="nombreCliente" class="form-label">Nombre</label>
            <input name="nombreCliente" type="text" 
            class="form-control" id="nombreCliente"
            required
            placeholder="Inserta el nombre" value="<?= set_value('nombreCliente') ?>" >
        </div>

        <div class="mb-3">
            <label for="direccion" class="form-label">Direccion</label>
            <input name="direccion" type="text" 
            class="form-control" id="direccion"
            required
            placeholder="Municipio, calle, no. de casa" value="<?= set_value('direccion') ?>" >
        </div>

        <div class="mb-3">
            <label for="telefono" class="form-label">Telefono</label>
            <input name="telefono" type="text" 
            class="form-control" id="telefono"
            required
            placeholder="+52 000-000-00-00..." value="<?= set_value('telefono') ?>" >
        </div>


        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input name="email" type="text" 
            class="form-control" id="email "
            required
            placeholder="@ejemplo.com" value="<?= set_value('email') ?>" >
        </div>

            <input type="submit" class = "btn btn-success nt-3" name="Guardar" value = "Guardar" > 
            </form>
        </div>
    </div>
</div>
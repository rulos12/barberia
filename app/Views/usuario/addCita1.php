<main>
    <!--Formulario cita Usuario -->
    <div class="mainSesion text-center">
        <h1 class="InicioDeSesiN">Agendar cita</h1>
        <div class="input-container mx-auto" style="max-width: 400px;">
            <input type="text" placeholder="Nombre" class="form-control">
            <input type="text" placeholder="Servicio" class="form-control">

            <input type="date" placeholder="Dia" class="form-control">
            <input type="time" placeholder="Hora" class="form-control">

            <div class="">
                <select name="id_empleado" class="form-control">
                    <option selected>Elegir...</option>
                    <?php foreach ($empleados as $key) : ?>
                        <option value="<?= $key->id_empleado ?>"><?= $key->nombreEmpleado ?>: <?= $key->puesto ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <button class="btn-custom mt-3">Guardar</button>
        </div>
    </div>
</main>



<!-- <div class="col-12 text-center">
                    <h1 class="InicioDeSesiN">Agendar cita</h1>
                    <div class="input-container mx-auto" style="max-width: 400px">
                        <input type="text" placeholder="Nombre" class="form-control">
                        <input type="text" placeholder="Servicio" class="form-control">
                        <input type="date" placeholder="Dia" class="form-control">
                        <input type="time" placeholder="Hora" class="form-control">

                        <div class="">
                            <select name="id_empleado" class="form-control">
                                <option selected>Elegir...</option>
                                <?php foreach ($empleados as $key) : ?>
                                    <option value="<?= $key->id_empleado ?>"><?= $key->nombreEmpleado ?>: <?= $key->puesto ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <button class="btn-custom mt-3">Guardar</button>
                    </div>
                </div>-->
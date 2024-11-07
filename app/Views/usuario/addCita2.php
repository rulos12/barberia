<!--Formulario cita Usuario -->
<div class="container">
    <main>
        <div class="text-center">
            <h1 class="InicioDeSesiN">Agendar cita</h1>
        </div>
        <div class="row g-5">
            <div class="col-md-7 col-lg-8 text-center">
                <form action="<?= base_url('cita/registrar'); ?>" method="POST">
                    <div class="row g-3">
                        <div class="input-container mx-auto" style="max-width: 400px">
                            <select class="form-select" name="servicio" id="servicio" required>
                                <option selected disabled>Elegir...</option>
                                <option value="Corte de cabello">Corte de cabello</option>
                                <option value="Corte y Barba">Corte y Barba</option>
                                <option value="Coloración">Coloración</option>
                                <option value="Corte y afeitado">Corte y afeitado</option>
                                <option value="Afeitado">Afeitado</option>
                            </select>
                            <input type="date" name="fecha_cita" placeholder="Día" class="form-control" required>
                            <input type="time" name="hora_cita" placeholder="Hora" class="form-control" required>
                        </div>
                    </div>

                    <!-- Selección de empleado -->
                    <div class="col-md-5 col-lg-4 order-md-last">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="">Personal</span>
                        </h4>
                        <ul class="list-group mb-3">
                            <?php foreach ($empleados as $key) : ?>
                                <div class="form-check">
                                    <li class="list-group-item d-flex justify-content-between lh-sm">
                                        <div>
                                            <input type="radio" name="id_empleado" class="form-check-input" value="<?= $key->id_empleado ?>" required>
                                            <h6 class="my-0"><?= $key->nombreEmpleado ?></h6>
                                            <small class="text-body-secondary"><?= $key->puesto ?></small>
                                        </div>
                                    </li>
                                </div>
                            <?php endforeach ?>
                        </ul>
                    </div>
                    <button type="submit" class="btn-custom mt-3">Guardar</button>
                </form>
            </div>
        </div>
    </main>
</div>
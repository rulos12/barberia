<div class="container">
    <main>
        <!--Formulario cita Usuario -->
        <div class="mainSesion text-center">
            <?php
            $session = session();
            if ($session->get('logged_in') == null): ?>

                <div class="alert alert-dark text-center" role="alert">
                    Inicia sesion antes de agendar una cita
                </div>

            <?php endif ?>

            <h1 class="InicioDeSesiN">Agendar cita</h1>
            <form action="<?= base_url('cita/registrar'); ?>" method="POST">


                <div class="input-container mx-auto" style="max-width: 400px;">
                    <select class="form-select" name="servicio" id="servicio" required>
                        <option selected disabled>Elegir...</option>
                        <option value="Corte de cabello">Corte de cabello</option>
                        <option value="Corte y Barba">Corte y Barba</option>
                        <option value="Coloración">Coloración</option>
                        <option value="Corte y afeitado">Corte y afeitado</option>
                        <option value="Afeitado">Afeitado</option>
                    </select>

                    <select name="id_empleado" class="form-select">
                        <option selected>Elegir...</option>
                        <?php foreach ($empleados as $key) : ?>
                            <option value="<?= $key->id_empleado ?>"><?= $key->nombreEmpleado ?>: <?= $key->puesto ?></option>
                        <?php endforeach ?>
                    </select>

                    <input type="date" name="fecha_cita" placeholder="Dia" class="form-control">
                    <input type="time" name="hora_cita" placeholder="Hora" class="form-control">

                    <button class="btn-custom mt-3">Guardar</button>
                </div>
            </form>
        </div>
    </main>

</div>
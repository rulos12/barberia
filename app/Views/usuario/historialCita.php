<div class="container">
    <main>
        <div class="text-center">
            <h1 class="InicioDeSesiN">Mis citas</h1>
        </div>
        <div class="row">
            <div class="col-6 text-center">
                <h6 class="textEdit">Anteriores</h6>
                <table class="table table-borderless text">
                    <tbody>
                        <?php foreach ($citasAntes as $key) : ?>
                            <tr>
                                <td><?= $key->servicio ?></td>
                                <td><?= $key->fecha_cita ?></td>
                                <td><?= $key->hora_cita ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <div class="col-6 text-center">
                <h6 class="textEdit">Proximamente</h6>

                <table class="table table-borderless text ">
                    <tbody>
                    <?php foreach ($citasDespues as $key) : ?>
                            <tr>
                                <td><?= $key->servicio ?></td>
                                <td><?= $key->fecha_cita ?></td>
                                <td><?= $key->hora_cita ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>
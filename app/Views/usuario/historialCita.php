<!--Pagina para ver el historial de cita y de pedidos-->
<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h1 class="InicioDeSesiN">Mis citas</h1>
        </div>
        <div class="col-md-6 text-center">
            <h6 class="textEdit">Anteriores</h6>
            <table class="table text-center text">
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
        <div class="col-md-6 text-center">
            <h6 class="textEdit">Próximamente</h6>
            <table class="table text-center text">
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

    <div class="row mt-3">
        <div class="col-12 text-end">
            <button class="btn-custom" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                Pedidos
            </button>
        </div>
    </div>

    <div class="collapse" id="collapseExample">
        <div class="card-body">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="InicioDeSesiN">Pedidos</h1>
                </div>
                <div class="col-md-6 text-center">
                    <h6 class="textEdit">Pendientes</h6>
                    <table class="table text-center text">
                        <tbody>
                            <?php foreach ($detalleB as $key) : ?>
                                <tr>
                                    <td><?= $key->nombre ?></td>
                                    <td><?= $key->cantidad ?></td>
                                    <td><?= $key->precio_unitario ?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6 text-center">
                    <h6 class="textEdit">Completados</h6>
                    <table class="table text-center text">
                        <tbody>
                            <?php foreach ($detalleA as $key) : ?>
                                <tr>
                                    <td><?= $key->nombre ?></td>
                                    <td><?= $key->cantidad ?></td>
                                    <td><?= $key->precio_unitario ?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
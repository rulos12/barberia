<!--Pagina para ver el historial de cita y de pedidos-->
<div id="app" class="container">
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
                            <td>
                                <div class="Image1">
                                    <a href="<?= base_url('cita/deleteCitaC/' . $key->id_cita); ?>" data-bs-toggle="modal" data-bs-target="#DetalleCita<?= $key->id_cita ?>">
                                        <i class="bi bi-binoculars"></i>
                                    </a>
                                </div>
                            </td>
                            <div class="modal fade" id="DetalleCita<?= $key->id_cita ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable">
                                    <div class="modal-content ">
                                        <div class="modal-header ">
                                            <h1 class="modal-title fs-5 textEdit" id="exampleModalLabel">Detalles de la cita</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-6" style="text-align: left;">
                                                        <h4 class="textEdit" style="font-weight: 600;">Nombre: </h4>
                                                        <h4 class="textEdit" style="font-weight: 600;">Barbero/Estilista: </h4>
                                                        <h4 class="textEdit" style="font-weight: 600;">Fecha de la cita: </h4>
                                                        <h4 class="textEdit" style="font-weight: 600;">Hora de la cita: </h4>
                                                        <h4 class="textEdit" style="font-weight: 600;">Servicio: </h4>
                                                        <h4 class="textEdit" style="font-weight: 600;">Estado: </h4>
                                                    </div>
                                                    <div class="col-6" style="text-align: right;">
                                                        <h4 class="textEdit"><?= $key->nombreCliente ?></h4>
                                                        <h4 class="textEdit"><?= $key->nombreEmpleado ?></h4>
                                                        <h4 class="textEdit"><?= $key->fecha_cita ?></h4>
                                                        <h4 class="textEdit"><?= $key->hora_cita ?></h4>
                                                        <h4 class="textEdit"><?= $key->servicio ?></h4>
                                                        <h4 class="textEdit"><?= $key->estado ?></h4>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                            <td><?= $key->hora_cita  ?></td>
                            <td>
                                <div class="Image1">
                                    <a href="<?= base_url('cita/deleteCitaC/' . $key->id_cita); ?>" data-bs-toggle="modal" data-bs-target="#DetalleCita<?= $key->id_cita ?>">
                                        <i class="bi bi-binoculars"></i>
                                    </a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#eliminarCita<?= $key->id_cita ?>">
                                        <i class="bi bi-trash3"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <div class="modal fade" id="DetalleCita<?= $key->id_cita ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content ">
                                    <div class="modal-header ">
                                        <h1 class="modal-title fs-5 textEdit" id="exampleModalLabel">Detalles de la cita</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-6" style="text-align: left;">
                                                    <h4 class="textEdit" style="font-weight: 600;">Nombre: </h4>
                                                    <h4 class="textEdit" style="font-weight: 600;">Barbero/Estilista: </h4>
                                                    <h4 class="textEdit" style="font-weight: 600;">Fecha de la cita: </h4>
                                                    <h4 class="textEdit" style="font-weight: 600;">Hora de la cita: </h4>
                                                    <h4 class="textEdit" style="font-weight: 600;">Servicio: </h4>
                                                    <h4 class="textEdit" style="font-weight: 600;">Estado: </h4>
                                                </div>
                                                <div class="col-6" style="text-align: right;">
                                                    <h4 class="textEdit"><?= $key->nombreCliente ?></h4>
                                                    <h4 class="textEdit"><?= $key->nombreEmpleado ?></h4>
                                                    <h4 class="textEdit"><?= $key->fecha_cita ?></h4>
                                                    <h4 class="textEdit"><?= $key->hora_cita ?></h4>
                                                    <h4 class="textEdit"><?= $key->servicio ?></h4>
                                                    <h4 class="textEdit"><?= $key->estado ?></h4>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="eliminarCita<?= $key->id_cita ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5 textEdit" id="exampleModalLabel">Confirmación</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body textEdit">
                                        ¿Estás seguro de eliminar esta cita?<br>
                                        Después de eliminarla, no se podrá recuperar. ¿Deseas continuar?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <a href="<?= base_url('cita/deleteCitaC/' . $key->id_cita); ?> " class=" btn btn-danger" data-bs-dismiss="">Eliminar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
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
            </div>
        </div>
    </div>
</div>
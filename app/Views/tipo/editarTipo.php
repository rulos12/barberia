<!-- Pagina editar tipo y ver la tabla de tipo-->
<div class="container">
    <div class="row">
        <div class="col-4 p-4">
            <h2>Actualizar Categoria</h2>

            <form action="<?= base_url('tipo/update'); ?>" method="POST">

                <label for="nombreTipo" class="form-label">Nombre</label>
                <input name="nombreTipo" type="text" value="<?= $tipo[0]->nombreTipo; ?>"
                    class="form-control" id="nombreTipo" placeholder="nombreTipo">
                <input type="hidden" name="id_tipo" value="<?= $tipo[0]->id_tipo; ?>">

                <label for="descripcion" class="form-label">Descripción</label>
                <input name="descripcion" type="text" value="<?= $tipo[0]->descripcion; ?>"
                    class="form-control" id="descripcion" placeholder="descripcion">
                <input type="hidden" name="id_tipo" value="<?= $tipo[0]->id_tipo; ?>">
                <input type="submit" class="btn btn-success mt-3" name="Guardar" value="Guardar">
            </form>
        </div>
        <div class="col-8 p-4">
            <!-- muestra las categorias(tipo) -->

            <table class="table table-striped table-bordered">
                <thead>
                    <th>id_Categoria</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    <?php foreach ($tipos as $key) : ?>
                        <tr>
                            <td><?= $key->id_tipo; ?></td>
                            <td><?= $key->nombreTipo; ?></td>
                            <td><?= $key->descripcion; ?></td>
                            <td>
                                <a href="<?= base_url('tipo/delete/' . $key->id_tipo); ?> " class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                <a href="<?= base_url('tipo/editarTipo/' . $key->id_tipo); ?> " class="btn btn-warning"><i class="bi bi-pencil"></i></a>

                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
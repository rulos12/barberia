<!-- agregar una categoria(tipo) -->
<div class="container">
    <div class="row">
        <div class="col-4 p-4">
            <h2>Agregar Categoria</h2>

            <form action="<?= base_url('tipo/insert'); ?>" method="POST" >

                <label for="nombreTipo">Nombre</label>
                <input type="text" class="form-control" name="nombreTipo">

                <label for="descripcion">Descripción</label>
                <input type="text" class="form-control" name="descripcion">
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
                            <td><?= $key->id_tipo;?></td>
                            <td><?= $key->nombreTipo;?></td>
                            <td><?= $key->descripcion;?></td>
                            <td>
                                <a href="<?= base_url('tipo/delete/' . $key->id_tipo); ?> " class="btn btn-danger">Borrar</a>
                                <a href="<?= base_url('tipo/editarTipo/' . $key->id_tipo); ?> " class="btn btn-warning">Modificar</a>

                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Formulario para agregar nueva marca -->
<div class="container">
    <div class="row">
        <div class="col-4 p-4">
            <h2>Agregar Marca</h2>

            <form action="<?= base_url('marca/insert'); ?>" method="POST" >

                <label for="nombreMarca">Nombre</label>
                <input type="text" class="form-control" name="nombreMarca">

                <label for="descripcion">Descripción</label>
                <input type="text" class="form-control" name="descripcion">
                <input type="submit" class="btn btn-success mt-3" name="Guardar" value="Guardar">
            </form>
        </div>
        <div class="col-8 p-4">
        <table class="table table-striped table-bordered">
            <!-- Tabla que muestra las marcas -->

                <thead>
                    <th>id_marca</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    <?php foreach ($marcas as $key) : ?>
                        <tr>
                            <td><?= $key->id_marca;?></td>
                            <td><?= $key->nombreMarca;?></td>
                            <td><?= $key->descripcion;?></td>
                            <td>
                                <a href="<?= base_url('marca/delete/' . $key->id_marca); ?> " class="btn btn-danger">Borrar</a>
                                <a href="<?= base_url('marca/editarM/' . $key->id_marca); ?> " class="btn btn-warning">Modificar</a>

                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
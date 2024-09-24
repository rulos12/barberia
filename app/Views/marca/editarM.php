<!-- formulario que actualiza la tabla marcas -->
<div class="container">
    <div class="row">
        <div class="col-4 p-4">
            <h2>Actualizar Marca</h2>

            <form action="<?= base_url('marca/update'); ?>" method="POST" >

               <label for="nombreMarca" class="form-label">Nombre</label>
                    <input name="nombreMarca" type="text" value="<?= $marca[0]->nombreMarca; ?>"
                        class="form-control" id="nombreMarca" placeholder="NombreMarca">
                    <input type="hidden" name="id_marca" value="<?= $marca[0]->id_marca; ?>">

                    <label for="descripcion" class="form-label">descripcion</label>
                    <input name="descripcion" type="text" value="<?= $marca[0]->descripcion; ?>"
                        class="form-control" id="descripcion" placeholder="descripcion">
                    <input type="hidden" name="id_marca" value="<?= $marca[0]->id_marca; ?>">
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
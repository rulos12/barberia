<div class="container">
<!-- ver la tabla de productos -->
    <div class="row">
        <div class="col">
            <h1>Productos</h1>
            <a href="<?= base_url('producto/add/'); ?> " class="btn btn-success">Agregar</a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <table class="table table-striped table-bordered">
                <thead>
                    <th>id_producto</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Descripción</th>
                    <th>Marca</th>
                    <th>Categoria</th>
                    <th>Proveedor</th>
                    <th>Acción</th>
                </thead>
                <tbody>
                    <?php foreach ($productos as $key) : ?>
                        <tr>
                            <td><?= $key->id_producto;?></td>
                            <td><?= $key->nombre;?></td>
                            <td><?= $key->precio;?></td>
                            <td><?= $key->stock;?></td>
                            <td><?= $key->descripcion;?></td>
                            <td><?= $key->nombreMarca;?></td>
                            <td><?= $key->nombreTipo;?></td>
                            <td><?= $key->nombreProveedor;?></td>
                            <td>
                                <a href="<?= base_url('producto/delete/' . $key->id_producto); ?> " class="btn btn-danger">Borrar</a>
                                <a href="<?= base_url('producto/editarP/' . $key->id_producto); ?> " class="btn btn-warning">Modificar</a>

                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
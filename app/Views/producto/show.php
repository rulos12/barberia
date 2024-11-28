<div class="container mt-5">
<!-- ver la tabla de productos -->
    <div class="row">
        <div class="my-2" >
            <h1>Productos</h1>
            <a href="<?= base_url('producto/add/'); ?> " class="btn btn-success">Agregar</a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <table class="table table-striped table-bordered">
                <thead>
                    <th>id</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Descripción</th>
                    <th>Marca</th>
                    <th>Categoria</th>
                    <th>Proveedor</th>
                    <th>Imagen</th>
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
                            <td><?= $key->imagenProducto;?></td>
                            <td>
                                <a href="<?= base_url('producto/delete/' . $key->id_producto); ?> " class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                <a href="<?= base_url('producto/editarP/' . $key->id_producto); ?> " class="btn btn-warning"><i class="bi bi-pencil"></i></a>

                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
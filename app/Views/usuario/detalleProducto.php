<hr>  <!-- Detalle de Producto del vista usuario-->
<div class="row">
    <div class="col-9">

        <div class="imgPrincipal"></div>
    </div>
    <div class="col-3">
        <h2><?= $producto[0]->nombre ?></h2>
        <h3 class="text-right"> $ <?= $producto[0]->precio; ?></h3>
        <form action="<?= base_url('pagina/insertCarrito'); ?>" method="POST">
            <div class="form">
                <label for="">Cantidad</label>
                <input type="number" Min="1" Max="<?= $producto[0]->stock; ?>" name="cantidad" class="form-control">
            </div>
            <br>

            <input type="hidden" value="<?= $producto[0]->id_producto; ?>" name="idProducto">
            <input type="hidden" value="<?= $producto[0]->nombre; ?>" name="nombre">
            <input type="hidden" value="<?= $producto[0]->precio; ?>" name="costo">

            <div class="input-group">
                <button class="btn btn-outline-secondary" type="button" onclick="decrement()">-</button>
                <input type="text" id="counter" class="form-control" value="1" readonly>
                <button class="btn btn-outline-secondary" type="button" onclick="increment()">+</button>
            </div>
            <input type="submit" class="btn btn-large btn-success" value="Agregar al carrito">
        </form>
    </div>
</div>
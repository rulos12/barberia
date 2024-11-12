<div class="container">
    <main>
        <div class="row">
            <?php
            $session = session();
            if ($session->get('logged_in') == null): ?>

                <div class="alert alert-dark text-center" role="alert">
                    Inicia sesion antes de realizar una compra
                </div>
            <?php endif ?>
            <div class="col-4 my-5 text-center">
                <h1 class="InicioDeSesiN">Tu carrito</h1>
            </div>
            <div class="col-12 text-center">
                <table class="table  ">
                    <thead class="textEdit">
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                    </thead>
                    <tbody class="text">
                        <?php $total = 0;
                        $session = session(); ?>
                        <?php foreach ($session->get('carrito') as $item): ?>
                            <?php $total += $item['costo'] * $item['cantidad']; ?>
                            <tr>
                                <td><?= $item['nombre']; ?><br><?= $item['costo']; ?></td>
                                <td>
                                    <div class="input-group">
                                        <button class="btn btn-outline-secondary" type="button" onclick="decrement()">-</button>
                                        <input type="text" id="counter" class="form-control" value="<?= $item['cantidad']; ?>" readonly>
                                        <button class="btn btn-outline-secondary" type="button" onclick="increment()">+</button>
                                    </div>

                                </td>
                                <td><?= $item['subtotal']; ?></td>
                            </tr>
                        <?php endforeach ?>

                    </tbody>
                </table>



            </div>

            <div class="col order-last text-end">
                <h2 class="textEdit my-3">Total estimado $<?= $total ?></h2>

                <form action="<?= base_url('cart/confirmar'); ?>" method="POST">
                    <input type="hidden" name="total" value="<?= $total ?>">
                    <input type="hidden" name="estado" value = "pendiente"> 
                    <button class="btn-custom">Confirmar pedido </button>
                </form>
            </div>
        </div>

    </main>
</div>
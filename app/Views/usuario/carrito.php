<div class="container" id="app">
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
                <h1 class="InicioDeSesiN">Tu carrito
                </h1>
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
                                <td>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <img src="<?= site_url('upload/getFile/' . esc($item['id_producto'])) ?>" class="imgCart">
                                        </div>
                                        <div class="col-md-7" style="text-align: left; margin-top: 1rem;">
                                            <?= $item['nombre']; ?>
                                            <br>$ <?= $item['costo']; ?>
                                        </div>
                                    </div>



                                </td>
                                <td>
                                    <div class="row" style="margin-top: 1rem;">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4">
                                            <input type="number" Min="1" id="stock" class="form-control" value="<?= $item['cantidad']; ?>">
                                        </div>
                                        <div class="col-md-4" style="text-align: left;">
                                            <a href="<?= base_url('cart/removerItem/' . $item['id_producto']); ?>" style="color: black;"><i class="bi bi-trash fs-5"></i></a>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div style="margin-top: 2rem;">
                                        $ <?= $item['subtotal']; ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach ?>

                    </tbody>
                </table>



            </div>

            <div class="col order-last text-end">
                <h2 class="textEdit my-3">Total estimado $<?= $total ?></h2>

                <form action="<?= base_url('cart/confirmar'); ?>" method="POST">
                    <input type="hidden" name="total" value="<?= $total ?>">
                    <input type="hidden" name="estado" value="pendiente">
                    <input type="hidden" name="estado" value="pendiente">

                    <button class="btn-custom">Confirmar pedido </button>
                </form>
            </div>
        </div>

    </main>
</div>

<script>
    const {
        createApp
    } = Vue
    createApp({
        data() {
            return {

                contador: <?= $item['cantidad']; ?>
            }
        },
        methods: {
            increment() {
                this.contador++;
            },
            decrement() {
                if (this.contador > 1) {
                    this.contador--;
                }
            }

        }
    }).mount('#app')
</script>
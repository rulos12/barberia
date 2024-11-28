 <!-- Detalle de Producto del vista usuario-->
 <div class="container">
     <div class="row">
         <div class="col-7 p-5 ">
             <div class="text-center">
                 <img src="<?= site_url('upload/getFile/' . esc($producto[0]->id_producto)) ?>" class="imgPrincipal" alt="Producto">
             </div>
         </div>
         <div class="col-5 p-5 ">
             <h2 class="producto"><?= $producto[0]->nombre ?></h2>
             <h3 class="my-5 precio"> $ <?= $producto[0]->precio; ?></h3>
             <form action="<?= base_url('producto/insertCart'); ?>" method="POST">
                 <div class="form">
                     <label for="">Cantidad</label>
                     <input type="number" Min="1" Max="<?= $producto[0]->stock; ?>" name="stock" class="form-control" value="1">
                 </div>
                 <br>
                 <input type="hidden" value="<?= $producto[0]->id_producto; ?>" name="id_producto">
                 <input type="hidden" value="<?= $producto[0]->nombre; ?>" name="nombre">
                 <input type="hidden" value="<?= $producto[0]->precio; ?>" name="costo">
                 <input type="hidden" value="<?= $producto[0]->imagenProducto; ?>" name="imagenProducto">
                 

                 <!-- <div class="input-group">
                     <button class="btn btn-outline-secondary" type="button" onclick="decrement()">-</button>
                     <input type="text" id="counter" class="form-control" value="1" readonly>
                     <button class="btn btn-outline-secondary" type="button" onclick="increment()">+</button>
                 </div>-->

                 <div class="text-center">
                     <button class="btn-custom">Agregar al carrito</button>
                 </div>

             </form>
         </div>
     </div>
 </div>
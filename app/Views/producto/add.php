<!-- add.php -->
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Agregar producto</h2>

            <form action="<?=base_url('producto/insert'); ?>" method = "POST">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre">
         
            <label for="precio">Precio</label>
            <input type="text"  class="form-control" name="precio">

            <label for="cantidad">Cantidad</label>
            <input type="text" class="form-control" name="cantidad">

            <label for="descripción">Descripción</label>
            <input type="text" class = "form-control" name = "descripcion">

            <input type="submit" class = "btn btn-success nt-3" name="Guardar" value = "Guardar" > 
            </form>
        </div>
    </div>
</div>
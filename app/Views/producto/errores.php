<h2>Errores encontrados</h2>
<?php if (isset($errors) && !empty($errors)): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach ?>
        </ul>
    </div>
<?php else: ?>
    <p>No se encontraron errores.</p>
<?php endif; ?>

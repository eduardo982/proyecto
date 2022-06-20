<?php require(APPROOT . '/views/partials/head.php'); ?>



<div class="container tenis">
        <?php foreach ($data['productos'] as $producto) : ?>
            <div class="producto">
                <div>
                    <img class="imagen" src="<?php echo URLROOT; ?>/public/images/logo.jpg" alt="">
                </div>
                <div class="textos">
                    <p><?php echo $producto->nombre; ?></p>
                    <p>$<?php echo $producto->precio; ?></p>
                    <p>Talla: <?php echo $producto->talla; ?></p>
                </div>
                <div class="botones">
                    <a href="carritos/add/<?php echo $producto->id_tenis; ?>" class="boton access">Agregar</a>
                    <a class="wish" href="favoritos/add/<?php echo $producto->id_tenis; ?>">Wish</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>




<?php require(APPROOT . '/views/partials/footer.php'); ?>
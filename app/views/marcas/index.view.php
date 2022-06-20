<?php require(APPROOT . '/views/partials/head.php'); ?>



    <div class="container tenis">
        <?php foreach ($data['marcas'] as $marca) : ?>
            <div class="producto">
                <div>
                        <img class="imagen" src="<?php echo URLROOT; ?>/public/images/logo.jpg" alt="">
                </div>
                <div class="textos">
                    <p><?php echo $marca->nombre; ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>





<?php require(APPROOT . '/views/partials/footer.php'); ?>
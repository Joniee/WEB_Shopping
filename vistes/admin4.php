
<?php
?>
<link rel="stylesheet" type="text/css" href="../styles/history.css">
<div class="history-flex-container">
    <div>
        <div class="history-title">Llista de Productes</div>
    </div>

    <div class="admin-content-data">
        <div class="admin-flex-container">
            <div class="admin-content-title">Id</div>
            <div class="admin-content-title">Categoria</div>
            <div class="admin-content-title">Nom</div>
            <div class="admin-content-title">Quantitat en stock</div>
            <div class="admin-content-title">Preu</div>
            <div class="admin-content-title">Venut</div>
        </div>
    </div>
    <?php foreach($dades as $products){?>
    <div class="admin-content-data" >
        <div class="admin-flex-container">
            <div class="admin-content"><?php print_r ($products['ID']); ?></div>
            <div class="admin-content"><?php print_r ($products['ID_CATEGORY']); ?></div>
            <div class="admin-content"><?php print_r ($products['NAME']); ?></div>
            <div class="admin-content"><?php print_r ($products['QUANTITY']); ?></div>
            <div class="admin-content"><?php print_r ($products['PRICE']); ?>&#0128</div>
            <div class="admin-content"><?php print_r ($products['SOLD']); ?></div>
        </div>
    </div>
    <?php } ?>
</div>

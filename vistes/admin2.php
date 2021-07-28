
<?php
?>
<link rel="stylesheet" type="text/css" href="../styles/history.css">
<div class="history-flex-container">
    <div>
        <div class="history-title">Compres realitzades</div>
    </div>
    <div class="admin-content-data">
        <div class="admin-flex-container">
            <div class="admin-content-title">Usuari</div>
            <div class="admin-content-title">Compra</div>
            <div class="admin-content-title">Data</div>
            <div class="admin-content-title">Número de productes</div>
            <div class="admin-content-title">Preu total</div>
        </div>
    </div>
    <?php foreach($dades as $compres){?>
    <div class="admin-content-data" >
        <div class="admin-flex-container">
            <div class="admin-content"><?php print_r ($compres['ID_USER']); ?></div>
            <div class="admin-content"><?php print_r ($compres['ID']); ?></div>
            <div class="admin-content"><?php print_r ($compres['DATE']); ?></div>
            <div class="admin-content"><?php print_r ($compres['NUM_PROD']); ?></div>
            <div class="admin-content"><?php print_r ($compres['TOTAL_PRICE']); ?>&#0128</div>
        </div>
    </div>
    <?php } ?>
</div>
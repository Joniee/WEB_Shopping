
<?php
?>
<link rel="stylesheet" type="text/css" href="../styles/history.css">
<div class="history-flex-container">
    <div class="history-shopping-title">
        Historial de compres
    </div>
    <?php foreach($resultatsKart as $kart){?>
    <div class="history-title">
        <div class="history-content-title" style="display: -webkit-inline-box">
            <div class="history-content">Data de compra: <?php print_r ($kart['DATE']); ?></div>
            <div class="history-content">Preu total: <?php print_r ($kart['TOTAL_PRICE']); ?>&#0128</div>
            <div class="history-content">Número de productes adquirits: <?php print_r ($kart['NUM_PROD']); ?></div>
        </div>
        <div class="history-data">
            <?php foreach($dades[$kart['ID']][0] as $key => $item){ ?>
                <div class="history-data">
                    <div class="content-data">
                        <div class="history-product-img"><img class="history-product-img-max" src="<?php print_r($item['IMAGE']); ?>"></div>
                        <div>
                            <div class="history-product-count" style="">Producte: <?php print_r($key+1); ?> - <?php print_r($item['NAME']); ?></div>
                            <div class="history-product-price">Preu: <?php print_r($item['PRICE']); ?> &#0128</div>
                        </div>
                    </div>
                </div>
            <?php ;}?>
        </div>
    </div>
    <?php } ?>
</div>
<?php

?>
<head>
    <link rel="stylesheet" type="text/css" href="../styles/producte.css">
</head>

<section>
    <div class="producte-flex-container">
        <div>
            <img class="producte-content-img" src="<?php print_r($prod['IMAGE']); ?>">
        </div>
        <div class="producte-content-flex-container">
            <div class="producte-content-name">
                <?php print_r($prod['NAME']); ?>
            </div>
            <div class="producte-content-specification">
                <?php print_r($prod['SDESCRIPTION']);?>
            </div>
            <div class="producte-content-specification">
                <?php print_r($prod['LDESCRIPTION']);?>
            </div>
            <div class="producte-content-specification" style="font-size: 25px;">
               <?php print_r($prod['PRICE']); print_r("  "); print_r("€"); ?>
            </div>
            <div>
                <form class="formprod" method="POST" action="../index.php?p=71">
                    <input type="text" name="ID" value="<?php echo $prod['ID']; ?>" hidden>
                    <i class="fas fa-cart-plus" aria-hidden="true"></i>
                    <input class="button-submit" type="submit" value="Afegir al cabàs">
                </form>
            </div>
        </div>
    </div>
</section>

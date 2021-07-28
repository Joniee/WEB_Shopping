<head>
    <link rel="stylesheet" type="text/css" href="../styles/destacats.css">
    <script src="../scripts/barra1.js"></script>
</head>

<?php
?>


<section>
    <div class="destacats-title">
        DESTACATS
    </div>
    <div class="destacats-flex-container">
        <?php for($j = 0; $j < 8; $j+=4){?>
           <?php for($i = 0; $i < 4; $i++){
                ?>
               <div class="destacats-column" onclick="return canviPagId('43', <?php print_r($resultats[$i+$j]["ID"]); ?>)">
                   <div class="destacats-content-name">
                       <?php print_r($resultats[$i+$j]["NAME"]) ?>
                   </div>
                   <div>
                       <img class="destacats-content-img" src="<?php print_r($resultats[$i+$j]["IMAGE"]) ?>">
                   </div>
                   <div class="destacats-content-price">
                       <?php print_r($resultats[$i+$j]["PRICE"]);?>&#0128
                   </div>
               </div>
               <?php
           }?>
        <?php } ?>
    </div>
</section>

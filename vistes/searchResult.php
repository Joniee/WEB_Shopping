<?php
?>
<head>
    <link rel="stylesheet" type="text/css" href="../styles/destacats.css">
    <script src="../scripts/barra1.js"></script>
</head>
<section>
    <div>
        <div class="destacats-flex-container">
            <?php for($j = 0; $j < sizeof($list); $j += 4){?>
                <?php
                for($i = 0; $i < 4; $i++){
                    if($i+$j< sizeof($list)) {
                        ?>
                        <div class="destacat" onclick="return canviPagId('43', <?php print_r($list[$i+$j]["ID"]); ?>)">
                            <div class="destacats-content-name">
                                <?php print_r($list[$i + $j]["NAME"]) ?>
                            </div>
                            <div>
                                <img class="destacats-content-img" style="height: auto;" src="<?php print_r($list[$i + $j]["IMAGE"]) ?>">
                            </div>
                            <div>
                                <?php print_r($list[$i + $j]["PRICE"]); print_r("€"); ?>
                            </div>
                        </div>
                        <?php
                    }}}?>
        </div>
    </div>
</section>

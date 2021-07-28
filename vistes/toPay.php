<?php
$preuTotal = 0;
foreach($cabas as $key => $producte){
    $preuTotal += $producte['PRICE'];
}
?>

<link rel="stylesheet" type="text/css" href="../styles/toPay.css">
<link rel="stylesheet" type="text/css" href="../styles/kart.css">
<section class="c">
    <div>
        <div>
            <div class="toPay-title">Procès de compra - Pagament</>
        </div>
        <div>
            <div>
                <?php
                if(isset($_SESSION['LOGIN']) && ($_SESSION['LOGIN']['INIT'] == 1)){
                    if($exist){
                        ?>
                        <div class="user-facturacio-title">Revisa les dades de facturació</div>
                        <div class="toPay-flex-container">
                            <div class="user-facturació-content">
                                <div>Nom complet:</div>
                                <div><?php print_r($dades['NAME']) ?></div>
                            </div>
                            <div class="user-facturació-content">
                                <div>Carrer:</div>
                                <div>C/ <?php print_r($dades['ADDRESS']) ?></div>
                            </div>
                            <div class="user-facturació-content">
                                <div>Població:</div>
                                <div><?php print_r($dades['TOWN'] . ', ' . $dades['CP']) ?></div>
                            </div>
                            <div class="user-facturació-content">
                                <div>Preu total:</div>
                                <div><?php print_r($preuTotal) ?></div>
                            </div>
                        </div>
                        <div class="kart-flex-container">
                            <div class="preu-total">TOTAL = <?php echo $preuTotal ?>&#0128</div>
                            <div>
                                <div><form method="POST" action="../index.php?p=74">
                                        <input class="button-submit" type="submit" value="Pagar i Finalitzar compra">
                                    </form></div>
                            </div>
                            <div>
                                <form method="POST" action="../index.php?p=76">
                                    <input class="button-submit" type="submit" value="Guardar Cabàs">
                                </form>
                            </div>
                            <div>
                                <form method="POST" onsubmit="canviPag('77')">
                                    <input class="button-submit" type="submit" value="Carregar Cabàs"><p class="dropdown-nav">Això esborra el cabàs actual.</p>
                                </form>
                            </div>
                            <div>
                                <form method="POST" action="../index.php?p=75">
                                    <input class="button-submit" type="submit" value="Esborra tot el cabàs">
                                </form>
                            </div>
                        </div>
                        <?php foreach($cabas as $key => $producte){?>
                            <div class="kart-flex-container">
                                <div>
                                    <img style="max-height: 100px; max-weigth: 100px;" src="<?php echo $producte['IMAGE']; ?>">
                                </div>
                                <div class="kart-flex-container-content-product">
                                    <div><?php echo $producte['PRICE'];?>&#0128</div>
                                    <div><?php echo $producte['NAME']; ?></div>
                                </div>
                                <div>
                                    <form method="POST" action="../index.php?p=71">
                                        <input class="button-submit-add-less" type="submit" value="+">
                                        <input type="text" name="ID" value="<?php echo $producte['ID']; ?>" hidden>
                                    </form>
                                </div>
                                <div>
                                    <form method="POST" action="../index.php?p=72">
                                        <input class="button-submit-add-less" type="submit" value="-">
                                        <input type="text" name="ID" value="<?php echo array_keys($_SESSION['KART'])[$key];?>" hidden>
                                    </form>
                                </div>

                            </div>
                        <?php }?>
                        <div class="kart-flex-container">
                            <div class="preu-total">TOTAL = <?php echo $preuTotal ?>&#0128</div>
                            <div><form method="POST" action="../index.php?p=74">
                                    <input class="button-submit" type="submit" value="Pagar i Finalitzar compra">
                                </form></div>
                            <div><form method="POST" action="../index.php?p=76">
                                    <input class="button-submit" type="submit" value="Guardar Cabàs">
                                </form></div>
                            <div><form method="POST" onsubmit="canviPag('77')">
                                    <input class="button-submit" type="submit" value="Carregar Cabàs"><p class="dropdown-nav">Això esborra el cabàs actual.</p>
                                </form></div>
                            <div><form method="POST" action="../index.php?p=75"><input class="button-submit" type="submit" value="Esborra tot el cabàs"></form></div>
                        </div>
                    <?php }else{ ?>
                        <p>Afegeix un article al cabàs per començar una compra.</p>
                    <?php }}else{ ?>
                    <p onclick="canviPag('21');">Has d'iniciar sessió per poder accedir a compra. Fes cliok aquí per fer-ho.</p>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
</section>




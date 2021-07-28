<?php
$preuTotal = 0;
if(isset($_SESSION['LOGIN']) && ($_SESSION['LOGIN']['INIT'] == 1) && isset($_SESSION['KART'])) {
    foreach ($cabas as $key => $producte) {
        $preuTotal += $producte['PRICE'];
    }
}
?>
<script src="../scripts/barra1.js"></script>
<link rel="stylesheet" type="text/css" href="../styles/kart.css">
    <section class="cabascontinu">
        <div>
            <div class="cabas-title">
                Cabàs
            </div>
            <div >
                <?php
                if(isset($_SESSION['LOGIN']) && ($_SESSION['LOGIN']['INIT'] == 1)){
                if($exist){
                ?>
                    <div class="kart-flex-container">
                        <div class="preu-total">TOTAL = <?php echo $preuTotal ?>&#0128</div>
                        <div>
                            <form method="POST" action="../index.php?p=78">
                                <input class="button-submit" type="submit" value="Tramitar Compra">
                            </form>
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
                        <div><form method="POST" action="../index.php?p=78">
                                <input class="button-submit" type="submit" value="Tramitar Compra">
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
                    <p class="info-cabas">Afegeix un article al cabàs per començar una compra.</p>
                    <?php if(isset($_SESSION['ID_KART'])){?>
                        <form method="post" onsubmit="canviPag('77')">
                            <button type="submit"><p class="info-cabas">Tens una compra sense processar! Carrega-la.</p></button>
                        </form>
                    <?php }?>
                <?php }}else{ ?>
                    <div class="info-cabas" onclick="canviPag('21');">Has d'iniciar sessió per poder accedir a compra. Fes click aquí per fer-ho.</div>
                <?php } ?>
            </div>
        </div>
    </section>
</section>


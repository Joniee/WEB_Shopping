<?php
include_once($GLOBALS['dir'] . "/controller/KartController.php");
if(isset($_SESSION['LOGIN']) && ($_SESSION['LOGIN']['INIT'] == 1)){

    unset($_SESSION['KART']);
    header('Location: index.php');
    exit;
}
else{
    echo "No has iniciat sessió. Vés a iniciar-la o registra't.";?>
    <a href="http://tdiw-h11.deic-docencia.uab.cat?p=21">Continua...</a>
    <?php
}
?>
<?php
include_once($GLOBALS['dir'] . "/controller/KartController.php");
if(isset($_SESSION['LOGIN']) && ($_SESSION['LOGIN']['INIT'] == 1)){
    if(!(isset($_SESSION['KART'])))
    {
        $_SESSION['KART'] = array();
    }
    array_push($_SESSION['KART'],$_POST['ID']);
    header("Location: index.php");
    exit;
}
else{
    echo "No has iniciat sessió. Vés a iniciar-la o registra't.";?>
    <a href="http://tdiw-h11.deic-docencia.uab.cat?p=26">Continua...</a>
<?php
}
?>
<?php
include_once($GLOBALS['dir'] . "/controller/ToPayController.php");

$pay = new ToPayController();

$pay->payKart();

unset($_SESSION['ID_KART']);
unset($_SESSION['KART']);

echo "<script>
        alert('Has pagat la comanda, l`enviament es gratuït');
        window.location('http://tdiw-h11.deic-docencia.uab.cat/');
</script>";

header('Location: http://tdiw-h11.deic-docencia.uab.cat/');
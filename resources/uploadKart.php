<?php
include_once($GLOBALS['dir'] . "/controller/KartController.php");

$uploadKart = new KartController();

$uploadKart->saveKartFromCookie();

echo "<script>
alert('El cabàs ha pogut guardar-se');
window.location('http://tdiw-h11.deic-docencia.uab.cat?p=73');
</script>";

header("Location: http://tdiw-h11.deic-docencia.uab.cat?p=73");

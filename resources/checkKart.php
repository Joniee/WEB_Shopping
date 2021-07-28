<?php
include_once($GLOBALS['dir'] . "/controller/KartController.php");

$kart = new KartController();
$_SESSION['ID_KART'] = $kart->getKartOnLogin();
<?php

include_once($GLOBALS['dir'] . "/controller/KartController.php");

$downloadKart = new KartController();

$downloadKart->getLastKartOnCookie();

echo "<script> alert('El cabàs ha pogut recuperar-se');</script>";



?>

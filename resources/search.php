<?php
session_start();
include_once("../directory.php");
include_once($GLOBALS['dir'] . "/controller/FindProductController.php");

$search = new FindProductController();
$search->findCoincidences();


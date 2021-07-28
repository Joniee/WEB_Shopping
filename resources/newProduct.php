<?php
include_once($GLOBALS['dir'] . "/controller/NewProductController.php");

$newProduct = new NewProductController($_POST['CATEGORY']);


<?php
include_once($GLOBALS['dir']."/model/mAddProduct.php");
include_once($GLOBALS['dir']."/model/mKart.php");
include_once($GLOBALS['dir']."/model/mUser.php");
include_once($GLOBALS['dir']."/model/mProductes.php");


class AdminController
{

 function __construct()
 {
    //include_once ($GLOBALS['dir'] . "/resources/addStyleScript.php");
	
 }

 function getVista()
 {

 	switch($_GET['p']){
 		
 		case '53':
 		$mKart = new mKart();
 		$dades = $mKart->listKarts();
 		break;
		case '54':
		$mUser = new mUser();
		$dades = $mUser->listUsers();
 		break;
 		case '55':
 		$mProductes = new mProductes();
 		$dades = $mProductes->listProducts();
 		break;
 		
 	}
     include_once("./vistes/admin.php");
     if(isset($_GET['p'])){
         include_once("./vistes/admin". ($_GET['p'][1]-1) .".php");
     }
     else{
         include_once("./vistes/admin0.php");
     }

 }
}
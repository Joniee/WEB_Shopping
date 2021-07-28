<?php
include_once($GLOBALS['dir'] . "/model/mKart.php");
include_once($GLOBALS['dir'] . "/model/mUser.php");
include_once($GLOBALS['dir'] . "/model/mProductes.php");
include_once($GLOBALS['dir'] . "/controller/ErrorController.php");


class AdminController
{
    private $error;

 function __construct()
 {
     $this->error = new ErrorController();
 }

 //Carrega la vista i el model amb dades en funció del parametre p rebut per ajax pel metode GET
 function getVista()
 {
     try {
         if ($_SESSION['LOGIN']['ADMIN'] == 1) {
             switch ($_GET['p']) {

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
             if (isset($_GET['p'])) {
                 include_once("./vistes/admin" . ($_GET['p'][1] - 1) . ".php");
             } else {
                 include_once("./vistes/admin0.php");
             }
         }
     }catch(Exception $e){
         $this->error->throwException('301', 'No s`ha pogut executar la funció', $e);
     }
 }
}
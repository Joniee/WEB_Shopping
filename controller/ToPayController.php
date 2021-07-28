<?php
include_once($GLOBALS['dir'] . "/model/mKart.php");
include_once($GLOBALS['dir'] . "/model/mProduct.php");
include_once($GLOBALS['dir'] . "/model/mUser.php");
include_once($GLOBALS['dir'] . "/controller/ErrorController.php");

class ToPayController
{
    private $error;

    function __constructor()
    {
        $this->error = new ErrorController();
    }

    //Carrega la vista.
    function getVista()
    {
        try {
            if (isset($_SESSION['KART'])) {
                $exist = true;
                $cabas = array();
                foreach ($_SESSION['KART'] as $product) {
                    $producte = new mProduct($product);
                    array_push($cabas, $producte->get_All());
                }
                $user = new mUser();
                $dades = $user->findUser($_SESSION['LOGIN']['EMAIL']);
            } else {
                $exist = false;
            }
            include_once($GLOBALS['dir'] . "/vistes/toPay.php");
        }catch(Exception $e){
            $this->error->throwException('323', 'No s`ha pogut carregar la vista.', $e);
        }
    }

    // Realitza el pagament
    function payKart()
    {
        try {
            $kart = new mKart();
            $kart->setPaidKart();
        }catch(Exception $e){
            $this->error->trowException('324', 'No s`ha pogut realitzar el pagament.', $e);
        }
    }
}
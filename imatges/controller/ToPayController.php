<?php
include_once($GLOBALS['dir'] . "/model/mKart.php");
include_once($GLOBALS['dir'] . "/model/mProduct.php");
include_once($GLOBALS['dir'] . "/model/mUser.php");

class ToPayController
{
    function __constructor()
    {

    }

    function getVista()
    {
        if(isset($_SESSION['KART'])){
            $exist = true;
            $cabas = array();
            foreach($_SESSION['KART'] as $product)
            {
                $producte = new mProduct($product);
                array_push($cabas, $producte->get_All());
            }
            $user = new mUser();
            $dades = $user->findUser($_SESSION['LOGIN']['EMAIL']);
        }
        else{
            $exist = false;
        }
        include_once($GLOBALS['dir']."/vistes/toPay.php");
    }

    function payKart()
    {
        $kart = new mKart();
        $kart->setPaidKart();
    }
}
<?php
include_once($GLOBALS['dir'] . "/model/mKart.php");
include_once($GLOBALS['dir'] . "/model/mProduct.php");


class KartController
{

    private $mKart;

    function __construct()
    {
        $this->mKart = new mKart();
    }

    function getLastKartOnCookie()
    {
        return $this->mKart->getNotPaidKart();
    }

    function isKartActive()
    {
        return $this->mKart->getNotPaidKart();
    }

    function toPay()
    {
        $this->mKart->setPaidKart();
    }

    function saveKartFromCookie()
    {
        $this->mKart->setKart();
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
        }
        else{
            $exist = false;
        }
        include_once($GLOBALS['dir']."/vistes/kart.php");
    }

    function getKartOnLogin()
    {
       return $this->mKart->getKartOnLogin();
    }
}
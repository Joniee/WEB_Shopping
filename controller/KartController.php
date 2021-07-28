<?php
include_once($GLOBALS['dir'] . "/model/mKart.php");
include_once($GLOBALS['dir'] . "/model/mProduct.php");
include_once($GLOBALS['dir'] . "/controller/ErrorController.php");

class KartController
{

    private $mKart;

    private $error;

    function __construct()
    {
        $this->error = new ErrorController();
        try {
            $this->mKart = new mKart();
        }catch(Exception $e){
            $this->error->throwException('516', 'No s`ha pogut crear la classe.', $e);
        }
    }

    //Retorna el kart guardat en la bd sense pagar.
    function getLastKartOnCookie()
    {
        try {
            return $this->mKart->getNotPaidKart();
        }catch(Exception $e){
            $this->error->throwException('309', 'Ha fallat al intentar trobar un kart sense pagar.', $e);
        }
    }

    //Realitza el pagament del kart
    function toPay()
    {
        try {
            $this->mKart->setPaidKart();
        }catch(Exception $e){
            $this->error->throwException('310', 'No s`ha pogut realitzar el pagament.', $e);
        }
    }

    //Guarda el kart a la bd sobreescribirnt el que hi habia sense pagar
    function saveKartFromCookie()
    {
        try {
            $this->mKart->setKart();
        }catch(Exception $e){
            $this->error->throwException('311', 'No s`ha pogut guardar la compra.', $e);
        }
    }

    // Crida a la vista del cabàs que es veurá a tot el web.
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
            } else {
                $exist = false;
            }
            include_once($GLOBALS['dir'] . "/vistes/kart.php");
        }catch(Exception $e){
            $this->error->throwException('312', 'No s`ha pogut carregar la vista.', $e);
        }
    }

    //Comprova si hi ha un kart sense pagar a la bd en el moment de iniciar sessió.
    function getKartOnLogin()
    {
        try{
            return $this->mKart->getKartOnLogin();
        }catch(Exception $e){
            $this->error->throwException('313', 'No s`ha pogut comprovar l`existencia d`un kart previ.', $e);
        }
    }
}
<?php
include_once($GLOBALS['dir']."/model/mProduct.php");
include_once($GLOBALS['dir']."/model/mCategory.php");
include_once($GLOBALS['dir'] . "/controller/ErrorController.php");

class ProductController
{
    private $mProduct;

    private $error;

    function __construct($id)
    {
        $this->error = new ErrorController();
        try{
            $this->mProduct = new mProduct($id);
        }catch(Exception $e){
            $this->error->throwException('520', 'No s`ha creat la classe.', $e);
        }

    }

    //Retorna un producte
    function get_Product()
    {
        try{
            return $this->mProduct;
        }catch(Exception $e){
            $this->error->throwException('317', 'No s`ha pogut recuperar el producte.', $e);
        }
    }

    //Carrega la vista
    function getVista()
    {
        try {
            $prod = $this->mProduct->get_All();
            include_once($GLOBALS['dir']."/vistes/producte.php");
        }catch(Exception $e){
            $this->error->throwException('318', 'No s`ha pogut mostrar la vista.', $e);
        }

    }
}
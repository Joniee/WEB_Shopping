<?php
include_once ($GLOBALS['dir'] . "/model/mSearch.php");
include_once($GLOBALS['dir']."/controller/ErrorController.php");

class FindProductController
{
    private $mProduct;

    private $error;

    function __construct()
    {
        $this->error = new ErrorController();
        try {
            $this->mProduct = new mSearch();
        }catch(Exception $e){
            $this->error->throwException('513', 'No s`ha creat la clase.', $e);
        }
    }

    //Crea la vista amb les dades de la funció buscar.
    function getVista()
    {
        try {
            $list = $this->mProduct->getAllElements();
            include_once($GLOBALS['dir'] . "/vistes/searchResult.php");
            include_once($GLOBALS['dir'] . "/vistes/kart.php");
        }catch(Exception $e){
            $this->error->throwException('306', 'No s`ha pogut mostrar la vista.', $e);
        }
    }
}
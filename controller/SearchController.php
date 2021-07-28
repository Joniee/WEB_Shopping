<?php
include_once($GLOBALS['dir'] . "/controller/ErrorController.php");

class SearchController
{
    private $error;

    function __construct()
    {
        $this->error = new ErrorController();
    }

    //Carrega la vista
    function getVista()
    {
        try {
            include_once($GLOBALS['dir'] . '/vistes/search.php');
        }catch(Exception $e){
            $this->error->throwException('321', 'No s`ha pogut carregar la vista.', $e);
        }

    }
}
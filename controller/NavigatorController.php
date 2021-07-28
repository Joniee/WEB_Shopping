<?php
include_once($GLOBALS['dir'] . "/controller/ErrorController.php");

class NavigatorController
{
    private $error;

    function __construct()
    {
        $this->error = new ErrorController();
    }

    //Carrega la vista del navegador.
    function getVista()
    {
        try {
            include_once($GLOBALS['dir'] . "/vistes/navigator.php");
        }catch(Exception $e){
            $this->error->throwException('316', 'No s`ha pogut carregar la vista.', $e);
        }
    }
}
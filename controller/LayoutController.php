<?php
include_once($GLOBALS['dir'] . "/controller/ErrorController.php");

class LayoutController
{
    private $error;

    function __construct()
    {
        $this->error = new ErrorController();
    }

    //Carrega la vista principal.
    function getVista()
    {
        try {
            include_once($GLOBALS['dir'] . "/vistes/layout.php");
        }catch(Exception $e){
            $this->error->throwException('315', 'No s`ha pogut carregar la vista.', $e);
        }
    }
}
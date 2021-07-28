<?php

include_once($GLOBALS['dir'] . "/controller/ErrorController.php");

class InitController
{
    private $error;

    function __constructor()
    {
        $this->error = new ErrorController();
    }

    function getVista()
    {
        try {
            include_once($GLOBALS['dir'] . "/vistes/init.php");
        }catch(Exception $e){
            $this->error->throwException('308', 'No s`ha pogut carregar la vista.', $e);
        }
    }
}
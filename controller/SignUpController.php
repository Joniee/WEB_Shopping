<?php
include_once($GLOBALS['dir'] . "/controller/ErrorController.php");

class SignUpController
{
    private $error;

    function __construct()
    {
        $this->error = new ErrorController();
    }

    //Carrega la vista.
    function getVista()
    {
        try {
            include_once($GLOBALS['dir'] . "/vistes/signup.php");
        }catch(Exception $e){
            $this->error->throwException('322', 'No s`ha pogut carregar la vista.', $e);
        }
    }
}
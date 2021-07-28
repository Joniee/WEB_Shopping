<?php

include_once($GLOBALS['dir']."/model/mUser.php");
include_once($GLOBALS['dir']."/controller/UserDataController.php");
include_once($GLOBALS['dir']."/controller/ErrorController.php");


class UserController
{
    private $mUser;

    private $error;

    function __construct()
    {
        $this->error = new ErrorController();
        try {
            $this->mUser = new mUser();
        }catch(Exception $e){
            $this->error->throwException('525', 'No s`ha pogut crear la classe.', $e);
        }
    }

    //Carrega la vista
    function getVista()
    {
        try {
            if (isset($_SESSION['LOGIN']) && ($_SESSION['LOGIN']['EMAIL'])) {
                $userData = new UserDataController($this->mUser);
                $datosUser = $userData->find_User();


            }
            include_once($GLOBALS['dir'] . '/vistes/login.php');
        }catch(Exception $e){
            $this->error->throwException('325', 'No s`ha pogut carregar la vista.', $e);
        }

    }

}
<?php

include($GLOBALS['dir']."/model/mUser.php");
include($GLOBALS['dir']."/controller/UserDataController.php");

class UserController
{
    private $mUser;


    function __construct()
    {
        $this->mUser = new mUser();
        //include_once ($GLOBALS['dir'] . "/resources/addStyleScript.php");
    }


    function getVista()
    {
        if(isset($_SESSION['LOGIN']) && ($_SESSION['LOGIN']['EMAIL'])){
            $userData = new UserDataController();
            $datosUser = $userData->find_User();


        }
        include_once($GLOBALS['dir'] . '/vistes/login.php');

    }

}
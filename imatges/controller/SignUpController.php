<?php

include_once($GLOBALS['dir']."/model/mBD.php");

class SignUpController
{
    function __construct()
    {
        //include_once ($GLOBALS['dir'] . "/resources/addStyleScript.php");

    }

    function getVista()
    {
        include_once($GLOBALS['dir']."/vistes/signup.php");
    }
}
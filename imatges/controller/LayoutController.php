<?php

class LayoutController
{
    function __construct()
    {
        //include_once ($GLOBALS['dir'] . "/resources/addStyleScript.php");

    }

    function getVista()
    {
        include_once($GLOBALS['dir']."/vistes/layout.php");
    }
}
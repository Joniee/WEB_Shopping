<?php
/**
 * Created by PhpStorm.
 * User: UAB_
 * Date: 27/11/2019
 * Time: 12:18
 */

class NavigatorController
{
    function __construct()
    {
        //include_once ($GLOBALS['dir'] . "/resources/addStyleScript.php");

    }

    function getVista()
    {
        include_once($GLOBALS['dir']."/vistes/navigator.php");
    }
}
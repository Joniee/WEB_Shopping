<?php
/**
 * Created by PhpStorm.
 * User: VSPC-INFERNOHEX
 * Date: 23/01/2020
 * Time: 13:49
 */

class InitController
{
    function __constructor()
    {

    }

    function getVista()
    {
        include_once($GLOBALS['dir']."/vistes/init.php");
    }
}
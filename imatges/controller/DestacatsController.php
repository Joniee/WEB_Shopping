<?php

include_once($GLOBALS['dir']."/model/mDestacats.php");

class DestacatsController
{
    private $mDestacats;

    function __construct()
    {
        $this->mDestacats = new mDestacats();
        //include_once ($GLOBALS['dir'] . "/resources/addStyleScript.php");
    }

    function getVista()
    {
        $resultats = $this->mDestacats->get_All();
        include_once($GLOBALS['dir']."/vistes/destacats.php");
    }
}
<?php
include_once($GLOBALS['dir'] . "/model/mKart.php");


class HistoryController
{

    private $mKart;

    function __construct()
    {
        $this->mKart = new mKart();
        //include_once ($GLOBALS['dir'] . "/resources/addStyleScript.php");
    }

    function getVista()
    {
        $resultatsKart = $this->mKart->get_All();
        $dades = array();
        foreach($resultatsKart as $item){
            $dades[$item['ID']] = $this->mKart->getKartInfo($item['ID']);
        }
        include_once($GLOBALS['dir']."/vistes/history.php");
    }
}
<?php

include_once ($GLOBALS['dir']."/model/mProductes.php");
include_once ($GLOBALS['dir']."/model/mCategory.php");

class ProductesController
{
    private $mProductes;

    private $mCategory;

    function __construct($id)
    {

        $this->mProductes = new mProductes();
        $this->mCategory = new mCategory($id);
        //include_once ($GLOBALS['dir'] . "/resources/addStyleScript.php");
        $this->getVista();
    }

    function get_Productes()
    {
        return $this->mProductes;
    }

    function getVista()
    {
        $cat = $this->mCategory->get_All();
        $list = $this->mProductes->get_AllElements($_GET['id']);
        include_once($GLOBALS['dir']."/vistes/productes.php");
    }
}
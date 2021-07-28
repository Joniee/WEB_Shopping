<?php
include_once($GLOBALS['dir']."/model/mProduct.php");
include_once($GLOBALS['dir']."/model/mCategory.php");

class ProductController
{
    private $mProduct;


    function __construct($id)
    {
        $this->mProduct = new mProduct($id);
        //include_once ($GLOBALS['dir'] . "/resources/addStyleScript.php");

    }

    function get_Product()
    {
        return $this->mProduct;
    }

    function getVista()
    {
        $prod = $this->mProduct->get_All();
        include_once($GLOBALS['dir']."/vistes/producte.php");
    }
}
<?php
include_once ($GLOBALS['dir'] . "/model/mSearch.php");

class FindProductController
{
    private $product;

    function __construct()
    {
        $this->product = new mSearch();
    }

    function getVista()
    {
        $list = $this->product->getAllElements();
        include_once ($GLOBALS['dir'] . "/vistes/searchResult.php");
    }
}
<?php
include_once($GLOBALS['dir']."/model/mCategory.php");

class CategoryController
{
    private $mCategory;

    function __construct($id = NULL)
    {
        $this->mCategory = new mCategory($id);
        //include_once ($GLOBALS['dir'] . "/resources/addStyleScript.php");
    }

    function get_Category()
    {
        return $this->mCategory;
    }

    function getVista()
    {
        $list = $this->mCategory->get_All();
        include_once('./vistes/categoria.php');
    }
}
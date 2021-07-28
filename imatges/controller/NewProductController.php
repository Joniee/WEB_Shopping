<?php
include_once($GLOBALS['dir']."/model/mProduct.php");

class NewProductController
{
    private $mProduct;


    function __construct($id)
    {
        $this->mProduct = new mProduct($id);
        include_once($GLOBALS['dir']."/resources/upFileKart.php");
        $this->mProduct->setNewProduct($target_file);
        header('Location: http://tdiw-h11.deic-docencia.uab.cat?p=51');
    }



    
}
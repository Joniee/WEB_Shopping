<?php
include_once($GLOBALS['dir']."/model/mProduct.php");
include_once($GLOBALS['dir'] . "/controller/ErrorController.php");

class NewProductController
{
    private $mProduct;

    private $error;

    // S'encarrega de realitzar la pujada de fitxer i la creació de un nou producte a la BD.
    function __construct($id)
    {
        $this->error = new ErrorController();
        try {
            $this->mProduct = new mProduct($id);
            include_once($GLOBALS['dir'] . "/resources/upFileKart.php");
            $this->mProduct->setNewProduct($directory);
            header('Location: http://tdiw-h11.deic-docencia.uab.cat?p=51');
        }catch(Exception $e){
            $this->error->throwException('519', 'No s`ha pogut crear la classe', $e);
        }
    }



    
}
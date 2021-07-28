<?php

include_once ($GLOBALS['dir']."/model/mProductes.php");
include_once ($GLOBALS['dir']."/model/mCategory.php");
include_once($GLOBALS['dir'] . "/controller/ErrorController.php");

class ProductesController
{
    private $mProductes;

    private $mCategory;

    private $error;


    //Anticuat: Careega dades y la vista (ho fa tot)
    function __construct($id)
    {
        $this->error = new ErrorController();
        try {
            $this->mProductes = new mProductes();
            $this->mCategory = new mCategory($id);
            $this->getVista();
        }catch(Exception $e){
            $this->error->throwException('521', 'No s`ha pogut crear la classe.', $e);
        }
    }

    // Retorna tots els productes trobats a la bd.
    function get_Productes()
    {
        try {
            return $this->mProductes;
        }catch(Exception $e){
            $this->error->throwException('319', 'No s`han pogut tobar els productes.', $e);
        }
    }

    //Carrega la vista.
    function getVista()
    {
        try{
            $cat = $this->mCategory->get_All();
            $list = $this->mProductes->get_AllElements($_GET['id']);
            include_once($GLOBALS['dir'] . "/vistes/productes.php");
        }catch(Exception $e){
            $this->error->throwException('320', 'No s`ha pogut carregar la vista.', $e);
        }
    }
}
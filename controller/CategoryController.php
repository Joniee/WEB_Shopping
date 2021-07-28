<?php
include_once($GLOBALS['dir']."/model/mCategory.php");
include_once($GLOBALS['dir']."/controller/ErrorController.php");

class CategoryController
{
    private $mCategory;

    function __construct($id = NULL)
    {
        $this->error = new ErrorController();
        try {
            $this->mCategory = new mCategory($id);
        }catch(Exception $e){
            $this->error->throwException('511', 'No s`ha pogut crear el constructor amb la categoria.', $e);
        }
    }

    // retorna la variable $mCategory propia de la clase
    function get_Category()
    {
        try {
            return $this->mCategory;
        }catch(Exception $e){
            $this->error->throwException('303', 'No s`ha pogut retornar la informació', $e);
        }
    }

    // crida a la vista de categories
    function getVista()
    {
        try {
            $list = $this->mCategory->get_All();
            include_once('./vistes/categoria.php');
        }catch(Exception $e){
            $this->error->throwException('304', 'No s`ha pogut carregar les dades i la vista', $e);
        }
    }
}
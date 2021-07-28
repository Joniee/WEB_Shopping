<?php

include_once ('mBD.php');
include_once ($GLOBALS['dir'] . '/controller/ErrorController.php');

class mDestacats
{
    private $bd;

    private $list;

    private $error;

    function __construct()
    {
        $this->error = new ErrorController();
        try {
            $this->bd = new mBD();
            $this->get_AllElements();
        }
        catch(Exception $e)
        {
            $this->error->throwException("503", "No s'ha pogut crear la clase.", $e);
        }
    }

    function get_All()
    {
        try {
            return $this->list;
        }catch(Exception $e){
            $this->error->throwException('625', 'No s`han pogut recuperar.'. $e);
        }
    }


    function get_AllElements()
    {
        try {
            $sql = "SELECT Product.* FROM Product ORDER BY SOLD DESC";

            $stmt = $this->bd->get_conection()->prepare($sql);

            $stmt->execute();

            $this->list = $stmt->fetchAll();
        }catch(Exception $e){
            $this->error->throwException('626', 'No s`ha pogut trbar cap element.', $e);
        }
    }
}
<?php

include_once ('mBD.php');
include_once ($GLOBALS['dir'] . '/controller/ErrorController.php');

class mProductes
{

    private $bd;

    private $error;

    function __construct()
    {
        $this->error = new ErrorController();
        try {
            $this->bd = new mBD();
        }
        catch(Exception $e)
        {
            $this->error->throwException("506", "No s'ha pogut crear la clase.", $e);
        }
    }


    function get_AllElements($id)
    {
        try {
            $sql = "SELECT Product.* FROM Product WHERE ID_CATEGORY = :id";

            $stmt = $this->bd->get_conection()->prepare($sql);

            $params = [
                'id' => $id,
            ];

            $stmt->execute($params);

            return $stmt->fetchAll();
        }catch(Exception $e){
            $this->error->throwException('621', 'No s`ha pogut tobar cap element.', $e);
        }
    }

    function listProducts()
    {
        try {
            $sql = "SELECT Product.* FROM Product WHERE '1' = '1'";

            $stmt = $this->bd->get_conection()->prepare($sql);


            $stmt->execute();

            return $stmt->fetchAll();
        }catch(Exception $e){
            $this->error->throwException('622', 'No s`ha pogut llistar cap element', $e);
        }
    }
}
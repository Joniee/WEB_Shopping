<?php

include_once($GLOBALS['dir'] . "/model/mBD.php");

class mSearch
{
    private $error;

    function __construct()
    {
        $this->error = new ErrorController();
        try {
            $this->bd = new mBD();
        }
        catch(Exception $e)
        {
            $this->error->throwException("507", "No s`ha pogut crear la clase.", $e);
        }
    }

    function cleanInput()
    {
        try {
            $error = filter_var($_POST['SEARCH'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $error = filter_var($error, FILTER_DEFAULT);
            return $error;
        }catch(Exception $e){
            $this->error->throwException('623', 'No s`ha pogut realitzar la neteja.', $e);
        }
    }

    function getAllElements()
    {
        try {
            $sql = "SELECT Product.* FROM Product WHERE `NAME` LIKE :name";

            $stmt = $this->bd->get_conection()->prepare($sql);

            $params = [
                'name' => '%' . $this->cleanInput() . '%',
            ];

            $stmt->execute($params);

            return $stmt->fetchAll();
        }catch(Exception $e){
            $this->error->throwException('624', 'No s`ha pogut trobar cap element.', $e);
        }
    }
}
<?php

include_once ('mBD.php');
include_once ($GLOBALS['dir'] . '/controller/ErrorController.php');

class mCategory
{

    private $bd;

    private $list;

    private $error;

    function __construct($id = [])
    {
        $this->error = new ErrorController();
        try {
            $this->bd = new mBD();
            if(isset($id)){
                $this->get_AnElement($id);
            }
            else {
                $this->get_AllElements();
            }
        }
        catch(Exception $e)
        {
            $this->error->throwException("502", "No s`ha pogut crear la clase.", $e);
        }
    }


    function get_All()
    {
        try {
            return $this->list;
        }catch(Exception $e){
            $this->error->throwException('608', 'No s`ha pogut retornar res.', $e);
        }
    }


    function get_AllElements()
    {
        try {
            $sql = "SELECT Category.* FROM Category";

            $stmt = $this->bd->get_conection()->prepare($sql);

            $stmt->execute();

            $this->list = $stmt->fetchAll();
        }catch(Exception $e){
            $this->error->throwException('609', 'No s`ha pogut tobar cap element.', $e);
        }
    }

    function get_AnElement($id)
    {
        try {
            $sql = "SELECT Category.* FROM Category WHERE ID = :id";

            $stmt = $this->bd->get_conection()->prepare($sql);

            $params = [
                'id' => $id,
            ];

            $stmt->execute($params);

            $this->list = $stmt->fetch();
        }catch(Exception $e){
            $this->error->throwException('610', 'No s`ha pogut tobar cap element', $e);
        }
    }
}
<?php

include_once ('mBD.php');
include_once ($GLOBALS['dir'] . '/controller/ErrorController.php');

class mProduct
{

    private $bd;

    private $product;

    private $error;

    function __construct($id)
    {
        $this->error = new ErrorController();
        try {
            $this->bd = new mBD();
            $this->get_AnElement($id);
        }
        catch(Exception $e)
        {
            $this->error->throwException("505", "Producte", $e);
        }
    }


    function get_All()
    {
        try {
            return $this->product;
        }catch(Exception $e){
            $this->error->throwException('618', 'No s`ha trobat cap element.', $e);
        }
    }


    function get_AnElement($id)
    {
        try {
            $sql = "SELECT Product.* FROM Product WHERE ID = :id";

            $stmt = $this->bd->get_conection()->prepare($sql);

            $params = [
                'id' => $id,
            ];

            $stmt->execute($params);

            $this->product = $stmt->fetch();
        }catch(Exception $e){
            $this->error->throwException('619', 'No s`ha pogut recuperar cap element.', $e);
        }
    }

    function setNewProduct($destination)
    {
        try {
            $sql = "INSERT INTO `Product`(`ID_CATEGORY`, `NAME`, `QUANTITY`, `PRICE`, `SDESCRIPTION`, `LDESCRIPTION`, `IMAGE`, `SOLD`) VALUES (:category, :name, :quantity, :price, :sdes, :ldes, :img, :sold)";

            $stmt = $this->bd->get_conection()->prepare($sql);

            $params = [
                'category' => $_POST['CATEGORY'],
                'name' => $_POST['NAME'],
                'quantity' => $_POST['QUANTITY'],
                'price' => $_POST['PRICE'],
                'sdes' => $_POST['DESCS'],
                'ldes' => $_POST['DESCL'],
                'img' => $destination,
                'sold' => '0'
            ];

            $stmt->execute($params);
        }catch(Exception $e){
            $this->error->throwException('620', 'No s`ha pogut inserir el producte.', $e);
        }
    }

}
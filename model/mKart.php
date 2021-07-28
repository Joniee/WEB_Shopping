<?php

include_once ($GLOBALS['dir'] . "/model/mBD.php");
include_once ($GLOBALS['dir'] . "/model/mUser.php");
include_once ($GLOBALS['dir'] . "/controller/ErrorController.php");

class mKart
{

    private $bd;

    private $user;

    private $error;

    function __construct()
    {
        $this->error = new ErrorController();
        try {
            $this->bd = new mBD();
            $this->user = new mUser();

        } catch (Exception $e) {
            $this->error->throwException("504", "No s`ha pogut crear la clase.", $e);
        }
    }

    function get_All()
    {
        try {
            $sql = "SELECT User.* FROM User WHERE EMAIL = :email";

            $params = [
                'email' => $_SESSION['LOGIN']['EMAIL'],
            ];

            $stmt = $this->bd->get_conection()->prepare($sql);

            $stmt->execute($params);

            $result = $stmt->fetch();

            $sql = "SELECT `Kart`.* FROM Kart WHERE `ID_USER` = :id AND `PAID` = :paid ORDER BY DATE DESC";

            $params = [
                'id' => $result['ID'],
                'paid' => 1
            ];

            $stmt = $this->bd->get_conection()->prepare($sql);

            $stmt->execute($params);

            $result = $stmt->fetchAll();
            return $result;
        }catch(Exception $e){
            $this->error->throwException('611', 'No s`ha pogut tobar cap element.', $e);
        }
    }

    function getKartInfo($id)
    {
        try {
            $sql = "SELECT `Kart-Product`.* FROM `Kart-Product` WHERE ID_KART = :id";

            $params = [
                'id' => $id,
            ];

            $stmt = $this->bd->get_conection()->prepare($sql);

            $stmt->execute($params);

            $result = $stmt->fetchAll();
            $finalresult = array();
            foreach ($result as $item) {
                $sql = "SELECT `Product`.* FROM `Product` WHERE `ID` = :id";

                $params = [
                    'id' => $item['ID_PRODUCT'],
                ];

                $stmt = $this->bd->get_conection()->prepare($sql);

                $stmt->execute($params);

                array_push($finalresult, $stmt->fetch());

            }
            return (array($finalresult, $result));
        }catch(Exception $e){
            $this->error->throwException('612', 'No s`ha pogut trobar cap element.', $e);
        }
    }

    function setKart()
    {
        try {
            $id_user = $this->user->getId();

            $sql = "SELECT Kart.ID FROM Kart WHERE ID_USER = :id AND PAID = :paid";
            $params = [
                'id' => $id_user,
                'paid' => '0'
            ];
            $stmt = $this->bd->get_conection()->prepare($sql);
            $stmt->execute($params);
            $oldKart = $stmt->fetch();

            if (is_array($oldKart) && sizeof($oldKart) > 0) {
                $sql = "DELETE FROM Kart WHERE ID = :id";
                $stmt = $this->bd->get_conection()->prepare($sql);
                $params = [
                    'id' => $oldKart[0],
                ];
                $stmt->execute($params);
            }

            $final_price = 0;
            foreach ($_SESSION['KART'] as $prod) {
                $sql = "SELECT Product.PRICE FROM Product WHERE ID = :id";
                $stmt = $this->bd->get_conection()->prepare($sql);
                $params = [
                    'id' => $prod
                ];
                $stmt->execute($params);
                $final_price += $stmt->fetch()[0];
            }

            $fecha = date('Y\-m\-d');
            $sql = "INSERT INTO `Kart`(`NUM_PROD`, `TOTAL_PRICE`, `PAID`, `DATE`, `ID_USER`) VALUES (:numprod, :totalprice, :paid, :dat, :id_user)";
            $stmt = $this->bd->get_conection()->prepare($sql);
            $params = [
                'numprod' => sizeof($_SESSION['KART']),
                'totalprice' => $final_price,
                'paid' => '0',
                'dat' => $fecha,
                'id_user' => $id_user
            ];
            $e = $stmt->execute($params);


            $sql = "SELECT `Kart`.`ID` FROM `Kart` WHERE `NUM_PROD` = :numprod AND `PAID` = :paid AND `DATE` = :dat AND `ID_USER` = :id_user";
            $stmt = $this->bd->get_conection()->prepare($sql);
            $params = [
                'numprod' => sizeof($_SESSION['KART']),
                'paid' => '0',
                'dat' => $fecha,
                'id_user' => $id_user
            ];
            $stmt->execute($params);
            $kart_id = $stmt->fetch();


            foreach ($_SESSION['KART'] as $idprod) {
                $sql = "INSERT INTO `Kart-Product`(`ID_PRODUCT`, `ID_KART`) VALUES (:idprod, :idkart)";
                $stmt = $this->bd->get_conection()->prepare($sql);
                $params = [
                    'idprod' => $idprod,
                    'idkart' => $kart_id[0]

                ];
                $e = $stmt->execute($params);
            }

            $_SESSION['ID_KART'] = $kart_id[0];
        }catch(Exception $e){
            $this->error->throwException('613', 'No s`ha pogut crear un nou kart.', $e);
        }
    }

    function getNotPaidKart()
    {
        try {
            $sql = "SELECT `Kart-Product`.`ID_PRODUCT` FROM `Kart-Product` WHERE `ID_KART` = :id";
            $stmt = $this->bd->get_conection()->prepare($sql);
            $params = [
                'id' => $_SESSION['ID_KART']
            ];
            $stmt->execute($params);
            $result = $stmt->fetchAll();
            foreach ($result as $key => $product) {
                $_SESSION['KART'][$key] = $product[0];
            }
        }catch(Exception $e){
            $this->error->throwException('614', 'No s`ha pogut guardar.', $e);
        }
    }

    function getKartOnLogin()
    {
        try {
            $id_user = $this->user->getId();

            $sql = "SELECT Kart.ID FROM Kart WHERE ID_USER = :id AND PAID = :paid";
            $params = [
                'id' => $id_user,
                'paid' => '0'
            ];
            $stmt = $this->bd->get_conection()->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetch()[0];
        }catch(Exception $e){
            $this->error->throwException('615', 'No s`ha pogut recuperar.', $e);
        }
    }


    function setPaidKart()
    {
        try {
            $sql = "UPDATE `Kart` SET `PAID` = :paid,`DATE` = :date WHERE `ID` = :id";
            $stmt = $this->bd->get_conection()->prepare($sql);
            $params = [
                'paid' => '1',
                'date' => date('Y\-m\-d'),
                'id' => $_SESSION['ID_KART']
            ];
            $stmt->execute($params);

            foreach ($_SESSION['KART'] as $product) {
                $sql = "UPDATE `Product` SET `SOLD` = `SOLD` + :increment,`QUANTITY` = `QUANTITY` - :decrement WHERE `ID` = :id";
                $stmt = $this->bd->get_conection()->prepare($sql);
                $params = [
                    'increment' => 1,
                    'decrement' => 1,
                    'id' => $product
                ];
            }
        }catch(Exception $e){
            $this->error->throwException('616', 'No s`ha pogut pagar.', $e);
        }
    }

    function listKarts()
    {
        try {
            $sql = "SELECT `Kart`.* FROM Kart WHERE `PAID` = :paid ORDER BY `ID`";

            $params = [
                'paid' => 1
            ];

            $stmt = $this->bd->get_conection()->prepare($sql);

            $stmt->execute($params);

            return $stmt->fetchAll();
        }catch(Exception $e){
            $this->error->throwException('617', 'No s`ha pogut trobar cap element', $e);
        }
    }

}
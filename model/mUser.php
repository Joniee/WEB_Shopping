<?php

include_once($GLOBALS['dir'] . "/model/mBD.php");
include_once($GLOBALS['dir'] . "/controller/ErrorController.php");

class mUser
{
    private $bd;

    private $error;

    function __construct()
    {
        $this->error = new ErrorController();
        try {
            $this->bd = new mBD();

        } catch (Error $e) {
            $this->error->throwException("501", "BD in model User", $e);
        }
    }


    function find_noCoincidences($mail)
    {
        try{
            $sql = "SELECT User.* FROM User WHERE EMAIL = :email";

            $params = [
                'email' => $mail
            ];

            $stmt = $this->bd->get_conection()->prepare($sql);

            $stmt->execute($params);

            $result = $stmt->fetchAll();

            if (isset($result[0]) && $result[0]['EMAIL'] == $mail) {
                return false;
            } else {
                return true;
            }
        }
        catch(Exception $e){
            $this->error->throwException('601', 'SELECT or no data in User', $e);
        }

    }

    function createUser($infoUser = [])
    {
        try {
            if ($this->find_noCoincidences($infoUser['EMAIL'])) {
                $sql = "INSERT INTO `User`(`NAME`, `EMAIL`, `ADDRESS`, `TOWN`, `CP`, `TYPE`, `PASSWORD`, `IMAGE`) VALUES (:name, :email, :address, :town, :cp, :type, :password, :image)";

                $stmt = $this->bd->get_conection()->prepare($sql);

                $params = [
                    'name' => $infoUser['NAME'],
                    'email' => $infoUser['EMAIL'],
                    'address' => $infoUser['ADDRESS'],
                    'town' => $infoUser['TOWN'],
                    'cp' => $infoUser['CP'],
                    'type' => '0',
                    'password' => $infoUser['PASSWORD'],
                    'image' => $infoUser['IMAGE']
                ];

                $e = $stmt->execute($params);
                return $e;
            } else {
                return false;
            }
        }catch(Exception $e){
            $this->error->throwException('602', 'INSERT or no data in User', $e);
        }
    }

    function findUser($mail)
    {
        try {
            $sql = "SELECT User.* FROM User WHERE EMAIL = :email";

            $params = [
                'email' => $mail
            ];

            $stmt = $this->bd->get_conection()->prepare($sql);

            $stmt->execute($params);

            $result = $stmt->fetch();

            return $result;
        }catch(Exception $e)
        {
            $this->error->throwException('603', 'SELECT or no data User', $e);
        }
    }

    function getId()
    {
        try {
            $sql = "SELECT User.ID FROM User WHERE EMAIL = :email";
            $stmt = $this->bd->get_conection()->prepare($sql);
            $params = [
                'email' => $_SESSION['LOGIN']['EMAIL']
            ];
            $stmt->execute($params);
            return $stmt->fetch()[0];
        }
        catch(Exception $e)
        {
            $this->error->throwException('604', 'SELECT or no data User', $e);
        }
    }

    function updateUser($infoUser = [])
    {
        try {
            $sql = "UPDATE `User` SET `NAME`=:name, `ADDRESS`=:address,`TOWN`=:town,`CP`=:cp,`PASSWORD`=:password, `IMAGE` = :img WHERE `EMAIL` = :email ";

            $params = [
                'name' => $infoUser['NAME'],
                'email' => $infoUser['EMAIL'],
                'address' => $infoUser['ADDRESS'],
                'town' => $infoUser['TOWN'],
                'cp' => $infoUser['CP'],
                'password' => $infoUser['PASSWORD'],
                'img' => $infoUser['IMAGE']
            ];

            $stmt = $this->bd->get_conection()->prepare($sql);

            $stmt->execute($params);

            $result = $stmt->fetch();

            return $result;
        }
        catch(Exception $e){
            $this->error->throwException('605', 'UPDATE or no data User', $e);
        }
    }

    function listUsers()
    {
        try {
            $sql = "SELECT `User`.`ID`, `User`.`NAME`, `User`.`EMAIL` FROM `User` WHERE `TYPE` = :admin";

            $stmt = $this->bd->get_conection()->prepare($sql);

            $params = [
                'admin' => '0'
            ];

            $stmt->execute($params);

            return $stmt->fetchAll();
        }
        catch(Exception $e){
            $this->error->throwException('606', 'SELECT or no data User', $e);
        }
    }
}

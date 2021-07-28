<?php
include_once($GLOBALS['dir'] . "/controller/ErrorController.php");
include_once($GLOBALS['dir'] . "/model/mUser.php");

class UserDataController
{
    private $mUser;

    private $error;


    function __construct($mUser = false)
    {
        $this->error = new ErrorController();
        try {

            if ($mUser) {
                $this->mUser = $mUser;
            } else {
                $this->mUser = new mUser();
            }
        }
        catch(Exception $e){
            $this->error->throwException('527', 'No s`ha pogut crear la classe.', $e);
        }
    }

    //Busca un usuari
    function find_User()
    {
        try {
            return $this->mUser->findUser($_SESSION['LOGIN']['EMAIL']);
        }catch(Exception $e){
            $this->error->throwException('330', 'No s`ha pogut trobar l`usuari.', $e);
        }
    }

    //Actualitza un usuari
    function update_User()
    {
        try {
            $infoUser = [
                'EMAIL' => $this->cleanInput($_SESSION['LOGIN']['EMAIL'], 1),
                'PASSWORD' => $this->cleanInput($_POST['OLDPASSWORD'], 3)
            ];

            $result = $this->mUser->findUser($infoUser['EMAIL']);
            $init = password_verify($infoUser['PASSWORD'], $result['PASSWORD']);
            if (isset($_FILES["fileToUpload"]) && $init) {
                include_once($GLOBALS['dir'] . "/resources/upFileUser.php");
                $infoUser = [

                    'NAME' => $this->cleanInput($_POST['NAME'], 0),
                    'EMAIL' => $_SESSION['LOGIN']['EMAIL'],
                    'ADDRESS' => $this->cleanInput($_POST['ADDRESS'], 0),
                    'TOWN' => $this->cleanInput($_POST['TOWN'], 0),
                    'CP' => $this->cleanInput($_POST['CP'], 0),
                    'PASSWORD' => password_hash($this->cleanInput($_POST['NEWPASSWORD'], 3), PASSWORD_DEFAULT),
                    "IMAGE" => $directory
                ];
                return (!$this->mUser->updateUser($infoUser));
            }

            return false;
        }
        catch(Exception $e)
        {
            $this->error->throwException('331', 'No s`ha pogut actualitzar l`usuari.', $e);
        }
    }

    //Neteja les dades rebvudes per un formulari.
    //$type:0-char 1-email 2-cp 3-password
    function cleanInput($infoUser, $type)
    {
        try {
            switch ($type) {
                case 0:
                    $error = filter_var($infoUser, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $error = filter_var($error, FILTER_DEFAULT);
                    break;

                case 1:
                    $error = filter_var($infoUser, FILTER_SANITIZE_EMAIL);
                    $error = filter_var($error, FILTER_VALIDATE_EMAIL);
                    break;

                case 2:
                    //$error = filter_var($infoUser, FILTER_SANITIZE_NUMBER_INT);
                    if (filter_var($infoUser, FILTER_VALIDATE_INT) === 0 || !filter_var($infoUser, FILTER_VALIDATE_INT) === false) {
                        $error = filter_var($infoUser, FILTER_VALIDATE_INT);
                    } else {
                        echo("Integer is not valid");
                    }
                    break;

                case 3:
                    $error = filter_var($infoUser, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $error = filter_var($error, FILTER_DEFAULT);
                    break;


            }
            return $error;
        }catch(Exception $e){
            $this->error->throwException('332', 'No s`ha pogut netejar les dades.', $e);
        }
    }

}
<?php

include_once($GLOBALS['dir'] . "/model/mUser.php");
include_once($GLOBALS['dir']."/controller/ErrorController.php");

class UserControllerAjax
{
    private $mUser;

    private $error;

    function __construct()
    {
        $this->error = new ErrorController();
        try {
            $this->mUser = new mUser();
        }catch(Exception $e){
            $this->error->throwException('526', 'No s`ha pogut crear la classe.', $e);
        }
    }

    // Rrtorna un usuari.
    function get_User()
    {
        try {
            return $this->mUser;
        }catch(Exception $e){
            $this->error->throwException('326', 'No s`ha pogut trobar l`usuari', $e);
        }
    }

    // Busca un usuari segons les dades rebudes d'un formulari.
    function find_User()
    {
        try {
            $infoUser = [
                'EMAIL' => $this->cleanInput($_POST['EMAIL'], 1),
                'PASSWORD' => $this->cleanInput($_POST['PASSWORD'], 3)
            ];

            $result = $this->mUser->findUser($infoUser['EMAIL']);
            $init = password_verify($infoUser['PASSWORD'], $result['PASSWORD']);
            if ($init) {
                $_SESSION['LOGIN'] = [
                    'EMAIL' => $infoUser['EMAIL'],
                    'INIT' => $init,
                    'ADMIN' => $result['TYPE']
                ];
            }
            return $init;
        }catch(Excepttion $e){
            $this->error->throwException('327', 'No s`ha pogut trobar l`usuari.', $e);
        }
    }

    //Crea un usuari segons les dades rebudes d'un formulari.
    function create_User()
    {
        try {
            include_once($GLOBALS['dir'] . "/resources/upFileUser.php");
            if ($_POST) {
                $infoUser = [

                    'NAME' => $this->cleanInput($_POST['NAME'], 0),
                    'EMAIL' => $this->cleanInput($_POST['EMAIL'], 1),
                    'ADDRESS' => $this->cleanInput($_POST['ADDRESS'], 0),
                    'TOWN' => $this->cleanInput($_POST['TOWN'], 0),
                    'CP' => $this->cleanInput($_POST['CP'], 0),
                    'PASSWORD' => password_hash($this->cleanInput($_POST['PASSWORD'], 3), PASSWORD_DEFAULT),
                    'IMAGE' => $directory
                ];
            }


            return ($this->mUser->createUser($infoUser));
        }catch(Exception $e){
            $this->error->throwException('328', 'No s`ha pogut crear l`usuari', $e);
        }

    }

    //S'encarrega de netejar de dades (Validació per part del servidor)
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
                    $error = filter_var($infoUser, FILTER_SANITIZE_NUMBER_INT);
                    $error = filter_var($error, FILTER_VALIDATE_INT);
                    break;

                case 3:
                    $error = filter_var($infoUser, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $error = filter_var($error, FILTER_DEFAULT);
                    break;


            }
            return $error;
        }catch(Exception $e){
            $this->error->throwException('329', 'No s`ha pogut assegurar que les dades  s`hagin introduit bé.', $e);
        }
    }


}
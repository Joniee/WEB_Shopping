<?php

include_once($GLOBALS['dir'] . "/model/mUser.php");

class UserControllerAjax
{
    private $mUser;


    function __construct()
    {
        $this->mUser = new mUser();
    }

    function get_User()
    {
        return $this->mUser;
    }

    function find_User()
    {
        $infoUser = [
            'EMAIL' => $this->cleanInput($_POST['EMAIL'], 1),
            'PASSWORD' => $this->cleanInput($_POST['PASSWORD'], 3)
        ];

        $result = $this->mUser->findUser($infoUser['EMAIL']);
        $init = password_verify($infoUser['PASSWORD'], $result['PASSWORD']);
        if($init) {
            $_SESSION['LOGIN'] = [
                'EMAIL' => $infoUser['EMAIL'],
                'INIT' => $init,
                'ADMIN' => $result['TYPE']
            ];
        }
        return $init;
    }

    function create_User()
    {
        include_once($GLOBALS['dir'] . "/resources/upFileUser.php");
        if($_POST){
            $infoUser = [

                'NAME' => $this->cleanInput($_POST['NAME'], 0),
                'EMAIL' => $this->cleanInput($_POST['EMAIL'], 1),
                'ADDRESS' => $this->cleanInput($_POST['ADDRESS'], 0),
                'TOWN' => $this->cleanInput($_POST['TOWN'], 0),
                'CP' => $this->cleanInput($_POST['CP'], 0),
                'PASSWORD' => password_hash($this->cleanInput($_POST['PASSWORD'], 3), PASSWORD_DEFAULT),
                'IMAGE' => $target_file
            ];
        }


        return ($this->mUser->createUser($infoUser));

    }

    //$type:0-char 1-email 2-cp 3-password
    function cleanInput($infoUser, $type)
    {
        switch($type)
        {
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

    }


}
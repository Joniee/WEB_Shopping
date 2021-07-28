<?php

include_once($GLOBALS['dir']."/model/mDestacats.php");
include_once($GLOBALS['dir']."/controller/ErrorController.php");


class DestacatsController
{
    private $mDestacats;

    private $error;

    function __construct()
    {
        $this->error = new ErrorController();
        try {
            $this->mDestacats = new mDestacats();
        }catch(Exception $e){
            $this->error->throwException('512', 'No s`ha creat la classe.', $e);
        }
    }

    // Carrega la vista  amb les seves dades pertinents
    function getVista()
    {   try {
            $resultats = $this->mDestacats->get_All();
            include_once($GLOBALS['dir'] . "/vistes/destacats.php");
        }
        catch(Exception $e){
            $this->error->thowException('305', 'No s`ha pogut carregat dades i vista');
        }
    }
}
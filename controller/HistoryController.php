<?php
include_once($GLOBALS['dir'] . "/model/mKart.php");
include_once($GLOBALS['dir'] . "/controller/ErrorController.php");

class HistoryController
{

    private $mKart;

    private $error;

    function __construct()
    {
        $this->error = new ErrorController();
        try {
            $this->mKart = new mKart();
        }catch(Exception $e){
            $this->error->throwException('514', 'No s`ha pogut crear la clase.', $e);
        }
    }

    // Crida la vista amb les dades corresponents
    function getVista()
    {
        try {
            $resultatsKart = $this->mKart->get_All();
            $dades = array();
            foreach ($resultatsKart as $item) {
                $dades[$item['ID']] = $this->mKart->getKartInfo($item['ID']);
            }
            include_once($GLOBALS['dir'] . "/vistes/history.php");
        }catch(Exception $e){
            $this->error->throwException('307', 'No s`ha pogut crear la vista.', $e);
        }
    }
}
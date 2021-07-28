<?php

include_once($GLOBALS['dir']."/controller/ErrorController.php");


class mBD
{
    private $con;

    private $error;

    function __construct()
    {
        $this->error = new ErrorController();
        try{
            $this->con = new PDO('mysql:host=127.0.0.1;dbname=tdiwh11;port=3306;charset=utf8mb4', 'tdiw-h11', 'bs-2ir-F');
        }
        catch(Exception $e)
        {
            $this->error->throwException('100', 'Failed creating connection with BD', $e);
        }

    }

    function get_conection()
    {
        try {
            return $this->con;
        }catch(Exception $e){
            $this->error->throwException('607', 'Get Connection not found', $e);
        }
    }


}
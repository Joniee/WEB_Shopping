

<?php

class Resource
{
    private $pages;


    function __constructor()
    {
    }
    function loadPage($vistes = ['Layout', 'Navigator', 'Search'])
    {
        foreach($vistes as $load)
        {
            include_once($GLOBALS['dir'] . '/controller/' . $load . "Controller.php");
            $controller = $load . 'Controller';
            if(isset($_GET['id'])){
                $this->pages[$load] = new $controller($_GET['id']);
                $this->pages[$load]->getVista();
            }
            else{
                $this->pages[$load] = new $controller();
                $this->pages[$load]->getVista();
            }


        }
    }

}
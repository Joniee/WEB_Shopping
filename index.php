<?php
session_start();
$dir = __DIR__;
include_once(__DIR__.'/resources/router.php');
/*
$_SESSION['LOGIN'] = [
    'EMAIL' => 'null@null.com',
    'INIT' => 0,
    'ADMIN' => 0
];*/

if(!(isset($_SESSION['LOGIN']))){
    $_SESSION['LOGIN'] = [
        'EMAIL' => 'null@null.com',
        'INIT' => 0,
        'ADMIN' => 0
    ];
}
$rsc = new Resource();

if($_SESSION['LOGIN']['INIT'] == 1 && !isset($_SESSION['ID_KART']))
{
    include_once ($dir . "/resources/checkKart.php");
}

if(isset($_GET['p'])){
    switch($_GET['p']){
            //Case LogOut
        case '11':
            include($dir . "/resources/logout.php");
            break;
            //Case LogOut que no funciona
        case '12':
            $rsc->loadPage("Destacats");
            //Case Vista Iniciar sessió / Adminstrar dades
        case '21':
            $rsc->loadPage(["Init", "User"]);
            break;

            //Case Vista Registrar-se
        case '22':
            $rsc->loadPage(["Init", "SignUp"]);
            break;

            //Case Resource Iniciar Sessió
        case '23':
            include_once($dir . "/resources/login.php");
            break;

            //Case Resource Actualitzar dades
        case '24':
            include_once($dir . "/resources/updateUser.php");
            break;

            //Case Resource Registrar-se
        case '25':
            include_once($dir . "/resources/signUp.php");
            break;

            //Case Vista Iniciar Sessió from Article
        case '26':
            $rsc->loadPage(["Layout", "Navigator", "Init", "User", "Kart"]);
            break;

            //Case Llista de comandes
        case '31':
            $rsc->loadPage(["History", "Kart"]);
            break;
            //Case Categories
        case '41':
            $rsc->loadPage(["Category", "Kart"]);
            break;
            //Case Productes
        case '42':
            $rsc->loadPage(["Productes", "Kart"]);
            break;
            //Case Producte
        case '43':
            $rsc->loadPage(["Product", "Kart"]);
            break;
            //Case Administrador Afegir Producte
        case '51':
            $rsc->loadPage(["Admin"]);
            break;
            //Case Administrador Actualitzar Producte
        case '52':
            $rsc->loadPage(["Admin"]);
            break;
            //Case Adminsitrador Llistar Compres
        case '53':
            $rsc->loadPage(["Admin"]);
            break;
            //Case Administrador Llistar Usuaris
        case '54':
            $rsc->loadPage(["Admin"]);
            break;
            //Case Adminsitrador Llistar Productes
        case '55':
            $rsc->loadPage(["Admin"]);
            break;
            //Case Resource upFileProduct
        case '56':
            include_once($dir . "/resources/newProduct.php");
            //Case Destacats
        case '61':
            $rsc->loadPage(["Destacats", "Kart"]);
            break;
            //Case Recurs AddToKart
        case '71':
            include_once($dir . "/resources/addToKart.php");
            break;
            //Case Resource Delete a Product
        case '72':
            include_once($dir . "/resources/deleteFromKart.php");
            break;
            //Case Vista ToPay
        case '73':
            $rsc->loadPage(['Layout', 'Navigator', 'Search', 'Init', 'ToPay']);
            break;
            //Case Resource Process Kart
        case '74':
            include_once($dir . "/resources/processKart.php") ;
            break;
            //Case Delete All predocuts from Kart
        case '75':
            include_once($dir . "/resources/deleteAllKart.php");
            break;
            //Case Resource Upload Kart
        case '76':
            include_once($dir . "/resources/uploadKart.php");
            break;
            //Case Resource Download Kart
        case '77':
            include_once($dir . "/resources/downloadKart.php");
            break;
            //Case Resource uploadKart
        case '78':
            include_once($dir . "/resources/uploadKart.php");
            break;
            //Case Cercador
        case '81':
            $rsc->loadPage(['Layout', 'Navigator', 'Search', 'Init', 'FindProduct']);
            break;


    }
}
else{
    $rsc->loadPage(["Layout", "Navigator", "Search", "Init", "Destacats", "Kart"]);
}





<?php
include_once($GLOBALS['dir'] . "/controller/UserControllerAjax.php");
$newUser = new UserControllerAjax;

$result = $newUser->find_User();
if($result){
    echo "<script>
        alert('Has iniciat sessió');
        window.location = 'http://tdiw-h11.deic-docencia.uab.cat';
    </script>";
    }else{
    echo "<script>
        alert('Sessió no iniciada, dades errònies.');
        window.location = 'http://tdiw-h11.deic-docencia.uab.cat?p=21';
    </script>";
}



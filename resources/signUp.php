<?php
include_once($GLOBALS['dir'] . "/controller/UserControllerAjax.php");
$newUser = new UserControllerAjax;
$result = $newUser->create_User();
if($result){
?>
    Usuari nou creat.
    <a href="http://tdiw-h11.deic-docencia.uab.cat/">Continua...</a>

<?php }else{
    ?>
    Ja existeix un compte associat a aquest Email. Torna-ho a intentar.
    <a href="http://tdiw-h11.deic-docencia.uab.cat/">Continua...</a>
<?php
}


<?php
include_once($GLOBALS['dir'] . "/controller/UserDataController.php");
$newUser = new UserDataController;
$result = $newUser->update_User();
if($result){
    ?>
    Usuari actualitzat.
    <a href="http://tdiw-h11.deic-docencia.uab.cat/">Continua...</a>

<?php }else{
    ?>
    Error en actualitzar les dades.
    <a href="http://tdiw-h11.deic-docencia.uab.cat/">Continua...</a>
    <?php
}

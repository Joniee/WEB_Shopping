<?php
?>
<link rel="stylesheet" type="text/css" href="../styles/login.css">

<div class="login">
    <div class="titollogin">
        Apartat Administració: Afegir producte nou.
    </div>
    <div>
        <form class="admin-flex-container" method="post" action="../index.php?p=56" enctype="multipart/form-data">
            <input type="text" name="NAME" placeholder="Nom del producte" max-length="50" required>
            <div class="titollogin">Selecciona una categoria al qual s'asignarà al producte:</div>
            <select class="admin-content-radio-input" name="CATEGORY">
                <option value="1">HOME</option>
                <option value="2">DONA</option>
                <option value="3" selected>UNISEX</option>
            </select>
            <input type="text" name="DESCS" placeholder="Descripció curta" required>
            <input type="text" name="DESCL" placeholder="Descripció llarga" required>
            <input type="text" name="PRICE" placeholder="0.00" required>
            <input type="number" name="QUANTITY" placeholder="1" required>
            <input class="submitlogin" type="file" name="fileToUpload" id="fileToUpload" required>
            <input class="submitlogin" type="submit" value="Registrar nou producte">
        </form>
    </div>
</div>

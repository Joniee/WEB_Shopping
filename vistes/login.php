
<?php

?>
<link rel="stylesheet" type="text/css" href="../styles/login.css">
<script>
    function validateForm() {
        alert("Comprovant dades");
        var x = document.forms["login"]["PASSWORD"].value;
        if (x == "") {
            alert("No has introduït cap contrasenya");
            return false;
            }

            var y = document.forms["login"]["EMAIL"].value;
            if (y == "") {
                alert("No has introduït cap email");
                return false;
            }
        }
</script>

<?php if(isset($_SESSION['LOGIN']) && !($_SESSION['LOGIN']['INIT'] == 1)){ ?>
<section class="login">
    <div class="Inici">
        <div class="titollogin">Iniciar sessió.
            <form name="login" method="POST" action="../index.php?p=23" onsubmit="return validateForm();">
                <input type="email" name="EMAIL" placeholder="Correu electrònic" max-length="30" autofocus required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"><br>
                <input type="password" name="PASSWORD" placeholder="Contrasenya" max-length="18" title="Ha de contenir entre 4 i 18 caràcters, amb almenys un número, una lletra minúscula i una lletra majúscula." pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 3}$" ><br>
                <input class ="submitlogin" type="submit" name="Iniciar sessió" value="Iniciar sessió"><input class="submitlogin" type="reset" name="Netejar"<br>
            </form>
        </div>
    </div>
    <div>
        Ets nou? <button class="submitlogin" onclick="canviPag('22')">Registra't </button>.
    </div>
</section>
<?php }
else {
    ?>
<section>
    <div class="login-content-title">Tens alguna dada errònia? Pots canviar-la ara mateix.</div>
    <div class="login-flex-container">
        <div>
            <img class="login-content-img" src="<?php echo $datosUser['IMAGE'] ?>">
        </div>
        <div class="login">
            <form method="POST" action="../index.php?p=24" enctype="multipart/form-data">
                <input type="name" name="NAME" value=<?php echo $datosUser['NAME']?> max-length="50" required pattern="[a-zA-Z\s]{3,50}"><br>
                <input type="text" name="ADDRESS" value=<?php echo $datosUser['ADDRESS']?> max-length="50" required pattern="[A-Za-z0-9\s]{3,50}"><br>
                <input type="text" name="TOWN" value="<?php print_r($datosUser['TOWN']);?>" max-length="50" required pattern="[a-zA-z0-9\s]{3,50}"><br>
                <input type="text" name="CP" value=<?php echo $datosUser['CP']?> max-length="5" required pattern="\d{5}$" title="Ha de contenir 5 números"><br>
                <input type="password" name="OLDPASSWORD" placeholder="Antiga contrasenya" max-length="18" required title="Ha de contenir entre 4 i 18 caràcters, amb almenys un número, una lletra minúscula i una lletra majúscula." pattern="{4,18}(?=.*\d)(?=.*[a-z])(?=.*[A-Z])"><br>
                <input type="password" name="NEWPASSWORD" placeholder="Nova contrasenya" max-length="18" required title="Ha de contenir entre 4 i 18 caràcters, amb almenys un número, una lletra minúscula i una lletra majúscula." pattern="{4,18}(?=.*\d)(?=.*[a-z])(?=.*[A-Z])"><br>
                <input type="password" name="NEWREPPASSWORD" placeholder="Repeteix la nova contrasenya" max-length="18" requiredtitle="Ha de contenir entre 4 i 18 caràcters, amb almenys un número, una lletra minúscula i una lletra majúscula." pattern="{4,18}(?=.*\d)(?=.*[a-z])(?=.*[A-Z])"><br>
                <input class="submitlogin" type="file" name="fileToUpload" id="fileToUpload" required><br>
                <input class="submitlogin" type="submit" name="Actualitzar dades" value="Actualitzar dades">
            </form>
        </div>
    </div>
</section>
<?php
}?>
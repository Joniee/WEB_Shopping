
<?php
?>
<head>
    <link rel="stylesheet" type="text/css" href="../styles/login.css">
</head>
<section>
    <div class="Registrar">
        <div class="titolregistrar">Registra't com a nou usuari!</div>
        <div>
            <form method="POST" onsubmit="" action="../index.php?p=25" enctype="multipart/form-data">
                <input type="name" name="NAME" placeholder="Nom complet" max-length="50" required pattern="[a-zA-Z\s]{3,50}"><br>
                <input type="text" name="ADDRESS" placeholder="Adreça" max-length="30" required pattern="[A-Za-z0-9\s]{3,50}"><br>
                <input type="text" name="TOWN" placeholder="Població" max-length="30" required pattern="[a-zA-z0-9\s]{3,50}"><br>
                <input type="text" name="CP" placeholder="Codi Postal" max-length="5" required pattern="\d{5}$" title="Ha de contenir 5 números"><br>
                <input type="email" name="EMAIL" placeholder="Correu electrònic" max-length="30" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"><br>
                <input type="password" name="PASSWORD" placeholder="Contrasenya" max-length="18" required title="Ha de contenir entre 4 i 18 caràcters, amb almenys un número, una lletra minúscula i una lletra majúscula." pattern="{4,18}(?=.*\d)(?=.*[a-z])(?=.*[A-Z])"><br>
                <input type="password" name="REPPASSWORD" placeholder="Repeteix la contrasenya" max-length="18" required title="Ha de contenir entre 4 i 18 caràcters, amb almenys un número, una lletra minúscula i una lletra majúscula." pattern="{4,18}(?=.*\d)(?=.*[a-z])(?=.*[A-Z])"><br>
                <h2>Inclou una imatge de perfil</h2><input class="submitlogin" type="file" name="fileToUpload" id="fileToUpload"><br>
                <input class="submitlogin" type="submit" name="Registrar-se" value="Registrar-se"><input class="submitlogin" type="reset" name="Netejar" value="Netejar">
            </form>
        </div>
    </div>
</section>

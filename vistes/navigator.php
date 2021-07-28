<head>
    <script src="https://kit.fontawesome.com/806d0e733c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../styles/navigator.css">
    <script src="../scripts/barra1.js"></script>
</head>

<section>
    <table id="navegador">
        <tr>
            <?php if(isset($_SESSION['LOGIN']) && !($_SESSION['LOGIN']['INIT'] == 1)){ ?>
            <th class="dropdown" onclick="return canviPag('21')"><i class="far fa-user"><p class="dropdown-nav">Iniciar Sessió</p></i></th>
            <?php }else{ ?>
            <th class="dropdown" onclick="return logout()"><i class="fas fa-sign-out-alt"><p class="dropdown-nav">Tancar sessió</p></i></th>
            <th class="dropdown" onclick="return canviPag('21')"><i class="fas fa-user"><p class="dropdown-nav">Les meves dades</p></i></th>
            <th class="dropdown" onclick="return canviPag('31')"><i class="fas fa-shopping-cart"><p class="dropdown-nav">Historial de compres</p></i></th>
            <?php }?>
            <th class="dropdown" onclick="return canviPag('41')"><i class="fas fa-th-list"><p class="dropdown-nav">Categories</p></i></th>
            <th class="dropdown" onclick="return canviPag('61')"><i class="fas fa-grin-stars"><p class="dropdown-nav">Destacats</p></i></th>
            <?php if($_SESSION['LOGIN']['ADMIN'] == 1){ ?>
            <th class="dropdown" onclick="return canviPag('51')"><i class="fas fa-user-tie"><p class="dropdown-nav">Administrador</p></i></th>
            <?php } ?>
        </tr>
    </table>
</section>

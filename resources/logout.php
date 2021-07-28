<?php
session_start();
$_SESSION['LOGIN'] = [
    'EMAIL' => 'null@null.com',
    'INIT' => 0,
    'ADMIN' => 0
    ];

?>

<table id="navegador">
        <tr>
            <th class="dropdown" onclick="return canviPag('21')"><i class="far fa-user"><p class="dropdown-nav">Iniciar Sessió</p></i></th>
            <th class="dropdown" onclick="return canviPag('41')"><i class="fas fa-th-list"><p class="dropdown-nav">Categories</p></i></th>
            <th class="dropdown" onclick="return canviPag('61')"><i class="fas fa-grin-stars"><p class="dropdown-nav">Destacats</p></i></th>
        </tr>
</table>

<?php
?>
<link rel="stylesheet" type="text/css" href="../styles/history.css">
<div class="history-flex-container">
    <div>
        <div class="history-title">Llista d'usuaris</div>
    </div>
    <div class="admin-content-data">
    <div class="admin-flex-container">
        <div class="admin-content-title">Id</div>
        <div class="admin-content-title">Nom</div>
        <div class="admin-content-title">Email</div>
    </div>
    </div>
    <?php foreach($dades as $users){?>
    <div class="admin-content-data">
        <div class="admin-flex-container">
            <div class="admin-content"><?php print_r ($users['ID']); ?></div>
            <div class="admin-content"><?php print_r ($users['NAME']); ?></div>
            <div class="admin-content"><?php print_r ($users['EMAIL']); ?></div>
        </div>
    </div>
    <?php } ?>
</div>

<head>
    <link rel="stylesheet" type="text/css" href="../styles/categoria.css">
</head>
<?php
?>
<div class="category-flex-container">
    <div class="category-title">
        CATEGORIES
    </div>
    <div >
        <div class="category-data-container">
        <?php foreach($list as $cat)
        { ?>
            <div class="categoria" onclick="return canviPagId('42', <?php print_r($cat['ID']);?>)">
                <div class="category-data-name"><?php print_r($cat['NAME']); ?></div>
                <div><img class="category-data-image" src="<?php print_r($cat['IMAGE']); ?>" onclick="return canviPagId('productes', <?php print_r($cat['ID']);?>)"></div>
            </div>
        <?php }?>

        </div>
    </div>
</div>


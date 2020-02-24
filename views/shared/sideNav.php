<?php
namespace app\models;
?>

<div class="sidenav">
    <?php foreach (Cat::find() as $overCat): ?>
        <div class="overCat <?php include 'fontColor.php'; ?>">
            <a href="index.php?c=product&a=products&cat=<?= $overCat['catID'] ?>"><?= $overCat['descrip']; ?></a>
        </div>
        <?php foreach (ProdCat::find('catID = "' . $overCat['catID'] . '"') as $rows): ?>
            <a href="index.php?c=product&a=products&prodCat=<?= $rows['prodCatID'] ?>"><?php echo $rows['descrip']; ?></a>
        <? endforeach; ?>
    <? endforeach; ?>
</div>

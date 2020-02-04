<?php
namespace app\models;
?>

<div class="sidenav">
    <?php foreach (Cat::find() as $overCat): ?>
        <div class="overCat <?php include 'fontColor.php';?>">
            <a href="index.php?c=product&a=products&type=<?=$_GET['type']?>&cat=<?= $overCat['catID'] ?>"   ><?= $overCat['descrip']; ?></a>
        </div>
        <?php foreach (ProdCat::find('catID = "' . $overCat['catID'] . '"') as $rows): ?>
            <a href="index.php?c=product&a=products&type=<?=$_GET['type']?>&prodCat=<?= $rows['prodCatID'] ?>"><?php echo $rows['descrip']; ?></a>
        <? endforeach; ?>
    <? endforeach; ?>
</div>

<?php
namespace app\models;
if (!isset($_GET['search']))
{
    if ($_GET['type'] == 'Jungs-Toys')
        $color = 'rgb(134, 14, 10)';
    elseif ($_GET['type'] == 'Konsolespiele' || isset($_GET['search']))
        $color = '#2dc2cf';
    else
        $color = '#f1ac2c';
}
else
    $color = '#f1ac2c'; ?>

<div class="sidenav">
    <?php foreach (Cat::find() as $overCat): ?>
        <div class="overCat" >
            <a href="index.php?a=products&type=<?=$_GET['type']?>&cat=<?= $overCat['catID'] ?>" style="color:<?=$color ?>" ><?= $overCat['descrip']; ?></a>
        </div>
        <?php foreach (ProdCat::find('catID = "' . $overCat['catID'] . '"') as $rows): ?>
            <a href="index.php?a=products&type=<?=$_GET['type']?>&prodCat=<?= $rows['prodCatID'] ?>"><?php echo $rows['descrip']; ?></a>
        <? endforeach; ?>
    <? endforeach; ?>
</div>

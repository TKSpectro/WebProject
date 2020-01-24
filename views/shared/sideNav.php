<?php
namespace app\models;
?>

<div class="sidenav">
    <?php foreach (Cat::find() as $overCat): ?>
        <div class="overCat <? if (!isset($_GET['search']))
                    {if ($_GET['type'] == 'Jungs-Toys'){?>jungeColor<?}
                    elseif ($_GET['type'] == 'Konsolespiele' || isset($_GET['search']))
                    {?>konsoleColor<?}
                    else
                    {?>mädchenColor<?}
                }else
                   {?>mädchenColor<?}?>">
            <a href="index.php?a=products&type=<?=$_GET['type']?>&cat=<?= $overCat['catID'] ?>"   ><?= $overCat['descrip']; ?></a>
        </div>
        <?php foreach (ProdCat::find('catID = "' . $overCat['catID'] . '"') as $rows): ?>
            <a href="index.php?a=products&type=<?=$_GET['type']?>&prodCat=<?= $rows['prodCatID'] ?>"><?php echo $rows['descrip']; ?></a>
        <? endforeach; ?>
    <? endforeach; ?>
</div>

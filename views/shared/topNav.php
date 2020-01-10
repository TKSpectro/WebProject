<?php
namespace app\models;
?>
<nav>
    <ul class="navbar">
        <li class="subnav">
            <button class="subnavbtn"><a href="index.php?a=products&type=Jungs-Toys"><img src="assets/images/boyIcon.png" alt="Jungen Bild"></a>Jungen</button>
            <ul class="subnav-content">
                <? foreach (Cat::find('type = "boy" OR type ="both"') as $Cat)
                {
                    ?>
                    <li><a href="index.php?a=products&type=Jungs-Toys&cat=<?= $Cat['catID'] ?>">
                            <?= $Cat['descrip']; ?></a></li>
                <? } ?>
            </ul>
        </li>
        <li class="subnav">
            <button class="subnavbtn"><a href="index.php?a=products&type=Konsolespiele"><img src="assets/images/controllerIcon.png" alt="Konsolen Bild"></a>Konsolen</button>
            <ul class="subnav-content">
                <? foreach (Cat::find('type = "console"') as $Cat)
                {
                    ?>
                    <li><a href="index.php?a=products&type=Konsolespiele&cat=<?= $Cat['catID'] ?>">
                            <?= $Cat['descrip']; ?></a></li>
                <? } ?>
            </ul>
        </li>
        <li class="subnav">
            <button class="subnavbtn"><a href="index.php?a=products&type=Mädchen-Toys"><img src="assets/images/iconGirl.png" alt="Mädchen Bild"></a>Mädchen</button>
            <ul class="subnav-content">
                <? foreach (Cat::find('type = "girl" OR type ="both"') as $Cat)
                {
                    ?>
                    <li><a href="index.php?a=products&type=Mädchen-Toys&cat=<?= $Cat['catID'] ?>">
                            <?= $Cat['descrip']; ?></a></li>
                <? } ?>

            </ul>
        </li>
        <li class="subnav">
            <button class="subnavbtn"><img src="assets/images/aboutIcon.png" alt="Über uns Bild">Über Uns</button>
        </li>
    </ul>
</nav>
   
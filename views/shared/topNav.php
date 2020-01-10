<?php
namespace app\models;
?>
<nav>
    <ul class="navbar">
        <li class="subnav" id="test">
            <a href="index.php?a=products&type=Jungs-Toys" class="subnavbtn"><img src="assets/images/boyIcon.png" alt="Jungen Bild"></a><div id="topNavBoy">Jungen</div>
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
            <a href="index.php?a=products&type=Konsolespiele" class="subnavbtn"><img src="assets/images/controllerIcon.png" alt="Konsolen Bild"></a><div id="topNavKonsole">Konsolen</div>
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
            <a href="index.php?a=products&type=Mädchen-Toys" class="subnavbtn"><img src="assets/images/iconGirl.png" alt="Mädchen Bild"></a><div id="topNavGirl"> Mädchen</div>
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
            <a href="" class="subnavbtn"><img src="assets/images/aboutIcon.png" alt="Über uns Bild"></a><div id="topNavInfo">Über Uns</div>
        </li>
    </ul>
</nav>
   
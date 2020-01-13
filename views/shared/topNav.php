<?php
namespace app\models;
?>
<nav>
    <ul class="navbar">
        <li class="subnav paddLeft">
            <div class="width <? if($_GET['type'] == "Jungs-Toys"){?>activeBoy<?}?>">
            <a href="index.php?a=products&type=Jungs-Toys" class="subnavbtn"><img src="assets/images/boyIcon.png"
                                                                                  alt="Jungen Bild">
                <div class="topNavBoy" >Jungen</div>
            </a>
            <ul class="subnav-content">
                <? foreach (Cat::find('type = "boy" OR type ="both"') as $Cat)
                {
                    ?>
                    <li><a class="topNavBoy" href="index.php?a=products&type=Jungs-Toys&cat=<?= $Cat['catID'] ?>">
                            <?= $Cat['descrip']; ?></a></li>
                <? } ?>
            </ul></div>
        </li>
        <li class="subnav">
        <div class="width <? if($_GET['type'] == "Konsolespiele"){?>activeKonsole<?}?>">
            <a href="index.php?a=products&type=Konsolespiele" class="subnavbtn"><img
                        src="assets/images/controllerIcon.png" alt="Konsolen Bild">
                <div class="topNavConsole ">Konsolen</div>
            </a>
            <ul class="subnav-content">
                <? foreach (Cat::find('type = "console"') as $Cat)
                {
                    ?>
                    <li><a class="topNavConsole"
                           href="index.php?a=products&type=Konsolespiele&cat=<?= $Cat['catID'] ?>">
                            <?= $Cat['descrip']; ?></a></li>
                <? } ?>
            </ul></div>
        </li>
        <li class="subnav">
        <div class="width <? if($_GET['type'] == "Mädchen-Toys"){?>activeGirl<?}?>">
            <a href="index.php?a=products&type=Mädchen-Toys" class="subnavbtn"><img src="assets/images/iconGirl.png"
                                                                                    alt="Mädchen Bild">
                <div class="topNavGirl">Mädchen</div>
            </a>
            <ul class="subnav-content">
                <? foreach (Cat::find('type = "girl" OR type ="both"') as $Cat)
                {
                    ?>
                    <li><a class="topNavGirl" href="index.php?a=products&type=Mädchen-Toys&cat=<?= $Cat['catID'] ?>">
                            <?= $Cat['descrip']; ?></a></li>
                <? } ?>
            </ul></div>
        </li>
        <li class="subnav">
        <div class="width">
            <a href="index.php?a=aboutUs" class="subnavbtn"><img src="assets/images/aboutIcon.png" alt="Über uns Bild">
                <div class="topNavAbout">Über Uns</div>
            </a>
        </li> </div>
    </ul>
</nav>

   
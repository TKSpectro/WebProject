<?php
namespace app\models;
?>
<nav>
    <ul class="navbar ">
        <li class="subnav">
            <div class=" <? if ($_GET['type'] == "Jungs-Toys") { ?>activeBoy<? } ?>">
                <a href="index.php?c=product&a=products&type=Jungs-Toys" class="subnavbtn">
                    <div class="topNavBoy <? if ($_GET['type'] == "Jungs-Toys") { ?>selected<? } ?>">
                        <img src="assets/images/boyIcon.png" alt="Jungen Bild">Jungen
                    </div>
                </a>
                <ul class="subnav-content">
                    <? foreach (Cat::find('type = "boy" OR type ="both"') as $Cat)
                    {
                        ?>
                        <li class="topNavList"><a class="topNavBoy"
                                                  href="index.php?c=product&a=products&type=Jungs-Toys&cat=<?= $Cat['catID'] ?>">
                                <?= $Cat['descrip']; ?></a></li>
                    <? } ?>
                </ul>
            </div>
        </li>
        <li class="subnav">
            <div class=" <? if ($_GET['type'] == "Konsolespiele") { ?>activeKonsole<? } ?>">
                <a href="index.php?c=product&a=products&type=Konsolespiele" class="subnavbtn">
                    <div class="topNavConsole "><img id="consoleImage" src="assets/images/controllerIcon.png"
                                                     alt="Konsolen Bild"> Konsolen
                    </div>

                </a>
                <ul class="subnav-content">
                    <? foreach (Cat::find('type = "console"') as $Cat) { ?>
                        <li class="topNavList"><a class="topNavConsole"
                                                  href="index.php?c=product&a=products&type=Konsolespiele&cat=<?= $Cat['catID'] ?>">
                                <?= $Cat['descrip']; ?></a></li>
                    <? } ?>
                </ul>
            </div>
        </li>

        <li class="subnav">
            <div class=" <? if ($_GET['type'] == "Mädchen-Toys") { ?>activeGirl<? } ?>">
                <a href="index.php?c=product&a=products&type=Mädchen-Toys" class="subnavbtn">
                    <div class="topNavGirl"><img id="girlImage" src="assets/images/iconGirl.png" alt="Mädchen Bild">Mädchen
                    </div>
                </a>
                <ul class="subnav-content">
                    <? foreach (Cat::find('type = "girl" OR type ="both"') as $Cat) { ?>
                        <li class="topNavList"><a class="topNavGirl"
                                                  href="index.php?c=product&a=products&type=Mädchen-Toys&cat=<?= $Cat['catID'] ?>"><?= $Cat['descrip']; ?></a>
                        </li>
                    <? } ?>
                </ul>
            </div>
        </li>
        <li class="subnav">
            <div class=" <? if ($_GET['a'] == "aboutUs") { ?>activeAboutUs<? } ?>">
                <a href="index.php?a=aboutUs" class="subnavbtn">
                    <div class="topNavAbout"><img src="assets/images/aboutIcon2.png" alt="Über uns Bild">Über Uns</div>
                </a>
        </li>
        </div>
    </ul>
</nav>

   
<?php
namespace app\models;
?>

<div class="navbar">
    <div class="subnav">
        <button class="subnavbtn"><img src="assets/images/boyIcon.png" alt="Jungen Bild">Jungen</button>
        <div class="subnav-content">
            <? foreach (Cat::find('type = "boy" OR type ="both"') as $boyCats)
            {
                ?>
                <a href=""><?= $boyCats['descrip']; ?></a>
            <? } ?>
        </div>
    </div>
    <div class="subnav">
        <button class="subnavbtn"><img src="assets/images/controllerIcon.png" alt="Konsolen Bild">Konsolen</button>
        <div class="subnav-content">
            <? foreach (Cat::find('type = "console"') as $consoleCats)
            {
                ?>
                <a href=""><?= $consoleCats['descrip']; ?></a>
            <? } ?>
        </div>
    </div>
    <div class="subnav">
        <button class="subnavbtn"><img src="assets/images/iconGirl.png" alt="Mädchen Bild">Mädchen</button>
        <div class="subnav-content">
            <? foreach (Cat::find('type = "girl" OR type ="both"') as $girlCats)
            {
                ?>
                <a href=""><?= $girlCats['descrip']; ?></a>
            <? } ?>

        </div>
    </div>
    <div class="subnav">
        <button class="subnavbtn"><img src="assets/images/aboutIcon.png" alt="Über uns Bild">Über Uns</button>
    </div>
</div>


<!--<nav class="topNav">
    <ul>

        <li>
            <a href="index.php?a=products&type=Jungs-Toys">
                <figure class="single">
                    <img src="assets/images/boyIcon.png" alt="Jungen Bild">
                    <figcaption id="junge">JUNGEN</figcaption>
                </figure>
            </a>
        </li>
        <li>
            <a href="index.php?a=products&type=Konsolespiele">
                <figure class="single">
                    <img src="assets/images/iconController.png" alt="Konsolen Bild">
                    <figcaption id="konsole">KONSOLEN</figcaption>
                </figure>
            </a>
        </li>
        <li>
            <a href="index.php?a=products&type=Mädchen-Toys">
                <figure class="single">
                    <img src="assets/images/iconGirl.png" alt="Mädchen Bild">
                    <figcaption id="mädchen">MÄDCHEN</figcaption>
                </figure>
            </a>
        </li>


        <li>
            <a href="index.php?a=index">
                <figure class="single">
                    <img src="assets/images/aboutIcon.png" alt="Über uns Bild">
                    <figcaption id="überUns">ÜBER UNS</figcaption>
                </figure>
            </a>
        </li>
    </ul>
</nav>-->

   
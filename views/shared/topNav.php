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
   
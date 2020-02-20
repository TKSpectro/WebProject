<?php
namespace app\models;

//copy of $_GET for building new queries
$query = $_GET;
?>

<div class="productList" >
    <ul>
    <form method="get" class="priceFilter" >
            
        <input type="hidden" value="product" name="c">
        <input type="hidden" value="products" name="a">
        <? if (isset($_GET['type'])) { ?><input type="hidden" value="<?= $_GET['type'] ?>"
                                                name="type"><? } ?>
        <? if (isset($_GET['cat'])) { ?><input type="hidden" value="<?= $_GET['cat'] ?>"name="cat"><? } ?>
        <? if (isset($_GET['prodCat'])) { ?><input type="hidden" value="<?= $_GET['prodCat'] ?>"
                                                    name="prodcat"><? } ?>
        
            
            <span class="priceOrder"> <label class="<?php include __DIR__ . '/../shared/fontColor.php';?>" for="min" >Preis von</label>
            <input type="number" name="min" placeholder="min"></span>
            
            <span class="priceOrder"> <label class="<?php include __DIR__ . '/../shared/fontColor.php';?>" for="max">Bis</label>
            <input type="number" name="max" placeholder="max"></span>
            <input type="submit" style="display:none;" value="Bestätigen">
    </form>
            
                
            
        <li class="dropdownLi">
            <div class="dropdown">
                <button class="dropbtn">Sortierung</button>
                <div class="dropdown-content ">
                    <? if (isset($query['sortBy']))
                    {
                        unset($query['sortBy']);
                    } ?>
                    <a href="index.php?<?= http_build_query($query) ?>&sortBy=priceDesc">Preis: absteigend</a>
                    <a href="index.php?<?= http_build_query($query) ?>&sortBy=priceAsc">Preis: aufsteigend</a>
                    <a href="index.php?<?= http_build_query($query) ?>&sortBy=nameDesc">Name: absteigend</a>
                    <a href="index.php?<?= http_build_query($query) ?>&sortBy=nameAsc">Name: aufsteigend</a>
                </div>
            </div>
        </li>

        <?php

        if (isset($product))
        {
            foreach ($product as $prod)
            {
                include __DIR__ . '/../shared/productLook.php';
            }
        }
        ?>
    </ul>
</div>
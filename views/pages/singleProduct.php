<div class="singleProduct">
    <img id="imgZoom"  src="<?= $product[0]['photo'] ?>" onmousemove="zoomIn(event)" onmouseout="zoomOut()" alt="product">
    <ul class="productsInfo">
        <li><?= $product[0]['descrip'] ?></li>
        <li><?= $product[0]['stdPrice'] ?>€</li>
        <li><?= $product[0]['Info'] ?></li>
        <li>
            <iframe name="hiddenFrame" class="hide"></iframe>
            <form method="post" action="?c=shoppingcart&a=shoppingCart" target="hiddenFrame">
                <input type="hidden" name="prodID" value="<?= $product[0]['prodID'] ?>">
                <input type="hidden" name="quantity" value="1">
                <input class="btn" type="submit" name="addToShoppingCart" value="In den Warenkorb">
            </form>
        </li>
    </ul>
</div>
<div id="overlay" style="background-image:url('<?=$product[0]['photo']?>')" onmousemove="zoomIn(event)"></div>  
</div>
<div class="slideshow-container">
    <h2>Ähnliche Artikel</h2>
        <? foreach ($allProducts as $otherProduct)
        {
            ?>
            <div class="mySlides">
                <a href="index.php?a=singleProduct&prodID=<?= $otherProduct['prodID'] ?>">
                    <div class="textCentered"><img src="<?= $otherProduct['photo'] ?>">
                        <?= $otherProduct['descrip'] ?></div>
                </a>
            </div>
        <? } ?>
</div>
<br>

    



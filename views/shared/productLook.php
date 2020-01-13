<div class="column">
<li>
    <div class="card">
        <img src="<?= $prod['photo'] ?>" alt="produckt">
        <div class="prodInfo"><?= $prod['descrip'] ?></div>
        <div class="prodInfo"><?= $prod['stdPrice'] ?>€</div>
        <iframe name="hiddenFrame" class="hide"></iframe>
        <form method="post" action="?a=shoppingCart" target="hiddenFrame">
            <input type="hidden"    name="prodID" value="<?= $prod['prodID'] ?>">
            <input type="hidden"    name="quantity"  value="1">
            <input class="btn" type="submit"    name="addToShoppingCart" value="In den Warenkorb">
        </form>
    </div>
</li>
</div>

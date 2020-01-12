<div class="column">
<li>
    <div class="card">
        <img src="<?= $prod['photo'] ?>" alt="produckt">
        <p><?= $prod['descrip'] ?></p>
        <p><?= $prod['stdPrice'] ?>€</p>
        <iframe name="hiddenFrame" class="hide"></iframe>
        <form method="post" action="?a=shoppingCart" target="hiddenFrame">
            <input type="hidden"    name="prodID" value="<?= $prod['prodID'] ?>">
            <input type="hidden"    name="quantity"  value="1">
            <input type="submit"    name="addToShoppingCart" value="Add To ShoppingCart">
        </form>
    </div>
</li>
</div>
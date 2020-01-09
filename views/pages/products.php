<?php
namespace app\models;
$productCounter = 0;
?>
<div class="productList">
    <ul>
        <?php if (isset($_GET['cat']))
        {
            foreach (ProdCat::find('catID = "' . $_GET['cat'] . '"') as $prodCat)
            {
                foreach (Product::find('prodCatID = "' . $prodCat['prodCatID'] . '"') as $prod):?>
                    <div class="column">
                        <li>
                            <div class="card">
                                <img src="<?= $prod['photo'] ?>" alt="produckt">
                                <p><?= $prod['descrip'] ?></p>
                                <p><?= $prod['stdPrice'] ?>€</p>
                                <iframe name="hiddenFrame" class="hide"></iframe>
                            <form method="post" action="?a=shoppingCart" target="hiddenFrame">
                                <input type="hidden" name="prodID" value="<?= $prod['prodID'] ?>">
                                <input type="submit" name="addToShoppingCart" value="Add To ShoppingCart">
                            </form>
                            </div>
                        </li>
                    </div>
                <? endforeach;
            } ?>
        <?php }
        elseif (isset($_GET['prodCat']))
        {
            foreach (Product::find('prodCatID = "' . $_GET['prodCat'] . '"') as $prod):?>
                <div class="column">
                    <li>
                        <div class="card">
                            <img src="<?= $prod['photo'] ?>" alt="produckt">
                            <p><?= $prod['descrip'] ?></p>
                            <p><?= $prod['stdPrice'] ?>€</p>
                            <iframe name="hiddenFrame" class="hide"></iframe>
                            <form method="post" action="?a=shoppingCart" target="hiddenFrame">
                                <input type="hidden" name="prodID" value="<?= $prod['prodID'] ?>">
                                <input type="submit" name="addToShoppingCart" value="Add To ShoppingCart">
                            </form>
                        </div>
                    </li>
                </div>
            <? endforeach; ?>
        <?php }
        else
        {
            foreach ($product as $prod): ?>
                <div class="column">
                    <li>
                        <div class="card">
                            <img src="<?= $prod['photo'] ?>" alt="produckt">
                            <p><?= $prod['descrip'] ?></p>
                            <p><?= $prod['stdPrice'] ?>€</p>
                            <iframe name="hiddenFrame" class="hide"></iframe>
                            <form method="post" action="?a=shoppingCart" target="hiddenFrame">
                                <input type="hidden" name="prodID" value="<?= $prod['prodID'] ?>">
                                <input type="submit" name="addToShoppingCart" value="Add To ShoppingCart">
                            </form>
                        </div>
                    </li>
                </div>
            <? endforeach;
        } ?>
    </ul>
</div>

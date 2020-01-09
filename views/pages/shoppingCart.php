<?php 
namespace app\models;
foreach ($ShoppingCartProduct as $prod)
{
    $test= Product::find('prodID = "' . $prod['prodID'] . '"');    ?>
    <div class="column">
        <li>
            <div class="card">
                <img src="<?= $test['0']['photo'] ?>" alt="produckt">
                <p><?= $test['0']['descrip'] ?></p>
                <p><?= $test['0']['stdPrice'] ?>€</p>
            </div>
        </li>
    </div>
<?}?>


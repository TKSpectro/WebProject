<?php
namespace app\models;
$productCounter = 0;
?>
<div class="productList">
<ul>

<?php if(isset($_GET['cat'])) 
{
    foreach (ProdCat::find( 'catID = "'. $_GET['cat']. '"' ) as $prodCat)
    {
    foreach (Product::find( 'prodCatID = "'. $prodCat['prodCatID']. '"' ) as $prod):?> 
    <div class="column">
        <li><div class="card">
        <h3><?= $prod['prodCatID']?></h3>
        <p><?= $prod['descrip'] ?></p>
        <p><?= $prod['stdPrice'] ?>€</p>
        </div></li>
    </div> 
<?endforeach; }?>

<?php } 
elseif(isset($_GET['prodCat'])) 
{foreach (Product::find( 'prodCatID = "'. $_GET['prodCat']. '"' ) as $prod):?>
<div class="column">
    <li><div class="card">
        <h3><?= $prod['prodID'] ?></h3>
        <p><?= $prod['descrip'] ?></p>
        <p><?= $prod['stdPrice'] ?>€</p>
</div></li>
</div> 
<?endforeach; ?>
    <?php }
    else
    { foreach ($product as $prod):?>
    <div class="column">
        <li><div class="card">
            <h3><?= $prod['prodID'] ?></h3>
            <p><?= $prod['descrip'] ?></p>
            <p><?= $prod['stdPrice'] ?>€</p>
    </div></li>
</div> 
<?endforeach; }?>


</ul>
</div>

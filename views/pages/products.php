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
                foreach (Product::find('prodCatID = "' . $prodCat['prodCatID'] . '"') as $prod)
                include __DIR__.'/../shared/productLook.php';
            } 
        }
        elseif (isset($_GET['prodCat']))
        {
            foreach (Product::find('prodCatID = "' . $_GET['prodCat'] . '"') as $prod)
               include __DIR__.'/../shared/productLook.php';
        }
        else
        {
            foreach ($product as $prod) 
            include __DIR__.'/../shared/productLook.php';

             
        } ?>
    </ul>
</div>

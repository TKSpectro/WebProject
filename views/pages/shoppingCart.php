<?php 
namespace app\models;?>
<div class="Shoppingcart">
<h1>MEIN SHOPPING CART</h1>
<table>
    <div class="tableRow">
    <tr>
        <th>PRODUCT</th>
        <th>PRICE</th>
        <th>QUANTITY</th>
        <th>TOTAL</th>
    </tr></div>
 
    <?php foreach ($ShoppingCartProduct as $prodID)
{ $produkt= Product::find('prodID = "' . $prodID['prodID'] . '"');   
  $prod=$produkt['0']?>
    <tr class="tableRow">
    <td><img src="<?= $prod['photo'] ?>" alt="produckt">
   <?= $prod['descrip'] ?></p></td>
    <td><p><?= $prod['stdPrice'] ?>€</td>
    <td>1</td>
    <td>22</td>
<?}?>       
</tr>
</table>
</div>

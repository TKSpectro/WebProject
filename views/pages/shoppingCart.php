<?php 
namespace app\models;
$summe=0;?>
<div class="shoppingcart">
<h1>MEIN WARENKORB</h1><table class="test">
<thead>
    <tr>
        <td class="prodTitl" colspan="2">PRODUCT</td>
        <td>PRICE</td>
        <td>QUANTITY</td>
        <td></td>
        <td>TOTAL</td>
    </tr>
<tr>
    <td  colspan="6"><div class="seprator"></div></td>
</tr>
</thead>
<tbody> 
    <?php foreach ($ShoppingCartProduct as $prodID)
{ $produkt= Product::find('prodID = "' . $prodID['prodID'] . '"');   
  $prod=$produkt['0']?>

<tr>
    <td class="prod"><img src="<?= $prod['photo'] ?>" alt="produckt"></td>
    <td class="prodName"><?= $prod['descrip'] ?></td>
    
    <td><?= $prod['stdPrice'] ?>€</td>
    <td><?= $prodID['quantity'] ?></td>
    <td> <form method="post" action="" >
    <input type="hidden"    name="prodID" value="<?= $prod['prodID'] ?>">
    <input type="submit"    name="delete" value="ENTFERNEN"></form></td>
        
    <td><?php echo $prod['stdPrice']* $prodID['quantity']; 
    $summe+=$prod['stdPrice']* $prodID['quantity'];?>€</td>
    </tr>
<tr>
    <td  colspan="6"><div class="seprator"></div></td>
</tr>
<?}?>        
</tbody>
</table>
<h2 class="summe">Die Summe  <?= $summe?>€</h2>
</div>

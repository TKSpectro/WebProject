<?php 
namespace app\models;
$summe=0;
$anzahl=0;?>
<div class="shoppingcart">
<div class="Titl">MEIN WARENKORB</div>
<table class="test">
<thead>
    <tr>
        <td class="prodTitl" colspan="2">PRODUKT</td>
        <td>PREIS</td>
        <td>ANZAHL</td>
        <td></td>
        <td>GESAMT</td>
    </tr>
<tr>
    <td  colspan="6"><div class="seprator"></div></td>
</tr>
</thead>
<tbody> 
    <?php foreach ($ShoppingCartProduct as $prodID)
{ $produkt= Product::find('prodID = "' . $prodID['prodID'] . '"');   
  $prod=$produkt['0'];?>

<tr>
    <td class="prod"><img src="<?= $prod['photo'] ?>" alt="produckt"></td>
    <td class="prodName"><?= $prod['descrip'] ?></td>
    
    <td><?= $prod['stdPrice'] ?>€</td>
    <td><? echo $prodID['quantity'];
         $anzahl+=$prodID['quantity'];?></td>
    <td> <form method="post" action="" >
    <input type="hidden"    name="prodID" value="<?= $prod['prodID'] ?>">
    <input class="btn" type="submit"    name="delete" value="ENTFERNEN"></form></td>
        
    <td><?php echo $prod['stdPrice']* $prodID['quantity']; 
    $summe+=$prod['stdPrice']* $prodID['quantity'];?>€</td>
    </tr>
<tr>
    <td  colspan="6"><div class="seprator"></div></td>
</tr>
<?}?>        
</tbody>
</table>
    <div class="summe">
    <div class="anzahl"><?=$anzahl;?> Artikel</div>
    <ul class="gesamt">
    <li class="test">GESAMTSUMME</li> 
    <li><?= $summe?>€</li>
    </div>
</div>

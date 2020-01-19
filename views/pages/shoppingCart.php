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
    <?php 
foreach ($ShoppingCartProduct as $prodID)
if(!empty($_SESSION['accountID']))
{
    if($_SESSION['accountID']==$prodID['accountID'])  
    {   
    $produkt= Product::find('prodID = "' . $prodID['prodID'] . '"');   
    include __DIR__ . '/../shared/shoppingcartProdukte.php';
    }
}
else
{if(!empty($_COOKIE['randomNr']))
{
    if($prodID['randomNr']==$_COOKIE['randomNr'])
    {
        $produkt= Product::find('prodID = "' . $prodID['prodID'] . '"');   
    include __DIR__ . '/../shared/shoppingcartProdukte.php';
    }
} 
}

?>        
</tbody>
</table>
    <div class="summe">
    <div class="anzahl"><?=$anzahl;?> Artikel</div>
    <ul class="gesamt">
    <li class="test">GESAMTSUMME</li> 
    <li><?= $summe?>€</li>
    </div>
</div>

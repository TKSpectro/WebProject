<?php 
namespace app\models;
?>
<div class="shoppingcart">
    <div class="Titl">MEIN WARENKORB</div>
<table class="shoppingcartTable">
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
<?php   foreach ($produkte as $prodID):?>
    <tr>
        <td class="prod"><img src="<?= $prodID['0'] ?>" alt="produckt"></td>
        <td class="prodName"><?= $prodID['1'] ?></td>
        
        <td><?= $prodID['2'] ?>€</td>

        <td>    
            <form method="post" class="formClass" id='form-input<?= $prodID['5'] ?>'>
                <input type="hidden"    name="prodID"   value="<?= $prodID['5'] ?>">
                <input type="number"    name="quantity" value="<?=htmlspecialchars($prodID['3'])?>" >
                <input type="submit"    name="editting"    style="display:none" id="edit<?= $prodID['5']?>">
            </form>
        </td>
        <td>
            <form method="post" id='form-date'>
                <input type="hidden"    name="prodID"       value="<?= $prodID['5'] ?>">
                <input type="hidden"    name="quantity"     value="<?=$prodID['3'];?>" >
                <input type="submit"    name="delete"       value="ENTFERNEN"    class="btn"   id="senddate">
            </form>
        </td>
            
        <td><?=$prodID['4']; ?>€</td>
        </tr>
    <tr>
        <td  colspan="6"><div class="seprator"></div></td>
    </tr>
<? endforeach;?>        
</tbody>
</table>
    <div class="summe">
        <div class="anzahl"><?=count($produkte);?> Artikel</div>
                <div class="gesamt">
                <span class="shoppingcartTable">GESAMTSUMME <span class="leerZeichen"><?= $summe?>€</span></span> 
                </div>
        </div>

    </div>
</div>
<div class="kasse">
<a href="index.php?c=address&a=address">zur Kasse</a>
</div>
<script type="text/javascript" src="assets/js/ShoppingcartScript.js"></script>

<?if($_GET['type']=='Jungs-Toys') 
        $color='#2dc2cf'; 
        elseif($_GET['type']=='Konsolespiele')
        $color='#f1ac2c';
        else
        $color='rgb(134, 14, 10)';?>
<div class="column">
<li>
    <div class="card">
        <img src="<?= $prod['photo'] ?>" alt="produckt">
        <div class="prodInfo" style="color:<?=$color;?>";
        ><?= $prod['descrip'] ?></div>
        <div class="prodInfo" style="color:<?=$color;?>"><?= $prod['stdPrice'] ?>€</div>
        <iframe name="hiddenFrame" class="hide"></iframe>
        <form method="post" action="?a=shoppingCart" target="hiddenFrame">
            <input type="hidden"    name="prodID" value="<?= $prod['prodID'] ?>">
            <input type="hidden"    name="quantity"  value="1">
            <input class="btn" type="submit"    name="addToShoppingCart" value="In den Warenkorb">
        </form>
    </div>
</li>
</div>

<? /* if (!isset($_GET['search']))
{
  
   elseif ($_GET['type'] == 'Konsolespiele' || isset($_GET['search']))
        {?>konsoleColor<?};
    else
        {?>mädchenColor<?}
}
else
   {?>mädchenColor<?} */?>
<div class="column ">

    <li class="prodlist ">
        <div class="card">
            <a href="index.php?a=singleProduct&prodID=<?=$prod['prodID']?>">
                <img src="<?= $prod['photo'] ?>" alt="produckt">
                <div class="prodInfo <? if (!isset($_GET['search']))
                    {if ($_GET['type'] == 'Jungs-Toys'){?>jungeColor<?}
                    elseif ($_GET['type'] == 'Konsolespiele' || isset($_GET['search']))
                    {?>konsoleColor<?}
                    else
                    {?>mädchenColor<?}
                }else
                   {?>mädchenColor<?}?>" ;
                ><?= $prod['descrip'] ?></div>
                <div class="prodInfo <? if (!isset($_GET['search']))
                    {if ($_GET['type'] == 'Jungs-Toys'){?>jungeColor<?}
                    elseif ($_GET['type'] == 'Konsolespiele' || isset($_GET['search']))
                    {?>konsoleColor<?}
                    else
                    {?>mädchenColor<?}
                }else
                   {?>mädchenColor<?}?>"><?= $prod['stdPrice'] ?>€</div>
            </a>
            <iframe name="hiddenFrame" class="hide"></iframe>
            <form method="post" action="?c=shoppingcart&a=shoppingCart" target="hiddenFrame">
                <input type="hidden" name="prodID" value="<?= $prod['prodID'] ?>">
                <input type="hidden" name="quantity" value="1">
                <input class="btn" type="submit" name="addToShoppingCart" value="In den Warenkorb">
            </form>
        </div>
    </li>
</div>

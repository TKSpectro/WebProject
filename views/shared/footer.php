<?php 
namespace app\models;

?>
<div class="footerMenu  <? if(($_GET['a']=='shoppingCart') || ($_GET['a']=='aboutUs') || ($_GET['a']=='checkout') || ($_GET['a']=='checkoutSucceed')){?>shoppingcartEmpty<?}?>">
    <div class="footerTable">
        <ul>
            <li>
                <a href="index.php?a=imprint">Impressum</a>
            </li>
            <li>
                <a href="index.php?c=contact&a=contact">Kontakt</a>
            </li>
            <li>
                <a href="index.php?a=aboutUs">Über uns</a>
            </li>
        </ul>
    </div>
</div>

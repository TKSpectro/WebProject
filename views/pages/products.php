<?php
namespace app\models;
?>
<div class="productList">
        <?php foreach ($product as $prod)
        {
            if ($productCounter == 0)
            {
                ?><div class="row"> <? } ?>

            <div class="column">
                <div class="card">
                    <h3><?= htmlspecialchars($prod['prodID']) ?></h3>
                    <p><?= htmlspecialchars($prod['descrip']) ?></p>
                    <p><?= htmlspecialchars($prod['stdPrice']) ?>€</p>
                </div>
            </div>
            <?
            if ($productCounter == 1)
            { ?></div><?php }
            ++$productCounter;
            if ($productCounter >= 2)
            {
                $productCounter = 0;
            }
            ?>

        <? } ?>
</div>

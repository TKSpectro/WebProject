<?php
namespace app\models;
$productCounter = 0;
?>
<div class="productList">
<ul>
<?php foreach ($product as $prod):?>
    <div class="column">
        <li><div class="card">
            <h3><?= htmlspecialchars($prod['prodID']) ?></h3>
            <p><?= htmlspecialchars($prod['descrip']) ?></p>
            <p><?= htmlspecialchars($prod['stdPrice']) ?>€</p>
    </div></li>
</div>
    
    <?endforeach; ?>
</ul>
</div>

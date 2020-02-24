<?php
namespace app\models;
?>
<div class="shoppingcart">
    <div class="shoppingCartTitel">Mein Warenkorb</div>
    <table class="shoppingcartTable">
        <thead>
        <tr>
            <td class="prodTitel" colspan="2">Produkt</td>
            <td>Preis</td>
            <td>Anzahl</td>
            <td></td>
            <td>Gesamt</td>
        </tr>
        <tr>
            <td colspan="6">
                <div class="seperator"></div>
            </td>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($produkte as $prodID): ?>
            <tr>
                <td class="prod"><img src="<?= $prodID['0'] ?>" alt="produkt"></td>
                <td class="prodName"><?= $prodID['1'] ?></td>
                <td><?= $prodID['2'] ?>€</td>
                <td>
                    <form method="post" class="formClass" id='form-input<?= $prodID['5'] ?>'>
                        <input type="hidden" name="Price" value="<?= $prodID['2'] ?>">
                        <input type="hidden" name="prodID" value="<?= $prodID['5'] ?>">
                        <input type="number" name="quantity" value="<?= htmlspecialchars($prodID['3']) ?>">
                        <input type="submit" name="editting" style="display:none" id="edit<?= $prodID['5'] ?>">
                    </form>
                </td>
                <td>
                    <form method="post" id='form-date'>

                        <input type="hidden" name="prodID" value="<?= $prodID['5'] ?>">
                        <input type="hidden" name="quantity" value="<?= $prodID['3']; ?>">
                        <input type="submit" name="delete" value="ENTFERNEN" class="btn" id="senddate">
                    </form>
                </td>
                <td><span class="GesamtBerechung"><?= $prodID['4']; ?></span> €</td>
                <span id="errorMessage">Der Inputwert soll größer als 1 sein.</span>
            </tr>
            <tr>
                <td colspan="6">
                    <div class="seperator"></div>
                </td>
            </tr>
        <? endforeach; ?>
        </tbody>
    </table>
    <div class="shoppingCartSum">
        <div class="amount"><?= count($produkte); ?> Artikel</div>
        <div class="sum">
            <span class="shoppingcartTable">Gesamtsumme<span class="freeSpace"><span
                            id="gesamteSumme"><?= $summe ?></span>€</span></span>
        </div>
    </div>
</div>
</div>
<? if (!empty($summe)): ?>
    <div class="checkout">
        <a href="index.php?c=address&a=address">zur Kasse</a>
    </div>
<? endif; ?>
<script type="text/javascript" src="assets/js/ShoppingcartScript.js"></script>

<div class="paypal">
    <img src="./assets/images/paypalLogo.svg.png">
    <div class="price">Gesamtsumme:<?= $summe ?>€</div>
    <div class="butttons">
        <span class="left">
        <a href="index.php?c=shoppingcart&a=shoppingCart">Abbrechen</a>
        </span>
        <span class="right">
        <form method="post" action="index.php?c=checkoutSucceed&a=checkoutSucceed">
            <input type="hidden" name="sum" value="<?= $summe ?>">
            <input type="submit" name="bestätigen" value="Zahlung bestätigen">
        </form>
        </span>
    </div>
</div>
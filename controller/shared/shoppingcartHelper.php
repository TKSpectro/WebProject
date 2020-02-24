<?php
if (isset($_COOKIE['randomNr']))
{
    $accountID = $_SESSION['accountID'];
    $randomNr = $_COOKIE['randomNr'];
    $ShoppingCartProduct = app\models\Shoppingcart::find('randomNr = "' . $randomNr . '"');
    foreach ($ShoppingCartProduct as $prod)
    {
        $params = ['prodID' => $prod['prodID'], 'quantity' => $prod['quantity'], 'randomNr' => '*', 'accountID' => $accountID];
        $cart = new app\models\Shoppingcart($params);
        $error;
        $cart->update($error, 'prodID = "' . $prod['prodID'] . '"');
    }
    $ShoppingCartProduct = app\models\Shoppingcart::find();
    $i = 0;

    foreach ($ShoppingCartProduct as $accountID)
    {
        ++$i;
        for ($counter = $i; $counter < sizeof($ShoppingCartProduct); ++$counter)
        {
            if ($accountID['prodID'] == $ShoppingCartProduct[$counter]['prodID'])
            {
                $params = ['prodID' => '1', 'quantity' => '1'];
                $cart = new app\models\Shoppingcart($params);
                $error;
                $cart->delete($error, 'ID = "' . $ShoppingCartProduct[$counter]['shoppingCartID'] . '"');
                $ShoppingCartProduct = array_values($ShoppingCartProduct);
            }
        }
    }
}


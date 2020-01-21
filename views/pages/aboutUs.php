<h1>Über Uns</h1>
<?php    
use app\models\Shoppingcart;
  $Shoppingcart =Shoppingcart::find('prodID = 2');

var_dump($Shoppingcart['0']['quantity']);
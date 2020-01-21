<h1>Über Uns</h1>
<?php    
use app\models\Shoppingcart;

#$test=aray();
$ShoppingCartProduct=app\models\Shoppingcart::find();
#var_dump($ShoppingCartProduct);
#echo '<hr>';
echo (count($ShoppingCartProduct).'<br>');

foreach ($ShoppingCartProduct as $accountID)
{
#for ($counter =1; $counter<sizeof($ShoppingCartProduct);$counter++)
 var_dump($accountID['ID']);

   
    /*$params = [
        'prodID'     => '1',
        'quantity'   => '1'
        ];
    $warenkorb = new Shoppingcart($params);
    $error;
    $warenkorb->delete($error,'ID = "' . $test. '"');
    var_dump(app\models\Shoppingcart::find());
    echo '<br>';


   /*if($accountID == $ShoppingCartProduct[$counter])
   {  
      $error;
      $$ShoppingCartProduct[$counter]->delete($error);*/

      
   }




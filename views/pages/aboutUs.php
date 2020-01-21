<h1>Über Uns</h1>
<?php    
use app\models\Shoppingcart;
$ShoppingCartProduct=[1,2,3,4,5,6,7,8,9,10];

foreach ($ShoppingCartProduct as $accountID)
{
   echo 'AccountID ='.($accountID).'<br>';
      #die('test');
for ($counter =1; $counter<sizeof($ShoppingCartProduct);++$counter)
{          echo 'counter='.($counter).'<br>';

      if($accountID == $ShoppingCartProduct[$counter])
      { 
         unset($ShoppingCartProduct,$ShoppingCartProduct[$counter]);
      }

}
echo 'the size ='.(sizeof($ShoppingCartProduct));
}




<h1>Über Uns</h1>
<?php 
 $accountID=$_SESSION['accountID'];
 echo ($accountID);

#var_dump($ShoppingCartProduct);
/* 
$rrr=array();
$warenkorbInhalte=\app\models\ShoppingcartContent::find(); 
foreach($warenkorbInhalte as $test)
{#var_dump($test['ID'] );
array_push($rrr,$test);
}
#var_dump($rrr);
echo('<br>');
setcookie('shoppingcart',json_encode($rrr),time()+3600);
$data=json_decode(stripslashes($_COOKIE['shoppingcart']),true);
var_dump($data);
var_dump($_SESSION);
*/
?>
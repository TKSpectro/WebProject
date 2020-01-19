<?PHP
namespace app\controller;

use app\models\Shoppingcart;

if(isset($_POST['addToShoppingCart']))
{   
    $prodID = $_POST['prodID'];
    $quantity= $_POST['quantity'];
    
    if(!empty($_SESSION['accountID']))
    {
    $accountID=$_SESSION['accountID'];
    $ShoppingCartProduct=\app\models\Shoppingcart::find('accountID = "'.$accountID. '"');
    foreach ($ShoppingCartProduct as $prod)
 {
    if($prod['prodID'] == $prodID)
     {        
       $params = [
                'prodID'     => $prodID,
                'quantity'   => $prod['quantity']+1,
                'accountID'  => $accountID
                ];
                $warenkorb = new Shoppingcart($params);
                $error;
                $warenkorb->update($error,'prodID = "' . $prodID. '"');
                exit;
            
        }
    }
            $params = [
            'prodID'     => $prodID,
            'quantity'   => $quantity,
            'accountID'  => $accountID
            ];

            $warenkorbInhalte = new Shoppingcart($params);
            $error;
            $warenkorbInhalte->insert($error);
        } 

else
{   if(!isset($_COOKIE['randomNr']))
    {
        $randomNr=mt_rand();
    setcookie('randomNr',$randomNr,time() + 3600 * 24 * 30);
    }
    else
    {
        $randomNr=$_COOKIE['randomNr'];
    }
    $ShoppingCartProduct=Shoppingcart::find('randomNr = "'.$randomNr. '"');

    foreach ($ShoppingCartProduct as $prod)
 {
    if($prod['prodID'] == $prodID)
     { 
                
       $params = [
                'prodID'     => $prodID,
                'quantity'   => $prod['quantity']+1,
                'randomNr'   => $randomNr
                ];
    
                $warenkorb = new Shoppingcart($params);
                $error;
                $warenkorb->update($error,'prodID = "' . $prodID. '"');
                exit;
            
        }
    } 
            $params = [
            'prodID'     => $prodID,
            'quantity'   => $quantity,
            'randomNr'   => $randomNr
            ];

            $warenkorbInhalte = new Shoppingcart($params);
            $error;
            $warenkorbInhalte->insert($error);

}
} 

if(isset($_POST['delete']))
{
    $prodID = $_POST['prodID'];
    $params = [
        'prodID'     => $prodID
        ];
    $warenkorb = new Shoppingcart($params);
    $error;
    $warenkorb->delete($error,'prodID = "' . $prodID. '"');
}



?>

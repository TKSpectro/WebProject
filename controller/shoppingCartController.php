<?PHP
namespace app\controller;

use app\models\ShoppingCart;

if(isset($_POST['addToShoppingCart']))
{
    $prodID = $_POST['prodID'];
    $quantity= $_POST['quantity'];
    $ShoppingCartProduct=\app\models\ShoppingCart::find();
    

    foreach ($ShoppingCartProduct as $prod)
 {
    if($prod['prodID'] == $prodID)
     { 
                
       $params = [
                'prodID'     => $prodID,
                'quantity'   => $prod['quantity']+1
                ];
    
                $warenkorb = new ShoppingCart($params);
                $error;
                $warenkorb->update($error,'prodID = "' . $prodID. '"');
                exit;
            
        }
    } 
            $params = [
            'prodID'     => $prodID,
            'quantity'   => $quantity
            ];

            $warenkorb = new ShoppingCart($params);
            $error;
            $warenkorb->insert($error);
            /*$_SESSION['loggedIn'] = true;
            $where=\app\models\Account::find('email = "'.$email. '"');
            $_SESSION['accountID']=$where['0']['accountID'];*/
}
if(isset($_POST['delete']))
{
    $prodID = $_POST['prodID'];
    $params = [
        'prodID'     => $prodID
        ];
    $warenkorb = new ShoppingCart($params);
    $error;
    $warenkorb->delete($error,'prodID = "' . $prodID. '"');
}

?>

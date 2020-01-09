<?PHP
namespace app\controller;


use app\models\ShoppingCart;

if(isset($_POST['addToShoppingCart']))
{
   
        
        $prodID = $_POST['prodID'];
       
       
            $params = [
            'prodID'     => $prodID
            ];

            $warenkorb = new ShoppingCart($params);
            $error;
            $warenkorb->insert($error);
            /*$_SESSION['loggedIn'] = true;
            $where=\app\models\Account::find('email = "'.$email. '"');
            $_SESSION['accountID']=$where['0']['accountID'];*/

          
          
          
}
?>

<?PHP
namespace app\controller;

use app\models\Shoppingcart;


class ShoppingcartController extends \app\core\Controller
{
public function actionShoppingCart()
{
    $this->_params['title'] = 'Warenkorb';
    $this->_params['Header'] = true;    
    if(!empty($_SESSION['accountID']))
        { 
        $accountID=$_SESSION['accountID'];
        $this->_params['ShoppingCartProduct'] =Shoppingcart::find('accountID = "'.$accountID. '"');
        }
    else
        {
        if(!empty($_COOKIE['randomNr']))
        {
            $randomNr = $_COOKIE['randomNr'];
            $this->_params['ShoppingCartProduct'] =Shoppingcart::find('randomNr = "'.$randomNr. '"');

        }
    }

if(isset($_POST['addToShoppingCart']))
{   
    $prodID = $_POST['prodID'];
    $quantity= $_POST['quantity'];
    
    if(!empty($_SESSION['accountID']))
    {
    
    foreach ($this->_params['ShoppingCartProduct'] as $prod)
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
                exit(0);        
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
    foreach ($this->_params['ShoppingCartProduct'] as $prod)
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
                exit(0);
            
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
   if(!empty($_POST['quantity']))
    {
        $quantity=$_POST['quantity'];
        $params = [
            'prodID'     => $prodID,
            'quantity'   => $quantity
            ];
            $warenkorb = new Shoppingcart($params);
            $error;
            $warenkorb->update($error,'prodID = "' . $prodID. '"');
            $this->_params['ShoppingCartProduct'] =Shoppingcart::find('accountID = "'.$accountID. '"');

    }
   else
    {$params = [
        'prodID'     => $prodID,
        'quantity'   => $_POST['quantity']
        ];
        $warenkorb = new Shoppingcart($params);
        $error;
        $warenkorb->delete($error,'prodID = "' . $prodID. '"');
    }
   
}

/*if(isset($_GET['ajax']))
{
   
    exit(0); // Valid EXIT with JSON OUTPUT
}*/

}
}
?>

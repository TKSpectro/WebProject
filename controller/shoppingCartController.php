<?PHP
namespace app\controller;

use app\models\Shoppingcart;


class ShoppingcartController extends \app\core\Controller
{

public function actionShoppingCart()
{
   
   
    $this->_params['title'] = 'Warenkorb';
    $this->_params['Header'] = true;  
    $this->_params['ShoppingCartProduct'] = Array();
    $this->_params['produkte'] = Array();
    $this->_params['summe']=0;


   
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
        foreach($this->_params['ShoppingCartProduct'] as $gekaufteWare)
        {   $warenkorb=Array();
            $produkt= \app\models\Product::find('prodID = "' . $gekaufteWare['prodID'] . '"');  
            $prod=$produkt['0'];
            $gesamt=$prod['stdPrice']*$gekaufteWare['quantity'];
            array_push($warenkorb,$prod['photo']);
            array_push($warenkorb,$prod['descrip']);
            array_push($warenkorb,$prod['stdPrice']);
            array_push($warenkorb,$gekaufteWare['quantity']);
            array_push($warenkorb,$gesamt);
            array_push($warenkorb,$prod['prodID']);
            array_push( $this->_params['produkte'], $warenkorb);
            $this->_params['summe']+=$gesamt;
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


if(isset($_POST['editting'])|| isset($_GET['ajax']))
{  
    $check = ['-','>','<'];
    $prodID = $_POST['prodID'];
    $quantity=$_POST['quantity'];
    if(Shoppingcart::validateInput($quantity,$check))
    {
        $Shoppingcart =Shoppingcart::find('prodID = "'.$prodID. '"');
    
      
  
      if( isset($Shoppingcart['0'])  &&  $_POST['quantity']!=$Shoppingcart['0']['quantity'] )
    {
        $params = [
            'prodID'     => $prodID,
            'quantity'   => $quantity
            ];
            $warenkorb = new Shoppingcart($params);
            $error;
            $warenkorb->update($error,'prodID = "' . $prodID. '"');
           
    }
    }
    else
    {
        $error = 'Ihre Eingabe dürfen keine der folgenden Sonderzeichen beinhalten :<br>';
        foreach($check as $checkValue)
        {
            $error .= ' '. $checkValue . ' ';
        } 
        echo($error);
    }
}


if(isset($_POST['delete']))
{  
  
    $prodID = $_POST['prodID'];
    $quantity=$_POST['quantity'];
   $Shoppingcart = Shoppingcart::find('prodID = "'.$prodID. '"');

   
        $params = [
        'prodID'     => $prodID,
        'quantity'   => $quantity
        ];
        $warenkorb = new Shoppingcart($params);
        $error;
        $warenkorb->delete($error,'prodID = "' . $prodID. '"');
    
   
}   
if(isset($_GET['ajax']))
{
    exit(0); // Valid EXIT with JSON OUTPUT
}
}
}





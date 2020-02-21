<?php

namespace app\controller;

use app\models\Shoppingcart;
class PaypalController extends \app\core\Controller
{
 
    public function actionPaypal()
    {
        $this->_params['title'] = 'Paypal';
        $this->_params['Header'] = false;
        $this->_params['summe']=0;
        $this->_params['Price'] =0;

        $accountID=$_SESSION['accountID'];
        $this->_params['Price'] = Shoppingcart::find('accountID = "'.$accountID. '"');

        foreach($this->_params['Price'] as $gekaufteWare)
        {   
            $produkt= \app\models\Product::find('prodID = "' . $gekaufteWare['prodID'] . '"');  
            $prod=$produkt['0'];
            $gesamt=$prod['stdPrice']*$gekaufteWare['quantity'];
           
            $this->_params['summe']+=$gesamt;
        }
    }
}
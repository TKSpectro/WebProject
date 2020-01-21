<?php if(isset($_COOKIE['randomNr']))
              { 
            $accountID=$_SESSION['accountID'];
            $randomNr=$_COOKIE['randomNr'];
            $ShoppingCartProduct=app\models\Shoppingcart::find('randomNr = "'.$randomNr. '"');
            
            foreach ($ShoppingCartProduct as $prod)
{
            $params = [
                  'prodID'     => $prod['prodID'],
                  'quantity'   => $prod['quantity'],
                  'randomNr'   => '*',
                  'accountID'  => $accountID
                        ];
                  $warenkorb = new app\models\Shoppingcart($params);
                  $error;
                  $warenkorb->update($error,'prodID = "' . $prod['prodID']. '"');   
            }
           
          /*  foreach ($ShoppingCartProduct as $accountID)
{
            for ($counter =1; $counter<sizeof($ShoppingCartProduct);$counter++)
            {       
               if($accountID['prodID'] == $ShoppingCartProduct[$counter]['prodID'])
               {  
                  $params = [
                        'prodID'     => '1',
                        'quantity'   => '1'
                        ];
                    $warenkorb = new app\models\Shoppingcart($params);
                    $error;
                    $warenkorb->delete($error,'ID = "' . $ShoppingCartProduct[$counter]['ID']. '"');
                  
               }
            }
            
      }*/
      }
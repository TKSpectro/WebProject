<?PHP 

namespace app\controller;

use app\models\Order;

class CheckoutSucceedController extends \app\core\Controller
{
    
    public function actionCheckoutSucceed()
    {
        $this->_params['title'] = 'Prozess erledigt';
        $this->_params['Header'] = false;
        $result=null;
        $db = $GLOBALS['db'];
        $result = null;

           $sum         =   $_POST['sum'];
           $accountID   =   $_SESSION['accountID'];
           $addressID   =   $_SESSION['addressID']['0']['addressID'];

           $params = [
            'sum'                => $sum,
            'accountID'          => $accountID,
            'addressID'          => $addressID
            
            ];
            $order = new Order($params);
            $error;
            $order->insert($error);

            $shoppingcartItems = \app\models\Shoppingcart::find('accountID = "'.$accountID. '"');
            foreach($shoppingcartItems as $gekaufteWare)
            {
                $produkt= \app\models\Product::find('prodID = "' . $gekaufteWare['prodID'] . '"');  
                $prod=$produkt['0'];
                $actPrice=$prod['stdPrice'];
                $qty=$gekaufteWare['quantity'];
                $prodID=$gekaufteWare['prodID'];

                $sql = 'SELECT order.orderID FROM ' . \app\models\Order::tablename(). ' WHERE accountID = "'.$accountID .'" and sum= "'.$sum.'"
                and addressID="'.$addressID.'" ORDER BY orderDate ASC LIMIT 1';
                $orderID = $db->query($sql)->fetch();
                $this->_params['result']=$orderID;

            //die($orderID['orderID']);
              
                $params = [
                    'actPrice'        => $actPrice,
                    'qty'             => $qty,
                    'orderID'         => $orderID['orderID'],
                    'prodID'          => $prodID
                    ];
                    $orderItem = new \app\models\OrderItem($params);
                    $error;
                    $orderItem->insert($error);

                    $shoppingcartProduct = \app\models\Shoppingcart::delete($error,'accountID = "' . $accountID. '"');


            }
       

    }
}
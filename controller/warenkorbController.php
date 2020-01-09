<?PHP
namespace app\controller;


use app\models\Warenkorb;

if(isset($_POST['addToWarenkorb']))
{
    echo 'hh';
        
        $prodID = $_POST['prodID'];
       
        echo 'hdhfhdhfhdhdhdhdh';
            $params = [
            'prodID'     => $prodID
            ];

            $warenkorb = new Warenkorb($params);
            $error;
            $warenkorb->insert($error);
            /*$_SESSION['loggedIn'] = true;
            $where=\app\models\Account::find('email = "'.$email. '"');
            $_SESSION['accountID']=$where['0']['accountID'];*/

          
          
          
}
?>

<?PHP

namespace app\controller;

use app\models\Address;

class AddressController extends \app\core\Controller
{

    public function actionAddress()
    {
        $this->_params['title'] = 'Adresse Eingeben';
        $this->_params['Header'] = true;

        if (!$_SESSION['loggedIn'])
        {
            header('Location: index.php?c=pages&a=checkout');
        }

        if (isset($_POST['sendAddress']))
        {
            if (
                !empty($_POST['land']) && !empty($_POST['city']) && !empty($_POST['street']) && !empty($_POST['houseNumber']) && !empty($_POST['zip']))
            {
                $land = $_POST['land'];
                $city = $_POST['city'];
                $street = $_POST['street'];
                $houseNumber = $_POST['houseNumber'];
                $zip = $_POST['zip'];
                $check = [',', '>', '<'];
                $find = Address::find('land = "' . $land . '" and city = "' . $city . '"
        and street = "' . $street . '" and houseNumber = "' . $houseNumber . '" and zip = "' . $zip . '"');

                if (!empty($find))
                {
                    $_SESSION['addressID'] = $find;
                    header('Location: index.php?c=paypal&a=paypal');
                    exit(0);
                }
                if (
                    Address::validateInput($land, $check) && Address::validateInput($city, $check) && Address::validateInput($street, $check) && Address::validateInput($houseNumber, $check) && Address::validateInput($zip, $check))
                {

                    $params = ['land' => $land, 'city' => $city, 'street' => $street, 'houseNumber' => $houseNumber, 'zip' => $zip];

                    $address = new Address($params);
                    $error;
                    $address->insert($error);

                    $_SESSION['addressID'] = Address::find('land = "' . $land . '" and city = "' . $city . '"
             and street = "' . $street . '" and houseNumber = "' . $houseNumber . '" and zip = "' . $zip . '"');

                    header('Location: index.php?c=paypal&a=paypal');
                }
                else
                {
                    $error = 'Ihre Eingabe dürfen keine der folgenden Sonderzeichen beinhalten :<br>';
                    foreach ($check as $checkValue)
                    {
                        $error .= ' ' . $checkValue . ' ';
                    }
                }
            }
            else
            {
                $error = 'Alle Felder müssen ausgefüllt sein';
            }
        }
    }
}
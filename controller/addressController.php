<?PHP 

namespace app\models;

require_once 'models/_baseModel.class.php';
require_once 'models/address.class.php';



if(isset($_POST['sendForm']))
{
    
    if(!empty($_POST['land'])
     &&!empty($_POST['city'])
     &&!empty($_POST['street'])
     &&!empty($_POST['houseNumber'])
     &&!empty($_POST['zip']))
    {
        $land         = $_POST['land'];
        $city         = $_POST['city'];
        $street       = $_POST['street'];
        $houseNumber  = $_POST['houseNumber'];
        $zip          = $_POST['zip'];

        $check = [',','>','<'];
        if(Address::validateInput($land,$check)
        && Address::validateInput($city, $check)
        && Address::validateInput($street, $check)
        && Address::validateInput($houseNumber, $check)
        && Address::validateInput($zip, $check))
        {
            $params = [
            'land'        => $land,
            'city'        => $city,
            'street'      => $street,
            'houseNumber' => $houseNumber,
            'zip'         => $zip
            ];

            $address = new Address($params);
            $error;
            $address->insert($error);
          
        }
    
            else 
            {
            $error = 'Ihre Eingabe dürfen keine der folgenden Sonderzeichen beinhalten :<br>';
                foreach($check as $checkValue)
                {
                    $error .= ' '. $checkValue . ' ';
                } 
            }
    }
    else
        {
         $error = 'Alle Felder müssen ausgefüllt sein';
 
        }

        

} 

?>


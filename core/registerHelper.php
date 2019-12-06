<?PHP 

namespace app\models;

require_once 'models/_baseModel.class.php';
require_once 'core/functionen.php';



if(isset($_POST['sendForm']))
{
    
    if(!empty($_POST['land'])
     &&!empty($_POST['city'])
     &&!empty($_POST['street'])
     &&!empty($_POST['houseNumber'])
     &&!empty($_POST['zip']))
    {
        $land         = htmlspecialchars($_POST['land']);
        $city         = htmlspecialchars($_POST['city']);
        $street       = htmlspecialchars($_POST['street']);
        $houseNumber  = htmlspecialchars($_POST['houseNumber']);
        $zip          = htmlspecialchars($_POST['zip']);

        $check = [',','>','<'];
        if(validateInput($land,$check)
        && validateInput($city, $check)
        && validateInput($street, $check)
        && validateInput($houseNumber, $check)
        && validateInput($zip, $check))
        {
            $params = [
            'land'        => $land,
            'city'        => $city,
            'street'      => $street,
            'houseNumber' => $houseNumber,
            'zip'         => $zip
            ];

            $address = new Address($params);
            $result = $address->find();
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


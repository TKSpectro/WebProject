<?PHP

namespace app\controller;

use \app\models\Account;

class AccountController extends \app\core\Controller
{
    public function actionAccount()
    {
        $this->_params['title'] = 'Mein Konto';
        $this->_params['Header'] = true;
        $this->_params['accounts'] = Account::find('accountID = "' . $_SESSION['accountID'] . '"');

        if (isset($_POST['changeAccountData']))
        {
            if (
                !empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['email'])
                //password field can be empty
                //&&!empty($_POST['password'])
                && !empty($_POST['birthday']) && !empty($_POST['mobile']) && !empty($_POST['phone']))
            {

                $firstName = $_POST['firstName'];
                $lastName = $_POST['lastName'];
                $email = $_POST['email'];
                //check if password is set else set it up
                if (isset($_POST['password']))
                {
                    $password = $_POST['password'];
                }
                else
                {
                    $password = '';
                }
                $birthday = $_POST['birthday'];
                $mobile = $_POST['mobile'];
                $phone = $_POST['phone'];

                $check = [',', '>', '<'];
                if (
                    Account::validateInput($firstName, $check) && Account::validateInput($lastName, $check) && Account::validateInput($email, $check) //&& Account::validateInput($password, $check)
                    && Account::validateInput($birthday, $check) && Account::validateInput($mobile, $check) && Account::validateInput($phone, $check))
                {
                    //if input password is same as before dont hash and sent it again
                    $oldPassword = \app\models\Account::find('email = "' . $email . '"')['passwordHash'];
                    if ($password != '')
                    {
                        //hash password for further usage in database
                        $password = password_hash($password, PASSWORD_DEFAULT);
                    }
                    else
                    {
                        $password = $oldPassword;
                    }

                    $params = ['firstname' => $firstName, 'lastname' => $lastName, 'email' => $email, 'passwordHash' => $password, 'birthday' => $birthday, 'mobile' => $mobile, 'phone' => $phone];

                    $account = new Account($params);
                    $error;
                    $account->update($error, 'accountID = "' . $_SESSION['accountID'] . '"');
                    $_SESSION['loggedIn'] = true;
                    $where = \app\models\Account::find('email = "' . $email . '"');
                    $_SESSION['accountID'] = $where['0']['accountID'];

                    header('Location: index.php');
                }

                else
                {
                    $error = 'Ihre Eingabe dürfen keine der folgenden Sonderzeichen beinhalten :<br>';
                    foreach ($check as $checkValue)
                    {
                        $error .= ' ' . $checkValue . ' ';
                    }
                    $_POST['errorList'] = "$error";
                }
            }
            else
            {
                $error = 'Alle Felder müssen ausgefüllt sein';
                $_POST['errorList'] = "$error";
            }
        }
    }
}
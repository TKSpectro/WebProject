<?php

namespace app\controller;

use \app\models\Account;


class RegisterController extends \app\core\Controller
{
    public function actionRegister()
    {
        $this->_params['title'] = 'Account Erstellen';
        $this->_params['Header'] = true;

        if (isset($_POST['sendAccount']) || isset($_GET['ajax']))
        {
            if (
                !empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['birthday']) && !empty($_POST['mobile']))
            {
                $firstName = $_POST['firstName'];
                $lastName = $_POST['lastName'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $birthday = $_POST['birthday'];
                $mobile = $_POST['mobile'];
                $phone = null;

                //check if email already exists
                if (!empty(\app\models\Account::find('email = "' . $email . '"')))
                {
                    //email is already in db
                    $error = 'EMail ist bereits registiert';
                    $_POST['errorList'] = "$error";
                }
                else
                {
                    //email was not found
                    if (!empty($_POST['phone']))
                    {
                        $phone = $_POST['phone'];
                    }
                    $check = [',', '>', '<'];

                    if (
                        Account::validateInput($firstName, $check) && Account::validateInput($lastName, $check) && Account::validateInput($email, $check) && Account::validateInput($password, $check) && Account::validateInput($birthday, $check) && Account::validateInput($mobile, $check) && Account::validateInput($phone, $check))
                    {
                        //hash password for further usage in database
                        $password = password_hash($password, PASSWORD_DEFAULT);

                        $params = ['firstname' => $firstName, 'lastname' => $lastName, 'email' => $email, 'passwordHash' => $password, 'birthday' => $birthday, 'mobile' => $mobile, 'phone' => $phone];

                        $account = new Account($params);
                        $error;
                        $account->insert($error);
                        $_SESSION['loggedIn'] = true;
                        // um die RandomNr als * zu machen
                        $where = \app\models\Account::find('email = "' . $email . '"');
                        $_SESSION['accountID'] = $where['0']['accountID'];
                        include __DIR__ . '/../controller/shared/shoppingcartHelper.php';
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
            }
            else
            {
                $error = 'Alle Felder müssen ausgefüllt sein';
                $_POST['errorList'] = "$error";
            }
        }
        if (isset($_GET['ajax']))
        {
            exit(0); // Valid EXIT with JSON OUTPUT
        }
    }
}
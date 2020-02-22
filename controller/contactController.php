<?php

namespace app\controller;


use app\models\Contact;

class ContactController extends \app\core\Controller
{
    public function actionContact()
    {
        $this->_params['title'] = 'Kontakt';
        $this->_params['Header'] = true;


        if (isset($_POST['sendContact']))
        {
            if (!empty($_POST['email']) && !empty($_POST['subject']) && !empty($_POST['message']))
            {
                $email = $_POST['email'];
                $subject = $_POST['subject'];
                $message = $_POST['message'];

                $check = [',', '>', '<'];
                if (Contact::validateInput($email, $check))
                {
                    $params = ['email' => $email, 'subject' => $subject, 'message' => $message];

                    $contact = new Contact($params);
                    $error;
                    $contact->insert($error);
                    header('Location: index.php?c=contact&a=contact');
                    $_POST['errorList'] = $error;
                }
                else
                {
                    $error = 'Ihre Eingabe dürfen keine der folgenden Sonderzeichen beinhalten :<br>';
                    foreach ($check as $checkValue)
                    {
                        $error .= ' ' . $checkValue . ' ';
                    }
                    $_POST['errorList'] = $error;
                }
            }
            else
            {
                $error = 'Alle Felder müssen ausgefüllt sein';
                $_POST['errorList'] = $error;
            }

        }
        if (isset($_GET['ajax']))
        {
            exit(0); // Valid EXIT with JSON OUTPUT
        }
    }
}
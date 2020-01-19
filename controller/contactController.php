<?php

namespace app\controller;


use app\models\Contact;

if(isset($_POST['sendContact']))
{
    if(!empty($_POST['eMail']) && !empty($_POST['subject']) && !empty($_POST['message']))
    {
        $eMail      = $_POST['eMail'];
        $subject    = $_POST['subject'];
        $message    = $_POST['message'];

        $check = [',','>','<'];
        if(Contact::validateInput($eMail,$check))
        {
            $params = [
                'email'     => $eMail,
                'subject'   => $subject,
                'message'   => $message
            ];

            $contact = new Contact($params);
            $error = null;
            $contact->insert($error);
            header('Location: index.php?a=contact');
            //TODO give user feedback
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
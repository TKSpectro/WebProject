<?php

namespace app\controller;

class LoginController extends \app\core\Controller
{
    public function actionLogin($rememberMe = false)
    {
        $this->_params['title'] = 'Login';
        $this->_params['Header'] = true;

    
        if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] === false)
        {
            if (isset($_POST['login']))
            {
                $email = isset($_POST['email']) ? $_POST['email'] : '';
                $password = isset($_POST['password']) ? $_POST['password'] : '';

                $where = \app\models\Account::find('email = "' . $email . '"');

                if (!empty($email) && !empty($password))
                {
                    if (!empty($where))
                    {
                        if (password_verify($password, $where['0']['passwordHash']))
                        {
                            $_SESSION['loggedIn'] = true;
                            $_SESSION['accountID'] = $where['0']['accountID'];
                            include __DIR__ . '/../controller/shared/shoppingcartHelfer.php';

                            if (isset($_POST['rememberMe']))
                            {
                                rememberMe($where['0']['email'], $password);

                            }
                            header('Location: index.php');
                            exit(0);
                        }
                        else
                        {
                            echo 'Ihre Email oder Password ist nicht korrekt';
                            $_SESSION['loggedIn'] = false;
                        }
                    }
                    else
                    {
                        echo 'Ihre Email oder Password ist nicht korrekt';
                        $_SESSION['loggedIn'] = false;
                    }
                }
                else
                {
                    echo 'Sie müssen ihre Email und Password eingeben';
                    exit(0);
                }
            }
        }
        else
        {
            header('Location: index.php');
            exit(0);
        }
    }
  



}
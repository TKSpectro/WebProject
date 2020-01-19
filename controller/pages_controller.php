<?php

namespace app\controller;

class PagesController extends \app\core\Controller
{
    public function actionIndex()
    {
        $this->_params['title'] = 'Startseite';
        $this->_params['Header'] = true;
        $this->_params['accounts'] = \app\models\Account::find();
    }

    public function actionAboutUs()
    {
        $this->_params['title'] = 'Über Uns';
        $this->_params['Header'] = true;
    }

    public function actionProducts()
    {
        if (!isset($_GET['search']))
        {
            $this->_params['title'] = $_GET['type'];
        }
        else
        {
            $this->_params['title'] = "Gefundene Produkte";
        }
        $this->_params['Header'] = true;
        $this->_params['product'] = \app\models\Product::find();

    }

    public function actionShoppingCart()
    {
        $this->_params['title'] = 'Warenkorb';
        $this->_params['Header'] = true;
        $this->_params['ShoppingCartProduct'] = \app\models\Shoppingcart::find();

    }

    public function actionFormular()
    {
        $this->_params['title'] = 'Formular';
        $this->_params['Header'] = true;

    }

    public function actionAccount()
    {
        $this->_params['title'] = 'Mein Konto';
        $this->_params['Header'] = true;

        $this->_params['accounts'] = \app\models\Account::find('accountID = "' . $_SESSION['accountID'] . '"');

    }

    public function actionDocumentation()
    {
        $this->_params['title'] = 'Dokumentation';
        $this->_params['Header'] = true;
    }

    public function actionContact()
    {
        $this->_params['title'] = 'Kontakt';
        $this->_params['Header'] = true;
    }

    public function actionImprint()
    {
        $this->_params['title'] = 'Impressum';
        $this->_params['Header'] = true;
    }

    public function actionSubscribe()
    {
        $eventId = $_GET['event'] ?? '';
        $_SESSION['event'] = isset($_SESSION['event']) ? !$_SESSION['event'] : true;

        header('Location: index.php?c=products&a=show&id=' . $eventId);
        exit(0);
    }

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

    public function actionLogout()
    {

        if (isset($_POST['logout']))
        {
            setcookie('email', '', -1, '/');
            setcookie('password', '', -1, '/');

            $_SESSION['loggedIn'] = false;
        }
        session_destroy();


        header('Location:index.php');
        exit();
    }

}
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
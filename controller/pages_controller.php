<?php

namespace app\controller;

class PagesController extends \app\core\Controller
{
	public function actionIndex()
	{
		$this->_params['title'] = 'Startseite';
		$this->_params['smallHeader'] = true;
		$this->_params['accounts'] = \app\models\Account::find(); 
		
	}
	public function actionFormular()
	{
		$this->_params['title'] = 'Formular';
		$this->_params['bigHeader'] = true;
		
	}

	public function actionImprint()
	{
		$this->_params['title'] = 'Impressum';
		$this->_params['smallHeader'] = true;
	}

	public function actionSubscribe()
	{
		$eventId = $_GET['event'] ?? '';
		$_SESSION['event'] = isset($_SESSION['event']) ? !$_SESSION['event'] : true;
		
		header('Location: index.php?c=products&a=show&id='.$eventId);
		exit(0);
	}
	
	public function actionLogin()
	{
		echo 'in der Funktion';
		if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] === false)
		{
			if(isset($_POST['submit']))
			{
				$email    = $_POST['email'] ?? null;
				$password = $_POST['password'] ?? null;

				if($email === 'max@fh-erfurt.de' && $password === '12345678')
				{
					$_SESSION['loggedIn'] = true;
					header('Location: formular.php');
					echo 'Sie sind angemeldet';
				}
				else
				{
					echo 'nicht gemeldet';
					$_SESSION['loggedIn'] = false;
				}
			}
		}
		else
		{
			echo 'else';
			header('Location: index.php');
		}
	}

	public function actionLogout()
	{
		if($_SESSION['loggedIn'] === true)
		{
			$_SESSION['loggedIn'] = false;
		}

		header('Location: index.php');
		exit();
	}

}
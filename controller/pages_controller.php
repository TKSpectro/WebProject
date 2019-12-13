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
		if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] === false)
		{
			if(isset($_POST['submit']))
			{
				$email    = isset($_POST['email'])? $_POST['email'] :'';
				$password = isset($_POST['password']) ? $_POST['password']: '';

				$where= \app\models\Account::find('email = "'.$email. '"');
				
			if(!empty($email) && !empty($password))
			{
				if(!empty($where))
				{
					if($where['0']['passwordHash']==$password)
					{
						$_SESSION['loggedIn'] = true;
						header('Location:../index.php');
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
			}
			}
		}
		else
		{
			echo 'else';
			header('Location:../index.php');
		}
	}

	public function actionLogout()
	{   
		
		if(isset($_POST['logout']))
		{
			$_SESSION['loggedIn'] = false;
		}
		session_destroy(); 
	

		header('Location:index.php');
		exit();
	}

}
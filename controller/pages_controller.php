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

	public function actionProducts()
    {
        $this->_params['title'] = 'Produkte';
        $this->_params['bigHeader'] = true;
        $this->_params['product'] = \app\models\Product::find();
	}
	
	public function actionFormular()
	{
		$this->_params['title'] = 'Formular';
		$this->_params['bigHeader'] = true;
		
	}
//Get replaced by Products
//	public function actionGirls()
//	{
//		$this->_params['title'] = 'Mädchen-Toys';
//		$this->_params['bigHeader'] = true;
//
//	}
//	public function actionBoys()
//	{
//		$this->_params['title'] = 'Jungs-Toys';
//		$this->_params['bigHeader'] = true;
//
//	}
//	public function actionConsole()
//	{
//		$this->_params['title'] = 'Konsolespiele';
//		$this->_params['bigHeader'] = true;
//
//	}

<<<<<<< HEAD
    
=======
    public function actionProducts()
    {
        $this->_params['title'] = 'Produkte';
        $this->_params['bigHeader'] = true;
    }
>>>>>>> b2e4ed5a1fd1555bd19a58ed1470e5fca7a9a58e

	public function actionAccount()
	{
		$this->_params['title'] = 'Mein Konto';
		$this->_params['bigHeader'] = true;
		
		$this->_params['accounts'] = \app\models\Account::find('accountID = "'.$_SESSION['accountID']. '"'); 
		
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
	
	public function actionLogin($rememberMe= false)
	{
		$this->_params['title'] = 'Login';
		$this->_params['bigHeader'] = true;
		
	

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
					if(password_verify($password, $where['0']['passwordHash']))
					{
						$_SESSION['loggedIn'] = true;
						$_SESSION['accountID']=$where['0']['accountID'];
						if(isset($_POST['rememberMe']))
						{
							rememberMe($where['0']['email'],$password);
					
						}
						header('Location: index.php');
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
			
			header('Location: index.php');
		}
	}

	public function actionLogout()
	{   
		
		if(isset($_POST['logout']))
		{
			setcookie('email','',-1,'/');
			setcookie('password','',-1,'/');

			$_SESSION['loggedIn'] = false;
		}
		session_destroy(); 
	

		header('Location:index.php');
		exit();
	}

}
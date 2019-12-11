<?php

namespace app\controller;

class PagesController extends \app\core\Controller
{
	public function actionIndex()
	{
		$this->_params['title'] = 'Startseite';
		$this->_params['smallHeader'] = true;
		#$this->_params['accounts'] = \app\models\Account::find(); es ist nicht nötig
		
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
}
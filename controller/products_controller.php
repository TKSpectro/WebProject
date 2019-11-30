<?php

namespace app\controller;

class ProductsController extends \app\core\Controller
{
	public function actionShow()
	{
		$this->_params['title'] = 'Produkte';
		$this->_params['smallHeader'] = true;
		
		$productId = 1;
		$product = \app\models\Product::findOne($productId);
		$this->_params['product'] = $product;

		$ppAll = \app\models\PPAll::findAll($productId);
		$this->_params['ppAll'] = $ppAll;
	}
}
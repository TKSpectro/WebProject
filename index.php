<?php


session_start();

// all require stuff to work!!
require_once 'init/20_imports.php';




$controllerName = $_GET['c'] ?? 'pages';


$actionName = $_GET['a'] ?? 'index';



$controllerPath = __DIR__.'/controller/'.$controllerName.'Controller.php';

if(file_exists($controllerPath))
{
	require_once $controllerPath;

	$controllerClassName = '\\app\\controller\\'.ucfirst($controllerName).'Controller';
	

	if(class_exists($controllerClassName))
	{
	
		$controllerInstance = new $controllerClassName($actionName, $controllerName);

		$actionMethodName = 'action'.ucfirst($actionName);
		#die("$controllerClassName  ++++ $actionMethodName");
		if(method_exists($controllerInstance, $actionMethodName))
		{
			$controllerInstance->$actionMethodName();
			if (isset($_COOKIE['email']))
			{
				checkIfRemembered();
			}
			$controllerInstance->renderHTML();
			
		}
		else
		{
			header('Location: index.php?c=page&a=error404');
		}
	}
	else
	{
		
		header('Location: index.php?c=pages&a=error404');
	}

}
else
{
	header('Location: index.php?c=pages&a=error404');
}

?>





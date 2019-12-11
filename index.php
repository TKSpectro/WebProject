<?php


session_start();

// all require stuff to work!!
require_once 'init/20_imports.php';




$controllerName = $_GET['c'] ?? 'pages';

if(isset($_GET['p']))
{
	$actionName = $_GET['p'];
}

else {
$actionName = $_GET['a'] ?? 'index';
}



$controllerPath = __DIR__.'/controller/'.$controllerName.'_controller.php';

if(file_exists($controllerPath))
{
	require_once $controllerPath;

	$controllerClassName = '\\app\\controller\\'.ucfirst($controllerName).'Controller';
	#echo $controllerClassName.'<br>';

	if(class_exists($controllerClassName))
	{
	
		$controllerInstance = new $controllerClassName($actionName, $controllerName);

		$actionMethodName = 'action'.ucfirst($actionName);

		if(method_exists($controllerInstance, $actionMethodName))
		{
			$controllerInstance->$actionMethodName();
			$controllerInstance->renderHTML();

			/*if(isset($_GET['p']))
			{
				$actionName = $_GET['p'];
				$actionMethodName = 'action'.ucfirst($actionName);
				$controllerInstance->$actionMethodName();
				$controllerInstance->renderHTML();
	
			}
		*/
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

}
else
{
    // Execute the SQL Statement and fetch data
    $accounts = $database->query('SELECT * FROM account WHERE 1')->fetchAll();
}

?>


<?php


session_start();

// all require stuff to work!!
require_once 'init/10_database.php';
require_once 'init/20_imports.php';
require_once 'views/printAddress.php';



$controllerName = $_GET['c'] ?? 'pages';
$actionName = $_GET['a'] ?? 'index';

$controllerPath = __DIR__.'/controller/'.$controllerName.'_controller.php';

if(file_exists($controllerPath))
{
	require_once $controllerPath;

	$controllerClassName = '\\app\\controller\\'.ucfirst($controllerName).'Controller';

	if(class_exists($controllerClassName))
	{
		$controllerInstance = new $controllerClassName($actionName, $controllerName);

		$actionMethodName = 'action'.ucfirst($actionName);

		if(method_exists($controllerInstance, $actionMethodName))
		{
			$controllerInstance->$actionMethodName();
			$controllerInstance->renderHTML();
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
<html>
<head>
    <title>Toyplanet</title>
</head>
<body>
<header></header>

<footer></footer>
</body>
</html>

<?php


$dns = 'mysql:host=lt80glfe2gj8p5n2.chr7pe7iynqr.eu-west-1.rds.amazonaws.com
;dbname=toyplanet';
$dbuser = 'root';
$dbpassword = '';
$options    = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];


$db= null;

try
{
	$db = new PDO($dns, $dbuser, $dbpassword, $options);
	$db->exec("SET CHARACTER SET utf8");
}
catch(\PDOException $e)
{
	die( 'Database connection failed: ' . $e->getMessage() );
}
<?php


$dns = 'mysql:host=lt80glfe2gj8p5n2.chr7pe7iynqr.eu-west-1.rds.amazonaws.com;dbname=e74qmxfxv3q3smz7';
$dbuser = 'vqcf16ic8fegyfvr';
$dbpassword = 'q7d29ciomxcvp8yo';
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

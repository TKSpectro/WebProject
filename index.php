<?php
require_once './views/pages/formulare.php';

$dns = 'mysql:host=localhost;dbname=toyplanet';
$dbuser = 'root';
$dbpassword = '';
$options    = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];


$database = null;

try
{
    $database = new PDO($dns, $dbuser, $dbpassword, $options);
}
catch(\PDOException $e)
{
    die( 'Database connection failed: ' . $e->getMessage() );
}

if(isset($_POST['create']))
{
    $sqlStr = 'INSERT INTO customer (firstname, lastname, eMail, passwordHash) VALUES (:firstname, :lastname, :email, :passwordHash)';
    $stmt = $database->prepare($sqlStr);

    $stmt->execute([
        'firstname' => $_POST['firstname'],
        'lastname' => $_POST['lastname'],
        'email' => $_POST['email'],
        'passwordHash' => password_hash($_POST['password'], PASSWORD_DEFAULT)
    ]);
}


$accounts = null;
$accountsErrorMessage = false;
try
{
    // Execute the SQL Statement and fetch data
    $accounts = $database->query('SELECT * FROM account WHERE 1')->fetchAll();
}
catch (\PDOException $e)
{
    $accountsErrorMessage = true;
}


?>
<html>
<head>
    <title>Meine PDO Welt</title>
</head>
<body>
<header></header>

<footer></footer>
</body>
</html>
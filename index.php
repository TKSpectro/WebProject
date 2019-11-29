<?php

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
<main>
    <?php if($accountsErrorMessage === true) : ?>
        <div class="error">
            Ja, mhhh irgendwie bekomm ich die Daten aus der Datenbank nicht!! Schau mal bitte nach.
        </div>
    <?php endif; ?>
    <form method="post">
        <lable>Firstname</lable><br />
        <input type="text" name="firstname" value="<?=isset($_POST['firstname'])?htmlspecialchars($_POST['firstname']):''?>"/><br />
        <lable>Lastname</lable><br />
        <input type="text" name="lastname" value="<?=isset($_POST['lastname'])?htmlspecialchars($_POST['lastname']):''?>"/><br />
        <lable>E-Mail</lable><br />
        <input type="text" name="email" value="<?=isset($_POST['email'])?htmlspecialchars($_POST['email']):''?>"/><br />
        <lable>Password</lable><br />
        <input type="password" name="password"/><br /><br />
        <input type="submit" name="create" value="Anlegen"/>
    </form>
    <ul>
        <?php foreach($accounts as $account) : ?>
            <li><?=$account['firstname'].' '.$account['lastname']?></li>
        <?php endforeach; ?>
    </ul>
</main>
<footer></footer>
</body>
</html>
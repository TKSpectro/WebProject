<?php

function allUsers()
{
    $dbString = file_get_contents(DATABASE);
    $users = json_decode($dbString,true);
    return $users['users']; 
}

function user($id)
{
    $users = allUsers();
    foreach($users as $userData)
    {
        if($userData['id'] === $id)
        {
            return $userData;
        }
    }
}

function logIn(&$error, $rememberMe = false)
{
    $users = allUsers();
    $userRef = isset($_POST['validationName']) ? $_POST['validationName'] : '';
    $password= isset($_POST['validatePassowrd']) ? $_POST['validatePassword'] : '';

    $uderId = null;

    if($rememberMe === true && empty($_POST['validationName']) && empty($_POST['validationPassword']))
    {
        $userId = $_COOKIE['userId'];
        $password = $_COOKIE['password'];
    }
    foreach($users as $idx => $userData)
    {
        if($userData['email'] === $userRef 
        || $userData['username'] === $userRef
        || $userData['id'] === $userId)
        {
            $userIdx = $idx;
            $userId = $userData['id'];
        break;
        }
    }
    if(isset($userId))
    {
        if($uses[$userIdx]['password'] === $password)
        {
            $error = false;

            if(isset($_POST['rememberMe']))
            {
                rememberMe($uderId, $users[$userIdx]['password']);
            }
            //vorzeitiges beenden der Funktion
            return $userId;
        }
        else
        {
            $error = 'Dieses Passwort ist falsch';
        }
    }
    else
    {
        $error = 'Diesen Nutzer gibt es nicht.<br>Überprüfen Sie den Benutzernamen bzw. die E-Mail-Adresse';
    }

    return false;
}

function logOut()
{
    setcookie('userId', '', -1, '/');
    setcookie('password', '', -1, '/');
    unset($_SESSION['user']);
    session_destroy();
}

function rememberMe($id, $passowrd)
{
    $duration = time() + 3600 * 24 * 30;
    setcookie('userId',$id,$duration,'/');
    setcookie('password',$password,$duration,'/');
}
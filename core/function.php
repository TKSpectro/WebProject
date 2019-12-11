<? 
function allUsers()
{
      $dbString = file_get_contents(DATABASE);
      $users= json_decode($dbString,true);
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
      return false;
}

function logIN(&$error,$rememberMe= false)
{
$users= allUsers();
$userRef  = isset($_POST['validationName']) ? $_POST['validationName'] : '';
$password =  isset($_POST['validationPassword']) ? $_POST['validationPassword'] : '';

$userId= null;

      if($rememberMe === true && empty($_POST['validationName']) && empty($_POST['validationPassword']))
            {
            $userId   = $_COOKIE['userId'];
            $password = $_COOKIE['password'];
            } 
      foreach($users as $idx => $userData)
      {
            if($userData['email'] === $userRef 
            || $userData['username'] === $userRef
            || $userData['id'] === $userId )
            {
                  $userIdx=$idx;
                  $userId=$userData['id'];
                  break;
            }
      }

      if(isset($userId))
      {
            if($users[$userIdx]['password'] === $password)
            {
                  $error = false;

                  if(isset($_POST['rememberMe']))
                  {
                        rememberMe($userId, $users[$userIdx]['password']);
                  }
                  // vorzeitiges Beenden der Funktion
                  return $userId; 
            }
            else
            {
                  $error='Ihr Passwort ist falsch';
            }
      }
      else
      {
            $error = 'Diesen Nuzer gibt es nicht.<br> Überprüfen Sie den Benutzernamen bzw. die E-Mail-Adresse!';
      }
            return false; 
}

function logOut()
{
      setcookie('userId','',-1,'/');
      setcookie('password','',-1,'/');
      unset($_SESSION['user']);
      session_destroy(); 
}

function rememberMe($id, $password)
{
      $duration = time() + 3600 * 24 * 30;
      setcookie('userId' , $id, $duration,'/');
      setcookie('password' , $password, $duration,'/');
}
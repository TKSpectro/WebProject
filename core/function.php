<?


function checkIfRemembered()
{
    
      $email   = $_COOKIE['email'];
      $password=$_COOKIE['password'];
      $where= \app\models\Account::find('email = "'.$email. '"');
      	
      if(!empty($email) && !empty($password))
      {
        if(!empty($where))
         {
            if(password_verify($password, $where['0']['passwordHash']))
            {
              $_SESSION['loggedIn'] = true; 
              
              include __DIR__ . '/../controller/shared/shoppingcartHelfer.php';
            }      
         }
      }
      elseif(isset($_SESSION['accountID']))
      {
            $_SESSION['loggedIn'] = true; 
              
            include __DIR__ . '/../controller/shared/shoppingcartHelfer.php';
      }
}

function rememberMe($email, $password)
{
      $duration = time() + 3600 * 24 * 30;
      setcookie('email' , $email, $duration,'/');
      setcookie('password' , $password, $duration,'/');
    
}

function findMyAdress()
{
      app\models\Address::find('land = "'.$land. '" and city = "'.$city. '"
             and street = "'.$street. '" and houseNumber = "'.$houseNumber. '" and zip = "'.$zip. '"');
           
}
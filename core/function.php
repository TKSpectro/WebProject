<? 


 function logIn()
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
            
              
           }  
          }
      }      
}

function rememberMe($email, $password)
{
      $duration = time() + 3600 * 24 * 30;
      setcookie('email' , $email, $duration,'/');
      setcookie('password' , $password, $duration,'/');
    
}
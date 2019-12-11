<?=php

if(isset($_SESSION['login']) && $_SESSION['login'] === true)
{
	//TODO if already logged in then go to "loggedIn"-page
}

/*TODO
check if mail/password are empty and if they are valid
->give out error if not
*/

/*TODO 
et mail and passwort from post
check if the mail already in the database
{
	if found get the hashed password from the database
	then password_verify($password, $passwordhash from database)
	if true set session stuff for login and set session[login]=true
	maybe clear variables just for safety?
	redirect to other page
} 
else
{
	give out error "email or password wrong"
}
*/

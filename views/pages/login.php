<div class="formular">
  <form  class="iamform" method="POST">
    <figure >
    <img src="assets/images/Account_verwaltung2.png"  alt="Account_verwaltung Bild">
    <figcaption>Kunden Login</figcaption>
    </figure>
    <fieldset class="login_fieldset"><legend>E-Mail</legend>
    <input type="email" name="email"
    <?=isset($_POST['email'])?  'value="'.htmlspecialchars($_POST['email']).'"' :'' ?>></fieldset>
    <fieldset class="login_fieldset"><legend>Password</legend>
    <input type="password" name="password"
    <?=isset($_POST['password'])?  'value="'.htmlspecialchars($_POST['password']).'"' :'' ?>></fieldset>
    <input type="checkbox" name="rememberMe"
    <?=isset($_POST['rememberMe'])?  'checked' : '' ?>> <label for="rememberMe">Meine ID Speichern </label>
     <a id="kontoErstellenlink" href= "index.php?a=formular">Noch kein Konto?</a>
    <input type="submit"  name="login" value="anmelden">   
  </form> 
</div>



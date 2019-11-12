<div class="login-wrapper">
    <div class="login-modal">
        <div class="img-shadow"></div>
        <div class="img"></div>
        <div class="title">LOGIN</div>

        <form action="<?=$_SERVER['PHP_SELF'].'?p=user';?>" method="post">
            <label for="loginName">Email oder Benutzername</label>
            <input type="text" name="validationName" id="loginName" placeholder="ihre@mail.de"
            <?=isset($_POST['validationName']) ? 'value="'.htmlspecialchars($_POST['validationName']).'"' : ''?>>
            
            <label for="loginPassword">Passwort</label>
            <input type="password" name="validationPassword" id="loginPassword" placeholder="Passwort">
            
            <input type="submit" name="submitLogin" value="anmelden">
            
            <input type="checkbox" name="rememberMe" id="check"
            <?=isset($_POST['rememberMe']) ? 'checked' : ''?>>
            <label for="check">angemeldet bleiben?</label>
            
            <a href="<?=$_SERVER['SCRIPT_NAME']?>/?p=register">Noch kein Konto?</a>
            
            <div class="clear"></div>
        </form>
    </div>
</div>
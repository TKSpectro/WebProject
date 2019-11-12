<form action="#" method="post" class="personal-data">

<div class="left">
<div class="img">
    <img src="<?=ROOTPATH?>assets/images/login_icon.png" alt="<?=$_SESSION['user']['firstName']?>">
</div>
</div>

<div class="right">
    <div>
        <label for="fname">Vorname</label>
        <input type="text" name="fname" id="fname"
        value="<?=htmlspecialchars($user['firstName'])?>">
    </div>
    <div>
        <label for="lname">Nachname</label>
        <input type="text" name="lname" id="lname"
        value="<?=htmlspecialchars($user['lastName'])?>">
    </div>
    <div>
        <label for="email">Benutzername</label>
        <input type="text" name="email" id="email"
        value="<?=htmlspecialchars($user['email'])?>">
    </div>
    <div>
        <label for="username">E-Mail</label>
        <input type="text" name="username" id="username"
        value="<?=htmlspecialchars($user['username'])?>">
    </div>
    <div>
        <input type="checkbox" name="changePassword" id="changePw"><label for="changePw">Passwort ändern?</label>
        <input type="text" name="newPassword">
    </div>
    <input type="submit" value="Neue Daten speichern" name="submitNewData">
</div>

</form>
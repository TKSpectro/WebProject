
<div class="formular">
<form class="iamform" action="<?=$_SERVER['PHP_SELF'].'?a=formular';?>"  method="Post"> 

    
<figure>
    <img src="assets/images/Account_verwaltung2.png"  alt="Account_verwaltung Bild">
    <figcaption>Persönliche Daten ändern</figcaption>
    </figure>

<fieldset class="register_fieldset"><legend>Vorname</legend>
<input type="text" name="firstName"
value="<?= htmlspecialchars ($accounts['0']['firstname'])?>"></fieldset>


<fieldset class="register_fieldset"><legend>Nachname</legend>
<input type="text" name="lastName"
value="<?=htmlspecialchars ($accounts['0']['lastname'])?>"></fieldset>


<fieldset class="register_fieldset"><legend>E-Mail</legend>
<input type="email" name="email"
value="<?=htmlspecialchars ($accounts['0']['email'])?>"></fieldset>


<fieldset class="register_fieldset"><legend>Passwort</legend>
<input type="password" name="password"
value="<?=htmlspecialchars ($accounts['0']['passwordHash'])?>"></fieldset>


<fieldset class="register_fieldset"><legend>Geburtstag</legend>
<input type="date" name="birthday"
value="<?=htmlspecialchars ($accounts['0']['birthday'])?>"></fieldset>


<fieldset class="register_fieldset"><legend>Handy</legend>
<input type="number" name="mobile"
value="<?=htmlspecialchars ($accounts['0']['mobile'])?>"></fieldset>


<fieldset class="register_fieldset"><legend>Telefon</legend>
<input type="number" name="phone"
value="<?= htmlspecialchars ($accounts['0']['phone'])?>"></fieldset>

<input type="submit"  name="accountÄndern" value="ÄNDERUNGEN BESTÄTIGEN">
</form>  

</div>
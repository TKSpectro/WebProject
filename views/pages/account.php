
<div class="formular">
<form class="iamform" action="<?=$_SERVER['PHP_SELF'].'?a=formular';?>"  method="Post"> 

    
<figure>
    <img src="assets/images/Account_verwaltung2.png"  alt="Account_verwaltung Bild">
    <figcaption>Personliche Daten ändern</figcaption>
    </figure>

<fieldset class="register_fieldset"><legend>First Name</legend>
<input type="text" name="firstName"
value="<?= htmlspecialchars ($accounts['0']['firstname'])?>"></fieldset>


<fieldset class="register_fieldset"><legend>Last Name</legend>
<input type="text" name="lastName"
value="<?=htmlspecialchars ($accounts['0']['lastname'])?>"></fieldset>


<fieldset class="register_fieldset"><legend>EMail</legend>
<input type="email" name="email"
value="<?=htmlspecialchars ($accounts['0']['email'])?>"></fieldset>


<fieldset class="register_fieldset"><legend>Password</legend>
<input type="password" name="password"
value="<?=htmlspecialchars ($accounts['0']['passwordHash'])?>"></fieldset>


<fieldset class="register_fieldset"><legend>Birthday</legend>
<input type="date" name="birthday"
value="<?=htmlspecialchars ($accounts['0']['birthday'])?>"></fieldset>


<fieldset class="register_fieldset"><legend>Mobile</legend>
<input type="number" name="mobile"
value="<?=htmlspecialchars ($accounts['0']['mobile'])?>"></fieldset>


<fieldset class="register_fieldset"><legend>Phone</legend>
<input type="number" name="phone"
value="<?= htmlspecialchars ($accounts['0']['phone'])?>"></fieldset>

<input type="submit"  name="accountÄndern" value="Daten bearbeiten">
</form>  

</div>
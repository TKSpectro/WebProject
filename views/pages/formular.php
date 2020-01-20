
<!--
<form  action="<?#$_SERVER['PHP_SELF']?>" method="Post"> 
    <table width=50% style = "float:right;">
      
        <tr>
            <td><label for="contry">Land</label></td>
            
            <td ><input type="text" name="land"></td>
        </tr>

        <tr>
            <td><label for="city">City</label></td>
            <td><input type="text" name="city"></td>
        </tr>

        <tr>
            <td><label for="street">Street</label></td>
            <td><input type="text" name="street"></td>
        </tr>
        <tr>
            <td><label for="zip">ZIP</label></td>
            <td><input type="number" name="zip"></td>
        </tr>
        <tr>
            <td><label for="houseNumber">House Number</label></td>
            <td> <input type="number" name="houseNumber"></td>
        </tr>
    
        <tr>

            <td><input type="submit"  name="sendForm" value="Schicken"></td>
        </tr>
    </table>
</form> !-->

<div class="formular">
<form class="iamform"   method="Post"> 

    
<figure>
    <img src="assets/images/Account_verwaltung2.png"  alt="Account_verwaltung Bild">
    <figcaption>Benutzerkonto Erstellen</figcaption>
    </figure>

<fieldset class="register_fieldset"><legend>Vorname</legend>
<input type="text" name="firstName"></fieldset>


<fieldset class="register_fieldset"><legend>Nachname</legend>
<input type="text" name="lastName"></fieldset>


<fieldset class="register_fieldset"><legend>E-Mail</legend>
<input type="email" name="email"></fieldset>


<fieldset class="register_fieldset"><legend>Passwort</legend>
<input type="password" name="password"></fieldset>


<fieldset class="register_fieldset"><legend>Geburtstag</legend>
<input type="date" name="birthday"></fieldset>


<fieldset class="register_fieldset"><legend>Handy</legend>
<input type="number" name="mobile"></fieldset>


<fieldset class="register_fieldset"><legend>Telefon</legend>
<input type="number" name="phone"></fieldset>

<input type="submit"  name="sendAccount" value="Registrieren">
</form>  

</div>

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
<form class="iamform" action="<?=$_SERVER['PHP_SELF'].'?a=formular';?>"  method="Post"> 

    
<figure>
    <img src="assets/images/Account_verwaltung2.png"  alt="Account_verwaltung Bild">
    <figcaption>Benutzerkonto Erstellen</figcaption>
    </figure>

<fieldset class="register_fieldset"><legend>First Name</legend>
<input type="text" name="firstName"></fieldset>


<fieldset class="register_fieldset"><legend>Last Name</legend>
<input type="text" name="lastName"></fieldset>


<fieldset class="register_fieldset"><legend>EMail</legend>
<input type="email" name="email"></fieldset>


<fieldset class="register_fieldset"><legend>Password</legend>
<input type="password" name="password"></fieldset>


<fieldset class="register_fieldset"><legend>Birthday</legend>
<input type="date" name="birthday"></fieldset>


<fieldset class="register_fieldset"><legend>Mobile</legend>
<input type="number" name="mobile"></fieldset>


<fieldset class="register_fieldset"><legend>Phone</legend>
<input type="number" name="phone"></fieldset>

<input type="submit"  name="sendAccount" value="Regestrieren">
</form>  

</div>
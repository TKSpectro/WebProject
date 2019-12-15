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
<body>
<h2>Benutzerkonto erstellen</h2>
<form action="<?=$_SERVER['PHP_SELF'].'?a=formular';?>"  method="Post">
    <table  width=50%  style = "float: left">
       <tr><td>
           <fieldset><legend>First Name</legend>
           <input type="text" name="firstName"></fieldset>
       </td></tr>

       <tr><td>
           <fieldset><legend>Last Name</legend>
           <input type="text" name="lastName"></fieldset>
       </td></tr>

       <tr><td>
           <fieldset><legend>EMail</legend>
           <input type="email" name="email"></fieldset>
       </td></tr>

       <tr><td>
           <fieldset><legend>Password</legend>
           <input type="password" name="password"></fieldset>
       </td></tr>

       <tr><td>
           <fieldset><legend>Birthday</legend>
           <input type="date" name="birthday"></fieldset>
       </td></tr>

       <tr><td>
           <fieldset><legend>Mobile</legend>
           <input type="number" name="mobile"></fieldset>
       </td></tr>

       <tr><td>
           <fieldset><legend>Phone</legend>
           <input type="number" name="phone"></fieldset>
       </td></tr>
       <tr>

       <td><input type="submit"  name="sendAccount" value="Regestrieren"></td>
       </tr>
         
    </table>
</form>  
</body>
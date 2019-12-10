

<form  action="<?$_SERVER['PHP_SELF']?>" method="Post"> 
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
</form>


<form action="<?$_SERVER['PHP_SELF']?>" method="Post">
    <table  width=50%  style = "float: left">
        <tr>
            <td><label for="firstName">First Name</label></td>
            
            <td ><input type="text" name="firstName"></td>
        </tr>

        <tr>
            <td><label for="lastName">Last Name</label></td>
            <td><input type="text" name="lastName"></td>
        </tr>

        <tr>
            <td><label for="email">EMail</label></td>
            <td><input type="email" name="email"></td>
        </tr>

        <tr>
            <td><label for="password">Password</label></td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <td><label for="birthday">Birthday</label></td>
            <td> <input type="date" name="birthday"></td>
        </tr>

        <tr>
            <td><label for="mobile">Mobile</label></td>
            <td> <input type="number" name="mobile"></td>
        </tr>

        <tr>
            <td><label for="phone">Phone</label></td>
            <td> <input type="number" name="phone"></td>
        </tr>
        <tr>

        <td><input type="submit"  name="sendAccount" value="SendAccount"></td>
</tr>
         
    </table>
</form>  
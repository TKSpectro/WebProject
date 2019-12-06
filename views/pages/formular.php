

<form action="<?$_SERVER['PHP_SELF']?>" method="Post"> 
    <table>
        <tr>
            <td><label for="contry">Land</label></td>
            
            <td><input type="text" name="land"></td>
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
            <td> <input type="text" name="houseNumber"></td>
        </tr>
        
        <tr>
            <td><input type="submit"  name="sendForm" value="Schicken"></td>
        </tr>
    </table>
</form>
<br>
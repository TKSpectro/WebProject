

<form action="<?$_SERVER['PHP_SELF']?>" method="Post"> 
    <table>
        <tr>
            <td><label for="contry">Country</label></td>
            
            <td><input type="text" name="land"></td>
        </tr>

        <tr>
            <td><label for="land">Land</label></td>
            <td><input type="text" name="city"></td>
        </tr>

        
        <tr>
            <td><label for="street">Street</label></td>
            <td><input type="text" name="street"></td>
        </tr>
        <tr>
            <td><label for="zip">ZIP</label></td>
            <td><input type="number" name="houseNumber"></td>
        </tr>
        <tr>
            <td><label for="hausNr">HausNumber</label></td>
            <td> <input type="text" name="zip"></td>
        </tr>
        
        <tr>
            <td><input type="submit"  name="submit" value="Schicken"></td>
        </tr>
    </table>
</form>
<br>

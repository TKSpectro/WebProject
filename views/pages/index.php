

<table>
        <tr>
            <td><a href= "index.php?a=formular" ><img id="jung" src="assert/photos/jung.png" alt=""></a></td>
           
            <?php if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true) : ?>
                <h1>Sie sind angemeldet</h1>
                <form action="<?=$_SERVER['PHP_SELF'].'?a=logout';?>" method="Post">
                    <input type="submit"  name="logout" value="Logout">
                </form> 
                <?php endif; ?>

            <td><a href= "index.php?a=login" ><img id="vater" src="assert/photos/vater.png" alt=""></td>
            <td><img id="girls" src="assert/photos/girls.png" alt=""></td>
            <td><img src="" alt=""></td>



        </tr>
    </table>
	
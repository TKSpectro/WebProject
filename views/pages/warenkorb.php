
                            <form method="post" action="?a=warenkorb" target="_blank">
                                <input type="hidden" name="prodID" value="4">
                                <input type="submit" name="addToWarenkorb" value="Add To Warnkorb">
                            </form>

<?php if(isset($_POST['prodID']))
    {echo $_POST['prodID'];}
    else
    echo 'Nichts';

    ?>


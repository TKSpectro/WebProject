
<!--<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="assert/css/Toyplanet_style.css">
    <title>Toyplanet</title>
</head>-->

    <table>
        <tr>
            <td><a href= "<?=$_SERVER['SCRIPT_NAME']?>/?a=formular" ><img id="jung" src="assert/photos/jung.png" alt=""></a></td>
            <?php if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true) : ?>
                <h1>Sie sind angemeldet</h1>
                <?php endif; ?>
            <td><img id="vater" src="assert/photos/vater.png" alt=""></td>
            <td><img id="girls" src="assert/photos/girls.png" alt=""></td>
            <td><img src="" alt=""></td>

        </tr>
    </table>


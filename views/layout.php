<!DOCTYPE html>
<html lang="de">
<head>
    <link rel="stylesheet" type="text/css" href="assets/css/Toyplanet_style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/search.css">
    <link rel="stylesheet" type="text/css" href="assets/css/productList.css">
    <link rel="stylesheet" type="text/css" href="assets/css/sideNav.css">
    <link rel="stylesheet" type="text/css" href="assets/css/topNav.css">
    <link rel="stylesheet" type="text/css" href="assets/css/shoppingcart.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>
</head>

<body>
<?php
include __DIR__ . '/shared/header.php';
if (isset($_GET['a']))
{
include __DIR__ . '/shared/topNav.php';
?>
<div class="contentCon">
    <?php if (isset($_GET['type'])|| isset($_GET['search']))
    {
        include __DIR__ . '/shared/sideNav.php';
    } ?>
    <?= $body;
    }
    else
    {
        if (isset($_GET['type']))
        {
            include __DIR__ . '/shared/sideNav.php';
        } ?>
        <?= $body;
    }
    ?>


</div>
<footer></footer>
</body>
</html>
	
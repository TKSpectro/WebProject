<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript" src="assets/js/singleProdukt.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/css/Toyplanet_style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/search.css">
    <link rel="stylesheet" type="text/css" href="assets/css/sideNav.css">
    <link rel="stylesheet" type="text/css" href="assets/css/topNav.css">
    <link rel="stylesheet" type="text/css" href="assets/css/footer.css">
    <link rel="stylesheet" type="text/css" href="assets/css/register.css">
    <link rel="stylesheet" type="text/css" href="assets/css/errorOutput.css">
    <title><?= $title ?></title>
    <style>
        @font-face{
            font-family: "KGILikeToMoveIt";
            src: url("assets/fonts/KGILikeToMoveIt.ttf");
        }

        @font-face{
            font-family: "Roboto";
            src: url("assets/fonts/Roboto-Regular.ttf");
        }
    </style>

    <?php if (!empty($_GET))
    {
    if ($_GET['a'] == 'shoppingCart'): ?>
    <link rel="stylesheet" type="text/css" href="assets/css/shoppingcart.css">
    <? endif;

    if ($_GET['a'] == 'contact'): ?>
    <link rel="stylesheet" type="text/css" href="assets/css/contact.css">
        <script type="text/javascript" src="assets/js/contactScript.js"></script>
    <? endif;

    if ($_GET['a'] == 'products'): ?>
    <link rel="stylesheet" type="text/css" href="assets/css/productList.css">
    <? endif;

    if ($_GET['a'] == 'singleProduct'): ?>
    <link rel="stylesheet" type="text/css" href="assets/css/singleProduct.css">
    <? endif;

    if ($_GET['a'] == 'checkout' || $_GET['a'] == 'paypal'): ?>
    <link rel="stylesheet" type="text/css" href="assets/css/checkout.css">
    <? endif;

    if ($_GET['a'] == 'imprint' || $_GET['a'] == 'documentation'): ?>
    <link rel="stylesheet" type="text/css" href="assets/css/imprintDocumentation.css">
    <? endif;

    if ($_GET['a'] == 'register'): ?>
        <script type="text/javascript" src="assets/js/registerScript.js"></script>
    <? endif;
    } ?>
</head>
<body>
<?php

if (isset($_GET['a']) && $_GET['a'] == 'paypal')
{
    ?> <?= $body;
    exit(0);
}
include __DIR__ . '/shared/header.php';
if (isset($_GET['a']))
{
include __DIR__ . '/shared/topNav.php';
include __DIR__ . '/shared/errorOutput.php';
?>
<div class="contentCon">
    <?php if (isset($_GET['type']) || isset($_GET['search']) || $_GET['a'] == 'products')
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
<footer>
    <? include __DIR__ . '/shared/footer.php'; ?>
</footer>
</body>
</html>
	
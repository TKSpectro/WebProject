<!DOCTYPE html>
<html lang="de">
<head>
<link rel="stylesheet" type="text/css" href="assets/css/Toyplanet_style.css">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title><?=$title?></title>
</head>

<body>
	<?php if(isset($smallHeader)) : ?>
		<?php include __DIR__.'/shared/_headerSmall.php'; ?>
	<?php else : ?>
		<?php include __DIR__.'/shared/_headerBig.php'; ?>
	<?php endif; ?>
    <!--<?php include __DIR__.'/shared/_sideNav.php'; ?>-->
<main>
	<?= $body?>
</main>

	<footer></footer>
</body>
</html>
	

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="assert/css/Toyplanet_style.css">
	<title><?=$title?></title>
</head>

	<body>
		
		<?php if(isset($smallHeader)) : ?>
			<?php include __DIR__.'/shared/_headerSmall.php'; ?>
		<?php else : ?>
			<?php include __DIR__.'/shared/_headerBig.php'; ?>
		<?php endif; ?>
		
	<main>
			<?= $body?>  
		<!--	<table border=1>
		<tr>
			<th>ID</th>
			<th>createdAt</th>
			<th>updatedAt</th>
			<th>Land</th>
			<th>City</th>
			<th>Street</th>
			<th>Hause Number</th>
			<th>ZIP</th>
		</tr>
				<?php /* foreach(Address::find() as $rows):?>
		<tr>
				<?foreach($rows as $index => $cols):?>
				<td><?=htmlspecialchars($cols)?></td>
				<?endforeach;?>
		</tr>
				<?endforeach;*/?>
		</table>
		!-->
		
		</main>
		<footer></footer>
	</body>
</html>
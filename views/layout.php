<?php namespace app\models; ?>

<!DOCTYPE html>
<html>
	<head>
		<title><?=$title?> | Project 01</title>
		<meta charset="UTF-8">
	</head>
	<body>
		<?php if(isset($smallHeader)) : ?>
			<?php include __DIR__.'/shared/_headerSmall.php'; ?>
		<?php else : ?>
			<?php include __DIR__.'/shared/_headerBig.php'; ?>
		<?php endif; ?>
		<main>
			<?=$body?>  
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
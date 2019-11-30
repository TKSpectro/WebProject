<div class="page index">
	<h1>Hello World!</h1>
	<div class="accouts-list">
		<div class="grid">
			<?php foreach($accounts as $index => $account) : ?>
			<div class="row">
				<div class="col-12">
					<?php echo $account->fullname(); ?>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>
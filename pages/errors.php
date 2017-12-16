<?php if (count($errors) > 0): ?>
	<div class="error">
		<?php foreach ($errors as $key => $error): ?>
			<p><?php echo $error ?></p>
		<?php endforeach ?>
	</div>
<?php endif ?>
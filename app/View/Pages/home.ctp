<h1>Facebook Example</h1>

<?php if ($facebook_user): ?>
	<?= debug($facebook_user); ?>
	<?= $this->Facebook->logout(); ?>
<?php else: ?>
	<?= $this->Facebook->login(); ?>
<?php endif; ?>
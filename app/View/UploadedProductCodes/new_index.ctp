<?= $this->element('admin_header'); ?>
Prod_id</t></t>Availble</t></t>Expires
<?php foreach($ret as $item): ?>
	<p>
		<?= $item['prod_id']; ?></t></t>
		<?= $item['avail_count']; ?></t></t>
		<?= $item['expires']; ?>
	</p>
<?php endforeach; ?>

<div class="ageSegments form">
<?php echo $this->Form->create('AgeSegment'); ?>
	<fieldset>
		<legend><?php echo __('Add Age Segment'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('min');
		echo $this->Form->input('max');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Age Segments'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>

<div class="ageSegments form">
<?php echo $this->Form->create('AgeSegment'); ?>
	<fieldset>
		<legend><?php echo __('Edit Age Segment'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('AgeSegment.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('AgeSegment.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Age Segments'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>

<div class="citySegments form">
<?php echo $this->Form->create('CitySegment'); ?>
	<fieldset>
		<legend><?php echo __('Add City Segment'); ?></legend>
	<?php
		echo $this->Form->input('city');
	?>
	<?php
		echo $this->Form->input('state');
	?>
	<?php
		echo $this->Form->input('country');
	?>
	<?php
		echo $this->Form->input('latitude');
	?>
	<?php
		echo $this->Form->input('longitude');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List City Segments'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>

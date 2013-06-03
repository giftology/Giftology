<div class="citySegments form">
<?php echo $this->Form->create('City'); ?>
	<fieldset>
		<legend><?php echo __('Edit City'); ?></legend>
	<?php

		echo $this->Form->input('id');
		echo $this->Form->input('city');?></br/></br/>
		<?php echo $this->Form->input('state');?></br/></br/>
		<?php echo $this->Form->input('country');?></br/></br/>
		<?php  echo $this->Form->input('latitude');
	?></br/></br/>
	<?php  echo $this->Form->input('longitude');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<!--
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('CitySegment.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('CitySegment.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List City Segments'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
-->

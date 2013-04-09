<div class="vendors form">
<?php echo $this->Form->create('Campaign', array('type'=>'file')); ?>
	<fieldset>
		<legend><?php echo __('Edit Campaign'); ?></legend>
	<?php
		echo $this->Form->input('productid');
		echo $this->Form->input('enable');
		echo $this->Form->input('start_date');
		echo $this->Form->input('end_date');
		 echo $this->Form->input('thumb_file', array('label' => 'Thumb (50x50px)', 'type' => 'file'));
        echo $this->Form->input('wide_file', array('label' => 'Wide Image (200x64px)', 'type' => 'file'));
       

	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Campaign'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Campaign'), array('controller' => 'campaigns', 'action' => 'admin')); ?> </li>
		
	</ul>
</div>

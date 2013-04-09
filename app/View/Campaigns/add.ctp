<div class="vendors form">
<?php echo $this->Form->create('Campaign', array('type' => 'file')); ?>
    <fieldset>
        <legend><?php echo __('Add Campaign'); ?></legend>
    <?php
        echo $this->Form->input('product_id', array('label' => 'Product ID', 'type' => 'text'));
        echo $this->Form->input('enable') ;
        echo $this->Form->input('start_date') ;
        echo $this->Form->input('end_date') ;
        echo $this->Form->input('thumb_file', array('label' => 'Product Image', 'type' => 'file'));
        echo $this->Form->input('wide_file', array('label' => 'Landing Page Image', 'type' => 'file'));
       


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

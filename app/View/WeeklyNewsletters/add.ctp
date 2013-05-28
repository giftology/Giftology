<div class="Newsletters form">
<?php echo $this->Form->create('WeeklyNewsletter', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Add Newsletter'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('header_file', array('label' => 'Header', 'type' => 'file'));
		echo $this->Form->input('strip_file', array('label' => 'Strip', 'type' => 'file'));
		echo $this->Form->input('product1_file', array('label' => 'product1', 'type' => 'file'));
		echo $this->Form->input('product2_file', array('label' => 'product2', 'type' => 'file'));
		echo $this->Form->input('brand1_file', array('label' => 'Brand1', 'type' => 'file'));
		echo $this->Form->input('brand2_file', array('label' => 'Brand2', 'type' => 'file'));
		echo $this->Form->input('featured_file', array('label' => 'featured Image', 'type' => 'file'));
		echo $this->Form->input('scheduled_time', array('label' => 'Time', 'type' => 'input'));

		echo $this->Tinymce->input('WeeklyNewsletter.brand1_text', array( 
	            'label' => 'Brand1 Text' 
		            ),array( 
		                'language'=>'en' 
		            ), 
		            'full' 
	        ); 
		echo $this->Tinymce->input('WeeklyNewsletter.brand2_text', array( 
	            'label' => 'Brand2 Text' 
		            ),array( 
		                'language'=>'en' 
		            ), 
		            'full' 
	        ); 
		echo $this->Tinymce->input('WeeklyNewsletter.template_text', array( 
	            'label' => 'Template Text' 
		            ),array( 
		                'language'=>'en' 
		            ), 
		            'full' 
	        ); 
		echo $this->Tinymce->input('WeeklyNewsletter.template_heading', array( 
	            'label' => 'Template Heading' 
		            ),array( 
		                'language'=>'en' 
		            ), 
		            'full' 
	        ); 


	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List WeeklyNewsletter'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('New WeeklyNewsletter'), array('controller' => 'WeeklyNewsletter', 'action' => 'add')); ?> </li>
	</ul>
</div>

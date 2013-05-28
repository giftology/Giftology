<div class="Newsletters form">
<?php echo $this->Form->create('WeeklyNewsletter', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Add Newsletters'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('header_file', array('label' => 'Thumb (50x50px)', 'type' => 'file'));
		echo $this->Form->input('strip_file', array('label' => 'Wide Image (200x64px)', 'type' => 'file'));
		echo $this->Form->input('product1_file', array('label' => 'Facebook Share Image (200x200px)', 'type' => 'file'));
		echo $this->Form->input('product2_file', array('label' => 'Carousel(199x102px)', 'type' => 'file'));
		echo $this->Form->input('brand1_file', array('label' => 'Thumb (50x50px)', 'type' => 'file'));
		echo $this->Form->input('brand2_file', array('label' => 'Thumb (50x50px)', 'type' => 'file'));
		echo $this->Form->input('featured_file', array('label' => 'Thumb (50x50px)', 'type' => 'file'));

		echo $this->Tinymce->input('WeeklyNewsletter.brand1_text', array( 
	            'label' => 'About' 
		            ),array( 
		                'language'=>'en' 
		            ), 
		            'full' 
	        ); 
		echo $this->Tinymce->input('WeeklyNewsletter.brand2_text', array( 
	            'label' => 'short About' 
		            ),array( 
		                'language'=>'en' 
		            ), 
		            'full' 
	        ); 
		echo $this->Tinymce->input('WeeklyNewsletter.template_text', array( 
	            'label' => 'About' 
		            ),array( 
		                'language'=>'en' 
		            ), 
		            'full' 
	        ); 
		echo $this->Tinymce->input('WeeklyNewsletter.template_heading', array( 
	            'label' => 'About' 
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

<?= $this->element('admin_header'); ?><div class="vendors form">

<?php echo $this->Form->create('Vendor', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Add Vendor'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('thumb_file', array('label' => 'Thumb (50x50px)', 'type' => 'file'));
		echo $this->Form->input('wide_file', array('label' => 'Wide Image (200x64px)', 'type' => 'file'));
		echo $this->Form->input('facebook_file', array('label' => 'Facebook Share Image (200x200px)', 'type' => 'file'));
		echo $this->Form->input('carousel_image_file', array('label' => 'Carousel(199x102px)', 'type' => 'file'));
		echo $this->Tinymce->input('Vendor.description', array( 
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

		<li><?php echo $this->Html->link(__('List Vendors'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>

<?= $this->element('admin_header'); ?>
<div class="products form">
<?php echo $this->Form->create('Product'); ?>
	<fieldset>
		<legend><?php echo __('Add Product'); ?></legend>
	<?php
		echo $this->Form->input('min_price');
		echo $this->Form->input('max_price');
		echo $this->Form->input('min_value');
		echo $this->Form->input('days_valid');
		echo $this->Form->input('terms_heading');
	        echo $this->Tinymce->input('Product.terms', array( 
	            'label' => 'Terms & Conditions' 
		            ),array( 
		                'language'=>'en' 
		            ), 
		            'full' 
	        );
		echo $this->Tinymce->input('Product.redeem_instr', array( 
	            'label' => 'Redemption Instructions' 
		            ),array( 
		                'language'=>'en' 
		            ), 
		            'full' 
	        ); 
		echo $this->Form->input('code_type_id');
		echo $this->Form->input('code');
		echo $this->Form->input('vendor_id');
		echo $this->Form->input('product_type_id');
		echo $this->Form->input('age_segment_id');
		echo $this->Form->input('gender_segment_id');
		echo $this->Form->input('city_segment_id');
		echo $this->Form->input('display_order');
		echo $this->Form->input('sender_gift_limit');
		echo $this->Form->input('sender_time_limit');
		echo $this->Form->input('receiver_gift_limit');
		echo $this->Form->input('receiver_time_limit');

	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Products'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Vendors'), array('controller' => 'vendors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vendor'), array('controller' => 'vendors', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Product Types'), array('controller' => 'product_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product Type'), array('controller' => 'product_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Gender Segments'), array('controller' => 'gender_segments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gender Segment'), array('controller' => 'gender_segments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Gifts'), array('controller' => 'gifts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gift'), array('controller' => 'gifts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transactions'), array('controller' => 'transactions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transaction'), array('controller' => 'transactions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Uploaded Product Codes'), array('controller' => 'uploaded_product_codes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Uploaded Product Code'), array('controller' => 'uploaded_product_codes', 'action' => 'add')); ?> </li>
	</ul>
</div>

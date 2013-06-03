<?= $this->element('admin_header'); ?><div class="vendors form">

<?php echo $this->Form->create('Vendor', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Add Vendor'); ?></legend>
	<?php
		echo $this->Form->input('name'); ?>
			<div class="error_message" id="error_name" style="display:none; margin-left:20px;">
		            <h5 style="color:#FF0000">*please enter the Vendor Name.</h5>
	        </div>

		<?php echo $this->Form->input('thumb_file', array('label' => 'Thumb (50x50px)', 'type' => 'file')); ?>
			<div class="error_message" id="error_thumb" style="display:none; margin-left:20px;">
		            <h5 style="color:#FF0000">*Please upload an image in JPEG/PNG format only.</h5>
	        </div>

		<?php echo $this->Form->input('wide_file', array('label' => 'Wide Image (200x64px)', 'type' => 'file')); ?>
			<div class="error_message" id="error_wide" style="display:none; margin-left:20px;">
		            <h5 style="color:#FF0000">*Please upload an image in JPEG/PNG format only.</h5>
	        </div>
	        <?php echo $this->Form->input('redeem_file', array('label' => 'redeem Image (200x64px)', 'type' => 'file')); ?>
			<div class="error_message" id="error_redeem" style="display:none; margin-left:20px;">
		            <h5 style="color:#FF0000">*Please upload an image in JPEG/PNG format only.</h5>
	        </div>

		<?php echo $this->Form->input('facebook_file', array('label' => 'Facebook Share Image (200x200px)', 'type' => 'file')); ?>
			<div class="error_message" id="error_facebook" style="display:none; margin-left:20px;">
		            <h5 style="color:#FF0000">*Please upload an image in JPEG/PNG format only.</h5>
	        </div>
		<?php echo $this->Form->input('carousel_image_file', array('label' => 'Carousel(199x102px)', 'type' => 'file'));
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


<script type="text/javascript">

      $(document).ready(function(){
      	$(".submit").click(function (){ 
      		var e = false;
      		if ($("#VendorName").val().length == 0) {
                    $("#error_name").show();
                    e = true;
                }
                else{
                    $("#error_name").hide();    
                }
            if ($("#VendorThumbFile").val().length == 0) {
                    $("#error_thumb").show();
                    e = true;
                }
                else{
                    $("#error_thumb").hide();    
                }
            if ($("#VendorWideFile").val().length == 0) {
                    $("#error_wide").show();
                    e = true;
                }
                else{
                    $("#error_wide").hide();    
                }
            if ($("#VendorRedeemFile").val().length == 0) {
                    $("#error_redeem").show();
                    e = true;
                }
                else{
                    $("#error_wide").hide();    
                }
            if ($("#VendorFacebookFile").val().length == 0) {
                    $("#error_facebook").show();
                    e = true;
                }
                else{
                    $("#error_facebook").hide();    
                }
                if(e) return false;
            });
      });
      </script>

<?= $this->element('admin_header'); ?>
<div class="products index">
	<h2><?php echo __('Products'); ?></h2>
	<div id="collapse1"  class="backSearch" style="border:1px solid #ccc; width:800px; padding:30px; margin-bottom:50px;">

		<?php echo $this->Form->create('Product', array('url' => array_merge(array('action' => 'index'), $this->params['pass']))); 
?>

        <span><?php echo $this->Form->input('id', array('type'=>'text','div' => false,'label'=>'','size'=>'1','placeholder'=>'ID'));?></span>
       <span><?php echo $this->Form->input('min_price', array('type'=>'text','div' => false,'label'=>'','size'=>'10','placeholder'=>'MIN PRICE'));?></span>
        <span><?php echo $this->Form->input('max_price', array('type'=>'text','div' => false,'label'=>'','size'=>'10','placeholder'=>'MAX PRICE'));?></span>
      <span><?php echo $this->Form->input('min_value', array('type'=>'text','div' => false,'label'=>'','size'=>'10','placeholder'=>'MIN VALUE'));?></span>
      <span><?php echo $this->Form->input('days_valid', array('type'=>'text','div' => false,'label'=>'','size'=>'10','placeholder'=>'Days Valid'));?></span>
       <span><label>Code Type:</label><?php echo $this->Form->select('code_type_id', $code_type);?></span>
        <span><?php echo $this->Form->input('code', array('type'=>'text','div' => false,'label'=>'','size'=>'10','placeholder'=>'Code'));?></span><br>
       <span><label>Product Type:</label><?php echo $this->Form->select('product_type_id', $product_type);?></span>

       <span><label>Vendor:</label><?php echo $this->Form->select('vendor_id', $vendors);?></span>
        <span><label>City Segment:</label><?php echo $this->Form->select('city_segment_id', $city_segment);?></span>
        <span><label>Age Segment:</label><?php echo $this->Form->select('age_segment_id', $age_segment);?></span>
       <span><?php echo $this->Form->input('display_order', array('type'=>'text','div' => false,'label'=>'','size'=>'10','placeholder'=>'Display Order'));?></span>
          <td><?php echo $this->Form->input('created_start', array('type'=>'text','div' => false,'label'=>'','size'=>'10','id'=>'datepicker2',"placeholder"=>'Created Start '));?>
		<?php echo $this->Form->input('created_end', array('type'=>'text','div' => false,'label'=>'','size'=>'10','id'=>'datepicker3','placeholder'=>'Created End'));?>
        </td>
        <td><?php echo $this->Form->input('modified_start', array('type'=>'text','div' => false,'label'=>'','size'=>'10','id'=>'datepicker4',"placeholder"=>'Modified Start'));?>
			<?php echo $this->Form->input('modified_end', array('type'=>'text','div' => false,'label'=>'','size'=>'10','id'=>'datepicker5','placeholder'=>'Modified End'));?>
        </td>
        
       <span><center>
         <?php echo $this->Form->submit(__('Search', true), array('div' => false));	
        if (isset($this->params['named']) & !empty($this->params['named'])){ 
            echo $this->Html->link(_('Reset Filter'), array('controller'=>'Products','action'=>'index'));
        } 
        ?></center>
        </span>

         <?php echo $this->Form->end();?></td>

	</div>
	 <?php echo $this->Form->create( '', array( 'id'=>'frm1' ,'name'=>'frm1' ,'controller'=>'Products', 'action' => 'download_product_csv', 'onsubmit'=>'return chkValidate();') );?>
        <table class="grd-chkbox" cellpadding="0" cellspacing="0" id="ordrMgmt">
         <?php  echo $this->Form->submit("Download Product CSV" ,array( 'name'=>'csv', 'class'=>'button','type'=>'submit', 'id'=>'assign' , 'label' =>'','value'=>"" ));	
              echo $this->Form->end();
             ?>
	<table cellpadding="0" cellspacing="0" border="1">

	<tr>
			<td class="campaign_checkbo"> <input class="campaign_checkbox" type="checkbox" name="checkall"onclick='checkedAll(frm1);' > </td>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('min_price'); ?></th>
			<th><?php echo $this->Paginator->sort('max_price'); ?></th>
			<th><?php echo $this->Paginator->sort('min_value'); ?></th>
			<th><?php echo $this->Paginator->sort('days_valid'); ?></th>
			<th><?php echo $this->Paginator->sort('code_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('code'); ?></th>
			<th><?php echo $this->Paginator->sort('vendor_id'); ?></th>
			<th><?php echo $this->Paginator->sort('product_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('gender_segment_id'); ?></th>
			<th><?php echo $this->Paginator->sort('city_segment_id'); ?></th>
			<th><?php echo $this->Paginator->sort('age_segment_id'); ?></th>
			<th><?php echo $this->Paginator->sort('display_order'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>


	<?php
	foreach ($products as $product): ?>
	<tr>
		<td class="campaign_checkbo"><input class="campaign_checkbox" type="checkbox" name="chk1[]" id="<?php echo $product['Product']['id'];?>" value="<?php echo $product['Product']['id'];?>"> </td>
		<td><?php echo h($product['Product']['id']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['min_price']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['max_price']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['min_value']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['days_valid']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($product['CodeType']['name'], array('controller' => 'code_types', 'action' => 'view', $product['CodeType']['id'])); ?>
		</td>
		<td><?php echo h($product['Product']['code']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($product['Vendor']['name'], array('controller' => 'vendors', 'action' => 'view', $product['Vendor']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($product['ProductType']['type'], array('controller' => 'product_types', 'action' => 'view', $product['ProductType']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($product['GenderSegment']['gender'], array('controller' => 'gender_segments', 'action' => 'view', $product['GenderSegment']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($product['CitySegment']['city'], array('controller' => 'city_segments', 'action' => 'view', $product['CitySegment']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($product['AgeSegment']['name'], array('controller' => 'age_segments', 'action' => 'view', $product['AgeSegment']['id'])); ?>
		</td>
		<td><?php echo h($product['Product']['display_order']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['created']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $product['Product']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $product['Product']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $product['Product']['id']), null, __('Are you sure you want to delete # %s?', $product['Product']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<span>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</span>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Product'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Vendors'), array('controller' => 'vendors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vendor'), array('controller' => 'vendors', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Product Types'), array('controller' => 'product_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product Type'), array('controller' => 'product_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Gender Segments'), array('controller' => 'gender_segments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gender Segment'), array('controller' => 'gender_segments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Age Segments'), array('controller' => 'age_segments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Age Segment'), array('controller' => 'age_segments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List City Segments'), array('controller' => 'city_segments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New City Segment'), array('controller' => 'city_segments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Code Types'), array('controller' => 'code_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Code Type'), array('controller' => 'code_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Gifts'), array('controller' => 'gifts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gift'), array('controller' => 'gifts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Uploaded Product Codes'), array('controller' => 'uploaded_product_codes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Uploaded Product Code'), array('controller' => 'uploaded_product_codes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
 
  <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
  <script>
  $(function() {
  	
    $( "#datepicker" ).datepicker({
     dateFormat: 'yy-mm-dd',
      buttonText: "Choose the date",
  });
     $( "#datepicker1" ).datepicker({
     dateFormat: 'yy-mm-dd',
      buttonText: "Choose the date",
  });
      $( "#datepicker2" ).datepicker({
     dateFormat: 'yy-mm-dd',
      buttonText: "Choose the date",
  });
         $( "#datepicker3" ).datepicker({
     dateFormat: 'yy-mm-dd',
      buttonText: "Choose the date",
  });
            $( "#datepicker4" ).datepicker({
     dateFormat: 'yy-mm-dd',
      buttonText: "Choose the date",
  });
               $( "#datepicker5" ).datepicker({
     dateFormat: 'yy-mm-dd',
      buttonText: "Choose the date",
  });
});
  </script>

<script>
		$(document).ready(function() {
			$('#collapse1').hide();
			
		  $('.nav-toggle').click(function(){

			//get collapse content selector
			var collapse_content_selector = $(this).attr('href');					
 
			//make the collapse content to be shown or hide
			var toggle_switch = $(this);
			$(collapse_content_selector).toggle(function(){
			  if($(this).css('display')=='none'){
                                //change the button label to be 'Show'
				toggle_switch.html('Search(+)');
			  }else{
                                //change the button label to be 'Hide'
				toggle_switch.html('Search(-)');
			  }
			});
		  });
 
		});	
		</script>
<script>
    function chkValidate(){
        if($("[name='chk1[]']:checked").length<1){
            alert('Please select atleast one record.');
            return false;
        }
        return true;
    }
    checked=false;
 function checkedAll (frm1) {
 
	var aa= document.getElementById('frm1');
	 if (checked == false)
        {
           checked = true
          }
        else        {
          checked = false
          }
	for (var i =0; i < aa.elements.length; i++) 
	{
		 aa.elements[i].checked = checked;
	}
	
 }
 $(document).ready(function(){
        $('.campaign_checkbox').show();
    });
</script>
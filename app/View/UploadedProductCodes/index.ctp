<?= $this->element('admin_header'); ?>
<div class="uploadedProductCodes index">
	<h2><?php echo __('Uploaded Product Codes'); ?></h2>
	<div id="collapse1"  class="backSearch" style="border:1px solid #ccc; width:800px; padding:30px; margin-bottom:50px;">
		<?php echo $this->Form->create('UploadedProductCode', array('url' => array_merge(array('action' => 'index'), $this->params['pass']))); 
?>  <tr>
		<td></td>
        <td><?php echo $this->Form->input('id', array('type'=>'text','div' => false,'label'=>'','size'=>'1','placeholder'=>'Id'));?></td>
       <td><?php echo $this->Form->input('product_id', array('type'=>'text','div' => false,'label'=>'','size'=>'1','placeholder'=>'Product Id'));?></td>
        <td><?php echo $this->Form->input('code', array('type'=>'text','div' => false,'label'=>'','size'=>'1','placeholder'=>'Code'));?></td>
        <td><?php echo $this->Form->input('available', array('type'=>'text','div' => false,'label'=>'','size'=>'1','placeholder'=>'Available'));?></td>
        <td><?php echo $this->Form->input('expiry', array('type'=>'text','div' => false,'label'=>'','size'=>'1','placeholder'=>'Expiry'));?></td>
       <td>
         <?php echo $this->Form->submit(__('Search', true), array('div' => false));	
        if (isset($this->params['named']) & !empty($this->params['named'])){ 
            echo $this->Html->link(_('Reset Filter'), array('controller'=>'UploadedProductCodes','action'=>'index'));
        } 
        ?>
        </td>			
    </tr>
                 <?php echo $this->Form->end();?></td>
                 </div>
	 <?php echo $this->Form->create( '', array( 'id'=>'frm1' ,'name'=>'frm1' ,'controller'=>'UploadedProductCode', 'action' => 'download_code_csv', 'onsubmit'=>'return chkValidate();') );?>
        <table class="grd-chkbox" cellpadding="0" cellspacing="0" id="ordrMgmt">
         <?php  echo $this->Form->submit("Download Code CSV" ,array( 'name'=>'csv', 'class'=>'button','type'=>'submit', 'id'=>'assign' , 'label' =>'','value'=>"" ));	
              echo $this->Form->end();
             ?>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<td class="campaign_checkbo"> <input class="campaign_checkbox" type="checkbox" name="checkall"onclick='checkedAll(frm1);' > </td>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('product_id'); ?></th>
			<th><?php echo $this->Paginator->sort('code'); ?></th>
			<th><?php echo $this->Paginator->sort('available'); ?></th>
			<th><?php echo $this->Paginator->sort('expiry'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($uploadedProductCodes as $uploadedProductCode): ?>
	<tr>
		<td class="campaign_checkbo"><input class="campaign_checkbox" type="checkbox" name="chk1[]" id="<?php echo $uploadedProductCode['UploadedProductCode']['id'];?>" value="<?php echo $uploadedProductCode['UploadedProductCode']['id'];?>"> </td>
		<td><?php echo h($uploadedProductCode['UploadedProductCode']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($uploadedProductCode['Product']['id'], array('controller' => 'products', 'action' => 'view', $uploadedProductCode['Product']['id'])); ?>
		</td>
		<td><?php echo h($uploadedProductCode['UploadedProductCode']['code']); ?>&nbsp;</td>
		<td><?php echo h($uploadedProductCode['UploadedProductCode']['available']); ?>&nbsp;</td>
		<td><?php echo h($uploadedProductCode['UploadedProductCode']['expiry']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $uploadedProductCode['UploadedProductCode']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $uploadedProductCode['UploadedProductCode']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $uploadedProductCode['UploadedProductCode']['id']), null, __('Are you sure you want to delete # %s?', $uploadedProductCode['UploadedProductCode']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

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
		<li><?php echo $this->Html->link(__('New Uploaded Product Code'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
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
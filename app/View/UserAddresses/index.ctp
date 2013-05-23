<?= $this->element('admin_header'); ?>
<div class="userAddresses index">
	<h2><?php echo __('User Addresses'); ?></h2>

	<div id="collapse1"  class="backSearch" style="border:1px solid #ccc; width:800px; padding:10px; margin-bottom:70px;">

		<?php echo $this->Form->create('UserAddress', array('url' => array_merge(array('action' => 'index'), $this->params['pass']))); 
		?>

       <span><?php echo $this->Form->input('id', array('type'=>'text','div' => false,'label'=>'','size'=>'1','placeholder'=>'ID'));?></span>

       <span><?php echo $this->Form->input('username', array('type'=>'text','div' => false,'label'=>'','size'=>'10','placeholder'=>'User '));?></span>

       <span><?php echo $this->Form->input('First', array('type'=>'text','div' => false,'label'=>'','size'=>'10','placeholder'=>'First Name '));?></span>

       <span><?php echo $this->Form->input('Last', array('type'=>'text','div' => false,'label'=>'','size'=>'10','placeholder'=>'Last Name '));?></span>

       <span><?php echo $this->Form->input('Address1', array('type'=>'text','div' => false,'label'=>'','size'=>'10','placeholder'=>'Address1'));?></span>

      <span><?php echo $this->Form->input('Address2', array('type'=>'text','div' => false,'label'=>'','size'=>'10','placeholder'=>'Address2'));?></span>
      
       
        <span><?php echo $this->Form->input('city', array('type'=>'text','div' => false,'label'=>'','size'=>'10','placeholder'=>'city','id'=>'abc'));?></span>

       
       	 <span><?php echo $this->Form->input('Pin', array('type'=>'text','div' => false,'label'=>'','size'=>'10','placeholder'=>'Pin Code'));?></span>

       
       	<span><?php echo $this->Form->input('Country', array('type'=>'text','div' => false,'label'=>'','size'=>'10','placeholder'=>'Country'));?></span>

       	 <span><?php echo $this->Form->input('created_start', array('type'=>'text','div' => false,'label'=>'','size'=>'10','placeholder'=>'Created Start','id'=>'datepicker_created_start'));?>
       	 	<?php echo $this->Form->input('created_end', array('type'=>'text','div' => false,'label'=>'','size'=>'10','placeholder'=>'Created End','id'=>'datepicker_created_end'));?>
       	 </span>

       	 <span><?php echo $this->Form->input('modified_start', array('type'=>'text','div' => false,'label'=>'','size'=>'10','placeholder'=>'Modified Start','id'=>'datepicker_modified_start'));?>
       	 	<?php echo $this->Form->input('modified_end', array('type'=>'text','div' => false,'label'=>'','size'=>'10','placeholder'=>'Modified End','id'=>'datepicker_modified_end'));?>
       	 </span>
       	 <span><?php echo $this->Form->input('Phone', array('type'=>'text','div' => false,'label'=>'','size'=>'10','placeholder'=>'Phone'));?></span>
       	 <span><?php echo $this->Form->input('Email', array('type'=>'text','div' => false,'label'=>'','size'=>'10','placeholder'=>'Receiver Email'));?></span>
       	 <span><?php echo $this->Form->input('State', array('type'=>'text','div' => false,'label'=>'','size'=>'10','placeholder'=>'State'));?></span>
       	 
         <?php echo $this->Form->submit(__('Search', true), array('div' => false,'id'=>'submit'));	
        if (isset($this->params['named']) & !empty($this->params['named'])){ 
            echo $this->Html->link(_('Reset Filter'), array('controller'=>'UserAddresses','action'=>'index'));
        } 
        ?>
        </span>

         <?php echo $this->Form->end();?></td>

	</div>

	<?php echo $this->Form->create( '', array( 'id'=>'frm1' ,'name'=>'frm1' ,'controller'=>'Users', 'action' => 'download_user_csv', 'onsubmit'=>'return chkValidate();') );?>
		 <table class="grd-chkbox" cellpadding="0" cellspacing="0" id="ordrMgmt">
		 	<div class="download_csv">
		 		<?php  echo $this->Form->submit("Download User CSV" ,array( 'name'=>'csv', 'class'=>'button','type'=>'submit', 'id'=>'assign' , 'label' =>'','value'=>"" ));	
		              echo $this->Form->end();
		             ?>
		         </div>

	<table cellpadding="0" cellspacing="0" border="1">
	<tr>
			<td class="campaign_checkbo"> <input class="campaign_checkbox" type="checkbox" name="checkall"onclick='checkedAll(frm1);' > </td>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('first_name'); ?></th>
			<th><?php echo $this->Paginator->sort('last_name'); ?></th>
			<th><?php echo $this->Paginator->sort('address1'); ?></th>
			<th><?php echo $this->Paginator->sort('address2'); ?></th>
			<th><?php echo $this->Paginator->sort('city'); ?></th>
			<th><?php echo $this->Paginator->sort('pin_code'); ?></th>
			<th><?php echo $this->Paginator->sort('country'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('phone'); ?></th>
			<th><?php echo $this->Paginator->sort('reciever_email'); ?></th>
			<th><?php echo $this->Paginator->sort('state'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($userAddresses as $userAddress): ?>
	<tr>
		<td class="campaign_checkbo"><input class="campaign_checkbox" type="checkbox" name="chk1[]" id="<?php echo $userAddress['UserAddress']['id'];?>" value="<?php echo $userAddress['UserAddress']['id'];?>"> </td>
		<td><?php echo h($userAddress['UserAddress']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($userAddress['User']['id'], array('controller' => 'users', 'action' => 'view', $userAddress['User']['id'])); ?>
		</td>
		<td><?php echo h($userAddress['UserAddress']['first_name']); ?>&nbsp;</td>
		<td><?php echo h($userAddress['UserAddress']['last_name']); ?>&nbsp;</td>
		<td><?php echo h($userAddress['UserAddress']['address1']); ?>&nbsp;</td>
		<td><?php echo h($userAddress['UserAddress']['address2']); ?>&nbsp;</td>
		<td><?php echo h($userAddress['UserAddress']['city']); ?>&nbsp;</td>
		<td><?php echo h($userAddress['UserAddress']['pin_code']); ?>&nbsp;</td>
		<td><?php echo h($userAddress['UserAddress']['country']); ?>&nbsp;</td>
		<td><?php echo h($userAddress['UserAddress']['created']); ?>&nbsp;</td>
		<td><?php echo h($userAddress['UserAddress']['modified']); ?>&nbsp;</td>
		<td><?php echo h($userAddress['UserAddress']['phone']); ?>&nbsp;</td>
		<td><?php echo h($userAddress['UserAddress']['reciever_email']); ?>&nbsp;</td>
		<td><?php echo h($userAddress['UserAddress']['state']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $userAddress['UserAddress']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $userAddress['UserAddress']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $userAddress['UserAddress']['id']), null, __('Are you sure you want to delete # %s?', $userAddress['UserAddress']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<div class="paging">
          	<?php
          	    if ($this->Paginator->hasPrev()) {
          		echo $this->Paginator->prev($this->html->image('35x35_prev.png' , array("title" => "Prev")), array('escape' => false), null, array('class' => 'prev disabled'));
          	}
          		 if ($this->Paginator->hasNext()) {
          		 echo $this->Paginator->next($this->html->image('35x35_next.png' , array("title" => "next")),array('escape' => false), null, array('class' => 'next disabled'));
          	}
          	?>
              </div>
              <div style="width:auto;height:auto;margin-top:-18px;margin-left:100px;" >
          		<br><?php echo $this->Paginator->numbers(array('separator' => ' | ','modulus'=>'10','first'=>'First Page ','last'=>' Last Page'));?>
              </div> 
              <div style="width:auto;height:auto;margin-top:20px;margin-left:50px;" >
          			<?php
          			echo $this->Paginator->counter(array(
          				'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
          				));
          				?>	
              </div>
          </div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New User Address'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>


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

<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
 
  <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
  <script>
  $(function() {
  	
    $( "#datepicker_created_start" ).datepicker({
     dateFormat: 'yy-mm-dd',
      buttonText: "Choose the date",
  	});
  	$( "#datepicker_created_end" ).datepicker({
     dateFormat: 'yy-mm-dd',
      buttonText: "Choose the date",
  	});
  	$( "#datepicker_modified_start" ).datepicker({
     dateFormat: 'yy-mm-dd',
      buttonText: "Choose the date",
  	});
  	$( "#datepicker_modified_end" ).datepicker({
     dateFormat: 'yy-mm-dd',
      buttonText: "Choose the date",
  	});
   });
  </script>
  <script>
  $(document).ready(function() {
  	$('#submit').click(function(){
  		if($("#datepicker_created_start").val().length == 0 && $("#datepicker_created_end").val().length != 0){
  			alert("Please enter start date");
  	return false;
  		}

  		if($("#datepicker_modified_start").val().length == 0 && $("#datepicker_modified_end").val().length != 0){
  			alert("Please enter start date");
  	return false;
  		}
  		
  	});
  });
  </script>
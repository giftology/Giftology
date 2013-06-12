<?= $this->element('admin_header'); ?>

<div class="userUtms index">
	<h2><?php echo __('User Utms'); ?></h2>
	<div id="collapse1"  class="backSearch" style="border:1px solid #ccc; width:800px; padding:10px; margin-bottom:70px;">
		<?php echo $this->Form->create('UserUtm', array('url' => array_merge(array('action' => 'index'), $this->params['pass']))); 
?>       <tr>
        <td><?php echo $this->Form->input('id', array('type'=>'text','div' => false,'label'=>'','size'=>'1','placeholder'=>'Id'));?></td>
        <td><?php echo $this->Form->input('user_id', array('type'=>'text','div' => false,'label'=>'','size'=>'10','placeholder'=>' user_id'));?></td>
        <td><?php echo $this->Form->input('utm_source', array('type'=>'text','div' => false,'label'=>'','size'=>'10','placeholder'=>' utm_source'));?></td>
        <td><?php echo $this->Form->input('utm_medium', array('type'=>'text','div' => false,'label'=>'','size'=>'10','placeholder'=>' utm_medium'));?></td>
        <td><?php echo $this->Form->input('utm_campaign', array('type'=>'text','div' => false,'label'=>'','size'=>'10','placeholder'=>' utm_campaign'));?></td>
        <td><?php echo $this->Form->input('utm_term', array('type'=>'text','div' => false,'label'=>'','size'=>'10','placeholder'=>' utm_term'));?></td>
        <td><?php echo $this->Form->input('utm_content', array('type'=>'text','div' => false,'label'=>'','size'=>'10','placeholder'=>' utm_content'));?></td>
        
      
        <td><?php echo $this->Form->input('created_start', array('type'=>'text','div' => false,'label'=>'','size'=>'15','id'=>'datepicker2',"placeholder"=>'Created Start Date'));?>
		<?php echo $this->Form->input('created_end', array('type'=>'text','div' => false,'label'=>'','size'=>'15','id'=>'datepicker3','placeholder'=>'Created End Date'));?>
        </td>
        <td><?php echo $this->Form->input('modified_start', array('type'=>'text','div' => false,'label'=>'','size'=>'15','id'=>'datepicker4',"placeholder"=>'Modified Start Date'));?>
			<?php echo $this->Form->input('modified_end', array('type'=>'text','div' => false,'label'=>'','size'=>'15','id'=>'datepicker5','placeholder'=>'Modified End Date'));?>
        </td>
        
       <td>
         <?php echo $this->Form->submit(__('Search', true), array('div' => false));	
        if (isset($this->params['named']) & !empty($this->params['named'])){ 
            echo $this->Html->link(_('Reset Filter'), array('controller'=>'user_utms','action'=>'index'));
        } 
        ?>
        </td>			
    </tr>
                 <?php echo $this->Form->end();?>
                 </div>
                
	 <?php echo $this->Form->create( '', array( 'id'=>'frm1' ,'name'=>'frm1' ,'controller'=>'UserUtm', 'action' => 'download_utm_csv', 'onsubmit'=>'return chkValidate();') );?>
        <table class="grd-chkbox" cellpadding="0" cellspacing="0" id="ordrMgmt">
        	<div class="download_csv">
             <?php  echo $this->Form->submit("Download UTM CSV" ,array( 'name'=>'csv', 'class'=>'button','type'=>'submit', 'id'=>'assign' , 'label' =>'','value'=>"" ));	
              echo $this->Form->end();
             ?>
             </div>
     <div class="full_download">
	  <?php 
	  echo $this->Html->link('Download All', array('controller' => 'user_utms', 'action' => 'download_utm_all', $download_selected),array('class' => 'button')); ?>
		</div>
	<table cellpadding="0" cellspacing="0" border="1">
	<tr><td class="campaign_checkbo"> <input class="campaign_checkbox" type="checkbox" name="checkall"onclick='checkedAll(frm1);' > </td>
	
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('utm_source'); ?></th>
			<th><?php echo $this->Paginator->sort('utm_medium'); ?></th>
			<th><?php echo $this->Paginator->sort('utm_campaign'); ?></th>
			<th><?php echo $this->Paginator->sort('utm_term'); ?></th>
			<th><?php echo $this->Paginator->sort('utm_content'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($userUtms as $userUtm): ?>
	<tr>
		<td class="campaign_checkbo"><input class="campaign_checkbox" type="checkbox" name="chk1[]" id="<?php echo $userUtm['UserUtm']['id'];?>" value="<?php echo $userUtm['UserUtm']['id']?>"> </td>
		<td><?php echo h($userUtm['UserUtm']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($userUtm['User']['id'], array('controller' => 'users', 'action' => 'view', $userUtm['User']['id'])); ?>
		</td>
		<td><?php echo h($userUtm['UserUtm']['utm_source']); ?>&nbsp;</td>
		<td><?php echo h($userUtm['UserUtm']['utm_medium']); ?>&nbsp;</td>
		<td><?php echo h($userUtm['UserUtm']['utm_campaign']); ?>&nbsp;</td>
		<td><?php echo h($userUtm['UserUtm']['utm_term']); ?>&nbsp;</td>
		<td><?php echo h($userUtm['UserUtm']['utm_content']); ?>&nbsp;</td>
		<td><?php echo h($userUtm['UserUtm']['created']); ?>&nbsp;</td>
		<td><?php echo h($userUtm['UserUtm']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $userUtm['UserUtm']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $userUtm['UserUtm']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $userUtm['UserUtm']['id']), null, __('Are you sure you want to delete # %s?', $userUtm['UserUtm']['id'])); ?>
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

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New User Utm'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
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


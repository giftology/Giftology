<h3>Settings</h3>
<?php echo $this->Form->create( '', array( 'id'=>'frm1' ,'name'=>'frm1' ,'controller'=>'users', 'action' => 'email_stop') );
if($check)
{
  echo $this->Form->input('Currently unsubscribed, Check this box and submit to resubscribe', array('type' => 'checkbox','name'=>'chk','id'=>'chk1','checked'=>'')); 
}
else
{
  echo $this->Form->input('Unsubscribe from email updates', array('type' => 'checkbox','name'=>'chk','id'=>'chk1','checked'=>$check));
}
 
    
   	echo $this->Form->Submit("Submit",array('onClick'=>'check()')); 
   	
     echo $this->Form->end();?>
     <script type="text/javascript">

      $(document).ready(function(){
      		$(".submit").click(function (){
      			if($("[id='chk1']:checked").length<1){
      				alert("Please select the checkbox to unsubscribe !!");
      				return false;
      			}
      		});
      	});
      
      </script>
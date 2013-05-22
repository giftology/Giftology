<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'Giftology: careers');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php echo $this->Facebook->html(); ?>

	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription; ?>
		<?php echo $title_for_layout; ?>
	</title>
	

		
	
   <script>
$(document).ready(function(){
  $(".showtext").click(function(){
    $(".hiddentext").slideToggle("slow"); 
    });
   $(".showtext1").click(function(){
    $(".hiddentext1").slideToggle("slow"); 
    });
});
   </script>
   


<div id="foot_content" style="height:800px ;">
  
  <center ><h3 class="careerMainHead" >Notifications</h3></center>
  <div class="media" >
    
       
    <p id="contacttexth1" style="text-align:center;" >We can let you know when things you're interested in happen.<br>
Just make sure to check the boxes you want below you don't miss anything! </p>


    
   
    
    

    <div id="foot_content_contact" style="margin-top:30px;" >

      <div  class="careerCustom">


    <p  id="contacttexth1" style="color:#900; padding:0; ">
          <?php echo $this->Form->create( '', array( 'id'=>'frm1' ,'name'=>'frm1' ,'controller'=>'users', 'action' => 'email_stop') );
            if($check)
            {
              echo $this->Form->input('Currently unsubscribed, Check this box and submit to resubscribe', array('type' => 'checkbox','name'=>'chk','id'=>'chk1','checked'=>'')); 
            }
            else
            {
              echo $this->Form->input("<p style='color:#900; font-size:18px;'> My gifts</p>", array('type' => 'checkbox','name'=>'chk','id'=>'chk1', 'checked'=>$check));
              echo "<p class='careertext' style='padding-left:35px;'>We'll let you know when you receive a gift and when it's about to expiry.</p>";
            }
        ?>
    </p>
    
    <p style="border-bottom:1px dotted #999; margin-bottom:18px;">&nbsp;</p>



<!--/////////////////////-->


    <p  id="contacttexth1" style="color:#900; padding:0; ">
          <?php echo $this->Form->create( '', array( 'id'=>'frm1' ,'name'=>'frm1' ,'controller'=>'users', 'action' => 'email_stop') );
            if($check)
            {
              echo $this->Form->input('Currently unsubscribed, Check this box and submit to resubscribe', array('type' => 'checkbox','name'=>'chk','id'=>'chk2','checked'=>'')); 
            }
            else
            {
              echo $this->Form->input("<p style='color:#900; font-size:18px;'> Birthdays event</p>", array('type' => 'checkbox','name'=>'chk','id'=>'chk2', 'checked'=>$check));
              echo "<p class='careertext' style='padding-left:35px;'>We'll notify you when your friends have their birthday.</p>";
            }
        ?>
    </p>
    
    <p style="border-bottom:1px dotted #999; margin-bottom:18px;">&nbsp;</p>




<!--/////////////////////-->


    <p  id="contacttexth1" style="color:#900; padding:0; ">
          <?php echo $this->Form->create( '', array( 'id'=>'frm1' ,'name'=>'frm1' ,'controller'=>'users', 'action' => 'email_stop') );
            if($check)
            {
              echo $this->Form->input('Currently unsubscribed, Check this box and submit to resubscribe', array('type' => 'checkbox','name'=>'chk','id'=>'chk3','checked'=>'')); 
            }
            else
            {
             echo $this->Form->input("<p style='color:#900; font-size:18px;'> New brands and special campaigns</p>", array('type' => 'checkbox','name'=>'chk','id'=>'chk3', 'checked'=>$check));
              echo "<p class='careertext' style='padding-left:35px;'>We'll let you know when we launch brands or have special campaigns.</p>";
            }
        ?>
    </p>
    
    <p style="border-bottom:1px dotted #999; margin-bottom:18px;">&nbsp;</p>




<!--/////////////////////-->

 
    <p  id="contacttexth1" style="color:#900; padding:0; ">
          <?php echo $this->Form->create( '', array( 'id'=>'frm1' ,'name'=>'frm1' ,'controller'=>'users', 'action' => 'email_stop') );
            if($check)
            {
              echo $this->Form->input('Currently unsubscribed, Check this box and submit to resubscribe', array('type' => 'checkbox','name'=>'chk','id'=>'chk4','checked'=>'')); 
            }
            else
            {
             echo $this->Form->input("<p style='color:#900; font-size:18px;'> Summary email every Week/ Month</p>", array('type' => 'checkbox','name'=>'chk','id'=>'chk4', 'checked'=>$check));
              echo "<p class='careertext' style='padding-left:35px;'>We'll send you a summary of what's happening at Wrapp and fun stuff coming up.
The email will be sent to parul.2919@gmail.com, we use the same email as you use on facebook.</p>";
            }
        ?>
    </p>
    
    <p style="border-bottom:1px dotted #999; margin-bottom:18px;">&nbsp;</p>



<!--/////////////////////-->


    <p  id="contacttexth1" style="color:#900; padding:0; ">
          <?php echo $this->Form->create( '', array( 'id'=>'frm1' ,'name'=>'frm1' ,'controller'=>'users', 'action' => 'email_stop') );
            if($check)
            {
              echo $this->Form->input('Currently unsubscribed, Check this box and submit to resubscribe', array('type' => 'checkbox','name'=>'chk','id'=>'chk5','checked'=>'')); 
            }
            else
            {
              
              echo $this->Form->input("<p style='color:#900; font-size:18px;'> Unsubscribe from email updates</p>", array('type' => 'checkbox','name'=>'chk','id'=>'chk5', 'checked'=>$check));
              echo "<p class='careertext' style='padding-left:35px;'>You will not get any updates or any mails from our side.</p>";
            }
        ?>
    </p>
    
 <p>&nbsp;</p> <p>&nbsp;</p>
 
 <?php  
    echo $this->Form->Submit("Submit",array('onClick'=>'check()', )); 
    
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


      
</div>

</div>
</div>
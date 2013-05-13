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

$cakeDescription = __d('cake_dev', 'Giftology: Privacy Policy');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php echo $this->Facebook->html(); ?>

	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription; ?>
		<?php echo $title_for_layout; ?>
	</title>
	




		
		
	
   
   
       
                    




<div id="foot_content" style="height:1000px;">
<div class="media">




              <center><h2>PARTNER WITH US!</h2></center>
             <p id="contacttext" style="color:#333">Giftology is the new age, social gifting platform that presents your brand and products to 71 million Facebook fans. Our innovative and unique ‘try-n-buy’ concept allows prospective customers to discover your brand and also introduce it to their friends and family.</p>


                <p id="contacttext" style="color:#333;margin-top:15px;"><strong>What do we do?</strong></p>
  
                  <p id="contacttext" style="color:#333; ">We help generate store traffic, increase footfalls for brick and mortar stores, and web traffic for your business!</p>
  
                 <p id="contacttext" style="color:#333;margin-top:15px;"><strong>How?</strong></p>
  
                  <p id="contacttext" style="color:#333">By letting customers send free gifts to their friends and family via Facebook. Or, purchase paid vouchers that can be easily gifted to friends and family over Facebook.</p>
  
                  <p id="contacttext" style="color:#333;margin-top:15px;"><strong>Does this help?</strong></p>
  
                   <p id="contacttext" style="color:#333">Of course it does! Your brand gets massive visibility with high number of unique viewers of the brand. Increased goodwill among existing users and a huge potential to bring in new users!</p>
                   <br>
  
                  <p id="contacttext" style="color:#333"><strong>Convinced? Learn how we can work together to help you increase sales with performance marketing by filling out the form below.</strong></p>

    <center><h3>Get in Touch</h3></center>      
   <div id="foot_content_contact" >
    

      <div id="retailer_form" >
  
                    <br>
                  

               <?php echo $this->Form->create( 'retailers', array( 'id'=>'frm1' ,'name'=>'frm1' ,'controller'=>'retailers', 'action' => 'retailer_mail') );   ?> 
                <!--name with input mandatory constraint-->
                 <div class="input email">
                   
                      <div class="input email"  ><?php echo $this->Form->input("r_name" ,array('name'=>'name_r','label' => false,'id'=>'r_name','div' => false,'class'=>"umstyle5",'placeholder' => "Name",'style' => "width: 400px;height: 5px;border: 1px solid #B54D4D;border-radius: 2px"))?> 
                      </div>
                       <div class="error_message" id="error_name" style="display:none; margin-left:180px;">
                         <span style="color:#808080">*please enter the name.</span>
                        </div>
                
                </div>
                       <!--no constraints for web portal-->
                <div class="input email" style="margin-top:10px">
                    
                    <div class="input email" ><?php echo $this->Form->input("r_website" ,array('name'=>'web_r','label' => false,'div' => false,'class'=>"umstyle5", 'placeholder' => "www.example.com",'style' => "width: 400px;height: 5px;border: 1px solid #B54D4D;border-radius: 2px" ))?>
                    </div>
                   
                </div>

            
         
            
            
           
                   <!--mandatory input for city-->
               <div class="input email" style="margin-top:10px">
               
                  <div class="input email" ><?php echo $this->Form->input("r_city" ,array('name'=>'city_r','id' => 'r_city','label' => false,'div' => false,'placeholder' => "City",'style' => "width: 400px;height: 5px;border: 1px solid #B54D4D;border-radius: 2px"))?>
                  </div>
                  <div class="error_message" id="error_city" style="display:none; margin-left:180px;">
                    <span style="color:#808080">*please enter the city.</span>
                 </div>
              </div>
           
            
          
           
            

            
           
             
                   <!--Contact no. constraint-->
              <div class="input email" style="margin-top:10px">
                 
                    <div class="input email" ><?php echo $this->Form->input("r_phone" ,array('name'=>'contact_r','label' => false,'id'=>'r_phone','div' => false,'class'=>"umstyle5",'placeholder' => "Contact no." ,'style' => "width: 400px;height: 5px;border: 1px solid #B54D4D;border-radius: 2px"))?>
                    </div>
                    <div class="error_message" id="error_phone" style="display:none; margin-left:180px;">
                       <span style="color:#808080">*please enter the 10 digit mobile no./ landline no. along with std code.</span>
                    </div>
              </div>
                 <!--no constraints for mail id -->
             <div class="input email" style="margin-top:10px">
                          
                          <div class="input email" ><?php echo $this->Form->textarea("r_mail" ,array('rows'=>'5','cols'=>'5','name'=>'mail_r','label' => false,'div' => false,'class'=>"umstyle5", 'placeholder' => "abc@example.com",'style' => "width: 418px;border: 1px solid #B54D4D;border-radius: 2px; float:left" ))?>
                          </div>
                    
              </div>

                          
             <br>
                
            
               <div class="retail_submit">
                    <?php echo $this->Form->submit(__('Submit'));
                    echo $this->Form->end();



                    ?>  
            

          
               </div>

          
    </div>
     



      
</div>
</div>
</div>
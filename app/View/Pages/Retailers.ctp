
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

$cakeDescription = __d('cake_dev', 'Giftology: Retailers');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php echo $this->Facebook->html(); ?>

  <?php echo $this->Html->charset(); ?>
  <title>
    <?php echo $cakeDescription; ?>
    
  </title>
  


<script type="text/javascript">

      $(document).ready(function(){
            $(".submit").click(function (){
                var e = false;
              var emailRegex = new RegExp(/^[0-9-+]+$/);
               var valid_phone = emailRegex.test($("#r_phone").val());
            var valid_pin = emailRegex.test($("#r_pin").val());
              
                if(!valid_phone || $("#r_phone").val().length < 10){
                $("#error_phone").show();
                        e = true;
                }
                   else if($("#r_phone").val().length > 10)
                 {
                 $("#error_phone").show();
                   e = true;
                      }
                else{
                    $("#error_phone").hide();
                }
              /*  if(!valid_pin || $("#r_pin").val().length < 6){
                    $("#error_pin").show();
                        e = true;
                }
                  else if($("#r_pin").val().length > 6)
                     {
                       $("#error_pin").show();
                        e = true;
                   }
                else{
                    $("#error_pin").hide();    
                } */
                if ($("#r_name").val().length == 0) {
                    $("#error_name").show();
                    e = true;
                }
                else{
                    $("#error_name").hide();    
                }  
                /*
                if ($("#r_address").val().length == 0) {
                    $("#error_address").show();
                    e = true;
                }
                else{
                    $("#error_address").hide();    
                } */
                if ($("#r_city").val().length == 0) {
                    $("#error_city").show();
                    e = true;
                }
                else{
                    $("#error_city").hide();    
                } 
                /*
                if ($("#r_state").val().length == 0) {
                    $("#error_state").show();
                    e = true;
                }
                else{
                    $("#error_state").hide();    
                } */
                 
                
                       
               
                     if(e) return false; 
                        
                
            });
           
        });
      
      </script>

   
    
    
  
   
   
       
                    






          <div class="content">
                <center><h2>Partner with us!</h2></center>
            <p>   Giftology is the new age, social gifting platform that presents your brand/products to 71 million FB fans. Its innovative, unique ‘try-n-buy’ concept allows prospective customers to discover your brand and also introduce it to their friends and family. </p>
            <br>
             <p>We help generate in person and online traffic for top brands by letting customers send free and paid gifts to their friends and family via Facebook. Learn how we can work together to help you increase sales with Giftology by filling out the form below: </p>
                <!-- <p>Email us at partner@giftology.com</p> -->

          </div>
           <div class="retail">
    
    

                              <h3>Get in Touch!</h3>
                                 <br>
              <div class="retail-form">
  
                    <br>
                    <?php if($user){ ?>
             <?php echo $this->Form->create( '', array( 'id'=>'frm1' ,'name'=>'frm1' ,'controller'=>'users', 'action' => 'retailer_mail') ); ?>

               <?php } 
               else{ ?>

               <?php echo $this->Form->create( '', array( 'id'=>'frm1' ,'name'=>'frm1' ,'controller'=>'pages', 'action' => 'test') );  } ?>
                <!--name with input mandatory constraint-->
                 <div class="input email">
                      <label for="email">Hi! My name is</label>
                      <div class="input email" ><?php echo $this->Form->input("r_name" ,array('name'=>'name_r','label' => false,'id'=>'r_name','div' => false,'class'=>"umstyle5",'placeholder' => "Name"))?> 
                      </div>
                       <div class="error_message" id="error_name" style="display:none; margin-left:120px;">
                         <span style="color:#808080">*please enter the name</span>
                        </div>
                
                </div>
                       <!--no constraints for web portal-->
                <div class="input email" style="margin-top:10px">
                    <label for="email">Website</label>
                    <div class="input email" ><?php echo $this->Form->input("r_website" ,array('name'=>'web_r','label' => false,'div' => false,'class'=>"umstyle5", 'placeholder' => "www.example.com" ))?>
                    </div>
                   
                </div>

            
          
               <div class="input email" style="margin-top:10px">
                    <label for="email">It Deals with</label>
              
                    <!--strict field -->
                     <div class="input email" ><?php echo $this->Form->input("last_name" ,array('name'=>'deals_r','type' => 'select','options' => array('Book/music/Entertainemt'=> 'Book/music/Entertainemt', 'Fashion' => 'Fashion','Department Stores'=>'Department Stores','Furniture/Home Interior'=>'Furniture/Home Interior','Health/Beauty/Bodycare'=>'Health/Beauty/Bodycare','Jewelery/accessories'=>'Jewelery/accessories','Restaurants/cafes'=>'Restaurants/cafes','Spoorting Goods'=>'Spoorting Goods','id9'=>'Toys','Travel'=>'Travel','Others'=>'Others'),'label' => false,'div' => false,'class'=>"umstyle5" ))?> </div>
                  
                      </div>

            
            
                   <!--  for address field 
                   <div class="input email" style="margin-top:10px">
                   <label for="email">Available at</label>
                   <div class="input email" ><?php echo $this->Form->input("r_address" ,array('name'=>'address_r','id'=>'r_address','type'=>'textarea','label' => false,'div' => false,'class'=>"umstyle5"))?>
                   </div>
                   <div class="error_message" id="error_address" style="display:none; margin-left:120px;">
                    <span style="color:#FF0000">*please enter the address.</span>
                   </div>
                      </div>
                    -->
                    <!--no constraints for no. of outlets-->
              <div class="input email" style="margin-top:10px">
                  <label for="email">No. Of outlets</label>
                   <div class="input email" ><?php echo $this->Form->input("r_outlet" ,array('name'=>'outlet_r','id' => 'r_outlet', 'label' => false,'div' => false,'class'=>"umstyle5",'placeholder' => "Outlets" ))?>
                   </div>
                   
               </div>  
            
                   <!--mandatory input for city-->
               <div class="input email" style="margin-top:10px">
                <label for="email">City</label>
                  <div class="input email" ><?php echo $this->Form->input("r_city" ,array('name'=>'city_r','id' => 'r_city','label' => false,'div' => false,'placeholder' => "city"))?>
                  </div>
                  <div class="error_message" id="error_city" style="display:none; margin-left:120px;">
                    <span style="color:#808080">*please enter the city.</span>
                 </div>
              </div>
           
            
          
           
            

            
           
             
                   <!--Contact no. constraint-->
              <div class="input email" style="margin-top:10px">
                  <label for="email">Contact me</label>
                    <div class="input email" ><?php echo $this->Form->input("r_phone" ,array('name'=>'contact_r','label' => false,'id'=>'r_phone','div' => false,'class'=>"umstyle5",'placeholder' => "contant no." ))?>
                    </div>
                    <div class="error_message" id="error_phone" style="display:none; margin-left:120px;">
                       <span style="color:#808080">*please enter the 10 digit mobile no.</span>
                    </div>
              </div>
                 <!--no constraints for mail id -->
             <div class="input email" style="margin-top:10px">
                          <label for="email">Mail me</label>
                          <div class="input email" ><?php echo $this->Form->input("r_mail" ,array('name'=>'mail_r','label' => false,'div' => false,'class'=>"umstyle5", 'placeholder' => "abc@example.com" ))?>
                          </div>
                    
              </div>

                          
             
                
            
               <div class="retail_submit">
                    <?php echo $this->Form->submit(__('Submit'));
                    echo $this->Form->end();



                    ?>  
            

          
               </div>

          
    </div>
</div>
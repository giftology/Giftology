
<?php


$cakeDescription = __d('cake_dev', 'Giftology: Retailers');
?>
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

   
    
    
  
   
   
       
                    





          <div id="foot_content">
          <div class="content">

                <center><h2>PARTNER WITH US!</h2></center>
             <p> Giftology is the new age, social gifting platform that presents your brand and products to 71 million Facebook fans. Our innovative and unique ‘try-n-buy’ concept allows prospective customers to discover your brand and also introduce it to their friends and family.</p>


                <p><strong>What do we do?</strong></p>
  
                  <p>We help generate store traffic, increase footfalls for brick and mortar stores, and web traffic for your business!</p>
  
                 <p><strong>How?</strong></p>
  
                  <p>By letting customers send free gifts to their friends and family via Facebook. Or, purchase paid vouchers that can be easily gifted to friends and family over Facebook.</p>
  
                  <p><strong>Does this help?</strong></p>
  
                   <p>Of course it does! Your brand gets massive visibility with high number of unique viewers of the brand. Increased goodwill among existing users and a huge potential to bring in new users!</p>
                   <br>
  
                  <p><strong>Convinced? Learn how we can work together to help you increase sales with performance marketing by filling out the form below.</strong></p>

          </div>
        </div>
           <div class="retail">
    
    

                              <h3>Get in Touch!</h3>
                                 <br>
              <div class="retail-form">
  
                    <br>
                  

               <?php echo $this->Form->create( 'retailers', array( 'id'=>'frm1' ,'name'=>'frm1' ,'controller'=>'retailers', 'action' => 'retailer_mail') );   ?> 
                <!--name with input mandatory constraint-->
                 <div class="input email">
                      <label for="email">Hi! My name is</label>
                      <div class="input email" ><?php echo $this->Form->input("r_name" ,array('name'=>'name_r','label' => false,'id'=>'r_name','div' => false,'class'=>"umstyle5",'placeholder' => "Name"))?> 
                      </div>
                       <div class="error_message" id="error_name" style="display:none; margin-left:180px;">
                         <span style="color:#808080">*please enter the name.</span>
                        </div>
                
                </div>
                       <!--no constraints for web portal-->
                <div class="input email" style="margin-top:10px">
                    <label for="email">Website/Company</label>
                    <div class="input email" ><?php echo $this->Form->input("r_website" ,array('name'=>'web_r','label' => false,'div' => false,'class'=>"umstyle5", 'placeholder' => "www.example.com" ))?>
                    </div>
                   
                </div>

            
          
               <div class="input email" style="margin-top:10px">
                    <label for="email">We deal with</label>
              
                    <!--strict field -->
                     <div class="input email" ><?php echo $this->Form->input("last_name" ,array('name'=>'deals_r','type' => 'select','options' => array('Books/Music/Entertainment'=> 'Books/Music/Entertainment', 'Fashion' => 'Fashion','Department Stores'=>'Department Stores','Furniture/Home Interior'=>'Furniture/Home Interior','Health/Beauty/Bodycare'=>'Health/Beauty/Bodycare','Jewelry/Accessories'=>'Jewelry/Accessories','Restaurants/Cafes'=>'Restaurants/Cafes','Sporting Goods'=>'Sporting Goods','Toys'=>'Toys','Travel'=>'Travel','Others'=>'Others'),'label' => false,'div' => false,'class'=>"umstyle5" ))?> </div>
                  
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
                  <label for="email">No. of outlets</label>
                   <div class="input email" ><?php echo $this->Form->input("r_outlet" ,array('name'=>'outlet_r','id' => 'r_outlet', 'label' => false,'div' => false,'class'=>"umstyle5",'placeholder' => "Outlets" ))?>
                   </div>
                   
               </div>  
            
                   <!--mandatory input for city-->
               <div class="input email" style="margin-top:10px">
                <label for="email">City</label>
                  <div class="input email" ><?php echo $this->Form->input("r_city" ,array('name'=>'city_r','id' => 'r_city','label' => false,'div' => false,'placeholder' => "City"))?>
                  </div>
                  <div class="error_message" id="error_city" style="display:none; margin-left:180px;">
                    <span style="color:#808080">*please enter the city.</span>
                 </div>
              </div>
           
            
          
           
            

            
           
             
                   <!--Contact no. constraint-->
              <div class="input email" style="margin-top:10px">
                  <label for="email">Contact me</label>
                    <div class="input email" ><?php echo $this->Form->input("r_phone" ,array('name'=>'contact_r','label' => false,'id'=>'r_phone','div' => false,'class'=>"umstyle5",'placeholder' => "Contact no." ))?>
                    </div>
                    <div class="error_message" id="error_phone" style="display:none; margin-left:180px;">
                       <span style="color:#808080">*please enter the 10 digit mobile no./ landline no. along with std code.</span>
                    </div>
              </div>
                 <!--no constraints for mail id -->
             <div class="input email" style="margin-top:10px">
                          <label for="email">Email</label>
                          <div class="input email" ><?php echo $this->Form->input("r_mail" ,array('name'=>'mail_r','label' => false,'div' => false,'class'=>"umstyle5", 'placeholder' => "abc@example.com" ))?>
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
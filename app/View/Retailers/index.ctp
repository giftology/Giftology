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
              
                if ($("#r_name").val().length == 0) {
                    $("#error_name").show();
                    
                    e = true;
                }
                else{
                    $("#error_name").hide();    
                }  
               
                if ($("#r_city").val().length == 0) {
                    $("#error_city").show();
                    
                    e = true;
                }
                else{
                    $("#error_city").hide();    
                } 
               
                 if(e) return false; 
                        
                
            });
           
        });

 
      </script>



      <script type="text/javascript">
      jQuery(document).ready(function()
{ 
$('.reset-link').click(function(){
  $('.error_message').css('display','none')
});
});
      </script>




       
                    


<div id="foot_content" style="height:1100px;">
  <div id="clicktocallPopup">

    <div class="click_to_call_form_wrapper">

        <div class="click_to_call_form">

            <div id="clicktocall_div" style="margin-top:1px; ">

                <form name="clicktocallform" id="id_clicktocallform" action="" method="POST">

                    <div class="sr_c2c_modal_heading" style="display: none;">

                        <label id="sr_c2c__heading" style="padding-right:8px;">Agent Number:</label>

                        <select id="sr_c2c_agent_numsDD">

                            

                                <option value="+919910530550">+919910530550</option>

                           

                        </select>

                    </div>

                    <input type="text"  id="click2call_cust_text" placeholder="Enter Number" maxlength="15" class="widget_tb"/>

                    <span class="call_button">

                        <input type="submit" value="Call" id="click2call_submitbtn" class="widget_c2c_button"  style="outline: none;height: 27px;min-width: 61px ; position: relative;z-index: 10; float:right;top:-20px;"/>

                    </span>

                </form>

            </div>

 

            <!-- <input type="image" src="http://www.superreceptionist.in/media/images/C2C.png"></input> -->

        </div>

        <div id="click2call_success" style="display: none" class="success_C2C">

            Call placed.

        </div>

        <div id="click2call_failure" style="display: none" class="failure_C2C">

            Failure.

        </div>

    </div>

    

</div>


<!--click to call api-->

<div class="media">
<!--click to call api -->



<p> &nbsp;</p>

 <center><h2>Partner With Us!</h2></center>




             <p id="contacttext" >Giftology is the new age, social gifting platform that presents your brand and products to 71 million Facebook fans. Our innovative and unique ‘try-n-buy’ concept allows prospective customers to discover your brand and also introduce it to their friends and family.</p>


                <p id="contacttext" style="margin-top:15px;"><strong>What do we do?</strong></p>
  
                  <p id="contacttext" >We help generate store traffic, increase footfalls for brick and mortar stores, and web traffic for your business!</p>
  
                 <p id="contacttext" style="margin-top:15px;"><strong>How?</strong></p>
  
                  <p id="contacttext" >By letting customers send free gifts to their friends and family via Facebook. Or, purchase paid vouchers that can be easily gifted to friends and family over Facebook.</p>
  
                  <p id="contacttext" style="margin-top:15px;"><strong>Does this help?</strong></p>
  
                   <p id="contacttext" >Of course it does! Your brand gets massive visibility with high number of unique viewers of the brand. Increased goodwill among existing users and a huge potential to bring in new users!</p>
                   <br>
  
                  <p id="contacttext" ><strong>Convinced? Learn how we can work together to help you increase sales with performance marketing by filling out the form below.</strong></p>

    <center><h3>Get in Touch</h3></center>      
   <div id="foot_content_contact" style="height:450px;" >
    

      <div id="retailer_form" class="contactForm" >
  
                    <br>
                  

               <?php echo $this->Form->create( 'retailers', array( 'id'=>'frm1' ,'name'=>'frm1' ,'controller'=>'retailers', 'action' => 'retailer_mail') );   ?> 
                <!--name with input mandatory constraint-->
                 <div class="input email">
                   
                      <div class="input email"  ><?php echo $this->Form->input("r_name" ,array('name'=>'name_r','label' => false,'id'=>'r_name','div' => false,'class'=>"umstyle5",'placeholder' => "Name",'style' => "width: 400px;height: 28px; padding:0;border: 1px solid #B54D4D;border-radius: 2px"))?> 
                      </div>
                       <div class="error_message" id="error_name" style="display:none;margin-bottom:-8px; ">
                         <span style="color:#FF0000; font-size:11px; ">*please enter the name.</span>
                        </div>
                
                </div>
                       <!--no constraints for web portal-->
                <div class="input email" style="margin-top:10px">
                    
                    <div class="input email" ><?php echo $this->Form->input("r_website" ,array('name'=>'web_r','label' => false,'div' => false,'class'=>"umstyle5", 'placeholder' => "Company",'style' => "width: 400px;height: 28px; padding:0;border: 1px solid #B54D4D;border-radius: 2px" ))?>
                    </div>
                   
                </div>
                

            
         
            
            
           
                   <!--mandatory input for city-->
               <div class="input email" style="margin-top:10px">
               
                  <div class="input email" ><?php echo $this->Form->input("r_city" ,array('name'=>'city_r','id' => 'r_city','label' => false,'div' => false,'placeholder' => "www.example.com",'style' => "width: 400px;height: 28px; padding:0;border: 1px solid #B54D4D;border-radius: 2px"))?>
                  </div>
                  <div class="error_message" id="error_city" style="display:none;margin-bottom:-8px;">
                    <span style="color:#FF0000; font-size:11px;">*please enter the email.</span>
                 </div>
              </div>
           
            
          
           
            

            
           
             
                   <!--Contact no. constraint-->
              <div class="input email" style="margin-top:10px">
                 
                    <div class="input email" ><?php echo $this->Form->input("r_phone" ,array('name'=>'contact_r','label' => false,'id'=>'r_phone','div' => false,'class'=>"umstyle5",'placeholder' => "Contact no." ,'style' => "width: 400px;height: 28px; padding:0;border: 1px solid #B54D4D;border-radius: 2px"))?>
                    </div>
                    <div class="error_message" id="error_phone" style="display:none;margin-bottom:-8px; ">
                       <span style="color:#FF0000; font-size:11px;">*please enter the 10 digit mobile no./ landline no. along with std code.</span>
                    </div>
              </div>

 <!--no constraints for mail id -->
                  <div class="input email" style="height: 91px;margin-top: 9px;" ><?php echo $this->Form->textarea("r_mail" ,array('rows'=>'5','cols'=>'5','name'=>'mail_r','label' => false,'div' => false,'class'=>"umstyle5", 'placeholder' => "your message",'style' => "width: 398px;border: 1px solid #B54D4D;border-radius: 2px; float:left" ))?>
                  </div>
              <!-- capcha-->
               
                 
                  <div class="input email" >
                         
                          <div class="captcha" style="width:430px; height:53px;" >
                            <div class="input email" style="margin-top:7px; width:400px; float:left; border: 1px solid #B54D4D;border-radius: 2px">
                             <div  class="captha">
                              <?php echo  $captcha ?>
                            </div>
                            
                              <?php echo $this->Form->input('captcha', array('label' => '','placeholder'=>'Solve it!','style'=>'text-align:center; width:45px; float:right;border: none;border-left: 1px solid #B54D4D;border-radius: 0;'));?>
                            </div>
                           
                          </div>
                    
                 </div>  

                
                    
             


                          
             <br>
                
            
               <div class="retail_submit">
                <input type="reset" value="reset all fields" class="reset-link" style="cursor:pointer">
                    <?php echo $this->Form->submit(__('Submit'));

                    echo $this->Form->end();
                    ?>  
            

          
               </div>
                 
            
          </div>

          
    </div>
     



      
</div>
</div>
</div>

<style type="text/css">
/* popup_box DIV-Styles*/
#popup_box {
  display:none;
  width:580px;
  height:670px;
  background-image:url(../img/back.jpg);
  background-repeat: no-repeat;
  z-index:10;
  border:2px solid #999;
  margin-top:50px;
  margin-left:120px;
  font-size:15px;
  -moz-box-shadow: 0 0 10px #666;
  -webkit-box-shadow: 0 0 10px #666;
  box-shadow: 0 0 10px #666;
  

}

.RedeemH1{ text-align:center; font:24px 'calibri',Arial, Helvetica, sans-serif; color:#000000; }
.RedeemH2{ text-align:center; font:20px 'calibri',Arial, Helvetica, sans-serif; color:#000000;}
.RedeemH3{ text-align:center; font:16px 'calibri',Arial, Helvetica, sans-serif; color:#666; text-shadow: 1px 1px #fff;}
.mar1{margin-top:50px;margin-left:41px;}
.mar2{margin-top:40px;}
.mar3{margin-top:-25px;}
.mar4{margin-top:-21px;}
.mar5{margin-left:8px;}
.lineh1{ line-height:30px;}
.lineh2{ line-height:20px;}
.lineh3{ line-height:0px;}
.brandscreen{margin: 12px auto; width:550px; background-image:url(../img/1.png); height:256px; }
.brandscreen img{ width:500px; margin:20px 24px 30px 24px;}
.done{margin:-40px auto; width:184px; height:40px;}
.coupon{width:366px; margin: 40px auto; height:60px;}
.FL{ float:left;}



#container {
  background: #f0f0f0; /*Sample*/
  width:100%;
  height:10px;
  
}
a {
  cursor: pointer;
  text-decoration:underline;
  color:#930;
}
/* This is for the positioning of the Close Link */
#popupBoxClose {
  font-size:20px;
  line-height:15px;
  right:-6px;
  top:-5px;
  position:absolute;
  color:#6fa5e2;
  font-weight:500;
  
}
input[type="text"] {
    background: none repeat scroll 0 0 #FFFFFF;
    border: 1px solid #DAD7D4;
    border-radius: 4px 4px 4px 4px;
    color: #666666;
    padding: 5px;
    resize: none;
    width:250px;
    font-size: 25px;
}


</style>

<script type="text/javascript">
  
  $(document).ready( function() {
  
    // When site loaded, load the Popupbox First
    
    $('.single').click( function() {
    loadPopupBox();
      $('.done').click( function() {
         $('#use_online_redeem').css('display','block');
         $('.cancel1').click( function() {
         $('#use_online_redeem').hide();
      });
      });
    $('#container').css('display','none')
    
    });

    
  
    $('#popupBoxClose').click( function() {     
      unloadPopupBox();

      
      $('#container').css('display','block')
    });
    
    
   
   
      $('#edit').click( function() {
        $(this).hide();
      $('#email').fadeIn(1000);
      $('#done').fadeIn(1000);
      $('#registered').css('display','none');
      
    });

    function unloadPopupBox() { // TO Unload the Popupbox
      $('#popup_box').fadeOut("slow");

      $("#container").css({ // this is just for style   
        "opacity": "1"  
      }); 
    } 
    
    function loadPopupBox() { // To Load the Popupbox
      $('#popup_box').fadeIn(1000);
      $("#container").css({ // this is just for style
        "opacity": "0.2"  
      });     
    }
     /**********************************************************/
  $(document).keydown(function(e){
    if (e.keyCode == 27) { 
      $('#popupBoxClose').click();
       return false;
    }});  
  });
</script>



 
 <!--popup box-->



<div>
        <ul id="breadcrumbs">
                <li class="breadcrumb home events">
                        <span class="left"></span>
                        <a href="<?= FULL_BASE_URL; ?>"><span class="arrow"></span></a>
                </li>
                <li class="breadcrumb">
                        <span class="left"></span>
                        <a href="<?= $this->Html->url(array('controller'=>'gifts',
                                                      'action'=>'view_gifts')); ?>"><?= $facebook_user['name']; ?>'s gifts<span class="arrow"></span></a>
                </li>
                <li>Redeem your gift</li>
                
        </ul>
        
</div>




<!-- code for showing voucher code<div id="gift-details">

        <h3><?php echo $gift['Sender']['UserProfile']['first_name'].' '.$gift['Sender']['UserProfile']['last_name']; ?> sent you this gift: <strong><?= substr($this->Time->niceShort($gift['Gift']['created']), 0, -7); ?></strong></h3>

        <div class="purchase voucher-container">
            <?= $this->element('gift_voucher',
                        array('product' => $gift,
                              'small' => false,
                              'redeem' => true),
                        array('cache' => array(
                                'key' => $gift['Product']['id'].'full_redeem'))); ?>
        </div>
        <div id="gift-redemption-details">
            <div id="redemption-code-title">Redemption Code</div>
            <?php if(strlen($gift['Gift']['code'])<=12) : ?>
              <div id="redemption-code"><center><?= $gift['Gift']['code']; ?><br><?php if($pin) echo "Pin: ".$pin;?></center></div>
            <?php else : ?>
              <div id="redemption-code-small"><center><?php $newtext = wordwrap($gift['Gift']['code'], 12, "\n", true); echo"$newtext"; ?><br><?php if($pin) echo "Pin: ".$pin;?></center></div>
            <?php endif ; ?>

            <div style="float:right;margin-top:0px;margin-left:200px;margin-right:5px;cursor:pointer;width:120;height:40px;">
                
             
              <div id = "sms" style="width:35px;height:35px;margin-top:0px;float:left;"> <?php if($gift['Gift']['sms']=="0"){?>
                 <?php  echo $this->Form->create('gifts', array('action' => 'sms','id'=>'sms1'));?> 
                       
                            <div class="input email" ><?php echo $this->Form->hidden("gift_id" ,array('label' => false,'div' => false,'value'=>$gift['Gift']['encrypted_gift_id'] ))?></div>
                            
                                <a><span class="arrow" style=""><img title="send voucher to your mobile"   src="<?= IMAGE_ROOT; ?>sms.png" /></span></a>
                                
                                
                       
                <?php echo $this->Form->end(); ?>
                <?php } ?>
             </div>
             <div id = "print" style="float:left">
                <?php  echo $this->Form->create('gifts', array('action' => 'print_pdf','id'=>'print1','target'=>'_blank'));?>
                       
                            <a id="print_pdf" target="_blank"><span class="arrow" style="margin-left:1px"><img title="print the voucher"   src="<?= IMAGE_ROOT; ?>printer.png" /></span></a>
                                 <div class="input email" ><?php echo $this->Form->hidden("gift_id" ,array('label' => false,'div' => false,'value'=>$gift['Gift']['encrypted_gift_id'] ))?></div>
                                
                       
                 <?php echo $this->Form->end(); ?>
             </div>
                
             <div id = "email_voucher"style="margin-top:3px;float:right;margin-left:4px">
                <?php if($gift['Gift']['email_status']=="0"){?>
                <?php  echo $this->Form->create('gifts', array('action' => 'email_voucher','id'=>'email1'));?>
                            <a id="email_voucher"><span class="arrow" style="margin-left:1px"><img title="email the voucher"   src="<?= IMAGE_ROOT; ?>Email_Icon_2.png" /></span></a>
                           
                                 <div class="input email" ><?php echo $this->Form->hidden("gift_id" ,array('label' => false,'div' => false,'value'=>$gift['Gift']['id'] ))?></div>
                                
                       
                 <?php echo $this->Form->end(); ?>
                  <?php }?>
             </div>
        </div>


            <div id="redeem-note" style="margin-top:40px;margin-left:5px">
               <h5>Please note: Only one code will be accepted per transaction</h5>
            </div>
        </div>
        <div id="redeem-instr" class="disclosure opened">
            <p class="heading">How to Redeem</p>
            <div class="wrapper" style="height: 0px;">
                    <p class="content shown"><?= $gift['Product']['redeem_instr']; ?></p>
            </div>
            <a class="toggle" onclick="clicky.log('#Redeem Instr Toggle','Redeem Instr Toggle');">
                    <span class="arrow"></span>
            </a>
        </div>
</div>-->


<div id="gift-details">

        <h3><?= $gift['Sender']['UserProfile']['first_name'].' '.$gift['Sender']['UserProfile']['last_name']; ?> sent you this gift: <strong><?= substr($this->Time->niceShort($gift['Gift']['created']), 0, -7); ?></strong></h3>

        <div class="purchase voucher-container">
            <?= $this->element('gift_voucher',
                        array('product' => $gift,
                              'small' => false,
                              'redeem' => true),
                        array('cache' => array(
                                'key' => $gift['Product']['id'].'full_redeem'))); ?>
        </div>
       <div class="delivery-message">
                <div class="greeting-bubble" style="font-size:14px;">

                    <?php
                    echo $gift['Gift']['gift_message']; 
                    ?>
                </div>
                
                <div class="shadow-wrapper">
                    <div class="frame">
                        <div class="img-placeholder male">
                            <?php $photo_url = "https://graph.facebook.com/".$sender."/picture"; ?>
                            <img src=<?= $photo_url; ?>>
                        </div>
                    </div>
                </div>
                
              </div>
               <?php if($gift['Product']['redemption_type']==ONLINE): ?>
                    <div class = "parent_submit">
                    <?php echo $this->Form->input("Use Online" ,array('name'=>'city_r','type' => 'submit','id' => 'r_city','class'=>'parent_submit','label' => false,'div' => false,'class'=>'imageclick','style'=>'margin-left:0px;width:290px'))?>
                    </div>

                    <div class="open-online-redeem popover fade bottom in" id="use_online" style="top: 578px; left: 624.5px; display: none;">
                <div class="arrow inner" style="top:378px;"></div>
                <div class="arrow outer" style="top:372px;"></div>
                <div class="content">
                    <h4>Are you ready?</h4>
                    <div class="buttons">
                     <span class="MaybeLAter cancel"> <img title=""   src="<?= FULL_BASE_URL; ?>/img/MaybeL_B.png"  /></span>
                        <!--<button class="cancel"> Maybe later</button>
                        <button class="single" id="<?php echo $gift['Gift']['id'];?>" style="background-color: #BE1304;color: #FFFFFF"> Redeem now </button>!-->
                       <span class="redeemNow single" id="<?php echo $gift['Gift']['id'];?>"> <img title=""   src="<?= FULL_BASE_URL; ?>/img/RedeemN_W.png"  /></span>
                    </div>
                </div>
                <div class="open" id="used_online" style="width:300px;background-color: #FAFAFA;border: 2px solid #CCCCCC;border-radius:5px 5px 5px 5px;color: #4D4D4D;font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif;font-size: 12px;line-height: 20px;padding: 8px 6px 6px;margin-bottom:10px;position:relative;margin-top: 20px;">
                      <p>Voucher will expire after use. Happy shopping!</p>
                  </div>
          </div>

                <?php else: ?>
                   <p>This is offline voucher which can be redeemed through : </p></br>
                    <div class = "parent_submit">
                      <div id="show_offline">
                       <?php echo $this->Form->input("Use in Store" ,array('name'=>'city_r','type' => 'submit','id' => 'r_city','class'=>'parent_submit','label' => false,'div' => false,'class'=>'offlineshow','style'=>'margin-left:0px;width:290px'))?>
                     </div>
                    </div>


                    <div class="open-ofline-redeem popover fade bottom in" id="use_offline" style="position:relative;width:300px;top:-70px;display: none;" class="abc">
                        <div class="arrow inner"  style=" position:relative; top:40px; margin-left:-13px;"></div>
                        <div class="arrow outer" style="position:relative; top:0; margin-left:-16px;"></div>
                        <div class="content">
                          <h4>Redeem via</h4>
                            <div class="buttons">
                               <!-- <button class="cancel">Cancel</button>-->

                                <a href="https://play.google.com/store/search?q=giftology" target="_blank">
                                        <span class="arroww android" style="position:relative;margin-left:-140px;"><img title="Go to Google Play store now"   src="<?= IMAGE_ROOT; ?>android1.png" /></span>

                                      </a>


                                 <?php if($gift['Gift']['sms']==0): ?>
                                   <?php  echo $this->Form->create('gifts', array('action' => 'sms','id'=>'sms1','style' => 'position:relative;width:0px;height:0px;'));?> 
                               
                                      <div class="input email" ><?php echo $this->Form->hidden("gift_id" ,array('label' => false,'div' => false,'value'=>$gift['Gift']['encrypted_gift_id'] ))?>
                                      </div>
                                     <a>

                                        
                                        <span class="arrow otherMob" style="position:relative;margin-left:140px;top:-41px"><img title="send voucher to your mobile"   src="<?= IMAGE_ROOT; ?>other1.png" /></span>

                                      </a>
                                  <?php echo $this->Form->end(); ?>
                                <?php endif; ?>
                            </div>
                     </div>
                   </div>
                   <?php 
                   $newDate = date("d-m-Y", strtotime($gift['Gift']['expiry_date']));
                   ?>
                  <div class="open1" id="used_online" style="width:400px;background-color: #FAFAFA;border: 2px solid #CCCCCC;border-radius:5px 5px 5px 5px;color: #4D4D4D;font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif;font-size: 12px;line-height: 20px;padding: 8px 6px 6px;margin-top:-50px;margin-bottom:10px; display:none">
                      <p>This is an special gift only for you! Please ensure you use it at the store by <?= $newDate ?>.</br></br>
                      <p>Android users can download our cool app. Other mobile users can use our cool SMS redemption option. We are working on other apps too, watch out!</p>
                  </div>
                      
                <?php endif; ?>

              
                

       


          

</div>  
<div class="clear"></div>
<script type="text/javascript">
$('#show_offline').click(function(){
  $('#use_online').hide();
  $('#use_offline').css('display','block');
  $('.open1').show();

});

      $(document).ready(function(){
            //$("#print").click(function (){
                //var value = $(this).closest('form').attr('id');
              //  $("#print_pdf").attr('target', '_blank');
                //$("#print1").submit()
            //});


             $('.android').hover(function(e) {
            $(this).find("img").attr("src", "<?php echo FULL_BASE_URL;?>/img/android2.png");
               $(".otherMob").find("img").attr("src", "<?php echo IMAGE_ROOT;?>other2.png");         
            return false;
          
        }, function() {
            $(this).find("img").attr("src", "<?php echo FULL_BASE_URL;?>/img/android1.png");
               $(".otherMob").find("img").attr("src", "<?php echo IMAGE_ROOT;?>other1.png");  
            return false;
        });



             $('.redeemNow').hover(function(e) {
            $(this).find("img").attr("src", "<?php echo FULL_BASE_URL;?>/img/RedeemN_W.png");
               $(".MaybeLAter").find("img").attr("src", "<?php echo FULL_BASE_URL;?>/img/MaybeL_B.png");         
            return false;
          
        }, function() {
            $(this).find("img").attr("src", "<?php echo FULL_BASE_URL;?>/img/RedeemN_B.png");
               $(".MaybeLAter").find("img").attr("src", "<?php echo FULL_BASE_URL;?>/img/MaybeL_W.png");  
            return false;
        });


           
        });
      
</script>

<!--<script type="text/javascript">

      $(document).ready(function(){
            $("#email_voucher").click(function (){
                $("#email1").submit()
            });
        });
</script>-->
<script type="text/javascript">

      $(document).ready(function(){

        
            $(".otherMob").click(function (){
                $("#sms1").submit()
            });
        });
</script>
<script>
$(document).ready(function(){
            $(".submit").click(function (){
                $("#use_online").show();
            });
            $(".cancel").click(function (){
                $("#use_online").hide();
            });
           
        });


</script>

<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.templates/beta1/jquery.tmpl.min.js"></script>
<script type='text/javascript'>
 $('.single').click(function() {
        // interrupt form submission
            var key_value = this.id;
           //alert(key_value);
                $.ajax({
                    type: "POST",
                    dataType: 'html',
                    async: false,
                    url: "/gifts/fetch_code",
                    data: "search_key="+key_value,
                    success: function(data) {
                      var res_data = jQuery.parseJSON(data);
                        
                        var count = res_data.length;
                        var new_row = '';
                        if(res_data == "Oops! Looks like you're too late to the party. The gift has either expired or has exceeded the daily limit. Contact us for further assistance.")
                        {
                          alert(res_data);
                        }
                        else{
                          
                        $('#gift-details').remove();
                        //$('.footer-wrap').remove();
                        $('footer').remove();
                        }
                        
                        
                         $('#ititemplate').tmpl(res_data).appendTo('.clear');
                     }

                     });
           
        });
   

</script>
<script id="ititemplate" type="text/x-jquery-tmpl">
  <div id="popup_box">
  <h1 class="RedeemH1 mar1" >Sponsored gift voucher worth Rs ${Gift.gift_amount}</h1>
  <h2 class="RedeemH1 lineh3 mar2">Use Online at:</h2>
  <h2 class="RedeemH2 lineh3"><a href="http://${Product.Vendor.vendor_website_link}" target="_blank">
  <u>${Product.Vendor.vendor_website_link}</u>
  </a>
  </h2>
  <div class="brandscreen">
  <img src="<?php echo FULL_BASE_URL.'/'.$gift['Product']['Vendor']['redeem_image'];
            ?>">
  </div>
  <p class="RedeemH3  ">Copy the code below and click on the link above.To redeem, enter your code in the 'Redeem at ${Product.Vendor.name} Gift Voucher or Card' section. </p>
  <div class="coupon">
  <div class="FL mar5" style="margin-top:10px"><img src="../img/arrow1.png"></div>
  <div class="FL mar5" > <input type="text" name="box-content" id="box-content" value="${Gift.code}"></div>
  <div class="FL mar4" id="ccb" style="float:right;margin-right:-20px;margin-top:-10px;"></div>
      </div>
      <div class="done" id="dones" style="z-index:0;"><img src="../img/done.png" align="center"></div>
     

 <div class="open-online-redeem popover fade bottom in" id="use_online_redeem" style="display: none;position:absolute; top:685px;left:30%">
                <div class="arrow inner" style=" position:relative; top:40px; margin-left:-9px;"></div>
                <div class="arrow outer"  style="position:relative; top:0; margin-left:-12px;"></div>
                <div class="content" style="position:relative;">
                    <h4>Ready?</h4>
                    <div class="buttons">
                    <?php  echo $this->Form->create(array('action' => 'redeemgift','id' => 'redeem_form'));?>                    
                                <?php echo $this->Form->hidden("gift_id" ,array('label' => false,'div' => false,'value'=>$gift['Gift']['id'] ));?>
                                <?php echo $this->Form->input("Redeem" ,array('type'=>'button','label' => false,'div' => false,'class' => 'single','style' => 'background-color: #BE1304;color: #FFFFFF'));?>
                                <?php echo $this->Form->end(); ?>
                        
                        <button class="cancel1">Cancel</button>
                    </div>
                </div>
          </div>

      
  </div>

   
 </script>    
              



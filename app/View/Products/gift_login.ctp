<?php $this->layout = 'gift_login'; ?>

        <div>
            <ul id="breadcrumbs">
                <li class="breadcrumb home events">
                    <span class="left"></span>
                    <a href="<?= FULL_BASE_URL; ?>"><span class="arrow"></span></a>
                </li>
                <li class="breadcrumb">                   
                    <a><span class="left"></span>
                    Share. Surprise.<span class="arrow"></span></a>
                </li>
                <li><?= $Gift_info['Vendor']['name']; ?></li>
            </ul>
        </div>  
        <div id="celebration-details">
            <div class="details-container">

                
                <div class="tag-icons"></div>
                <h5 class="line-header" >Celebrate your friends  with a Rs. <?=$Gift_info['Product']['min_value'] ?> voucher </h5>
                          <div style="width:530px; color:#000; font:16px/18px Arial, Helvetica, sans-serif ; text-align:justify"> <?= $Gift_info['Product']['terms_heading'] ?></div>

            </div>
            <div class="image-container">
                <div class="polaroid"><img  src="<?= FULL_BASE_URL.'/'.$Gift_info['Vendor']['thumb_image'] ?>"></div>
                <div class="paperclip"></div>
                
           
            </div>
        </div>
       
    
        
        <?php if($user): ?>

        <div style="margin-top:80px">
            <button id="myself" my_facebook_id="<?php echo $my_fb_id; ?>"> Myself </button>
            <button id="others"> Others </button>
        </div>
        <h3 class="camp_line-header">
         <p style="font: normal 17px/40px arial;color: #900"></p>
        </h3>
        
        <div id='searc_campaign'>
                                <?php //echo $this->Form->create('Campaigns'); ?>
                                <?php echo $this->Form->input('friend_name', array('label'=>'', 'placeholder' => "Search for friends...")); ?>
                               <?php echo $this->Form->Submit(__('image.png'), array('id'=>'friend_search')); ?>
            </div>
                <div id="pra" style="float:left;height:350px;margin-top:40px;margin-left:-349px; border: 1px solid; border-radius: 5px 5px 5px 5px;overflow-y:scroll; box-shadow: 0 1px 2px 3px #E5E5E5;border: 1px solid #ccc;border-radius: 5px 5px 5px 5px;padding: 5px;">

                    <table style="width:320px" class="friend_result" cellpadding="4" cellspacing="0">
                           
                            <tbody>             
                                <?php
                                    foreach ($friends_data as $data): ?>
                                    <tr class="friends">
                                    <td class="friend_row" id="<?php echo $data['Reminder']['friend_fb_id'];?>"><div style="padding-bottom: 2px;"><img src="https://graph.facebook.com/<?= $data['Reminder']['friend_fb_id']; ?>/picture?type=square"></div></td> 
                                   <td><?php echo $data['Reminder']['friend_name']; ?></td>
                                    <td class="campaign_checkbo"><input class="campaign_checkbox" type="checkbox" name="chk1[]" id="<?php echo $data['Reminder']['friend_fb_id'];?>" value="<?php echo $data['Reminder']['friend_name'];?>"> </td>

                                    </tr>
                                   

                                    <?php endforeach; ?>
                            </tbody>
                       </table>
                </div>

                
           
       <!--</div>
           <div> -->
        <!--////////////////////////////////////////////// for other friends -->
        <?php  echo $this->Form->create('gifts', array('action' => 'send_campaign','id'=>'campaign'));?>

         <div class="purchase voucher-container" style="width:400px;margin-right:80px; margin-top:30px">
            <div class="clear"></div>
            <!--<div style="float:right;margin-left:70px">-->
                <div class="disclosure opened" >
                        <p class="heading" style="font: normal 17px/20px arial;color: #999;" >Terms and conditions</p>
                        <div class="wrapper" style="height: 0px;">
                                <p class="content shown"><?= $Gift_info['Product']['terms']; ?></p>
                        </div>
                        <a class="toggle" onclick="clicky.log('#T+C Toggle','T+C Toggle');">
                                <span class="arrow"></span>
                        </a>
                </div>
           <!-- </div>-->
                <div class="clear"></div>
              <!--  <div style="float:right;positon:relative;margin-right:110px">-->
                    <div class="disclosure opened" >
                            <p class="heading" style="font: normal 17px/20px arial;color: #999;">About <?= $Gift_info['Vendor']['name']; ?></p>
                            <div class="wrapper" style="height: 0px;">
                                    <p class="content shown" ><?= $Gift_info['Vendor']['description']; ?></p>
                            </div>
                            <a class="toggle" onclick="clicky.log('#T+C Toggle','T+C Toggle');">
                                    <span class="arrow"></span>
                            </a>
                    </div>
               <!-- </div>-->
           <div class="clear"></div>


         <div class="delivery-details" >
            
            <p style="font: normal 17px/40px arial;color: #900">
            Step 2: Include a Message
        </p>        
                   <div class="delivery-message" style="margin-bottom:0px;">
                    <div class="greeting-bubble">
                        <?php echo $this->Form->textarea("gift-message" ,array('id'=>'text_message','label' => false,'div' => false,'placeholder' => "Write something nice to ",'class'=>"gift-message" ))?>
                    </div>
                    <div class="shadow-wrapper">
                        <div class="frame">
                            <div class="img-placeholder male">
                                <?php $photo_url = "https://graph.facebook.com/".$facebook_user['id']."/picture"; ?>
                                <img src=<?= $photo_url; ?>>
                            </div>
                        </div>
                    </div>
                
                    <div class="input email" ><?php echo $this->Form->hidden("contribution_amount" ,array('label' => false,'div' => false,'value'=>$Gift_info['Product']['min_value'] ))?></div>
                  
                    <div class="input email" ><?php echo $this->Form->hidden("product_id" ,array('label' => false,'div' => false,'value'=>$encrypted_id ))?></div>
                    
                    <div class="input email" ><?php echo $this->Form->hidden("vendor_id" ,array('label' => false,'div' => false,'value'=>$Gift_info['Product']['vendor_id'] ))?></div>
                    
                    <div class="input email" ><?php echo $this->Form->hidden("reciever_name" ,array('label' => false,'div' => false,'value'=>$data['Reminder']['friend_name'] ))?></div>
                    
                     <div class="error_message" id="error_text" style="display:none; margin-left:120px;">
                        <h5 style="color:#FF0000">*please enter the message.</h5>
                    </div>
                    <div class="input email" ><?php echo $this->Form->hidden("gift_id" ,array('label' => false,'div' => false,'value'=>$session_token))?></div> 
                    
            </div> <p style="font: normal 17px/40px arial;color: #900">

           </p> <div class="parent_submit" style="margin: 21px 0 0 92px;" >
            <?php  echo $this->Form->Submit(__('Share the Joy'), array('id'=>'form_shipping'));?>
            </div>      
    </div>  
    </div>
         
          
          <!-- /////////////////////////for myself///////////////////////////// -->

    <div class="my_delivery-details" style="float:left;display:none;  margin-left: 35px;
    margin-top: 0px;">
        <p style="font: normal 17px/40px arial;color: #900">
            Step 2: Include a Message
        </p>        
                   <div class="delivery-message" style="margin-bottom:0px;">
                    <div class="greeting-bubble">
                        <?php echo $this->Form->textarea("gift-message" ,array('id'=>'text_message1','label' => false,'div' => false,'placeholder' => "Write something nice to ",'class'=>"gift-message" ))?>
                    </div>
                    <div class="shadow-wrapper">
                        <div class="frame">
                            <div class="img-placeholder male">
                                <img src=<?= $photo_url; ?>>
                            </div>
                        </div>
                    </div>
                
                    <div class="input email" ><?php echo $this->Form->hidden("contribution_amount" ,array('label' => false,'div' => false,'value'=>$Gift_info['Product']['min_value'] ))?></div>
                    
                    <div class="input email" ><?php echo $this->Form->hidden("product_id" ,array('label' => false,'div' => false,'value'=>$encrypted_id ))?></div>
                    
                    <div class="input email" ><?php echo $this->Form->hidden("vendor_id" ,array('label' => false,'div' => false,'value'=>$Gift_info['Product']['vendor_id'] ))?></div>
                   
                    <div class="input email" ><?php echo $this->Form->hidden("reciever_name" ,array('label' => false,'div' => false,'value'=>'swaaaaa' ))?></div>
                   
                     <div class="error_message" id="error_text1" style="display:none; margin-left:120px;">
                        <h5 style="color:#FF0000">*please enter the message.</h5>
                    </div>
                    <div class="input email" ><?php echo $this->Form->hidden("gift_id" ,array('label' => false,'div' => false,'value'=>$session_token))?></div> 
                    
                    <!--div class="input email" ><?php echo $this->Form->hidden("chk2" ,array('label' => false,'div' => false,'value'=>$my_fb_id[$my_fb_id]))?></div-->
            </div> <p style="font: normal 17px/40px arial;color: #900">

           </p> <div class="parent_submit" style="margin: 21px 0 0 92px;" >
            <?php  echo $this->Form->Submit(__('Claim you gift'), array('id'=>'form_shipping_submit'));?>
            </div>      
    </div>

    

        
    	<?php else: ?>
        <h3 class="camp_line-header" style="margin-top:40px">
         <p style="font: normal 17px/40px arial;color: #900"> Step1: Choose Friends</p>
        </h3>
       
    	

         <p style="font: normal 17px/40px arial;color: #000"> To see list of friends</p>
    <img src="<?= FULL_BASE_URL; ?>/img/poke.png"><?php echo $this->Facebook->login(array('img' => 'fb-start-gifting.png','redirect' => array('controller'=>'products', 'action'=>'gift_login'."?encrypted_id=".$encrypted_id."&&session=".$session_token))); ?>
    <p class="blinkText"> Sign Up NOW !!!</p>

    <div class="brandWrapper">
        <div class="brandRow1"   >
        <div class="brandRow2">
        <img src="<?= FULL_BASE_URL; ?>/img/checkbox.png" />
        </div>
        <div class="benefitText">
        <p>You can gift yourself.</p>
        </div>
        </div>

        <div class="brandRow1"  >
        <div class="brandRow2">
        <img src="<?= FULL_BASE_URL; ?>/img/checkbox.png" />
        </div>
        <div class="benefitText">
        <p>You can gift Birthday reminders.</p>
        </div>
        </div>

        <div class="brandRow1"  >
        <div class="brandRow2">
        <img src="<?= FULL_BASE_URL; ?>/img/checkbox.png" />
        </div>
        <div class="benefitText textPad" >
        <p>Access to New Hot Gifts every week.</p>
        </div>
        </div>

    </div>


 <div class="purchase voucher-container" style="width:400px;margin-right:80px;margin-top:-83px;">
            <div class="clear"></div>
            <!--<div style="float:right;margin-left:70px">-->
                <div class="disclosure opened" style="margin-left:34px">
                        <p class="heading" style="font: normal 17px/20px arial;color: #999;" >Terms and conditions</p>
                        <div class="wrapper" style="height: 0px;">
                                <p class="content shown"><?= $Gift_info['Product']['terms']; ?></p>
                        </div>
                        <a class="toggle" onclick="clicky.log('#T+C Toggle','T+C Toggle');">
                                <span class="arrow"></span>
                        </a>
                </div>
           <!-- </div>-->
                <div class="clear"></div>
              <!--  <div style="float:right;positon:relative;margin-right:110px">-->
                    <div class="disclosure opened" style="margin-left:34px">
                            <p class="heading" style="font: normal 17px/20px arial;color: #999;">About <?= $Gift_info['Vendor']['name']; ?></p>
                            <div class="wrapper" style="height: 0px;">
                                    <p class="content shown" ><?= $Gift_info['Vendor']['description']; ?></p>
                            </div>
                            <a class="toggle" onclick="clicky.log('#T+C Toggle','T+C Toggle');">
                                    <span class="arrow"></span>
                            </a>
                    </div>
               <!-- </div>-->
           <div class="clear"></div>


         <div class="delivery-details" style="float:left;margin-left:32px">
            
            <p style="font: normal 17px/40px arial;color: #900">
            Step 2: Include a Message
        </p>        
                   <div class="delivery-message" style="margin-bottom:0px;">
                    <div class="greeting-bubble">
                        <?php echo $this->Form->textarea("gift-message" ,array('id'=>'text_message','label' => false,'div' => false,'placeholder' => "Write something nice to ",'class'=>"gift-message" ))?>
                    </div>
                    <div class="shadow-wrapper">
                        <div class="frame">
                            <div class="img-placeholder male">
                                <img src=<?= $photo_url; ?>>
                            </div>
                        </div>
                    </div>
                
                    </div> <p style="font: normal 17px/40px arial;color: #900">

           </p> <div class="parent_submit" style="margin: 21px 0 0 92px;" >
            <?php  echo $this->Form->Submit(__('Share the Joy'), array('id'=>'form_shipping'));?>
            </div>      
    </div> 
</div>

        <script type="text/javascript">
            $(document).ready(function(){
                $('#campaign').attr('disabled','disabled');

            });

        </script>

    <?php endif; ?>

    

    

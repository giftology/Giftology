     <div>
            <ul id="breadcrumbs">
                <li class="breadcrumb home events">
                    <span class="left"></span>
                    <a href="<?= FULL_BASE_URL; ?>"><span class="arrow"></span></a>
                </li>
                <li class="breadcrumb">                   
                    <span class="left"></span>
                    <a href="<?= $this->Html->url(array('controller'=>'products',
                                'action'=> 'view_products',
                                'receiver_id' => $receiver_id,
                                'receiver_name' => $receiver_name,
                                'receiver_birthday' => $receiver_birthday,
                                'ocasion' => $ocasion));
                        ?>"><?= $receiver_name; ?><span class="arrow"></span></a>
                </li>
                <li>Send a gift</li>
            </ul>
        <?= $this->element('celebration_details', array('receiver_name'=>$receiver_name,
                                                                'ocasion' => $ocasion),
                              array('cache' => array('key'=>$receiver_name.$ocasion))
                   ); ?>
        </div>
    
        <div id="gift-details">
            <?php         if (isset($this->request->params['named']['receiver_birthday']) &&
                        !$this->Time->isToday($this->request->params['named']['receiver_birthday']) &&
                        isset($this->request->params['named']['ocasion']) &&
                        $this->request->params['named']['ocasion'] == 'Birthday') {
                        $send_now = 0;
                    } else {
                        $send_now = 1;
                    }
            ?>
            <h3>Will be delivered: <strong><?= $send_now ? 'Today' :
                substr($this->Time->niceShort($receiver_birthday), 0, -7); ?></strong></h3>
             </div>
              <?php 
           // DebugBreak(); 
            $str1 = SHIPPED;
            $str2=$product['Product']['product_type_id'];
            $shipped=strcmp($str2,$str1); 
        if($shipped == 0)
        {   
            ?> 
            <?php  echo $this->Form->create('gifts', array('action' => 'send'));
            ?>
            <div class="delivery-details">
            <div class="delivery-message">
                <div class="greeting-bubble">
                    <?php echo $this->Form->textarea("gift-message" ,array('label' => false,'div' => false,'placeholder' => "Write something nice to $receiver_name",'class'=>"gift-message" ))?>
                </div>
                <div class="shadow-wrapper">
                    <div class="frame">
                        <div class="img-placeholder male">
                            <?php $photo_url = "https://graph.facebook.com/".$facebook_user['id']."/picture"; ?>
                            <img src=<?= $photo_url; ?>>
                        </div>
                    </div>
                </div>
            </div>
            <div class="delivery-sharing">
            <center><h3>Shipping Address</h3></center>
            <div class="input email">
                <label for="email">First Name</label>
                <div class="input email" ><?php echo $this->Form->input("address1" ,array('label' => false,'div' => false,'value'=>$receiver_name ))?></div>
            </div>
            <div class="input email">
                <label for="email">Last Name</label>
                <div class="input email" ><?php echo $this->Form->input("address2" ,array('label' => false,'div' => false,'class'=>"umstyle5" ))?></div>
            </div>
            <div class="input email">
                <label for="email">City</label>
                <div class="input email" ><?php  echo $this->Form->input("city" ,array('label' => false,'div' => false,'class'=>"umstyle5" ))?></div>
             </div>
             <div class="input email">
                <label for="email">Pin Code</label>
                <div class="input email" ><?php echo $this->Form->input("pin_code" ,array('label' => false,'div' => false,'class'=>"umstyle5" ))?></div>
            </div>
            <div class="input email">
                <label for="email">Phone</label>
                <div class="input email" ><?php echo $this->Form->input("phone" ,array('label' => false,'div' => false,'class'=>"umstyle5" ))?></div>
            </div>
            <div class="input email">
                <label for="email">State</label>
                <div class="input email" ><?php echo $this->Form->input("state" ,array('label' => false,'div' => false,'class'=>"umstyle5" ))?></div>
            </div>
            <div class="input email">
                <label for="email">Country</label>
                <div class="input email" ><?php echo $this->Form->input("country" ,array('label' => false,'div' => false,'class'=>"umstyle5" ))?></div>
            </div>
            <div class="input email" ><?php echo $this->Form->hidden("user_id" ,array('label' => false,'div' => false,'value'=>$receiver_id ))?></div>
            <div class="input email" ><?php echo $this->Form->hidden("receiver_birthday" ,array('label' => false,'div' => false,'value'=>$receiver_birthday ))?></div>
            <div class="input email" ><?php echo $this->Form->hidden("product_id" ,array('label' => false,'div' => false,'value'=>$product['Product']['id'] ))?></div>
            <div class="input email" ><?php echo $this->Form->hidden("send_now" ,array('label' => false,'div' => false,'value'=>$send_now ))?></div>
            <div class="input email" ><?php echo $this->Form->hidden("reciver_name" ,array('label' => false,'div' => false,'value'=>$receiver_name ))?></div>
             
                <div class="input checkbox"><input type="checkbox" value="facebook" name="facebook" id="post_to_fb" class="facebook" checked>
                    <label for="facebook">Share on <?= $receiver_name; ?>'s Facebook wall</label>
                </div> 
                <div class="input email">
                    <label for="email">Send email to</label>
                    <div class="input email" ><?php echo $this->Form->input("reciever_email" ,array('label' => false,'div' => false,'class'=>"umstyle5", 'placeholder' => "$receiver_name@example.com" ))?></div>
                </div>
            </div>
            <ul class="voucher-details"><li>Valid for <?= $product['Product']['days_valid']; ?> days. FREE to send</li></ul>

            <div class="parent_submit">
            <?php echo $this->Form->Submit(__('Send to '.$receiver_name));?>  
               
            </div>    
            </div>
                
            <?php
        }   
        else 
        { 
            
           echo $this->Form->create('gifts', array('action' => 'send','id'=>'pra'));
            //echo $this->Form->create('Gift'); ?>
            <div class="delivery-details">
            <div class="delivery-message">
                <div class="greeting-bubble">
                    <?php echo $this->Form->textarea("gift-message" ,array('label' => false,'div' => false,'placeholder' => "Write something nice to $receiver_name",'class'=>"gift-message" ))?>
                </div>
                <div class="shadow-wrapper">
                    <div class="frame">
                        <div class="img-placeholder male">
                            <?php $photo_url = "https://graph.facebook.com/".$facebook_user['id']."/picture"; ?>
                            <img src=<?= $photo_url; ?>>
                        </div>
                    </div>
                </div>
            </div>
            <h4>Deliver your gift</h4>
            <div class="input email" ><?php echo $this->Form->hidden("user_id" ,array('label' => false,'div' => false,'value'=>$receiver_id ))?></div>
            <div class="input email" ><?php echo $this->Form->hidden("receiver_birthday" ,array('label' => false,'div' => false,'value'=>$receiver_birthday ))?></div>
            <div class="input email" ><?php echo $this->Form->hidden("product_id" ,array('label' => false,'div' => false,'value'=>$product['Product']['id'] ))?></div>
            <div class="input email" ><?php echo $this->Form->hidden("send_now" ,array('label' => false,'div' => false,'value'=>$send_now ))?></div>
            <div class="input email" ><?php echo $this->Form->hidden("reciver_name" ,array('label' => false,'div' => false,'value'=>$receiver_name ))?></div>
            <div class="delivery-sharing">
                <div class="input checkbox"><input type="checkbox" value="facebook" name="facebook" id="post_to_fb" class="facebook" checked>
                    <label for="facebook">Share on <?= $receiver_name; ?>'s Facebook wall</label>
                </div>
                <div class="input email">
                    <label for="email">Send email to</label>
                    <div class="input email" ><?php echo $this->Form->input("reciever_email" ,array('label' => false,'div' => false,'class'=>"umstyle5", 'placeholder' => "$receiver_name@example.com" ))?></div>
                </div>
            </div>
            <ul class="voucher-details"><li>Valid for <?= $product['Product']['days_valid']; ?> days. FREE to send</li></ul>

            <div class="parent_submit">
            <?php echo $this->Form->Submit(__('Send to '.$receiver_name));?>  
               
            </div>     
            </div>

            <?php } ?>
        
        <div class="purchase voucher-container">
            <?= $this->element('gift_voucher',
                                        array('product' => $product,
                          'small' => false),
                                        array('cache' => array(
                                                'key' => $product['Product']['id'].'full'))); ?>
        </div>
        
    <div class="clear"></div>
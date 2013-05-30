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


<div style="float:right;margin-top:50px;margin-left:800px">
            
           </div>


<div id="gift-details">

        <h3 style="margin-left:50px"><?= $gift['Sender']['UserProfile']['first_name'].' '.$gift['Sender']['UserProfile']['last_name']; ?> sent you this gift: <strong><?= substr($this->Time->niceShort($gift['Gift']['created']), 0, -7); ?></strong></h3>

        <div class="purchase voucher-container">
            <?= $this->element('gift_voucher',
                        array('product' => $gift,
                              'small' => false,
                              'redeem' => true),
                        array('cache' => array(
                                'key' => $gift['Product']['id'].'full_redeem'))); ?>
        </div>
       <div class="delivery-message">
                <div class="greeting-bubble">

                    <?php
                    echo $gift['Gift']['gift_message']; 
                     echo $this->Form->textarea("gift-message" ,array('id'=>'text_message','label' => false,'div' => false,'value' => " ",'class'=>"gift-message" ));?>
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
              <?php 
                 echo $this->Form->create();
                echo $this->Form->Submit(__('Use Online'));
                ?> 
       


          

</div>	
<div class="clear"></div>
<script type="text/javascript">

      $(document).ready(function(){
            $("#print").click(function (){
                //var value = $(this).closest('form').attr('id');
                $("#print_pdf").attr('target', '_blank');
                $("#print1").submit()
            });
        });
      
</script>
<script type="text/javascript">

      $(document).ready(function(){
            $("#sms").click(function (){
                $("#sms1").submit()
            });
        });
        </script>
        <script type="text/javascript">

      $(document).ready(function(){
            $("#email_voucher").click(function (){
                $("#email1").submit()
            });
        });
        </script>

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
        <h3 style="margin-left:40px"><?= $gift['Sender']['UserProfile']['first_name'].' '.$gift['Sender']['UserProfile']['last_name']; ?> sent you this gift: <strong><?= substr($this->Time->niceShort($gift['Gift']['created']), 0, -7); ?></strong></h3>

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
              <div id="redemption-code-small"><center><?php $newtext = wordwrap($gift['Gift']['code'], 8, "\n", true); echo"$newtext"; ?><br><?php if($pin) echo "Pin: ".$pin;?></center></div>
            <?php endif ; ?>

            <div style="float:right;margin-top:0px;margin-left:200px;margin-right:5px;cursor:pointer;width:120;height:40px;">
                
             
              <div id = "sms" style="width:35px;height:35px;margin-top:0px;float:left;">
                 <?php  echo $this->Form->create('gifts', array('action' => 'sms','id'=>'sms1'));?> 
                        
                            <div class="input email" ><?php echo $this->Form->hidden("gift_id" ,array('label' => false,'div' => false,'value'=>$gift['Gift']['encrypted_gift_id'] ))?></div>
                            <?php if($gift['Gift']['sms']=="0"){?>
                                <a><span class="arrow" style=""><img title="send voucher to your mobile"   src="<?= IMAGE_ROOT; ?>sms.png" /></span></a>
                                
                                <?php } ?>
                       
                <?php echo $this->Form->end(); ?>
             </div>
             <div id = "print" style="float:left">
                <?php  echo $this->Form->create('gifts', array('action' => 'print_pdf','id'=>'print1','target'=>'_blank'));?>
                       
                            <a id="print_pdf" target="_blank"><span class="arrow" style="margin-left:1px"><img title="print the voucher"   src="<?= IMAGE_ROOT; ?>printer.png" /></span></a>
                                 <div class="input email" ><?php echo $this->Form->hidden("gift_id" ,array('label' => false,'div' => false,'value'=>$gift['Gift']['encrypted_gift_id'] ))?></div>
                                <!---->
                       
                 <?php echo $this->Form->end(); ?>
             </div>
                
             <div id = "email_voucher"style="margin-top:3px;float:right;margin-left:4px">
                <?php  echo $this->Form->create('gifts', array('action' => 'email_voucher','id'=>'email1'));?>
                        <?php if($gift['Gift']['email']=="0"){?>
                            <a id="email_voucher"><span class="arrow" style="margin-left:1px"><img title="email the voucher"   src="<?= IMAGE_ROOT; ?>Email_Icon_2.png" /></span></a>
                            <?php }?>
                                 <div class="input email" ><?php echo $this->Form->hidden("gift_id" ,array('label' => false,'div' => false,'value'=>$gift['Gift']['id'] ))?></div>
                                <!---->
                       
                 <?php echo $this->Form->end(); ?>
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

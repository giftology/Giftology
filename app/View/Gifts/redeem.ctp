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
        <h3><?= $gift['Sender']['UserProfile']['first_name'].' '.$gift['Sender']['UserProfile']['last_name']; ?> sent you this gift: <strong><?= substr($this->Time->niceShort($gift['Gift']['created']), 0, -7); ?></strong></h3>

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
            <div id="redemption-code"><?= $gift['Gift']['code']; ?><br><?php if($pin) echo "Pin: ".$pin;?></div>
            <div style="float:right;margin-top:40px;margin-left:200px">
                <a href="<?= $this->Html->url(array('controller'=>'gifts',
                                                      'action'=>'print_pdf',
                    $gift['Gift']['id'])); ?>" target="_blank"><span class="arrow" style="margin-left:1px"><img title="print the voucher"   src="<?= IMAGE_ROOT; ?>printer.png" /></span></a>
                    <?php if($gift['Gift']['sms']=="0"){?>
                    <!--<a href="<?= $this->Html->url(array('controller'=>'gifts',
                                                      'action'=>'sms',
                    $gift['Gift']['id'])); ?>" target=""><span class="arrow" style=""><img title="send voucher to your mobile"   src="<?= IMAGE_ROOT; ?>sms.png" /></span></a>-->
                    
                    <?php } ?>
            </div>
            <div id="redeem-note" style="float:right;margin-top:10px;margin-left:100px">
                Note - One Code Per Transaction
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

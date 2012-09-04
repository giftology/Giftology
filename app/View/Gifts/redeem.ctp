<div>
        <ul id="breadcrumbs">
                <li class="breadcrumb home events">
                        <span class="left"></span>
                        <a href="<?= DOMAIN_NAME; ?>"><span class="arrow"></span></a>
                </li>
                <li class="breadcrumb">
                        <span class="left"></span>
                        <a href="<?= $this->Html->url(array('controller'=>'gifts',
                                                      'action'=>'view_gifts')); ?>"><?= $facebook_user['name']; ?>'s gifts<span class="arrow"></span></a>
                </li>
                <li>Redeem your gift</li>
        </ul>
</div>
<br><br>
</div>
<div id="gift-details">
        <h3><?= $gift['Sender']['UserProfile']['first_name'].' '.$gift['Sender']['UserProfile']['last_name']; ?> sent you this gift: <strong><?= substr($this->Time->niceShort($gift['Gift']['created']), 0, -7); ?></strong></h3>

        <div class="purchase voucher-container">
            <?= $this->element('gift_voucher',
                        array('product' => $gift,
                              'small' => false),
                        array('cache' => array(
                                'key' => $gift['Product']['id'].'full'))); ?>
        </div>
        <div id="gift-redemption-details">
            <div id="redemption-code-title">Redemption Code</div>
            <div id="redemption-code"><?= $gift['Gift']['code']; ?></div>
        </div>
        <div id="redeem-instr" class="disclosure opened">
            <p class="heading">How to Redeem</p>
            <div class="wrapper" style="height: 0px;">
                    <p class="content shown"><?= $gift['Product']['redeem_instr']; ?></p>
            </div>
            <a class="toggle">
                    <span class="arrow"></span>
            </a>
        </div>
</div>	
<div class="clear"></div>


<?= debug ($gift); ?>
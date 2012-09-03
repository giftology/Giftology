<div>
        <ul id="breadcrumbs">
                <li class="breadcrumb home events">
                        <span class="left"></span>
                        <a href="#"><span class="arrow"></span></a>
                </li>
                <li class="breadcrumb">
                        <span class="left"></span>
                        <a href="#events/53376186"><?= $facebook_user['name']; ?><span class="arrow"></span></a>
                </li>
                <li>Redeem your gift</li>
        </ul>
</div>
<br><br>
<div id="gift-details">
        <h3><?= $gift['Sender']['UserProfile']['first_name'].' '.$gift['Sender']['UserProfile']['last_name']; ?> sent you this gift: <strong><?= substr($this->Time->niceShort($gift['Gift']['created']), 0, -7); ?></strong></h3>

        <div class="purchase voucher-container">
            <?= $this->element('gift_voucher',
                        array('product' => $gift,
                              'small' => false),
                        array('cache' => array(
                                'key' => $gift['Product']['id'].'full'))); ?>
        </div>
</div>	
<div class="clear"></div>


<?= debug ($gift); ?>
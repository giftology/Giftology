<?= debug($user); ?>
<div>
        <ul id="breadcrumbs">
                <li class="breadcrumb home events">
                        <span class="left"></span>
                        <a href="#"><span class="arrow"></span></a>
                </li>
                <li><?= $user['UserProfile']['first_name'].'\'s gifts'; ?></li>
        </ul>
</div>
<div>
        <h3 class="line-header">
                <span><?= $user['UserProfile']['first_name'].'\'s received gifts'; ?></span>
        </h3>
        
        <div id="campaigns">
                <?php foreach ($user['GiftsReceived'] as $gift): ?>
			<a href="<?= $this->Html->url(array('controller' => 'gifts',
				    'action' => 'redeem',
				    $gift['id'])); ?>" title="Click to redeem">
                <?= $this->element('gift_voucher',
                                array('product' => $gift['Product'],
                                      'small' => true),
                                array('cache' => array(
                                        'key' => $gift['Product']['id'].'small'))); ?>
                </a>
                <?php endforeach; ?>
        </div>
        
        
</div>	

<div>
        <h3 class="line-header">
                <span><?= $user['UserProfile']['first_name'].'\'s sent gifts'; ?></span>
        </h3>
        
        <div id="campaigns">
                <?php foreach ($user['GiftsSent'] as $gift): ?>
                <a href="#" title="Sent <?= $this->Time->niceShort($gift['created']); ?>">
                <?= $this->element('gift_voucher',
                                array('product' => $gift['Product'],
                                      'small' => true
                                      ),
                                array('cache' => array(
                                        'key' => $gift['Product']['id'].'small'))); ?>
                </a>
                <?php endforeach; ?>
        </div>
        
        
</div>	


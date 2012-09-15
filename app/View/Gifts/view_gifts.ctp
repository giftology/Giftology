<div>
        <ul id="breadcrumbs">
                <li class="breadcrumb home events">
                        <span class="left"></span>
                        <a href="<?= FULL_BASE_URL; ?>"><span class="arrow"></span></a>
                </li>
                <li><?= $facebook_user['name'].'\'s gifts'; ?></li>
        </ul>
</div>
<br><br>
<div>
        <h3 class="line-header">
                <span><?= $facebook_user['name'].'\'s received gifts&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		//echo $this->Html->link('View Sent gifts  ', array('controller' => 'gifts', 'action' => 'view_gifts', 'sent' => 1));
		//echo $this->Html->link('  View Expired/Used gifts', array('controller' => 'gifts', 'action' => 'view_gifts', 'invalid' => 1));?></span>
        </h3>
        
        <div id="campaigns">
		<div id='paginator_nav'>
                                
                        <?php
                                //Set paginator options for AJAX
                                // Not using paginator AJAX.  Using Infinite scroll
                                // ajax instead
                                /*$this->Paginator->options(array(
                                    'update' => '#friend_list',
                                    'evalScripts' => true,
                                ));*/

                                        echo $this->Paginator->prev(' << ', array(), null, array('class' => 'prev disabled'));
                                        echo $this->Paginator->next(' >> ', array(), null, array('class' => 'next disabled'));
                        ?>
                </div>

                <?php foreach ($gifts as $gift): ?>
			<?php $gift['Vendor'] = &$gift['Product']['Vendor']; ?>
			<a href="<?= $this->Html->url(array('controller' => 'gifts',
				    'action' => 'redeem',
				    $gift['Gift']['id'])); ?>" title="Click to redeem">
                <?= $this->element('gift_voucher',
                                array('product' => $gift,
                                      'small' => true,
				      'hide_price' => true),
                                array('cache' => array(
                                        'key' => $gift['Product']['id'].'small_hide_price'))); ?>
                </a>
                <?php endforeach; ?>
		
		<?php if (empty($gifts)): ?>
			<br><br>
			<div class='no_data'>Nothing here yet.  <br><br>Start some good Karma.  Send gifts to some friends, and they'll send you some in return. </div>
		<?php endif; ?>
        </div>
        
        
</div>	


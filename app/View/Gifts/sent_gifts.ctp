
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

<style>
#bt_list{left:71px;width:68px;height:66px;list-style: none;}
#bt_list{background:url('../img/btn.png') -70px 0px;}


#bt_list1{left:0px;width:69px;height:66px;list-style: none;}
#bt_list1{background:url('../img/btn.png') 0px 0px;}
#bt_list1:hover{background: url('../img/btn.png') 0px -66px;}

</style>

<div style="float:right;margin-top:15px">
            <a href=<?= $this->Html->url(array('controller'=>'gifts',  'action'=>'sent_gifts')); ?>  style=" text-decoration:none;width:69px;height:66px"><li id="bt_list"></li></a>
           
       </div>
        <div style="float:right;margin-right:20px;margin-top:15px">
            <a href=<?= $this->Html->url(array('controller'=>'gifts',  'action'=>'view_gifts')); ?>  style=" text-decoration:none"><li id="bt_list1"></li></a>
</div>
<br>
<div>
        <h3 class="line-header">
                <span><?= $facebook_user['name'].'\'s sent gifts&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
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
                    'action' => 'sent_gifts',
                    $gift['Gift']['id'])); ?>"  class="popper" data-popbox="<?=$gift['Gift']['id'];?>">

                <div class="small-voucher">
                    <span class="free  voucher">
                            <span class="featured-frame"></span>
                            <span class="selected-overlay"></span>
                            <span class="image-container">
                                    <span class="image-frame"></span>
                                    <img src="<?= FULL_BASE_URL.'/'.$gift['Vendor']['thumb_image']; ?>">                     </span>
                            <span class="details">
                                    <span class="issuer"><?= $gift['Vendor']['name']; ?></span>
                                    <span class="value" style="width:119px;font-size: 16px"><span id="WebRupee" class="WebRupee">Rs.</span>
                                    <?= isset($gift['Product']['min_value']) ?
                                        $gift['Product']['min_value'] :
                                        $gift['min_value']; ?>
                                    <?= (isset($gift['Product']['min_price']) && ($gift['Product']['max_price'] > $gift['Product']['min_price'])) ? 'or more':'' ?></span>
                                     <?php
                                   $originalDate = $gift['Gift']['created'];
                                   $newDate = date("j F ", strtotime($originalDate)); ?>
                                    <span class="label" style="margin-top:43px;font-size:11px;background-color: #FFFFFF;color: #000000">Sent On : <?= $newDate ?></span>
                                    <span class="label" style="margin-top:25px;font-size:11px;background-color: #FFFFFF;color: #000000">To : <?= $gift['name'] ?></span>
                                    <?php if ($gift['Gift']['gift_status_id']==GIFT_STATUS_SCHEDULED): ?>
                                            <span class="label" style="margin-top:-40px;font-size:11px;background-color: #FFFFFF;color: #000000">SCHEDULED GIFT</span>
                                     <?php endif; ?> 

                                    
                                            <?php if ($gift['Product']['min_price'] == 0): ?>
                                                    <span class="label" style="margin-left:40px">FREE</span>
                                            <?php else: ?>
                                                    <span class="label">PAID <span id="WebRupee" class="WebRupee">Rs.</span>
                                                    <?= $gift['Product']['min_price']; ?>
                                                    <?= (isset($gift['Product']['min_price']) && ($gift['Product']['max_price'] > $gift['Product']['min_price'])) ? '+':'' ?>

                                            <?php endif; ?> 
                                   
                            </span>
                    </span>
                     
    </div>
                </a>
                
                
                <?php endforeach; ?>
		
		<?php if (empty($gifts)): ?>
			<br><br>
			<div class='no_data'>Nothing here yet.  <br><br>Start some good Karma.  Send gifts to some friends, and they'll send you some in return. </div>
		<?php endif; ?>
        </div>
        
        
</div>	




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


<div style="float:right;padding-top:15px;padding-bottom:10px">
        <a href=<?= $this->Html->url(array('controller'=>'gifts',  'action'=>'sent_gifts')); ?>  style=" text-decoration:none"><li id="bt_list"></li></a>
           
       </div>
        <div style="float:right;margin-right:20px;padding-top:15px">
            <a href=<?= $this->Html->url(array('controller'=>'gifts',  'action'=>'view_gifts')); ?>  style=" text-decoration:none"><li id="bt_list1"></li></a>
</div>
<br>
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

             <?php if ($gift['Gift']['expiry_date'] < date("Y-m-d")): ?>
            <a href="<?= $this->Html->url('/faq'); ?>" >
                 <div class="small-voucher">
                    <span class="free  voucher">
                            <span class="featured-frame"></span>
                            <span class="selected-overlay"></span>
                            <span class="image-container">
                                    <span class="image-frame"></span>
                                    <img src="<?= FULL_BASE_URL.'/'.$gift['Vendor']['thumb_image']; ?>">                     </span>
                            <span class="details">
                                    <span class="issuer"><?= $gift['Vendor']['name']; ?></span>
                                    <span class="value"><span id="WebRupee" class="WebRupee">Rs.</span>
                                    <?= isset($gift['Product']['min_value']) ?
                                        $gift['Product']['min_value'] :
                                        $gift['min_value']; ?></span>
                                    <?= (isset($gift['Product']['min_price']) && ($gift['Product']['max_price'] > $gift['Product']['min_price'])) ? 'or more':'' ?>

                                   

                                     <span class="label" style="color: #FFFFFF; background-color: #4D4D4D;">EXPIRED</span>
                                    

                                    
                            </span>
                    </span>
    </div> 

 <?php else: ?>

			<a href="<?= $this->Html->url(array('controller' => 'gifts',
				    'action' => 'redeem',
				    $gift['Gift']['id'])); ?>" title="Click to redeem">

                    <div class="small-voucher">
                    <span class="free  voucher">
                            <span class="featured-frame"></span>
                            <span class="selected-overlay"></span>
                            <span class="image-container">
                                    <span class="image-frame"></span>
                                    <img src="<?= FULL_BASE_URL.'/'.$gift['Vendor']['thumb_image']; ?>">                     </span>
                            <span class="details">
                                    <span class="issuer"><?= $gift['Vendor']['name']; ?></span>
                                    <span class="value"><span id="WebRupee" class="WebRupee">Rs.</span>
                                    <?= isset($gift['Product']['min_value']) ?
                                        $gift['Product']['min_value'] :
                                        $gift['min_value']; ?>
                                    <?= (isset($gift['Product']['min_price']) && ($gift['Product']['max_price'] > $gift['Product']['min_price'])) ? 'or more':'' ?></span>

                                   <?php
                                   $originalDate = $gift['Gift']['expiry_date'];
                                   $newDate = date("j F Y", strtotime($originalDate)); ?>

                                    <span class="label" style="margin-top:41px;font-size:11px;background-color: #FFFFFF;color: #000000">Expires On : <?=$newDate; ?></span>
                                     <span class="label" style="font-size: 14px">REDEEM</span>
                                    

                                    
                            </span>
                    </span>
    </div> 
     </a>
<?php endif; ?> 

                <?php endforeach; ?>
               

		
		<?php if (empty($gifts)): ?>
			<br><br>
			<div class='no_data'>Nothing here yet.  <br><br>Start some good Karma.  Send gifts to some friends, and they'll send you some in return. </div>
		<?php endif; ?>
        </div>
        
        
</div>	




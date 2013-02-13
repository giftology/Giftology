<?php echo $this->Html->css('style'); 
 

?>

<div class="mainpage" style="border-style:solid;border-width:1px;width:800px;height:auto">
	<div class="header">
		<a href=<?= FULL_BASE_URL; ?>>
		<img class="mt-20 float-l" style="margin-left:30px" src="<?= IMAGE_ROOT; ?>brand-logo.jpg" />
		<img class="mt-20 float-l" style="margin-left:250px;margin-top:10px" src="<?= IMAGE_ROOT; ?>bar_code.jpg" />
		
		</a>
	</div>
	<h3 style="margin-left:350px;margin-top:-50px">Voucher</h3>
	<div class="dash"style="border:1px dotted;margin-top:23px"></div>
	<div class="voucher" style="height:300px">
            <div class="frame" style="margin-top:20px">
           		<div class="gift-amount">
	               		 <p class="amount" style="margin-top:25px">
	                		<span id="WebRupee" class="WebRupee">Rs.</span><?=$gift['Gift']['gift_amount']; ?>
	                	</p>
	                	<div class="divider"></div>
	                	<img  class="wide" width="200" height="64" src="<?= FULL_BASE_URL.'/'.$gift['Product']['Vendor']['wide_image']; ?>" />
            			<p class="at">at</p><p class="fine-print"><?= $gift['Product']['terms_heading'] ?></p>

            		
            			<div id="" style="margin-left:350px;margin-top:-110px;width:420px;font-size:small"><h2 sytle="margin-left:40px">How to Redeem : </h2><?=$gift['Product']['redeem_instr']; ?></div>
    			</div>

	 	</div>
	</div>
	<div class="dash"style="border:1px dotted ;margin-top:25px"></div>
	<div id="" style="margin-left:50px;margin-top:25px;width:400px"><b>Giftology code : <?=$gift['Gift']['code']; ?></b></div>
	<div id="" style="margin-left:50px;margin-top:25px;width:400px"><b>Valid from : <?= substr($gift['Gift']['created'], 0, -8); ?> to <?=$gift['Gift']['expiry_date']; ?> </b></div>

	<div class="dash"style="border:1px dotted ;margin-top:25px"></div>

	<div id="" style="margin-left:50px;margin-top:25px;width:400px"><b>Terms and conditions :  </b><br/><br/><?=$gift['Product']['terms'] ?></div>
	<div class="dash"style="border:1px dotted red;margin-top:27px"></div>
	<div id="" style="margin-left:50px;margin-top:15px;font-size:small">This voucher is provided by Giftology.com on behalf of the service provider. Management may withdraw the offer at any time without prior notice.
Giftology.com is a property of Sama Web Innovations Pvt. Ltd.</div><br>
	
</div>

<style type="text/css">
#errorMobWrapper{background:#fafafa; width:880px; border:1px solid #ccc; height:800px; margin: 20px auto ;}
.errorMobContainer{width:800px ; margin:80px 40px; height:500px; box-shadow:1px 1px 3px 3px #ccc; padding-top:60px; }
.errorMobLeft{width:244px; float:left; }
.errorMobRight{width:530px; float:left; }
.errorMobTextSection{color:#666; font:2em/2em Georgia, "Times New Roman", Times, serif; }
.errorMobTextBox{float:left; width:420px; margin:30px 0 0 0;}
.errorMobGiftBox{ float:left; margin:40px 0 0 0; width:110px}
.errorMobIcon{width:168px;margin:23px auto;}
.errorMobMar{margin: 0 0 0 -14px; text-align: center}
</style>

<?php 
if($gift['Gift']['claim']==1 && $gift['Gift']['redeem']==1 ): ?>
<div id="errorMobWrapper" >
  <div class="errorMobContainer">
  	
	    <div class="errorMobLeft">
	      <div class="errorMobIcon"> <img src="<?php echo FULL_BASE_URL;?>/img/errorIcon.png"  />
	        <!-- <p class="error404">404 <span style="color:#000">Error</span> </p>
	    <p class="errorImgText"> page not found</p>-->
	      </div>
    	</div>
	    <div class="errorMobRight">
	      <div class="errorMobTextSection errorMobTextBox">
	        <p class="errorMobMar">Oops, this gift has a limited life!  </p>
	       
	       
	      </div>
	      <div class="errorMobGiftBox "> <img src="<?php echo FULL_BASE_URL;?>/img/giftbox.png" width="125"  /> </div>

	    </div>
	
    <p class="errorMobTextSection" style="margin:215px 65px; text-align:justify" >This gifts looks like it has already been used. Email us if you require any assistance.</p>

  </div>
</div>
<?php else: ?>

	<div id="errorMobWrapper" >
  <div class="errorMobContainer" style="height: 600px;">
  	
	    <div class="errorMobLeft">
	      <div class="errorMobIcon"> <img src="<?php echo FULL_BASE_URL;?>/img/errorIcon.png"  />
	        <!-- <p class="error404">404 <span style="color:#000">Error</span> </p>
	    <p class="errorImgText"> page not found</p>-->
	      </div>
    	</div>
	    <div class="errorMobRight">
	      <div class="errorMobTextSection errorMobTextBox">
	        <p class="errorMobMar">Oops, this gift has a limited life!  Oops! Looks like you're too late to the party.</p>
	       
	       
	      </div>
	      <div class="errorMobGiftBox "> <img src="<?php echo FULL_BASE_URL;?>/img/giftbox.png" width="125"  /> </div>

	    </div>
	
    <p class="errorMobTextSection" style="margin:215px 65px; text-align:justify" >The gift has either expired or has exceeded the daily limit. Contact us for further assistance.</p>

  </div>
<?php endif; ?>
<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'Giftology: The social gifting company');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php echo $this->Facebook->html(); ?>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		Giftology | The Social Gifting Company | Homepage
	</title>
	<?php if (isset($fb_title)): ?>
          <meta property="og:url" content="<?= $fb_url; ?>" />
	  <meta property="og:title" content="<?= $fb_title; ?>" /> 
	  <meta property="og:image" content="<?= $fb_image; ?>" /> 
	  <meta property="og:description" content="<?= $fb_description; ?>" /> 
	<?php endif; ?>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('style');
		echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js');
		echo $this->Html->script('slides.min.jquery');
		//echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js');
		//echo $this->Html->script('giftology');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	
	        <script>
            $(function(){
                $("#slides").slides({
			        play: <?= $slidePlaySpeed; ?>,
				generatePagination: true,
				slideSpeed: 1000,
			});
                $(".recoslides").slides({
			        play: 4000,
				generatePagination: false,
				effect: 'fade',
				fadeSpeed: 3000,
			});
            });
        </script>


<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-24851185-2']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</head>


<body>

<?php echo $this->Facebook->init(); ?>
	<div class="transbox" id="transbox" style="display:none"><img class="spinner" src="<?echo IMAGE_ROOT.'/spinner.gif'; ?>"/></div>

<div class="mainpage2 content">
  <div class="wrapper">
    <div class="about">
      <div class="first">
        <h1>Giftology.com</h1>
        <h2><?= $message; ?></h2>
	<?php if (!isset($this->request->query['gift_id'])) {
		echo "Start by logging in with facebook <br><br>";
	}
	?>
	<noscript>
		<h1>Looks like javascript is disabled in your browser.  This WebApp requires Javascript to be enabled. Please enable and return. Thank You! </h1>
    		<img src="<?echo IMAGE_ROOT.'/no_js.gif'; ?>" style="display:none" alt="Javascript not enabled" />
	</noscript>

    </div>
      <div class="second">
        <div class="facepile">
		<?php echo $this->Facebook->login(array('img' => 'fb-connect-large.png',
							'redirect' => array('controller'=>'reminders', 'action'=>'view_friends'))); ?>
		<p>We take your privacy seriously. Unless you ask us to, We'll never post on your behalf.</p>
		<?php echo $this->Facebook->friendpile(array('size'=>'large', 'width'=>'310px')); ?>
	</div>
      </div>
    </div>
	 <div class="infographic interactive">
		<div class="shadow">
	        <div id="slides">
			<div class="slides_container">
			    <?php if (!isset($this->request->query['gift_id'])): ?>
			    <div>
				<img src="<?= FULL_BASE_URL; ?>/img/homeslide1.jpg">
			    </div>
			    <div>
				<img src="<?= FULL_BASE_URL; ?>/img/homeslide2.jpg">
			    </div>
			    <div>
				<img src="<?= FULL_BASE_URL; ?>/img/homeslide3.jpg">
			    </div>
			    <?php else: ?>
			    <div>
				<img src="<?= FULL_BASE_URL; ?>/img/giftrecv_homeslide1.jpg">
			    </div>
			    <?php endif; ?>
			</div>
			<div id="slideprevnext">
			<a href="#" class="prev"><img src="<?=IMAGE_ROOT;?>arrow-prev.png" width="24" height="43" alt="Arrow Prev"></a>
			<a href="#" class="next"><img src="<?=IMAGE_ROOT;?>arrow-next.png" width="24" height="43" alt="Arrow Next"></a>
			</div>
		</div>
		</div>
	  </div>
  </div>
	<?php if (isset($this->request->query['gift_id'])): ?>

  	<div id="reco" class="landingbottomboxes">
		<h2>User chatter</h2>
		<div class="recoslides">
			<div class="slides_container">
			    <div>
				<img src="<?= FULL_BASE_URL; ?>/img/reco1.jpg">
			    </div>
			    <div>
				<img src="<?= FULL_BASE_URL; ?>/img/reco2.jpg">
			    </div>
			    <div>
				<img src="<?= FULL_BASE_URL; ?>/img/reco3.jpg">
			    </div>
			</div>
		</div>
	</div>
	<!--div id="coverage" class="landingbottomboxes">
		<h2>Recommended By</h2>
		<div class="recoslides">
			<div class="slides_container">
			    <div>
				<img src="<?= FULL_BASE_URL; ?>/img/media1.jpg">
			    </div>
			    <div>
				<img src="<?= FULL_BASE_URL; ?>/img/media2.jpg">
			    </div>
			    <div>
				<img src="<?= FULL_BASE_URL; ?>/img/media3.jpg">
			    </div>
			</div>
		</div>
	</div-->

	<div id="recent" class="landingbottomboxes">
		<h2>Whats happening</h2>
       <!--div id="news-items"-->
        <!--div class="shadow-wrapper right items"-->
                <div class="frame">
                       <ul>
                        <?php foreach($gifts_sent as $gift): ?>
                                <li>
                                <div>
                                <img src="https://graph.facebook.com/<?= $gift['Sender']['facebook_id']; ?>/picture?type=square"/>
                                <p><?= $this->Facebook->name($gift['Sender']['facebook_id']); ?> sent a <?= $gift['Product']['Vendor']['name']; ?> gift voucher to <?= $this->Facebook->name($gift['GiftsReceived']['receiver_fb_id']); ?>
                                </p></div></li>
                        <?php endforeach; ?>
                        </ul>
                 </div>
        <!--/div-->
    <!--/div-->
	</div>
	<?php endif; ?>
	
	<div id="footer">
		<div class="footer-line"></div>
		<img width="1" height="1" border="0" src="http://socialconnexion.in/campaign/pixel.aspx?cam_id=giftologylandingpage ">
	</div>
</div>

<!-- Main page close -->

	<script type="text/javascript">
		var clicky_site_ids = clicky_site_ids || [];
		clicky_site_ids.push(66489932);
		(function() {
			var s = document.createElement('script');
			s.type = 'text/javascript';
			s.async = true;
			s.src = '//static.getclicky.com/js';
			( document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0] ).appendChild( s );
})();
	</script>

</body>
</html>

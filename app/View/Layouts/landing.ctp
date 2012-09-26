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
	<?= $this->Facebook->init(); ?>
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
    </div>
      <div class="second">
        <div class="facepile">
		<?php echo $this->Facebook->login(array('img' => 'fb-connect-large.png',
							'redirect' => array('controller'=>'reminders', 'action'=>'view_friends'))); ?>
		<p>We take your privacy seriously. We'll never post on your behalf, unless you send a gift and explicitly ask us to notify the recipient on your behalf</p>
		<?php echo $this->Facebook->friendpile(); ?>
	</div>
        <div class="social">
          <div class="twitter">
            
          </div>
          <div class="facebook">
            
          </div>
        </div>
        <!--div class="availability">
          <p class="iphone-android">Giftology.com is also available for <a class="android" href="https://market.android.com/details?id=com.wrapp.android">Android</a> and <a class="iphone" href="http://itunes.apple.com/app/wrapp/id458640944">iPhone</a>.</p>
        </div-->
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
			    <div>
				<img src="<?= FULL_BASE_URL; ?>/img/giftrecv_homeslide2.jpg">
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

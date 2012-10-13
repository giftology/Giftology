<!DOCTYPE html> 
<html> 
	<head> 
	<title>Welcome to Giftology</title> 
	
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.1.1/jquery.mobile-1.1.1.min.css" />
	<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.1.1/jquery.mobile-1.1.1.min.js"></script>
	<script src="http://localhost/js/mobile.js"></script>
		<?php echo $this->Html->css('style');
		echo $this->Html->script('giftology');
		echo $this->Html->script('jquery.ias.min');
?>

</head> 
<body>
	<?php echo $this->Facebook->init(); ?>
<div data-role="page">

	<div data-role="header" data-theme="c">
		<h1>Welcome to Giftology</h1>
	</div><!-- /header -->

	<div data-role="content" data-theme="c">
	<img src="<?= FULL_BASE_URL; ?>/img/brand-logo-mobile.png">
        <h2><?= $message; ?></h2>
	Start by logging in with facebook <br><br>
		<?php echo $this->Facebook->login(array('img' => 'fb-connect-large.png',
							'redirect' => array('controller'=>'reminders', 'action'=>'view_friends'))); ?>
		<p>We take your privacy seriously. Unless you ask us to, We'll never post on your behalf.</p>
		<?php echo $this->Facebook->friendpile(array('size'=>'large', 'width'=>'310px')); ?>
	
	</div><!-- /content -->

	<div data-role="footer" data-theme="c">
		Giftology 2012.  All rights reserved.
	</div><!-- /footer -->
</div><!-- /page -->
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
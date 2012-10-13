<!DOCTYPE html> 
<html> 
	<head> 
	<title>Page Title</title> 
	
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
		<a href="#" data-icon="back" data-rel="back">Back</a>
		<h1><?php echo $title_for_layout; ?></h1>
			<div id="mainnav" data-role="navbar">
				<ul id="navbar">
					<li><a href="http://localhost/reminders/view_friends" rel="external">Events</a></li>
					<li><a href="http://localhost/reminders/view_friends/all" rel="external">Friends</a></li>
					<li><a href="http://localhost/gifts/view_gifts" rel="external">My Gifts</a></li>
				</ul>
			</div><!-- /navbar -->
		<?php echo $this->Facebook->logout(array('label' => 'Logout',
				'redirect' => array('controller' => 'users',
						'action' => 'logout'))); ?>

	</div><!-- /header -->

	<div data-role="content" data-theme="c">
		<?php echo $this->Session->flash(); ?>
		<?php echo $this->fetch('content'); ?>

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

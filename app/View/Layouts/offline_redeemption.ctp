<?php
$cakeDescription = __d('cake_dev', 'Giftology: The social gifting company');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php echo $this->Facebook->html(); ?>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
</head>
<body style="zoom: 1; margin-bottom: 0px;">

<div class="mainpage">
	<?php
		echo $this->Html->meta('logo');
		echo $this->Minify->css(array('styles1'));
		echo $this->Minify->script(array('jquery-1.7.2.min','jquery.countdown','scrit1','main'));
		echo $this->fetch('meta');
		echo $this->fetch('css');
				//echo $this->Html->css('main');

		echo $this->fetch('script');
	?>

	<div id="content">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->Session->flash('suspicious_activity_message')?>
			<?php echo $this->fetch('content'); ?>
		</div>
		
		
	</div>
	
         </div>
         <?php if (isset($this->request->query['utm_source']) &&
		$this->request->query['utm_source'] == 'swaransoft'): ?>
			<img width="1" height="1" border="0" src="http://socialconnexion.in/campaign/pixel.aspx?cam_id=giftologylandingpage ">
		<?php endif; ?>
	</div>
	<?php //echo $this->element('sql_dump'); ?>
	<?= $this->Facebook->init(); ?>
	<script type="text/javascript">
		var clicky_custom = {};
		clicky_custom.session = {
		   username: '<?= $facebook_user['name']; ?>',
	           fb_id: '<?= $facebook_user['id']; ?>'
		};
	</script>

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
<script type="text/javascript"> 
var _urq = _urq || []; 
_urq.push(['setPerformInitialShorctutAnimation', false]); 
_urq.push(['initSite', '5fca15d4-fe52-4122-8671-dbac1fd0847a']); 

(function() { 
var ur = document.createElement('script'); ur.type = 'text/javascript'; ur.async = true; 
ur.src = 'http://sdscdn.userreport.com/userreport.js'; 
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ur, s); 
})(); 
</script> 

<?php echo $this->Mixpanel->embed(); ?>
</body>
</html>

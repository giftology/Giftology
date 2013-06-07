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
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	
	<link rel="stylesheet" href="http://localhost/css/styles1.css" />
    <script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script src="http://localhost/js/jquery.countdown.js"></script>
    <script src="http://localhost/js/scrit1.js"></script>
<style>
	
ul.left-menu{list-style:none; padding:0px; margin:50px 10px 10px 20px}
ul.left-menu li {margin:5px 0px; border-bottom:1px dashed #fad5ff; padding:2px 0px 6px 0px; }
ul.left-menu li a { font-size:13px;  color:#fff}

</style>

</head>
<body style="zoom: 1; margin-bottom: 0px;">

<div class="mainpage">
	
				
		<!-- <div class="transbox"><img class="spinner" src="<?echo IMAGE_ROOT.'/spinner.gif'; ?>"/></div> -->

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

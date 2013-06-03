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
	<?php
		echo $this->Html->meta('icon');
		//echo $this->Minify->css('http://cdn.webrupee.com/font');
		//echo $this->Minify->css('style');
		echo $this->Minify->css(array('font','style'));
		//echo $this->Minify->script(array('https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js','https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js'));
		//echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js');
		//echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js');
		//echo $this->Minify->script('giftology');
		//echo $this->Minify->script('jquery.ias.min');		
		echo $this->Minify->script(array('jquery-1.7.2.min','jquery-ui-1.8.23.min','jquery-1.9.0.min','jquery.easing-1.3','jquery.flexslider-min','plugins','main','carouFredSel','modernizr-2.6.2.min','mixpanel-2.1.min','jquery.ias.min','giftology'));
		echo $this->fetch('meta');
		echo $this->fetch('css');
				//echo $this->Html->css('main');

		echo $this->fetch('script');
	?>
<style>
	
ul.left-menu{list-style:none; padding:0px; margin:50px 10px 10px 20px}
ul.left-menu li {margin:5px 0px; border-bottom:1px dashed #fad5ff; padding:2px 0px 6px 0px; }
ul.left-menu li a { font-size:13px;  color:#fff}

</style>

</head>
<body style="zoom: 1; margin-bottom: 0px;">
<div class="transbox" id="transbox" style="display:none"><img class="spinner" src="<?echo IMAGE_ROOT.'/spinner.gif'; ?>"/></div>
<div class="mainpage">
	<div class="header">
		<div class="logo-block"><a href="<?= FULL_BASE_URL; ?>" class="logo" style="outline: none;"><img src="<?= FULL_BASE_URL; ?>/img/logo.png" alt=""></a></div>
		<!--<a href=<?= FULL_BASE_URL; ?>> -
		<img class="mt-20 float-l" src="<?= IMAGE_ROOT; ?>brand-logo.jpg" />
		</a>-->
		
		
		
		<div class="controls">
			<div class="shadow-wrapper">
				<div class="frame">
					
				</div>
			</div>
			<div class="current-user">
				
			</div>
		</div>
	

		
	</div>
				
		<!-- <div class="transbox"><img class="spinner" src="<?echo IMAGE_ROOT.'/spinner.gif'; ?>"/></div> -->

		<div id="content">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->Session->flash('suspicious_activity_message')?>
			<?php echo $this->fetch('content'); ?>
		</div>
		
		
	</div>
	
         </div>
        <footer>
            <div class="footer-wrap">
                <nav class="footer-nav">
                   
                     <?= $this->Html->link('HOME', array('controller' => 'reminders', 'action' =>  'view_friends')); ?>
                    <?= $this->Html->link('ABOUT US', array('controller' => 'pages', 'action' =>  'display','AboutUs')); ?>
                    <?= $this->Html->link('TEAM', array('controller' => 'pages', 'action' => 'display', 'team')); ?>
                      <?= $this->Html->link('MEDIA', array('controller' => 'pages', 'action' =>  'display','Media')); ?>
                      <?= $this->Html->link('RETAILERS', array('controller' => 'retailers', 'action' => 'index', 'Retailers')); ?>
                       <?= $this->Html->link('FAQ', array('controller' => 'pages', 'action' =>  'display','Faq')); ?>
                       <?= $this->Html->link('CONTACT US', array('controller' => 'pages', 'action' => 'display', 'ContactUs')); ?>
                        <?= $this->Html->link('BLOG', 'http://mygiftology.wordpress.com/'); ?>
                     
                     <?= $this->Html->link('TERMS OF SERVICE', array('controller' => 'pages', 'action' =>  'display','TermsOfServices')); ?>
                                      
                                      
                     
                 </nav>
                <div class="copyright">© Giftology 2013. All rights reserved</div>
             </div>
          </footer>
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

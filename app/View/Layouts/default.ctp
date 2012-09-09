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

		echo $this->Html->css('style');
		echo $this->Html->css('http://cdn.webrupee.com/font');
		echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js');
		echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js');
		echo $this->Html->script('giftology');
		echo $this->Html->script('jquery.ias.min');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
<style>
	
ul.left-menu{list-style:none; padding:0px; margin:50px 10px 10px 20px}
ul.left-menu li {margin:5px 0px; border-bottom:1px dashed #fad5ff; padding:2px 0px 6px 0px; }
ul.left-menu li a { font-size:13px;  color:#fff}

</style>

</head>
<body>
<div class="mainpage">
	<div class="header">
		<a href=<?= DOMAIN_NAME; ?>>
		<img class="mt-20 float-l" src="<?= IMAGE_ROOT; ?>brand-logo.jpg" />
		</a>
		
		<ul class="nav float-l">
			<li><a href=<?= $this->Html->url(array('controller'=>'reminders',  'action'=>'view_friends')); ?> class="events <?= isset($celebrations_active) ? $celebrations_active:''; ?>"><span>Events</span></a></li>
			<li><a href=<?= $this->Html->url(array('controller'=>'reminders',  'action'=>'view_friends', 'all')); ?> class="friends <?= isset($friends_active) ? $friends_active:''; ?>"><span>Friends</span></a></li>
			<li><a href=<?= $this->Html->url(array('controller'=>'gifts',  'action'=>'view_gifts')); ?> class="wallet <?= isset($gifts_active) ? $gifts_active:''; ?>"><span>My Giftsw</span></a></li>
		</ul>
		
		<div class="controls">
			<div class="shadow-wrapper">
				<div class="frame">
					<div class="img-placeholder male">
						<?php $photo_url = "https://graph.facebook.com/".$facebook_user['id']."/picture"; ?>
						<img src=<?= $photo_url; ?>>
					</div>
				</div>
			</div>
			<div class="current-user">
				<p><?= $facebook_user['first_name']; ?></p>
				<?php echo $this->Facebook->logout(array('label' => 'Logout',
									 'redirect' => array('controller' => 'users',
											     'action' => 'logout'))); ?>
			</div>
		</div>
		
	</div>
				
		<div id="content">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
		
		<div id="footer">
			<div class="footer-line"></div>
		</div>
	</div>
	<?php //echo $this->element('sql_dump'); ?>
	<?= $this->Facebook->init(); ?>
</body>
</html>

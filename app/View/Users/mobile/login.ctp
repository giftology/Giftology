<div class="users form">
		<?php echo $this->Facebook->login(array('img' => 'fb-connect-large.png',
							'redirect' => array('controller'=>'reminders', 'action'=>'view_friends'))); ?>
		<p>We take your privacy seriously. Unless you ask us to, We'll never post on your behalf.</p>
		<?php echo $this->Facebook->friendpile(array('size'=>'large', 'width'=>'310px')); ?>
</div>
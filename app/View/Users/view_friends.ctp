    <? /*php echo "<h1> welcome to giftology ".$user['UserProfile']['first_name']." ".$user['UserProfile']['last_name']." </h1>"; ?>
    <?php if(isset($user['Reminders'])): ?>
    <?php foreach($user['Reminders'] as $reminder): ?>
        <?php if ($reminder['friend_birthday']): //filter out NULL brithdays?>
            <?php echo $this->Facebook->picture($reminder['friend_fb_id'], array('linked'=>false, 'size'=>'square', 'facebook-logo'=>false)); ?><br>
            <?= $this->Html->link($reminder['friend_name'], array('controller'=>'products', 'action'=>'index', 'receiver_id' => $reminder['friend_fb_id'])); ?><br>
            <?= substr($this->Time->niceShort($reminder['friend_birthday']), 0, -7); // chop off the time char of string?><br>
        <?php endif; ?>
    <?php endforeach; ?>
    <?php endif; */?>


	<div class="left-container">
		<div>
			<h4 class="line-header">Today<div class="calendar"><p><?= date('d'); ?></p></div></h4>
			<div class="image-wrapper">
                            <?php foreach($user['Reminders'] as $reminder): ?>
				<div class="event">
					<div class="event suggested">
						<div class="image-container">
							<div class="frame-wrapper">
								<div class="shadow-wrapper">
									<div class="frame">
                                                                                <?php echo $this->Facebook->picture($reminder['friend_fb_id'], array('linked'=>false, 'size'=>'normal', 'facebook-logo'=>false)); ?><br>
										<!--div class="event-marker"></div-->
									</div>
								</div>
							</div>
						</div>
						<p class="name"><?= $reminder['friend_name']; ?></p>
						<p class="occasion">Birthday</p>
					</div>
				</div>
                            <?php endforeach; ?>	
			</div>
		</div>
		<div class="clear"></div>
        </div>
                	
	<div id="news-items"><div class="shadow-wrapper right items">
	  <div class="frame">
		<h3>News</h3>
		<h4>No news at the moment</h4>
	  </div>
	</div>
	
	<div class="shadow-wrapper right facebook">
	  <div class="frame"><iframe scrolling="no" frameborder="0" allowtransparency="true" src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2FWrappcorp&amp;width=292&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;border_color=%23FAFAFA&amp;stream=false&amp;header=false&amp;appId=218834354823410"></iframe>
	</div>
	</div>
	
	<div class="shadow-wrapper right twitter">
	  <div class="frame"><div class="twitter-widget"><p>@<a rel="nofollow" href="https://twitter.com/oscaraltkvist" data-screen-name="oscaraltkvist" class="tweet-url username" target="_blank">oscaraltkvist</a> No, not to apply. :)</p>
	<p>"On average women get 12 compliments a night when they RENT THE RUNWAY" Need we say more….http://t.co/kTcJRO2u @<a rel="nofollow" href="https://twitter.com/RentTheRunway" data-screen-name="RentTheRunway" class="tweet-url username" target="_blank">RentTheRunway</a></p>
	<p>@<a rel="nofollow" href="https://twitter.com/juliedevoe" data-screen-name="juliedevoe" class="tweet-url username" target="_blank">juliedevoe</a> did you know you can give your friends RTR gifts cards via Wrapp?  <a rel="nofollow" href="https://t.co/JjmKP59s" target="_blank">https://t.co/JjmKP59s</a></p>
	<a target="_blank" href="https://twitter.com/wrappcorp">Follow us on Twitter</a></div></div>
	</div>
	</div>
		
		
		
		

	
	<div class="clear"></div>
	
	


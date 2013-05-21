<div id="celebration-details">
	<div class="details-container">
		<?php if ($ocasion): ?>
			<h2>Celebrate <?= $receiver_name; ?>'s <?= $ocasion; ?>!</h2>
		<?php else: ?>
			<h2>Send a gift to 
				<?php
					if($receiver_id == $sender_id):
						echo "Myself";
					else:
						echo $receiver_name;
					endif;
				?>
			</h2>
		<?php endif; ?>
		<div class="tag-icons"></div>
	</div>
	<div class="image-container">
		<div class="polaroid"><?= $this->Facebook->picture($receiver_id, array('linked'=>false, 'size'=>'normal', 'facebook-logo'=>false)); ?></div>
		<div class="paperclip"></div>
	</div>
</div>

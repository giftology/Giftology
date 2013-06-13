<div id="celebration-details">
	<div class="details-container">
		<?php if ($ocasion && $ocasion != 'Suggested' && $ocasion != 'Welcome Him' && $ocasion != 'Welcome Her' && $ocasion != 'Return Gift'): ?>
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
		<div class="polaroid"><img src="https://graph.facebook.com/<?= $receiver_id; ?>/picture?width=169&height=200" style="border:2px solid #ccc"/></div>
		<div class="paperclip"></div>
	</div>
</div>

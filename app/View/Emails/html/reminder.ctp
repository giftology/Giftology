
<table width="600px" cellpadding="0" cellspacing="0" align="center" border="0" style="border:1px solid #999999"><tr><td>
	<table align="center" width="600px" cellpadding="0" cellspacing="0" border="0" style="font-family:Arial, Helvetica, sans-serif; font-size:12px">
		<tr><td height="8px" bgcolor="#bc202b"></td></tr>
		<tr><td align="right" style="padding:10px"><img src="<?= IMAGE_ROOT; ?>/logo.jpg" /></tr>
		<tr><td height="40px"></td></tr>
		
		<tr>
			<table cellpadding="3" cellspacing="0" border="0" align="center" width="560px" style="font-family:Arial, Helvetica, sans-serif;">
				<tr>
					<td><span style="font-size:18px; color:#b10e0b">Dear <b><?= $name; ?></b>, <?= $num_birthdays; ?> friends have birthdays in the coming week!</span></td>
				</tr>
				<tr>
					<td><span style="font-size:13px;">Choose a gift to make their day special!</span></td>
				</tr>
			</table>
		</tr>
		
		<tr><td height="30px"></td></tr>
		<?php for ($i = 0; $i < $num_birthdays; $i += 3): ?>
		<tr>
			<td>
				<table width="570px" cellpadding="0" align="center" cellspacing="0" border="0" >
					<tr>
						<td width="33%" align="center" valign="top">
							<a href="<?= $linkback; ?> style="border:0"><img style="max-width:150px; max-height:150px; padding:4px; border:1px solid #d2d2d2" src="http://graph.facebook.com/<?= $reminders[$i]['Reminder']['friend_fb_id']; ?>/picture/?type=large" /></a>
						</td>
						  <td width="33%" align="center" valign="top">
						    <?php if (isset($reminders[$i+1])): ?>
							<a href="<?= $linkback; ?> style="border:0"><img style="max-width:150px; max-height:150px; padding:4px; border:1px solid #d2d2d2" src="http://graph.facebook.com/<?= $reminders[$i+1]['Reminder']['friend_fb_id']; ?>/picture/?type=large" /></a>
						    <?php endif; ?>
						  </td>
						<td width="33%" align="center" valign="top">
						    <?php if (isset($reminders[$i+2])): ?>
							<a href="<?= $linkback; ?> style="border:0"><img style="max-width:150px; max-height:150px; padding:4px; border:1px solid #d2d2d2" src="http://graph.facebook.com/<?= $reminders[$i+2]['Reminder']['friend_fb_id']; ?>/picture/?type=large" /></a>
						    <?php endif; ?>
						</td>
					</tr>
					<tr>
						<td>
							<table width="100%" cellpadding="0" cellspacing="3" border="0" style="font-family:Arial, Helvetica, sans-serif; font-size:13px">
								<tr><td align="center"><span style="font-size:15px; color:#666666"><?= substr($this->Time->niceShort($reminders[$i]['Reminder']['friend_birthday']), 0, -7); ?></span></td></tr>
					<tr>
						<td align="center" valign="top">
						   <a href="<?= $linkback; ?> style="color:#000; text-decoration:none"><?= $reminders[$i]['Reminder']['friend_name']; ?></a>
						</td>
					</tr>
					<tr>
					    <td width="33%" align="center" valign="top">
					        <a href="<?= $linkback; ?> style="border:0"><img style="border:0" src="<?= IMAGE_ROOT; ?>/send-gift-btn.jpg" alt="Click here to send Gift" /></a>
					    </td>
					</tr>
                            </table>
                        </td>

                        <td>
                            <table width="100%" cellpadding="0" cellspacing="3" border="0" style="font-family:Arial, Helvetica, sans-serif; font-size:13px">
                                <tr><td align="center"><span style="font-size:15px; color:#666666">
				<?php if (isset($reminders[$i+1])): ?>
				<?= substr($this->Time->niceShort($reminders[$i+1]['Reminder']['friend_birthday']), 0, -7); ?></span></td></tr>
                                <?php endif; ?>
				<tr>
                                    <td align="center" valign="top">
					<?php if (isset($reminders[$i+1])): ?>
                                        <a href="<?= $linkback; ?> style="color:#000; text-decoration:none"><?= $reminders[$i+1]['Reminder']['friend_name']; ?></a>
					<?php endif; ?>
				    </td>
                                </tr>
                                <tr>
                                    <td width="33%" align="center" valign="top">
					<?php if (isset($reminders[$i+1])): ?>
                                        <a href="<?= $linkback; ?> style="border:0"><img style="border:0" src="<?= IMAGE_ROOT; ?>/send-gift-btn.jpg" alt="Click here to send Gift" /></a>
					<?php endif; ?>
				    </td>
                                </tr>
                            </table>
                        </td>
                        <td>
                            <table width="100%" cellpadding="0" cellspacing="3" border="0" style="font-family:Arial, Helvetica, sans-serif; font-size:13px">
                                <tr><td align="center"><span style="font-size:15px; color:#666666">
				<?php if (isset($reminders[$i+2])): ?>
				<?= substr($this->Time->niceShort($reminders[$i+2]['Reminder']['friend_birthday']), 0, -7); ?>
				<?php endif; ?>
				</span></td></tr>
                                <tr>
                                    <td align="center" valign="top">
					<?php if (isset($reminders[$i+2])): ?>
                                        <a href="<?= $linkback; ?> style="color:#000; text-decoration:none"><?= $reminders[$i+2]['Reminder']['friend_name']; ?></a>
					<?php endif; ?>
				    </td>
                                </tr>
                                <tr>
                                    <td width="33%" align="center" valign="top">
					<?php if (isset($reminders[$i+2])): ?>
                                        <a href="<?= $linkback; ?> style="border:0"><img style="border:0" src="<?= IMAGE_ROOT; ?>/send-gift-btn.jpg" alt="Click here to send Gift" /></a>
					<?php endif; ?>
				    </td>
                                </tr>
                            </table>
                        </td>    	
					</tr>
               	</table>
			</td>
		</tr>
       	<tr><td height="50px"></td></tr>
		<?php endfor; ?>
		
		<tr><td height="50px"></td></tr>
		<tr style="background-color:#000">
			<td>
				<table bgcolor="#000000" style="color:#fff; font-size:16px; font-family:Arial, Helvetica, sans-serif" width="100%" cellspacing="10">
					<tr>
						<td><span style="font-size:14px; color:#d2d2d2">care@giftology.com</span></td>
						<td align="right"><span style="font-size:16px; color:#d2d2d2">www.giftology.com</span></td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</td></tr></table>
<!-- Main page close -->

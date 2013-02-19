<html>
<body>
 <div style="color:#505050;font-family:Helvetica;font-size:14px;line-height:150%;text-align:left;border-style:solid;
border-width:15px;border-color:#f7f5ae">
 	<font color="#550055">
 		<h1 style="text-align:left;color:#e86848;display:block;font-family:Helvetica;font-size:48px;font-weight:bold;letter-spacing:-4px;line-height:100%;margin-top:0;margin-right:0;margin-bottom:10px;margin-left:0">
			<a href="http://www.giftology.com/?utm_source=mandrillapp&utm_medium=email&utm_campaign=welcome" style="color:#e86848;font-weight:normal;text-decoration:none" target="_blank"><img align="right" height="89" src="<?= IMAGE_ROOT; ?>GiftologyDOTCOM_COMPLETE_Logo.jpg" style="font-size:48px;letter-spacing:-4px;line-height:53.333335876464844px;text-align:center;min-height:89px;width:200px;border:0;outline:none;text-decoration:none;display:inline" width="200"></a>
		</h1>
    	<br>
    	 <br>
		<span style="font-size:32px"><span style="color:#696969">Dear <?= $name; ?></span>
    	<br>
    	<span style="font-size:32px">
		<br>
		
        <span style="color:rgb(105,105,105);font-size:16px;text-align:left; font-family:comic sans ms">We’ve got a few things to share with you in case you haven’t been keeping your eye on the app as closely as we have. Hope you like ’em.</span><br><br><span style="font-size:32px"><span style="color:rgb(178,34,34) ; font-family:comic sans ms">Recommended Gifts</span><br><br><!--<br>(The recomended gifts show here)<br><br><br><br><br><span style="font-size:32px">-->


        <table width="570px" cellpadding="0" align="center" cellspacing="0" border="0" >
					<tr>
						<td>
						<!--<td width="33%" align="center" valign="top">
							<a href="<?= $linkback; ?> style="border:0"><img style="max-width:150px; max-height:150px; padding:4px; border:1px solid #d2d2d2" src="http://graph.facebook.com/<?= $reminders[$i]['Reminder']['friend_fb_id']; ?>/picture/?type=large" /></a>
						</td>-->
						  <a href="<?= $linkback; ?> style="border:0"><img style="max-width:150px; max-height:150px; padding:4px; border:1px solid #d2d2d2" src="<?= FULL_BASE_URL.'/'.$products[0]['Vendor']['wide_image']; ?>" /></a>

						  <a href="<?= $linkback; ?> style="border:0"><img style="max-width:150px; max-height:150px; padding:4px; border:1px solid #d2d2d2" src="<?= FULL_BASE_URL.'/'.$products[1]['Vendor']['wide_image']; ?>" /></a>

						  <a href="<?= $linkback; ?> style="border:0"><img style="max-width:150px; max-height:150px; padding:4px; border:1px solid #d2d2d2" src="<?= FULL_BASE_URL.'/'.$products[2]['Vendor']['wide_image']; ?>" /></a><br>

						  

						</td>
					</tr>
					
					
					
					
                </table><br><br>



        <span style="color:#696969">Check out these events on the horizon</span>
        <br><br><span style="color:rgb(105,105,105);font-size:16px;text-align:left; font-family:comic sans ms">Want to put a smile on your friends’ faces? Brighten someone’s day by giving them fabulous gift. You don’t need a reason, but just in case you want one...</span>

<table width="600px" cellpadding="0" cellspacing="0" align="center" border="0" style="border:1px solid #ffffff"><tr><td>
    <table align="center" width="600px" cellpadding="0" cellspacing="0" border="0" style="font-family:Helvetica, Arial, sans-serif; font-size:14px">
       
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
        
</td></tr></table>

<!-- Main page close -->
</div>
<table border="0" cellpadding="10" valign="center" cellspacing="10" width="450" style="margin-left:80px">
<tr>
<td valign="left" width="50%" style="padding-top:0px;border-collapse:collapse">
<div style="color:#696969;font-family:&#39;comic sans ms&#39:;font-size:12px;line-height:150%;text-align:left"><span style="font-family:&#39;comic sans ms&#39;,&#39;marker felt-thin&#39;,arial,sans-serif"></span><span style="color:#696969;font-size:16px; font-family:comic sans ms;margin-left:20px">You're awesome!</span><br>
    Thanks so much for being part of the giftology family. We don’t know where we’d be without you. Be the first to gift your friends on the special days, get to know about the latest events and gifts by simply liking to our Facebook page.</div>
</td>
<td valign="left" width="50%" style="padding-top:0px;border-collapse:collapse">

<div style="color:#696969;font-family:&#39;comic sans ms&#39:;font-size:12px;line-height:150%;text-align:left"><span style="font-family:&#39;comic sans ms&#39;,&#39;marker felt-thin&#39;,arial,sans-serif"></span><span style="color:#696969;font-size:16px; font-family:comic sans ms">Got a burning question?</span><br>We can make giftology better. Feel free to send any questions, comments or suggestions to cs@giftology.com. We’d love to hear from you.Your suggestions are important for us.
    </div>
</td>
</tr>
<tr>
<td align="center" colspan="2" valign="middle" style="padding-top:0;padding-bottom:20px;border-collapse:collapse">
<table border="0" cellpadding="10" cellspacing="0" style="background-color:#e86848;border:1px solid #c84f3d;border-radius:10px">
<tr>
<td align="center" valign="middle" style="padding-right:20px;padding-left:20px;border-collapse:collapse">
<div style="color:#ffffff;font-family:Helvetica;font-size:20px;font-weight:bold;line-height:100%;text-align:center;text-decoration:none"><a href="http://www.giftology.com/?utm_source=mandrillapp&utm_medium=email&utm_campaign=welcome" style="color:#ffffff;font-family:Helvetica;font-size:20px;font-weight:bold;line-height:100%;text-align:center;text-decoration:none" target="_blank"><img align="none" height="40" src="<?= IMAGE_ROOT; ?>connect_withfb.jpg" style="width:297px;min-height:40px;border:0;line-height:100%;outline:none;text-decoration:none" width="297"></a><br>
</div>
</td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td valign="top" width="280" style="border-collapse:collapse;background-color:#ffffff">
<table border="0" cellpadding="20" cellspacing="0" width="100%">
</table>
</td>
<td valign="top" width="280" style="border-collapse:collapse;background-color:#ffffff">
<table border="0" cellpadding="20" cellspacing="0" width="100%">
</table>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td align="center" valign="top" style="border-collapse:collapse">
<table border="0" cellpadding="10" cellspacing="0" width="600" style="background-color:#f7f5ae">
<tr>
<td valign="top" style="border-collapse:collapse">
<table border="0" cellpadding="10" cellspacing="0" width="100%">
<tr>
<td colspan="2" valign="middle" style="border-collapse:collapse">
    <div style="color:#707070;font-family:Helvetica;font-size:12px;line-height:125%;text-align:center"><a href="http://www.giftology.com/?utm_source=mandrillapp&utm_medium=email&utm_campaign=welcome" style="color:#e86848;font-weight:normal;text-decoration:underline" target="_blank"> </a><a href="http://www.giftology.com/?utm_source=mandrillapp&utm_medium=email&utm_campaign=welcome" style="color:#e86848;font-weight:normal;text-decoration:underline" target="_blank">follow on Twitter</a> | <a href="http://www.twitter.com/mygiftology" style="color:#e86848;font-weight:normal;text-decoration:underline" target="_blank">Like</a><a href="http://www.facebook.com/giftologyindiaa" style="color:#e86848;font-weight:normal;text-decoration:underline" target="_blank"> on Facebook</a> </div>
</td>
</tr>
<tr>
<td valign="top" width="350" style="border-collapse:collapse">
<div style="color:#707070;font-family:Helvetica;font-size:12px;line-height:125%;text-align:left"><span style="color:#000000"><span style="font-size:11px;line-height:16px;text-align:center">Please do not reply to this message - it was sent from an unmonitored email address.</span><br style="color:rgb(238,238,238);font-size:11px;line-height:16px;text-align:center;background-color:rgb(185,15,15)">
<span style="font-size:11px;line-height:16px;text-align:center">This message is a service email related to your account.</span><br style="color:rgb(238,238,238);font-size:11px;line-height:16px;text-align:center;background-color:rgb(185,15,15)">
<span style="font-size:11px;line-height:16px;text-align:center">For any support or questions, please mail us at <a href="mailto:cs@giftology.com?subject=feedback" style="color:#e86848;font-weight:normal;text-decoration:underline" target="_blank">cs@giftology.com</a></span></span></div>
</td>
<td valign="top" width="190" style="border-collapse:collapse">
<div style="color:#707070;font-family:Helvetica;font-size:12px;line-height:125%;text-align:left"></div>
</td>
</tr>
<tr>
<td colspan="2" valign="middle" style="border-collapse:collapse">
<div style="color:#707070;font-family:Helvetica;font-size:12px;line-height:125%;text-align:center">
    <a href="http://www.giftology.com/?utm_source=mandrillapp&utm_medium=email&utm_campaign=welcome" style="color:#e86848;font-weight:normal;text-decoration:underline" target="_blank">update subscription preferences</a> | <a href="http://www.giftology.com/users/setting/?utm_source=mandrillapp&utm_medium=email&utm_campaign=welcome" style="color:#e86848;font-weight:normal;text-decoration:underline" target="_blank">unsubscribe from this list</a> 
</div>
</td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
</table>
<br>
</td>
</tr>
</table>
</center><font color="#550055">
<center>
<br>
<br>
<br>
<br>
<br>
<br>
<table border="0" cellpadding="20" cellspacing="0" width="100%" style="background:#eeeeee!important;border-top:1px solid #dddddd;clear:both">
<tr>
<td align="center" valign="top" style="padding-bottom:0">
<table border="0" cellpadding="0" cellspacing="0" width="600">
<tr>
<td align="left" valign="top" style="color:#505050!important;font-family:Verdana,Arial,Sans!important;font-size:11px!important;font-weight:normal!important;text-decoration:none!important;vertical-align:top!important;text-align:left!important">
Sent to <a href="mailto:varun@giftology.com" target="_blank">varun@giftology.com</a> — <a href="http://www.giftology.com/?utm_source=mandrillapp&utm_medium=email&utm_campaign=welcome" style="font-family:Verdana,Arial,Sans!important;font-size:11px!important;font-weight:normal!important;text-decoration:underline!important;color:#404040!important" target="_blank"><em>why did I get this?</em></a>
<br>
<a href="http://www.giftology.com/?utm_source=mandrillapp&utm_medium=email&utm_campaign=welcome" style="font-family:Verdana,Arial,Sans!important;font-size:11px!important;font-weight:normal!important;text-decoration:none!important;color:#369!important" target="_blank">unsubscribe from this list</a> |
<a href="http://www.giftology.com/?utm_source=mandrillapp&utm_medium=email&utm_campaign=welcome" style="font-family:Verdana,Arial,Sans!important;font-size:11px!important;font-weight:normal!important;text-decoration:none!important;color:#369!important" target="_blank">update subscription preferences</a>
<br>
<a href="http://www.giftology.com/?utm_source=mandrillapp&utm_medium=email&utm_campaign=welcome" target="_blank">giftology.com</a> • NR-27, crossroad complex • DLF Phase 3 • gurgaon 122010
</tr>
</table>
</td>
</tr>
</table>
</center>
</font></div>
</font>
</table>
</body>
</html>

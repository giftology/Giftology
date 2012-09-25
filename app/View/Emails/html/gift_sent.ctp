<table width="600px" cellpadding="0" cellspacing="0" align="center" border="0" style="border:1px solid #999999"><tr><td>
	<table align="center" width="600px" cellpadding="0" cellspacing="0" border="0" style="font-family:Arial, Helvetica, sans-serif; font-size:20px">
		<tr><td height="8px" bgcolor="#bc202b"></td></tr>
		<tr><td align="right" style="padding:10px"><img src="http://localhost/img/logo.jpg" /></tr>
		<tr>
		  <td height="40px"><p>Congratulations <?= $receiver; ?> ! </p>
        <p><?= $sender; ?> has sent you a real gift voucher to <?= $vendor; ?>.  <a href="<?= $linkback; ?>">Click here</a> to join the Giftology family and redeem your gift voucher. </p>
        <p>Enjoy ! </p></td></tr>
				
		<tr><td height="150px">
                 <br />
                <p><?= $sender; ?> says:</p>
                <p style="padding-left:20px"><i>"<?=$message;?>"</i></p>
            <h2>Gift voucher worth &#x20b9;<?= $value; ?> at </h2>
            <img width="200" height="64" src="<?= $wide_image_link; ?>">
            <h2><a href="<?= $linkback; ?>">Click here to redeem</a></h2>
</td></tr>
		<tr style="background-color:#000">
			<td>
				<table bgcolor="#000000" style="color:#fff; font-size:16px; font-family:Arial, Helvetica, sans-serif" width="100%" cellspacing="10">
					<tr>
						<td><span style="font-size:14px; color:#d2d2d2">cs@giftology.com</span></td>
						<td align="right"><span style="font-size:16px; color:#d2d2d2">www.giftology.com</span></td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</td></tr></table>
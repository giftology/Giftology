<?php
App::uses('Component', 'Controller');
class GiftologyComponent extends Component {
	function generateGiftCode($prodId) {
	    $length = 4;
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
	    $string = 'GIFT-'.$prodId.'-';
	    for ($p = 0; $p < $length; $p++) {
		$string .= $characters[mt_rand(0, strlen($characters)-1)];
		}
	    return $string;
	}
	function postToFB($fb_id, $access_token, $url, $message, $receiver_fb_id, $receiver_name) {
		// go with exec curl, as the return here is quicker (asynchronous) NS
		//exec('curl -F \'access_token='.$access_token.'\' -F \'message='.$message.'\' -F \'link='.$url.'\' https://graph.facebook.com/'.$fb_id.'/feed  > /dev/null 2>&1 &');
		// Issue with exec multiple threads, doesnt work, switching back to curl_exec
		$fields = array(
		    'access_token'=> $access_token,
	          'message'=>$message,
              'name' => $receiver_name,
	          'link'=>$url,
              'caption' => $message,
              'actions' => array('link' => $url, $name => $receiver_name),
              'place' => '185972794801597',
              'tags' => $receiver_fb_id
	        );
		$ch = curl_init();

		//set the url, number of POST vars, POST data
		curl_setopt($ch,CURLOPT_URL,'https://graph.facebook.com/'.$fb_id.'/feed');
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return the output instead of sprewing it to screen
		curl_setopt($ch,CURLOPT_POSTFIELDS,$fields);
		
		//execute post
		$result = curl_exec($ch);
		$error = curl_error($ch);

		if ($error) {
			$this->log($fb_id." token ".$access_token.$error, 'ns');
		}
		//close connection
		curl_close($ch);
	}
}

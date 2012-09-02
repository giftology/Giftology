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
}

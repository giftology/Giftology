<?php
App::uses('Component', 'Controller');
class UserWhiteListComponent extends Component {
	function white_list($user_fb_id) {
		/*$defaulters = array(1851691593,100005543981473,100005501501914);
	    $fp = fopen(ROOT.'/app/tmp/'.'defaulters.csv', 'r');
	    $line_array = array();
	    while($linearray = fgetcsv($fp)){
	    	$defaulters[] = $linearray;
	    }
	    $defaulter = in_array($user_fb_id, $defaulters[0]);*/
	    
	    $white_listed_users = array(100004342150637);
	    $defaulter = in_array($user_fb_id, $white_listed_users);
	    return $defaulter;
	}
}
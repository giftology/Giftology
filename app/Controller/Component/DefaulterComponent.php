<?php
App::uses('Component', 'Controller');
class DefaulterComponent extends Component {
	function defaulters_list($user_fb_id) {
		$defaulters = array(1851691593,100005543981473);
	    /*$fp = $fp = fopen(ROOT.'/app/tmp/'.'defaulters.csv', 'r');
	    $line_array = array();
	    $while($linearray = fgetcsv($fp)){
	    	$defaulters = $linearray;
	    }*/
	    $defaulter = in_array($user_fb_id, $defaulters);
	    return $defaulter;
	}
}
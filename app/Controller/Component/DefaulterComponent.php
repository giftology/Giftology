<?php
App::uses('Component', 'Controller');
class DefaulterComponent extends Component {
	function defaulters_list($user_fb_id) {
		/*$defaulters = array(1851691593,100005543981473,100005501501914);
	    $fp = fopen(ROOT.'/app/tmp/'.'defaulters.csv', 'r');
	    $line_array = array();
	    while($linearray = fgetcsv($fp)){
	    	$defaulters[] = $linearray;
	    }
	    $defaulter = in_array($user_fb_id, $defaulters[0]);*/
	    $defaulters = array(1851691593,100005543981473,100000678486376,100004488369286,10000396701270,582264226,1792236841,100001972394330,100002449145797,1566298187,100001279783328,1234441696,100001279783328,100000377682936,677152056,100001418953825,100005543981473,100005501501914,100001392543171,1672249409,1566298187,1139626999,100005501501914,100004734788325,100004094964735,100000466429903,100000730434494,100000466429903,100000730434494);
	    $white_listed_users = array(100004342150637);
	    $new_defaulters_list = array_diff($defaulters, $white_listed_users);
        $defaulter = in_array($user_fb_id, $new_defaulters_list);
	    return $defaulter;
	}

	function senders_restricted_for_product($id){
		$defaulters = array();
		return $defaulters[$id];
	}

	function receivers_restricted_for_product($id){
		$defaulters = array();
		return $defaulters[$id];
	}
    
    function blocked_users_check($product_id, $receiver_fb_id, $sender_fb_id){
        $result = array();
        $result['status'] = FALSE;
        if(RESTRICT_GIFTOLOGY_EMPLOYEE_FOR_PRODUCTS){
            $senders_restricted = array();
            $receivers_restricted = array();
            $senders_restricted = $this->senders_restricted_for_product($product_id);
            $receivers_restricted = $this->receivers_restricted_for_product($product_id);
            $receiver_blocked = FALSE;
            $sender_blocked = FALSE;
            if(isset($receivers_restricted) && !empty($receivers_restricted))
                $receiver_blocked = in_array($receiver_fb_id, $receivers_restricted);
            if(isset($senders_restricted) && !empty($senders_restricted))
                $sender_blocked = in_array($sender_fb_id, $senders_restricted);
            if($sender_blocked || $receiver_blocked){
                if($sender_blocked){
                    $result['message'] = 'You are not eligible to send this gift';   
                }
                if($receiver_blocked){
                    $result['message'] = 'Receiver is not eligible to receive this gift';    
                }
                $result['status'] = TRUE;
            }
        }
        return $result;
    }
}
<?php
App::uses('Component', 'Controller');
class BlackListProductComponent extends Component {
	function products_list() {
		$defaulters = array();
	   //$defaulters = array(105 => 105,109 => 109, 110 => 110);
	   return $defaulters;
	}
}
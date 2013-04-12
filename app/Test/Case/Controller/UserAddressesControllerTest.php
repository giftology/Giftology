<?php
App::uses('UserAddressesController', 'Controller');

/**
 * UserAddressesController Test Case
 *
 */
class UserAddressesControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user_address',
		'app.user',
		'app.user_profile',
		'app.user_utm',
		'app.gift',
		'app.product',
		'app.vendor',
		'app.product_type',
		'app.gender_segment',
		'app.age_segment',
		'app.city_segment',
		'app.code_type',
		'app.uploaded_product_code',
		'app.gift_status',
		'app.reminder',
		'app.transaction',
		'app.transaction_status'
	);

/**
 * testIndex method
 *
 * @return void
 */
	public function testIndex() {
	}

/**
 * testView method
 *
 * @return void
 */
	public function testView() {
	}

/**
 * testAdd method
 *
 * @return void
 */
	public function testAdd() {
	}

/**
 * testEdit method
 *
 * @return void
 */
	public function testEdit() {
	}

/**
 * testDelete method
 *
 * @return void
 */
	public function testDelete() {
	}

}

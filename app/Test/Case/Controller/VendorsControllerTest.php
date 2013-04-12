<?php
App::uses('VendorsController', 'Controller');

/**
 * VendorsController Test Case
 *
 */
class VendorsControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.vendor',
		'app.product',
		'app.product_type',
		'app.gender_segment',
		'app.age_segment',
		'app.city_segment',
		'app.code_type',
		'app.gift',
		'app.gift_status',
		'app.user',
		'app.user_profile',
		'app.user_utm',
		'app.user_address',
		'app.reminder',
		'app.transaction',
		'app.transaction_status',
		'app.uploaded_product_code'
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

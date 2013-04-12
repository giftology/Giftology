<?php
App::uses('TransactionStatusesController', 'Controller');

/**
 * TransactionStatusesController Test Case
 *
 */
class TransactionStatusesControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.transaction_status',
		'app.transaction',
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
		'app.user',
		'app.user_profile',
		'app.user_utm',
		'app.user_address',
		'app.reminder'
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

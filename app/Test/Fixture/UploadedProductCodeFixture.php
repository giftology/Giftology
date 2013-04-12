<?php
/**
 * UploadedProductCodeFixture
 *
 */
class UploadedProductCodeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'product_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'code' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'value' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10),
		'available' => array('type' => 'integer', 'null' => true, 'default' => '1', 'length' => 10, 'comment' => '1 = Available, 0 = Used, '),
		'expiry' => array('type' => 'date', 'null' => true, 'default' => null),
		'pin' => array('type' => 'integer', 'null' => true, 'default' => '123456'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_uploaded_product_codes_products1_idx' => array('column' => 'product_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'product_id' => 1,
			'code' => 'Lorem ipsum dolor sit amet',
			'value' => 1,
			'available' => 1,
			'expiry' => '2013-04-11',
			'pin' => 1
		),
		array(
			'id' => 2,
			'product_id' => 2,
			'code' => 'Lorem ipsum dolor sit amet',
			'value' => 2,
			'available' => 2,
			'expiry' => '2013-04-11',
			'pin' => 2
		),
		array(
			'id' => 3,
			'product_id' => 3,
			'code' => 'Lorem ipsum dolor sit amet',
			'value' => 3,
			'available' => 3,
			'expiry' => '2013-04-11',
			'pin' => 3
		),
		array(
			'id' => 4,
			'product_id' => 4,
			'code' => 'Lorem ipsum dolor sit amet',
			'value' => 4,
			'available' => 4,
			'expiry' => '2013-04-11',
			'pin' => 4
		),
		array(
			'id' => 5,
			'product_id' => 5,
			'code' => 'Lorem ipsum dolor sit amet',
			'value' => 5,
			'available' => 5,
			'expiry' => '2013-04-11',
			'pin' => 5
		),
		array(
			'id' => 6,
			'product_id' => 6,
			'code' => 'Lorem ipsum dolor sit amet',
			'value' => 6,
			'available' => 6,
			'expiry' => '2013-04-11',
			'pin' => 6
		),
		array(
			'id' => 7,
			'product_id' => 7,
			'code' => 'Lorem ipsum dolor sit amet',
			'value' => 7,
			'available' => 7,
			'expiry' => '2013-04-11',
			'pin' => 7
		),
		array(
			'id' => 8,
			'product_id' => 8,
			'code' => 'Lorem ipsum dolor sit amet',
			'value' => 8,
			'available' => 8,
			'expiry' => '2013-04-11',
			'pin' => 8
		),
		array(
			'id' => 9,
			'product_id' => 9,
			'code' => 'Lorem ipsum dolor sit amet',
			'value' => 9,
			'available' => 9,
			'expiry' => '2013-04-11',
			'pin' => 9
		),
		array(
			'id' => 10,
			'product_id' => 10,
			'code' => 'Lorem ipsum dolor sit amet',
			'value' => 10,
			'available' => 10,
			'expiry' => '2013-04-11',
			'pin' => 10
		),
	);

}

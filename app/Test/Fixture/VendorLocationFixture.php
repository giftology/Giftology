<?php
/**
 * VendorLocationFixture
 *
 */
class VendorLocationFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'address1' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 200, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'address2' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'city' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'pin_code' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'phone1' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'phone2' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'phone3' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'google_maps_link' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 200, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'vendors_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_vendor_locations_vendors1_idx' => array('column' => 'vendors_id', 'unique' => 0)
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
			'address1' => 'Lorem ipsum dolor sit amet',
			'address2' => 'Lorem ipsum dolor sit amet',
			'city' => 'Lorem ipsum dolor sit amet',
			'pin_code' => 'Lorem ipsum dolor sit amet',
			'phone1' => 'Lorem ipsum dolor sit amet',
			'phone2' => 'Lorem ipsum dolor sit amet',
			'phone3' => 'Lorem ipsum dolor sit amet',
			'google_maps_link' => 'Lorem ipsum dolor sit amet',
			'vendors_id' => 1,
			'created' => '2013-04-11 15:09:17',
			'modified' => '2013-04-11 15:09:17'
		),
		array(
			'id' => 2,
			'address1' => 'Lorem ipsum dolor sit amet',
			'address2' => 'Lorem ipsum dolor sit amet',
			'city' => 'Lorem ipsum dolor sit amet',
			'pin_code' => 'Lorem ipsum dolor sit amet',
			'phone1' => 'Lorem ipsum dolor sit amet',
			'phone2' => 'Lorem ipsum dolor sit amet',
			'phone3' => 'Lorem ipsum dolor sit amet',
			'google_maps_link' => 'Lorem ipsum dolor sit amet',
			'vendors_id' => 2,
			'created' => '2013-04-11 15:09:17',
			'modified' => '2013-04-11 15:09:17'
		),
		array(
			'id' => 3,
			'address1' => 'Lorem ipsum dolor sit amet',
			'address2' => 'Lorem ipsum dolor sit amet',
			'city' => 'Lorem ipsum dolor sit amet',
			'pin_code' => 'Lorem ipsum dolor sit amet',
			'phone1' => 'Lorem ipsum dolor sit amet',
			'phone2' => 'Lorem ipsum dolor sit amet',
			'phone3' => 'Lorem ipsum dolor sit amet',
			'google_maps_link' => 'Lorem ipsum dolor sit amet',
			'vendors_id' => 3,
			'created' => '2013-04-11 15:09:17',
			'modified' => '2013-04-11 15:09:17'
		),
		array(
			'id' => 4,
			'address1' => 'Lorem ipsum dolor sit amet',
			'address2' => 'Lorem ipsum dolor sit amet',
			'city' => 'Lorem ipsum dolor sit amet',
			'pin_code' => 'Lorem ipsum dolor sit amet',
			'phone1' => 'Lorem ipsum dolor sit amet',
			'phone2' => 'Lorem ipsum dolor sit amet',
			'phone3' => 'Lorem ipsum dolor sit amet',
			'google_maps_link' => 'Lorem ipsum dolor sit amet',
			'vendors_id' => 4,
			'created' => '2013-04-11 15:09:17',
			'modified' => '2013-04-11 15:09:17'
		),
		array(
			'id' => 5,
			'address1' => 'Lorem ipsum dolor sit amet',
			'address2' => 'Lorem ipsum dolor sit amet',
			'city' => 'Lorem ipsum dolor sit amet',
			'pin_code' => 'Lorem ipsum dolor sit amet',
			'phone1' => 'Lorem ipsum dolor sit amet',
			'phone2' => 'Lorem ipsum dolor sit amet',
			'phone3' => 'Lorem ipsum dolor sit amet',
			'google_maps_link' => 'Lorem ipsum dolor sit amet',
			'vendors_id' => 5,
			'created' => '2013-04-11 15:09:17',
			'modified' => '2013-04-11 15:09:17'
		),
		array(
			'id' => 6,
			'address1' => 'Lorem ipsum dolor sit amet',
			'address2' => 'Lorem ipsum dolor sit amet',
			'city' => 'Lorem ipsum dolor sit amet',
			'pin_code' => 'Lorem ipsum dolor sit amet',
			'phone1' => 'Lorem ipsum dolor sit amet',
			'phone2' => 'Lorem ipsum dolor sit amet',
			'phone3' => 'Lorem ipsum dolor sit amet',
			'google_maps_link' => 'Lorem ipsum dolor sit amet',
			'vendors_id' => 6,
			'created' => '2013-04-11 15:09:17',
			'modified' => '2013-04-11 15:09:17'
		),
		array(
			'id' => 7,
			'address1' => 'Lorem ipsum dolor sit amet',
			'address2' => 'Lorem ipsum dolor sit amet',
			'city' => 'Lorem ipsum dolor sit amet',
			'pin_code' => 'Lorem ipsum dolor sit amet',
			'phone1' => 'Lorem ipsum dolor sit amet',
			'phone2' => 'Lorem ipsum dolor sit amet',
			'phone3' => 'Lorem ipsum dolor sit amet',
			'google_maps_link' => 'Lorem ipsum dolor sit amet',
			'vendors_id' => 7,
			'created' => '2013-04-11 15:09:17',
			'modified' => '2013-04-11 15:09:17'
		),
		array(
			'id' => 8,
			'address1' => 'Lorem ipsum dolor sit amet',
			'address2' => 'Lorem ipsum dolor sit amet',
			'city' => 'Lorem ipsum dolor sit amet',
			'pin_code' => 'Lorem ipsum dolor sit amet',
			'phone1' => 'Lorem ipsum dolor sit amet',
			'phone2' => 'Lorem ipsum dolor sit amet',
			'phone3' => 'Lorem ipsum dolor sit amet',
			'google_maps_link' => 'Lorem ipsum dolor sit amet',
			'vendors_id' => 8,
			'created' => '2013-04-11 15:09:17',
			'modified' => '2013-04-11 15:09:17'
		),
		array(
			'id' => 9,
			'address1' => 'Lorem ipsum dolor sit amet',
			'address2' => 'Lorem ipsum dolor sit amet',
			'city' => 'Lorem ipsum dolor sit amet',
			'pin_code' => 'Lorem ipsum dolor sit amet',
			'phone1' => 'Lorem ipsum dolor sit amet',
			'phone2' => 'Lorem ipsum dolor sit amet',
			'phone3' => 'Lorem ipsum dolor sit amet',
			'google_maps_link' => 'Lorem ipsum dolor sit amet',
			'vendors_id' => 9,
			'created' => '2013-04-11 15:09:17',
			'modified' => '2013-04-11 15:09:17'
		),
		array(
			'id' => 10,
			'address1' => 'Lorem ipsum dolor sit amet',
			'address2' => 'Lorem ipsum dolor sit amet',
			'city' => 'Lorem ipsum dolor sit amet',
			'pin_code' => 'Lorem ipsum dolor sit amet',
			'phone1' => 'Lorem ipsum dolor sit amet',
			'phone2' => 'Lorem ipsum dolor sit amet',
			'phone3' => 'Lorem ipsum dolor sit amet',
			'google_maps_link' => 'Lorem ipsum dolor sit amet',
			'vendors_id' => 10,
			'created' => '2013-04-11 15:09:17',
			'modified' => '2013-04-11 15:09:17'
		),
	);

}

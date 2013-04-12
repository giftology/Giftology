<?php
/**
 * VendorFixture
 *
 */
class VendorFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'thumb_image' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 150, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'facebook_image' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 150, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'wide_image' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 150, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'description' => array('type' => 'binary', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
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
			'name' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:09:18',
			'modified' => '2013-04-11 15:09:18',
			'thumb_image' => 'Lorem ipsum dolor sit amet',
			'facebook_image' => 'Lorem ipsum dolor sit amet',
			'wide_image' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 2,
			'name' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:09:18',
			'modified' => '2013-04-11 15:09:18',
			'thumb_image' => 'Lorem ipsum dolor sit amet',
			'facebook_image' => 'Lorem ipsum dolor sit amet',
			'wide_image' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 3,
			'name' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:09:18',
			'modified' => '2013-04-11 15:09:18',
			'thumb_image' => 'Lorem ipsum dolor sit amet',
			'facebook_image' => 'Lorem ipsum dolor sit amet',
			'wide_image' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 4,
			'name' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:09:18',
			'modified' => '2013-04-11 15:09:18',
			'thumb_image' => 'Lorem ipsum dolor sit amet',
			'facebook_image' => 'Lorem ipsum dolor sit amet',
			'wide_image' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 5,
			'name' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:09:18',
			'modified' => '2013-04-11 15:09:18',
			'thumb_image' => 'Lorem ipsum dolor sit amet',
			'facebook_image' => 'Lorem ipsum dolor sit amet',
			'wide_image' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 6,
			'name' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:09:18',
			'modified' => '2013-04-11 15:09:18',
			'thumb_image' => 'Lorem ipsum dolor sit amet',
			'facebook_image' => 'Lorem ipsum dolor sit amet',
			'wide_image' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 7,
			'name' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:09:18',
			'modified' => '2013-04-11 15:09:18',
			'thumb_image' => 'Lorem ipsum dolor sit amet',
			'facebook_image' => 'Lorem ipsum dolor sit amet',
			'wide_image' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 8,
			'name' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:09:18',
			'modified' => '2013-04-11 15:09:18',
			'thumb_image' => 'Lorem ipsum dolor sit amet',
			'facebook_image' => 'Lorem ipsum dolor sit amet',
			'wide_image' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 9,
			'name' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:09:18',
			'modified' => '2013-04-11 15:09:18',
			'thumb_image' => 'Lorem ipsum dolor sit amet',
			'facebook_image' => 'Lorem ipsum dolor sit amet',
			'wide_image' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 10,
			'name' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:09:18',
			'modified' => '2013-04-11 15:09:18',
			'thumb_image' => 'Lorem ipsum dolor sit amet',
			'facebook_image' => 'Lorem ipsum dolor sit amet',
			'wide_image' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet'
		),
	);

}

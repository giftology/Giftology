<?php
/**
 * UserAddressFixture
 *
 */
class UserAddressFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'first_name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'last_name' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'address1' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 250, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'address2' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 250, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'city' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'pin_code' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'country' => array('type' => 'string', 'null' => true, 'default' => 'India', 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'phone' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'reciever_email' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'state' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => array('id', 'user_id'), 'unique' => 1),
			'fk_user_addresses_user1_idx' => array('column' => 'user_id', 'unique' => 0)
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
			'user_id' => 1,
			'first_name' => 'Lorem ipsum dolor sit amet',
			'last_name' => 'Lorem ipsum dolor sit amet',
			'address1' => 'Lorem ipsum dolor sit amet',
			'address2' => 'Lorem ipsum dolor sit amet',
			'city' => 'Lorem ipsum dolor sit amet',
			'pin_code' => 'Lorem ipsum dolor sit amet',
			'country' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:09:09',
			'modified' => '2013-04-11 15:09:09',
			'phone' => 'Lorem ipsum dolor sit amet',
			'reciever_email' => 'Lorem ipsum dolor sit amet',
			'state' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 2,
			'user_id' => 2,
			'first_name' => 'Lorem ipsum dolor sit amet',
			'last_name' => 'Lorem ipsum dolor sit amet',
			'address1' => 'Lorem ipsum dolor sit amet',
			'address2' => 'Lorem ipsum dolor sit amet',
			'city' => 'Lorem ipsum dolor sit amet',
			'pin_code' => 'Lorem ipsum dolor sit amet',
			'country' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:09:09',
			'modified' => '2013-04-11 15:09:09',
			'phone' => 'Lorem ipsum dolor sit amet',
			'reciever_email' => 'Lorem ipsum dolor sit amet',
			'state' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 3,
			'user_id' => 3,
			'first_name' => 'Lorem ipsum dolor sit amet',
			'last_name' => 'Lorem ipsum dolor sit amet',
			'address1' => 'Lorem ipsum dolor sit amet',
			'address2' => 'Lorem ipsum dolor sit amet',
			'city' => 'Lorem ipsum dolor sit amet',
			'pin_code' => 'Lorem ipsum dolor sit amet',
			'country' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:09:09',
			'modified' => '2013-04-11 15:09:09',
			'phone' => 'Lorem ipsum dolor sit amet',
			'reciever_email' => 'Lorem ipsum dolor sit amet',
			'state' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 4,
			'user_id' => 4,
			'first_name' => 'Lorem ipsum dolor sit amet',
			'last_name' => 'Lorem ipsum dolor sit amet',
			'address1' => 'Lorem ipsum dolor sit amet',
			'address2' => 'Lorem ipsum dolor sit amet',
			'city' => 'Lorem ipsum dolor sit amet',
			'pin_code' => 'Lorem ipsum dolor sit amet',
			'country' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:09:09',
			'modified' => '2013-04-11 15:09:09',
			'phone' => 'Lorem ipsum dolor sit amet',
			'reciever_email' => 'Lorem ipsum dolor sit amet',
			'state' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 5,
			'user_id' => 5,
			'first_name' => 'Lorem ipsum dolor sit amet',
			'last_name' => 'Lorem ipsum dolor sit amet',
			'address1' => 'Lorem ipsum dolor sit amet',
			'address2' => 'Lorem ipsum dolor sit amet',
			'city' => 'Lorem ipsum dolor sit amet',
			'pin_code' => 'Lorem ipsum dolor sit amet',
			'country' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:09:09',
			'modified' => '2013-04-11 15:09:09',
			'phone' => 'Lorem ipsum dolor sit amet',
			'reciever_email' => 'Lorem ipsum dolor sit amet',
			'state' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 6,
			'user_id' => 6,
			'first_name' => 'Lorem ipsum dolor sit amet',
			'last_name' => 'Lorem ipsum dolor sit amet',
			'address1' => 'Lorem ipsum dolor sit amet',
			'address2' => 'Lorem ipsum dolor sit amet',
			'city' => 'Lorem ipsum dolor sit amet',
			'pin_code' => 'Lorem ipsum dolor sit amet',
			'country' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:09:09',
			'modified' => '2013-04-11 15:09:09',
			'phone' => 'Lorem ipsum dolor sit amet',
			'reciever_email' => 'Lorem ipsum dolor sit amet',
			'state' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 7,
			'user_id' => 7,
			'first_name' => 'Lorem ipsum dolor sit amet',
			'last_name' => 'Lorem ipsum dolor sit amet',
			'address1' => 'Lorem ipsum dolor sit amet',
			'address2' => 'Lorem ipsum dolor sit amet',
			'city' => 'Lorem ipsum dolor sit amet',
			'pin_code' => 'Lorem ipsum dolor sit amet',
			'country' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:09:09',
			'modified' => '2013-04-11 15:09:09',
			'phone' => 'Lorem ipsum dolor sit amet',
			'reciever_email' => 'Lorem ipsum dolor sit amet',
			'state' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 8,
			'user_id' => 8,
			'first_name' => 'Lorem ipsum dolor sit amet',
			'last_name' => 'Lorem ipsum dolor sit amet',
			'address1' => 'Lorem ipsum dolor sit amet',
			'address2' => 'Lorem ipsum dolor sit amet',
			'city' => 'Lorem ipsum dolor sit amet',
			'pin_code' => 'Lorem ipsum dolor sit amet',
			'country' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:09:09',
			'modified' => '2013-04-11 15:09:09',
			'phone' => 'Lorem ipsum dolor sit amet',
			'reciever_email' => 'Lorem ipsum dolor sit amet',
			'state' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 9,
			'user_id' => 9,
			'first_name' => 'Lorem ipsum dolor sit amet',
			'last_name' => 'Lorem ipsum dolor sit amet',
			'address1' => 'Lorem ipsum dolor sit amet',
			'address2' => 'Lorem ipsum dolor sit amet',
			'city' => 'Lorem ipsum dolor sit amet',
			'pin_code' => 'Lorem ipsum dolor sit amet',
			'country' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:09:09',
			'modified' => '2013-04-11 15:09:09',
			'phone' => 'Lorem ipsum dolor sit amet',
			'reciever_email' => 'Lorem ipsum dolor sit amet',
			'state' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 10,
			'user_id' => 10,
			'first_name' => 'Lorem ipsum dolor sit amet',
			'last_name' => 'Lorem ipsum dolor sit amet',
			'address1' => 'Lorem ipsum dolor sit amet',
			'address2' => 'Lorem ipsum dolor sit amet',
			'city' => 'Lorem ipsum dolor sit amet',
			'pin_code' => 'Lorem ipsum dolor sit amet',
			'country' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:09:09',
			'modified' => '2013-04-11 15:09:09',
			'phone' => 'Lorem ipsum dolor sit amet',
			'reciever_email' => 'Lorem ipsum dolor sit amet',
			'state' => 'Lorem ipsum dolor sit amet'
		),
	);

}

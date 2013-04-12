<?php
/**
 * UserFixture
 *
 */
class UserFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary', 'comment' => '		'),
		'username' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'password' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'role' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'facebook_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 20, 'key' => 'index'),
		'last_login' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'access_token' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'facebook_id' => array('column' => 'facebook_id', 'unique' => 0)
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
			'username' => 'Lorem ipsum dolor sit amet',
			'password' => 'Lorem ipsum dolor sit amet',
			'role' => 'Lorem ipsum dolor sit amet',
			'facebook_id' => 1,
			'last_login' => '2013-04-11 15:09:15',
			'access_token' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:09:15',
			'modified' => '2013-04-11 15:09:15'
		),
		array(
			'id' => 2,
			'username' => 'Lorem ipsum dolor sit amet',
			'password' => 'Lorem ipsum dolor sit amet',
			'role' => 'Lorem ipsum dolor sit amet',
			'facebook_id' => 2,
			'last_login' => '2013-04-11 15:09:15',
			'access_token' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:09:15',
			'modified' => '2013-04-11 15:09:15'
		),
		array(
			'id' => 3,
			'username' => 'Lorem ipsum dolor sit amet',
			'password' => 'Lorem ipsum dolor sit amet',
			'role' => 'Lorem ipsum dolor sit amet',
			'facebook_id' => 3,
			'last_login' => '2013-04-11 15:09:15',
			'access_token' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:09:15',
			'modified' => '2013-04-11 15:09:15'
		),
		array(
			'id' => 4,
			'username' => 'Lorem ipsum dolor sit amet',
			'password' => 'Lorem ipsum dolor sit amet',
			'role' => 'Lorem ipsum dolor sit amet',
			'facebook_id' => 4,
			'last_login' => '2013-04-11 15:09:15',
			'access_token' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:09:15',
			'modified' => '2013-04-11 15:09:15'
		),
		array(
			'id' => 5,
			'username' => 'Lorem ipsum dolor sit amet',
			'password' => 'Lorem ipsum dolor sit amet',
			'role' => 'Lorem ipsum dolor sit amet',
			'facebook_id' => 5,
			'last_login' => '2013-04-11 15:09:15',
			'access_token' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:09:15',
			'modified' => '2013-04-11 15:09:15'
		),
		array(
			'id' => 6,
			'username' => 'Lorem ipsum dolor sit amet',
			'password' => 'Lorem ipsum dolor sit amet',
			'role' => 'Lorem ipsum dolor sit amet',
			'facebook_id' => 6,
			'last_login' => '2013-04-11 15:09:15',
			'access_token' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:09:15',
			'modified' => '2013-04-11 15:09:15'
		),
		array(
			'id' => 7,
			'username' => 'Lorem ipsum dolor sit amet',
			'password' => 'Lorem ipsum dolor sit amet',
			'role' => 'Lorem ipsum dolor sit amet',
			'facebook_id' => 7,
			'last_login' => '2013-04-11 15:09:15',
			'access_token' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:09:15',
			'modified' => '2013-04-11 15:09:15'
		),
		array(
			'id' => 8,
			'username' => 'Lorem ipsum dolor sit amet',
			'password' => 'Lorem ipsum dolor sit amet',
			'role' => 'Lorem ipsum dolor sit amet',
			'facebook_id' => 8,
			'last_login' => '2013-04-11 15:09:15',
			'access_token' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:09:15',
			'modified' => '2013-04-11 15:09:15'
		),
		array(
			'id' => 9,
			'username' => 'Lorem ipsum dolor sit amet',
			'password' => 'Lorem ipsum dolor sit amet',
			'role' => 'Lorem ipsum dolor sit amet',
			'facebook_id' => 9,
			'last_login' => '2013-04-11 15:09:15',
			'access_token' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:09:15',
			'modified' => '2013-04-11 15:09:15'
		),
		array(
			'id' => 10,
			'username' => 'Lorem ipsum dolor sit amet',
			'password' => 'Lorem ipsum dolor sit amet',
			'role' => 'Lorem ipsum dolor sit amet',
			'facebook_id' => 10,
			'last_login' => '2013-04-11 15:09:15',
			'access_token' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:09:15',
			'modified' => '2013-04-11 15:09:15'
		),
	);

}

<?php
/**
 * UserProfileFixture
 *
 */
class UserProfileFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'first_name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'last_name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'email' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 250, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'mobile' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 15, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'city' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'gender' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'birthday' => array('type' => 'date', 'null' => true, 'default' => null),
		'birthyear' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 5, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'email_unsubscribed' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'indexes' => array(
			'PRIMARY' => array('column' => array('id', 'user_id'), 'unique' => 1),
			'fk_user_profiles_user1_idx' => array('column' => 'user_id', 'unique' => 0)
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
			'email' => 'Lorem ipsum dolor sit amet',
			'mobile' => 'Lorem ipsum d',
			'city' => 'Lorem ipsum dolor sit amet',
			'gender' => 'Lorem ipsum dolor sit amet',
			'birthday' => '2013-04-11',
			'birthyear' => 'Lor',
			'created' => '2013-04-11 15:09:13',
			'modified' => '2013-04-11 15:09:13',
			'email_unsubscribed' => 1
		),
		array(
			'id' => 2,
			'user_id' => 2,
			'first_name' => 'Lorem ipsum dolor sit amet',
			'last_name' => 'Lorem ipsum dolor sit amet',
			'email' => 'Lorem ipsum dolor sit amet',
			'mobile' => 'Lorem ipsum d',
			'city' => 'Lorem ipsum dolor sit amet',
			'gender' => 'Lorem ipsum dolor sit amet',
			'birthday' => '2013-04-11',
			'birthyear' => 'Lor',
			'created' => '2013-04-11 15:09:13',
			'modified' => '2013-04-11 15:09:13',
			'email_unsubscribed' => 1
		),
		array(
			'id' => 3,
			'user_id' => 3,
			'first_name' => 'Lorem ipsum dolor sit amet',
			'last_name' => 'Lorem ipsum dolor sit amet',
			'email' => 'Lorem ipsum dolor sit amet',
			'mobile' => 'Lorem ipsum d',
			'city' => 'Lorem ipsum dolor sit amet',
			'gender' => 'Lorem ipsum dolor sit amet',
			'birthday' => '2013-04-11',
			'birthyear' => 'Lor',
			'created' => '2013-04-11 15:09:13',
			'modified' => '2013-04-11 15:09:13',
			'email_unsubscribed' => 1
		),
		array(
			'id' => 4,
			'user_id' => 4,
			'first_name' => 'Lorem ipsum dolor sit amet',
			'last_name' => 'Lorem ipsum dolor sit amet',
			'email' => 'Lorem ipsum dolor sit amet',
			'mobile' => 'Lorem ipsum d',
			'city' => 'Lorem ipsum dolor sit amet',
			'gender' => 'Lorem ipsum dolor sit amet',
			'birthday' => '2013-04-11',
			'birthyear' => 'Lor',
			'created' => '2013-04-11 15:09:13',
			'modified' => '2013-04-11 15:09:13',
			'email_unsubscribed' => 1
		),
		array(
			'id' => 5,
			'user_id' => 5,
			'first_name' => 'Lorem ipsum dolor sit amet',
			'last_name' => 'Lorem ipsum dolor sit amet',
			'email' => 'Lorem ipsum dolor sit amet',
			'mobile' => 'Lorem ipsum d',
			'city' => 'Lorem ipsum dolor sit amet',
			'gender' => 'Lorem ipsum dolor sit amet',
			'birthday' => '2013-04-11',
			'birthyear' => 'Lor',
			'created' => '2013-04-11 15:09:13',
			'modified' => '2013-04-11 15:09:13',
			'email_unsubscribed' => 1
		),
		array(
			'id' => 6,
			'user_id' => 6,
			'first_name' => 'Lorem ipsum dolor sit amet',
			'last_name' => 'Lorem ipsum dolor sit amet',
			'email' => 'Lorem ipsum dolor sit amet',
			'mobile' => 'Lorem ipsum d',
			'city' => 'Lorem ipsum dolor sit amet',
			'gender' => 'Lorem ipsum dolor sit amet',
			'birthday' => '2013-04-11',
			'birthyear' => 'Lor',
			'created' => '2013-04-11 15:09:13',
			'modified' => '2013-04-11 15:09:13',
			'email_unsubscribed' => 1
		),
		array(
			'id' => 7,
			'user_id' => 7,
			'first_name' => 'Lorem ipsum dolor sit amet',
			'last_name' => 'Lorem ipsum dolor sit amet',
			'email' => 'Lorem ipsum dolor sit amet',
			'mobile' => 'Lorem ipsum d',
			'city' => 'Lorem ipsum dolor sit amet',
			'gender' => 'Lorem ipsum dolor sit amet',
			'birthday' => '2013-04-11',
			'birthyear' => 'Lor',
			'created' => '2013-04-11 15:09:13',
			'modified' => '2013-04-11 15:09:13',
			'email_unsubscribed' => 1
		),
		array(
			'id' => 8,
			'user_id' => 8,
			'first_name' => 'Lorem ipsum dolor sit amet',
			'last_name' => 'Lorem ipsum dolor sit amet',
			'email' => 'Lorem ipsum dolor sit amet',
			'mobile' => 'Lorem ipsum d',
			'city' => 'Lorem ipsum dolor sit amet',
			'gender' => 'Lorem ipsum dolor sit amet',
			'birthday' => '2013-04-11',
			'birthyear' => 'Lor',
			'created' => '2013-04-11 15:09:13',
			'modified' => '2013-04-11 15:09:13',
			'email_unsubscribed' => 1
		),
		array(
			'id' => 9,
			'user_id' => 9,
			'first_name' => 'Lorem ipsum dolor sit amet',
			'last_name' => 'Lorem ipsum dolor sit amet',
			'email' => 'Lorem ipsum dolor sit amet',
			'mobile' => 'Lorem ipsum d',
			'city' => 'Lorem ipsum dolor sit amet',
			'gender' => 'Lorem ipsum dolor sit amet',
			'birthday' => '2013-04-11',
			'birthyear' => 'Lor',
			'created' => '2013-04-11 15:09:13',
			'modified' => '2013-04-11 15:09:13',
			'email_unsubscribed' => 1
		),
		array(
			'id' => 10,
			'user_id' => 10,
			'first_name' => 'Lorem ipsum dolor sit amet',
			'last_name' => 'Lorem ipsum dolor sit amet',
			'email' => 'Lorem ipsum dolor sit amet',
			'mobile' => 'Lorem ipsum d',
			'city' => 'Lorem ipsum dolor sit amet',
			'gender' => 'Lorem ipsum dolor sit amet',
			'birthday' => '2013-04-11',
			'birthyear' => 'Lor',
			'created' => '2013-04-11 15:09:13',
			'modified' => '2013-04-11 15:09:13',
			'email_unsubscribed' => 1
		),
	);

}

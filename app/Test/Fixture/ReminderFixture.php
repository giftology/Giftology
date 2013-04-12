<?php
/**
 * ReminderFixture
 *
 */
class ReminderFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'friend_fb_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 20),
		'friend_name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'friend_birthday' => array('type' => 'date', 'null' => true, 'default' => null, 'key' => 'index'),
		'friend_birthyear' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 5, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'current_location' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'sex' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_reminders_users1_idx' => array('column' => 'user_id', 'unique' => 0),
			'index_birthdays' => array('column' => 'friend_birthday', 'unique' => 0)
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
			'friend_fb_id' => 1,
			'friend_name' => 'Lorem ipsum dolor sit amet',
			'friend_birthday' => '2013-04-11',
			'friend_birthyear' => 'Lor',
			'created' => '2013-04-11 15:08:49',
			'modified' => '2013-04-11 15:08:49',
			'current_location' => 'Lorem ipsum dolor sit amet',
			'sex' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 2,
			'user_id' => 2,
			'friend_fb_id' => 2,
			'friend_name' => 'Lorem ipsum dolor sit amet',
			'friend_birthday' => '2013-04-11',
			'friend_birthyear' => 'Lor',
			'created' => '2013-04-11 15:08:49',
			'modified' => '2013-04-11 15:08:49',
			'current_location' => 'Lorem ipsum dolor sit amet',
			'sex' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 3,
			'user_id' => 3,
			'friend_fb_id' => 3,
			'friend_name' => 'Lorem ipsum dolor sit amet',
			'friend_birthday' => '2013-04-11',
			'friend_birthyear' => 'Lor',
			'created' => '2013-04-11 15:08:49',
			'modified' => '2013-04-11 15:08:49',
			'current_location' => 'Lorem ipsum dolor sit amet',
			'sex' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 4,
			'user_id' => 4,
			'friend_fb_id' => 4,
			'friend_name' => 'Lorem ipsum dolor sit amet',
			'friend_birthday' => '2013-04-11',
			'friend_birthyear' => 'Lor',
			'created' => '2013-04-11 15:08:49',
			'modified' => '2013-04-11 15:08:49',
			'current_location' => 'Lorem ipsum dolor sit amet',
			'sex' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 5,
			'user_id' => 5,
			'friend_fb_id' => 5,
			'friend_name' => 'Lorem ipsum dolor sit amet',
			'friend_birthday' => '2013-04-11',
			'friend_birthyear' => 'Lor',
			'created' => '2013-04-11 15:08:49',
			'modified' => '2013-04-11 15:08:49',
			'current_location' => 'Lorem ipsum dolor sit amet',
			'sex' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 6,
			'user_id' => 6,
			'friend_fb_id' => 6,
			'friend_name' => 'Lorem ipsum dolor sit amet',
			'friend_birthday' => '2013-04-11',
			'friend_birthyear' => 'Lor',
			'created' => '2013-04-11 15:08:49',
			'modified' => '2013-04-11 15:08:49',
			'current_location' => 'Lorem ipsum dolor sit amet',
			'sex' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 7,
			'user_id' => 7,
			'friend_fb_id' => 7,
			'friend_name' => 'Lorem ipsum dolor sit amet',
			'friend_birthday' => '2013-04-11',
			'friend_birthyear' => 'Lor',
			'created' => '2013-04-11 15:08:49',
			'modified' => '2013-04-11 15:08:49',
			'current_location' => 'Lorem ipsum dolor sit amet',
			'sex' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 8,
			'user_id' => 8,
			'friend_fb_id' => 8,
			'friend_name' => 'Lorem ipsum dolor sit amet',
			'friend_birthday' => '2013-04-11',
			'friend_birthyear' => 'Lor',
			'created' => '2013-04-11 15:08:49',
			'modified' => '2013-04-11 15:08:49',
			'current_location' => 'Lorem ipsum dolor sit amet',
			'sex' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 9,
			'user_id' => 9,
			'friend_fb_id' => 9,
			'friend_name' => 'Lorem ipsum dolor sit amet',
			'friend_birthday' => '2013-04-11',
			'friend_birthyear' => 'Lor',
			'created' => '2013-04-11 15:08:49',
			'modified' => '2013-04-11 15:08:49',
			'current_location' => 'Lorem ipsum dolor sit amet',
			'sex' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 10,
			'user_id' => 10,
			'friend_fb_id' => 10,
			'friend_name' => 'Lorem ipsum dolor sit amet',
			'friend_birthday' => '2013-04-11',
			'friend_birthyear' => 'Lor',
			'created' => '2013-04-11 15:08:49',
			'modified' => '2013-04-11 15:08:49',
			'current_location' => 'Lorem ipsum dolor sit amet',
			'sex' => 'Lorem ipsum dolor sit amet'
		),
	);

}

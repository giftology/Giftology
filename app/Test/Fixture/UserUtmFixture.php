<?php
/**
 * UserUtmFixture
 *
 */
class UserUtmFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'utm_source' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'utm_medium' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'utm_campaign' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'utm_term' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'utm_content' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => array('id', 'user_id'), 'unique' => 1),
			'fk_user_utm_user1_idx' => array('column' => 'user_id', 'unique' => 0)
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
			'utm_source' => 'Lorem ipsum dolor sit amet',
			'utm_medium' => 'Lorem ipsum dolor sit amet',
			'utm_campaign' => 'Lorem ipsum dolor sit amet',
			'utm_term' => 'Lorem ipsum dolor sit amet',
			'utm_content' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:09:14',
			'modified' => '2013-04-11 15:09:14'
		),
		array(
			'id' => 2,
			'user_id' => 2,
			'utm_source' => 'Lorem ipsum dolor sit amet',
			'utm_medium' => 'Lorem ipsum dolor sit amet',
			'utm_campaign' => 'Lorem ipsum dolor sit amet',
			'utm_term' => 'Lorem ipsum dolor sit amet',
			'utm_content' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:09:14',
			'modified' => '2013-04-11 15:09:14'
		),
		array(
			'id' => 3,
			'user_id' => 3,
			'utm_source' => 'Lorem ipsum dolor sit amet',
			'utm_medium' => 'Lorem ipsum dolor sit amet',
			'utm_campaign' => 'Lorem ipsum dolor sit amet',
			'utm_term' => 'Lorem ipsum dolor sit amet',
			'utm_content' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:09:14',
			'modified' => '2013-04-11 15:09:14'
		),
		array(
			'id' => 4,
			'user_id' => 4,
			'utm_source' => 'Lorem ipsum dolor sit amet',
			'utm_medium' => 'Lorem ipsum dolor sit amet',
			'utm_campaign' => 'Lorem ipsum dolor sit amet',
			'utm_term' => 'Lorem ipsum dolor sit amet',
			'utm_content' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:09:14',
			'modified' => '2013-04-11 15:09:14'
		),
		array(
			'id' => 5,
			'user_id' => 5,
			'utm_source' => 'Lorem ipsum dolor sit amet',
			'utm_medium' => 'Lorem ipsum dolor sit amet',
			'utm_campaign' => 'Lorem ipsum dolor sit amet',
			'utm_term' => 'Lorem ipsum dolor sit amet',
			'utm_content' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:09:14',
			'modified' => '2013-04-11 15:09:14'
		),
		array(
			'id' => 6,
			'user_id' => 6,
			'utm_source' => 'Lorem ipsum dolor sit amet',
			'utm_medium' => 'Lorem ipsum dolor sit amet',
			'utm_campaign' => 'Lorem ipsum dolor sit amet',
			'utm_term' => 'Lorem ipsum dolor sit amet',
			'utm_content' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:09:14',
			'modified' => '2013-04-11 15:09:14'
		),
		array(
			'id' => 7,
			'user_id' => 7,
			'utm_source' => 'Lorem ipsum dolor sit amet',
			'utm_medium' => 'Lorem ipsum dolor sit amet',
			'utm_campaign' => 'Lorem ipsum dolor sit amet',
			'utm_term' => 'Lorem ipsum dolor sit amet',
			'utm_content' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:09:14',
			'modified' => '2013-04-11 15:09:14'
		),
		array(
			'id' => 8,
			'user_id' => 8,
			'utm_source' => 'Lorem ipsum dolor sit amet',
			'utm_medium' => 'Lorem ipsum dolor sit amet',
			'utm_campaign' => 'Lorem ipsum dolor sit amet',
			'utm_term' => 'Lorem ipsum dolor sit amet',
			'utm_content' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:09:14',
			'modified' => '2013-04-11 15:09:14'
		),
		array(
			'id' => 9,
			'user_id' => 9,
			'utm_source' => 'Lorem ipsum dolor sit amet',
			'utm_medium' => 'Lorem ipsum dolor sit amet',
			'utm_campaign' => 'Lorem ipsum dolor sit amet',
			'utm_term' => 'Lorem ipsum dolor sit amet',
			'utm_content' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:09:14',
			'modified' => '2013-04-11 15:09:14'
		),
		array(
			'id' => 10,
			'user_id' => 10,
			'utm_source' => 'Lorem ipsum dolor sit amet',
			'utm_medium' => 'Lorem ipsum dolor sit amet',
			'utm_campaign' => 'Lorem ipsum dolor sit amet',
			'utm_term' => 'Lorem ipsum dolor sit amet',
			'utm_content' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:09:14',
			'modified' => '2013-04-11 15:09:14'
		),
	);

}

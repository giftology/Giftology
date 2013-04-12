<?php
/**
 * GenderSegmentFixture
 *
 */
class GenderSegmentFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'gender' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 10, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
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
			'gender' => 'Lorem ip'
		),
		array(
			'id' => 2,
			'gender' => 'Lorem ip'
		),
		array(
			'id' => 3,
			'gender' => 'Lorem ip'
		),
		array(
			'id' => 4,
			'gender' => 'Lorem ip'
		),
		array(
			'id' => 5,
			'gender' => 'Lorem ip'
		),
		array(
			'id' => 6,
			'gender' => 'Lorem ip'
		),
		array(
			'id' => 7,
			'gender' => 'Lorem ip'
		),
		array(
			'id' => 8,
			'gender' => 'Lorem ip'
		),
		array(
			'id' => 9,
			'gender' => 'Lorem ip'
		),
		array(
			'id' => 10,
			'gender' => 'Lorem ip'
		),
	);

}

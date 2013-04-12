<?php
/**
 * CitySegmentFixture
 *
 */
class CitySegmentFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'city' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
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
			'city' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 2,
			'city' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 3,
			'city' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 4,
			'city' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 5,
			'city' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 6,
			'city' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 7,
			'city' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 8,
			'city' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 9,
			'city' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 10,
			'city' => 'Lorem ipsum dolor sit amet'
		),
	);

}

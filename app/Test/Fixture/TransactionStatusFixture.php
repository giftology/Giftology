<?php
/**
 * TransactionStatusFixture
 *
 */
class TransactionStatusFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'status' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
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
			'status' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:08:53',
			'modified' => '2013-04-11 15:08:53'
		),
		array(
			'id' => 2,
			'status' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:08:53',
			'modified' => '2013-04-11 15:08:53'
		),
		array(
			'id' => 3,
			'status' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:08:53',
			'modified' => '2013-04-11 15:08:53'
		),
		array(
			'id' => 4,
			'status' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:08:53',
			'modified' => '2013-04-11 15:08:53'
		),
		array(
			'id' => 5,
			'status' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:08:53',
			'modified' => '2013-04-11 15:08:53'
		),
		array(
			'id' => 6,
			'status' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:08:53',
			'modified' => '2013-04-11 15:08:53'
		),
		array(
			'id' => 7,
			'status' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:08:53',
			'modified' => '2013-04-11 15:08:53'
		),
		array(
			'id' => 8,
			'status' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:08:53',
			'modified' => '2013-04-11 15:08:53'
		),
		array(
			'id' => 9,
			'status' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:08:53',
			'modified' => '2013-04-11 15:08:53'
		),
		array(
			'id' => 10,
			'status' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:08:53',
			'modified' => '2013-04-11 15:08:53'
		),
	);

}

<?php
/**
 * TransactionFixture
 *
 */
class TransactionFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'amount_paid' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10),
		'gift_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'transaction_status_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'pg_id' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_transactions_transaction_statuses1_idx' => array('column' => 'transaction_status_id', 'unique' => 0),
			'fk_transactions_gifts1_idx' => array('column' => 'gift_id', 'unique' => 0)
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
			'amount_paid' => 1,
			'gift_id' => 1,
			'transaction_status_id' => 1,
			'pg_id' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:09:00',
			'modified' => '2013-04-11 15:09:00'
		),
		array(
			'id' => 2,
			'amount_paid' => 2,
			'gift_id' => 2,
			'transaction_status_id' => 2,
			'pg_id' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:09:00',
			'modified' => '2013-04-11 15:09:00'
		),
		array(
			'id' => 3,
			'amount_paid' => 3,
			'gift_id' => 3,
			'transaction_status_id' => 3,
			'pg_id' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:09:00',
			'modified' => '2013-04-11 15:09:00'
		),
		array(
			'id' => 4,
			'amount_paid' => 4,
			'gift_id' => 4,
			'transaction_status_id' => 4,
			'pg_id' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:09:00',
			'modified' => '2013-04-11 15:09:00'
		),
		array(
			'id' => 5,
			'amount_paid' => 5,
			'gift_id' => 5,
			'transaction_status_id' => 5,
			'pg_id' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:09:00',
			'modified' => '2013-04-11 15:09:00'
		),
		array(
			'id' => 6,
			'amount_paid' => 6,
			'gift_id' => 6,
			'transaction_status_id' => 6,
			'pg_id' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:09:00',
			'modified' => '2013-04-11 15:09:00'
		),
		array(
			'id' => 7,
			'amount_paid' => 7,
			'gift_id' => 7,
			'transaction_status_id' => 7,
			'pg_id' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:09:00',
			'modified' => '2013-04-11 15:09:00'
		),
		array(
			'id' => 8,
			'amount_paid' => 8,
			'gift_id' => 8,
			'transaction_status_id' => 8,
			'pg_id' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:09:00',
			'modified' => '2013-04-11 15:09:00'
		),
		array(
			'id' => 9,
			'amount_paid' => 9,
			'gift_id' => 9,
			'transaction_status_id' => 9,
			'pg_id' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:09:00',
			'modified' => '2013-04-11 15:09:00'
		),
		array(
			'id' => 10,
			'amount_paid' => 10,
			'gift_id' => 10,
			'transaction_status_id' => 10,
			'pg_id' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:09:00',
			'modified' => '2013-04-11 15:09:00'
		),
	);

}

<?php
/**
 * CampaignFixture
 *
 */
class CampaignFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'product_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'start_date' => array('type' => 'date', 'null' => false, 'default' => null),
		'end_date' => array('type' => 'date', 'null' => false, 'default' => null),
		'enable' => array('type' => 'integer', 'null' => false, 'default' => null),
		'product_enc_id' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'wide_image' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'thumb_image' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
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
			'product_id' => 1,
			'start_date' => '2013-04-11',
			'end_date' => '2013-04-11',
			'enable' => 1,
			'product_enc_id' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:08:33',
			'modified' => '2013-04-11 15:08:33',
			'wide_image' => 'Lorem ipsum dolor sit amet',
			'thumb_image' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 2,
			'product_id' => 2,
			'start_date' => '2013-04-11',
			'end_date' => '2013-04-11',
			'enable' => 2,
			'product_enc_id' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:08:33',
			'modified' => '2013-04-11 15:08:33',
			'wide_image' => 'Lorem ipsum dolor sit amet',
			'thumb_image' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 3,
			'product_id' => 3,
			'start_date' => '2013-04-11',
			'end_date' => '2013-04-11',
			'enable' => 3,
			'product_enc_id' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:08:33',
			'modified' => '2013-04-11 15:08:33',
			'wide_image' => 'Lorem ipsum dolor sit amet',
			'thumb_image' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 4,
			'product_id' => 4,
			'start_date' => '2013-04-11',
			'end_date' => '2013-04-11',
			'enable' => 4,
			'product_enc_id' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:08:33',
			'modified' => '2013-04-11 15:08:33',
			'wide_image' => 'Lorem ipsum dolor sit amet',
			'thumb_image' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 5,
			'product_id' => 5,
			'start_date' => '2013-04-11',
			'end_date' => '2013-04-11',
			'enable' => 5,
			'product_enc_id' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:08:33',
			'modified' => '2013-04-11 15:08:33',
			'wide_image' => 'Lorem ipsum dolor sit amet',
			'thumb_image' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 6,
			'product_id' => 6,
			'start_date' => '2013-04-11',
			'end_date' => '2013-04-11',
			'enable' => 6,
			'product_enc_id' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:08:33',
			'modified' => '2013-04-11 15:08:33',
			'wide_image' => 'Lorem ipsum dolor sit amet',
			'thumb_image' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 7,
			'product_id' => 7,
			'start_date' => '2013-04-11',
			'end_date' => '2013-04-11',
			'enable' => 7,
			'product_enc_id' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:08:33',
			'modified' => '2013-04-11 15:08:33',
			'wide_image' => 'Lorem ipsum dolor sit amet',
			'thumb_image' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 8,
			'product_id' => 8,
			'start_date' => '2013-04-11',
			'end_date' => '2013-04-11',
			'enable' => 8,
			'product_enc_id' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:08:33',
			'modified' => '2013-04-11 15:08:33',
			'wide_image' => 'Lorem ipsum dolor sit amet',
			'thumb_image' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 9,
			'product_id' => 9,
			'start_date' => '2013-04-11',
			'end_date' => '2013-04-11',
			'enable' => 9,
			'product_enc_id' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:08:33',
			'modified' => '2013-04-11 15:08:33',
			'wide_image' => 'Lorem ipsum dolor sit amet',
			'thumb_image' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 10,
			'product_id' => 10,
			'start_date' => '2013-04-11',
			'end_date' => '2013-04-11',
			'enable' => 10,
			'product_enc_id' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-11 15:08:33',
			'modified' => '2013-04-11 15:08:33',
			'wide_image' => 'Lorem ipsum dolor sit amet',
			'thumb_image' => 'Lorem ipsum dolor sit amet'
		),
	);

}

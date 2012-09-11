<?php
App::uses('AppModel', 'Model');
/**
 * Transaction Model
 *
 * @property Product $Product
 * @property Gift $Gift
 * @property TransactionStatus $TransactionStatus
 * @property User $Sender
 * @property User $Receiver
 */
class Transaction extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Gift' => array(
			'className' => 'Gift',
			'foreignKey' => 'gift_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'TransactionStatus' => array(
			'className' => 'TransactionStatus',
			'foreignKey' => 'transaction_status_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}

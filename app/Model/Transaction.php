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
     public $actsAs = array('Search.Searchable');

    public $filterArgs = array(
            array('name' => 'id', 'type' => 'like','field' => 'Transaction.id'),
            array('name' => 'amount_paid', 'type' => 'like','field' => 'Transaction.amount_paid'),
            array('name' => 'transaction_status_id', 'type' => 'like','field' => 'Transaction.transaction_status_id'),
            array('name' => 'created', 'type' => 'like','field' => 'Transaction.created'),
            array('name' => 'modified', 'type' => 'like','field' => 'Transaction.modified'),
            array('name' => 'sender_id', 'type' => 'like','field' => 'Gift.sender_id'),
            array('name' => 'receiver_id', 'type' => 'like','field' => 'Gift.receiver_id'),
            array('name' => 'product_id', 'type' => 'like','field' => 'Gift.product_id'),
            array('name' => 'gift_id', 'type' => 'like','field' => 'Gift.id'),

           

           
            
            
        );
        
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

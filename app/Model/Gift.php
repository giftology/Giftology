<?php
App::uses('AppModel', 'Model');
/**
 * Gift Model
 *
 * @property Product $Product
 * @property GiftStatus $GiftStatus
 * @property User $Sender
 * @property User $Receiver
 * @property Transaction $Transaction
 */
class Gift extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'product_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'GiftStatus' => array(
			'className' => 'GiftStatus',
			'foreignKey' => 'gift_status_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Sender' => array(
			'className' => 'User',
			'foreignKey' => 'sender_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Receiver' => array(
			'className' => 'User',
			'foreignKey' => 'receiver_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
        public $hasOne = array(
            		'Transaction' => array(
			'className' => 'Transaction',
			'foreignKey' => 'gift_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}

<?php
App::uses('AppModel', 'Model');
/**
 * GiftStatus Model
 *
 * @property Gift $Gift
 */
class GiftStatus extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
        public $displayField = 'status';
	public $hasMany = array(
		'Gift' => array(
			'className' => 'Gift',
			'foreignKey' => 'gift_status_id',
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

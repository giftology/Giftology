<?php
App::uses('AppModel', 'Model');
/**
 * VendorLocation Model
 *
 * @property Vendors $Vendors
 */
class VendorLocation extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'vendors_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Vendors' => array(
			'className' => 'Vendors',
			'foreignKey' => 'vendors_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}

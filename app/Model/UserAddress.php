<?php
App::uses('AppModel', 'Model');
/**
 * UserAddress Model
 *
 * @property User $User
 */
class UserAddress extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $actsAs = array('Search.Searchable');
 	public $filterArgs = array(
            array('name' => 'id', 'type' => 'like','field' => 'UserAddress.id'),
            array('name' => 'username', 'type' => 'like','field' => 'UserAddress.user_id'),
            array('name' => 'First', 'type' => 'like','field' => 'UserAddress.first_name'),
            array('name' => 'Last', 'type' => 'like','field' => 'UserAddress.last_name'),
            array('name' => 'Address1', 'type' => 'like','field' => 'UserAddress.address1'),
            array('name' => 'Address2', 'type' => 'like','field' => 'UserAddress.address2'),
            array('name' => 'city', 'type' => 'like','field' => 'UserAddress.city'),
            array('name' => 'Pin', 'type' => 'like','field' => 'UserAddress.pin_code'),
            array('name' => 'Country', 'type' => 'like','field' => 'UserAddress.country'),
            array('name' => 'Created', 'type' => 'like','field' => 'UserAddress.created'),
            array('name' => 'Modified', 'type' => 'like','field' => 'UserAddress.modified'),
            array('name' => 'Phone', 'type' => 'like','field' => 'UserAddress.phone'),
            array('name' => 'Email', 'type' => 'like','field' => 'UserAddress.reciever_email'),
            array('name' => 'State', 'type' => 'like','field' => 'UserAddress.state')
            );

	public $validate = array(
		'user_id' => array(
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
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}

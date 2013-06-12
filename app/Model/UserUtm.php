<?php
App::uses('AppModel', 'Model');
/**
 * UserUtm Model
 *
 * @property User $User
 */
class UserUtm extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
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
public $actsAs = array('Search.Searchable');
 public $filterArgs = array(
            array('name' => 'id', 'type' => 'like','field' => 'UserUtm.id'),
            array('name' => 'user_id', 'type' => 'like','field' => 'UserUtm.user_id'),
            array('name' => 'utm_source', 'type' => 'like','field' => 'UserUtm.utm_source'),
			array('name' => 'utm_medium', 'type' => 'like','field' => 'UserUtm.utm_medium'),
            array('name' => 'utm_campaign', 'type' => 'like','field' => 'UserUtm.utm_campaign'),

            array('name' => 'utm_term', 'type' => 'like','field' => 'UserUtm.utm_term'),

            array('name' => 'utm_content', 'type' => 'like','field' => 'UserUtm.utm_content'),

            array('name' => 'created', 'type' => 'like','field' => 'UserUtm.created'),

            array('name' => 'modified', 'type' => 'like','field' => 'UserUtm.modified'),


	
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

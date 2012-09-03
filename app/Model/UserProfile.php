<?php
App::uses('AppModel', 'Model');
/**
 * UserProfile Model
 *
 * @property User $User
 */
class UserProfile extends AppModel {

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
        
        public function beforeSave($options = array()) {
            /// Crazy hack (NS).  Convert all birthdays to year 2012, so that we can order etc from the db
            /// Store birth year as a sperate field
           if (isset($this->data[$this->alias]['birthday'])) {
               $this->data[$this->alias]['birthyear'] =
                    date('Y', strtotime($this->data[$this->alias]['birthday']));
               $this->data[$this->alias]['birthday'] =
                    '2012-'.date('m-d', strtotime($this->data[$this->alias]['birthday']));
            }
            return true;
        }

}

<?php
App::uses('AppModel', 'Model');
/**
 * Reminder Model
 *
 * @property User $User
 */
class Reminder extends AppModel {

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
		),
        'Product' => array(
            'className' => 'Product',
            'foreignKey' => '',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
	);
        public function beforeSave($options = array()) {
            /// Crazy hack (NS).  Convert all birthdays to year 2012, so that we can order etc from the db
            /// Store birth year as a sperate field
            if (isset($this->data[$this->alias]['friend_birthday'])) {
                if ($this->data[$this->alias]['friend_birthday']) {
                    $this->data[$this->alias]['friend_birthyear'] =
                        date('Y', strtotime($this->data[$this->alias]['friend_birthday']));

                    $this->data[$this->alias]['friend_birthday'] =
                        '2013-'.date('m-d', strtotime($this->data[$this->alias]['friend_birthday']));
                }
            }
            return true;
        }

}

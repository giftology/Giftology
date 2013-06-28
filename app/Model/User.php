<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');

/**
 * User Model
 *
 * @property UserAddress $UserAddress
 * @property UserProfile $UserProfile
 * @property UserUtm $UserUtm
 * @property Gift $GiftsReceived
 * @property Gift $GiftsSent
 * @property Transaction $Transactions
 */
class User extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
public $actsAs = array('Search.Searchable');
 public $filterArgs = array(
            array('name' => 'id', 'type' => 'like','field' => 'User.id'),
            array('name' => 'username', 'type' => 'like','field' => 'User.username'),
		    array('name' => 'first_name', 'type' => 'like','field' => 'UserProfile.first_name'),
		    array('name' => 'last_name', 'type' => 'like','field' => 'UserProfile.last_name'),
			array('name' => 'email', 'type' => 'like','field' => 'UserProfile.email'),
			array('name' => 'mobile','type' => 'like','field'=>'UserProfile.mobile'),
			array('name' => 'city','type' => 'like','field'=>'UserProfile.city'),
			array('name' => 'gender','type' => 'like','field'=>'UserProfile.gender'),

			array('name' => 'birthday','type'=> 'like','field'=>'UserProfile.birthday'),
			array('name' => 'birthyear','type'=> 'like','field'=>'UserProfile.birthyear'),
			array('name' => 'password', 'type' => 'like','field' => 'User.password'),
			array('name' => 'role', 'type' => 'like','field' => 'User.role'),
			array('name' => 'facebook_id', 'type' => 'like','field' => 'User.facebook_id'),
			array('name' => 'last_login', 'type' => 'like','field' => 'User.last_login'),
			array('name' => 'created', 'type' => 'like','field' => 'User.created'),
			array('name' => 'modified', 'type' => 'like','field' => 'User.modified'),
);
function RegisterValidate() {
		$validate1 = array(
				"user_group_id" => array(
					'rule' => array('comparison', '!=', 0),
					'message'=> 'Please select group'),
				'username'=> array(
					'mustNotEmpty'=>array(
						'rule' => 'notEmpty',
						'message'=> 'Please enter username',
						'last'=>true),
					'mustUnique'=>array(
						'rule' =>'isUnique',
						'message' =>'This username already taken',
					'last'=>true),
					'mustBeLonger'=>array(
						'rule' => array('minLength', 4),
						'message'=> 'Username must be greater than 3 characters',
						'last'=>true),
					),
				
				'email'=> array(
					'mustNotEmpty'=>array(
						'rule' => 'notEmpty',
						'message'=> 'Please enter email',
						'last'=>true),
					'mustBeEmail'=> array(
						'rule' => array('email'),
						'message' => 'Please enter valid email',
						'last'=>true),
					'mustUnique'=>array(
						'rule' =>'isUnique',
						'message' =>'This email is already registered',
						)
					),
				'password'=>array(
					'mustNotEmpty'=>array(
						'rule' => 'notEmpty',
						'message'=> 'Please enter password',
						'on' => 'create',
						'last'=>true),
					'mustBeLonger'=>array(
						'rule' => array('minLength', 6),
						'message'=> 'Password must be greater than 5 characters',
						'on' => 'create',
						'last'=>true),
					'mustMatch'=>array(
						'rule' => array('verifies','cpassword'),
						'message' => 'Both passwords must match'),
						//'on' => 'create'
					)
			);
		$this->validate=$validate1;
		return $this->validates();
	}
	public function verifies() {
		return ($this->data['User']['password']===$this->data['User']['cpassword']);
	}
		/**
	 * Used to send forgot password mail to user
	 *
	 * @access public
	 * @param array $user user detail
	 * @return void
	 */
	public function forgotPassword($user) {
        DebugBreak();
		$userId=$user['User']['id'];
		$email = new CakeEmail();
		$fromConfig = "prabhat@giftology.com";
		$fromNameConfig = "prabhat@giftology.com";
		$email->from(array( $fromConfig => $fromNameConfig));
		$email->sender(array( $fromConfig => $fromNameConfig));
		$email->to($user['User']['email']);
		$email->subject(emailFromName.': Request to Reset Your Password');
		$body= "Welcome ".$user['User']['first_name'].", let's help you get signed in

You have requested to have your password . Please login with password ". md5($user['User']['password'])."

Thanks,\n".

emailFromName;
		try{
			$result = $email->send($body);
		} catch (Exception $ex){
			// we could not send the email, ignore it
			$result="Could not send forgot password email to userid-".$userId;
		}
		$this->log($result, LOG_DEBUG);
	}
	function LoginValidate() {
		$validate1 = array(
				'email'=> array(
					'mustNotEmpty'=>array(
						'rule' => 'notEmpty',
						'message'=> 'Please enter email or username')
					),
				'password'=>array(
					'mustNotEmpty'=>array(
						'rule' => 'notEmpty',
						'message'=> 'Please enter password')
					)
			);
		$this->validate=$validate1;
		return $this->validates();
	}
    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A username is required'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A password is required'
            )
        ),
        'role' => array(
            'valid' => array(
                'rule' => array('inList', array('admin', 'author')),
                'message' => 'Please enter a valid role',
                'allowEmpty' => false
            )
        )
    );
        public $hasOne = array(
            		'UserProfile' => array(
			'className' => 'UserProfile',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'UserUtm' => array(
			'className' => 'UserUtm',
			'foreignKey' => 'user_id',
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
	public $hasMany = array(
		'UserAddress' => array(
			'className' => 'UserAddress',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'GiftsReceived' => array(
			'className' => 'Gift',
			'foreignKey' => 'receiver_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'GiftsSent' => array(
			'className' => 'Gift',
			'foreignKey' => 'sender_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
                'Reminders' => array(
                        'className' => 'Reminder',
			'foreignKey' => 'user_id',
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
       
        public function beforeSave($options = array()) {
            if (isset($this->data[$this->alias]['password'])) {
                $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
            }
            return true;
        }


}

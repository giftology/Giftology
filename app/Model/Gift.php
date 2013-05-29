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
        var $name = 'Gift';

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
  public $actsAs = array('Search.Searchable');

  
    
 
    public $filterArgs = array(
            array('name' => 'id', 'type' => 'like','field' => 'Gift.id'),
            array('name' => 'product_id', 'type' => 'value','field' => 'Gift.product_id'),
            array('name' => 'sender_id', 'type' => 'like','field' => 'Gift.sender_id'),
            array('name' => 'receiver_id', 'type' => 'like','field' => 'Gift.receiver_id'),
            array('name' => 'receiver_fb_id', 'type' => 'like','field' => 'Gift.receiver_fb_id'),
            array('name' => 'receiver_email', 'type' => 'like','field' => 'Gift.receiver_email'),
            array('name' => 'code', 'type' => 'like','field' => 'Gift.code'),
            array('name' => 'gift_amount', 'type' => 'like','field' => 'Gift.gift_amount'),
            array('name' => 'gift_status_id', 'type' => 'like','field' => 'Gift.gift_status_id'),
            array('name' => 'expiry_date', 'type' => 'like','field' => 'Gift.expiry_date'),
            array('name' => 'created', 'type' => 'like','field' => 'Gift.created'),
            array('name' => 'modified', 'type' => 'like','field' => 'Gift.modified'),


           
            
            
        );
  public $validate = array(
        'first_name' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => ' First Name'
            )
        ),
        
        'address1' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'address '
            )
        ),
         'city' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'City '
            )
        ),
         'pin_code' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'pin code '
            )
        ),
          'phone' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Phone '
            )
        ),
        'country' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Country '
            )
        ),
         'state' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'State'
            )
        )
         
    );
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
		),
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'sender_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Reminder' => array(
            'className' => 'Reminder',
            'foreignKey' => 'receiver_fb_id',
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

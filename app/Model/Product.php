<?php
App::uses('AppModel', 'Model');
/**
 * Product Model
 *
 * @property Vendor $Vendor
 * @property ProductType $ProductType
 * @property ProductSegment $ProductSegment
 * @property Gift $Gift
 * @property Transaction $Transaction
 */
class Product extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
public $actsAs = array('Search.Searchable');
 public $filterArgs = array(
            array('name' => 'id', 'type' => 'like','field' => 'Product.id'),
            array('name' => 'min_price', 'type' => 'like','field' => 'Product.min_price'),
            array('name' => 'max_price', 'type' => 'like','field' => 'Product.max_price'),
            array('name' => 'min_value', 'type' => 'like','field' => 'Product.min_value'),
            array('name' => 'days_valid', 'type' => 'like','field' => 'Product.days_valid'),
            array('name' => 'code_type_id', 'type' => 'like','field' => 'Product.code_type_id'),
            array('name' => 'code', 'type' => 'like','field' => 'Product.code'),
            array('name' => 'vendor_id', 'type' => 'value','field' => 'Product.vendor_id'),
            array('name' => 'product_type_id', 'type' => 'like','field' => 'Product.product_type_id'),
            array('name' => 'gender_segment_id', 'type' => 'like','field' => 'Product.gender_segment_id'),
            array('name' => 'city_segment_id', 'type' => 'like','field' => 'Product.city_segment_id'),
            array('name' => 'age_segment_id', 'type' => 'like','field' => 'Product.age_segment_id'),
            array('name' => 'display_order', 'type' => 'like','field' => 'Product.display_order'),
            array('name' => 'created', 'type' => 'like','field' => 'Product.created'),
            array('name' => 'modified', 'type' => 'like','field' => 'Product.modified'),

           

           
            
            
        );
	public $validate = array(
		'vendor_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'product_type_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'product_segment_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Vendor' => array(
			'className' => 'Vendor',
			'foreignKey' => 'vendor_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'ProductType' => array(
			'className' => 'ProductType',
			'foreignKey' => 'product_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'GenderSegment' => array(
			'className' => 'GenderSegment',
			'foreignKey' => 'gender_segment_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'AgeSegment' => array(
			'className' => 'AgeSegment',
			'foreignKey' => 'age_segment_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'CitySegment' => array(
			'className' => 'CitySegment',
			'foreignKey' => 'city_segment_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'CodeType' => array(
			'className' => 'CodeType',
			'foreignKey' => 'code_type_id',
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
	public $hasMany = array(
		'Gift' => array(
			'className' => 'Gift',
			'foreignKey' => 'product_id',
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
                'UploadedProductCode' => array(
			'className' => 'UploadedProductCode',
			'foreignKey' => 'product_id',
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

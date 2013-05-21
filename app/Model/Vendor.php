<?php
App::uses('AppModel', 'Model');
/**
 * Vendor Model
 *
 * @property Product $Product
 */
class Vendor extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
 public $actsAs = array('Search.Searchable');

  
    
 
    public $filterArgs = array(
            array('name' => 'id', 'type' => 'like','field' => 'Vendor.id'),
            array('name' => 'name', 'type' => 'like','field' => 'Vendor.name'),
           array('name' => 'created', 'type' => 'like','field' => 'Vendor.created'),
            array('name' => 'modified', 'type' => 'like','field' => 'Vendor.modified'),


           
            
            
        );
	public $hasMany = array(
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'vendor_id',
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

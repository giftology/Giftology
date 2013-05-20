<?php
App::uses('AppModel', 'Model');
/**
 * UploadedProductCode Model
 *
 * @property Product $Product
 */
class UploadedProductCode extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $actsAs = array('Search.Searchable');
    public $filterArgs = array(
            array('name' => 'id', 'type' => 'like','field' => 'UploadedProductCode.id'),
            array('name' => 'product_id', 'type' => 'like','field' => 'UploadedProductCode.product_id'),
            array('name' => 'code', 'type' => 'like','field' => 'UploadedProductCode.code'),
            array('name' => 'value', 'type' => 'like','field' => 'UploadedProductCode.value'),
            array('name' => 'available', 'type' => 'like','field' => 'UploadedProductCode.available'),
            array('name' => 'expiry', 'type' => 'like','field' => 'UploadedProductCode.expiry'),
            array('name' => 'pin', 'type' => 'like','field' => 'UploadedProductCode.pin'),
         
        );
	public $belongsTo = array(
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'product_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	 
        
}

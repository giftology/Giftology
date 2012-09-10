<?php
App::uses('AppModel', 'Model');
/**
 * GenderSegment Model
 *
 * @property Product $Product
 */
class GenderSegment extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'gender';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'gender_segment_id',
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

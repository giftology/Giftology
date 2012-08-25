<?php
App::uses('AppModel', 'Model');
/**
 * Offer Model
 *
 */
class Offer extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';
        public $name = 'Offer';
        public $actsAs = array(
            'Upload.Upload' => array(
                'image' => array(
                    'thumbnailSizes' => array(
                        'xvga' => '1024x768',
                        'vga' => '640x480',
                        'thumb' => '80x80'
                    )      
                )
            )
        );
        public $hasMany = array(
            'GiftsSent' => array(
                'className' => 'Gift',
                'foreignKey' => 'offer_id'
            )
        );
}

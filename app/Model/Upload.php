    <?php
    App::uses('AppModel', 'Model');

    class Upload extends AppModel {
        var $name = 'Upload';
        var $actsAs = array('FileUpload.FileUpload');
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
    ?>

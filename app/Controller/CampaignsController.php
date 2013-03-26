<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Products Controller
 *
 * @property Product $Product
 */
class CampaignsController extends AppController {
    public $helpers = array('Minify.Minify');	
	public $paginate = array(
        'limit' => 100,
        'order' => array(
            'Product.display_order' => 'asc'
	    )
	);
	public $uses = array( 'Product','User','UserAddress','Gift','Reminder');

	public function beforeFilter() {
		parent::beforeFilter();
		if($this->params['controller']=='campaigns'){
    		$this->Auth->allow('index');


    	         }
    }

	public function isAuthorized($user) {
	    if (($this->action == 'view_products') || ($this->action == 'view_product') || ($this->action == 'index')) {
	        return true;
	    }
	    return parent::isAuthorized($user);
	}
	public function index($product_id) {
        //$this->Product->recursive=-2;
		//$vendor_id = $_GET["product_id"];
		//print_r($vendor_id);die();
		//$vendor_image=$this->Product->find('all', array('fields'=>array('Vendor.wide_image'),'conditions' => array('Vendor.id' => $vendor_id),'order'=>array('Product.min_price','Product.display_order')));
            
        $this->set('campaign_id',$product_id);
		//$this->layout = 'landing';
		$this->render(false, 'landing');
	}
	public function view_products () {
		if ($this->Connect->user()) {
		$this->set('user', $this->Auth->user());
        $this->set('facebook_user', $this->Connect->user());
		$product_id = isset($this->request->params['named']['id']) ? $this->request->params['named']['id'] : NULL;
        $this->Product->recursive = -2;
        $proddd=$this->Product->find('first', array('conditions' => array('Product.id' => $product_id),'order'=>array('Product.min_price','Product.display_order')));
        $this->Reminder->recursive = -1;
        $friend_list=$this->Reminder->find('all', array('limit'=>50,'conditions' => array('Reminder.user_id' => $this->Auth->user('id'))));
        $this->set('data',$friend_list);
        $this->set('products',$proddd);	
    	}
	}

	public function view_product($id) {
		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException(__('Invalid product'));
		}
		$this->Product->contain(array('Vendor'));
		$this->set('product', $this->Product->read(null, $id));
		$this->Mixpanel->track('Viewing Product', array(
	        'Receiver' => isset($this->request->params['named']['receiver_name']) ? 
		        $this->request->params['named']['receiver_name'] : null,
		    'ProductId' => $id
			));
	}
    
    public function search_friend(){
        if($this->RequestHandler->isAjax()) {
        	$this->Reminder->recursive = -1;
        	 $friend_list=$this->Reminder->find('all',array('conditions' =>array (
    'Reminder.user_id' => $this->Auth->user('id'),
    'Reminder.friend_name LIKE' => "%".$this->request->data['search_key']."%"
   )));
			
		//$this->set('data',$friend_list);
        //$this->set('friends', $friend_list);
        //$this->set('_serialize', array('result'));
        //    echo $search_string;
        }

        echo json_encode($friend_list);
       	$this->autoRender = $this->autoLayout = false;
        exit;
    }

   
	
}

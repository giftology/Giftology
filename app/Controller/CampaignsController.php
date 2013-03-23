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
		$this->Auth->allow('send_product_expiry_reminder');
		if($this->params['controller']=='campaigns'){
    		$this->Auth->allow('index');


    	         } 
    	         if($this->params['controller']=='campaigns'){
    		$this->Auth->allow('view_products');


    	         }
    }

	public function isAuthorized($user) {
	    if (($this->action == 'view_products') || ($this->action == 'view_product') || ($this->action == 'index')) {
	        return true;
	    }
	    return parent::isAuthorized($user);
	}
	public function index() {
        $this->Product->recursive=-2;
		$vendor_id = $_GET["product_id"];
		//print_r($vendor_id);die();
		//$vendor_image=$this->Product->find('all', array('fields'=>array('Vendor.wide_image'),'conditions' => array('Vendor.id' => $vendor_id),'order'=>array('Product.min_price','Product.display_order')));
            
        $this->set('campaign_id',$vendor_id);
		$this->layout = 'landing';
		
	}
	public function view_products () {
		$this->set('user', $this->Auth->user());
        $this->set('facebook_user', $this->Connect->user());
		$product_id = isset($this->request->params['named']['id']) ? $this->request->params['named']['id'] : NULL;
        

       // $product_array = $this->Product->Vendor->find('all',array('conditions' => array('Vendor.id' => "1")));
        
        
       //$this->Product->unbindModel(array('hasMany' => array('Gift','UploadedProductCode'), 
          // 'belongsTo' => array('ProductType','GenderSegment','AgeSegment','CodeType','Gift')));
        
            $proddd=$this->Product->find('all', array('conditions' => array('Product.id' => $product_id),'order'=>array('Product.min_price','Product.display_order')));
             $friend_list=$this->Reminder->find('all', array('limit'=>50,'conditions' => array('Reminder.user_id' => $this->Auth->user('id'))));
             $this->set('data',$friend_list);

            //print_r($friend_list)  ;die();
             $this->set('products',$proddd);
           
		if ($this->request->is('post')) {
			//DebugBreak();
                        $proddd=$this->Product->find('all', array('conditions' => array('Vendor.id' => $vendor_id),'order'=>array('Product.min_price','Product.display_order')));
   $friend_list=$this->Reminder->find('all',array('conditions' =>
array (
    'Reminder.user_id' => $this->Auth->user('id'),
    
        'Reminder.friend_name LIKE' => $this->request->data['Campaigns']['friend_name']."%"
   
)
			            	));
			
			           // $friend_list=$this->Reminder->find("all",array('condition'=>array('friend_name LIKE'=>$this->request->data['Campaigns']['friend_name']."%",'Reminder.user_id' => $this->Auth->user('id'))));
			            $this->set('data',$friend_list);
			            $this->set('products',$proddd);

		} 
            //$this->paginate['conditions'] = array('Product.display_order >' => 0); //display_order = 0 is for disabled products
           /* $this->set('receiver_id', isset($this->request->params['named']['receiver_id']) ? $this->request->params['named']['receiver_id'] : null);
            $this->set('receiver_name', isset($this->request->params['named']['receiver_name']) ? $this->request->params['named']['receiver_name'] : null);
            $this->set('receiver_birthday', isset($this->request->params['named']['receiver_birthday']) ? $this->request->params['named']['receiver_birthday'] : null);
            $this->set('ocasion', isset($this->request->params['named']['ocasion']) ? $this->request->params['named']['ocasion'] : null);
            //$this->set('products', $this->paginate());*/
           // $this->set('title_for_layout', 'Send a gift voucher to '.(isset($this->request->params['named']['receiver_name']) ? $this->request->params['named']['receiver_name'] : null));
           // $this->Mixpanel->track('Viewing Product List ', array(
             //   'Receiver' => isset($this->request->params['named']['receiver_name']) ? 
               // $this->request->params['named']['receiver_name'] : null,
            //));
            
    
	
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
        	 $friend_list=$this->Reminder->find('all',array('conditions' =>array (
    'Reminder.user_id' => $this->Auth->user('id'),
    'Reminder.friend_name LIKE ' => $this->request->data['search_key'].'%'
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

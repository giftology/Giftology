<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Products Controller
 *
 * @property Product $Product
 */
class ProductsController extends AppController {
    public $helpers = array('Minify.Minify');	
	public $paginate = array(
        'limit' => 100,
        'order' => array(
            'Product.display_order' => 'asc'
	    )
	);
	public $uses = array( 'Product','User','UserAddress','Gift');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('send_product_expiry_reminder');
    }

	public function isAuthorized($user) {
	    if (($this->action == 'view_products') || ($this->action == 'view_product')) {
	        return true;
	    }
	    return parent::isAuthorized($user);
	}
	//WEB SERVICES
	public function ws_list () {
        $receiver_fb_id = isset($this->params->query['receiver_fb_id']) ? $this->params->query['receiver_fb_id'] : null;
        $e = $this->wsListProductsException($receiver_fb_id );
        if(isset($e) && !empty($e)) $this->set('products', array('error' => $e));
        else{
            $this->Product->recursive = 0;
            $this->set('receiver_id', isset($this->request->params['named']['receiver_id']) ? $this->request->params['named']['receiver_id'] : null);
            $this->set('products', $this->Product->find('all', array('conditions' => array('Product.display_order >' => 0))));
        }
		$this->set('_serialize', array('products'));
	}
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Product->recursive = 0;
		$this->set('receiver_id', isset($this->request->params['named']['receiver_id']) ? $this->request->params['named']['receiver_id'] : null);
		$this->set('products', $this->paginate());
	}
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException(__('Invalid product'));
		}
		$this->set('receiver_id', $this->request->params['named']['receiver_id']);
		$this->set('product', $this->Product->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Product->create();
			if ($this->Product->save($this->request->data)) {
				$this->Session->setFlash(__('The product has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product could not be saved. Please, try again.'));
			}
		}
		$vendors = $this->Product->Vendor->find('list');
		$productTypes = $this->Product->ProductType->find('list');
		$codeTypes = $this->Product->CodeType->find('list');
		$genderSegments = $this->Product->GenderSegment->find('list');
		$ageSegments = $this->Product->AgeSegment->find('list');
		$citySegments = $this->Product->CitySegment->find('list');
		$this->set(compact('vendors', 'productTypes', 'genderSegments', 'ageSegments', 'citySegments', 'codeTypes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException(__('Invalid product'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Product->save($this->request->data)) {
				$this->Session->setFlash(__('The product has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Product->read(null, $id);
		}
		$codeTypes = $this->Product->CodeType->find('list');
		$vendors = $this->Product->Vendor->find('list');
		$productTypes = $this->Product->ProductType->find('list');
		$genderSegments = $this->Product->GenderSegment->find('list');
		$ageSegments = $this->Product->AgeSegment->find('list');
		$citySegments = $this->Product->CitySegment->find('list');
		$this->set(compact('vendors', 'productTypes', 'genderSegments', 'ageSegments', 'citySegments', 'codeTypes'));	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException(__('Invalid product'));
		}
		if ($this->Product->delete()) {
			$this->Session->setFlash(__('Product deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Product was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
    public function send_product_expiry_reminder(){
       //this function return product id which is going to expire after 30 days.
        $reminder_for_expire_product_id = array();
        $this->Product->unbindModel(array('hasMany' => array('Gift','UploadedProductCode'), 
            'belongsTo' => array('ProductType','GenderSegment','AgeSegment','CodeType','Gift')));
        $product_id[]=array(); 
        $email_product_id=array();
        $product_array1= $this->Product->find('all',array('fields'=>array('Product.id','Product.days_valid','Vendor.name')));
        foreach($product_array1 as $product)
        {
            $product_expire_date= $this->Product->UploadedProductCode->find('first',array('fields'=>array('UploadedProductCode.expiry'),'conditions' => array('UploadedProductCode.product_id' => $product['Product']['id'])));
            $days_before_mail="30";
            $product_expire_date_minus_days_valid=date('Y-m-d', strtotime('-'.$product['Product']['days_valid'].'days', strtotime($product_expire_date['UploadedProductCode']['expiry'])));
            $product_expire_date_minus_days_valid_minus_thirty=date('Y-m-d', strtotime('-'.$days_before_mail.'days', strtotime($product_expire_date_minus_days_valid)));
            if($product_expire_date_minus_days_valid_minus_thirty == date('Y-m-d'))
            {
                $email_product_id[]=array($product['Product']['id'],$product['Vendor']['name']) ; 
            }
        }
        if (!empty($email_product_id))
        {
            $file =fopen(ROOT.'/app/tmp/product_code_expire_reminder.csv', 'w');
            fputcsv($file,array('Product Id','Vendor Name'));
            foreach ($email_product_id as $l)
            { 
                fputcsv($file,$l);
            }
            fclose($file);
            $email = new CakeEmail();
            $email->config('smtp')
            ->template('code_expire_reminder') 
            ->emailFormat('html')
            ->to('prabhat@giftology.com')
            ->from(array('care@giftology.com' => 'Giftology'))
            ->attachments(ROOT.'/app/tmp/product_code_expire_reminder.csv') 
            ->subject('Products Code Expire Reminder')
            ->viewVars(array('name' => $this->Connect->user('name')))
            ->send();
        }

    }
	public function view_products () {
		$location = isset($this->request->params['named']['receiver_location']) ? $this->request->params['named']['receiver_location'] : NULL;
        $gender = isset($this->request->params['named']['receiver_sex']) ? $this->request->params['named']['receiver_sex'] : NULL ;
        $year = isset($this->request->params['named']['friend_birthyear']) ? $this->request->params['named']['friend_birthyear'] : NULL;
        $today = date("Y"); 
        $gender=strtoupper($gender);
        $age=$today-$year;

        $gender = $this->Product->GenderSegment->find('all',array('conditions' => array('GenderSegment.gender' => $gender)));
        $location = $this->Product->CitySegment->find('all',array('conditions' => array('CitySegment.city' => $location)));
        $age = $this->Product->AgeSegment->find('all',array('conditions' => array('AgeSegment.max >' => $age,'AgeSegment.min <' => $age)));


        $gender=isset($gender['0']['GenderSegment']['id']) ? $gender['0']['GenderSegment']['id'] : NULL;
        $location=isset($location['0']['CitySegment']['id']) ? $location['0']['CitySegment']['id'] : NULL;
        $age=isset($age['0']['AgeSegment']['id']) ? $age['0']['AgeSegment']['id'] : NULL;

        $this->paginate['conditions']  = array('NOT' => array('Product.display_order' => 0), 'Product.gender_segment_id'  => array($gender,ALL_GENDERS) ,'Product.city_segment_id' => array($location,ALL_CITIES) , 'Product.age_segment_id' => array($age,ALL_AGES));
        $this->paginate['order']= 'Product.min_price, Product.display_order ASC';
        $this->Product->recursive = 0;
       
        $product_array=$this->paginate();
        
         $show_product = array();
         $unpaid_product =array();
        foreach($product_array as $product)
        {  
        $product_id= NULL; 
         if($product['Product']['min_price']== 0)
        {
            $product_id=$product['Product']['id'];
            $sender_id = $this->Auth->user('id');
            $current_date= date("Y-m-d") ;
            $receiver_gift_limit  = $product['Product']['receiver_gift_limit'];
            $receiver_time_limit =$product['Product']['receiver_time_limit'];
            $receiver_id=$this->request->params['named']['receiver_id'];
            $sender_gift_limit = $product['Product']['sender_gift_limit'];
            $sender_time_limit = $product['Product']['sender_time_limit'];
            $tomorrow = date("Y-m-d",mktime(0,0,0,date("m"),date("d")+1,date("Y")));
            $sender_end_date=date('Y-m-d', strtotime('-'.$sender_time_limit.'days', strtotime($tomorrow)));
            $receiver_end_date=date('Y-m-d', strtotime('-'.$receiver_time_limit.'days', strtotime($tomorrow)));
            $total_send_gift_acc_limit_sender = $this->Gift->query("select count(*)as cou from gifts where created between '".$sender_end_date."' and '".$tomorrow."'
                AND product_id = '".$product_id."'
                AND sender_id = '".$sender_id."'
            ");
            $total_gift_rec_acc_limit_receiver = $this->Gift->query("select count(*)as cou from gifts where created between '".$receiver_end_date."' and '".$tomorrow."'
                AND product_id = '".$product_id."'
                AND receiver_fb_id = '".$receiver_id."'
            ");
            if(($total_send_gift_acc_limit_sender[0][0]['cou']< $sender_gift_limit))
            {
                if(($total_gift_rec_acc_limit_receiver[0][0]['cou']< $receiver_gift_limit))
                {
                    $show_product[]=$product_id;
                }
            }
        }
        else{
            $unpaid_product[]=$product['Product']['id'];
            }
         
        
            }
                 
            $result = array_merge((array)$show_product, (array)$unpaid_product);
            $proddd=$this->Product->find('all', array('conditions' => array('Product.id' => $result),'order'=>array('Product.min_price','Product.display_order')));
             $this->set('products',$proddd);

            //$this->paginate['conditions'] = array('Product.display_order >' => 0); //display_order = 0 is for disabled products
            $this->set('receiver_id', isset($this->request->params['named']['receiver_id']) ? $this->request->params['named']['receiver_id'] : null);
            $this->set('receiver_name', isset($this->request->params['named']['receiver_name']) ? $this->request->params['named']['receiver_name'] : null);
            $this->set('receiver_birthday', isset($this->request->params['named']['receiver_birthday']) ? $this->request->params['named']['receiver_birthday'] : null);
            $this->set('ocasion', isset($this->request->params['named']['ocasion']) ? $this->request->params['named']['ocasion'] : null);
            //$this->set('products', $this->paginate());
            $this->set('title_for_layout', 'Send a gift voucher to '.(isset($this->request->params['named']['receiver_name']) ? $this->request->params['named']['receiver_name'] : null));
            $this->Mixpanel->track('Viewing Product List ', array(
                'Receiver' => isset($this->request->params['named']['receiver_name']) ? 
                $this->request->params['named']['receiver_name'] : null,
            ));
            
    
	
	}
	public function view_product($id=null) {
		$rec_id = $this->User->find('first',array('fields'=>'User.id','conditions'=>array('User.facebook_id'=>$this->request->params['named']['receiver_id'])));
        $reciever_id_user_table=$rec_id['User']['id'];
        $reciever_address=$this->UserAddress->find('first',array('conditions'=>array('UserAddress.user_id'=>$reciever_id_user_table)));
        $this->set('id',$reciever_address['UserAddress']['id']);
		$this->set('address1',$reciever_address['UserAddress']['address1']);
        $this->set('address2',$reciever_address['UserAddress']['address2']);
        $this->set('city',$reciever_address['UserAddress']['city']);
        $this->set('pin_code',$reciever_address['UserAddress']['pin_code']);
        $this->set('phone',$reciever_address['UserAddress']['phone']);
        $this->set('state',$reciever_address['UserAddress']['state']);
        $this->set('country',$reciever_address['UserAddress']['country']);
        $this->set('reciever_email',$reciever_address['UserAddress']['reciever_email']);


		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException(__('Invalid product'));
		}
		$this->set('title_for_layout', "Send Gift"); // This is read in FacebookHelper to check for sending permissions on facebook. read that before changing XXHACK NS
		$this->set('receiver_id', isset($this->request->params['named']['receiver_id']) ? $this->request->params['named']['receiver_id'] : null);
		$this->set('receiver_name', isset($this->request->params['named']['receiver_name']) ? $this->request->params['named']['receiver_name'] : null);
		$this->set('receiver_birthday', isset($this->request->params['named']['receiver_birthday']) ? $this->request->params['named']['receiver_birthday'] : null);
		$this->set('ocasion', isset($this->request->params['named']['ocasion']) ? $this->request->params['named']['ocasion'] : null);
		$this->Product->contain(array('Vendor'));
		$this->set('product', $this->Product->read(null, $id));
		$this->Mixpanel->track('Viewing Product', array(
	        'Receiver' => isset($this->request->params['named']['receiver_name']) ? 
		        $this->request->params['named']['receiver_name'] : null,
		    'ProductId' => $id
			));


	}

    public function wsListProductsException($receiver_fb_id){
        $error = array();
        if(!$receiver_fb_id) $error[1] = 'Receiver id is missing';
        return $error; 
    }
	
}

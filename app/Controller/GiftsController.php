<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Gifts Controller
 *
 * @property Gift $Gift
 */
class GiftsController extends AppController {
	public $helpers = array('Minify.Minify');
	public $uses = array('Gift','UserAddress','User','ProductType','UserProfile','Reminder','Vendor','UploadedProductCode','TemporaryGiftCode');

    public $components = array('Giftology', 'CCAvenue', 'AesCrypt', 'UserWhiteList','Search.Prg');
    public $presetVars = array(
            array('field' => 'id', 'type' => 'value'),
            array('field' => 'product_id', 'type' => 'value'),
            array('field' => 'sender_id', 'type' => 'value'),
            array('field'=> 'receiver_id','type'=>'value'),
            array('field'=> 'receiver_fb_id','type'=>'value'),
            array('field'=> 'receiver_email','type'=>'value'),
            array('field'=> 'code','type'=>'value'),
            array('field'=> 'gift_amount','type'=>'value'),
            array('field'=> 'gift_status_id','type'=>'value'),
            array('field'=> 'expiry_date','type'=>'value'),
            array('field'=> 'created','type'=>'value'),
            array('field'=> 'modified','type'=>'value'),
        
        );
    public $paginate = array(
	'contain' => array(
		'Product' => array('Vendor')),
	'order' => 'Gift.created DESC',
	'limit' => 52,
	);
    public function beforeFilter() {
	parent::beforeFilter();
	$this->Auth->allow('send_today_scheduled_gifts','offline_voucher_redeem_page','error_page','error_page_for_desktop');
    }

	public function isAuthorized($user) {
	    if (($this->action == 'send') || ($this->action == 'redeem') || ($this->action == 'redeemgift') || ($this->action == 'view_gifts')
		|| ($this->action == 'tx_callback') || ($this->action == 'send_today_scheduled_gifts') || ($this->action == 'print_pdf') || ($this->action == 'sent_gifts')|| ($this->action == 'sms')|| ($this->action == 'send_sms')|| ($this->action == 'send_campaign')||($this->action == 'email_voucher')||($this->action == 'send_voucher_email') ||($this->action == 'fetch_code') ||($this->action == 'offline_voucher_redeem_page') ||($this->action == 'error_page')) {
	        return true;
	    }
	    return parent::isAuthorized($user);
	}
	//WEB SERVICES
	public function ws_list () {
		$url = array($this->params->query, $this->params->url);
        $this->log("Logging ws_list url ".serialize($url));
		$receiver_fb_id = isset($this->params->query['receiver_fb_id']) ? $this->params->query['receiver_fb_id'] : null;
		$this->log("Dont for recv fb id ".$receiver_fb_id);
		$e = $this->wsListGiftException($receiver_fb_id );
		if(isset($e) && !empty($e)){
            $this->log("Logging gift received exception for ".$receiver_fb_id." ".serialize($e));
            $this->set('gifts', array('error' => $e));
        }
		else{
			$conditions = array('receiver_fb_id' => $receiver_fb_id, 'gift_status_id !=' => GIFT_STATUS_TRANSACTION_PENDING);
			$this->Gift->recursive = 0;
			$gifts = $this->Gift->find('all', array('conditions' => $conditions));
			foreach($gifts as $k => $g){
				$sender_id = $g['Sender']['id'];      
				$user_profile = $this->UserProfile->find('first', array('conditions' => array('UserProfile.user_id' => $sender_id)));
	            $gifts[$k]['SenderProfile'] = $user_profile['UserProfile'];
	            unset($user_profile);
	            $vendor_id = $g['Product']['vendor_id'];      
	            $vendor = $this->Vendor->find('first', array('conditions' => array('Vendor.id' => $vendor_id)));
			    $gifts[$k]['Vendor'] = $vendor['Vendor'];
	            unset($vendor);
	        }
			$this->set('gifts', $gifts);	
		}
		//if (!$receiver_fb_id) return;
		
		$this->set('_serialize', array('gifts'));
	}

	public function ws_redeem(){
		$gift_id = isset($this->params->query['gift_id']) ? $this->params->query['gift_id'] : null;
		$receiver_fb_id = isset($this->params->query['receiver_fb_id']) ? $this->params->query['receiver_fb_id'] : null;
		$e = $this->wsRdeemGiftException($gift_id, $receiver_fb_id);
		if(isset($e) && !empty($e)) $this->set('gift', array('error' => $e));
		else{
			$this->Gift->id = $gift_id;
			$this->Gift->Behaviors->attach('Containable');
			$gift = $this->Gift->find('first', array(
			'contain' => array(
				'Product' => array('Vendor'),
				'Sender' => array('UserProfile')),
			'conditions' => array('Gift.id'=>$gift_id)));
			$gift['Vendor'] = &$gift['Product']['Vendor']; //hack because our view element gift_voucher requires vendor like this
			$this->UploadedProductCode->recursive = -2;
			$pin = $this->UploadedProductCode->find('first', array('fields' => array('UploadedProductCode.pin'),'conditions' => array(
				'UploadedProductCode.product_id' => $gift['Gift']['product_id'],
				'UploadedProductCode.code' => $gift['Gift']['code']
				)
			));
			$gift['pin'] = $pin['UploadedProductCode']['pin'];
			$this->set('gift', $gift);
		}
		$this->set('_serialize', array('gift'));	
	}

	public function ws_send () {
        $url = array($this->params->query, $this->params->url);
        $this->log("Logging ws_send url ".serialize($url));
		$sender_id = isset($this->params->query['sender_id']) ? $this->params->query['sender_id'] : null;
		$receiver_fb_id = isset($this->params->query['receiver_fb_id']) ? $this->params->query['receiver_fb_id'] : null;
		$product_id = isset($this->params->query['product_id']) ? $this->params->query['product_id'] : null;
		$amount = isset($this->params->query['gift_amount']) ? $this->params->query['gift_amount'] : null;
        $post_to_fb = isset($this->params->query['post_to_fb']) ? $this->params->query['post_to_fb'] : null;
        $gift_message_temp = isset($this->params->query['gift_message']) ? $this->params->query['gift_message'] : null;
        $gift_message = urldecode($gift_message_temp);
        $send_now = isset($this->params->query['send_now']) ? $this->params->query['send_now'] : null;
        $receiver_birthday = isset($this->params->query['receiver_birthday']) ? $this->params->query['receiver_birthday'] : null;
        $date_to_send = isset($this->params->query['date_to_send']) ? $this->params->query['date_to_send'] : null;
        $e = $this->wsSendException($product_id, $amount, $sender_id, $receiver_fb_id, $post_to_fb, $gift_message, $receiver_birthday);
        
        if(isset($e) && !empty($e)){
            $this->log("Logging gift sending exception for ".$receiver_fb_id." ".serialize($e));
            $this->set('gifts', array('error' => $e));
        }
        else{
            $this->log("Sending ".$product_id." from ".$sender_id." to ".$receiver_fb_id);
            $this->send_base($sender_id, $receiver_fb_id, $product_id, $amount,$send_now,'',$gift_message,$post_to_fb,$receiver_birthday,'',$date_to_send);
            $this->set('gifts', array('result' => '1'));    
        }
		$this->set('_serialize', array('gifts'));
	}

	public function ws_latest_gift(){
		$receiver_fb_id = isset($this->params->query['user_fb_id']) ? $this->params->query['user_fb_id'] : null;
		$e = $this->wsLatestGiftException($receiver_fb_id);
		if(isset($e) && !empty($e)) $this->set('gift', array('error' => $e));
        else{
            $this->log("Searching Lastest gift for receiver fb id ".$receiver_fb_id);
            $gift = $this->Gift->find('first', array(
            	'fields' => array('id', 'product_id', 'sender_id'),
            	'conditions' => array('receiver_fb_id' => $receiver_fb_id),
            	'order' => array('created DESC')
            	));
            $sender_name = $this->UserProfile->find('first', array(
                'fields' => array('first_name','last_name'),
                'conditions' => array('user_id' => $gift['Gift']['sender_id'])
            ));
            $latest_gift = array(
                'product_id' => $gift['Gift']['product_id'],
                'sender_first_name' => $sender_name['UserProfile']['first_name'],
                'sender_last_name' => $sender_name['UserProfile']['last_name']
            );
            $this->set('gift', $latest_gift);    
        }
		$this->set('_serialize', array('gift'));
	}

/**
 * index method
 *
 * @return void
 */
    public function download_gift_csv(){
				
                    $filename = "Gifts ".date("Y.m.d").".csv";
                    $csv_file = fopen('php://output', 'w');
                    header('Content-type: application/csv');
                    header('Content-Disposition: attachment; filename="'.$filename.'"');
                    $header_row= array('Id','Product Id','Sender Id','Receiver Id','Receiver FB Id','Receiver Email','Code','Gift Amount','Gift Status','Expiry Date','Created','Modified');
                    fputcsv($csv_file,$header_row,',','"');
                    if( !empty( $this->data ))
                    {
                        foreach($this->data['chk1'] as $id)  
                        {
                            $ab=" ";
                            $result= $this->Gift->find('first', array('conditions'=>array('Gift.id'=>$id)));
                            $row = array(
                            $result['Gift']['id'],
                            $result['Gift']['product_id'],
                            $result['Gift']['sender_id'],
                            $result['Gift']['receiver_id'],
                            $result['Gift']['receiver_fb_id'],
                            $result['Gift']['receiver_email'],
                            $result['Gift']['code'],
                            $result['Gift']['gift_amount'],
                            $result['Gift']['gift_status_id'],
                            $result['Gift']['expiry_date'],
                            $result['Gift']['created'],
                            $result['Gift']['modified'],

                             );
                            fputcsv($csv_file,$row,',','"');
                        }
                    }
                    die;
                  	}
	public function paid_gift() {
        $this->Prg->commonProcess('Gift');
        if(($this->passedArgs['created_start'])||($this->passedArgs['expiry_start'])||($this->passedArgs['modified_start']))
        { 
            if(!($this->passedArgs['created_start'])){
                $modified_start = $this->passedArgs['modified_start'].' 00:00:00';
                $modified_end =   $this->passedArgs['modified_end'].' 23:59:59';
                $expiry_start = date("Y-m-d", strtotime($this->passedArgs['expiry_start']) - 86400);
                $expiry_end = date("Y-m-d", strtotime($this->passedArgs['expiry_end']) + 86400);
                if(!$this->passedArgs['modified_end']){
                    $modified_end=$this->passedArgs['modified_start'].' 00:00:00';;
                }
                if(!$this->passedArgs['expiry_end']){
                    $expiry_end=date("Y-m-d", strtotime($this->passedArgs['expiry_start']) + 86400);
                }
               $conditions=array('conditions' => array($this->Gift->parseCriteria($this->passedArgs),'Gift.modified >'=>$modified_start,'Gift.modified <' => $modified_end
               ,'Gift.expiry_date >'=>$expiry_start,'Gift.expiry_date <' => $expiry_end
               ),'order'=>array('Gift.modified'=>'DESC')); 
            }
            if(!($this->passedArgs['expiry_start'])){
                $modified_start = $this->passedArgs['modified_start'].' 00:00:00';
                $modified_end = $this->passedArgs['modified_end'].' 23:59:59';
                $created_start = $this->passedArgs['created_start'].' 00:00:00';
                $created_end = $this->passedArgs['created_end'].' 23:59:59';;
                if(!$this->passedArgs['modified_end']){
                    $modified_end=$this->passedArgs['modified_start'].' 23:59:59';
                }
                if(!$this->passedArgs['created_end']){
                    $created_end=$this->passedArgs['created_start'].' 23:59:59';
                }
             $conditions=array('conditions' => array($this->Gift->parseCriteria($this->passedArgs),'Gift.modified >'=>$modified_start,'Gift.modified <' => $modified_end
               ,'Gift.created >'=>$created_start,'Gift.created <' => $created_end
               ),'order'=>array('Gift.modified'=>'DESC'));  
            }
            if(!($this->passedArgs['modified_start'])){

                $expiry_start = date("Y-m-d", strtotime($this->passedArgs['modified_start']) - 86400);
                $expiry_end = date("Y-m-d", strtotime($this->passedArgs['modified_end']) + 86400);
                $created_start = $this->passedArgs['created_start'].' 00:00:00';
                $created_end = $this->passedArgs['created_end'].' 23:59:59';
                if(!$this->passedArgs['expiry_end']){
                    $expiry_end=date("Y-m-d", strtotime($this->passedArgs['expiry_start']) + 86400);
                }
                if(!$this->passedArgs['created_end']){
                    $created_end=$this->passedArgs['created_start'].' 23:59:59';
             $conditions=array('conditions' => array($this->Gift->parseCriteria($this->passedArgs),'Gift.expiry_date >'=>$expiry_start,'Gift.expiry_end <' => $expiry_end
               ,'Gift.created >'=>$created_start,'Gift.created <' => $created_end
               ),'order'=>array('Gift.modified'=>'DESC')); 
            }
            }

            if(!($this->passedArgs['created_start'])&&(!($this->passedArgs['modified_start'])) )
            {
                $expiry_start = date("Y-m-d", strtotime($this->passedArgs['expiry_start']) - 86400);
                $expiry_end = date("Y-m-d", strtotime($this->passedArgs['expiry_end']) + 86400);
                if(!$this->passedArgs['expiry_end']){
                    $expiry_end=date("Y-m-d", strtotime($this->passedArgs['expiry_start']) + 86400);
                }
                $conditions=array('conditions' => array($this->Gift->parseCriteria($this->passedArgs),'Gift.expiry_date >'=>$expiry_start,'Gift.expiry_date <' => $expiry_end
                    ),'order'=>array('Gift.modified'=>'DESC'));
            }
            if(!($this->passedArgs['expiry_start'])&&(!($this->passedArgs['modified_start'])))
            {
                $created_start = $this->passedArgs['created_start'].' 00:00:00';
                $created_end = $this->passedArgs['created_end'].' 23:59:59';
                if(!$this->passedArgs['created_end']){
                    $created_end=$this->passedArgs['created_start'].' 23:59:59';
                }
                $conditions=array('conditions' => array($this->Gift->parseCriteria($this->passedArgs),'Gift.created >'=>$created_start,'Gift.created <' => $created_end
                    ));
            }
            if(!($this->passedArgs['created_start'])&&(!($this->passedArgs['expiry_start'])))
            {
                $modified_start = $this->passedArgs['modified_start'].' 00:00:00';
                $modified_end = $this->passedArgs['modified_end'].' 23:59:59';
                if(!$this->passedArgs['modified_end']){
                    $modified_end=$this->passedArgs['modified_start'].' 23:59:59';
                }
                $conditions=array('conditions' => array($this->Gift->parseCriteria($this->passedArgs),'Gift.modified >'=>$modified_start,'Gift.created <' => $modified_end
                    ),'order'=>array('Gift.modified'=>'DESC'));
            }
           if(($this->passedArgs['created_start'])&&(($this->passedArgs['modified_start']))&&(($this->passedArgs['expiry_start'])) )
            { 
                $modified_start = $this->passedArgs['modified_start'].' 00:00:00';
                $modified_end = $this->passedArgs['modified_end'].' 23:59:59';
                $created_start = $this->passedArgs['created_start'].' 00:00:00';
                $created_end = $this->passedArgs['created_end'].' 23:59:59';
                $expiry_start = date("Y-m-d", strtotime($this->passedArgs['modified_start']) - 86400);
                $expiry_end = date("Y-m-d", strtotime($this->passedArgs['modified_end']) + 86400);
                if(!$this->passedArgs['modified_end']){
                    $modified_end=$this->passedArgs['modified_start'].' 23:59:59';
                }
                if(!$this->passedArgs['created_end']){
                    $created_end=$this->passedArgs['created_start'].' 23:59:59';
                }
                if(!$this->passedArgs['expiry_end']){
                    $expiry_end=date("Y-m-d", strtotime($this->passedArgs['expiry_start']) + 86400);
                }
          $conditions=array('conditions' => array($this->Gift->parseCriteria($this->passedArgs),'Gift.modified >'=>$modified_start,'Gift.modified <' => $modified_end
           ,'Gift.created >'=>$created_start,'Gift.created <' => $created_end
           ,'Gift.expiry_date >'=>$expiry_start,'Gift.expiry_date <' => $expiry_end
            ),'order'=>array('Gift.modified'=>'DESC'));  
             }  
              
    
        }
        else{
            $conditions= array('conditions' => array($this->Gift->parseCriteria($this->passedArgs),'Product.id = Gift.product_id',
            'Product.min_price >' => 0),'order'=>array('Gift.modified'=>'DESC'));

        }
        $this->paginate = $conditions;
        $this->Gift->recursive = 0;
        $this->set('gifts', $this->paginate());
    
}
public function index() {
	
		$this->Prg->commonProcess('Gift');
		 if(($this->passedArgs['created_start'])||($this->passedArgs['expiry_start'])||($this->passedArgs['modified_start']))
        { 
            if(!($this->passedArgs['created_start'])){
                $modified_start = $this->passedArgs['modified_start'].' 00:00:00';
                $modified_end =   $this->passedArgs['modified_end'].' 23:59:59';
                $expiry_start = date("Y-m-d", strtotime($this->passedArgs['expiry_start']) - 86400);
                $expiry_end = date("Y-m-d", strtotime($this->passedArgs['expiry_end']) + 86400);
                if(!$this->passedArgs['modified_end']){
                    $modified_end=$this->passedArgs['modified_start'].' 00:00:00';;
                }
                if(!$this->passedArgs['expiry_end']){
                    $expiry_end=date("Y-m-d", strtotime($this->passedArgs['expiry_start']) + 86400);
                }
               $conditions=array('conditions' => array($this->Gift->parseCriteria($this->passedArgs),'Gift.modified >'=>$modified_start,'Gift.modified <' => $modified_end
               ,'Gift.expiry_date >'=>$expiry_start,'Gift.expiry_date <' => $expiry_end
               ),'order'=>array('Gift.modified'=>'DESC')); 
            }
            if(!($this->passedArgs['expiry_start'])){
                $modified_start = $this->passedArgs['modified_start'].' 00:00:00';
                $modified_end = $this->passedArgs['modified_end'].' 23:59:59';
                $created_start = $this->passedArgs['created_start'].' 00:00:00';
                $created_end = $this->passedArgs['created_end'].' 23:59:59';;
                if(!$this->passedArgs['modified_end']){
                    $modified_end=$this->passedArgs['modified_start'].' 23:59:59';
                }
                if(!$this->passedArgs['created_end']){
                    $created_end=$this->passedArgs['created_start'].' 23:59:59';
                }
             $conditions=array('conditions' => array($this->Gift->parseCriteria($this->passedArgs),'Gift.modified >'=>$modified_start,'Gift.modified <' => $modified_end
               ,'Gift.created >'=>$created_start,'Gift.created <' => $created_end
               ),'order'=>array('Gift.modified'=>'DESC'));  
            }
            if(!($this->passedArgs['modified_start'])){

                $expiry_start = date("Y-m-d", strtotime($this->passedArgs['modified_start']) - 86400);
                $expiry_end = date("Y-m-d", strtotime($this->passedArgs['modified_end']) + 86400);
                $created_start = $this->passedArgs['created_start'].' 00:00:00';
                $created_end = $this->passedArgs['created_end'].' 23:59:59';
                if(!$this->passedArgs['expiry_end']){
                    $expiry_end=date("Y-m-d", strtotime($this->passedArgs['expiry_start']) + 86400);
                }
                if(!$this->passedArgs['created_end']){
                    $created_end=$this->passedArgs['created_start'].' 23:59:59';
             $conditions=array('conditions' => array($this->Gift->parseCriteria($this->passedArgs),'Gift.expiry_date >'=>$expiry_start,'Gift.expiry_end <' => $expiry_end
               ,'Gift.created >'=>$created_start,'Gift.created <' => $created_end
               ),'order'=>array('Gift.modified'=>'DESC')); 
            }
            }

            if(!($this->passedArgs['created_start'])&&(!($this->passedArgs['modified_start'])) )
            {
                $expiry_start = date("Y-m-d", strtotime($this->passedArgs['expiry_start']) - 86400);
                $expiry_end = date("Y-m-d", strtotime($this->passedArgs['expiry_end']) + 86400);
                if(!$this->passedArgs['expiry_end']){
                    $expiry_end=date("Y-m-d", strtotime($this->passedArgs['expiry_start']) + 86400);
                }
                $conditions=array('conditions' => array($this->Gift->parseCriteria($this->passedArgs),'Gift.expiry_date >'=>$expiry_start,'Gift.expiry_date <' => $expiry_end
                    ),'order'=>array('Gift.modified'=>'DESC'));
            }
            if(!($this->passedArgs['expiry_start'])&&(!($this->passedArgs['modified_start'])))
            {
                $created_start = $this->passedArgs['created_start'].' 00:00:00';
                $created_end = $this->passedArgs['created_end'].' 23:59:59';
                if(!$this->passedArgs['created_end']){
                    $created_end=$this->passedArgs['created_start'].' 23:59:59';
                }
                $conditions=array('conditions' => array($this->Gift->parseCriteria($this->passedArgs),'Gift.created >'=>$created_start,'Gift.created <' => $created_end
                    ),'order'=>array('Gift.modified'=>'DESC'));
            }
            if(!($this->passedArgs['created_start'])&&(!($this->passedArgs['expiry_start'])))
            {
                $modified_start = $this->passedArgs['modified_start'].' 00:00:00';
                $modified_end = $this->passedArgs['modified_end'].' 23:59:59';
                if(!$this->passedArgs['modified_end']){
                    $modified_end=$this->passedArgs['modified_start'].' 23:59:59';
                }
                $conditions=array('conditions' => array($this->Gift->parseCriteria($this->passedArgs),'Gift.modified >'=>$modified_start,'Gift.created <' => $modified_end
                    ),'order'=>array('Gift.modified'=>'DESC'));
            }
           if(($this->passedArgs['created_start'])&&(($this->passedArgs['modified_start']))&&(($this->passedArgs['expiry_start'])) )
            { 
                $modified_start = $this->passedArgs['modified_start'].' 00:00:00';
                $modified_end = $this->passedArgs['modified_end'].' 23:59:59';
                $created_start = $this->passedArgs['created_start'].' 00:00:00';
                $created_end = $this->passedArgs['created_end'].' 23:59:59';
                $expiry_start = date("Y-m-d", strtotime($this->passedArgs['modified_start']) - 86400);
                $expiry_end = date("Y-m-d", strtotime($this->passedArgs['modified_end']) + 86400);
                if(!$this->passedArgs['modified_end']){
                    $modified_end=$this->passedArgs['modified_start'].' 23:59:59';
                }
                if(!$this->passedArgs['created_end']){
                    $created_end=$this->passedArgs['created_start'].' 23:59:59';
                }
                if(!$this->passedArgs['expiry_end']){
                    $expiry_end=date("Y-m-d", strtotime($this->passedArgs['expiry_start']) + 86400);
                }
          $conditions=array('conditions' => array($this->Gift->parseCriteria($this->passedArgs),'Gift.modified >'=>$modified_start,'Gift.modified <' => $modified_end
           ,'Gift.created >'=>$created_start,'Gift.created <' => $created_end
           ,'Gift.expiry_date >'=>$expiry_start,'Gift.expiry_date <' => $expiry_end
            ),'order'=>array('Gift.modified'=>'DESC'));  
             }  
              
    
        }
		else{
			$conditions= array('conditions' => array($this->Gift->parseCriteria($this->passedArgs),'Product.id = Gift.product_id',
            'Product.min_price' => 0),'order'=>array('Gift.modified'=>'DESC'));

		}
		
		$this->paginate = $conditions;
		$this->Gift->recursive = 0;
		$this->set('gifts', $this->paginate());
	}
	


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Gift->id = $id;
		if (!$this->Gift->exists()) {
			throw new NotFoundException(__('Invalid gift'));
		}
		$this->set('gift', $this->Gift->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Gift->create();

			if ($this->Gift->save($this->request->data)) {
				$this->Session->setFlash(__('The gift has been saved'));
				$this->redirect(array('action' => 'index')); exit();
			} else {
				$this->Session->setFlash(__('The gift could not be saved. Please, try again.'));
			}
		}
		$products = $this->Gift->Product->find('list');
		$giftStatuses = $this->Gift->GiftStatus->find('list');
		$senders = $this->Gift->Sender->find('list');
		$receivers = $this->Gift->Receiver->find('list');
		$this->set(compact('products', 'giftStatuses', 'senders', 'receivers'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Gift->id = $id;
		if (!$this->Gift->exists()) {
			throw new NotFoundException(__('Invalid gift'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Gift->save($this->request->data)) {
				$this->Session->setFlash(__('The gift has been saved'));
				$this->redirect(array('action' => 'index')); exit();
			} else {
				$this->Session->setFlash(__('The gift could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Gift->read(null, $id);
		}
		$products = $this->Gift->Product->find('list');
		$giftStatuses = $this->Gift->GiftStatus->find('list');
		$senders = $this->Gift->Sender->find('list');
		$receivers = $this->Gift->Receiver->find('list');
		$this->set(compact('products', 'giftStatuses', 'senders', 'receivers'));
	}

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
		$this->Gift->id = $id;
		if (!$this->Gift->exists()) {
			throw new NotFoundException(__('Invalid gift'));
		}
		if ($this->Gift->delete()) {
			$this->Session->setFlash(__('Gift deleted'));
			$this->redirect(array('action' => 'index')); exit();
		}
		$this->Session->setFlash(__('Gift was not deleted'));
		$this->redirect(array('action' => 'index'));exit();
	}
	public function send_campaign(){
		$session_time=$this->AesCrypt->decrypt($this->data['gifts']['gift_id']);
		$green =$this->Session->read('session_time');
		if($session_time != $green){
        	$this->redirect(array('controller' => 'reminders', 'action'=>'view_friends'));
		}

		$this->Gift->Product->recursive = -1;
		$decrypted_product_id = $this->AesCrypt->decrypt($this->data['gifts']['product_id']);
		$this->data['gifts']['product_id'] = $decrypted_product_id;
        $product_display_off = $this->Gift->Product->find('count', array('conditions' => array('Product.id' => $decrypted_product_id,
        		'Product.display_order' => 0
        	)));
        if($product_display_off){
        	$this->Session->setFlash(__('Ooops!, Selected voucher is not available, select any other voucher to send'));
        	$this->redirect(array(
                'controller' => 'reminders', 'action'=>'view_friends'));
        }
		if(isset($this->data['chk2']) && $this->request->is('post'))
        {
        	$message = null;
	       	foreach($this->data['chk2'] as $camp_rec_id){
                $this->Gift->recursive = -1;
                $check_product_for_receiver = $this->Gift->find('count', array('conditions'
                    => array('product_id' => $decrypted_product_id,
                        'receiver_fb_id' => $camp_rec_id,
                        'gift_status_id !=' => GIFT_STATUS_TRANSACTION_PENDING,
                    	'expiry_date >' => date('Y-m-d') 
                    )
                ));
                if($check_product_for_receiver){
                	$message = 1;
                	continue;
                }
                else $message = 0;
            	$receiver_fb_id=$camp_rec_id;
            	$receiver = $this->Connect->User->findByFacebookId($receiver_fb_id);

            	if (!$receiver) {
                //Create a User for the receiver            
                /* Dont create User for receiver, just set the receiver_fb_id  */
                	$this->Gift->Receiver->create();
                	$data['Receiver']['facebook_id'] = $receiver_fb_id;
                	if (!$this->Gift->Receiver->save($data)) {
                		$this->Session->setFlash(__('Cant create new receipient. Gift not sent'));
                		return;
                	}
                	$receiver = $this->Connect->User->findByFacebookId($receiver_fb_id);
            	}
           
	            $vendor_id = $this->data['gifts']['vendor_id'];          
	            $sender_id = $this->Auth->user('id');
	            $receiver_fb_id = $receiver['User']['facebook_id'];
	            $product_id = $decrypted_product_id;
	            $amount = $this->data['gifts']['contribution_amount']; 
	            $send_now = 1;
	            $reciever_email = "";
	            $gift_message = $this->data['gifts']['gift-message'];
	            $post_to_fb = 1;
	            $reciever_name = "";
	            $receiver_birthday = "";
	            $scheduled = false;
	            $date_to_schedule = null;
	           
	            $this->send_base($sender_id, $receiver_fb_id, $decrypted_product_id, $amount, $send_now, 
	            $reciever_email, $gift_message, $post_to_fb, $receiver_birthday, $reciever_name, $date_to_schedule); 
            
        	}
        	$this->Session->delete('session_time');
        	if($message) $this->Session->setFlash(__('Awesome Karma! Friend has received this gift'));
         	$this->redirect(array('controller' => 'campaigns', 'action'=>'view_products',$this->Session->read('campaign_id')));
        }	

	}
	public function send() {
		$session_time=$this->AesCrypt->decrypt($this->data['gifts']['gift_id']);
		$green =$this->Session->read('session_time');
        $product_id = $this->AesCrypt->decrypt($this->data['gifts']['product_id']);
		if($session_time != $green){
        	$this->redirect(array('controller' => 'reminders', 'action'=>'view_friends'));
		}
		if(isset($this->data['gifts']))
        {
        	$this->Gift->Product->recursive = -1;
        	$product_display_off = $this->Gift->Product->find('count', array('conditions' => array('Product.id' => $product_id,
        			'Product.display_order' => 0
        		)));
        	$this->Gift->recursive = -1;
            $check_product_for_receiver = $this->Gift->find('count', array('conditions'
                => array('product_id' => $product_id,
                    'receiver_fb_id' => $this->data['gifts']['user_id'],
                    'gift_status_id !=' => GIFT_STATUS_TRANSACTION_PENDING,
                    'expiry_date >' => date('Y-m-d') 
                )
            ));
            if($check_product_for_receiver || $product_display_off ){
            	if($check_product_for_receiver && !$product_display_off)
            		$this->Session->setFlash(__('Your Friend has already received this gift, select any other voucher to send'));
                if($check_product_for_receiver && $product_display_off)
                    $this->Session->setFlash(__('Ooops! Your Friend has already received this gift and selected voucher is not available. Select any other voucher to send'));
            	if(!$check_product_for_receiver && $product_display_off)
            		$this->Session->setFlash(__('Ooops!, Selected voucher is not available, select any other voucher to send'));
                $this->Reminder->recursive = -1;
            	$reminder = $this->Reminder->find('first',
			    	array('conditions' => array('friend_fb_id' => $this->data['gifts']['user_id'])
				));
         		/*$this->redirect(array('controller' => 'products',
         			'action'=>'view_products',
         			'receiver_id'=>$this->data['gifts']['user_id'],
         			'receiver_name' => $reminder['Reminder']['friend_name'],
                    'receiver_birthday' => $reminder['Reminder']['friend_birthday'],
                    'receiver_location' => $reminder['Reminder']['current_location'],
                    'friend_birthyear' => $reminder['Reminder']['friend_birthyear'],
                    'receiver_sex' => $reminder['Reminder']['sex'],
                    'ocasion' => isset($ocasion) ? $ocasion : null
         			));*/
				$this->redirect(array('controller' => 'reminders',
         			'action'=>'view_friends'));
            }

            $receiver_fb_id=$this->data['gifts']['user_id'];
            $receiver = $this->Connect->User->findByFacebookId($receiver_fb_id);

            if (!$receiver) 
            {
                //Create a User for the receiver            
                /* Dont create User for receiver, just set the receiver_fb_id  */
                $this->Gift->Receiver->create();
                $data['Receiver']['facebook_id'] = $receiver_fb_id;
                if (!$this->Gift->Receiver->save($data)) {
                $this->Session->setFlash(__('Cant create new receipient. Gift not sent'));
                return;
                }
                $receiver = $this->Connect->User->findByFacebookId($receiver_fb_id);
            }
            $data1['id'] =  $this->data['gifts']['id'];
            $data1['user_id'] =  $receiver['User']['id'];
             $data1['reciever_email'] = $this->data['gifts']['reciever_email'];
            if (array_key_exists('first_name', $this->data['gifts']))
            {
                $data1['first_name'] = $this->data['gifts']['first_name'];
                $data1['last_name'] = $this->data['gifts']['last_name'];
                $data1['address1'] = $this->data['gifts']['address1'];
                $data1['city'] = $this->data['gifts']['city'];
                $data1['pin_code'] = $this->data['gifts']['pin_code'];
                $data1['phone'] = $this->data['gifts']['phone'];
                $data1['state'] = $this->data['gifts']['state'];                          
                $data1['country'] = $this->data['gifts']['country'];
                $data1['state'] = $this->data['gifts']['state'];
                $data1['country'] = $this->data['gifts']['country'];
            }
            $this->Gift->set($data1);
            $sender_id = $this->Auth->user('id');
            $receiver_fb_id = $receiver['User']['facebook_id'];
            $amount = $this->data['contribution_amount']; 
            $send_now = $this->data['gifts']['send_now'];
            $reciever_email = $this->data['gifts']['reciever_email'];
            $gift_message = $this->data['gifts']['gift-message'];
            $post_to_fb = $this->data['chk'];
            $reciever_name = $this->data['gifts']['reciver_name'];
            $date_to_send_later = $this->data['gifts']['date_to_send_later'];

            if($date_to_send_later=="")
            {
            	$receiver_birthday = $this->data['gifts']['receiver_birthday'];
            }
            else
            {	

            	$receiver_birthday = date("Y-m-d", strtotime( $date_to_send_later));
            }
            
            
            if (!$this->Gift->validates())
            {
                 $errors1 = $this->Gift->validationErrors;
                 $errors=(array_values($errors1));
                 $errorString1 = null;
                   foreach($errors as $err)
                   {
                       if($errorString1 == null)
                           $errorString1 = $err[0];
                       else
                           $errorString1 = $errorString1.', '.$err[0];
                       
                   }
                $finalErrorString = 'Please Enter: '.$errorString1.'<br/>';
                $this->Session->setFlash(__($finalErrorString));
                $this->redirect(array('controller'=>'products', 'action'=>'view_product',
                    $product_id,
                    'receiver_id'=>$receiver_fb_id ,
                    'receiver_name' => $reciever_name,
                    'receiver_birthday' => $receiver_birthday,
                    'ocasion' => isset($this->request->params['named']['ocasion']) ?
                    $this->request->params['named']['ocasion'] : null

                )); 
            }
             if(isset($data1['first_name']))
             {
            $this->UserAddress->save($data1);
             }
            $this->send_base($sender_id, $receiver_fb_id, $product_id, $amount, $send_now, 
            $reciever_email, $gift_message, $post_to_fb, $receiver_birthday,$reciever_name); 

        }
        $this->Session->delete('session_time');
	}

	public function send_base($sender_id, $receiver_fb_id, $product_id, $amount, $send_now = 1,$receiver_email = null, $gift_message = null, $post_to_fb = true,$receiver_birthday = null, $reciever_name = null,$date_to_send = null) {
        $this->redirectIfNotAllowedToSend();
		$this->Gift->create();
        $this->TemporaryGiftCode->create();
		$this->Gift->Product->id = $product_id;
    
		if (!$this->Gift->Product->exists()) {
			throw new NotFoundException(__('Invalid Product'));
		}
		$this->Gift->Product->recursive = 0;
		$product = $this->Gift->Product->read(null, $product_id); 

		$gift['Gift']['product_id'] = $product_id;
        $data['TemporaryGiftCode']['product_id'] = $product_id;
		$gift['Gift']['sender_id'] = $sender_id;
		$gift['Gift']['send_now'] = $send_now;
		//$gift['Gift']['date_to_send'] = $receiver_birthday;
		if ($receiver_email) {
			$gift['Gift']['receiver_email'] = $receiver_email;
		}
		if ($gift_message) {
			$gift['Gift']['gift_message'] = $gift_message;
		}
		$gift['Gift']['post_to_fb'] = $post_to_fb;
		$gift['Gift']['receiver_fb_id'] = $receiver_fb_id;

		//$gift_check = 
		
		$receiver = $this->Gift->User->find('first', array('fields' => array('User.id'), 'conditions' => array('User.facebook_id' => $receiver_fb_id)));
		if (!$receiver) {
			//Create a User for the receiver			
		/* Dont create User for receiver, just set the receiver_fb_id
		 *	$this->Gift->Receiver->create();
			$data['Receiver']['facebook_id'] = $receiver_fb_id;
			if (!$this->Gift->Receiver->save($data)) {
				$this->Session->setFlash(__('Cant create new receipient. Gift not sent'));
				return;
			}
			$receiver = $this->Connect->User->findByFacebookId($receiver_fb_id);
			*/
		}
		
		// Assign dummy user id to receiver id, because this user does not yet exist
		// Our table has a dummy user id 1 with username = giftReceipientPlaceholder
		// This is where all the gifts for unregistered recipients go
		// receipients are identified by their recipient_fb_id, and at the time of registration
		// recipient id is correctly filled in (in the beforeFacebookSave function)
        $gift['Gift']['receiver_id'] = (isset($receiver) && $receiver['User']['id']) ? $receiver['User']['id']
			: UNREGISTERED_GIFT_RECIPIENT_PLACEHODER_USER_ID;
		$gift['Gift']['gift_amount'] = $amount;
        $product_data = $this->Gift->Product->find('first', array('fields' => array('Product.allocation_mode','Product.min_price','Product.max_price','Product.code_type_id'), 'conditions' => array('Product.id' => $product_id)));
        if(($product_data['Product']['allocation_mode']==TEMP_ALLOCATION_CODE_COUNT_RESTRICTED && $product_data['Product']['min_price'] == 0 && $product_data['Product']['max_price'] == 0 && $product_data['Product']['code_type_id'] == UPLOADED_CODE )||($product_data['Product']['allocation_mode']==TEMP_ALLOCATION_CODE_COUNT_RESTRICTED_RATE && $product_data['Product']['min_price'] == 0 && $product_data['Product']['max_price'] == 0 && $product_data['Product']['code_type_id'] == UPLOADED_CODE)) 
         {

            $code = $this->Gift->Product->UploadedProductCode->find('first',
            array('conditions' => array('available'=>1, 'product_id' =>$product_id,
                'value' => $amount, 'expiry >' => date("Y-m-d", strtotime(date("Y-m-d")     . "+".$product['Product']['days_valid']." days")))));
            if (!$code) {
                $this->Mixpanel->track('Out of Codes', array(
                        'ProductId' => $product
                    ));
                $this->Session->setFlash(__('Ooops, our bad ! Seems like we ran out of gift vouchers for this vendor.  Will you select another vendor ?'));
                $this->log('Out of uploaded codes for prod id '.$product.' value '.$value, 'ns');
                $this->redirect(array('controller'=>'products', 'action'=>'view_product')); 
            }
            else{

            $temp_code = $this->createRandomCode($product_id);
            $gift['Gift']['code'] = $temp_code;
            $gift['Gift']['gift_code_allocation_mode'] = $product_data['Product']['allocation_mode'];
            $data['TemporaryGiftCode']['coupon_code'] = $temp_code;
            $this->TemporaryGiftCode->saveAssociated($data);

            }

            
            
         }
        else if($product_data['Product']['allocation_mode']==NOT_RESTIRCTED && $product_data['Product']['min_price'] == 0 && $product_data['Product']['max_price'] == 0 && $product_data['Product']['code_type_id'] == UPLOADED_CODE) 
        {
            $code = $this->Gift->Product->UploadedProductCode->find('first',
            array('conditions' => array('available'=>1, 'product_id' =>$product_id,
                'value' => $amount, 'expiry >' => date("Y-m-d", strtotime(date("Y-m-d")     . "+".$product['Product']['days_valid']." days")))));
            if (!$code) {
                $this->Mixpanel->track('Out of Codes', array(
                        'ProductId' => $product
                    ));
                $this->Session->setFlash(__('Ooops, our bad ! Seems like we ran out of gift vouchers for this vendor.  Will you select another vendor ?'));
                $this->log('Out of uploaded codes for prod id '.$product.' value '.$value, 'ns');
                $this->redirect(array('controller'=>'products', 'action'=>'view_product')); 
            }
            else
            {
                $temp_code = $this->createUnlimitedCode($product_id);
               $gift['Gift']['code'] = $temp_code;
               $gift['Gift']['gift_code_allocation_mode'] = $product_data['Product']['allocation_mode'];
               $data['TemporaryGiftCode']['coupon_code'] = $temp_code;
               $this->TemporaryGiftCode->saveAssociated($data);
            }

         }

         else
         {
            $gift['Gift']['code'] = $this->getCode($product, $gift['Gift']['gift_amount'],$reciever_name,$receiver_fb_id,$receiver_birthday);   
         }
         
         $gift['Gift']['expiry_date'] = $this->getExpiryDate($product['Product']['days_valid']);  

		if (!$send_now) {
		    $gift['Gift']['date_to_send'] = $receiver_birthday;
		}

		if($date_to_send) 
			{
				
				$gift['Gift']['date_to_send'] = $date_to_send;
			}

		if ($product['Product']['min_price'] == 0) {
			$payment_needed = $gift['Gift']['gift_amount'] - 
				$product['Product']['min_value'];
		} else {
			$payment_needed = $gift['Gift']['gift_amount'];
		}	
		if ($payment_needed) {
			// Paid Gift.  Start Transaction
			$gift['Transaction']['transaction_status_id'] = TX_STATUS_PROCESSING;
			$gift['Gift']['gift_status_id'] = GIFT_STATUS_TRANSACTION_PENDING;
		} else {
			if ($send_now) {
				$gift['Gift']['gift_status_id'] = GIFT_STATUS_VALID;
			} else {
				$gift['Gift']['gift_status_id'] = GIFT_STATUS_SCHEDULED;
			}
    		}
            
		if ($this->Gift->saveAssociated($gift)) {
			if ($payment_needed) {
				$this->redirect(array('controller' => 'transactions',
							'action' => 'start_transaction',
							'amount' => $payment_needed,
							'OrderId' => $this->Gift->getLastInsertID()));	
			} else {
				if ($send_now) {
					$this->informSenderReceipientOfGiftSent($this->Gift->getLastInsertID(), FB::getAccessToken(), $post_to_fb);
					$this->Session->setFlash(__('Awesome Karma ! Your gift has been sent. Want to send another one ? '));
					$this->Mixpanel->track('Sent Gift', array());
				} else {	    
					$this->Session->setFlash(__('Awesome Karma ! Your gift is scheduled to be sent. Want to send another one ? '));
					$this->Mixpanel->track('Scheduled Gift', array());				
				}
			}
		} else {
			$this->Session->setFlash(__('Unable to send gift.  Try again'));
			$this->redirect($this->referer);
		}
		
		if($this->params['ext'] != 'json' && $this->action != 'send_campaign' && $this->action != 'gift_to_campaign_senders_from_giftology')
            $this->redirect(array('controller' => 'reminders', 'action'=>'send_success'));
        if($this->action == 'gift_to_campaign_senders_from_giftology') return;
	}

        function getCode($product, $gift_amount,$reciever_name,$receiver_fb_id,$receiver_birthday) {
        if ($product['Product']['code_type_id'] == GENERATED_CODE) {
        return $this->Giftology->generateGiftCode($product['Product']['id']);
        } elseif ($product['Product']['code_type_id'] == UPLOADED_CODE) {
        return $this->getUploadedCode($product['Product']['id'], $gift_amount,
            date("Y-m-d", strtotime(date("Y-m-d")     . "+".$product['Product']['days_valid']." days")),$reciever_name,$receiver_fb_id,$receiver_birthday); 
        } else {
        return $product['Product']['code']; //Static Reusable code for all gifts, as entered
        }
        }

        
        function getUploadedCode($product, $value, $valid_till,$reciever_name,$receiver_fb_id,$receiver_birthday) {
            $code = $this->Gift->Product->UploadedProductCode->find('first',
                array('conditions' => array('available'=>1, 'product_id' =>$product,
                    'value' => $value, 'expiry >' => $valid_till)));
            if (!$code) {
                $this->Mixpanel->track('Out of Codes', array(
                        'ProductId' => $product
                    ));
                $this->Session->setFlash(__('Ooops, our bad ! Seems like we ran out of gift vouchers for this vendor.  Will you select another vendor ?'));
                $this->log('Out of uploaded codes for prod id '.$product.' value '.$value, 'ns');
                $this->redirect(array('controller'=>'products', 'action'=>'view_product',
                        'receiver_id'=>$receiver_fb_id ,
                        'receiver_name' => $reciever_name,
                        'receiver_birthday' => $receiver_birthday,
                        'ocasion' => isset($this->request->params['named']['ocasion']) ?
                        $this->request->params['named']['ocasion'] : null

                    )); 
            }
            $this->Gift->Product->UploadedProductCode->updateAll(array('available' => 0),
                                         array('UploadedProductCode.id' => $code['UploadedProductCode']['id']));
            return $code['UploadedProductCode']['code'];
        }

         function createRandomCode($product_id) {
            $total_codes = $this->Gift->Product->UploadedProductCode->find('count',
            array('conditions' => array('available'=>1, 'product_id' =>$product_id)));
            
            $sent_temp_code = $this->TemporaryGiftCode->find('count',
            array('conditions' => array('product_id' =>$product_id)));
            
            $redemption_rate = $this->Gift->Product->find('first', array('fields' => array('Product.redemption_rate'), 'conditions' => array('Product.id' => $product_id)));
            
            $total_code_byrate= ( ($total_codes/$redemption_rate['Product']['redemption_rate'])*100) ;
            
            if($sent_temp_code < $total_code_byrate) {
            $chars = "abcdefghijkmnopqrstuvwxyz023456789"; 
            srand((double)microtime()*1000000); 
            $i = 0; 
            $pass = '' ; 

            while ($i <= 7) { 
                $num = rand() % 33; 
                $tmp = substr($chars, $num, 1); 
                $pass = $pass . $tmp; 
                $i++; 
            } 
            $pass = "TEMP".$pass;

            return $pass; 
                
            }
            else{
                $this->Session->setFlash(__('Ooops, our bad ! Seems like we ran out of gift vouchers for this vendor.  Will you select another vendor ?'));
                $this->redirect(array('controller'=>'reminders','action'=>'view_friends'));
            }
             

        }

        function createUnlimitedCode($product_id){
              $chars = "abcdefghijkmnopqrstuvwxyz023456789"; 
            srand((double)microtime()*1000000); 
            $i = 0; 
            $pass = '' ; 

            while ($i <= 7) { 
                $num = rand() % 33; 
                $tmp = substr($chars, $num, 1); 
                $pass = $pass . $tmp; 
                $i++; 
            } 
            $pass = "TEMP".$pass;

            return $pass; 
              
          }

        function getExpiryDate($days_valid) {
                return date('Y-m-d', strtotime("+".$days_valid." days"));
        }

	function getGiftURL($gift_id, $content) {
	    return FULL_BASE_URL.'/users/login/?gift_id='.
		    $gift_id.'&utm_source=facebook&utm_medium=feed_post&utm_campaign=gift_sent_new&utm_term='.
		    $gift_id.'&utm_content='.$content;
	}

	function informSenderReceipientOfGiftSent($gift_id, $access_token, $post_to_fb = null) {
	
		$product_id = $this->Gift->find('first', array('fields' => array('product_id'), 'conditions' => array('Gift.id' => $gift_id)));
		$product_type_id = $this->Gift->Product->find('first', array('fields' => array('Product.product_type_id'), 'conditions' => array('Product.id' => $product_id['Gift']['product_id'])));
        $product_type = $this->ProductType->find('first', array('fields' => array('type'), 'conditions' => array('id' => $product_type_id['Product']['product_type_id'])));

		if (isset($this->request->params['named']['receiver_fb_id'])) 
		{
			//callback without ccav inturuption, all data is in params
			//no need to read DB
			if ($this->request->params['named']['message']) {
				$message = $this->Connect->user('name').' sent '.$this->request->params['named']['receiver_name'].' a real gift voucher on Giftology.com.  Message: '.$this->request->params['named']['message'];
			} else {
				$message = $this->Connect->user('name').' sent '.$this->request->params['named']['receiver_name'].' a real gift voucher on Giftology.com';
			}
			$receiver_fb_id = $this->request->params['named']['receiver_fb_id'];
			$receiver_name = $this->request->params['named']['receiver_name'];
			$receiver_email = $this->request->params['named']['receiver_email'];
			$sender_name = $this->Connect->user('name');
			$sender_email = $this->Connect->user('email');
			$sender_fb_id = $this->Connect->user('id');
		} 
		else
		 {
			$gift = $this->Gift->find('first', array('conditions' => array ('Gift.id' => $gift_id),
					'contain' => array('Sender' => array('UserProfile')))); // Use $gift for message, not named params, because this can be called after CCAv callback as well XX NS
			$receiver_fb_id = $gift['Gift']['receiver_fb_id'];
			$receiver_email = $gift['Gift']['receiver_email'];
			$ret = $this->Gift->query("SELECT friend_name from reminders where friend_fb_id =".$gift['Gift']['receiver_fb_id']);
			$receiver_name = $ret[0]['reminders']['friend_name'];

			$receiver_info = $this->Gift->Reminder->find('all',array('conditions' => array('Reminder.friend_name' => $receiver_name)));
			$receiver_birthday=isset($receiver_info['0']['Reminder']['friend_birthday']) ? $receiver_info['0']['Reminder']['friend_birthday'] : NULL;

			$receiver_id = $this->Gift->User->find('first',array('conditions' => array('User.facebook_id' => $receiver_fb_id)));
			$idd=$receiver_id['User']['id'];

			$User_id = $this->UserProfile->find('first',array('conditions' => array('UserProfile.user_id' => $idd)));
	
			$sender_name = $gift['Sender']['UserProfile']['first_name']." ".$gift['Sender']['UserProfile']['last_name'];
			$sender_email = $gift['Sender']['UserProfile']['email'];
			$sender_fb_id = $gift['Sender']['facebook_id'];
			if ($gift['Gift']['gift_message']) {
				$email_message = $gift['Gift']['gift_message'];
				$message = $gift['Gift']['gift_message']."\r\n ".'@['.$receiver_fb_id.']';
				if($receiver_id['User']['facebook_id'] == $this->Auth->user('facebook_id') )
		            {
		                $message = $gift['Gift']['gift_message'];
		            }
			} else {
				//$message = $sender_name.' sent '.$receiver_name.' a real gift voucher to '.$gift['Product']['Vendor']['name'].' on Giftology.com';
				$message = $sender_name.' sent '.'@['.$receiver_fb_id.']'.' a real gift voucher to '.$gift['Product']['Vendor']['name'].' on Giftology.com';
			}
		}
		// Post to both sender and receipients facebook wall
			$this->Giftology->postToFB($sender_fb_id, $receiver_fb_id, $access_token,
					   $this->getGiftURL($gift_id, 'Receiver'), $message, $post_to_fb);

			if (!$sender_email) $sender_email = 'cs@giftology.com';
				if (!$sender_name) $sender_name = 'Giftology';
			    
		// Send email to receipients about gifts sent
		/*if ($receiver_email && $User_id=="" && $receiver_birthday==date("Y-m-d")) 
			{
				$this->send_email($gift_id,$receiver_email,$sender_name,$sender_email,$receiver_name,$email_message,'gift_sent_birthday');
			}

		else if ($receiver_email && $User_id=="") 
			{
				$this->send_email($gift_id,$receiver_email,$sender_name,$sender_email,$receiver_name,$email_message,'gift_sent_birthday');
			}

		else if ($receiver_email && $receiver_birthday==date("Y-m-d") && $User_id!="") 
			{
			    $this->send_email($gift_id,$receiver_email,$sender_name,$sender_email,$receiver_name,$email_message,'gift_sent_birthday');
			}*/
		if ($receiver_email && $receiver_birthday==date("Y-m-d")) 
			{
			    $this->send_email($gift_id,$receiver_email,$sender_name,$sender_email,$receiver_name,$email_message,'gift_sent_birthday');
			}
		else if ($receiver_email)
		 {	
		 	$this->send_email($gift_id,$receiver_email,$sender_name,$sender_email,$receiver_name,$email_message,'gift_sent');
		    
            if($product_type['ProductType']['type']=='SHIPPED')
            {
                $email->config('smtp')
                ->template('gift_sent', 'default') 
                ->emailFormat('html')
                ->to('care@giftology.com')
                ->from(array($sender_email => $sender_name))
                ->subject($receiver_name.', '.$sender_name.' sent you a gift voucher to '.$vendor_name)
                ->viewVars(array('sender' => $sender_name,
                         'receiver' => $receiver_name,
                         'vendor' => $vendor_name,
                         'linkback' => FULL_BASE_URL.'/users/login?utm_source=email&utm_medium=gift_email&utm_campaign=gift_sent&utm_term='.$gift_id,
                         'message' => $message,
                         'value' => $gift['Gift']['gift_amount'],
                         'wide_image_link' => FULL_BASE_URL.'/'.$gift['Product']['Vendor']['wide_image']))
                ->send();    
            }
		}
	}
	public function email_voucher(){

		$id=isset($this->data['gifts']['gift_id']) ? $this->data['gifts']['gift_id'] : NULL;
		if($id == "")
     	{
     		$this->redirect(array(
                'controller' => 'gifts', 'action'=>'view_gifts'));	
     	}
		$gift = $this->Gift->find('first', array(
		'contain' => array(
		'Product' => array('Vendor'),
		'Receiver' => array('UserProfile')),
		'conditions' => array('Gift.id'=>$id)));
		$this->set('email',$gift['Receiver']['UserProfile']['email']) ;
		$this->set('gift', $gift);
	}
	function send_voucher_email()
	{
		$receiver_email=$this->data['gifts']['email'];
		$receiver_name =$this->data['gifts']['user_name'];
		$id=isset($this->data['gifts']['id']) ? $this->data['gifts']['id'] : NULL;
    	$gift = $this->Gift->find('first', array(
			'contain' => array(
				'Product' => array('Vendor'),
				'Sender' => array('UserProfile')),
			'conditions' => array('Gift.id'=>$id)));
    	 $vendor_name = $gift['Product']['Vendor']['name'];
    	$pin = $this->UploadedProductCode->find('first', array('fields' => array('UploadedProductCode.pin'),'conditions' => array(
			'UploadedProductCode.product_id' => $gift['Gift']['product_id'],
			'UploadedProductCode.code' => $gift['Gift']['code']
			)
		));
				$email = new CakeEmail();
			    $email->config('smtp')
			    ->template('email_voucher', 'default') 
			    ->emailFormat('html')
			    ->to($receiver_email)
           		->from(array('care@giftology.com' => 'Giftology'))
			    ->subject($receiver_name.',Your '.$vendor_name.' voucher is here')
			    ->viewVars(array(
					     'receiver' => $receiver_name,
					     'pin' =>$pin['UploadedProductCode']['pin'],
					     'gift' => $gift,
					     'wide_image_link' => FULL_BASE_URL.'/'.$gift['Product']['Vendor']['wide_image']))
			    ->send();	
			    $this->Gift->recursive= -2; 
                $this->Gift->id= $id;
                $this->Gift->saveField('email_address',$receiver_email);
			   $this->Gift->updateAll (array('Gift.email_status' => 1),
						array('Gift.id' => $id)); 
            $this->redirect(array(
                'controller' => 'gifts', 'action'=>'view_gifts'));

	}
	function send_email ($gift_id,$receiver_email,$sender_name,$sender_email,$receiver_name,$email_message,$template)
	{
		$gift = $this->Gift->find('first', array(
				'conditions' => array('Gift.id' => $gift_id),
				'contain' => array(
					'Product' => array('Vendor'))));
			    $vendor_name = $gift['Product']['Vendor']['name'];
				
			    $email = new CakeEmail();
			    $email->config('smtp')
			    ->template($template, 'default') 
			    ->emailFormat('html')
			    ->to($receiver_email)
			    ->from(array($sender_email => $sender_name))
			    ->subject($receiver_name.', '.$sender_name.' sent you a  '.$vendor_name.' gift voucher')
			    ->viewVars(array('sender' => $sender_name,
					     'receiver' => $receiver_name,
					     'vendor' => $vendor_name,
					     'linkback' => FULL_BASE_URL.'/users/login?utm_source=email&utm_medium=gift_email&utm_campaign=gift_sent&utm_term='.$gift_id,
					     'message' => $email_message,
					     'value' => $gift['Gift']['gift_amount'],
					     'wide_image_link' => FULL_BASE_URL.'/'.$gift['Product']['Vendor']['wide_image']))
			    ->send();	
	}


	function redeemGiftCode ($code) {
		//XXX Needs authentication
		$this->Gift->recursive = -1;
		$gift = $this->Gift->find('first', array('conditions' => array ('code' => $code)));
		
		if ($gift & $gift['Gift']['gift_status_id'] == GIFT_STATUS_VALID) {
			$this->Gift->updateAll(array('gift_status_id' => GIFT_STATUS_REDEEMED),
						array('id'=> $gift['Gift']['id']));
			return $gift['Gift']['gift_amount'];
		}
		return null;
	}
	public function redeem() {
		if(SUSPICIOUS_USER_CHECK){
			$friend_list=$this->Gift->Reminder->find('count',array('conditions' =>array (
    		'Reminder.user_id' => $this->Auth->user('id'))));
			/*$Facebook = new FB();
        	$friends_count = $Facebook->api(array('method' => 'fql.query',
                                        'query' => 'SELECT friend_count FROM user WHERE uid ='.$this->Connect->user('id')));*/
			$white_list_check = $this->UserWhiteList->white_list($this->Connect->user('id'));
        	if($friend_list < MINIMUM_NUMBER_OF_FRIENDS_TO_REDEEM_GIFT){
        		if(!$white_list_check){
        			$this->Session->setFlash('Oops! There seems to be some problem with your facebook profile. Try again later.! If the problem persists try changing your profile settings.', 'default', array(), 'suspicious_activity_message');
        			$this->redirect(array('controller'=>'reminders', 'action'=>'view_friends'));
        		}
        	}
		}
        	
		if($this->request->params['named']['enc_id'])
			$id = $this->AesCrypt->decrypt($this->request->params['named']['enc_id']);
		else
			$id = $this->AesCrypt->decrypt($this->data['id']);
		$this->Gift->id = $id;
		if (!$this->Gift->exists()) {
			throw new NotFoundException(__('Invalid gift'));
		}
	        $this->Gift->Behaviors->attach('Containable');
	    
		 $gift = $this->Gift->find('first', array(
            'contain' => array(
                'Product' => array('Vendor'),
                'Sender' => array('UserProfile'),
                'Receiver' => array('UserProfile')),
            'conditions' => array('Gift.id'=>$id)));
        if($this->Auth->User('id') != $gift['Gift']['receiver_id']){
            $this->Session->setFlash('Gift you were redeeming, it does not bleong to you. Please contact customer support - cs@giftology.com.');
            $this->redirect(array(
                'controller' => 'gifts', 'action'=>'view_gifts'));
        }
        // will implement later when we have perfect UI
        /*$redeem_date = "'".date('Y-m-d H:i:s')."'";
        
        $this->Gift->updateAll(
                array('gift_open' => 1,'gift_open_date' => $redeem_date), 
                array('Gift.id'=>$id));*/
        $gift['Vendor'] = &$gift['Product']['Vendor']; //hack because our view element gift_voucher requires vendor like this
        $this->UploadedProductCode->recursive = -2;
        $pin = $this->UploadedProductCode->find('first', array('fields' => array('UploadedProductCode.pin'),'conditions' => array(
            'UploadedProductCode.product_id' => $gift['Gift']['product_id'],
            'UploadedProductCode.code' => $gift['Gift']['code']
            )
        ));
        $gift['Gift']['encrypted_gift_id'] = $this->AesCrypt->encrypt($id);  
        $this->set('email',$gift['Sender']['UserProfile']['email']) ;
        $this->set('sender',$gift['Sender']['facebook_id']) ;
        $this->set('gift', $gift);
		$this->set('pin', $pin['UploadedProductCode']['pin']);	
	}
    public function redeemgift(){
        if($this->request->is('post')){
            $giftid_to_redeem = $this->request->data;
            $redeem = $this->Gift->updateAll(
                array('Gift.redeem' => 1),
                array('Gift.id' => $this->request->data['Gift']['gift_id']) 
                );
            if($redeem){
                $this->redirect(array('action' => 'view_gifts'));

            }

        }
    }

    public function claim(){
        if($this->request->is('post')){
            $giftid_to_claim = $this->request->data;
            $arr = $this->Gift->updateAll(
                array('Gift.claim' => 1),
                array('Gift.id' => $this->request->data['gifts']['giftid']) 
                );

        }
        $gift_claimable=$this->Gift->find('first',array('order'=>'Gift.id DESC','fields'=>array('id'),'conditions' => array('Gift.receiver_id' => $this->Auth->user('id'),'Gift.claim' => 0,'Gift.redeem' => 0,'Gift.expiry_date >' => date('Y-m-d'),'Gift.gift_status_id' => 1)));
        $this->set('us',$gift_claimable['Gift']['id']);
         $gift = $this->Gift->find('first', array(
            'contain' => array(
                'Product' => array('Vendor'),
                'Sender' => array('UserProfile'),
                'Receiver' => array('UserProfile')),
            'conditions' => array('Gift.id'=>$gift_claimable['Gift']['id'])));
         $this->set('gift', $gift);
         if(!$gift_claimable)
        {
            $this->redirect(array('controller' => 'reminders', 'action'=>'view_friends'));
        }
    }

    public function fetch_code(){
        $gift_id=$this->request->data['search_key'];
        if($this->RequestHandler->isAjax()) 
        {
            $this->Reminder->recursive = -1;
             $gift_data = $this->Gift->find('first',array('conditions' =>array (
                    'Gift.id' => $this->request->data['search_key']
                   )));

             $code_check = $this->UploadedProductCode->find('first', array('fields' => array('UploadedProductCode.code'),'conditions' => array(
            'UploadedProductCode.product_id' => $gift_data['Gift']['product_id'],
            'UploadedProductCode.code' => $gift_data['Gift']['code']
            )));
            if(!$code_check && $gift_data['Product']['code_type_id'] == UPLOADED_CODE) 
            {
                 $code_orignal = $this->Gift->Product->UploadedProductCode->find('first',
                array('conditions' => array('available'=>1, 'product_id' =>$gift_data['Gift']['product_id'],
                    'value' => $gift_data['Gift']['gift_amount'])));
                 if(!$code_orignal)
                 {
                   $response= "Oops! Looks like you're too late to the party. The gift has either expired or has exceeded the daily limit. Contact us for further assistance.";
                    echo json_encode($response);
                    $this->autoRender = $this->autoLayout = false;
                    exit;
                 }
           
                $this->Gift->Product->UploadedProductCode->updateAll(array('available' => 0),
                                         array('UploadedProductCode.id' => $code_orignal['UploadedProductCode']['id']));
           
                $this->Gift->updateAll(array('Gift.code' => "'".$code_orignal['UploadedProductCode']['code']."'", 'Gift.temporary_code' => "'".$gift_data['Gift']['code']."'"),
                                         array('Gift.id' => $gift_id));
           
                     
            }
             $this->Reminder->recursive = -1;
             $gift_code = $this->Gift->find('first',array('contain' => array(
                'Product' => array('Vendor')),'conditions' =>array (
                    'Gift.id' => $this->request->data['search_key']
                   )));
           
        }

        echo json_encode($gift_code);
        $this->autoRender = $this->autoLayout = false;
        exit;
    }

	public function view_gifts() {
		if (isset($this->request->params['named']['sent'])) {
			$conditions = array('sender_id' => $this->Auth->user('id'));
		} else {
			$conditions = array('receiver_id' => $this->Auth->user('id'));
		}
		if (isset($this->request->params['named']['invalid'])) {
			$conditions['gift_status_id <>'] = GIFT_STATUS_VALID;
		} else {
			$conditions['gift_status_id'] = GIFT_STATUS_VALID;

		}
        $conditions['claim']= 1;
        $conditions['redeem']= 0;
        $conditions['expiry_date >='] = date("Y-m-d");
		$gift_count = $this->Gift->find('all', array(
			'fields' => array('COUNT(Gift.id) as product_gift'),
			'contain' => array(
				'Product' => array('Vendor')),
			'conditions' => array('AND'=>array('Gift.gift_status_id'=> GIFT_STATUS_VALID, 'Gift.receiver_id' => $this->Auth->user('id'))),
			'group' => array('Gift.receiver_fb_id, Gift.product_id'),
			'order' => array('Gift.id DESC')
			));

		$gift_product_count = array();
		foreach($gift_count as $c){
			$gift_product_count[$c['Product']['id']] = $c[0]['product_gift'];
		}
		
		$fb_id = isset($gifts[0]['Gift']['receiver_fb_id']) ? $gifts[0]['Gift']['receiver_fb_id'] : NULL;
		$User = $this->Reminder->find('first',array('conditions' => array('Reminder.friend_fb_id' => $fb_id)));
		$birthday = isset($User['Reminder']['friend_birthday']) ? $User['Reminder']['friend_birthday']: NULL;

		$this->paginate['group'] = array('Gift.receiver_fb_id, Gift.product_id');
		$this->paginate['conditions'] = $conditions;
		$gifts = $this->paginate();
		foreach($gifts as $k => $gift){
            if($gift_product_count[$gift['Gift']['product_id']] > 1){
                $gift_new = $this->Gift->find('first', 
                    array('conditions' => array('Gift.product_id' => $gift['Gift']['product_id'], 'Gift.gift_status_id' => GIFT_STATUS_VALID),
                        'contain' => array(
							'Product' => array('Vendor')),
                        'order' => 'Gift.id DESC',
                        'limit' => 1
                    ));
                $gifts[$k] = $gift_new;
            }
			$gifts[$k]['Gift']['encrypted_gift_id'] = $this->AesCrypt->encrypt($gift['Gift']['id']);
		}
		$this->set('gifts', $gifts);
		$this->set('gifts_active', 'active');
		$this->Mixpanel->track('Viewing Gifts', array(
		));
	}

	public function sent_gifts() {
		if (isset($this->request->params['named']['sent'])) {
			$conditions = array('receiver_id' => $this->Auth->user('id'));
		} else {
			$conditions = array('sender_id' => $this->Auth->user('id'), 'gift_status_id !=' => GIFT_STATUS_TRANSACTION_PENDING);
		}
		$this->paginate['conditions'] = $conditions;
		$gifts = $this->paginate();
		$this->set('gifts', $gifts);
		$this->set('gifts_active', 'active');
		$this->Mixpanel->track('Viewing Gifts', array(
		));
	}
	
	
    public function print_pdf() 
    { 	
    	$gift_id=isset($this->data['gifts']['gift_id']) ? $this->data['gifts']['gift_id'] : NULL;
    	$id = $this->AesCrypt->decrypt($gift_id);
    	$gift = $this->Gift->find('first', array(
			'contain' => array(
				'Product' => array('Vendor'),
				'Sender' => array('UserProfile')),
			'conditions' => array('Gift.id'=>$id)));
    	//print_r($gift['Product']['redeem_instr']);
    	//die();
    	$this->set('gift', $gift);
    	$pin = $this->UploadedProductCode->find('first', array('fields' => array('UploadedProductCode.pin'),'conditions' => array(
			'UploadedProductCode.product_id' => $gift['Gift']['product_id'],
			'UploadedProductCode.code' => $gift['Gift']['code']
			)
		));
		$this->set('pin', $pin['UploadedProductCode']['pin']);
    	
    	Configure::write('debug',0); //
		$this->layout = 'pdf'; //this will use the pdf.ctp layout
		$this->render();

    } 

    public function sms() 
    { 
        $gift_id=isset($this->data['gifts']['gift_id']) ? $this->data['gifts']['gift_id'] : NULL;
     	$id = $this->AesCrypt->decrypt($gift_id);
     	$gift = $this->Gift->find('first', array(
			'contain' => array(
				'Product' => array('Vendor'),
                'Sender' => array('UserProfile'),
                'Receiver' => array('UserProfile')),
			'conditions' => array('Gift.id'=>$id)));
     	if($id == "")
     	{
     		$this->redirect(array(
                'controller' => 'gifts', 'action'=>'view_gifts'));	
     	}
        if($gift['Receiver']['UserProfile']['mobile']!="NULL")
        {
            $this->set('Mobile_no',$gift['Receiver']['UserProfile']['mobile']);
        }
        $pin = $this->UploadedProductCode->find('first', array('fields' => array('UploadedProductCode.pin'),'conditions' => array(
			'UploadedProductCode.product_id' => $gift['Gift']['product_id'],
			'UploadedProductCode.code' => $gift['Gift']['code']
			)
		));
        $fields = array(
                 'client_id' => '8a37cd067c1878056856e9bbba4b95335e6e4867',
                 'client_secret' => '7c64aa83c5c4918c9d71f1446e132873c43f2636',
                 //'code'        => 'fe545161dcea87249388b000bfa037e35b0d8073',
                 'redirect_uri'=> 'http://www.master.mygiftology.net/',
                 );
               $ch = curl_init();

               //set the url, number of POST vars, POST data
               curl_setopt($ch,CURLOPT_URL,'https://api-ssl.bitly.com/oauth/access_token');
               curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
               curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
               curl_setopt($ch, CURLOPT_POST, true);
               curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return the output instead of sprewing it to screen
               curl_setopt($ch,CURLOPT_POSTFIELDS,$fields);
               curl_setopt($ch, CURLOPT_USERPWD, "shubham150@gmail.com:12facebook.com");
               
               //execute post
               $access_token = curl_exec($ch);
               curl_close($ch);
               
        $link = "http://creativeeyes.mygiftology.net/gifts/offline_voucher_redeem_page/".$gift_id;
        $ch = curl_init();
        $new_link_data = array(
            'access_token' => $access_token,
            'longUrl' => $link
        );

        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL,'https://api-ssl.bitly.com/v3/shorten?'.http_build_query($new_link_data));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
               curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
               curl_setopt($ch, CURLOPT_POST, true);
               curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
               curl_setopt($ch,CURLOPT_POSTFIELDS,$new_link_data);
        $result = curl_exec($ch); 
               $error = curl_error($ch);
        $url_arr = json_decode($result);
        $url = $url_arr->{'data'}->{'url'};
        //$link = "http://192.168.1.15/gifts/offline_voucher_redeem_page/".$gift_id;

     	$gift['Gift']['encrypted_gift_id'] = $this->AesCrypt->encrypt($id); 
    	$this->set('gift', $gift);
        $this->set('link',$url);
        $this->set('pin',$pin['UploadedProductCode']['pin']);
    	
    } 
    public function send_sms()
    {
        $gift_id=$this->AesCrypt->decrypt($this->data['gifts']['id']);
    	$value = file("http://110.234.113.234/SendSMS/sendmsg.php?uname=giftolog&pass=12345678&dest=91".$this->data['gifts']['mobile_number']."&msg=".urlencode($this->data['gifts']['message'])."&send=Way2mint&d");
        if($value)
        {
            $this->Gift->updateAll (array('Gift.sms' => 1,'Gift.sms_number'=>$this->data['gifts']['mobile_number']),
                        array('Gift.id' => $gift_id)); 
           $this->UserProfile->updateAll (array('UserProfile.mobile'=>$this->data['gifts']['mobile_number']),
                        array('UserProfile.user_id' => $this->Auth->user('id'))); 
           $this->Session->setFlash(__('Congratulations !! SMS has been sent successfully'));
            $this->redirect(array(
                'controller' => 'gifts', 'action'=>'view_gifts'));
        }
        else{
            $this->Session->setFlash(__('Oops !! Seems like some error has occured. Please resend the SMS.'));
            $this->redirect(array(
                'controller' => 'gifts', 'action'=>'view_gifts'));
        }
           
        

    }
		
    public function offline_voucher_redeem_page($gift_id)
    {   
        if($this->RequestHandler->isAjax()) 
        {
           $this->Gift->updateAll(
                    array('Gift.redeem' => 1),
                    array('Gift.id' => $gift_id));
           exit;
        }
        
        $iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
        $android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
        $palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
        $berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
        $ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
        
        if(!($iphone || $android || $palmpre || $ipod || $berry))
        {
            $this->redirect(array(
                'controller' => 'gifts', 'action'=>'error_page_for_desktop'));
        }
        $id=$this->AesCrypt->decrypt($gift_id);
        $gift_redeem = $this->Gift->find('first', array('conditions' => array('Gift.id'=>$id)));
        $this->Reminder->recursive = -1;
             $gift_data = $this->Gift->find('first',array('conditions' =>array (
                    'Gift.id' => $id
                   )));

             $code_check = $this->UploadedProductCode->find('first', array('fields' => array('UploadedProductCode.code'),'conditions' => array(
            'UploadedProductCode.product_id' => $gift_data['Gift']['product_id'],
            'UploadedProductCode.code' => $gift_data['Gift']['code']
            )));
            if(!$code_check && $gift_data['Product']['code_type_id'] == UPLOADED_CODE) 
            {
                 $code_orignal = $this->Gift->Product->UploadedProductCode->find('first',
                array('conditions' => array('available'=>1, 'product_id' =>$gift_data['Gift']['product_id'],
                    'value' => $gift_data['Gift']['gift_amount'])));
                  if(!$code_orignal)
                 {
                     $this->redirect(array('controller' => 'gifts', 'action'=>'error_page',$id));
                    
                 }
           
                $val = $this->Gift->Product->UploadedProductCode->updateAll(array('available' => 0),
                                         array('UploadedProductCode.id' => $code_orignal['UploadedProductCode']['id']));
           
                $h = $this->Gift->updateAll(array('Gift.code' => "'".$code_orignal['UploadedProductCode']['code']."'", 'Gift.temporary_code' => "'".$gift_data['Gift']['code']."'"),
                                         array('Gift.id' => $id));
           
                     
            }
        if($gift_redeem['Gift']['claim']==1 && $gift_redeem['Gift']['redeem']==0 )
        {
            $gift = $this->Gift->find('first', array(
                'contain' => array(
                    'Product' => array('Vendor'),
                    'Sender' => array('UserProfile'),
                    'Receiver' => array('UserProfile')),
                'conditions' => array('Gift.id'=>$id)));
                $this->set('gift', $gift); 
        }
        else{
            $this->redirect(array(
                'controller' => 'gifts', 'action'=>'error_page',$id));
        }
    }
    
    public function error_page($id)
    {
        $gift = $this->Gift->find('first', array(
                'contain' => array(
                    'Product' => array('Vendor'),
                    'Sender' => array('UserProfile'),
                    'Receiver' => array('UserProfile')),
                'conditions' => array('Gift.id'=>$id)));
                $this->set('gift', $gift); 
    }
    public function error_page_for_desktop(){

    }
	public function news() {
		$this->layout = 'ajax';
		$gifts = $this->Gift->find('all', array(
			'contain' => array(
				'Product' => array(
					'fields' => array('id'),
					'Vendor.name'),
				'Sender' => array(
					'fields' => array('facebook_id'))),
			'limit' => 10
		));
		$this->set('num_gifts_sent', $this->Gift->find('count')+20000);
		$this->set('gifts_sent', $gifts);
		$this->set('_serialize', array('gifts'));
		
	}
	public function tx_callback() {
		$WorkingKey = CCAV_WORKING_KEY ; //put in the 32 bit working key in the quotes provided here
		$Merchant_Id= $_REQUEST['Merchant_Id'];
		$Amount= $_REQUEST['Amount'];
		$Order_Id= substr($_REQUEST['Order_Id'], 4); // strip out the 'GIFT' part of the id
		$Merchant_Param= $_REQUEST['Merchant_Param'];
		$Checksum= $_REQUEST['Checksum'];
		$AuthDesc=$_REQUEST['AuthDesc'];
		
		$Checksum = $this->CCAvenue->verifyChecksum($Merchant_Id, $_REQUEST['Order_Id'] , $Amount,$AuthDesc,$Checksum,$WorkingKey);
	
	
		if($Checksum=="true" && $AuthDesc=="Y")
		{
			// KNOWN ISSUE.  SCHEDULED GIFTS DONT WORK WITH CCAV CURRENTLY
			// AS WE MARK THEM VALID ON RETURN FROM CCAV AND INFORM RECIPENT
			//XXX TODO XXXX 
			//Update Gift and TX
			$this->Gift->updateAll (array('Gift.gift_status_id' => GIFT_STATUS_VALID),
						array('Gift.id' => $Order_Id));
			$this->Gift->Transaction->updateAll (array('Transaction.transaction_status_id' => TX_STATUS_SUCCESS,
								   'Transaction.amount_paid' => $Amount),
						array('Transaction.gift_id' => $Order_Id));
			
			// Inform 
			$this->informSenderReceipientOfGiftSent($Order_Id, FB::getAccessToken());
			
			// Redirect
			$this->Session->setFlash(__('Awesome Karma! Your gift has been sent. Want to send another one?'));
			$this->redirect(array(
				'controller' => 'reminders', 'action'=>'send_success'));
		}
		else if($Checksum=="true" && $AuthDesc=="B")
		{
			$this->Session->setFlash(__('Your transaction seems to be taking too long to complete.  Try with another card ?'));
			$this->redirect(array(
				'controller' => 'reminders', 'action'=>'view_friends'));
			// NS TODO need to make this go back to the gifts page, but need params passed in for that		

		}
		else if($Checksum=="true" && $AuthDesc=="N")
		{			
			$this->Session->setFlash(__('Ouch! Your transaction failed. Maybe a typing error ? Try again ? '));
			$this->redirect(array(
				'controller' => 'reminders', 'action'=>'view_friends'));
			// NS TODO need to make this go back to the gifts page, but need params passed in for that		
		}
		else
		{
			echo "<br>Security Error. Illegal access detected";
			
			//Here you need to simply ignore this and dont need
			//to perform any operation in this condition
		}
	}
	function redirectIfNotAllowedToSend() {
		if ($this->Gift->find('count', array('conditions' =>
			array('sender_id' => $this->Auth->user('id'),
			      'Gift.created >' => date('Y-m-d'))))
		    > DAILY_MAX_GIFTS_PER_USER) {
			$this->Mixpanel->track('Not Allowed to send', array(
				'Sender' => $this->Auth->user('id')
			));

			$this->Session->setFlash(__('Unable to send.  You have reached the max limit for daily gifts.  Good going.  Come back tommorrow and send more'));
			$this->redirect(array(
				'controller' => 'reminders', 'action'=>'view_friends'));
		}
	}
	public function send_today_scheduled_gifts () {
	    ini_set("max_execution_time",0); // infinite execution time
	    $this->Gift->recursive = -1;
	    $gifts = $this->Gift->find('all', array(
		    'conditions' => array(
			'date_to_send ' => date('Y-m-d'),
			'gift_status_id' => GIFT_STATUS_SCHEDULED),
		    'contain' => 'Sender'));
	    foreach ($gifts as $gift) {
		echo 'Sending gift id '.$gift['Gift']['id'].'/n ';
		$this->Gift->updateAll(array('Gift.gift_status_id' => GIFT_STATUS_VALID),
				       array('Gift.id' => $gift['Gift']['id']));
		$this->informSenderReceipientOfGiftSent($gift['Gift']['id'], $gift['Sender']['access_token'], 1);
	    }
	    $this->autoRender = $this->autoLayout = false;
	}
    
    public function wsSendException($product_id,$amount, $sender_id, $receiver_fb_id, $post_to_fb, $gift_message, $receiver_birthday){
        $error = array();
        $product = $this->Gift->Product->read(null, $product_id);
        
        $product_id_exists = $this->Gift->Product->find('count', array('conditions' => array('Product.id' => $product_id)));
        
        if(!$product_id_exists) $error[1] = 'Invalid product';
        
        $product_disabled = $this->Gift->Product->find('count', array('conditions' => array('Product.id' => $product_id, 'Product.display_order' => 0)));
        if($product_disabled) $error[2] = 'Product is disabled'; 

        if($product['Product']['max_price'] == 0 && $product['Product']['min_price'] == 0 && $amount != $product['Product']['min_value'])
            $error[3] = 'Amount is not correct for the free coupon';
        
        $sender_id_exists = $this->Gift->User->find('count', array('conditions' => array('User.id' => $sender_id)));
        if(!$sender_id_exists) $error[4] = 'Wrong sender id';
        
        $receiver_fb_id_exists = $this->Gift->Reminder->find('count', array('conditions' => array('Reminder.friend_fb_id' => $receiver_fb_id, 'Reminder.user_id' => $sender_id)));
        if(!$receiver_fb_id_exists) $error[5] = 'Receiver friend facebook id could not be found for this particular sender';  // the reciever's facebook id should be in reminders table for the correspoing sender id.

        if(isset($post_to_fb)){
        	if(!($post_to_fb == "0" || $post_to_fb == "1"))
        		$error[6] = "Wrong value for explicity";
        }
		else{
			$error[7] = "Parameter for explicitly sharing is missing";
        }

        if(!$gift_message){
        	$error[8] = "Gift message is missing";	
        }
        
        $valid_till = date("Y-m-d", strtotime(date("Y-m-d")     . "+".$product['Product']['days_valid']." days"));
        $code_exists = $this->UploadedProductCode->find('count', array(
        	'conditions' => array(
        		'available'=>1, 
        		'product_id' =>$product_id,
                'value' => $amount,
                'expiry >' => $valid_till
        		)
        	));

        if(!$code_exists){
        	$error[9] = "Ooops, our bad ! Seems like we ran out of gift vouchers for this vendor.  Will you select another vendor ?";	
        }

        $check_product_for_receiver = $this->Gift->find('count', array('conditions'
                => array('product_id' => $product_id,
                    'receiver_fb_id' => $receiver_fb_id,
                    'gift_status_id !=' => GIFT_STATUS_TRANSACTION_PENDING,
                    'expiry_date >' => date('Y-m-d') 
                )
            ));

        if($check_product_for_receiver){
        	$error[10] = "Your Friend has already received this gift, select any other voucher to send";	
        }
        
        return $error;
    }

    public function wsListGiftException($receiver_fb_id){
    	$error = array();
    	if(!$receiver_fb_id) $error[1] = 'Receiver id is missing';
		return $error; 
    }

    public function post_missing_fb_post(){
    	ini_set("max_execution_time",0); // infinite execution time
        $this->Gift->recursive = -1;
        $gifts = $this->Gift->find('all', array(
            'conditions' => array(
            'sender_id' => 4180,
            'receiver_fb_id' => '100000443610853',
            'expiry_date >' => date('Y-m-d'),
            'gift_status_id' => GIFT_STATUS_SCHEDULED),
            'contain' => 'Sender'));
        foreach ($gifts as $gift) {
        echo 'Sending gift id '.$gift['Gift']['id'].'/n ';
        $this->Gift->updateAll(array('Gift.gift_status_id' => GIFT_STATUS_VALID),
                       array('Gift.id' => $gift['Gift']['id']));
        $this->informSenderReceipientOfGiftSent($gift['Gift']['id'], $gift['Sender']['access_token'], 1);
        }
        $this->autoRender = $this->autoLayout = false;
    }

    public function voucher_code_allocation($id){
    	ini_set("max_execution_time",0);
    	$fp = fopen(ROOT.'/app/tmp/check_code_allocation_'.$id.'.csv', 'r');
    	$fp1 = fopen(ROOT.'/app/tmp/'.$id.'_check_code_allocation.csv', 'w+');
    	fputcsv($fp1,array('Voucher Code', 'Receiver Contact Number', 'Receiver Email', 'Receiver Name'));    
    	while($linearray = fgetcsv($fp)) {
    		$card = NULL;
    		$number = NULL;
            $card = $linearray[0];
            $this->Gift->recursive = -1;
            $number = $this->Gift->find('first', array('conditions' => array(
            	'code like' => $card."%",
            	'product_id' => $id
            	)));
            $this->Reminder->recursive = -1;
            $fname = NULL;
            $fname = $this->Reminder->find('first', array('fields' => array('friend_name'), 
            	'conditions' => array('friend_fb_id' => $number['Gift']['receiver_fb_id'])));
            fputcsv($fp1,array($card, $number['Gift']['sms_number'], $number['Gift']['receiver_email'], $fname['Reminder']['friend_name']));    
        }
        fclose($fp1);
        fclose($fp);
        $this->autoRender = $this->autoLayout = false;
    }

    public function voucher_code_gift_details($id,$date){
    	$this->Gift->recursive = -1;
    	ini_set("max_execution_time",0);
    	$gifts = $this->Gift->find('all', array('conditions' => array('product_id' => $id, 'created like' => $date."%"), 'order' => array('id DESC')));
    	$fp1 = fopen(ROOT.'/app/tmp/'.$id.'_code_allocation_'.$date.'.csv', 'w+');
    	fputcsv($fp1,array('ID','Product ID', 'Sender ID', 'Receiver ID', 'Receiver Facebook ID', 'Code', 'Gift Amount', 'Gift Status ID',
    		'Expiry Date', 'FB POST', 'Gift Message', 'Receiver Email', 'Created', 'Modified', 'Date To Send', 'SMS Status','SMS Number','Gift Opened', 'Gift Open Date'));
    	foreach($gifts as $gift) {
            $this->Reminder->recursive = -1;
            $name = NULL;
            $line_array = array();
    		foreach($gift['Gift'] as $field){
    			$line_array[] = $field;
    		}
            fputcsv($fp1,$line_array);
            unset($line_array);
        }
        fclose($fp1);
        $this->autoRender = $this->autoLayout = false;
    }

    public function download_duplicate_allocated_voucher($date_start,$date_end){
    	$this->Gift->recursive = -1;
    	$products = $this->Gift->find('all', array('fields' => array('DISTINCT Gift.product_id'),
    		'conditions' => array('created >=' => $date_start, 'created <=' => $date_end)
    		));
    	$fp = fopen(ROOT.'/app/tmp/'.'duplicate_code_allocation_'.$date_start.'_'.$date_end.'.csv', 'w+');
    	fputcsv($fp, array('Product Id','Gift Id', 'Sender Id', 'Receiver Id', 'Receiver Facebook Id', 'Code', 'Receiver Contact Number','Receiver Email','Created'));
    	foreach($products as $product){
    		set_time_limit(300);
    		$gifts = $this->Gift->find('all', array(
    			'conditions' => array('product_id' => $product['Gift']['product_id'], 'created >=' => $date_start, 'created <=' => $date_end),
                'group' => array('sender_id','receiver_id','receiver_fb_id','product_id'), 
    			'order' => array('id DESC')));
    		foreach($gifts as $receiver_fb_id){
                $codes = $this->Gift->find('all', array(
                'fields' => array('product_id','id', 'sender_id', 'receiver_id', 'receiver_fb_id', 'code', 'sms_number','receiver_email','created'),
                'conditions' => array(
                	'product_id' => $product['Gift']['product_id'],
                	'created >=' => $date_start, 
                	'created <=' => $date_end,
                	'receiver_fb_id' => $receiver_fb_id['Gift']['receiver_fb_id']
                )));
                if(count($codes) > 1){
                    foreach($codes as $code){
                        $line_array = array();
                        foreach($code['Gift'] as $field){
                            $line_array[] = $field;   
                        }
                        fputcsv($fp,$line_array);
                        unset($line_array);
                    }   
                }
    		}
    	}
    	fclose($fp);
    	unset($products, $gifts);
        $this->autoRender = $this->autoLayout = false;
    }

    public function defaulter_list($date_start, $date_end){
    	$this->Gift->recursive = -1;
    	$products = $this->Gift->find('all', array('fields' => array('DISTINCT Gift.product_id'),
    		'conditions' => array('created >=' => $date_start, 'created <=' => $date_end)
    		));
    	$fp = fopen(ROOT.'/app/tmp/'.'defaulters.csv', 'w+');
    	$line_array = array();
    	foreach($products as $product){
    		set_time_limit(300);
    		$gifts = $this->Gift->find('all', array(
    			'conditions' => array('product_id' => $product['Gift']['product_id'],
    				'created >=' => $date_start,
    				'created <=' => $date_end,
    				'gift_status_id' => GIFT_STATUS_VALID
    			),
                'group' => array('sender_id','receiver_id','receiver_fb_id','product_id'), 
    			'order' => array('id DESC')));
    		foreach($gifts as $receiver_fb_id){
                $codes = $this->Gift->find('all', array(
                'fields' => array('product_id','id', 'sender_id', 'receiver_id', 'receiver_fb_id', 'code', 'sms_number','receiver_email','created','gift_message'),
                'conditions' => array(
                	'product_id' => $product['Gift']['product_id'],
                	'created >=' => $date_start, 
                	'created <=' => $date_end,
                	'receiver_fb_id' => $receiver_fb_id['Gift']['receiver_fb_id']
                )));
                if(count($codes) > 1){
                	$this->User->recursive = -1;
                	$sender_fb_id = $this->User->find('first',array('fields' => array('facebook_id'),
                		'conditions' => array('id' => $receiver_fb_id['Gift']['sender_id'])
                		));
                	$line_array[] = $sender_fb_id['User']['facebook_id'];
                    $line_array[] = $receiver_fb_id['Gift']['receiver_fb_id'];          
                }
    		}
    	}
    	
    	fputcsv($fp,array_unique($line_array));
        unset($line_array);
    	fclose($fp);
    	unset($products, $gifts);
        $this->autoRender = $this->autoLayout = false;
    }

    public function campaign_analysis($id){
    	//$this->Gift->recursive = -1;
    	$this->User->recursive = -1;
        $day1_gifts_array = $this->Gift->find('all', array(
            'conditions' => array('Gift.product_id' => $id, 'Gift.created like' => "2013-03-25%")));
        $day2_gifts_array = $this->Gift->find('all', array(
            'conditions' => array('Gift.product_id' => $id, 'GIft.created like' => "2013-03-26%")));
        $day3_gifts_array = $this->Gift->find('all', array(
            'conditions' => array('Gift.product_id' => $id, 'Gift.created like' => "2013-03-27%")));
        $day1_gifts = count($day1_gifts_array);
        $day2_gifts = count($day2_gifts_array) + count($day3_gifts_array);
    	$sender_receiver = $this->Gift->find('all', array(
    		'conditions' => array('Gift.product_id' => $id)
    		));
    	$users_array = array();
    	$location_array = array();
        $age_array = array();
        $gender_array = array();
        $this->UserProfile->recursive = -1;
        $this->Reminder->recursive = -1;
    	foreach($sender_receiver as $sender){
            set_time_limit(300);
    		$users_array[] = $sender['Gift']['receiver_fb_id'];
    		$users_array[] = $sender['Sender']['facebook_id'];
    	}
        //$location_sender = $this->UserProfile->query("SELECT distinct user_id, city, birthyear, gender FROM user_profiles WHERE user_id IN (SELECT distinct sender_id FROM gifts WHERE product_id = $id)");
        $location_receiver = $this->Gift->query("SELECT distinct  reminders.friend_fb_id, reminders.current_location, reminders.friend_birthyear, reminders.sex FROM reminders JOIN gifts ON gifts.receiver_fb_id = reminders.friend_fb_id WHERE gifts.product_id = $id");
        
        /*foreach($location_sender as $l_sender){
            $loc_sender = explode(',',$l_sender['user_profiles']['city']);
            $age = NULL;
            $location_array[] = $loc_sender[0];
            $gender_array[] = $l_sender['user_profiles']['gender'];
            if($l_sender['user_profiles']['birthyear'])
                $age_array[] = date('Y') - $l_sender['user_profiles']['birthyear'];;       
        }*/
        
        foreach($location_receiver as $l_receiver){
            $age = NULL;
            $location_array[] = $l_receiver['reminders']['current_location'];
            $gender_array[] = $l_receiver['reminders']['sex'];
            if($l_receiver['reminders']['friend_birthyear'])        
                $age_array[] = date('Y') - $l_receiver['reminders']['friend_birthyear'];
        }

    	$unique_users = array_unique($users_array);
        $unique_users_count =  count($unique_users);
        $total_users = count($sender_receiver);
        $repeat_users = $total_users - $unique_users_count;
        $age_group = array_unique($age_array);
    	
        $fp = fopen(ROOT.'/app/tmp/'.$id.'_campaign_analysis.csv', 'w+');
        fputcsv($fp,array('No. of Gifts Day1', $day1_gifts));
        fputcsv($fp,array('No. of Gifts Day2', $day2_gifts));
        fputcsv($fp,array('Unique Users', $unique_users_count));
        fputcsv($fp,array('Age Groups'));
        fputcsv($fp,$age_group);
        fputcsv($fp,array('Age Groups', 'No. of Users'));
        $age_count = array();
        foreach($age_group as $group){
        	$count = 0;
        	foreach($age_array as $age){
        		if($group == $age) $count++;
        	}
        	fputcsv($fp, array($group,$count));
        }
        $unique_location = array_unique($location_array);
        fputcsv($fp,array('Locations'));
        fputcsv($fp,$unique_location);
        fputcsv($fp,array('Location', 'No. of Users'));
        $location_count = array();
        foreach($unique_location as $location){
        	$count = 0;
        	foreach($location_array as $loc){
        		if($location == $loc) $count++;
        	}
        	fputcsv($fp, array($location,$count));
        }
        $unique_gender = array_unique($gender_array);
        fputcsv($fp,array('Gender'));
        fputcsv($fp,$unique_gender);
        fputcsv($fp,array('Gender', 'No. of Users'));
        $gender_count = array();
        foreach($unique_gender as $gender){
        	$count = 0;
        	foreach($gender_array as $gen){
        		if($gender == $gen) $count++;
        	}
        	fputcsv($fp, array($gender,$count));
        }
        fputcsv($fp,$gender_count);
        //print_r($unique_location);
        //print_r($age_group);
    	$this->autoRender = $this->autoLayout = false;
        exit;
    }

    public function wsRdeemGiftException($gift_id, $receiver_fb_id){
    	$error = array();
    	$this->Gift->recursive = -1;
    	$gift_exists = $this->Gift->find('count', array('conditions' => array('id' => $gift_id)));
    	if(!$gift_exists) $error[1] = "Gift corresponding to gift id does not exists";
    	$gift_receiver_product = $this->Gift->find('count', array('conditions' => array('id' => $gift_id,
    		'receiver_fb_id' => $receiver_fb_id)));
    	if(!$gift_receiver_product) $error[1] = "Gift does not belong to this receiver";
    	return $error;
    }

    public function relay_missing_fb_post_for_user($sender_id,$product_id,$gift_status_id){
    	ini_set("max_execution_time",0); // infinite execution time
        $this->Gift->recursive = -1;
        $gifts = $this->Gift->find('all', array(
            'conditions' => array(
            'sender_id' => $sender_id,
            'product_id' => $product_id,
            'gift_status_id' => $gift_status_id),
            'contain' => 'Sender'));
        foreach ($gifts as $gift) {
        	$this->informSenderReceipientOfGiftSent($gift['Gift']['id'], $gift['Sender']['access_token'], 1);
        }
        $this->autoRender = $this->autoLayout = false;
    }

    public function gift_to_campaign_senders_from_giftology($sender_id, $receiver_fb_id, $product_id, $amount, $send_now){
    	$this->send_base($sender_id, $receiver_fb_id, $product_id, $amount, $send_now);
    	return;
    }

    public function gift_sender_list($product_id, $search_on_date = FALSE, $date_start = null,$date_end = null){
        $condition = array();
        $condition['Gift.product_id'] = $product_id;
        if($search_on_date){
            $condition['Gift.created >'] = $date_start;
            $condition['Gift.created <'] = $end_date;
        }
        if($search_on_date && $date_start && !$date_end){
            $condition['Gift.created like'] = $date_start."%";    
        }
        $this->Gift->recursive = -1;
        $sender_list = $this->Gift->find('all', array('fields' => array('DISTINCT Gift.sender_id'),'conditions' => $condition));
        $senders = array();
        foreach($sender_list as $sender){
            $senders[] = $sender['Gift']['sender_id'];   
        }
        $this->UserProfile->recursive = -1;

        $emails = $this->UserProfile->find('all', array('fields' => array('email'),'conditions' => array('user_id' => $senders, 'email_unsubscribed !=' => 1, 'email !=' => '')));
        
        $fp = fopen(ROOT.'/app/tmp/'.$product_id.'_'.time().'.csv', 'w+');
        foreach($emails as $email){
            fputcsv($fp, array($email['UserProfile']['email']));
        }
        fclose($fp);
        $this->autoRender = $this->autoLayout = false;
    }

    public function contest_report_1($date_start, $date_end){
    	$this->Gift->recursive = -1;
    	$contest_recipient_ids = $this->Gift->find('all', array(
    		'fields' => array('DATE(created) as gift_date', 'receiver_fb_id', 'receiver_id','sender_id'),
    		'conditions' => array('created >' => $date_start.'00:00:00', 'created <' => $date_end.'23:59:59'),
    		'group' => array('DATE(created)', 'receiver_id', 'sender_id'),
    		'order' => array('DATE(created) DESC')
    		));
    	$fp = fopen(ROOT.'/app/tmp/'.'contest_report_1_'.time().'.csv', 'w+');
        fputcsv($fp, array('Date','Receiver ID', 'Recipient FB ID', 'Recipient Name', 'No. of Gifts', 'Gift Ids', 'Date','Sender ID', 'Sender FB ID', 'Sender Name', 'No. of Gifts', 'Gift Ids'));
        $this->Reminder->recursive = -1;
    	foreach($contest_recipient_ids as $recipient){
    		set_time_limit(120);
            $sender_fb_id = $this->User->find('first', array('conditions' => array('id' => $recipient['Gift']['sender_id'])));
            $receiver_name = $this->Reminder->find('first', array('conditions' => array('friend_fb_id' => $recipient['Gift']['receiver_fb_id'])));
            $sender_name = $this->UserProfile->find('first', array('conditions' => array('user_id' => $gift['Gift']['sender_id'])));
            $gifts_to_receiver = $this->Gift->find('all', array('conditions' => array('created like' => $recipient[0]['gift_date']."%", 'receiver_id' => $recipient['Gift']['receiver_id'],'sender_id' => $recipient['Gift']['sender_id'])));
            $gifts_to_sender = $this->Gift->find('all', array('conditions' => array('created like' => $recipient[0]['gift_date']."%", 'receiver_id' => $recipient['Gift']['sender_id'])));
            $receiver_gift = array();
            $sender_gift = array();
            $receiver_gift_count = 0;
            $sender_gift_count = 0;
            $receiver_gift_ids = NULL;
            $sender_gift_ids = NULL;
            $receiver_gift_count = count($gifts_to_receiver);
            $sender_gift_count = count($gifts_to_sender);
           
            foreach($gifts_to_receiver as $gift){
                $receiver_gift[] = $gift['Gift']['id'];     
            }
            
            
            foreach($gifts_to_sender as $gift){
                $sender_gift[] = $gift['Gift']['id'];     
            }
            
            if(isset($receiver_gift) && !empty($receiver_gift))
            	$receiver_gift_ids = '"'.implode(',',$receiver_gift).'"';
            if(isset($sender_gift) && !empty($sender_gift))
            	$sender_gift_ids = "'".implode(',',$sender_gift).'"';
            fputcsv($fp,array($recipient[0]['gift_date'],$recipient['Gift']['receiver_id'],$recipient['Gift']['receiver_fb_id'], $receiver_name['Reminder']['friend_name'], $receiver_gift_count, $receiver_gift_ids, $recipient[0]['gift_date'], $recipient['Gift']['sender_id'], $sender_fb_id['User']['facebook_id'], $sender_name['UserProfile']['first_name'].' '.$sender_name['UserProfile']['last_name'],$sender_gift_count, $sender_gift_ids));
    	}
        fclose($fp);
        $this->autoRender = $this->autoLayout = false;
    }

    public function contest_report_2($date_start, $date_end){
    	//DebugBreak();
    	$fp = fopen(ROOT.'/app/tmp/'.'contest_report_2_'.time().'.csv', 'w+');
    	$date_start = date("Y-m-d", strtotime($date_start) - 86400);
    	$date_end = date("Y-m-d", strtotime($date_end) + 86400);
    	$gifts = $this->Gift->find('all', array('conditions' => array('Gift.created >' => $date_start, 'Gift.created <' => $date_end), 
    		'order' => array('DATE(created)')));
    	fputcsv($fp,array('Date', 'User Id', 'Sender FB ID', 'Sender Name','Gift ID', 'Recipient FB ID', 'Receiver Name'));
    	$this->Reminder->recursive = -1;
        $this->UserProfile->recursive = -1;
    	foreach($gifts as $gift){
    		set_time_limit(120);
    		$receiver_name = $this->Reminder->find('first', array('conditions' => array('friend_fb_id' => $gift['Gift']['receiver_fb_id'])));
            $sender_name = $this->UserProfile->find('first', array('conditions' => array('user_id' => $gift['Gift']['sender_id'])));
    		$new_array = array();
    		$new_array[] = substr($gift['Gift']['created'], 0, 10);
    		$new_array[] = $gift['Gift']['receiver_id'];
    		$new_array[] = $gift['Sender']['facebook_id'];
    		$new_array[] = $sender_name['UserProfile']['first_name'].' '.$sender_name['UserProfile']['last_name'];
    		$new_array[] = $gift['Gift']['id'];
    		$new_array[] = $gift['Gift']['receiver_fb_id'];
    		$new_array[] = $receiver_name['Reminder']['friend_name'];
    		fputcsv($fp, $new_array);
    	}

    	$this->autoRender = $this->autoLayout = false;
    }

    public function contest_report_3($date_start, $date_end){
    	$fp = fopen(ROOT.'/app/tmp/'.'contest_report_3_'.$date_start.'_to_'.$date_end.'_'.time().'.csv', 'w+');
    	$date_start = date("Y-m-d", strtotime($date_start) - 86400);
    	$date_end = date("Y-m-d", strtotime($date_end) + 86400);
    	fputcsv($fp, array('First Name', 'Last Name', 'Sender Email', 'User ID', 'Sender Facebook ID', 'No. of Gifts', 'No. of. Friends Signed Up', 'Friends FB ID (Joining Date)'));
    	$gifts = $this->Gift->find('all', array(
    		'fields' => array('count(sender_id) as c', 'sender_id'),
    		'conditions' => array('Gift.created >' => $date_start, 'Gift.created <' => $date_end), 
    		'group' => array('sender_id'),
    		'order' => array('count(sender_id) DESC'),
            'contain' => array('Sender' => array('facebook_id'))
            ));
    	$this->Gift->recursive = -1;
    	$this->UserProfile->recursive = -1;
    	
    	foreach($gifts as $gift){
    		$sender_name = NULL;
    		$sender_name = $this->UserProfile->find('first', array('conditions' => array('user_id' => $gift['Gift']['sender_id'])));
    		$receivers = $this->Gift->find('all', array('fields'=>array('DISTINCT receiver_fb_id', 'receiver_id'),
    			'conditions' => array('Gift.sender_id' => $gift['Gift']['sender_id'],'Gift.created >' => $date_start, 'Gift.created <' => $date_end)
    			));
    		$receiver_ids_with_joining_date = array();
    		$receiver_ids = array();
    		$receiver_ids = array();
    		foreach($receivers as $receiver){
    			$receiver_ids[] = $receiver['Gift']['receiver_id'];
    			$receiver_joining_date = $this->UserProfile->find('first', array('conditions' => array('user_id' => $gift['Gift']['sender_id'])));
    			$receiver_ids_with_joining_date[] = $receiver['Gift']['receiver_fb_id'] ."(".substr($receiver_joining_date['UserProfile']['created'], 0, 10).")";
    		}

    		$friend_signed_up_count = $this->UserProfile->find('count',array('conditions' => array('user_id' => $receiver_ids, 'created >' => $date_start, 'created <' => $date_end)));
    		$new_array = array();
    		$new_array[] = $sender_name['UserProfile']['first_name'];
    		$new_array[] = $sender_name['UserProfile']['last_name'];
    		$new_array[] = $sender_name['UserProfile']['email'];
    		$new_array[] = $gift['Gift']['sender_id'];
    		$new_array[] = $gift['Sender']['facebook_id'];
    		$new_array[] = $gift[0]['c'];
    		$new_array[] = $friend_signed_up_count;
    		$new_array[] = '"'.implode(',',$receiver_ids_with_joining_date).'"';
    		fputcsv($fp, $new_array);
    	}
    	$fclose($fp);
    	$this->autoRender = $this->autoLayout = false;
    }

    public function wsLatestGiftException($receiver_fb_id){
    	$e = array();
    	if(!$receiver_fb_id){
    		$e[1] = "Receiver Facebook id is not supplied";
    	}
    	else{
            $this->User->recursive = -1;
    		$user_exists = $this->User->find('count', array('conditions' => array('facebook_id' => $receiver_fb_id)));
    		if(!$user_exists){
    			$e[2] = "User correspoding to facebook id does not exist";	
    		}
            $this->Gift->recursive = -1;
    		$gift_count = $this->Gift->find('count', array('conditions' => array('receiver_fb_id' => $receiver_fb_id)));
    		if(!$gift_count){
    			$e[3] = "Facebook Id ".$receiver_id." has not received any gift yet";
    		}
    	}
    	return $e;
    }
}
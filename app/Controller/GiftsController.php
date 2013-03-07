<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Gifts Controller
 *
 * @property Gift $Gift
 */
class GiftsController extends AppController {
	public $uses = array( 'Gift','UserAddress','User','ProductType','UserProfile','Reminder');

    public $components = array('Giftology', 'CCAvenue');
    public $paginate = array(
	'contain' => array(
		'Product' => array('Vendor')),
	'order' => 'Gift.created DESC',
	'limit' => 9,
	);
    public function beforeFilter() {
	parent::beforeFilter();
	$this->Auth->allow('send_today_scheduled_gifts');
    }

	public function isAuthorized($user) {
	    if (($this->action == 'send') || ($this->action == 'redeem') || ($this->action == 'view_gifts')
		|| ($this->action == 'tx_callback') || ($this->action == 'send_today_scheduled_gifts') || ($this->action == 'print_pdf') || ($this->action == 'sent_gifts')) {
	        return true;
	    }
	    return parent::isAuthorized($user);
	}
	//WEB SERVICES
	public function ws_list () {
		$receiver_fb_id = isset($this->params->query['receiver_fb_id']) ? $this->params->query['receiver_fb_id'] : null;
		$this->log("Dont for recv fb id ".$receiver_fb_id);
		if (!$receiver_fb_id) return;
		$conditions = array('receiver_fb_id' => $receiver_fb_id);
		$this->Gift->recursive = 0;
		$this->set('gifts', $this->Gift->find('all', array('conditions' => $conditions)));
		$this->set('_serialize', array('gifts'));
	}
	public function ws_send () {
		$sender_id = isset($this->params->query['sender_id']) ? $this->params->query['sender_id'] : null;
		$receiver_fb_id = isset($this->params->query['receiver_fb_id']) ? $this->params->query['receiver_fb_id'] : null;
		$product_id = isset($this->params->query['product_id']) ? $this->params->query['product_id'] : null;
		$amount = isset($this->params->query['gift_amount']) ? $this->params->query['gift_amount'] : null;
        $e = $this->wsSendException($product_id, $amount, $sender_id, $receiver_fb_id);
        
        if(isset($e) && !empty($e)) $this->set('gifts', array('error' => $e));
        else{
            $this->log("Sending ".$product_id." from ".$sender_id." to ".$receiver_fb_id);
            $this->send_base($sender_id, $receiver_fb_id, $product_id, $amount);
            $this->set('gifts', array('result' => '1'));    
        }
		$this->set('_serialize', array('gifts'));
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
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
	public function send() {
		if(isset($this->data['gifts']))
        {
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
            $product_id = $this->data['gifts']['product_id'];
            $amount = $this->data['contribution_amount']; 
            $send_now = $this->data['gifts']['send_now'];
            $reciever_email = $this->data['gifts']['reciever_email'];
            $gift_message = $this->data['gifts']['gift-message'];
            $post_to_fb = $this->data['chk'];
            $reciever_name = $this->data['gifts']['reciver_name'];
            $receiver_birthday = $this->data['gifts']['receiver_birthday'];

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
	}

	public function send_base($sender_id, $receiver_fb_id, $product_id, $amount, $send_now = 1,$receiver_email = null, $gift_message = null, $post_to_fb = true,$receiver_birthday, $date_to_send = null,$reciever_name = null) {
		   
		$this->redirectIfNotAllowedToSend();
		
		$this->Gift->create();
		$this->Gift->Product->id = $product_id;
		if (!$this->Gift->Product->exists()) {
			throw new NotFoundException(__('Invalid Product'));
		}
		$this->Gift->Product->recursive = 0;
		$product = $this->Gift->Product->read(null, $product_id); 

		$gift['Gift']['product_id'] = $product_id;
		$gift['Gift']['sender_id'] = $sender_id;
		$gift['Gift']['send_now'] = $send_now;
		if ($receiver_email) {
			$gift['Gift']['receiver_email'] = $receiver_email;
		}
		if ($gift_message) {
			$gift['Gift']['gift_message'] = $gift_message;
		}
		$gift['Gift']['post_to_fb'] = $post_to_fb;
		$gift['Gift']['receiver_fb_id'] = $receiver_fb_id;
		
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
        $gift['Gift']['code'] = $this->getCode($product, $gift['Gift']['gift_amount'],$reciever_name,$receiver_fb_id,$receiver_birthday);
		$gift['Gift']['expiry_date'] = $this->getExpiryDate($product['Product']['days_valid']);
		if (!$send_now) {
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
		if($this->params['ext'] != 'json')
            $this->redirect(array('controller' => 'reminders', 'action'=>'view_friends'));
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
	

			$sender_name = $gift['Sender']['UserProfile']['first_name'].$gift['Sender']['UserProfile']['last_name'];
			$sender_email = $gift['Sender']['UserProfile']['email'];
			$sender_fb_id = $gift['Sender']['facebook_id'];
			if ($gift['Gift']['gift_message']) {
				$email_message = $gift['Gift']['gift_message'];
				$message = $gift['Gift']['gift_message']."\r\n ".'@['.$receiver_fb_id.']';
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
		if ($receiver_email && $User_id=="" && $receiver_birthday==date("Y-m-d")) 
			{
				$this->send_email($gift_id,$receiver_email,$sender_name,$sender_email,$receiver_name,$email_message,'gift_sent_newuser_birthday');
			}

		else if ($receiver_email && $User_id=="") 
			{
				$this->send_email($gift_id,$receiver_email,$sender_name,$sender_email,$receiver_name,$email_message,'gift_sent_newuser');
			}

		else if ($receiver_email && $receiver_birthday==date("Y-m-d") && $User_id!="") 
			{
			    $this->send_email($gift_id,$receiver_email,$sender_name,$sender_email,$receiver_name,$email_message,'gift_sent_olduser_birthday');
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
			    ->subject($receiver_name.', '.$sender_name.' sent you a gift voucher to '.$vendor_name)
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
	public function redeem($id) {
		$this->Gift->id = $id;
		if (!$this->Gift->exists()) {
			throw new NotFoundException(__('Invalid gift'));
		}
	        $this->Gift->Behaviors->attach('Containable');
		$gift = $this->Gift->find('first', array(
			'contain' => array(
				'Product' => array('Vendor'),
				'Sender' => array('UserProfile')),
			'conditions' => array('Gift.id'=>$id)));
		$gift['Vendor'] = &$gift['Product']['Vendor']; //hack because our view element gift_voucher requires vendor like this
		$this->set('gift', $gift);	
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
		$gifts = $this->Gift->find('all', array(
			'contain' => array(
				'Product' => array('Vendor')),
			'conditions' => array('AND'=>array('Gift.gift_status_id'=> GIFT_STATUS_SCHEDULED, 'Gift.receiver_id' => $this->Auth->user('id')))));
		
		$fb_id = isset($gifts[0]['Gift']['receiver_fb_id']) ? $gifts[0]['Gift']['receiver_fb_id'] : NULL;
		$User = $this->Reminder->find('first',array('conditions' => array('Reminder.friend_fb_id' => $fb_id)));
		$birthday = isset($User['Reminder']['friend_birthday']) ? $User['Reminder']['friend_birthday']: NULL;
		if($birthday <= date("Y-m-d"))
		{
			$this->Gift->updateAll(
                array('gift_status_id' => 1), 
                array('receiver_id' => $this->Auth->user('id')));
			
		}

		$this->paginate['conditions'] = $conditions;
		$this->set('gifts', $this->paginate());
		$this->set('gifts_active', 'active');
		$this->Mixpanel->track('Viewing Gifts', array(
		));
	}

	public function sent_gifts() {
        
		if (isset($this->request->params['named']['sent'])) {
			$conditions = array('receiver_id' => $this->Auth->user('id'));
		} else {
			$conditions = array('sender_id' => $this->Auth->user('id'));
		}
		$gift_sent = $this->Gift->find('all', array(
			'contain' => array(
				'Product' => array('Vendor')),
			'conditions' => array('Gift.sender_id' => $this->Auth->user('id'))));
		//print_r($gift_sent);
		$fb_name = array();
		foreach ($gift_sent as $gift) {
			$fb_id=$gift['Gift']['receiver_fb_id'];
			$User_info = $this->Reminder->find('first',array('conditions' => array('Reminder.friend_fb_id' => $fb_id)));
			$fb_name[]['name']=$User_info['Reminder']['friend_name'];
			# code...
		}
		if($fb_name!=null){
		$name = array_reverse($fb_name);
		}
		
		$this->paginate['conditions'] = $conditions;
		//$this->set('gifts', $this->paginate());
		$set = $this->paginate();
		$result = array();
				foreach($set as $key=>$val){ // Loop though one array
				    $val2 = $name[$key]; // Get the values from the other array
				    $result[$key] = $val + $val2; // combine 'em
				}
				
		$this->set('gifts', $result);
		$this->set('gifts_active', 'active');
		$this->Mixpanel->track('Viewing Gifts', array(
		));
	}

	
    public function print_pdf($id) 
    { 
    	$gift = $this->Gift->find('first', array(
			'contain' => array(
				'Product' => array('Vendor'),
				'Sender' => array('UserProfile')),
			'conditions' => array('Gift.id'=>$id)));
    	//print_r($gift['Product']['redeem_instr']);
    	//die();
    	$this->set('gift', $gift);
    	
    	Configure::write('debug',0); //
		$this->layout = 'pdf'; //this will use the pdf.ctp layout
		$this->render();

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
			$this->Session->setFlash(__('Awesome Karma ! Your gift has been sent. Want to send another one?'));
			$this->redirect(array(
				'controller' => 'reminders', 'action'=>'view_friends'));
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
			$this->Session->setFlash(__('Ouch ! Your transaction failed. Maybe a typing error ? Try again ? '));
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
		$this->informSenderReceipientOfGiftSent($gift['Gift']['id'], $gift['Sender']['access_token']);
	    }
	    $this->autoRender = $this->autoLayout = false;
	}
    
    public function wsSendException($product_id,$amount, $sender_id, $receiver_fb_id){
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
        
        return $error;
    }
}

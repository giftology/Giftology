<?php
App::uses('AppController', 'Controller');
/**
 * Gifts Controller
 *
 * @property Gift $Gift
 */
class GiftsController extends AppController {

    public $components = array('Giftology');
    public $paginate = array(
	'contain' => array(
		'Product' => array('Vendor')),
	'order' => 'Gift.created DESC',
	'limit' => 9,
	);
	public function isAuthorized($user) {
	    if (($this->action == 'send') || ($this->action == 'redeem') || ($this->action == 'view_gifts')) {
	        return true;
	    }
	    return parent::isAuthorized($user);
	}
	//WEB SERVICES
	public function ws_list () {
		$this->Gift->recursive = 0;
		$this->set('gifts', $this->Gift->find('all'));
		$this->set('_serialize', array('gifts'));
	}
	public function ws_send () {
		$this->Gift->recursive = 0;
		$this->set('gifts', $this->Gift->find('all'));
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
	public function send($id = null) {
		$this->Gift->create();
		$this->Gift->Product->id = $this->request->params['named']['product_id'];
		if (!$this->Gift->Product->exists()) {
			throw new NotFoundException(__('Invalid Product'));
		}
		$this->Gift->Product->recursive = 0;
		$product = $this->Gift->Product->read(null, $this->request->params['named']['product_id']); 
		$gift['Gift']['product_id'] = $this->request->params['named']['product_id'];
		$gift['Gift']['sender_id'] = $this->Auth->user('id');
		if ($this->request->params['named']['receiver_email']) {
			$gift['Gift']['receiver_email'] = $this->request->params['named']['receiver_email'];
		}
		if ($this->request->params['named']['message']) {
			$gift['Gift']['gift_message'] = $this->request->params['named']['message'];
		}
		$gift['Gift']['post_to_fb'] = $this->request->params['named']['post_to_fb'];
		$receiver_fb_id = $this->request->params['named']['receiver_fb_id'];
		$gift['Gift']['receiver_fb_id'] = $receiver_fb_id;
		
		$receiver = $this->Connect->User->findByFacebookId($receiver_fb_id);
		
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

		$gift['Gift']['receiver_id'] = (isset($receiver) && $receiver['User']['id']) ? $receiver['User']['id'] : UNREGISTERED_GIFT_RECIPIENT_PLACEHODER_USER_ID;
		$gift['Gift']['code'] = $this->getCode($product);
		$gift['Gift']['gift_amount'] = $product['Product']['min_value'];
		$gift['Gift']['expiry_date'] = $this->getExpiryDate($product['Product']['days_valid']);
		$gift['Gift']['gift_status_id'] = GIFT_STATUS_VALID;
			
		if ($this->Gift->save($gift)) {
			//$this->informSenderReceipientOfGiftSent($this->Gift->getLastInsertID());
			$this->Session->setFlash(__('Awesome Karma ! Your gift has been sent. Want to send another one ? '));
		} else {
			$this->Session->setFlash(__('Unable to send gift.  Try again'));

		}
		$this->redirect(array(
			'controller' => 'reminders', 'action'=>'view_friends'));exit();
	}

        function getCode($product) {
	    if ($product['Product']['code'] == 'Generated') {
		return $this->Giftology->generateGiftCode($product['Product']['id']);
	    } elseif ($product['Product']['code'] == 'Uploaded') {
		return $this->getUploadedCode($product['Product']['id'], $gift['Gift']['gift_amount']); 
	    } else {
		return $product['Product']['code']; //Static Reusable code for all gifts, as entered
	    }
        }
	function getUploadedCode($product, $value) {
		$code = $this->Gift->Product->UploadedProductCode->find('first',
			array('conditions' => array('available'=>1, 'product_id' =>$product,
				'value' => $value)));
		if (!$code) {
			$this->Session->setFlash(__('Unable to sent gift, please select another product'));
			$this->log('Out of uploaded codes for prod id '.$product.' value '.$value);
			$this->redirect(array('controller'=>'products', 'action'=>'index',
					      'recepient_id'=>$this->request->params['named']['receiver_fb_id']));
				exit();
		}
		$this->Gift->Product->UploadedProductCode->updateAll(array('available' => 0),
								     array('UploadedProductCode.id' => $code['UploadedProductCode']['id']));
		return $code['UploadedProductCode']['code'];
	}
        function getExpiryDate($days_valid) {
                return date('Y-m-d', strtotime("+".$days_valid." days"));
        }
	function informSenderReceipientOfGiftSent($gift_id) {
		
		if ($this->request->params['named']['message']) {
			$message = $this->request->params['named']['message'];
		} else {
			$message = $this->Connect->user('name').' sent you a gift';
		}
		// Post to both sender and receipients facebook wall
		$this->Giftology->postToFB($this->Connect->user('id'), FB::getAccessToken(),
					   FULL_BASE_URL.'/users/login/gift_id:'.$gift_id, 'Sent a gift on Giftology.com');
		$this->Giftology->postToFB($this->request->params['named']['receiver_fb_id'], FB::getAccessToken(),
					   FULL_BASE_URL.'/users/login/gift_id:'.$gift_id, $message);
		
		// Send email to both sender and receipients about gifts sent
		// XXX TODO
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
		$this->paginate['conditions'] = $conditions;
		$this->set('gifts', $this->paginate());
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
}

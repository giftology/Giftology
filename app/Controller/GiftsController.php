<?php
App::uses('AppController', 'Controller');
/**
 * Gifts Controller
 *
 * @property Gift $Gift
 */
class GiftsController extends AppController {

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
			echo debug($this->request->data);

			if ($this->Gift->save($this->request->data)) {
				$this->Session->setFlash(__('The gift has been saved'));
				$this->redirect(array('action' => 'index'));
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
				$this->redirect(array('action' => 'index'));
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
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Gift was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	public function send($id = null) {
		$this->Gift->create();
		$this->Gift->Product->id = $this->request->params['named']['product_id'];
		if (!$this->Gift->Product->exists()) {
			throw new NotFoundException(__('Invalid Product'));
		}
		
		$gift['Gift']['product_id'] = $this->request->params['named']['product_id'];
		$gift['Gift']['sender_id'] = $this->Auth->user('id');

		$receiver_fb_id = $this->request->params['named']['receiver_fb_id'];
		$receiver = $this->Connect->User->findByFacebookId($receiver_fb_id);
		
		if (!$receiver) {
			//Create a User for the receiver			
			$this->Gift->Receiver->create();
			$data['Receiver']['facebook_id'] = $receiver_fb_id;
			if (!$this->Gift->Receiver->save($data)) {
				$this->Session->setFlash(__('Cant create new receipient. Gift not sent'));
				return;
			}
			$receiver = $this->Connect->User->findByFacebookId($receiver_fb_id);
		}
		
		
		$gift['Gift']['receiver_id'] = $receiver['User']['id'];
		$gift['Gift']['code'] = $this->getCode();
		$gift['Gift']['gift_amout'] = '100';
		$gift['Gift']['expiry_date'] = $this->getExpiryDate();
		$gift['Gift']['gift_status_id'] = 1;
		
		if ($this->Gift->save($gift)) {
			$this->Session->setFlash(__('Your gift has been sent'));
		} else {
			$this->Session->setFlash(__('Unable to send gift.  Try again'));

		}
		$this->redirect(array(
			'controller' => 'users', 'action'=>'view_friends'));
		
	/*		
			if ($this->Gift->save($this->request->data)) {
				$this->Session->setFlash(__('The gift has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The gift could not be saved. Please, try again.'));
			}
*/
	}


        function getCode() {
            return '123';
        }
        function getExpiryDate() {
            return '1/1/2013';
        }
}
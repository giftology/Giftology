<?php
App::uses('AppController', 'Controller');
/**
 * Transactions Controller
 *
 * @property Transaction $Transaction
 */
class TransactionsController extends AppController {
	public $components = array('CCAvenue');

	public function isAuthorized($user) {
	    if (($this->action == 'start_transaction')) {
	        return true;
	    }
	    return parent::isAuthorized($user);
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Transaction->recursive = 0;
		$this->set('transactions', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Transaction->id = $id;
		if (!$this->Transaction->exists()) {
			throw new NotFoundException(__('Invalid transaction'));
		}
		$this->set('transaction', $this->Transaction->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Transaction->create();
			if ($this->Transaction->save($this->request->data)) {
				$this->Session->setFlash(__('The transaction has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The transaction could not be saved. Please, try again.'));
			}
		}
		$senders = $this->Transaction->Sender->find('list');
		$receivers = $this->Transaction->Receiver->find('list');
		$products = $this->Transaction->Product->find('list');
		$gifts = $this->Transaction->Gift->find('list');
		$transactionStatuses = $this->Transaction->TransactionStatus->find('list');
		$this->set(compact('senders', 'receivers', 'products', 'gifts', 'transactionStatuses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Transaction->id = $id;
		if (!$this->Transaction->exists()) {
			throw new NotFoundException(__('Invalid transaction'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Transaction->save($this->request->data)) {
				$this->Session->setFlash(__('The transaction has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The transaction could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Transaction->read(null, $id);
		}
		$senders = $this->Transaction->Sender->find('list');
		$receivers = $this->Transaction->Receiver->find('list');
		$products = $this->Transaction->Product->find('list');
		$gifts = $this->Transaction->Gift->find('list');
		$transactionStatuses = $this->Transaction->TransactionStatus->find('list');
		$pgs = $this->Transaction->Pg->find('list');
		$this->set(compact('senders', 'receivers', 'products', 'gifts', 'transactionStatuses', 'pgs'));
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
		$this->Transaction->id = $id;
		if (!$this->Transaction->exists()) {
			throw new NotFoundException(__('Invalid transaction'));
		}
		if ($this->Transaction->delete()) {
			$this->Session->setFlash(__('Transaction deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Transaction was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	public function start_transaction () {

		$Merchant_Id = CCAV_MERCHANT_ID;//This id(also User Id)  available at "Generate Working Key" of "Settings & Options" 
		$Amount = $this->request->params['named']['amount'] ;//your script should substitute the amount in the quotes provided here
		$Order_Id = 'GIFT'.$this->request->params['named']['OrderId'] ;//your script should substitute the order description in the quotes provided here
		$Redirect_Url = FULL_BASE_URL.Router::url(array('controller'=>'gifts', 'action'=>'tx_callback')); //your redirect URL where your customer will be redirected after authorisation from CCAvenue
		$WorkingKey = CCAV_WORKING_KEY  ;//put in the 32 bit alphanumeric key in the quotes provided here.Please note that get this key ,login to your CCAvenue merchant account and visit the "Generate Working Key" section at the "Settings & Options" page. 
		$Checksum = $this->CCAvenue->getchecksum($Merchant_Id,$Amount,$Order_Id ,$Redirect_Url,$WorkingKey);
		$this->set('Merchant_Id', $Merchant_Id);
		$this->set('Amount', $Amount);
		$this->set('Order_Id', $Order_Id);
		$this->set('Redirect_Url', $Redirect_Url);
		$this->set('WorkingKey', $WorkingKey);
		$this->set('Checksum', $Checksum);
	}
}

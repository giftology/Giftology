<?php
App::uses('AppController', 'Controller');
/**
 * TransactionStatuses Controller
 *
 * @property TransactionStatus $TransactionStatus
 */
class TransactionStatusesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->TransactionStatus->recursive = 0;
		$this->set('transactionStatuses', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->TransactionStatus->id = $id;
		if (!$this->TransactionStatus->exists()) {
			throw new NotFoundException(__('Invalid transaction status'));
		}
		$this->set('transactionStatus', $this->TransactionStatus->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TransactionStatus->create();
			if ($this->TransactionStatus->save($this->request->data)) {
				$this->Session->setFlash(__('The transaction status has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The transaction status could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->TransactionStatus->id = $id;
		if (!$this->TransactionStatus->exists()) {
			throw new NotFoundException(__('Invalid transaction status'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TransactionStatus->save($this->request->data)) {
				$this->Session->setFlash(__('The transaction status has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The transaction status could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->TransactionStatus->read(null, $id);
		}
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
		$this->TransactionStatus->id = $id;
		if (!$this->TransactionStatus->exists()) {
			throw new NotFoundException(__('Invalid transaction status'));
		}
		if ($this->TransactionStatus->delete()) {
			$this->Session->setFlash(__('Transaction status deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Transaction status was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

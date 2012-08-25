<?php
App::uses('AppController', 'Controller');
/**
 * UserAddresses Controller
 *
 * @property UserAddress $UserAddress
 */
class UserAddressesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->UserAddress->recursive = 0;
		$this->set('userAddresses', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->UserAddress->id = $id;
		if (!$this->UserAddress->exists()) {
			throw new NotFoundException(__('Invalid user address'));
		}
		$this->set('userAddress', $this->UserAddress->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->UserAddress->create();
			if ($this->UserAddress->save($this->request->data)) {
				$this->Session->setFlash(__('The user address has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user address could not be saved. Please, try again.'));
			}
		}
		$users = $this->UserAddress->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->UserAddress->id = $id;
		if (!$this->UserAddress->exists()) {
			throw new NotFoundException(__('Invalid user address'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->UserAddress->save($this->request->data)) {
				$this->Session->setFlash(__('The user address has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user address could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->UserAddress->read(null, $id);
		}
		$users = $this->UserAddress->User->find('list');
		$this->set(compact('users'));
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
		$this->UserAddress->id = $id;
		if (!$this->UserAddress->exists()) {
			throw new NotFoundException(__('Invalid user address'));
		}
		if ($this->UserAddress->delete()) {
			$this->Session->setFlash(__('User address deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User address was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

<?php
App::uses('AppController', 'Controller');
/**
 * Products Controller
 *
 * @property Product $Product
 */
class ProductsController extends AppController {
	public function isAuthorized($user) {
	    if (($this->action == 'view_products') || ($this->action == 'view_product')) {
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
		$productSegments = $this->Product->ProductSegment->find('list');
		$this->set(compact('vendors', 'productTypes', 'productSegments'));
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
		$vendors = $this->Product->Vendor->find('list');
		$productTypes = $this->Product->ProductType->find('list');
		$productSegments = $this->Product->ProductSegment->find('list');
		$this->set(compact('vendors', 'productTypes', 'productSegments'));
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
	
	public function view_products () {
		$this->Product->recursive = 0;
		$this->set('receiver_id', isset($this->request->params['named']['receiver_id']) ? $this->request->params['named']['receiver_id'] : null);
		$this->set('receiver_name', isset($this->request->params['named']['receiver_name']) ? $this->request->params['named']['receiver_name'] : null);
		$this->set('receiver_birthday', isset($this->request->params['named']['receiver_birthday']) ? $this->request->params['named']['receiver_birthday'] : null);
		$this->set('ocasion', isset($this->request->params['named']['ocasion']) ? $this->request->params['named']['ocasion'] : null);
		$this->set('products', $this->paginate());
	}
	public function view_product($id=null) {
		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException(__('Invalid product'));
		}
		$this->set('receiver_id', isset($this->request->params['named']['receiver_id']) ? $this->request->params['named']['receiver_id'] : null);
		$this->set('receiver_name', isset($this->request->params['named']['receiver_name']) ? $this->request->params['named']['receiver_name'] : null);
		$this->set('receiver_birthday', isset($this->request->params['named']['receiver_birthday']) ? $this->request->params['named']['receiver_birthday'] : null);
		$this->set('ocasion', isset($this->request->params['named']['ocasion']) ? $this->request->params['named']['ocasion'] : null);
		$this->set('product', $this->Product->read(null, $id));

	}
	
}

<?php
App::uses('AppController', 'Controller');
/**
 * VendorLocations Controller
 *
 * @property VendorLocation $VendorLocation
 */
class VendorLocationsController extends AppController {
	public $helpers = array('Minify.Minify');
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->VendorLocation->recursive = 0;
		$this->set('vendorLocations', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->VendorLocation->id = $id;
		if (!$this->VendorLocation->exists()) {
			throw new NotFoundException(__('Invalid vendor location'));
		}
		$this->set('vendorLocation', $this->VendorLocation->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->VendorLocation->create();
			if ($this->VendorLocation->save($this->request->data)) {
				$this->Session->setFlash(__('The vendor location has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The vendor location could not be saved. Please, try again.'));
			}
		}
		$vendors = $this->VendorLocation->Vendor->find('list');
		$this->set(compact('vendors'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->VendorLocation->id = $id;
		if (!$this->VendorLocation->exists()) {
			throw new NotFoundException(__('Invalid vendor location'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->VendorLocation->save($this->request->data)) {
				$this->Session->setFlash(__('The vendor location has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The vendor location could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->VendorLocation->read(null, $id);
		}
		$vendors = $this->VendorLocation->Vendor->find('list');
		$this->set(compact('vendors'));
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
		$this->VendorLocation->id = $id;
		if (!$this->VendorLocation->exists()) {
			throw new NotFoundException(__('Invalid vendor location'));
		}
		if ($this->VendorLocation->delete()) {
			$this->Session->setFlash(__('Vendor location deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Vendor location was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

<?php
App::uses('AppController', 'Controller');
/**
 * Vendors Controller
 *
 * @property Vendor $Vendor
 */
class VendorsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Vendor->recursive = 0;
		$this->set('vendors', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Vendor->id = $id;
		if (!$this->Vendor->exists()) {
			throw new NotFoundException(__('Invalid vendor'));
		}
		$this->set('vendor', $this->Vendor->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Vendor->create();
			
			$this->request->data['Vendor']['thumb_image'] = 'files/'.$this->request->data['Vendor']['thumb_file']['name'];
			copy($this->request->data['Vendor']['thumb_file']['tmp_name'], $this->request->data['Vendor']['thumb_image']);

			$this->request->data['Vendor']['wide_image'] = 'files/'.$this->request->data['Vendor']['wide_file']['name'];
			copy($this->request->data['Vendor']['wide_file']['tmp_name'], $this->request->data['Vendor']['wide_image']);
			

			if ($this->Vendor->save($this->request->data)) {
				$this->Session->setFlash(__('The vendor has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The vendor could not be saved. Please, try again.'));
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
		$this->Vendor->id = $id;
		if (!$this->Vendor->exists()) {
			throw new NotFoundException(__('Invalid vendor'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if (isset($this->request->data['Vendor']['thumb_file']['name'])) {
				$this->request->data['Vendor']['thumb_image'] = 'files/'.$this->request->data['Vendor']['thumb_file']['name'];
				copy($this->request->data['Vendor']['thumb_file']['tmp_name'], $this->request->data['Vendor']['thumb_image']);
			}
			if (isset($this->request->data['Vendor']['wide_file']['name'])) {
				$this->request->data['Vendor']['wide_image'] = 'files/'.$this->request->data['Vendor']['wide_file']['name'];
				copy($this->request->data['Vendor']['wide_file']['tmp_name'], $this->request->data['Vendor']['wide_image']);
			}
			if ($this->Vendor->save($this->request->data)) {
				$this->Session->setFlash(__('The vendor has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The vendor could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Vendor->read(null, $id);
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
		$this->Vendor->id = $id;
		if (!$this->Vendor->exists()) {
			throw new NotFoundException(__('Invalid vendor'));
		}
		if ($this->Vendor->delete()) {
			$this->Session->setFlash(__('Vendor deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Vendor was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

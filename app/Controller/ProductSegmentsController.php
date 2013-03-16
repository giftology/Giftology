<?php
App::uses('AppController', 'Controller');
/**
 * ProductSegments Controller
 *
 * @property ProductSegment $ProductSegment
 */
class ProductSegmentsController extends AppController {
	public $helpers = array('Minify.Minify');
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ProductSegment->recursive = 0;
		$this->set('productSegments', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->ProductSegment->id = $id;
		if (!$this->ProductSegment->exists()) {
			throw new NotFoundException(__('Invalid product segment'));
		}
		$this->set('productSegment', $this->ProductSegment->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ProductSegment->create();
			if ($this->ProductSegment->save($this->request->data)) {
				$this->Session->setFlash(__('The product segment has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product segment could not be saved. Please, try again.'));
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
		$this->ProductSegment->id = $id;
		if (!$this->ProductSegment->exists()) {
			throw new NotFoundException(__('Invalid product segment'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ProductSegment->save($this->request->data)) {
				$this->Session->setFlash(__('The product segment has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product segment could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->ProductSegment->read(null, $id);
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
		$this->ProductSegment->id = $id;
		if (!$this->ProductSegment->exists()) {
			throw new NotFoundException(__('Invalid product segment'));
		}
		if ($this->ProductSegment->delete()) {
			$this->Session->setFlash(__('Product segment deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Product segment was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

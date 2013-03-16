<?php
App::uses('AppController', 'Controller');
/**
 * GenderSegments Controller
 *
 * @property GenderSegment $GenderSegment
 */
class GenderSegmentsController extends AppController {
	public $helpers = array('Minify.Minify');
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->GenderSegment->recursive = 0;
		$this->set('genderSegments', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->GenderSegment->id = $id;
		if (!$this->GenderSegment->exists()) {
			throw new NotFoundException(__('Invalid gender segment'));
		}
		$this->set('genderSegment', $this->GenderSegment->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->GenderSegment->create();
			if ($this->GenderSegment->save($this->request->data)) {
				$this->Session->setFlash(__('The gender segment has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The gender segment could not be saved. Please, try again.'));
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
		$this->GenderSegment->id = $id;
		if (!$this->GenderSegment->exists()) {
			throw new NotFoundException(__('Invalid gender segment'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->GenderSegment->save($this->request->data)) {
				$this->Session->setFlash(__('The gender segment has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The gender segment could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->GenderSegment->read(null, $id);
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
		$this->GenderSegment->id = $id;
		if (!$this->GenderSegment->exists()) {
			throw new NotFoundException(__('Invalid gender segment'));
		}
		if ($this->GenderSegment->delete()) {
			$this->Session->setFlash(__('Gender segment deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Gender segment was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->GenderSegment->recursive = 0;
		$this->set('genderSegments', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->GenderSegment->id = $id;
		if (!$this->GenderSegment->exists()) {
			throw new NotFoundException(__('Invalid gender segment'));
		}
		$this->set('genderSegment', $this->GenderSegment->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->GenderSegment->create();
			if ($this->GenderSegment->save($this->request->data)) {
				$this->Session->setFlash(__('The gender segment has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The gender segment could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->GenderSegment->id = $id;
		if (!$this->GenderSegment->exists()) {
			throw new NotFoundException(__('Invalid gender segment'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->GenderSegment->save($this->request->data)) {
				$this->Session->setFlash(__('The gender segment has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The gender segment could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->GenderSegment->read(null, $id);
		}
	}

/**
 * admin_delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->GenderSegment->id = $id;
		if (!$this->GenderSegment->exists()) {
			throw new NotFoundException(__('Invalid gender segment'));
		}
		if ($this->GenderSegment->delete()) {
			$this->Session->setFlash(__('Gender segment deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Gender segment was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

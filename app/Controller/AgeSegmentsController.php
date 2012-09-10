<?php
App::uses('AppController', 'Controller');
/**
 * AgeSegments Controller
 *
 * @property AgeSegment $AgeSegment
 */
class AgeSegmentsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->AgeSegment->recursive = 0;
		$this->set('ageSegments', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->AgeSegment->id = $id;
		if (!$this->AgeSegment->exists()) {
			throw new NotFoundException(__('Invalid age segment'));
		}
		$this->set('ageSegment', $this->AgeSegment->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->AgeSegment->create();
			if ($this->AgeSegment->save($this->request->data)) {
				$this->Session->setFlash(__('The age segment has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The age segment could not be saved. Please, try again.'));
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
		$this->AgeSegment->id = $id;
		if (!$this->AgeSegment->exists()) {
			throw new NotFoundException(__('Invalid age segment'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->AgeSegment->save($this->request->data)) {
				$this->Session->setFlash(__('The age segment has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The age segment could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->AgeSegment->read(null, $id);
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
		$this->AgeSegment->id = $id;
		if (!$this->AgeSegment->exists()) {
			throw new NotFoundException(__('Invalid age segment'));
		}
		if ($this->AgeSegment->delete()) {
			$this->Session->setFlash(__('Age segment deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Age segment was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->AgeSegment->recursive = 0;
		$this->set('ageSegments', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->AgeSegment->id = $id;
		if (!$this->AgeSegment->exists()) {
			throw new NotFoundException(__('Invalid age segment'));
		}
		$this->set('ageSegment', $this->AgeSegment->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->AgeSegment->create();
			if ($this->AgeSegment->save($this->request->data)) {
				$this->Session->setFlash(__('The age segment has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The age segment could not be saved. Please, try again.'));
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
		$this->AgeSegment->id = $id;
		if (!$this->AgeSegment->exists()) {
			throw new NotFoundException(__('Invalid age segment'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->AgeSegment->save($this->request->data)) {
				$this->Session->setFlash(__('The age segment has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The age segment could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->AgeSegment->read(null, $id);
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
		$this->AgeSegment->id = $id;
		if (!$this->AgeSegment->exists()) {
			throw new NotFoundException(__('Invalid age segment'));
		}
		if ($this->AgeSegment->delete()) {
			$this->Session->setFlash(__('Age segment deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Age segment was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

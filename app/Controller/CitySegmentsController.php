<?php
App::uses('AppController', 'Controller');
/**
 * CitySegments Controller
 *
 * @property CitySegment $CitySegment
 */
class CitySegmentsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->CitySegment->recursive = 0;
		$this->set('citySegments', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->CitySegment->id = $id;
		if (!$this->CitySegment->exists()) {
			throw new NotFoundException(__('Invalid city segment'));
		}
		$this->set('citySegment', $this->CitySegment->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CitySegment->create();
			if ($this->CitySegment->save($this->request->data)) {
				$this->Session->setFlash(__('The city segment has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The city segment could not be saved. Please, try again.'));
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
		$this->CitySegment->id = $id;
		if (!$this->CitySegment->exists()) {
			throw new NotFoundException(__('Invalid city segment'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->CitySegment->save($this->request->data)) {
				$this->Session->setFlash(__('The city segment has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The city segment could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->CitySegment->read(null, $id);
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
		$this->CitySegment->id = $id;
		if (!$this->CitySegment->exists()) {
			throw new NotFoundException(__('Invalid city segment'));
		}
		if ($this->CitySegment->delete()) {
			$this->Session->setFlash(__('City segment deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('City segment was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->CitySegment->recursive = 0;
		$this->set('citySegments', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->CitySegment->id = $id;
		if (!$this->CitySegment->exists()) {
			throw new NotFoundException(__('Invalid city segment'));
		}
		$this->set('citySegment', $this->CitySegment->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->CitySegment->create();
			if ($this->CitySegment->save($this->request->data)) {
				$this->Session->setFlash(__('The city segment has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The city segment could not be saved. Please, try again.'));
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
		$this->CitySegment->id = $id;
		if (!$this->CitySegment->exists()) {
			throw new NotFoundException(__('Invalid city segment'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->CitySegment->save($this->request->data)) {
				$this->Session->setFlash(__('The city segment has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The city segment could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->CitySegment->read(null, $id);
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
		$this->CitySegment->id = $id;
		if (!$this->CitySegment->exists()) {
			throw new NotFoundException(__('Invalid city segment'));
		}
		if ($this->CitySegment->delete()) {
			$this->Session->setFlash(__('City segment deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('City segment was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

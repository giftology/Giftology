<?php
App::uses('AppController', 'Controller');
/**
 * UserUtms Controller
 *
 * @property UserUtm $UserUtm
 */
class UserUtmsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->UserUtm->recursive = 0;
		$this->set('userUtms', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->UserUtm->id = $id;
		if (!$this->UserUtm->exists()) {
			throw new NotFoundException(__('Invalid user utm'));
		}
		$this->set('userUtm', $this->UserUtm->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->UserUtm->create();
			if ($this->UserUtm->save($this->request->data)) {
				$this->Session->setFlash(__('The user utm has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user utm could not be saved. Please, try again.'));
			}
		}
		$users = $this->UserUtm->User->find('list');
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
		$this->UserUtm->id = $id;
		if (!$this->UserUtm->exists()) {
			throw new NotFoundException(__('Invalid user utm'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->UserUtm->save($this->request->data)) {
				$this->Session->setFlash(__('The user utm has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user utm could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->UserUtm->read(null, $id);
		}
		$users = $this->UserUtm->User->find('list');
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
		$this->UserUtm->id = $id;
		if (!$this->UserUtm->exists()) {
			throw new NotFoundException(__('Invalid user utm'));
		}
		if ($this->UserUtm->delete()) {
			$this->Session->setFlash(__('User utm deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User utm was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

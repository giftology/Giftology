<?php
App::uses('AppController', 'Controller');
/**
 * GiftStatuses Controller
 *
 * @property GiftStatus $GiftStatus
 */
class GiftStatusesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->GiftStatus->recursive = 0;
		$this->set('giftStatuses', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->GiftStatus->id = $id;
		if (!$this->GiftStatus->exists()) {
			throw new NotFoundException(__('Invalid gift status'));
		}
		$this->set('giftStatus', $this->GiftStatus->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->GiftStatus->create();
			if ($this->GiftStatus->save($this->request->data)) {
				$this->Session->setFlash(__('The gift status has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The gift status could not be saved. Please, try again.'));
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
		$this->GiftStatus->id = $id;
		if (!$this->GiftStatus->exists()) {
			throw new NotFoundException(__('Invalid gift status'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->GiftStatus->save($this->request->data)) {
				$this->Session->setFlash(__('The gift status has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The gift status could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->GiftStatus->read(null, $id);
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
		$this->GiftStatus->id = $id;
		if (!$this->GiftStatus->exists()) {
			throw new NotFoundException(__('Invalid gift status'));
		}
		if ($this->GiftStatus->delete()) {
			$this->Session->setFlash(__('Gift status deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Gift status was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

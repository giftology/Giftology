<?php
App::uses('AppController', 'Controller');
/**
 * CodeTypes Controller
 *
 * @property CodeType $CodeType
 */
class CodeTypesController extends AppController {
	public $helpers = array('Minify.Minify');
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->CodeType->recursive = 0;
		$this->set('codeTypes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->CodeType->id = $id;
		if (!$this->CodeType->exists()) {
			throw new NotFoundException(__('Invalid code type'));
		}
		$this->set('codeType', $this->CodeType->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CodeType->create();
			if ($this->CodeType->save($this->request->data)) {
				$this->Session->setFlash(__('The code type has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The code type could not be saved. Please, try again.'));
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
		$this->CodeType->id = $id;
		if (!$this->CodeType->exists()) {
			throw new NotFoundException(__('Invalid code type'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->CodeType->save($this->request->data)) {
				$this->Session->setFlash(__('The code type has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The code type could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->CodeType->read(null, $id);
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
		$this->CodeType->id = $id;
		if (!$this->CodeType->exists()) {
			throw new NotFoundException(__('Invalid code type'));
		}
		if ($this->CodeType->delete()) {
			$this->Session->setFlash(__('Code type deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Code type was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

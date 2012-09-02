<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Reminders Controller
 *
 * @property Reminder $Reminder
 */
class RemindersController extends AppController {
    public $paginate = array(
        'limit' => 27,
    );

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Reminder->recursive = 0;
		$this->set('reminders', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Reminder->id = $id;
		if (!$this->Reminder->exists()) {
			throw new NotFoundException(__('Invalid reminder'));
		}
		$this->set('reminder', $this->Reminder->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Reminder->create();
			if ($this->Reminder->save($this->request->data)) {
				$this->Session->setFlash(__('The reminder has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The reminder could not be saved. Please, try again.'));
			}
		}
		$users = $this->Reminder->User->find('list');
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
		$this->Reminder->id = $id;
		if (!$this->Reminder->exists()) {
			throw new NotFoundException(__('Invalid reminder'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Reminder->save($this->request->data)) {
				$this->Session->setFlash(__('The reminder has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The reminder could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Reminder->read(null, $id);
		}
		$users = $this->Reminder->User->find('list');
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
		$this->Reminder->id = $id;
		if (!$this->Reminder->exists()) {
			throw new NotFoundException(__('Invalid reminder'));
		}
		if ($this->Reminder->delete()) {
			$this->Session->setFlash(__('Reminder deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Reminder was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Reminder->recursive = 0;
		$this->set('reminders', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Reminder->id = $id;
		if (!$this->Reminder->exists()) {
			throw new NotFoundException(__('Invalid reminder'));
		}
		$this->set('reminder', $this->Reminder->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Reminder->create();
			if ($this->Reminder->save($this->request->data)) {
				$this->Session->setFlash(__('The reminder has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The reminder could not be saved. Please, try again.'));
			}
		}
		$users = $this->Reminder->User->find('list');
		$this->set(compact('users'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Reminder->id = $id;
		if (!$this->Reminder->exists()) {
			throw new NotFoundException(__('Invalid reminder'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Reminder->save($this->request->data)) {
				$this->Session->setFlash(__('The reminder has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The reminder could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Reminder->read(null, $id);
		}
		$users = $this->Reminder->User->find('list');
		$this->set(compact('users'));
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
		$this->Reminder->id = $id;
		if (!$this->Reminder->exists()) {
			throw new NotFoundException(__('Invalid reminder'));
		}
		if ($this->Reminder->delete()) {
			$this->Session->setFlash(__('Reminder deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Reminder was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	public function view_friends($type=null) {
		if (!$this->Connect->user()) {
		    $this->redirect(array('controller'=>'users', 'action'=>'login'));
		}
	        if ($type) {//type = all
	            $this->set('all_users', $this->get_birthdays('mine','all', 1));
	            $this->set('today_users', array());
	            $this->set('this_month_users', array());
	        } else {
	            $this->set('all_users', array());
	            $this->set('today_users', $this->get_birthdays('mine','today'));
	            $this->set('this_month_users', $this->get_birthdays('mine','thismonth'));
	        }
	    }

	
	
	function get_birthdays ($whose, $when, $do_pagination=0) {
		
		if ($whose == 'mine') {
		    $conditions = array(
			'user_id' => $this->Auth->user('id'));
		}
		
		if ($when == 'today') {
			$conditions['MONTH(friend_birthday)'] = date('m');
			$conditions['DAY(friend_birthday)'] = date('d'); 
		} elseif ($when =='thisweek') {
		    $conditions['friend_birthday BETWEEN ? AND ?'] =
		    array(date("Y-m-d"), date("Y-m-d", strtotime(date("Y-m-d") . "+1 week")));
		} elseif ($when == 'thismonth') {
		    $conditions['friend_birthday BETWEEN ? AND ?'] =
		    array(date("Y-m-d"), date("Y-m-d", strtotime(date("Y-m-d") . "+1 month")));
		}

		$this->Reminder->recursive = -1;
		if ($do_pagination) {
			$reminders = $this->paginate($conditions);
		} else {
			$reminders = $this->Reminder->find('all',
			    array('conditions' => $conditions
			));
		}
		return $reminders;
    }
/* delete
    	function get_all_birthdays ($whose, $when) {
		
		if ($whose == 'mine') {
		    $conditions = array(
			'user_id' => $this->Auth->user('id'));
		}
		
		if ($when == 'today') {
			$conditions['MONTH(friend_birthday)'] = date('m');
			$conditions['DAY(friend_birthday)'] = date('d'); 
		} elseif ($when =='thisweek') {
		    $conditions['friend_birthday BETWEEN ? AND ?'] =
		    array(date("Y-m-d"), date("Y-m-d", strtotime(date("Y-m-d") . "+1 week")));
		} elseif ($when == 'thismonth') {
		    $conditions['friend_birthday BETWEEN ? AND ?'] =
		    array(date("Y-m-d"), date("Y-m-d", strtotime(date("Y-m-d") . "+1 month")));
		}

		$this->Reminder->recursive = -1;		
		$reminders = $this->paginate($conditions);
		return $reminders;
    }
*/
}

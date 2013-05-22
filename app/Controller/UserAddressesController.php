<?php
App::uses('AppController', 'Controller');
/**
 * UserAddresses Controller
 *
 * @property UserAddress $UserAddress
 */
class UserAddressesController extends AppController {
	public $helpers = array('Minify.Minify');
	public $components = array('Search.Prg');
	public $presetVars = array(
            array('field' => 'id', 'type' => 'value'),
            array('field' => 'user_id', 'type' => 'value'),
            array('field' => 'first_name', 'type' => 'value'),
            array('field' => 'last_name', 'type' => 'value'),
            array('field' => 'address1', 'type' => 'value'),
            array('field' => 'address2', 'type' => 'value'),
            array('field' => 'city', 'type' => 'value'),
            array('field' => 'pin_code', 'type' => 'value'),
            array('field' => 'country', 'type' => 'value'),
            array('field' => 'created', 'type' => 'value'),
            array('field' => 'modified', 'type' => 'value'),
            array('field' => 'phone', 'type' => 'value'),
            array('field' => 'reciever_email', 'type' => 'value'),
            array('field' => 'state', 'type' => 'value')
            );
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Prg->commonProcess('UserAddress');
		$conditions= array('conditions' => array($this->UserAddress->parseCriteria($this->passedArgs)));
		$this->paginate = $conditions;
		$this->UserAddress->recursive = 0;
		$this->set('userAddresses', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->UserAddress->id = $id;
		if (!$this->UserAddress->exists()) {
			throw new NotFoundException(__('Invalid user address'));
		}
		$this->set('userAddress', $this->UserAddress->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->UserAddress->create();
			if ($this->UserAddress->save($this->request->data)) {
				$this->Session->setFlash(__('The user address has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user address could not be saved. Please, try again.'));
			}
		}
		$users = $this->UserAddress->User->find('list');
		$this->set(compact('users'));
	}

	public function download_user_csv(){
       
          $filename = "UserAddress ".date("Y.m.d").".csv";
                    $csv_file = fopen('php://output', 'w');
                    header('Content-type: application/csv');
                    header('Content-Disposition: attachment; filename="'.$filename.'"');
                    $header_row= array('Id','User Id','First Name','Last Name','Address1','Address2','City','Pin Code','Country','Created','Modified','Phone','Receiver Email','State');
                    fputcsv($csv_file,$header_row,',','"');
                    if( !empty( $this->data ))
                    {
                        foreach($this->data['chk1'] as $id)  
                        {
                        //$total_frnd=$this->Reminder->find('count',array('conditions' => array('Reminder.user_id '=>$id)));

                           $this->UserAddress->recursive = 0;
                            $result= $this->UserAddress->find('first', array('conditions'=>array('UserAddress.id'=>$id)));
                            $row = array(
                            $result['UserAddress']['id'],
                            $result['UserAddress']['user_id'],
                            $result['UserAddress']['first_name'],
                            $result['UserAddress']['last_name'],
                            $result['UserAddress']['address1'],
                            $result['UserAddress']['address2'],
                            $result['UserAddress']['city'],
                            $result['UserAddress']['pin_code'],
                            $result['UserAddress']['country'],
                            $result['UserAddress']['created'],
                            $result['UserAddress']['modified'],
                            $result['UserAddress']['phone'],
                            $result['UserAddress']['reciever_email'],
                            $result['UserAddress']['state']


      
                             );
                            fputcsv($csv_file,$row,',','"');
                        }
                    }
                    die;
    }

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->UserAddress->id = $id;
		if (!$this->UserAddress->exists()) {
			throw new NotFoundException(__('Invalid user address'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->UserAddress->save($this->request->data)) {
				$this->Session->setFlash(__('The user address has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user address could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->UserAddress->read(null, $id);
		}
		$users = $this->UserAddress->User->find('list');
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
		$this->UserAddress->id = $id;
		if (!$this->UserAddress->exists()) {
			throw new NotFoundException(__('Invalid user address'));
		}
		if ($this->UserAddress->delete()) {
			$this->Session->setFlash(__('User address deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User address was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

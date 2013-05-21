<?php
App::uses('AppController', 'Controller');
/**
 * UserProfiles Controller
 *
 * @property UserProfile $UserProfile
 */
class UserProfilesController extends AppController {
	public $helpers = array('Minify.Minify');
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->UserProfile->recursive = 0;
		$this->set('userProfiles', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->UserProfile->id = $id;
		if (!$this->UserProfile->exists()) {
			throw new NotFoundException(__('Invalid user profile'));
		}
		$this->set('userProfile', $this->UserProfile->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->UserProfile->create();
			if ($this->UserProfile->save($this->request->data)) {
				$this->Session->setFlash(__('The user profile has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user profile could not be saved. Please, try again.'));
			}
		}
		$users = $this->UserProfile->User->find('list');
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
		$this->UserProfile->id = $id;
		if (!$this->UserProfile->exists()) {
			throw new NotFoundException(__('Invalid user profile'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->UserProfile->save($this->request->data)) {
				$this->Session->setFlash(__('The user profile has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user profile could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->UserProfile->read(null, $id);
		}
		$users = $this->UserProfile->User->find('list');
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
		$this->UserProfile->id = $id;
		if (!$this->UserProfile->exists()) {
			throw new NotFoundException(__('Invalid user profile'));
		}
		if ($this->UserProfile->delete()) {
			$this->Session->setFlash(__('User profile deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User profile was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	public function update_user_name(){
        $this->UserProfile->recursive = -1;
        $users = $this->UserProfile->find('all', array('fields' => array('id','user_id'), 'conditions' => array('OR' => array('first_name IS NULL','last_name IS NULL','first_name' => '', 'last_name' => ''))));
        $this->User->recursive = -1;
        $user_id_array = array();
        foreach($users as $user){
            $user_id_array[$user['UserProfile']['id']] = $user['UserProfile']['user_id'];    
        }
        unset($users);
        $user_facebook_id = $this->User->find('all',array('fields' => array('id','facebook_id'),'conditions' => array('id' => $user_id_array)));
        $Facebook = new FB();
        $this->UserProfile->recursive = -1;
        foreach($user_facebook_id as $fb_id){
            set_time_limit(120);
            $fb_first_last_name = $Facebook->api(array('method' => 'fql.query',
                                        'query' => 'SELECT first_name, last_name FROM user WHERE uid = '.$fb_id['User']['facebook_id']));
            if(isset($fb_first_last_name) && !empty($fb_first_last_name)){
                $data = array(
                    'UserProfile.first_name' => "'".$fb_first_last_name[0]['first_name']."'",
                    'UserProfile.last_name' => "'".$fb_first_last_name[0]['last_name']."'"
                );
                $condition = NULL;
                $condition = array('UserProfile.user_id' => $fb_id['User']['id']);
                $result = $this->UserProfile->updateAll($data, $condition);         
            }
        }
        $this->autoRender = $this->autoLayout = false;    
    }

    public function export_users_email(){
    	$users = $this->UserProfile->find('all');
    	$fp = fopen(ROOT.'/app/tmp/'.'user_profile_email_'.time().'.csv', 'w+');
    	fputcsv($fp, array('User ID', 'First Name', 'Last Name', 'Facebook ID', 'Email', 'Location'));
    	foreach($users as $user){
    		set_time_limit(120);
    		$new_array = array();
    		$new_array[] = $user['UserProfile']['user_id'];
    		$new_array[] = $user['UserProfile']['first_name'];
    		$new_array[] = $user['UserProfile']['last_name'];
    		$new_array[] = '"'.$user['User']['facebook_id'].'"';
    		$new_array[] = $user['UserProfile']['email'];
    		$new_array[] = $user['UserProfile']['city'];
    		fputcsv($fp, $new_array);
    	}
    	fclose($fp);
    	$this->autoRender = $this->autoLayout = false;    
    }
}

<?php
class UsersController extends AppController {
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add', 'logout');
    }
    public function login () {
        if ($this->request->is('post')) {
            if($this->Auth->login()) {
                $this->redirect($this->Auth->redirect());
            } else {
                $this->Session->setFlash(__('Invalid username and password'));
            }
        }
        $Facebook = new FB();
        $friends= $Facebook->api(array('method' => 'fql.query',
                                         'query' => 'SELECT uid, birthday, pic_big, name FROM user WHERE uid IN (SELECT uid2 from friend where uid1=me()) ORDER BY birthday'));
        $this->set('friends', $friends);
    }
    public function logout() {
        $this->redirect($this->Auth->logout()); 
    }
    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }
    public function view($id=null) {
        $this->User->id = $id;
        if(!$this->User->exists()) {
            throw new NotFoundException(__('Invalid User'));
        }
        $this->set('user', $this->User->read(null, $id));
    }
    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('action'=>'index'));
            } else {
                $this->Session->setFlash(__('User could not be saved'));
            }
        }
    }
    public function edit($id=null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid User'));
        }
        if($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('User saved'));
                $this->redirect(array('action'=>'index'));
            } else {
                $this->Session->setFlash(__('User could not be saved'));
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->reqest->data['User']['password']);
        }
    }
    public function delete($id=null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('User not found'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User not deleted'));
        $this->redirect(array('action'=>'index'));
    }   
}
?>
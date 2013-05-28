<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Products Controller
 *
 * @property Product $Product
 */
class WeeklyNewslettersController extends AppController {
    public $helpers = array('Minify.Minify');
    public $uses = array('WeeklyNewsletter');
    public $components = array('Giftology', 'AesCrypt');
    public $paginate = array(
        'limit' => 100,
        'order' => array(
            'WeeklyNewsletter.name' => 'asc'
        )
    );


    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow();
    }
    public function isAuthorized($user) {
        if (($this->action == 'newsletter')) {
            return true;
        }
        return parent::isAuthorized($user);
    }

    public function index() {
        $this->WeeklyNewsletter->recursive = 0;
        $this->set('news', $this->paginate());
    }

    /**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function view($id = null) {
        $this->WeeklyNewsletter->id = $id;
        if (!$this->WeeklyNewsletter->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
            
        echo debug($this->WeeklyNewsletter->read(null, $id));
        $this->set('news', $this->WeeklyNewsletters->read(null, $id));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->WeeklyNewsletter->create();
            
            //facebook linter doesnt like image links with space in them, convert all space to underscore   
            $this->request->data['WeeklyNewsletter']['header_file']['name']
                = $this->request->data['WeeklyNewsletter']['name'].str_replace(" ","_", $this->request->data['WeeklyNewsletter']['header_file']['name']);

            $this->request->data['WeeklyNewsletter']['strip_file']['name']
                = $this->request->data['WeeklyNewsletter']['name'].str_replace(" ","_", $this->request->data['WeeklyNewsletter']['strip_file']['name']);

            $this->request->data['WeeklyNewsletter']['product1_file']['name']
                = $this->request->data['WeeklyNewsletter']['name'].str_replace(" ","_", $this->request->data['WeeklyNewsletter']['product1_file']['name']);
            $this->request->data['WeeklyNewsletter']['product2_file']['name']
                = $this->request->data['WeeklyNewsletter']['name'].str_replace(" ","_", $this->request->data['WeeklyNewsletter']['product2_file']['name']);

              $this->request->data['WeeklyNewsletter']['brand1_file']['name']
                = $this->request->data['WeeklyNewsletter']['name'].str_replace(" ","_", $this->request->data['WeeklyNewsletter']['brand1_file']['name']);
            $this->request->data['WeeklyNewsletter']['brand2_file']['name']
                = $this->request->data['WeeklyNewsletter']['name'].str_replace(" ","_", $this->request->data['WeeklyNewsletter']['brand2_file']['name']);
             $this->request->data['WeeklyNewsletter']['featured_file']['name']
                = $this->request->data['WeeklyNewsletter']['name'].str_replace(" ","_", $this->request->data['WeeklyNewsletter']['featured_file']['name']);

  DEBUGBREAK();
            $this->request->data['WeeklyNewsletter']['header_banner'] = 'files/news/'.$this->request->data['WeeklyNewsletter']['header_file']['name'];
            copy($this->request->data['WeeklyNewsletter']['header_file']['tmp_name'], $this->request->data['WeeklyNewsletter']['header_banner']);

            $this->request->data['WeeklyNewsletter']['strip_banner'] = 'files/news/'.$this->request->data['WeeklyNewsletter']['strip_file']['name'];
            copy($this->request->data['WeeklyNewsletter']['strip_file']['tmp_name'], $this->request->data['WeeklyNewsletter']['strip_banner']);
            
            $this->request->data['WeeklyNewsletter']['product1_banner'] = 'files/news/'.$this->request->data['WeeklyNewsletter']['product1_file']['name'];
            copy($this->request->data['WeeklyNewsletter']['product1_file']['tmp_name'], $this->request->data['WeeklyNewsletter']['product1_banner']);

            $this->request->data['WeeklyNewsletter']['product2_banner'] = 'files/news/'.$this->request->data['WeeklyNewsletter']['product2_file']['name'];
            copy($this->request->data['WeeklyNewsletter']['product2_file']['tmp_name'], $this->request->data['WeeklyNewsletter']['product2_banner']);
             
             $this->request->data['WeeklyNewsletter']['brand1_banner'] = 'files/news/'.$this->request->data['WeeklyNewsletter']['brand1_file']['name'];
            copy($this->request->data['WeeklyNewsletter']['brand1_file']['tmp_name'], $this->request->data['WeeklyNewsletter']['brand1_banner']);

            $this->request->data['WeeklyNewsletter']['brand2_banner'] = 'files/news/'.$this->request->data['WeeklyNewsletter']['brand2_file']['name'];
            copy($this->request->data['WeeklyNewsletter']['brand2_file']['tmp_name'], $this->request->data['WeeklyNewsletter']['brand2_banner']);

            $this->request->data['WeeklyNewsletter']['featured_banner'] = 'files/news/'.$this->request->data['WeeklyNewsletter']['featured_file']['name'];
            copy($this->request->data['WeeklyNewsletter']['featured_file']['tmp_name'], $this->request->data['WeeklyNewsletter']['featured_banner']);



            if ($this->WeeklyNewsletter->save($this->request->data)) {
                $this->Session->setFlash(__('The Newsletter has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The Newsletters could not be saved. Please, try again.'));
            }
        }
    }

    public function edit($id = null) {
        $this->WeeklyNewsletters->id = $id;
        if (!$this->WeeklyNewsletters->exists()) {
            throw new NotFoundException(__('Invalid Newsletters'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->WeeklyNewsletters->save($this->request->data)) {
                $this->Session->setFlash(__('The Newsletters has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The Newsletters could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->WeeklyNewsletters->read(null, $id);
        }
    }

    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->WeeklyNewsletters->id = $id;
        if (!$this->WeeklyNewsletters->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->WeeklyNewsletters->delete()) {
            $this->Session->setFlash(__('Newsletters deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Newsletters was not deleted'));
        $this->redirect(array('action' => 'index'));
    }


    public function newsletter(){
    

    }
//////////////////////mail function////////////////////////
    public function fridayNewsletter(){



      /*  $user_id = isset($this->params->query['user_id']) ? $this->params->query['user_id'] : null;
        $conditions = array(
            'user_id' => $user_id);

        $conditions['MONTH(friend_birthday)'] = date('m');
        $conditions['DAY(friend_birthday)'] = date('d'); 
        $e = $this->wsReminderTodayException($user_id, $conditions);
        if(isset($e) && !empty($e)) $this->set('today_birthday', array('error' => $e));
        else{
            $this->log("Searching today birthday reminder for ".$user_id);
            $reminders = $this->Reminder->find('all',
                array('conditions' => $conditions,
                    'order' => 'friend_birthday ASC'
            ));
            $this->set('today_birthday', $reminders);    
        }
        $this->set('_serialize', array('today_birthday')); */
    }


   
}
?>

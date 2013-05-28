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
    public $uses = array('WeeklyNewsletter','User','UserProfile');
    public $components = array('Giftology', 'AesCrypt');
    public $paginate = array(
        'limit' => 30,
        'order' => array(
            'WeeklyNewsletter.id' => 'asc'
        )
    );
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('newsletter');
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
        $this->set('news', $this->WeeklyNewsletter->read(null, $id));
    }

    public function add() {
        if ($this->request->is('post')) {

            if($this->request->data['WeeklyNewsletter']['header_file']['name'] !="" && $this->request->data['WeeklyNewsletter']['strip_file']['name'] !="" && $this->request->data['WeeklyNewsletter']['product1_file']['name'] !="" && $this->request->data['WeeklyNewsletter']['product2_file']['name'] !="" && $this->request->data['WeeklyNewsletter']['brand1_file']['name'] !="" && $this->request->data['WeeklyNewsletter']['brand1_file']['name'] !="" && $this->request->data['WeeklyNewsletter']['brand1_file']['name'] !="")
            {
                $error_array= array();
                $allowed =  array('png' ,'jpg');
                foreach($_FILES['data']['name']['WeeklyNewsletter'] as $file){
                        $ext = pathinfo($file, PATHINFO_EXTENSION);
                        if(!in_array($ext,$allowed) ) {
                            $error_array[]=  $file;
                        }      
                    }
                    if(!$error_array) { 
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

            $this->request->data['WeeklyNewsletter']['featured_brand'] = 'files/news/'.$this->request->data['WeeklyNewsletter']['featured_file']['name'];
            copy($this->request->data['WeeklyNewsletter']['featured_file']['tmp_name'], $this->request->data['WeeklyNewsletter']['featured_brand']);
            if ($this->WeeklyNewsletter->save($this->request->data)) {
                $this->Session->setFlash(__('The Newsletter has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The Newsletters could not be saved. Please, try again.'));
            }         
            }else{
                    $err1;
                    foreach($error_array as $err){
                        $err1= $err1.' ';
                        $err1= $err1.$err.' ' ;
                        
                        
                        
                    }
                    $this->Session->setFlash(__('Please enter either JPG,PNG format for'.$err1));
                    $this->redirect(array('action'=>'index'));   
                }
        }

            else {
                $this->Session->setFlash(__('Please enter all input fields'));
                $this->redirect(array('action'=>'index'));  
            }  
        }
    }

    public function edit($id = null) {
        $this->WeeklyNewsletter->id = $id;
        if (!$this->WeeklyNewsletter->exists()) {
            throw new NotFoundException(__('Invalid Newsletters'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->WeeklyNewsletter->save($this->request->data)) {
                $this->Session->setFlash(__('The Newsletters has been edited'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The Newsletters could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->WeeklyNewsletter->read(null, $id);
        }
    }

    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->WeeklyNewsletter->id = $id;
        if (!$this->WeeklyNewsletter->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->WeeklyNewsletter->delete()) {
            $this->Session->setFlash(__('Newsletter deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Newsletter was not deleted'));
        $this->redirect(array('action' => 'index'));
    }


    public function newsletter($userid){
        DEBUGBREAK();
        $name=$this->UserProfile->find('first',array('conditions' => array('UserProfile.user_id' => $userid),'fields' => array('UserProfile.email','first_name')));
         $email=$this->WeeklyNewsletter->find('first',array('conditions' => array('WeeklyNewsletter.scheduled_time' => $userid),'fields' => array('WeeklyNewsletter.name','WeeklyNewsletter.header_banner','WeeklyNewsletter.strip_banner','WeeklyNewsletter.product1_banner','WeeklyNewsletter.product2_banner','WeeklyNewsletter.brand1_banner','WeeklyNewsletter.brand2_banner','WeeklyNewsletter.brand1_text','WeeklyNewsletter.brand2_text','WeeklyNewsletter.template_text','WeeklyNewsletter.template_heading','WeeklyNewsletter.featured_brand')));
          $mail=$name['UserProfile']['email'];
          $email = new CakeEmail();
        $email->config('smtp')
            ->template('scheduledmail', 'default') 
            ->emailFormat('html')
            //->to($user['UserProfile']['email'])
            ->to($mail)
            ->from(array('noreply@giftology.com' => 'Giftology'))
            ->subject($email['UserProfile']['first_name'].', We miss you online. More gifts to send!')
            ->viewVars(array(
                    'user_name' => $name['UserProfile']['first_name'],
                    'name' => $email['WeeklyNewsletter']['name'],
                    'header_banner' => $email['WeeklyNewsletter']['header_banner'],
                    'strip_banner' => $email['WeeklyNewsletter']['strip_banner'],
                    'product1_banner' => $email['WeeklyNewsletter']['product1_banner'],
                    'product2_banner' => $email['WeeklyNewsletter']['product2_banner'],
                    'brand1_banner' => $email['WeeklyNewsletter']['brand1_banner'],
                    'brand2_banner' => $email['WeeklyNewsletter']['brand2_banner'],
                    'brand1_text' => $email['WeeklyNewsletter']['brand1_text'],
                    'brand2_text' => $email['WeeklyNewsletter']['brand2_text'],
                    'template_text' => $email['WeeklyNewsletter']['template_text'],
                    'template_heading' => $email['WeeklyNewsletter']['template_heading'],
                    'featured_brand' => $email['WeeklyNewsletter']['featured_brand']
                    ))
             ->send();
            $this->log("Sent email to ".$name['UserProfile']['first_name']);

    

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

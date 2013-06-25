<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {
    public $helpers = array('Minify.Minify');
    public $uses = array( 'User','Vendor','Product','Reminder','Campaign');
     public $components = array('Giftology', 'AesCrypt','Search.Prg');
    public $presetVars = array(
            array('field' => 'id', 'type' => 'value'),
            array('field' => 'username', 'type' => 'value'),
            array('field' => 'first_name', 'type' => 'value'),
            array('field' => 'last_name', 'type' => 'value'),
            array('field' => 'email', 'type' => 'value'),
            array('field' => 'mobile', 'type'=> 'value'),
            array('field' => 'city', 'type'=>'value'),
            array('field' => 'gender', 'type'=>'value'),
            array('field' => 'birthday','type'=>'value'),
            array('field' => 'birthyear','type'=>'value'),
            array('field' => 'password', 'type' => 'value'),
            array('field'=> 'role','type'=>'value'),
            array('field' => 'facebook_id', 'type' => 'value'),           
            array('field'=> 'last_login','type'=>'value'),
            array('field'=> 'access_token','type'=>'value'),
            array('field'=> 'created','type'=>'value'),
            array('field'=> 'modified','type'=>'value'),
            array('field'=> 'last_mail_date','type'=>'value'),
           
        );
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('login','logout','product','email_unsubscribed','isMobile_app');
    }
    public function isAuthorized($user) {

        if (($this->action == 'login')|| ($this->action == 'defaulters_list') || ($this->action == 'update_defaulters')|| ($this->action == 'logout')

            || ($this->action == 'refreshReminders')  || ($this->action == 'setting') || ($this->action == 'email_stop')|| ($this->action == 'product') || ($this->action == 'email_unsubscribed')) {
            return true;
        }
    return parent::isAuthorized($user);
    }
    //WEB SERVICES
    public function ws_add () {
        //parse json
        //Add User, Profile, Reminders
        if(isset($this->request->data) && !empty($this->request->data))
            $json_data = $this->request->data;
        else $json_data = $this->request->input('json_decode');
        $e = $this->wsAddException($json_data);
        if(isset($e) && !empty($e) && !$e['user_exists']) $this->set('status', array('error' => $e));
        elseif($e['user_exists']){
            $status = array('Status' => 'OK', 'user_id' => $e['user_id'], 'message' => $e[10]);
            //$this->wsAddRefreshReminder($json_data);
            $this->set('status', $status);
        }
        else{
            $this->User->create();
            if ($this->User->saveAssociated($json_data)) {
                    $status = array('Status' => 'OK', 'user_id' => $this->User->getLastInsertID());
            } else {
                $status = array('Status' => 'Failed');
            }
            $this->set('status', $status);    
        }
        
        $this->set('request', $json_data);
        unset($json_data);
        $this->set('_serialize', array('status', 'request'));
    }

    public function ws_latest_friend_joined(){
        $receiver_fb_id = isset($this->params->query['user_fb_id']) ? $this->params->query['user_fb_id'] : null;
        $user = $this->User->find('first', array(
            'fields' => array('id'), 
            'conditions'=> array('facebook_id' => $receiver_fb_id)));
        $user_id = $user['User']['id'];
        $e = $this->wsLatestFriendException($user_id);
        if(isset($e) && !empty($e)) $this->set('latest_friend', array('error' => $e));
        else{
            $this->log("Searching latest friedn joined for ".$user_id);
            $latest_friend_fb_id = $this->User->find('first',
                array(
                    'fields' => array('UserProfile.latest_friend'),
                    'conditions' => array('User.id' => $user_id),
                    'contain' => array('UserProfile')
            ));
            $latest_friend_name = $this->User->find('first',
                array(
                    'fields' => array('UserProfile.first_name','UserProfile.last_name'),
                    'conditions' => array('User.facebook_id' => $latest_friend_fb_id['UserProfile']['latest_friend']),
                    'contain' => array('UserProfile')
            ));
            $latest_friend = array(
                'facebook_id' => $latest_friend_fb_id['UserProfile']['latest_friend'],
                'first_name' => $latest_friend_name['UserProfile']['first_name'],
                'last_name' => $latest_friend_name['UserProfile']['last_name']
                );
            $this->set('latest_friend', $latest_friend);    
        }
        $this->set('_serialize', array('latest_friend'));
    }
/**
 * index method
 *
 * @return void
 */
public function download_user_csv_all($download_selected = null){
        $this->setUserProfile();
        $this->Prg->commonProcess('User');
        $this->User->recursive = 0;
        $array1 = unserialize($download_selected);
         if(($array1['created_start'])||($array1['modified_start'])||($array1['last_login_start']))
     { 
         if(!($this->passedArgs['created_start'])){  
             $modified_end=$array1['modified_end'].' 23:59:59';
             $modified_start=$array1['modified_start'].' 00:00:00';
             $last_login_end=$array1['last_login_end'].' 23:59:59';
             $last_login_start=$array1['last_login_start'].' 00:00:00';
             if(!$array1['modified_end']){
                 $modified_end=$array1['modified_start'].' 23:59:59';
             }
             if(!$array1['last_login_end']){
                 $last_login_end=$array1['last_login_start'].' 23:59:59';
             }

             $conditions=array('conditions' => array($this->User->parseCriteria($array1),'User.modified >'=>$modified_start,'User.modified <' => $modified_end
                 ,'User.last_login >'=>$last_login_start,'User.last_login <' => $last_login_end
                 ),'order'=>array('User.created'=>'DESC')); 
         }

         if(!($array1['modified_start'])){
             $created_end=$array1['created_end'].' 23:59:59';
             $created_start=$array1['created_start'].' 00:00:00';
             $last_login_end=$array1['last_login_end'].' 23:59:59';
             $last_login_start=$array1['last_login_start'].' 00:00:00';
             if(!$array1['created_end']){
                 $created_end=$array1['created_start'].' 23:59:59';
             }
             if(!$array1['last_login_end']){
                 $last_login_end=$array1['last_login_start'].' 23:59:59';
             }
             $conditions=array('conditions' => array($this->User->parseCriteria($array1) ,'User.created >'=>$created_start,'User.created <' => $created_end
                 ,'User.last_login >'=>$last_login_start,'User.last_login <' => $last_login_end

                 ),'order'=>array('User.created'=>'DESC')); 
         }
         if(!($array1['last_login_start'])){
             $created_end=$array1['created_end'].' 23:59:59';
             $modified_end=$array1['modified_end'].' 23:59:59';
             $modified_start=$array1['modified_start'].' 00:00:00';

             if(!$array1['created_end']){
                 $created_end=$array1['created_start'].' 23:59:59';
             }
             if(!$array1['modified_end']){
                 $modified_end=$array1['modified_start'].' 23:59:59';
             }
             $conditions=array('conditions' => array($this->User->parseCriteria($array1) ,'User.created >'=>$created_start,'User.created <' => $created_end
                 ,'User.modified >'=>$modified,'User.modified <' => $modified

                 ),'order'=>array('User.created'=>'DESC')); 
         }
         if(!($array1['created_start'])&&(!($array1['modified_start']))){

             $last_login_end=$array1['last_login_end'].' 23:59:59';
             $last_login_start=$array1['last_login_start'].' 00:00:00';

             if(!$array1['last_login_end']){
                 $last_login_end=$array1['last_login_start'].' 23:59:59';
             }

             $conditions=array('conditions' => array($this->User->parseCriteria($array1)
                 ,'User.last_login >'=>$last_login_start,'User.last_login <' => $last_login_end
                 ),'order'=>array('User.created'=>'DESC')); 
         }
         if(!($array1['created_start'])&&(!($array1['last_login_start']))){

             $modified_end=$array1['modified_end'].' 23:59:59';
             $modified_start=$array1['modified_start'].' 00:00:00';

             if(!$array1['modified_end']){
                 $modified_end=$array1['modified_start'].' 23:59:59';
             }

             $conditions=array('conditions' => array($this->User->parseCriteria($array1)
                 ,'User.modified >'=>$modified_start,'User.modified <' => $modified_end
                 ),'order'=>array('User.created'=>'DESC')); 
         }
         if(!($array1['modified_start'])&&(!($array1['last_login_start']))){

             $created_end=$array1['created_end'].' 23:59:59';
             $created_start=$array1['created_start'].' 00:00:00';

             if(!$array1['created_end']){
                 $created_end=$array1['created_start'].' 23:59:59';
             }

             $conditions=array('conditions' => array($this->User->parseCriteria($array1)
                 ,'User.created >'=>$created_start,'User.created <' => $created_end
                 ),'order'=>array('User.created'=>'DESC')); 
         }
         if(($array1['created_start'])&&(($array1['modified_start']))&&(($array1['last_login_start'])))
         { 
             $modified_end=$array1['modified_end'].' 23:59:59';
             $modified_start=$array1['modified_start'].' 00:00:00';
             $created_end=$array1['created_end'].' 23:59:59';
             $created_start=$array1['created_start'].' 00:00:00';
             $last_login_end=$array1['last_login_end'].' 23:59:59';
             $last_login_start=$array1['last_login_start'].' 00:00:00';
             if(!$array1['modified_end']){
                 $modified_end=$array1['modified_start'].' 23:59:59';
             }
             if(!$array1['created_end']){
                 $created_end=$array1['created_start'].' 23:59:59';
             }
             if(!$array1['last_login_end']){
                 $last_login_end=$array1['last_login_start'].' 23:59:59';
             }

             $conditions=array('conditions' => array($this->User->parseCriteria($array1),'User.modified >'=>$modified_start,'User.modified <' => $modified_end
                 ,'User.created >'=>$created_start,'User.created <' => $created_end
                 ,'User.last_login >'=>$last_login_start,'User.last_login <' => $last_login_end

                 ),'order'=>array('User.created'=>'DESC'));  
         }  


     }
     else{
         $conditions= array('conditions' => array($this->User->parseCriteria($array1)),'order'=>array('User.created'=>'DESC'));

     }
        $result1= $this->User->find('all', $conditions);

         $filename = "Users ".date("Y.m.d").".csv";
                    $csv_file = fopen('php://output', 'w');
                    header('Content-type: application/csv');
                    header('Content-Disposition: attachment; filename="'.$filename.'"');
                    $header_row= array('Id','User Name','Role','Facebook Id','Last Login','Created','Modified','First Name','Last Name','Email','Mobile','City','Gender','Birthday','BirthYear','Total Friend');
                    fputcsv($csv_file,$header_row,',','"');
                    if( !empty( $this->data ))
                    {
                        foreach($result1 as $id)  
                        {
                        $total_frnd=$this->Reminder->find('count',array('conditions' => array('Reminder.user_id '=>$id['User']['id'])));

                           $this->User->recursive = 0;
                            $result= $this->User->find('first', array('conditions'=>array('User.id'=>$id['User']['id'])));
                            $row = array(
                            $result['User']['id'],
                            $result['User']['username'],
                            $result['User']['role'],
                            $result['User']['facebook_id'],
                            $result['User']['last_login'],
                            $result['User']['created'],
                            $result['User']['modified'],
                            $result['UserProfile']['first_name'],
                            $result['UserProfile']['last_name'],
                            $result['UserProfile']['email'],
                            $result['UserProfile']['mobile'],
                            $result['UserProfile']['city'],
                            $result['UserProfile']['gender'],
                            $result['UserProfile']['birthday'],
                            $result['UserProfile']['birthyear'],
                            $total_frnd
      
                             );
                            fputcsv($csv_file,$row,',','"');
                        }
                    }
                    die;
        
    }
    public function download_user_csv(){
       
          $filename = "Users ".date("Y.m.d").".csv";
                    $csv_file = fopen('php://output', 'w');
                    header('Content-type: application/csv');
                    header('Content-Disposition: attachment; filename="'.$filename.'"');
                    $header_row= array('Id','User Name','Role','Facebook Id','Last Login','Created','Modified','First Name','Last Name','Email','Mobile','City','Gender','Birthday','BirthYear','Total Friend');
                    fputcsv($csv_file,$header_row,',','"');
                    if( !empty( $this->data ))
                    {
                        foreach($this->data['chk1'] as $id)  
                        {
                        $total_frnd=$this->Reminder->find('count',array('conditions' => array('Reminder.user_id '=>$id)));

                           $this->User->recursive = 0;
                            $result= $this->User->find('first', array('conditions'=>array('User.id'=>$id)));
                            $row = array(
                            $result['User']['id'],
                            $result['User']['username'],
                            $result['User']['role'],
                            $result['User']['facebook_id'],
                            $result['User']['last_login'],
                            $result['User']['created'],
                            $result['User']['modified'],
                            $result['UserProfile']['first_name'],
                            $result['UserProfile']['last_name'],
                            $result['UserProfile']['email'],
                            $result['UserProfile']['mobile'],
                            $result['UserProfile']['city'],
                            $result['UserProfile']['gender'],
                            $result['UserProfile']['birthday'],
                            $result['UserProfile']['birthyear'],
                            $total_frnd
      
                             );
                            fputcsv($csv_file,$row,',','"');
                        }
                    }
                    die;
    }
     public function index() {
     $this->setUserProfile();
    
     $this->Prg->commonProcess('User');

     if(($this->passedArgs['created_start'])||($this->passedArgs['modified_start'])||($this->passedArgs['last_login_start']))
     { 
         if(!($this->passedArgs['created_start'])){  
             $modified_end=$this->passedArgs['modified_end'].' 23:59:59';
             $modified_start=$this->passedArgs['modified_start'].' 00:00:00';
             $last_login_end=$this->passedArgs['last_login_end'].' 23:59:59';
             $last_login_start=$this->passedArgs['last_login_start'].' 00:00:00';
             if(!$this->passedArgs['modified_end']){
                 $modified_end=$this->passedArgs['modified_start'].' 23:59:59';
             }
             if(!$this->passedArgs['last_login_end']){
                 $last_login_end=$this->passedArgs['last_login_start'].' 23:59:59';
             }

             $conditions=array('conditions' => array($this->User->parseCriteria($this->passedArgs),'User.modified >'=>$modified_start,'User.modified <' => $modified_end
                 ,'User.last_login >'=>$last_login_start,'User.last_login <' => $last_login_end
                 ),'order'=>array('User.created'=>'DESC')); 
         }

         if(!($this->passedArgs['modified_start'])){
             $created_end=$this->passedArgs['created_end'].' 23:59:59';
             $created_start=$this->passedArgs['created_start'].' 00:00:00';
             $last_login_end=$this->passedArgs['last_login_end'].' 23:59:59';
             $last_login_start=$this->passedArgs['last_login_start'].' 00:00:00';
             if(!$this->passedArgs['created_end']){
                 $created_end=$this->passedArgs['created_start'].' 23:59:59';
             }
             if(!$this->passedArgs['last_login_end']){
                 $last_login_end=$this->passedArgs['last_login_start'].' 23:59:59';
             }
             $conditions=array('conditions' => array($this->User->parseCriteria($this->passedArgs) ,'User.created >'=>$created_start,'User.created <' => $created_end
                 ,'User.last_login >'=>$last_login_start,'User.last_login <' => $last_login_end

                 ),'order'=>array('User.created'=>'DESC')); 
         }
         if(!($this->passedArgs['last_login_start'])){
             $created_end=$this->passedArgs['created_end'].' 23:59:59';
             $modified_end=$this->passedArgs['modified_end'].' 23:59:59';
             $modified_start=$this->passedArgs['modified_start'].' 00:00:00';

             if(!$this->passedArgs['created_end']){
                 $created_end=$this->passedArgs['created_start'].' 23:59:59';
             }
             if(!$this->passedArgs['modified_end']){
                 $modified_end=$this->passedArgs['modified_start'].' 23:59:59';
             }
             $conditions=array('conditions' => array($this->User->parseCriteria($this->passedArgs) ,'User.created >'=>$created_start,'User.created <' => $created_end
                 ,'User.modified >'=>$modified,'User.modified <' => $modified

                 ),'order'=>array('User.created'=>'DESC')); 
         }
         if(!($this->passedArgs['created_start'])&&(!($this->passedArgs['modified_start']))){

             $last_login_end=$this->passedArgs['last_login_end'].' 23:59:59';
             $last_login_start=$this->passedArgs['last_login_start'].' 00:00:00';

             if(!$this->passedArgs['last_login_end']){
                 $last_login_end=$this->passedArgs['last_login_start'].' 23:59:59';
             }

             $conditions=array('conditions' => array($this->User->parseCriteria($this->passedArgs)
                 ,'User.last_login >'=>$last_login_start,'User.last_login <' => $last_login_end
                 ),'order'=>array('User.created'=>'DESC')); 
         }
         if(!($this->passedArgs['created_start'])&&(!($this->passedArgs['last_login_start']))){

             $modified_end=$this->passedArgs['modified_end'].' 23:59:59';
             $modified_start=$this->passedArgs['modified_start'].' 00:00:00';

             if(!$this->passedArgs['modified_end']){
                 $modified_end=$this->passedArgs['modified_start'].' 23:59:59';
             }

             $conditions=array('conditions' => array($this->User->parseCriteria($this->passedArgs)
                 ,'User.modified >'=>$modified_start,'User.modified <' => $modified_end
                 ),'order'=>array('User.created'=>'DESC')); 
         }
         if(!($this->passedArgs['modified_start'])&&(!($this->passedArgs['last_login_start']))){

             $created_end=$this->passedArgs['created_end'].' 23:59:59';
             $created_start=$this->passedArgs['created_start'].' 00:00:00';

             if(!$this->passedArgs['created_end']){
                 $created_end=$this->passedArgs['created_start'].' 23:59:59';
             }

             $conditions=array('conditions' => array($this->User->parseCriteria($this->passedArgs)
                 ,'User.created >'=>$created_start,'User.created <' => $created_end
                 ),'order'=>array('User.created'=>'DESC')); 
         }
         if(($this->passedArgs['created_start'])&&(($this->passedArgs['modified_start']))&&(($this->passedArgs['last_login_start'])))
         { 
             $modified_end=$this->passedArgs['modified_end'].' 23:59:59';
             $modified_start=$this->passedArgs['modified_start'].' 00:00:00';
             $created_end=$this->passedArgs['created_end'].' 23:59:59';
             $created_start=$this->passedArgs['created_start'].' 00:00:00';
             $last_login_end=$this->passedArgs['last_login_end'].' 23:59:59';
             $last_login_start=$this->passedArgs['last_login_start'].' 00:00:00';
             if(!$this->passedArgs['modified_end']){
                 $modified_end=$this->passedArgs['modified_start'].' 23:59:59';
             }
             if(!$this->passedArgs['created_end']){
                 $created_end=$this->passedArgs['created_start'].' 23:59:59';
             }
             if(!$this->passedArgs['last_login_end']){
                 $last_login_end=$this->passedArgs['last_login_start'].' 23:59:59';
             }

             $conditions=array('conditions' => array($this->User->parseCriteria($this->passedArgs),'User.modified >'=>$modified_start,'User.modified <' => $modified_end
                 ,'User.created >'=>$created_start,'User.created <' => $created_end
                 ,'User.last_login >'=>$last_login_start,'User.last_login <' => $last_login_end

                 ),'order'=>array('User.created'=>'DESC'));  
         }  


     }
     else{
         $conditions= array('conditions' => array($this->User->parseCriteria($this->passedArgs)),'order'=>array('User.created'=>'DESC'));

     }

     $this->User->recursive = 0;
     //$conditions= array('conditions' => array($this->Product->parseCriteria($this->passedArgs)));
     $this->paginate = $conditions;
     $users=$this->paginate();
     foreach($users as $k => $uid) {
         $users[$k]['User']['count'] =$this->Reminder->find('count',array('conditions' => array('Reminder.user_id '=>$uid['User']['id'])));

     }
     $this->set('users', $users);
     $this->set('download_selected',serialize($this->passedArgs));
 }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
                $this->User->recursive = 2;
        //echo debug($this->User->read(null, $id));
        $this->set('user', $this->User->read(null, $id));
    }

/**
 * add method
 *
 * @return void
 */

    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }
        //$facebooks = $this->User->Facebook->find('list');
        //$this->set(compact('facebooks'));
    }

public function isMobile_app() { 
  preg_match('/' . REQUEST_ANDROID_MOBILE_USER_AGENT . '/i', $_SERVER['HTTP_USER_AGENT'], $match); 
  if (!empty($match)) { 
    return true; 
  } 
  return false; 
} 
	

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
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
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        $this->redirect(array('action' => 'index'));
    }
    
    public function login() {
        if ($this->Connect->user() && $this->Auth->User('id')){
            $this->redirect(array('controller'=>'reminders', 'action'=>'view_friends'));
        }
        else{
            $check_on_campaign=$this->Campaign->find('first',array('conditions' => array('Campaign.on_landing_page '=>1,'Campaign.enable'=>1)));
            $message = 'The fun and easy way to give <b><u>free</u></b> gift vouchers to facebook friends';
            $this->set('campaign_image',$check_on_campaign['Campaign']['wide_image']);
            $this->set('campaign_enc_id',$this->AesCrypt->encrypt($check_on_campaign['Campaign']['id']));
            $this->set('campaign_check_on',$check_on_campaign['Campaign']['on_landing_page']);
            $this->set('redirect_to',$check_on_campaign['Campaign']['redirect_to']);

            $this->set('type',$check_on_campaign['Campaign']['type']);



            $this->Product->unbindModel(array('hasMany' => array('Gift','UploadedProductCode'),
                                                                           'belongsTo' => array('Vendor','ProductType','GenderSegment','AgeSegment','CodeType','Gift')));
            $Image = $this->Product->find('all',array('fields' =>'DISTINCT Product.vendor_id' ,'conditions' => array('Product.display_order >'=>0),'limit'=>5,'order' => array('RAND()')));
            $Image_new = array();
            foreach ($Image as $Images) {
                $id=$Images['Product']['vendor_id'];
                $this->Vendor->unbindModel(array('hasMany' => array('Product')));
                $Image_new[] = $this->Vendor->find('all',array('fields' =>array('Vendor.carousel_image'),'conditions' => array('Vendor.id '=>$id)));
                $this->set('Images', $Image_new);
            }
            $this->Product->unbindModel(array('hasMany' => array('Gift','UploadedProductCode'),
                                                                           'belongsTo' => array('ProductType','GenderSegment','AgeSegment','CodeType','Gift')));
            $product = $this->Product->find('all',array('conditions' => array('Product.display_order >'=>0),'limit'=>6));
            foreach($product as $k => $p){
                $product[$k]['Product']['encrypted_gift_id'] = $this->AesCrypt->encrypt($p['Product']['id']);
            }
            $this->set('products', $product);
            $gift_count = $this->User->GiftsReceived->find('count', array('conditions' => array('GiftsReceived.sender_id !=' => UNREGISTERED_GIFT_RECIPIENT_PLACEHODER_USER_ID)));
           
            $this->set('num_gifts_sent', $gift_count);


            $slidePlaySpeed = 8000;
            if (isset($this->request->query['gift_id'])) {
                $this->Mixpanel->track('Gift Recipient arrived', array(
                    'GiftId' => $this->request->query['gift_id']
                ));

                // Set the FB OG stuff here
                $gift = $this->User->GiftsReceived->find('first', array(
                        'conditions' => array(
                            'GiftsReceived.id' => $this->request->query['gift_id']),
                        'contain' => array(
                            'Product' => array(
                                'fields' => array('Product.id'),
                                'Vendor' => array('fields' => array('name','facebook_image'))),
                'Sender' => array('UserProfile'), 'Receiver' => array('UserProfile'))
                        ));
                
                if($gift){
                    $sender_name = $gift['Sender']['UserProfile']['first_name'];
                    $this->Reminder->recursive = -1;
                    $receiver_name = $this->Reminder->find('first', array('fields' => array('friend_name'),'conditions' => array('friend_fb_id' => $gift['GiftsReceived']['receiver_fb_id'])));
                    if($receiver_name['Reminder']['friend_name'])
                        $receiver_name = $receiver_name['Reminder']['friend_name'];
                    else $receiver_name = 'you';
                    $vendor_name = $gift['Product']['Vendor']['name'];
                    $image = $gift['Product']['Vendor']['facebook_image'];
                    $value = $gift['GiftsReceived']['gift_amount'];
                    $message = "Welcome to the Giftology family!<br><br><strong>".$sender_name."</strong> has sent you a gift voucher to ".$vendor_name.".<br><br>  Connect with facebook to redeem your gift.";
                    $amount = $gift['GiftsReceived'] ['gift_amount'];
                    $slidePlaySpeed = 4000;
                    $this->setGiftsSent();
                }
            }
            else{
                $this->Mixpanel->track('Landing Page', array());
            }
            if (isset($sender_name)) 
            {
                $this->set('sender_name', $sender_name);
            }
            if (isset($receiver_name)) 
            {
                $this->set('receiver_name', $receiver_name);
            }
            
            $this->set('slidePlaySpeed', $slidePlaySpeed);
            $this->set('fb_url', FULL_BASE_URL.$_SERVER[ 'REQUEST_URI' ]);
            if (isset($vendor_name) && !empty($vendor_name)) {
                $this->set('fb_title', "Rs. ".$amount." gift voucher at ".$vendor_name);

                $this->set('fb_description', "To ".$receiver_name." \r\n From ".$sender_name);
            } else {
                $this->set('fb_title', "Giftology | Don't just post on Facebook make it a gift post! ");
                $this->set('fb_description', "Giftology.com is the new and unique way of sending awesome gifts to your Facebook friends instantly. Awesome. Free. Gifts. Signed up yet?");
            }
            if($gift['GiftsReceived']['sender_id'] == $gift['GiftsReceived']['receiver_id'])
             {
                $this->set('fb_title', "Rs. ".$amount." gift voucher at ".$vendor_name);

                $this->set('fb_description', "Giftology.com is the new and unique way of sending awesome gifts to your Facebook friends instantly. Awesome. Free. Gifts. Signed up yet?");
            }

            if($this->request->query['visit']=="first_visit"){
                $this->set('fb_title', "Giftology");    
            }

            if (isset($image)) {
                $this->set('fb_image', FULL_BASE_URL.'/'.$image);
            } else {
                $this->set('fb_image', FULL_BASE_URL.'/'.IMAGES_URL.'default_fb_image.png');        
            }
            //$this->set('fb_description', "Giftology.com is the new and unique way of sending awesome gifts to your Facebook friends instantly. Awesome. Free. Gifts. Signed up yet?");
            //set utm source if set
            
            if (isset($this->request->query['utm_source'])) {
              $this->Cookie->write('utm_source', $this->request->query['utm_source'], false, '2 days');
            }
            if (isset($this->request->query['utm_medium'])) {
                $this->Cookie->write('utm_medium', $this->request->query['utm_medium'], false, '2 days');
            }
            if (isset($this->request->query['utm_campaign'])) {
                $this->Cookie->write('utm_campaign', $this->request->query['utm_campaign'], false, '2 days');
            }
            if (isset($this->request->query['utm_term'])) {
                $this->Cookie->write('utm_term', $this->request->query['utm_term'], false, '2 days');
            }
            if (isset($this->request->query['utm_content'])) {
                $this->Cookie->write('utm_content', $this->request->query['utm_content'], false, '2 days');
            }

            $this->set('encrypted_gift_id', $this->AesCrypt->encrypt($this->request->query['gift_id']));
            $this->set('message', $message);
        //if (!$this->RequestHandler->isMobile()) {
               //$this->layout = 'landing_redeem';
        //} else {
        //$this->layout = 'mobile_landing';
        //}  
            /*if(isset($this->request->query['gift_id'])) $this->layout = 'landing_redeem';
           else{
            if(!$this->RequestHandler->isMobile()){
                $this->layout='landing';
            }else{
               
               $android=$this->isMobile_app();
                $this->set('android', $android);
                $this->layout='mobile_landing';
            }

           }*/
           if($this->RequestHandler->isMobile())
            {
                if(isset($this->request->query['gift_id']))
                    $this->layout='mobile_landing_redeem';
                else
                {
                    $android=$this->isMobile_app();
                    $this->set('android', $android);
                    $this->layout='mobile_landing';
                }
            }
            else
            {
                if(isset($this->request->query['gift_id']))
                    $this->layout = 'landing_redeem';
                else
                    $this->layout = 'landing';
            }



           // else $this->layout = 'landing';
        }
    }
   

    public function product() 
    {
        $this->Product->unbindModel(array('hasMany' => array('Gift','UploadedProductCode'),
                                                                           'belongsTo' => array('ProductType','GenderSegment','AgeSegment','CodeType','Gift')));
        $product = $this->Product->find('all',array('conditions' => array('Product.display_order >'=>0)));
        foreach($product as $k => $p){
            $product[$k]['Product']['encrypted_gift_id'] = $this->AesCrypt->encrypt($p['Product']['id']);
        }
        $this->set('products', $product);
    }
    public function logout() {

        session_destroy();
        session_start();
        /*$this->redirect("http://www.facebook.com");*/
        if($this->RequestHandler->isMobile()){
                $this->layout='mobile_landing';
            }else{
                $this->layout='landing';
            

       // $this->layout = 'landing';
        $this->set('slidePlaySpeed', '8000');
        
        $this->set('message', 'Thanks for stopping by Giftology.  Come back soon !');
        //$this->redirect($this->referer());

     //   $this->redirect($this->Auth->logout());
        $this->Product->unbindModel(array('hasMany' => array('Gift','UploadedProductCode'),
                                                                           'belongsTo' => array('Vendor','ProductType','GenderSegment','AgeSegment','CodeType','Gift')));
        $Image = $this->Product->find('all',array('fields' =>'DISTINCT Product.vendor_id' ,'conditions' => array('Product.display_order >'=>0)));
        $Image_new = array();
        foreach ($Image as $Images) 
        {
            $id=$Images['Product']['vendor_id'];
            $this->Vendor->unbindModel(array('hasMany' => array('Product')));
            $Image_new[] = $this->Vendor->find('all',array('fields' =>array('Vendor.wide_image'),'conditions' => array('Vendor.id '=>$id)));
            $this->set('Images', $Image_new);
        }

        }

        $this->Product->unbindModel(array('hasMany' => array('Gift','UploadedProductCode'),
                                                                           'belongsTo' => array('ProductType','GenderSegment','AgeSegment','CodeType','Gift')));
        $product = $this->Product->find('all',array('conditions' => array('Product.display_order >'=>0),'limit'=>6));
        foreach($product as $k => $p){
            $product[$k]['Product']['encrypted_gift_id'] = $this->AesCrypt->encrypt($p['Product']['id']);
        }
        $this->set('products', $product);
         

         
    }

    public function setting()
    {

    $user_profile = $this->User->UserProfile->find('first', array(
        'conditions' => array('user_id' => $this->Auth->user('id'))));
    $this->set('check',$user_profile['UserProfile']['email_unsubscribed']);
 
    }
    public function email_unsubscribed()
    {
        $reveiver_id = $this->request->params['named']['id'];
        $id = $this->AesCrypt->decrypt($reveiver_id);
       $this->User->UserProfile->updateAll(
                array('email_unsubscribed' => 1), 
                array('user_id' => $id));
        $this->Session->setFlash('Successfully unsubscribed from email updates. Sorry to see you go! ');
    }

    public function email_stop()
    {
        $user_profile = $this->User->UserProfile->find('first', array(
        'conditions' => array('user_id' => $this->Auth->user('id'))));
        $unsubscribed = 0;
        if(!$user_profile['UserProfile']['email_unsubscribed'])
        {
            $this->User->UserProfile->updateAll(
                array('email_unsubscribed' => 1), 
                array('user_id' => $this->Auth->user('id')));
                $unsubscribed=1;
            
        } 
        if($user_profile['UserProfile']['email_unsubscribed'])
        {
            $this->User->UserProfile->updateAll(
                array('email_unsubscribed' => 0), 
                array('user_id' => $this->Auth->user('id')));
                $unsubscribed=0;
            
        } 
        

        if ($unsubscribed==1)
         {
            $this->Session->setFlash('Successfully unsubscribed from email updates. Sorry to see you go! ');
         }
         else if ($unsubscribed==0)
         {
            $this->Session->setFlash('Successfully subscribed from email updates. Happy to see you again! ');
         }
         
         else 
         {
            $this->Session->setFlash('Unable to unsubscribe you from email.  Please contact support.');
         }
        
         $this->redirect(array(
                'controller' => 'reminders', 'action'=>'view_friends'));
    }   
    
    function beforeFacebookSave() {
        $this->Connect->authUser['User']['last_login'] = date('Y-m-d');
        $this->Connect->authUser['User']['access_token'] = '"'.$this->get_new_long_lived_access_token().'"';
        $this->setUserProfile();
        $this->setUserUtm();
        $this->setUserReminders();
        return true;
    }
    
    function afterFacebookSave($last_insert_id) {
        $updatedGiftId = $this->updatePlaceholderGifts($last_insert_id);
        if ($updatedGiftId) {
            $this->updateUTMForReferredUser($updatedGiftId, $last_insert_id);
        }
    }
    function afterFacebookLogin($first_login) {  
        if ($first_login) 
            {
                $fb_id = $this->Auth->user('facebook_id');
                $friends = $this->User->Reminders->find('all', array('fields' => array('user_id','friend_fb_id'),
                    'conditions' => array('friend_fb_id' => $fb_id)));
                foreach ($friends as $friend) 
                {
                    $user_id = $friend['Reminders']['user_id'];
                    $friend_fb_id = $friend['Reminders']['friend_fb_id'];
                     $this->User->UserProfile->updateAll(
                    array('latest_friend' => $friend_fb_id), 
                    array('user_id' => $user_id));
                }
            $this->send_welcome_email();
            return $this->redirect($this->Auth->redirect());
        }
        
        $user = $this->Auth->user(); 

        if (!$user || !isset($user['id']))
        { return; }

        $reminderUpdateDate = $this->User->Reminders->find('first', array(
                'conditions' => array('user_id' => $user['id'])));

        $daysSinceUpdate =round ((time() - strtotime($reminderUpdateDate['Reminders']['created']))/86400);
        $numReminders = $this->User->Reminders->find('count', array(
                    'conditions' => array('user_id' => $user['id'])));
    
        if ($daysSinceUpdate > 0) {
            $access_token = $this->get_new_long_lived_access_token();
        } else {
            $access_token = FB::getAccessToken();
        }
        if ($daysSinceUpdate > 0 || $numReminders < 10) {
           // Refresh old reminders
            $this->refreshReminders($user['id']);
        }
        
        //update User Profile if necesary
        if (!$this->User->UserProfile->find('first', array('conditions' => array('user_id' => $user['id'])))) {
            //no user profile, create now
            $this->setUserProfile();
            $this->Connect->authUser['UserProfile']['user_id'] = $user['id'];
            $this->User->UserProfile->save($this->Connect->authUser);
        }
        
        // Update Access token and last_login
         $this->User->updateAll(array(
           'User.username' => '"'.$this->Connect->user('username').'"',
           'User.last_login' => '"'.date('Y-m-d H:i:s').'"',
           'User.access_token' => '"'.$access_token.'"'
       ), array(
           'User.id' => $user['id']));
    }

    
    public function refreshReminders ($id ) {
        //refesh reminders
        if ($this->setUserReminders($id)) {
            if ($this->User->Reminders->deleteAll(array('user_id' => $id), false)) {
                $this->User->Reminders->saveMany($this->Connect->authUser['Reminders']);
                return true;
            }
        } else {
            $this->log("Not attempting to refresh reminders because no reminders were returned by fql");
        }
        return false;
    }
    function updatePlaceholderGifts ($last_insert_id) {

        // Main deal here is that we may have some dudes who didnt have a user account
        // before when gifts were sent to them, so the gifts went to the placeholder
        // account UNREGISTERED_GIFT_RECIPIENT_PLACEHODER_USER_ID.  Now that a
        // new user has been created, we want to check to see if this user already
        // has some placeholder gifts, and if that is the case then update the gifts
        // to the correct and valid user account, instead of placeholder
        // Might also be a good place to set User UTM, since its likely that
        // this user came in here from a sent gift - NS


        $this->User->GiftsReceived->recursive = -1;
        $giftsReceived = $this->User->GiftsReceived->find('all',
            array('conditions' => array(
                'receiver_fb_id' => $this->Connect->user('id'),
                'receiver_id' => UNREGISTERED_GIFT_RECIPIENT_PLACEHODER_USER_ID)));
        $gift_id_to_return = null;
        if (!$giftsReceived) {
            return $gift_id_to_return;
        }
        
        $this->Session->setFlash(__('Good Karma - Someone has sent you a gift. Click My Gifts above to redeem'));

        $updatedGifts = array();
        foreach($giftsReceived as $giftReceived) {
            $updatedGift['GiftsReceived']['receiver_id'] = $last_insert_id;
            $updatedGift['GiftsReceived']['id'] = $giftReceived['GiftsReceived']['id'];
            array_push($updatedGifts, $updatedGift);
            $gift_id_to_return = $giftReceived['GiftsReceived']['id'];
        }
        $this->User->GiftsReceived->saveMany($updatedGifts);
        return $gift_id_to_return;
    }
    function updateUTMForReferredUser ($updatedGiftId, $user_id) {
        $this->User->UserUtm->recursive = -1;
        $currUTM = $this->User->UserUtm->find('first',
                        array('conditions' => array(
                                'user_id' => $user_id
                        )));
        if ($currUTM) {
            return; //already has a good UTM, no need to hack in a new one 
        }
        $this->User->UserUtm->save(array('UserUtm' => array('utm_source' => 'GiftReceived',
                                              'utm_medium' => 'Generated',
                                              'utm_term' => $updatedGiftId,
                                              'user_id' => $user_id)));
    }
        
    function setUserProfile () {
        $this->Connect->authUser['UserProfile']['email'] = $this->Connect->user('email');
        
        $fb_user = $this->Connect->user();
        $location = isset($fb_user['location']) ? $fb_user['location'] : array('name' => 'not provided');
        $this->Connect->authUser['UserProfile']['city'] = $location['name'];
        
        $this->Connect->authUser['UserProfile']['gender'] = $this->Connect->user('gender');
        $this->Connect->authUser['UserProfile']['birthday'] = $this->Connect->user('birthday');
        $this->Connect->authUser['UserProfile']['first_name'] = $this->Connect->user('first_name');
        $this->Connect->authUser['UserProfile']['last_name'] = $this->Connect->user('last_name');
        
    }
    function setUserUtm() {
        if ($this->Cookie->read('utm_source')) {
            $this->Connect->authUser['UserUtm']['utm_source'] = $this->Cookie->read('utm_source');
        }
        if ($this->Cookie->read('utm_medium')) {
            $this->Connect->authUser['UserUtm']['utm_medium'] = $this->Cookie->read('utm_medium');
        }
        if ($this->Cookie->read('utm_campaign')) {
            $this->Connect->authUser['UserUtm']['utm_campaign'] = $this->Cookie->read('utm_campaign');
        }
        if ($this->Cookie->read('utm_term')) {
            $this->Connect->authUser['UserUtm']['utm_term'] = $this->Cookie->read('utm_term');
        }
    }
    function setUserReminders($user_id = null) {
        $friends = $this->getUserFriends();
        if ($friends) {
            $this->Connect->authUser['Reminders'] = array();
            foreach ($friends as $friend) {
                array_push($this->Connect->authUser['Reminders'], array (
                        'user_id' => $user_id,
                        'friend_fb_id' => $friend['uid'],
                        'friend_name' => $friend['name'],
                        'friend_birthday' => $friend['birthday'],
                        'current_location' => $friend['current_location']['city'],
                        'country' => $friend['current_location']['country'],
                        'sex' => $friend['sex'],
                        'state' => $friend['current_location']['state'],
                        'geo_location' => $this->Reminder->getDataSource()->expression("GEOMFROMTEXT('POINT(".$friend['current_location']['latitude']." ".$friend['current_location']['longitude'].")',0)")
                    ));
            }
            return true;
        } else {
            return false; 
        }
    }
    
    function getUserFriends() {
        $Facebook = new FB();
        $friends = $Facebook->api(array('method' => 'fql.query',
                                        'query' => 'SELECT uid, current_location, birthday, pic_big, name, sex FROM user WHERE uid IN (SELECT uid2 from friend where uid1=me()) ORDER BY birthday'));
        return $friends;
    }
    
    function send_welcome_email() {
        $email = new CakeEmail();
        $email->config('smtp')
              ->template('welcome', 'default') 
          ->emailFormat('html')
          ->to($this->Connect->user('email'))
          ->from(array('care@giftology.com' => 'Giftology'))
          ->subject('Welcome to Giftology')
              ->viewVars(array('name' => $this->Connect->user('name')))
              ->send();
              $this->welcome_post_to_fb();
    }
    
    function welcome_post_to_fb() {
        $url = FULL_BASE_URL.'/users/login/?visit=first_visit';
        $message = "I have joined the gifting revolution on Giftology.com! Have you?";
        $access_token = FB::getAccessToken();
        $sender_fb_id = $this->Connect->user('id');
        $this->Giftology->welcomePostToFB($sender_fb_id, $access_token, $url, $message);

    }

    public function view_gifts() {
/*        $this->User->id = $this->Auth->user('id');
        if (!$this->User->exists()) {
                throw new NotFoundException(__('Invalid user'));
        }
*/
        $this->User->Behaviors->attach('Containable');
        $this->set('user', $this->User->find('first',
                array(
                    'contain' => array(
                        'UserProfile',
                        'GiftsReceived' => array(
                            'Product' => array('Vendor'),
                            'Sender',
                            'limit' => 30,
                            'order' => 'GiftsReceived.created DESC',
                            'conditions' => array('GiftsReceived.gift_status_id' => GIFT_STATUS_VALID)),
                        'GiftsSent' => array(
                            'Product' => array('Vendor'),
                            'limit' => 30,
                            'order' => 'GiftsSent.created DESC',
                            'conditions' => array('GiftsSent.gift_status_id' => GIFT_STATUS_VALID))),
                    'conditions' => array('User.id' => $this->User->id))));
    }
    
    function setGiftsSent() {
    $this->set('num_gifts_sent', $this->User->GiftsReceived->find('count')+20000);
    $this->User->GiftsReceived->recursive = 2;
    $this->set('gifts_sent', $this->User->GiftsReceived->find('all',
          array('order'=>'GiftsReceived.id DESC',
            'limit'=>3,
            'order'=>'GiftsReceived.id DESC',
            'contain' => array(
                'Product' => array(
                    'fields' => array('id'),
                    'Vendor' => array('name')),
                'Sender' => array(
                    'fields' => array('facebook_id'))))));      
    }

    public function noutmuserlist() {
        $this->User->recursive = 0;
        $conditions = array(
            //'UserUtm.utm_source' => 'streamsend',
            'User.created LIKE' => date('Y-m-d', strtotime(date('Y-m-d')."-1day")).'%');
        $this->set('users', $this->paginate($conditions));
    }
    
    function get_new_long_lived_access_token() {
        $fields = array(        
          'client_id' => FB::getAppId(),
          'client_secret' => FB::getAppSecret(),
          'grant_type' => 'fb_exchange_token',
          'fb_exchange_token' => FB::getAccessToken(),
            );
        $ch = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL,'https://graph.facebook.com/oauth/access_token');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return the output instead of sprewing it to screen
        curl_setopt($ch,CURLOPT_POSTFIELDS,$fields);
        
        //execute post
        $result = curl_exec($ch);
        $error = curl_error($ch);
        
        $this->log($result, 'ns');

        if ($error) {
            $this->log("Unable to set new access token for ".$fb_id.$error, 'ns');
        } else {
            $ret = parse_str($result);
            $this->log('Set new access token for user '.$this->Connect->user('id').'  '.$access_token.' expires '.$expires, 'ns');
        }
        //close connection
        curl_close($ch);
        return $access_token;
    }
    /* Moved to Reminders 
    public function view_friends($type=null) {
        if (!$this->Connect->user()) {
            $this->redirect(array('controller'=>'users', 'action'=>'login'));
        }
        if ($type) {
            $this->set('all_users', $this->get_birthdays('mine','all'));
            $this->set('today_users', array('Reminders' =>array()));
            $this->set('this_month_users', array('Reminders' =>array()));

        } else {
            $this->set('all_users', array('Reminders' =>array()));
            $this->set('today_users', $this->get_birthdays('mine','today'));
            $this->set('this_month_users', $this->get_birthdays('mine','thismonth'));
        }
    }
    
        function get_birthdays ($whose, $when) {
        $find_type = 'all';
        
        if ($whose == 'mine') {
            $conditions = array(
                'User.id' => $this->Auth->user('id'));
            $find_type = 'first';
        }
        
        if ($when == 'today') {
            $reminder_conditions = array(
                            'MONTH(Reminders.friend_birthday)' => date('m'),
                            'DAY(Reminders.friend_birthday)' => date('d')); 
        } elseif ($when =='thisweek') {
            $reminder_conditions = array(
                            'Reminders.friend_birthday BETWEEN ? AND ?' => array(date("Y-m-d"), date("Y-m-d", strtotime(date("Y-m-d") . "+1 week"))));
        } elseif ($when == 'thismonth') {
            $reminder_conditions = array(
                            'Reminders.friend_birthday BETWEEN ? AND ?' => array(date("Y-m-d"), date("Y-m-d", strtotime(date("Y-m-d") . "+1 month"))));
        }
        
        $this->User->Behaviors->attach('Containable');
        $user = $this->User->find($find_type,
                array(
                    'contain' => array(
                        'UserProfile',
                        'Reminders' => array(
                            'conditions' => isset($reminder_conditions) ? $reminder_conditions : array(),
                            'order' => 'Reminders.friend_birthday ASC',
                            'limit' => 200
                    )),
                    'conditions' => isset($conditions) ? $conditions : array())
                );
        return $user;
    }

    */

    public function wsAddException($json_data){
        $error = array();
        if(!isset($json_data) && empty($json_data))
            $error[1] = "Input json data missing";

        if(!isset($json_data->User) && empty($json_data->User)){
            $error[2] = "User data is missing";    
        }
        else{
            if(!$json_data->User->username)
                $error[3] = "Username in User data is missing";
            if(!$json_data->User->facebook_id)
                $error[4] = "User facebook id is missing";        
        }

        if(!isset($json_data->UserProfile) && empty($json_data->UserProfile))
            $error[5] = "User profile data is missing";

        if(!isset($json_data->UserUtm) && empty($json_data->UserUtm))
            $error[6] = "User utm data is missing";
        else{
            if(!$json_data->UserUtm->utm_source)
                $error[7] = "User utm source is missing";    
        }

        if(!isset($json_data->Reminders) && empty($json_data->Reminders)){
            $error[8] = "User reminder data is missing";        
        }

        if(!count($json_data->Reminders))
                $error[9] = "User friends data is empty";
        
        if($json_data->User->facebook_id){
            $user_exists = $this->User->find('count', array('conditions' => array('facebook_id' => $json_data->User->facebook_id)));
            if($user_exists){
                $this->User->recursive = -1;
                $user_id = $this->User->find('first', array('fields' => array('id'), 'conditions' => array('facebook_id' => $json_data->User->facebook_id)));
                $error[10] = "User already exists";
                $error['user_exists'] = TRUE;
                $error['user_id'] = $user_id['User']['id'];    
            }
        }
                
        return $error;
    }
    
    public function wsLatestFriendException($user_id){
        $e = array();
        $this->User->recursive = -2;
        $latest_friend = $this->User->find('count',
                array(
                    'conditions' => array('User.id' => $user_id, 'UserProfile.latest_friend IS NOT NULL')
            ));
        if(!$latest_friend){
            $e[1] = "No latest friend joined Giftology";
        }
        return $e;
    }

    function defaulters_list($user_id) {
        $defaulter = FALSE;

        $defaulter_exists = $this->User->find('count', array('conditions' => array('id' => $user_id, 'defaulter' => 1)));
        if($defaulter_exists) $defaulter = TRUE;
        return $defaulter;
    }

    /*public function wsAddRefreshReminder($json_data){
        
    }*/
}
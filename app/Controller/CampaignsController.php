<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Products Controller
 *
 * @property Product $Product
 */
class CampaignsController extends AppController {
    public $helpers = array('Minify.Minify');   
     public $components = array('Defaulter', 'AesCrypt');
    public $paginate = array(
        'limit' => 100,
        'order' => array(
            'Product.display_order' => 'asc'
        )
    );
    public $uses = array('Campaign','Product','User','UserAddress','Gift','Reminder');

    public function beforeFilter() {
        parent::beforeFilter();
        if($this->Defaulter->defaulters_list($this->Connect->user('id')))
                       $this->redirect(array('controller'=>'users', 'action'=>'logout'));
        $this->Auth->Allow('index','search_friend','view_products','campaign_gift_to_sender');
        
    }

    public function isAuthorized($user) {
        if (($this->action == 'view_products') || ($this->action == 'view_product') || ($this->action == 'index')) {
            return true;
        }
        return parent::isAuthorized($user);
    }
    public function index($encrypted_product_id) {
        $product_id = $this->AesCrypt->decrypt($encrypted_product_id);
        $campaign=$this->Campaign->find('all', array('conditions' => array('Campaign.product_enc_id' => $encrypted_product_id)));
       if($campaign){
        $camp_start_date= strtotime($campaign[0]['Campaign']['start_date']) ;
        $camp_end_date= strtotime($campaign[0]['Campaign']['end_date']);
        $today_date= strtotime(date('Y-m-d H:i:s'));
        if(($campaign[0]['Campaign']['enable']== 1) && ($today_date > $camp_start_date) && ($today_date < $camp_end_date))
        {
           $this->set('campaign_wide_image',$campaign[0]['Campaign']['wide_image']);
           $this->set('campaign_id',$this->AesCrypt->encrypt($campaign[0]['Campaign']['id']));
           $this->layout='landing_campaign';
        }
         else
        {
            if($campaign[0]['Campaign']['enable']== 0){
                    $this->Session->setFlash(__('This campaign is not active.'));
                $this->redirect(array('controller' => 'reminders', 'action'=>'view_friends')); 

            }
            else{
                if($today_date < $camp_start_date){
                    $this->Session->setFlash(__('This campaign will start soon'));
                   $this->redirect(array('controller' => 'reminders', 'action'=>'view_friends')); 
 
                }
                else{
                    if($today_date > $camp_end_date){
                    $this->Session->setFlash(__('This campaign has ended.'));
                    $this->redirect(array('controller' => 'reminders', 'action'=>'view_friends')); 
                }
                }
            }
            
        }

}else{
   $this->Session->setFlash(__('This campaign is not active.'));
	$this->redirect(array('controller' => 'reminders', 'action'=>'view_friends'));  
}
 

    }
    public function view_products () {
        if ($this->Connect->user()) {
        $this->set('user', $this->Auth->user());
        $this->set('facebook_user', $this->Connect->user());
        //$product_id_enc = isset($this->request->params['named']['id']) ? $this->request->params['named']['id'] : NULL;
        $campaign_id =$this->AesCrypt->decrypt($this->params['pass'][0]);
        $this->Campaign->recursive = -1;
        $campaign=$this->Campaign->find('first', array('fields' => array('product_id','thumb_image'),'conditions' => array('Campaign.id' => $campaign_id)));
       	$product_id = $campaign['Campaign']['product_id'];
       	$this->Product->recursive = -2;
        $proddd=$this->Product->find('first', array('conditions' => array('Product.id' => $product_id),'order'=>array('Product.min_price','Product.display_order')));
        $this->Reminder->recursive = -1;
        $friend_list=$this->Reminder->find('all', 
            array('limit'=>20,
                'conditions' => array('Reminder.user_id' => $this->Auth->user('id')),
                'order' => array('RAND()')
                ));
        $this->set('friend_data',$friend_list);
        $this->set('products',$proddd);
        $this->set('encrypted_product_id',$this->AesCrypt->encrypt($product_id));
        $this->set('campaign_thumb_image',$campaign['Campaign']['thumb_image']);
        $t=time();
        $this->Session->write('campaign_id', $this->AesCrypt->encrypt($campaign_id));
        $session_time=$this->Session->write('session_time', $t);
        $this->set('session_token',$this->AesCrypt->encrypt($t));  
        }
    }

    public function view_product($id) {

       
        $this->Product->id = $id;
        if (!$this->Product->exists()) {
            throw new NotFoundException(__('Invalid product'));
        }
        $this->Product->contain(array('Vendor'));
        $this->set('product', $this->Product->read(null, $id));
        $this->Mixpanel->track('Viewing Product', array(
            'Receiver' => isset($this->request->params['named']['receiver_name']) ? 
                $this->request->params['named']['receiver_name'] : null,
            'ProductId' => $id
            ));
    }
    
    public function search_friend(){
        if($this->RequestHandler->isAjax()) {
            $this->Reminder->recursive = -1;
             $friend_list=$this->Reminder->find('all',array('fields' => array('friend_name','friend_fb_id'),'conditions' =>array (
    'Reminder.user_id' => $this->Auth->user('id'),
    'Reminder.friend_name LIKE' => "%".$this->request->data['search_key']."%"
   )));
            
        //$this->set('data',$friend_list);
        //$this->set('friends', $friend_list);
        //$this->set('_serialize', array('result'));
        //    echo $search_string;
        }

        echo json_encode($friend_list);
        $this->autoRender = $this->autoLayout = false;
        exit;
    }
    public function admin(){
                $this->Campaign->recursive = 0;
        $this->set('campaigns', $this->paginate());

    }
    public function view($id = null) {

        $this->Campaign->id = $id;
        if (!$this->Campaign->exists()) {
            throw new NotFoundException(__('Invalid Campaign'));
        }
        //$this->set('receiver_id', $this->request->params['named']['receiver_id']);
        $this->set('campaign', $this->Campaign->read(null, $id));
    }

/**
 * add method
 *
 * @return void
 */
    public function add() {
        if ($this->request->is('post')) {
            if(($this->request->data['Campaign']['thumb_file']['name']!="")&& ($this->request->data['Campaign']['wide_file']['name']!="")&& ($this->request->data['Campaign']['product_id']!="") )
            {
            $product_id=$this->request->data['Campaign']['product_id'];
            $this->request->data['Campaign']['product_enc_id']=$this->AesCrypt->encrypt($product_id);
            $this->Campaign->create();
           	$this->request->data['Campaign']['thumb_file']['name']
                = $this->request->data['Campaign']['product_id'].str_replace(" ","_", $this->request->data['Campaign']['thumb_file']['name']);
            $this->request->data['Campaign']['wide_file']['name']
                = $this->request->data['Campaign']['product_id'].str_replace(" ","_", $this->request->data['Campaign']['wide_file']['name']);
            $this->request->data['Campaign']['thumb_image'] = 'files/campaign/'.$this->request->data['Campaign']['thumb_file']['name'];
            copy($this->request->data['Campaign']['thumb_file']['tmp_name'], $this->request->data['Campaign']['thumb_image']);
            $this->request->data['Campaign']['wide_image'] = 'files/campaign/'.$this->request->data['Campaign']['wide_file']['name'];
            copy($this->request->data['Campaign']['wide_file']['tmp_name'], $this->request->data['Campaign']['wide_image']);
         if ($this->Campaign->save($this->request->data)) {
                $this->Session->setFlash(__('The Campaign has been saved'));
                $this->redirect(array('controller' => 'campaigns', 'action'=>'admin'));  
            } else {
                    $this->Session->setFlash(__('Please enter all input fields'));
                    $this->redirect(array('controller' => 'campaigns', 'action'=>'admin'));  
            }
        }
        else
            $this->Session->setFlash(__('Please enter all fields...'));
            $this->redirect(array('controller' => 'campaigns', 'action'=>'admin'));  
        }
        }
        
public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Campaign->id = $id;
        if (!$this->Campaign->exists()) {
            throw new NotFoundException(__('Invalid Campaign'));
        }
        if ($this->Campaign->delete()) {
            $this->Session->setFlash(__('Campaign deleted'));
                $this->redirect(array('controller' => 'campaigns', 'action'=>'admin'));  
        }
        $this->Session->setFlash(__('Campaign was not deleted'));
                $this->redirect(array('controller' => 'campaigns', 'action'=>'admin'));  
    }

    public function edit($id = null) {
        $this->Campaign->id = $id;
        if (!$this->Campaign->exists()) {
            throw new NotFoundException(__('Invalid Campaign'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {

            if (isset($this->request->data['Campaign']['thumb_file']['name']) && $this->request->data['Campaign']['thumb_file']['name']) {
              $this->request->data['Campaign']['thumb_file']['name']
                = $this->request->data['Campaign']['productid'].str_replace(" ","_", $this->request->data['Campaign']['thumb_file']['name']);
                $this->request->data['Campaign']['thumb_image'] = 'files/campaign/'.$this->request->data['Campaign']['thumb_file']['name'];
            copy($this->request->data['Campaign']['thumb_file']['tmp_name'], $this->request->data['Campaign']['thumb_image']);

            }
            if (isset($this->request->data['Campaign']['wide_file']['name']) && $this->request->data['Campaign']['wide_file']['name']) {
              $this->request->data['Campaign']['wide_file']['name']
                = $this->request->data['Campaign']['productid'].str_replace(" ","_", $this->request->data['Campaign']['wide_file']['name']);
                $this->request->data['Campaign']['wide_image'] = 'files/campaign/'.$this->request->data['Campaign']['wide_file']['name'];
            copy($this->request->data['Campaign']['wide_file']['tmp_name'], $this->request->data['Campaign']['wide_image']);
            
            }
            
            if ($this->Campaign->save($this->request->data)) {
                $this->Session->setFlash(__('The campaign has been saved'));
                $this->redirect(array('controller' => 'campaigns', 'action'=>'admin'));  
            } else {
                $this->Session->setFlash(__('The campaign could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Campaign->read(null, $id);
        }
    }

    public function campaign_gift_to_sender($campaign_id){
        $this->Campaign->recursive = -1;
        $product_id = $this->Campaign->find('first', array('fields' => array('product_id', 'start_date', 'end_date'),'conditions' => array('id' => $campaign_id)));
        $this->Product->recursive = -1;
        $product_details = $this->Product->find('first', array('fields' => array('min_price', 'max_price', 'min_value'),'conditions' => array('id' => $product_id['Campaign']['product_id'])));
        $this->Gift->recursive = -1;
        $sender_list = $this->Gift->find('all',array('fields' => array('DISTINCT sender_id'), 
            'conditions' => array('product_id' => $product_id['Campaign']['product_id'], 'created >' => $product_id['Campaign']['start_date'],
                'created <' => $product_id['Campaign']['end_date'])
            ));
        $receiver_list = $this->Gift->find('all',array('fields' => array('DISTINCT receiver_id'),
            'conditions' => array('product_id' => $product_id['Campaign']['product_id'], 'created >' => $product_id['Campaign']['start_date'],
                'created <' => $product_id['Campaign']['end_date'])
            ));
        $senders = array();
        $receivers = array();

        foreach($sender_list as $sender){
            $senders[] = $sender['Gift']['sender_id'];
        }

        unset($sender_list);

        foreach($receiver_list as $receiver){
            $receivers[] = $receiver['Gift']['receiver_id'];
        }

        unset($receiver_list);

        $unique_sender_list = array_diff($senders, $receivers);

        $this->User->recursive = -1;
        $unique_sender_fb_id = $this->User->find('all', array('fields' => array('id','facebook_id'), 'conditions' => array('id' => $unique_sender_list)));

        $fb_id = array();
        foreach($unique_sender_fb_id as $fb_user){
            $fb_id[$fb_user['User']['id']] = $fb_user['User']['facebook_id'];
        }

        unset($unique_sender_fb_id);

        $product_id = $product_id['Campaign']['product_id'];
        $sender_id = UNREGISTERED_GIFT_RECIPIENT_PLACEHODER_USER_ID;
        if($product_details['Product']['min_price'] == 0 && $product_details['Product']['max_price'] == 0){
            foreach($unique_sender_list as $sender){
                set_time_limit('120');
                $receiver_id = $sender;
                $receiver_fb_id = $fb_id[$sender];
                $send_now = 1;
                $amount = $product_details['Product']['min_value'];
                $this->requestAction('gifts/gift_to_campaign_senders_from_giftology/'.$sender_id.'/'.$receiver_fb_id.'/'.$product_id.'/'.$amount.'/'.$send_now);
            }
        }
        $this->autoRender = $this->autoLayout = false;
    }
}
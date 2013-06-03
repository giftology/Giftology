<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Reminders Controller
 *
 * @property Reminder $Reminder
 */
class RemindersController extends AppController {
	public $helpers = array('Minify.Minify');

	public $uses = array( 'Reminder','Product','Gift','User','UserProfile');
	public $components = array('Defaulter','AesCrypt');
	public $paginate = array(
	        'limit' => 24,
		'order' => array('friend_name' => 'ASC')
	);
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('send_reminder_email_for_user','send_reminder','active_inactive_users_list','search_friend','mail_activation');
	}

	public function isAuthorized($user) {
	    if ($this->action == 'view_friends' || $this->action == 'send_reminder_email_for_user' || $this->action == 'send_reminder' || $this->action == 'search_friend' || $this->action == 'send_success' || $this->action == 'email_update') {
	        return true;
	    }
	    return parent::isAuthorized($user);
	}

	public function ws_reminder_today(){
        $receiver_fb_id = isset($this->params->query['user_fb_id']) ? $this->params->query['user_fb_id'] : null;
        $user = $this->User->find('first', array(
        	'fields' => array('id'), 
        	'conditions'=> array('facebook_id' => $receiver_fb_id)));
        $user_id = $user['User']['id'];
        $conditions = array(
            'user_id' => $user_id);

        $conditions['MONTH(friend_birthday)'] = date('m');
        $conditions['DAY(friend_birthday)'] = date('d'); 
		$e = $this->wsReminderTodayException($user_id, $conditions);
		if(isset($e) && !empty($e)) $this->set('today_birthday', array('error' => $e));
        else{
            $this->log("Searching today birthday reminder for user id".$user_id);
            $reminders = $this->Reminder->find('all',
                array(
                	'fields' => array('Reminder.friend_fb_id', 'Reminder.friend_name'),
                	'conditions' => $conditions,
                    'order' => 'friend_birthday ASC',
            ));
            $this->set('today_birthday', $reminders);    
        }
		$this->set('_serialize', array('today_birthday'));
	}


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
		public function send_success(){
			$this->reminder_view_friends();
	        $this->render('view_friends');	
	        $this->autoRender = $this->autoLayout = false;    
		
		}

		public function view_friends($type=null) 
		{
			if($this->Connect->user()){
		        $this->User->id = $this->Auth->User('id');
		        $this->User->updateAll(
		        array('User.last_login' => "'".date('Y-m-d H:i:s')."'"),
		        array('User.id' => $this->Auth->User('id'))
		        );
		    }
		    $gift_claimable=$this->Gift->find('first',array('fields'=>array('id'),'conditions' => array('Gift.receiver_id' => $this->Auth->user('id'),'Gift.claim' =>0,'Gift.expiry_date <' => date(Y-m-d),'Gift.gift_status_id' => 1)));
          	//$this->set('us',$us);
		    if(isset($gift_claimable) && !empty($gift_claimable)){
		    	$this->redirect(array('controller' => 'gifts', 'action' => 'claim'));	
		    }
		    else $this->reminder_view_friends($type);	
		}

	public function reminder_view_friends($type=null){
		
		$Facebook = new FB();
		$friends= array();
        $friends = $Facebook->api(array('method' => 'fql.query',
                                        'query' => 'SELECT uid FROM user WHERE  current_location.country == "india" AND uid IN (SELECT uid2 from friend where uid1=me()) order by rand() limit 50'));
        $fb_id_array =array();
        if(isset($friends) && !empty($friends)){
        	foreach ($friends as $frnd){
        		$fb_id_array[]= $frnd['uid'];    
        	}
   		 	$this->set('facebook_id',$fb_id_array);	
        }$users = $this->UserProfile->find('first', array('fields' => array('user_id','email','created','mail_verified'), 'conditions' => array('user_id' => $this->Auth->user('id'))));
		$this->set('user_mail',$users['UserProfile']['email']);
		$this->set('user_created',$users['UserProfile']['created']);
		$this->set('mail_verified',$users['UserProfile']['mail_verified']);

		$fb_id = $this->User->find('first',array('fields' => array('id','facebook_id'),'conditions' => array('User.id' => $users['UserProfile']['user_id'])));
		
		$fb_first_last_name = $Facebook->api(array('method' => 'fql.query',
                                    'query' => 'SELECT first_name, last_name FROM user WHERE uid = '.$fb_id['User']['facebook_id']));
		$data = array(
                'UserProfile.first_name' => "'".$fb_first_last_name[0]['first_name']."'",
                'UserProfile.last_name' => "'".$fb_first_last_name[0]['last_name']."'"
            );
        $condition = NULL;
        $condition = array('UserProfile.user_id' => $fb_id['User']['id']);
        $result = $this->UserProfile->updateAll($data, $condition);
        $enc_fb_id = $this->AesCrypt->encrypt($fb_id['User']['facebook_id']); 
        $this->set('id', $enc_fb_id);
        $this->set('name', $fb_first_last_name); 
        $gift_send_date = $this->Gift->find('first',array('fields'=>array('created'),'conditions' => array('AND'=>array('Gift.receiver_id' => $this->Auth->user('id'),'Gift.sender_id' =>$this->Auth->user('id'))),'order'=>'Gift.id DESC',));
        $this->set('send_date', $gift_send_date);

        
		if($this->Defaulter->defaulters_list($this->Connect->user('id')))
			$this->redirect(array('controller'=>'users', 'action'=>'logout'));	 
		$this->Reminder->recursive = -1;
        $this->set('title_for_layout', 'Select a friend');
         $friend_list=$this->Reminder->find('count',array('conditions' =>array (
    		'Reminder.user_id' => $this->Auth->user('id'))));
          $this->set('total_friends', $friend_list);
		// First off email maketing cookies 
        if ($this->Cookie->read('utm_source') == 'swaransoft') {
            $this->set('fire_swaransoft_pixel', 1);
            $this->Cookie->delete('utm_source');
        }

		if (!$this->Connect->user()) {
		    $this->redirect(array('controller'=>'users', 'action'=>'login'));
		}
		if ($this->request->is('post')) {
                $all_users= $this->get_birthdays($this->request->data['Reminders']['friend_name'],'all', 1);
				  foreach($all_users as $k => $all_user){
			           $all_users[$k]['Reminder']['encrypted_friend_fb_id'] = $this->AesCrypt->encrypt($all_user['Reminder']['friend_fb_id']);
		             }
				$this->set('all_users', $all_users);
				$this->set('today_user', array());
			    $this->set('this_month_user', array());
				$this->set('friends_active', 'active');			
		} else {
			if ($type) {//type = all
				$all_users=$this->get_birthdays('mine','all', 1);
				  foreach($all_users as $k => $all_user){
			           $all_users[$k]['Reminder']['encrypted_friend_fb_id'] = $this->AesCrypt->encrypt($all_user['Reminder']['friend_fb_id']);
		             }

				$this->set('all_users',$all_users);
				
				$this->set('friends_active', 'active');
			    } else {
			    $today_users = $this->get_birthdays('mine','today');
			    foreach($today_users as $k => $today_user){
					$today_users[$k]['Reminder']['occasion'] = "Birthday";
				}
				$no_today_users = count($today_users);
				if($no_today_users < 6 && SUGGESTED_FRIENDS)
				{
					$friend_list=$this->Reminder->find('all', array('limit'=>5,
                		'conditions' => array('AND'=>array('Reminder.user_id' => $this->Auth->user('id'),'Reminder.country' => 'India')),'order' => array('RAND()')));
					if($no_today_users == 0 && SUGGESTED_FRIENDS)
					{
						$friend_list=$this->Reminder->find('all', array('limit'=>1,
                		'conditions' => array('AND'=>array('Reminder.user_id' => $this->Auth->user('id'),'Reminder.country' => 'India')),'order' => array('RAND()')));
					}
					$gift_send_friend = $this->Gift->find('first',array('fields'=>array('sender_id','created'),'conditions' => array('Gift.receiver_id' => $this->Auth->user('id')),'order'=>'Gift.id DESC'));
				 	$gift_send_facebook_id = $this->User->find('first',array('fields'=>array('facebook_id'),'conditions' => array('User.id' => $gift_send_friend['Gift']['sender_id'])));
					$gift_send_friend_lists=$this->Reminder->find('all', array(
                		'conditions' => array('AND'=>array('Reminder.friend_fb_id' => $gift_send_facebook_id['User']['facebook_id'],'Reminder.user_id'=>$this->Auth->user('id')))));
					foreach($gift_send_friend_lists as $k => $gift_send_friend_list){
			           $gift_send_friend_lists[$k]['Reminder']['occasion'] = "Return Gift";
			       	}
		       		$gift_send_friend_hide = $this->Gift->find('first',array('conditions' => array('AND'=>array('Gift.sender_id' => $this->Auth->user('id'),'Gift.receiver_id'=>$gift_send_friend['Gift']['sender_id'],'Gift.created >'=>$gift_send_friend['Gift']['created'])),'order'=>'Gift.id DESC'));
			           if($gift_send_friend_hide){
			           	$gift_send_friend_lists = NULL;
			        }
 
		            $latest_friend = $this->UserProfile->find('first', array('fields' => array('latest_friend'),'conditions' => array('UserProfile.user_id' => $this->Auth->user('id'))));
		            $latest_friend_data = $this->Reminder->find('all', array(
                		'conditions' => array('AND'=>array('Reminder.friend_fb_id' => $latest_friend['UserProfile']['latest_friend'],'Reminder.user_id'=>$this->Auth->user('id')))));
		            foreach($latest_friend_data as $k => $latest_friends){
                       if($latest_friends['Reminder']['sex'] == "male") $latest_friend_data[$k]['Reminder']['occastion'] = "Welcome Him";
                       if($latest_friends['Reminder']['sex'] == "female") $latest_friend_data[$k]['Reminder']['occastion'] = "Welcome Her";  

		            }
		            $latest_friend_hide = $this->Gift->find('first',array('conditions' => array('AND'=>array('Gift.sender_id' => $this->Auth->user('id'),'Gift.receiver_fb_id'=>$latest_friend['UserProfile']['latest_friend'])),'order'=>'Gift.id DESC'));
		            if($latest_friend_hide){
			           	$latest_friend_data = NULL;
			        }

			          
			        if($latest_friend_data != NULL && $gift_send_friend_lists != NULL)
			        {	
			        	$merge_list = array_merge($gift_send_friend_lists,$latest_friend_data);
			        	$suggested_list = array_merge($merge_list,$friend_list);
			 			foreach($suggested_list as $k => $suggested_lists){
			         		$suggested_list[$k]['Reminder']['occasion'] = "Suggested";
		             	}
			        }
			           
			        if($latest_friend_data == NULL && $gift_send_friend_lists != NULL)
			        {
			           	$suggested_list = array_merge($gift_send_friend_lists,$friend_list);
			 			foreach($suggested_list as $k => $suggested_lists){
			           		$suggested_list[$k]['Reminder']['occasion'] = "Suggested";
		             	}
			        }
			        if($latest_friend_data != NULL && $gift_send_friend_lists == NULL)
			        {
			        	$suggested_list = array_merge($latest_friend_data,$friend_list);
			 			foreach($suggested_list as $k => $suggested_lists){
			           		$suggested_list[$k]['Reminder']['occasion'] = "Suggested";
		             	}
			        }
			        if($latest_friend_data == NULL && $gift_send_friend_lists == NULL)
			        {
			           	$suggested_list = $friend_list;
			 			foreach($suggested_list as $k => $suggested_lists){
			           		$suggested_list[$k]['Reminder']['occasion'] = "Suggested";
		             	}
			        }
		            
			 		$today_users = array_merge($today_users,  $suggested_list);
			 		$today_users = array_slice($today_users, 0, 6);
				}

				$tommorrow_users = $this->get_birthdays('mine','tommorrow');
				$thismonth_users = $this->get_birthdays('mine','thismonth');
				$nextmonth_users = $this->get_birthdays('mine','nextmonth');
				if (empty($today_users) && empty($tommorrow_users) &&
				    empty($thismonth_users) && empty($nextmonth_users)) {
					$refresh_reminders = $this->requestAction('users/refreshReminders/'.$this->Auth->user('id'));
					if (!$refresh_reminders) {
						$this->redirect('/reminders/view_friends');
					}

					//type = all
					 $all_users=$this->get_birthdays('mine','all', 1);
				  foreach($all_users as $k => $all_user){
			           $all_users[$k]['Reminder']['encrypted_friend_fb_id'] = $this->AesCrypt->encrypt($all_user['Reminder']['friend_fb_id']);
		             }

				$this->set('all_users',$all_users);
					$this->set('friends_active', 'active');
					$this->Session->setFlash(__('You have no upcoming birthdays.  Displaying all friends'));
				} else {
					
                    //$encrypt_id = $thismonth_users[0]['Reminder']['friend_fb_id'];

                    foreach($thismonth_users as $k => $thismonth_user){
			           $thismonth_users[$k]['Reminder']['encrypted_friend_fb_id'] = $this->AesCrypt->encrypt($thismonth_user['Reminder']['friend_fb_id']);
		             }

					foreach($tommorrow_users as $k => $tommorrow_user){
						$tommorrow_users[$k]['Reminder']['encrypted_friend_fb_id'] = $this->AesCrypt->encrypt($tommorrow_user['Reminder']['friend_fb_id']);
					}

					foreach($today_users as $k => $today_user){
						$today_users[$k]['Reminder']['encrypted_friend_fb_id'] = $this->AesCrypt->encrypt($today_user['Reminder']['friend_fb_id']);
					}

					foreach($nextmonth_users as $k => $nextmonth_user){
						$nextmonth_users[$k]['Reminder']['encrypted_friend_fb_id'] = $this->AesCrypt->encrypt($nextmonth_user['Reminder']['friend_fb_id']);
					}
					

             
                    $this->set('today_users', $today_users);
					$this->set('tommorrow_users', $tommorrow_users);
					$this->set('this_month_users', $thismonth_users);
					$this->set('next_month_users', $nextmonth_users);    
                   	$this->set('celebrations_active', 'active');
				}
			}
		}
		$this->setGiftsSent();
		if ($this->request->is('post')) {  
			$this->Mixpanel->track('Search Friend', array(
    	            'search_term' => $this->request->data['Reminders']['friend_name'],
            	));
		} else {
			$this->Mixpanel->track($type ? 'View Friends' : 'View Events', array());			
		}

	}

	 public function search_friend(){
	 	if($this->RequestHandler->isAjax()) {
            $this->Reminder->recursive = -1;
             $friend_list=$this->Reminder->find('all',array('conditions' =>array (
				    'Reminder.user_id' => $this->Auth->user('id'),
				    'Reminder.friend_name LIKE' => "%".$this->request->data['search_key']."%"
				   )));
              foreach($friend_list as $k => $all_user){
			           $friend_list[$k]['Reminder']['encrypted_friend_fb_id'] = $this->AesCrypt->encrypt($all_user['Reminder']['friend_fb_id']);
		             }
            
        //$this->set('data',$friend_list);
        //$this->set('friends', $friend_list);
        //$this->set('_serialize', array('result'));
        //    echo $search_string;
        }

        echo json_encode($friend_list);
        $this->autoRender = $this->autoLayout = false;
        exit;
    }

    /*public function send_reminder_emails () {
        $users = $this->get_birthdays('all_users', 'thismonth');
        foreach($users as $user) {
            $this->send_reminder_email($user);
        }
    }*/ //no longer works
    public function send_reminder_email_for_user($id) {
    $user = $this->Reminder->User->find('first', array(
		'conditions' => array('User.id' => $id),
		'contain'=>array('UserProfile')));
	if (!$user['UserProfile']['email']) {
		$this->log ("ERROR: User without an email ID:".$id);
		return;
	}
	else {
		if ($user['UserProfile']['email_unsubscribed']==1) {
			return;
		}
	}
        $reminders = $this->get_birthdays($id, 'thisweek');
	if ($reminders && sizeof($reminders)) {
		 $last_login_info=$this->User->find('first',array('conditions' => array('User.id' => $id),'fields' => array('User.last_login','User.last_mail_date')));
         $last_login_date = strtotime($last_login_info['User']['last_login']);
         $last_mail_date = strtotime($last_login_info['User']['last_mail_date']);
  			$date_to_compare = strtotime(date('Y-m-d H:i:s'));
			$last_login_date_diff = floor(abs($date_to_compare - $last_login_date) / 86400);
		    $last_mail_date_diff =  floor(abs($date_to_compare - $last_mail_date) / 86400);
		
			if(($last_mail_date_diff>=15) && ($last_login_date_diff<=30)){
               $this->User->updateAll(
            	array('User.last_mail_date' => "'".date('Y-m-d H:i:s')."'"),
            	array('User.id' => $id)
            	);
			    $this->send_reminder_email($user, $reminders);

			}
		    if(($last_mail_date_diff>=10) && ($last_login_date_diff>30) ){
			     $this->User->updateAll(
            	array('User.last_mail_date' => "'".date('Y-m-d H:i:s')."'"),
            	array('User.id' => $id)
            	);
			    $this->send_reminder_email($user, $reminders);
			}
	        
	}
	return;
    }
    function send_reminder_email($user,$reminders) {
    	$product = $this->Product->find('all',array('conditions' => array('Product.display_order >' => 0), 'limit' => 3));
		$id = $this->AesCrypt->encrypt($user['User']['id']);
        $email = new CakeEmail();
		$email->config('smtp')
        	->template('reminder', 'default') 
	      	->emailFormat('html')
	    	->to($user['UserProfile']['email'])
	    	->from(array('noreply@giftology.com' => 'Giftology'))
	    	->subject($user['UserProfile']['first_name'].' '.$user['UserProfile']['last_name'].': '.sizeof($reminders).' Birthdays this week')
              ->viewVars(array('name' => $user['UserProfile']['first_name'].' '.$user['UserProfile']['last_name'],
			       'num_birthdays' => sizeof($reminders),
			       'products' => $product,
			       'id' => $id,
			       'linkback' => FULL_BASE_URL.'/reminders/view_friends/utm_source:member_list/utm_medium:email/utm_campaign:reminder_email',
                               'reminders' => $reminders))
             ->send();
			$this->log("Sent REminder email to ".$user['UserProfile']['first_name'].' '.$user['UserProfile']['last_name']);
    }

    function send_reminder_email_missing_you($user,$last_login) {
		$product = $this->Product->find('all',array('conditions' => array('Product.display_order >' => 0), 'limit' => 3));
        $email = new CakeEmail();
		$email->config('smtp')
        	->template('missing_email', 'default') 
	      	->emailFormat('html')
	    	//->to($user['UserProfile']['email'])
	    	->to('alok@giftology.com')
	    	->from(array('noreply@giftology.com' => 'Giftology'))
	    	->subject($user['UserProfile']['first_name'].' '.$user['UserProfile']['last_name'].', We miss you online. More gifts to send!')
            ->viewVars(array(
            		'name' => $user['UserProfile']['first_name'].' '.$user['UserProfile']['last_name'],
			       	'products' => $product,
			       	'linkback' => FULL_BASE_URL.'/reminders/view_friends/utm_source:member_list/utm_medium:email/utm_campaign:reminder_email',
                   	'last_login' => $last_login))
             ->send();
			$this->log("Sent REminder email to ".$user['UserProfile']['first_name'].' '.$user['UserProfile']['last_name']);
    }
	
	function get_birthdays ($whose, $when, $do_pagination=0) {
                    
		if ($whose == 'mine') {
		    $conditions = array(
			'user_id' => $this->Auth->user('id'));
		} elseif ($whose != 'all_user') {
			if (is_numeric($whose)) {
				$conditions = array(
					'user_id' => $whose
				);
			} else {
				$conditions = array(
					'friend_name LIKE' => "%".$whose."%",
					'user_id' => $this->Auth->user('id')
				);
			}
		}		
		if ($when == 'today') {
			$conditions['MONTH(friend_birthday)'] = date('m');
			$conditions['DAY(friend_birthday)'] = date('d'); 
		} elseif ($when =='tommorrow') {
			$conditions['friend_birthday'] = date('Y-m-d', strtotime(date('Y-m-d')."+1 days")); 
		} elseif ($when =='thisweek') {
		    $conditions['friend_birthday BETWEEN ? AND ?'] =
		    array(date("Y-m-d"), date("Y-m-d", strtotime(date("Y-m-d") . "+1 week")));
		    $conditions['DAY(friend_birthday) <>'] = date('d');
		} elseif ($when == 'thismonth') {
		    $conditions['MONTH(friend_birthday)'] = date('m');
		    $conditions['friend_birthday >'] = date('Y-m-d', strtotime(date('Y-m-d')."+1 days"));
		} elseif ($when == 'nextmonth') {
		    $conditions['MONTH(friend_birthday)'] = date('m', strtotime(date('Y-m-d')."+1 month"));
		}
		$this->Reminder->recursive = -1;
		if ($do_pagination) {
			$reminders = $this->paginate($conditions);
		} else {	
			$reminders = $this->Reminder->find('all',
			    array('conditions' => $conditions,
		  		  'order' => 'friend_birthday ASC'
			));

		}
		$receiver_info = array();
		foreach ($reminders as $reminder) {
			$fb_id=$reminder['Reminder']['friend_fb_id'];
			$receiver_info[]['count'] = $this->Gift->find('count',array('conditions' => array('AND'=>array('Gift.receiver_fb_id' => $fb_id,'Gift.sender_id' =>$this->Auth->user('id'),'Gift.gift_status_id !=' => GIFT_STATUS_TRANSACTION_PENDING),'Gift.expiry_date >='=>date('Y-m-d'))));
			
		}
		
		$result = array();
				foreach($reminders as $key=>$val){ // Loop though one array
				    $val2 = $receiver_info[$key]; // Get the values from the other array
				    $result[$key] = $val + $val2; // combine 'em
				}
				
		return $result;
    }
	function setGiftsSent() {
		$this->set('num_gifts_sent', $this->Reminder->User->GiftsReceived->find('count', array('conditions' => array('GiftsReceived.sender_id !=' => UNREGISTERED_GIFT_RECIPIENT_PLACEHODER_USER_ID))));
		$this->Reminder->User->GiftsReceived->recursive = 2;
		$fields = array('GiftsReceived.sender_id, GiftsReceived.receiver_fb_id, 
			GiftsReceived.product_id, GiftsReceived.created');
		$group = array('GiftsReceived.sender_id');
		$conditions = array('gift_status_id' => GIFT_STATUS_VALID, 'GiftsReceived.sender_id !=' => UNREGISTERED_GIFT_RECIPIENT_PLACEHODER_USER_ID);
		// will implement later when we have perfect UI
		/*$days_before_mail = "7";
		$product_expire_date=date('Y-m-d', strtotime('+'.$days_before_mail.'days', strtotime(date('Y-m-d'))));
		$gift_open = $this->Gift->find('all',
			      array('order'=>'Gift.gift_open_date DESC',
				    'limit'=>3,
				    'conditions' => array('AND'=>array('Gift.gift_open'=>1,'sender_id' => $this->Auth->user('id'))),
				    'order'=>'Gift.gift_open_date DESC',
					//'group'=> $group,
				    'contain' => array(
						'Product' => array(
							'fields' => array('id'),
							'Vendor' => array('name')),
						'Sender' => array(
							'fields' => array('facebook_id')))));
		$gift_expires = $this->Gift->find('all',
			      array(
				    'limit'=>2,
				    'conditions' => array('AND'=>array('Gift.expiry_date'=>$product_expire_date,'receiver_id' => $this->Auth->user('id'))),
				    
					//'group'=> $group,
				    'contain' => array(
						'Product' => array(
							'fields' => array('id'),
							'Vendor' => array('name')),
						'Sender' => array(
							'fields' => array('facebook_id')))));
		
		$this->set('gifts_opens', $gift_open);
		$this->set('gift_expires', $gift_expires);*/
		$gift_sent_details = $this->Reminder->User->GiftsReceived->find('all',
			      array('order'=>'GiftsReceived.id DESC',
				    'limit'=>25,
				    'fields' => $fields,
				    'conditions' => $conditions,
				    'order'=>'GiftsReceived.id DESC',
					//'group'=> $group,
				    'contain' => array(
						'Product' => array(
							'fields' => array('id'),
							'Vendor' => array('name')),
						'Sender' => array(
							'fields' => array('facebook_id')))));
		$this->UserProfile->recursive = -1;
		$this->Reminder->recursive = -1;

		$Facebook = new FB();
		
		foreach($gift_sent_details as $k => $gift){
			$sender_name = $this->UserProfile->find('first', array('fields' => array('first_name','last_name'),'conditions' => array('UserProfile.user_id' => $gift['GiftsReceived']['sender_id'])));
			$receiver_name = $this->Reminder->find('first', array('fields' => array('friend_name'),'conditions' => array('friend_fb_id' => $gift['GiftsReceived']['receiver_fb_id'])));
			if(!$receiver_name){
				set_time_limit(120);
				$receiver_first_last_name = $Facebook->api(array('method' => 'fql.query',
                                    'query' => 'SELECT first_name, last_name FROM user WHERE uid = '.$gift['GiftsReceived']['receiver_fb_id']));
				$sender_name['UserProfile'] = $receiver_first_last_name[0];
			}

			if(!$sender_name){
				set_time_limit(120);
				$sender_first_last_name = $Facebook->api(array('method' => 'fql.query',
                                    'query' => 'SELECT first_name, last_name FROM user WHERE uid = '.$gift['Sender']['facebook_id']));	
				$sender_name['UserProfile'] = $sender_first_last_name[0];
			}
			$receiver_name_arr = NULL;
			$receiver_name_arr = explode(" ",$receiver_name['Reminder']['friend_name']);
			$gift_sent_details[$k]['sender_name'] = $sender_name;
			$gift_sent_details[$k]['receiver_name']['Reminder']['friend_name'] = $receiver_name_arr[0];
			$gift_sent_details[$k]['gift_timestamp'] = $this->gift_sent_timestamp($gift['GiftsReceived']['created']);
		}

		
		$this->set('gifts_sent', $gift_sent_details);
		unset($gift_sent_details);
    }
/*
 delete
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
 	public function send_reminder(){
        $dw = date( "w", time());
    	$users = $this->User->find('list', 
            array(
                'fields' => array('id'), 
                'conditions' => array('(id % 5)' => $dw),
                'order' => array('id' => 'ASC')
            ));
        $sliced_user_array = array();
        $csv_users = array();
        $fp1 = fopen(ROOT.'/app/tmp/send_reminder.csv', 'rb');
        $temp = sizeof($fp1);
        while($linearray = fgetcsv($fp1)) {
            $csv_users[] = $linearray[0];
        }
        
        fclose($fp1);
    	$fp = fopen(ROOT.'/app/tmp/send_reminder.csv', 'a+');
        
        if(count($users) > 100 && empty($csv_users))
            $sliced_user_array = array_slice($users,0,100);
        else{
            $remaining_user_list = array_diff($users,$csv_users);
            $sliced_user_array = array_slice($remaining_user_list,0,100);
        }

    	foreach($sliced_user_array as $id){
    		set_time_limit(300);
    		$user = $this->Reminder->User->find('first', array(
				'conditions' => array('User.id' => $id),
				'contain'=>array('UserProfile')));
			if (!$user['UserProfile']['email']) {
				$this->log ("ERROR: User without an email ID:".$id);
			}
			else if ($user['UserProfile']['email_unsubscribed']==1) {
					$this->log ("ERROR: User has unsubscribed for reminder email, ID:".$id);
			}
            else{
                $reminders = $this->get_birthdays($id, 'thisweek');
                if(!$reminders){
                    $reminder_count = $this->Reminder->find('count', array(
                    'conditions' => array('user_id' => $id)));
                    if(!$reminder_count){
                        if($user['User']['last_login'] && !trim($user['User']['last_login'],'-0:')) $last_login = $user['User']['last_login'];
                        else $last_login = $user['User']['modified'];
                        $this->send_reminder_email_missing_you($user, $last_login);
                    }
                }

                if ($reminders && sizeof($reminders)) {
                        $this->send_reminder_email($user, $reminders);
                }
                fputcsv($fp,array($id));    
            }
    	}
    	fclose($fp);
    }

    public function active_inactive_users_list(){
    	ini_set("max_execution_time",0);
    	$users = $this->User->find('list', 
            array(
                'fields' => array('id'),
                'order' => array('id' => 'ASC')
            ));
    	$fp = fopen(ROOT.'/app/tmp/inactive_users_list.csv', 'a+');
    	$fp1 = fopen(ROOT.'/app/tmp/active_users_list.csv', 'a+');
    	foreach($users as $id){
    		set_time_limit(300);
    		$user = $this->Reminder->User->find('first', array(
				'conditions' => array('User.id' => $id),
				'contain'=>array('UserProfile')));
			
            if($user['UserProfile']['email'] && $user['UserProfile']['email_unsubscribed']!=1){
                
                $reminder_count = $this->Reminder->find('count', array(
                'conditions' => array('user_id' => $id)));
                if(!$reminder_count){
                	fputcsv($fp,array($user['User']['id'],$user['UserProfile']['first_name'], $user['UserProfile']['last_name'], $user['UserProfile']['email'], $user['User']['last_login']));    
               	}
               	else{
               		fputcsv($fp1,array($user['User']['id'],$user['UserProfile']['first_name'], $user['UserProfile']['last_name'], $user['UserProfile']['email'], $user['User']['last_login']));    
               	}
            }
    	}
    	fclose($fp);
    	fclose($fp1);
    	$this->autoRender = $this->autoLayout = false;
    }

     public function email_update(){
        if($this->RequestHandler->isAjax()){
        	$email_to_update = $this->request->data['email'];
    		$user_data = $this->UserProfile->find('first', array('fields' => array('first_name','last_name'), 'conditions' => array('User_id' => $this->Auth->user('id') )));
            $update = $this->User->UserProfile->updateAll(
            	array('UserProfile.email_to_verify' => "'".$email_to_update."'"), 
                array('User_id' => $this->Auth->user('id'))
                );
            if($update){
            	$generatedKey = md5(rand(10000,99999).$email_to_update);
               	$link = FULL_BASE_URL.'/reminders/mail_activation?email='.$email_to_update.'&key='.$generatedKey ;
              	$update = $this->User->UserProfile->updateAll(
              		array('UserProfile.verification_passkey' => "'".$generatedKey."'",'UserProfile.mail_verified'=> '2'), 
                    array('User_id' => $this->Auth->user('id')));
				$email = new CakeEmail();
				$email->config('smtp')
				  	->template('mail_verification','default') 
				    ->emailFormat('html')
				    ->to($email_to_update)
				    ->from(array('noreply@giftology.com' => 'Giftology'))
				    ->subject('Welcome')
				    ->viewVars(array('name' =>$user_data['UserProfile']['first_name'].' '.$user_data['UserProfile']['last_name'],'email' =>$email_to_update,'link' =>$link))
				    ->send();
				$this->log("Verification email send to ".$user_data['UserProfile']['first_name'].' '.$email_to_update);
				//$this->setflash("Activation link has been sent to".' '.$email_to_update);
	            $response= "Verification mail has been sent to your Id";

			    echo json_encode($response);
	            $this->autoRender = $this->autoLayout = false;
	            exit;
			}else{
                $response= "failed try again";
                echo json_encode($response);
                $this->autoRender = $this->autoLayout = false;
                exit;			    
	        }
        }else{
        	// $this->setflash('Oops! Wrong action Please Try Again');
            $response= "failed try again";
           	echo json_encode($response);
            $this->autoRender = $this->autoLayout = false;
            exit;
        }
    }
    public function mail_activation(){
    // if ($this->Connect->user() && $this->Auth->User('id')){
    	if((isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['key']) && !empty($_GET['key']))){
            $email=$_GET['email'];
    		$passkey=$_GET['key'];
    		$user_data = $this->UserProfile->find('first', array('fields' => array('email_to_verify','verification_passkey','first_name','email'), 'conditions' => array('verification_passkey' => $passkey )));
    		if(($user_data['UserProfile']['verification_passkey']== $passkey && $user_data['UserProfile']['email_to_verify']== $email)){
                $update = $this->User->UserProfile->updateAll(
                         array('UserProfile.email' => "'".$email."'"), 
                         array('verification_passkey' => $passkey));
                if($update){
              	 	$this->User->UserProfile->updateAll(
                        array('UserProfile.verification_passkey' => 'Null','UserProfile.email_to_verify'=> 'Null','UserProfile.mail_verified'=> '1'), 
                        array('email' => $email));
              	 	$this->set('id',$email);
              	 	$this->set('fname',$user_data['UserProfile']['first_name']);
              	}else{
                    $this->set('verification_error',"Something is wrong try again or contact to admin. .");
              	}
            }else{
            	$this->set('wrong_url',"Sorry it seems either mail has been verified or does not exist.");
            }
    	}else{
    		$this->set('failed',"Sorry it seems you have tried wrong verification url. Try something new.");
    	}
    // }else{

           //   $this->set('login_needed',"Sorry please do login to verify USer id.");
     // }
    }

    public function wsReminderTodayException($user_id, $conditions){
    	$e = array();
    	$reminders_count = $this->Reminder->find('count',
                array('conditions' => $conditions,
                    'order' => 'friend_birthday ASC'
            ));
    	if(!$reminders_count){
    		$e[1] = "No birthday reminder today";
    	}
    	return $e;
    }

    public function gift_sent_timestamp($gift_created){
        $calculated_time = NULL;
    	$time_difference = time() - strtotime($gift_created);
    	$seconds = $time_difference ;
		$minutes = round($time_difference / 60 );
		$hours = round($time_difference / 3600 );
		$days = round($time_difference / 86400 );
		$weeks = round($time_difference / 604800 );
		$months = round($time_difference / 2419200 );
		$years = round($time_difference / 29030400 );
		// Seconds
		if($seconds <= 60)
		{
			$calculated_time = $seconds."s ago";
		}
		//Minutes
		if($minutes <=60 && $minutes)
		{
		    $calculated_time = $minutes."m ago";
		}
		//hours
		
		if($hours <= 24 && $hours){
			$calculated_time =  $hours."h ago";
		}
		
		if($days && $hours > 24 && $days){
			$calculated_time = $days."d ago";
		}

		if($weeks && $days >=7 && $weeks){
			$calculated_time = $weeks."w ago";
		}

		if($months && $days >=30 && $months){
			$calculated_time = $months."M ago";
		} 

		if($years && $months >=12 && $years){
			$calculated_time = $months."Y ago";
		}
        
        return $calculated_time;
    }
}
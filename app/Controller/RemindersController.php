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
	public $uses = array( 'Reminder','Product','Gift','User');
	
	public $paginate = array(
	        'limit' => 24,
		'order' => array('friend_name' => 'ASC')
	);
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('send_reminder_email_for_user');
        $this->Auth->allow('send_reminder');
	}

	public function isAuthorized($user) {
	    if ($this->action == 'view_friends' || $this->action == 'send_reminder_email_for_user' || $this->action == 'send_reminder') {
	        return true;
	    }
	    return parent::isAuthorized($user);
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
	public function view_friends($type=null) { 
		$this->Reminder->recursive = -1;
        $this->set('title_for_layout', 'Select a friend');

		// First off email maketing cookies 
        if ($this->Cookie->read('utm_source') == 'swaransoft') {
            $this->set('fire_swaransoft_pixel', 1);
            $this->Cookie->delete('utm_source');
        }

		if (!$this->Connect->user()) {
		    $this->redirect(array('controller'=>'users', 'action'=>'login'));
		}
		if ($this->request->is('post')) {
				$this->set('all_users', $this->get_birthdays($this->request->data['Reminders']['friend_name'],'all', 1));
				$this->set('today_users', array());
				$this->set('this_month_users', array());
				$this->set('friends_active', 'active');			
		} else {
			if ($type) {//type = all
				$this->set('all_users', $this->get_birthdays('mine','all', 1));
				$this->set('friends_active', 'active');
			    } else {
				$today_users = $this->get_birthdays('mine','today');
				$tommorrow_users = $this->get_birthdays('mine','tommorrow');
				$thismonth_users = $this->get_birthdays('mine','thismonth');
				$nextmonth_users = $this->get_birthdays('mine','nextmonth');
				if (empty($today_users) && empty($tommorrow_users) &&
				    empty($thismonth_users) && empty($nextmonth_users)) {
					if ($this->requestAction('users/refreshReminders/'.$this->Auth->user('id'))) {
						$this->redirect('/reminders/view_friends');
					}

					//type = all
					$this->set('all_users', $this->get_birthdays('mine','all', 1));
					$this->set('friends_active', 'active');
					$this->Session->setFlash(__('You have no upcoming birthdays.  Displaying all friends'));
				} else {
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
	        $this->send_reminder_email($user, $reminders);
	}
	return;
    }
    function send_reminder_email($user,$reminders) {
		$product = $this->Product->find('all',array('conditions' => array('Product.display_order >' => 0), 'limit' => 3));
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
			$receiver_info[]['count'] = $this->Gift->find('count',array('conditions' => array('AND'=>array('Gift.receiver_fb_id' => $fb_id,'Gift.sender_id' =>$this->Auth->user('id')))));
			
		}
		$result = array();
				foreach($reminders as $key=>$val){ // Loop though one array
				    $val2 = $receiver_info[$key]; // Get the values from the other array
				    $result[$key] = $val + $val2; // combine 'em
				}
				
		return $result;
    }
	function setGiftsSent() {
		$this->set('num_gifts_sent', $this->Reminder->User->GiftsReceived->find('count'));
		$this->Reminder->User->GiftsReceived->recursive = 2;
		$fields = array('GiftsReceived.sender_id, GiftsReceived.receiver_fb_id, 
			GiftsReceived.product_id, GiftsReceived.created');
		$group = array('GiftsReceived.sender_id');
		$conditions = array('gift_status_id' => GIFT_STATUS_VALID);
		$this->set('gifts_sent', $this->Reminder->User->GiftsReceived->find('all',
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
							'fields' => array('facebook_id'))))));
		
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

    public function inactive_users_list(){
    	$users = $this->User->find('list', 
            array(
                'fields' => array('id'),
                'order' => array('id' => 'ASC')
            ));
    	$fp = fopen(ROOT.'/app/tmp/inactive_users_list.csv', 'a+');
    	foreach($users as $id){
    		set_time_limit(300);
    		$user = $this->Reminder->User->find('first', array(
				'conditions' => array('User.id' => $id),
				'contain'=>array('UserProfile')));
			
            if($user['UserProfile']['email'] && $user['UserProfile']['email_unsubscribed']!=1){
                $reminders = $this->get_birthdays($id, 'thisweek');
                if(!$reminders){
                    $reminder_count = $this->Reminder->find('count', array(
                    'conditions' => array('user_id' => $id)));
                    if(!$reminder_count){
                        fputcsv($fp,array($user['User']['id'],$user['UserProfile']['first_name'], $user['UserProfile']['last_name'], $user['UserProfile']['email'], $user['User']['last_login']));    
                    }
                }
            }
    	}
    	fclose($fp);
    }
}

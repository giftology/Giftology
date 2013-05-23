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

    public function newsLetter(){
    

    }
//////////////////////mail function////////////////////////
    public function fridayNewsletter(){
        $user_id = isset($this->params->query['user_id']) ? $this->params->query['user_id'] : null;
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
        $this->set('_serialize', array('today_birthday'));
    }


   
}
?>

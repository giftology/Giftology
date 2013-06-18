<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

  App::uses('AppController', 'Controller');
  App::uses('CakeEmail', 'Network/Email');


/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class Retailerscontroller extends AppController {
  public $components = array('AboutUs','MathCaptcha','AesCrypt');
  public $helpers = array('Minify.Minify');
 
	
  public function beforeFilter() {
    parent::beforeFilter();
    $this->Auth->allow('retailer','retailer_mail');
    }
   
  public function retailer(){
        $t=time();
        $session_time=$this->Session->write('session_time_retailer', $t);
        $this->set('session_token',$this->AesCrypt->encrypt($t));
        $this->set('captcha', $this->MathCaptcha->getCaptcha());  
  }

	public function retailer_mail(){
    $session_time=$this->AesCrypt->decrypt($this->data['retailers']['gift_id']);
    $green =$this->Session->read('session_time_retailer');
    if($session_time != $green){
$this->redirect(array(
        'controller' => 'retailers', 'action'=>'index'));   
    }
      if ($this->MathCaptcha->validate($this->request->data['retailers']['captcha'])) {
        $email = new CakeEmail();
    
        $email->config('smtp')

              ->template('retailer', 'default') 
          ->emailFormat('html')
          ->to('partner@giftology.com')
          ->Cc(array('aman.narang@giftology.com'))
          ->from(array('care@giftology.com' => 'Giftology'))
          ->subject('Giftology Retailer Info')
             ->viewVars(array('name' => $this->data['name_r'],
              'web' => $this->data['web_r'],
              'email' => $this->data['email_r'],
              'contact' => $this->data['contact_r'],
              'message' => $this->data['mess_r'])) 
             ->send();
              
              $this->Session->setFlash('Thank you for contacting us. We will get in touch shortly.');
      
   }
   else {
          $this->Session->setFlash('Oops. Wrong captcha.Please submit your request again.');
$this->redirect(array(
        'controller' => 'retailers', 'action'=>'index'));          
   }
            $this->Session->delete('session_time_retailer');
    
   
    }



  public function ws_about_us(){
    $about_us_content=$this->AboutUs->about_us();
    $this->set('about_us_content', $about_us_content);
    $this->set('_serialize', array('about_us_content'));
           // print_r(json_encode($arg));       
  }
}
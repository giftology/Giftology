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

App::uses('Controller', 'Controller');
App::uses('FB', 'Facebook.Lib');
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
  public $components = array('AboutUs');
  public $helpers = array('Minify.Minify');
 
	/*public function beforeFilter(){
		if ($this->Auth->user()) {
	    // if a user is logged in

		    $this->set('user', $this->Auth->user());
	        $this->set('facebook_user', $this->Connect->user());
		}
        
		if($this->params['controller']=='retailers'){
			$this->Auth->Allow($this->action);
			$this->set('user', $this->Auth->user());
		} 
	}*/
	public function retailer_mail(){
   
   
        /*$email = new CakeEmail();
    
        $email->config('smtp')

              ->template('retail', 'default') 
          ->emailFormat('html')
          ->to('partner@giftology.com')
          ->Cc(array('aman.narang@giftology.com','sakshi.bajaj@giftology.com'))
          ->from(array('care@giftology.com' => 'Giftology'))
          ->subject('Welcome to Giftology')
             ->viewVars(array('name' => $this->data['name_r'],
                               'web' => $this->data['web_r'],
                                'deals' => $this->data['deals_r'],
                                 
                                 'city' => $this->data['city_r'],
                                  'outlet' => $this->data['outlet_r'],
                                 
                                 'contact' => $this->data['contact_r'],
                                  'mail' => $this->data['mail_r'])) 
             
              ->send();
              
              $this->Session->setFlash('Your message has been sent');
           //   $this->redirect(array('controller' => 'reminders' , 'action'='view_friends'));
        */
   
    }



  public function ws_about_us(){
    $about_us_content=$this->AboutUs->about_us();
    $this->set('about_us_content', $about_us_content);
    $this->set('_serialize', array('about_us_content'));
           // print_r(json_encode($arg));       
  }
}
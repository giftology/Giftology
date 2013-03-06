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


/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    var $helpers = array('Session', 'Facebook.Facebook', 'Mixpanel.Mixpanel');
    var $components = array('Session', 'Mixpanel.Mixpanel',
                            'Auth' => array(
                                'authorize' => 'Controller',
                                'authorizedActions' => array ('index', 'view'),
                                'loginRedirect' => array('controller' => 'reminders', 'action' => 'view_friends'),
                                'logoutRedirect' => array('controller' => 'users', 'action' => 'login', 'home')
                            ),
                            'Facebook.Connect' => array('model' => 'User'),
                            'RequestHandler', 'Cookie');

    function beforeFilter() {
    	if($this->params['controller']=='retailers'){
    		$this->Auth->allow('retailer_mail');


    	         } 

	if (isset($this->params['ext']) && $this->params['ext'] == 'json' &&
	    isset($this->params->query['rand']) && isset($this->params->query['key'])) {
	    //json call
	    $allowed_json_methods = array('ws_list', 'ws_add', 'ws_send');
	    if (in_array($this->action, $allowed_json_methods)) {
		//authenticate json
		if (md5('GiftologyMobile422'.$this->params->query['rand']) == $this->params->query['key']) {
		    $this->Auth->allow($this->action);

		}
	    }
	}
	if ($this->name == 'CakeError') {  
		   $this->redirect(array('controller' => 'reminders', 'action'=> 'view_friends'));
	}
	   
	// check for mobile devices
	/*if ($this->RequestHandler->isMobile()) {
	    // if device is mobile, change layout to mobile
	    $this->layout = 'mobile';
	    
	    // and if a mobile view file has been created for the action, serve it instead of the default view file
	    $mobileViewFile = ROOT.'/app/View/'.$this->viewPath . '/mobile/' . $this->params['action'] . '.ctp';

	    if (file_exists($mobileViewFile)) {
		$mobileView = strtolower($this->params['controller']) . '/mobile/';
		$this->viewPath = $mobileView;
	    }
	}*/
	if ($this->Auth->user()) {
	    // if a user is logged in
		$this->Mixpanel->identify($this->Connect->user('id'));
		$this->Mixpanel->name_tag($this->Connect->user('name'));

		    /* To make use of the people API */
	    $this->Mixpanel->people($this->Auth->user('id'), array(
	        '$username' => $this->Connect->user('name'),
	        '$email' => $this->Connect->user('email'),
	        '$created' => $this->Auth->user('created'),
	        '$last_login' => $this->Auth->user('connected')
	    ));

	}
        $this->set('user', $this->Auth->user());
        $this->set('facebook_user', $this->Connect->user());
        }
    function isAuthorized($user) {
        // Admin can access every action
        if (isset($user['role']) && $user['role'] === 'admin') {
            return true;
        }
        return false;
    }
}

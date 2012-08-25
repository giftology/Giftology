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
    var $helpers = array('Session', 'Facebook.Facebook');
    var $components = array('Session',
                            'Auth' => array(
                                'authorize' => 'controller',
                                'authorizedActions' => array ('index', 'view'),
                                'loginRedirect' => array('controller' => 'users', 'action' => 'view_friends'),
                                'logoutRedirect' => array('controller' => 'users', 'action' => 'login', 'home')
                            ),
                            'Facebook.Connect' => array('model' => 'User'),
                            'RequestHandler');
    
    function beforeFilter() {
        $this->set('user', $this->Auth->user());
        $this->set('facebook_user', $this->Connect->user());
        
        $this->Auth->allow('index', 'view');
    }
    function isAuthorized() {
            // Admin can access every action
        if (isset($user['role']) && $user['role'] === 'admin') {
            return true;
        }
        return true;
    }
}

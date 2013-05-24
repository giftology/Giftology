<?php
App::uses('AppController', 'Controller');
/**
 * UploadedProductCodes Controller
 *
 * @property UploadedProductCode $UploadedProductCode
 */
class OtpTransactionsController extends AppController {
	public function beforeFilter() {
	parent::beforeFilter();
	$this->Auth->allow('index');
    }
	public function index(){

	}
}


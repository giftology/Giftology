<?php
App::uses('AppController', 'Controller');
/**
 * UploadedProductCodes Controller
 *
 * @property UploadedProductCode $UploadedProductCode
 */
class TemporaryGiftCodesController extends AppController {
	public $helpers = array('Minify.Minify');
	public $components = array('Giftology');
}
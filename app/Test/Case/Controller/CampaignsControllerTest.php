<?php
App::uses('CampaignsController', 'Controller');

/**
 * CampaignsController Test Case
 *
 */
class CampaignsControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.campaign'
	);

/**
 * testIndex method
 *
 * @return void
 */
	

	public function testIndexEncrypted_product_id(){

		$result = $this->testAction('campaigns/index/encrypted_product_id',array('return' => 'vars'));
		debug($result);

		//$this->assertContains('/posts/index', $this->headers['Location']);

	}

/**
 * testView method
 *
 * @return void
 */
	public function testView() {
		$result = $this->testAction('campaigns/view');
		debug($result);
	}

/**
 * testAdd method
 *
 * @return void
 */
	public function testAdd() {
	}

/**
 * testEdit method
 *
 * @return void
 */
	public function testEdit() {
	}

/**
 * testDelete method
 *
 * @return void
 */
	public function testDelete() {
	}

	public function testView_productid(){
		$result = $this->testAction('campaigns/view_product/id',array('return' => 'vars'));
		debug($result);

	}

	public function testSearch_friend(){
		// $result = $this->testAction('/campaigns/Search_friend');
       



	}
    
    public function testView_products(){
    	$result = $this->testAction('campaigns/view_products',array('return' => 'vars'));
		debug($result);
		///$this->assertContains('/posts/view_products, $this->headers['Location']);

    }


}

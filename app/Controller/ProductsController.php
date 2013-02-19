<?php
App::uses('AppController', 'Controller');
/**
 * Products Controller
 *
 * @property Product $Product
 */
class ProductsController extends AppController {
	
	public $paginate = array(
        'limit' => 100,
        'order' => array(
            'Product.display_order' => 'asc'
	    )
	);

	public function isAuthorized($user) {
	    if (($this->action == 'view_products') || ($this->action == 'view_product')) {
	        return true;
	    }
	    return parent::isAuthorized($user);
	}
	//WEB SERVICES
	public function ws_list () {
		$this->Product->recursive = 0;
		$this->set('receiver_id', isset($this->request->params['named']['receiver_id']) ? $this->request->params['named']['receiver_id'] : null);
		$this->set('products', $this->Product->find('all'));
		$this->set('_serialize', array('products'));
	}
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Product->recursive = 0;
		$this->set('receiver_id', isset($this->request->params['named']['receiver_id']) ? $this->request->params['named']['receiver_id'] : null);
		$this->set('products', $this->paginate());
	}
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException(__('Invalid product'));
		}
		$this->set('receiver_id', $this->request->params['named']['receiver_id']);
		$this->set('product', $this->Product->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Product->create();
			if ($this->Product->save($this->request->data)) {
				$this->Session->setFlash(__('The product has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product could not be saved. Please, try again.'));
			}
		}
		$vendors = $this->Product->Vendor->find('list');
		$productTypes = $this->Product->ProductType->find('list');
		$codeTypes = $this->Product->CodeType->find('list');
		$genderSegments = $this->Product->GenderSegment->find('list');
		$ageSegments = $this->Product->AgeSegment->find('list');
		$citySegments = $this->Product->CitySegment->find('list');
		$this->set(compact('vendors', 'productTypes', 'genderSegments', 'ageSegments', 'citySegments', 'codeTypes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException(__('Invalid product'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Product->save($this->request->data)) {
				$this->Session->setFlash(__('The product has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Product->read(null, $id);
		}
		$codeTypes = $this->Product->CodeType->find('list');
		$vendors = $this->Product->Vendor->find('list');
		$productTypes = $this->Product->ProductType->find('list');
		$genderSegments = $this->Product->GenderSegment->find('list');
		$ageSegments = $this->Product->AgeSegment->find('list');
		$citySegments = $this->Product->CitySegment->find('list');
		$this->set(compact('vendors', 'productTypes', 'genderSegments', 'ageSegments', 'citySegments', 'codeTypes'));	}

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
		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException(__('Invalid product'));
		}
		if ($this->Product->delete()) {
			$this->Session->setFlash(__('Product deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Product was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function view_products () {
		$location = isset($this->request->params['named']['receiver_location']) ? $this->request->params['named']['receiver_location'] : NULL;
		$gender = isset($this->request->params['named']['receiver_sex']) ? $this->request->params['named']['receiver_sex'] : NULL ;
		$year = isset($this->request->params['named']['friend_birthyear']) ? $this->request->params['named']['friend_birthyear'] : NULL;
		$today = date("Y"); 
		$gender=strtoupper($gender);
		$age=$today-$year;

		$gender = $this->Product->GenderSegment->find('all',array('conditions' => array('GenderSegment.gender' => $gender)));
		$location = $this->Product->CitySegment->find('all',array('conditions' => array('CitySegment.city' => $location)));
		$age = $this->Product->AgeSegment->find('all',array('conditions' => array('AgeSegment.max >' => $age,'AgeSegment.min <' => $age)));
		
		
		$gender=isset($gender['0']['GenderSegment']['id']) ? $gender['0']['GenderSegment']['id'] : NULL;
		$location=isset($location['0']['CitySegment']['id']) ? $location['0']['CitySegment']['id'] : NULL;
		$age=isset($age['0']['AgeSegment']['id']) ? $age['0']['AgeSegment']['id'] : NULL;
		
		$this->paginate['conditions']  = array('Product.gender_segment_id'  => array($gender,ALL_GENDERS) ,'Product.city_segment_id' => array($location,ALL_CITIES) , 'Product.age_segment_id' => array($age,ALL_AGES));
		$this->Product->recursive = 0;
		//$this->paginate['conditions'] = array('Product.display_order >' => 0); //display_order = 0 is for disabled products
		$this->set('receiver_id', isset($this->request->params['named']['receiver_id']) ? $this->request->params['named']['receiver_id'] : null);
		$this->set('receiver_name', isset($this->request->params['named']['receiver_name']) ? $this->request->params['named']['receiver_name'] : null);
		$this->set('receiver_birthday', isset($this->request->params['named']['receiver_birthday']) ? $this->request->params['named']['receiver_birthday'] : null);
		$this->set('ocasion', isset($this->request->params['named']['ocasion']) ? $this->request->params['named']['ocasion'] : null);
		$this->set('products', $this->paginate());
		$this->set('title_for_layout', 'Send a gift voucher to '.(isset($this->request->params['named']['receiver_name']) ? $this->request->params['named']['receiver_name'] : null));
		$this->Mixpanel->track('Viewing Product List ', array(
	            'Receiver' => isset($this->request->params['named']['receiver_name']) ? 
	            $this->request->params['named']['receiver_name'] : null,
        	));
	
	}
	public function view_product($id=null) {
		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException(__('Invalid product'));
		}
		$this->set('title_for_layout', "Send Gift"); // This is read in FacebookHelper to check for sending permissions on facebook. read that before changing XXHACK NS
		$this->set('receiver_id', isset($this->request->params['named']['receiver_id']) ? $this->request->params['named']['receiver_id'] : null);
		$this->set('receiver_name', isset($this->request->params['named']['receiver_name']) ? $this->request->params['named']['receiver_name'] : null);
		$this->set('receiver_birthday', isset($this->request->params['named']['receiver_birthday']) ? $this->request->params['named']['receiver_birthday'] : null);
		$this->set('ocasion', isset($this->request->params['named']['ocasion']) ? $this->request->params['named']['ocasion'] : null);
		$this->Product->contain(array('Vendor'));
		$this->set('product', $this->Product->read(null, $id));
		$this->Mixpanel->track('Viewing Product', array(
	        'Receiver' => isset($this->request->params['named']['receiver_name']) ? 
		        $this->request->params['named']['receiver_name'] : null,
		    'ProductId' => $id
			));


	}
	
}

<?php
App::uses('AppController', 'Controller');
/**
 * CitySegments Controller
 *
 * @property CitySegment $CitySegment
 */
class CitySegmentsController extends AppController {
	public $helpers = array('Minify.Minify');

	public $uses = array( 'CitySegment','LocationSegment','Reminder');



/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->CitySegment->recursive = 0;
		$this->set('citySegments', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->CitySegment->id = $id;
		if (!$this->CitySegment->exists()) {
			throw new NotFoundException(__('Invalid city segment'));
		}
		$cities = $this->CitySegment->find('first', array('fields' => array('id', 'city', 'state','country','Y(geo_location) as latitude', 'X(geo_location) as longitude'), 'conditions' => array('id' => $id)));
		$this->set('citySegment', $cities);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CitySegment->create();
			if ($this->CitySegment->save($this->request->data)) {
				$this->Session->setFlash(__('The city segment has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The city segment could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		//DebugBreak();
		$this->CitySegment->id = $id;
		if (!$this->CitySegment->exists()) {
			throw new NotFoundException(__('Invalid city segment'));
		}
		
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->CitySegment->save($this->request->data)) {
				$data=array();
				$thePostIdArray = explode(',', $this->data['CitySegment']['city_name']);
				foreach ($thePostIdArray as $city_name) {
					$data['city'] = $city_name;
					$this->CitySegment->saveAll($data);
					$id = $this->CitySegment->find('first', array('fields' => array('id'), 'conditions' => array('city' => $city_name)));
					$data1['city_segment_id'] = $this->data['CitySegment']['id'];
					$data1['city_id'] = $id['CitySegment']['id'];
					$this->LocationSegment->saveAll($data1);
				} 
				$this->Session->setFlash(__('The city segment has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The city segment could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->CitySegment->read(null, $id);
		}
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
		$this->CitySegment->id = $id;
		if (!$this->CitySegment->exists()) {
			throw new NotFoundException(__('Invalid city segment'));
		}
		if ($this->CitySegment->delete()) {
			$this->Session->setFlash(__('City segment deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('City segment was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->CitySegment->recursive = 0;
		$this->set('citySegments', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->CitySegment->id = $id;
		if (!$this->CitySegment->exists()) {
			throw new NotFoundException(__('Invalid city segment'));
		}
		$this->set('citySegment', $this->CitySegment->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->CitySegment->create();
			if ($this->CitySegment->save($this->request->data)) {
				$this->Session->setFlash(__('The city segment has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The city segment could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->CitySegment->id = $id;
		if (!$this->CitySegment->exists()) {
			throw new NotFoundException(__('Invalid city segment'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->CitySegment->save($this->request->data)) {
				$this->Session->setFlash(__('The city segment has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The city segment could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->CitySegment->read(null, $id);
		}
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
		$this->CitySegment->id = $id;
		if (!$this->CitySegment->exists()) {
			throw new NotFoundException(__('Invalid city segment'));
		}
		if ($this->CitySegment->delete()) {
			$this->Session->setFlash(__('City segment deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('City segment was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	public function city_name_fiter_from_fb(){
		$this->Reminder->recursive = -1;
        //$geo_locations = $this->Reminder->find('all', array('fields' => array('DISTINCT astext(geo_location)'), 'conditions' => array('geo_location !=' => '')));
		$cities = $this->Reminder->find('all', array('fields' => array('DISTINCT current_location', 'state', 'country', 'geo_location')));
		$city_array = array();
		foreach($cities as $k => $city){
            if($city['Reminder']['current_location']){
                $city_array[$k]['city'] = $city['Reminder']['current_location']; 
                $city_array[$k]['state'] = $city['Reminder']['state'];
                $city_array[$k]['country'] = $city['Reminder']['country'];
                $city_array[$k]['geo_location'] = $city['Reminder']['geo_location']; 
            }  
		}
		$city_chunk  = array_chunk($city_array, 1000);
        
        foreach($city_chunk as $a){
        	set_time_limit(300);
        	$this->CitySegment->saveMany($a);
        }
	}
}

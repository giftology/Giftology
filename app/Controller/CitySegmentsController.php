<?php
App::uses('AppController', 'Controller');
/**
 * CitySegments Controller
 *
 * @property CitySegment $CitySegment
 */
class CitySegmentsController extends AppController {
	public $helpers = array('Minify.Minify');
    public $uses = array('CitySegment','City');
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
		$city_data = $this->CitySegment->read(null, $id);
		$city_data['CitySegment']['segment'] = $this->city_from_ids($city_data['CitySegment']['segment']);
		$this->set('citySegment', $city_data);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CitySegment->create();
			$city_data = array();
			$city_data['CitySegment']['city'] = $this->data['CitySegment']['city'];
			$city_data['CitySegment']['segment'] = $this->serialized_city_id($this->data['CitySegment']['segment']);
			if ($this->CitySegment->save($city_data)) {
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
		$this->CitySegment->id = $id;
		if (!$this->CitySegment->exists()) {
			throw new NotFoundException(__('Invalid city segment'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			$city_data =array();
			$city_data['CitySegment']['city'] = $this->request->data['CitySegment']['city'];
			
			$city_data['CitySegment']['segment'] = $this->serialized_city_id($this->request->data['CitySegment']['segment']);
			if ($this->CitySegment->save($city_data)) {
				$this->Session->setFlash(__('The city segment has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The city segment could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->CitySegment->read(null, $id);
			$this->request->data['CitySegment']['segment'] = $this->city_from_ids($this->request->data['CitySegment']['segment']);
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

	public function serialized_city_id($city_names){
		$segments = explode(',', $city_names);
        $trimmed_segments = array();
        foreach($segments as $segment){
            $trimmed_segments[] = ltrim(rtrim($segment));
        }
        unset($segment);
		$segment_ids = $this->City->find('list', array('fields' => array('id'),'conditions' => array('city' =>  $trimmed_segments)));
		/*$segment_id_array = array();
		foreach($segment_ids as $id){
			$segment_id_array[] = $id;	
		}*/
		return serialize($segment_ids);
	}

	public function city_from_ids($city_ids){
		$city_ids_array = unserialize($city_ids);
		$cities = $this->City->find('list', array('fields' => array('city'),'conditions' => array('id' =>  $city_ids_array)));
		/*$city_array = array();
		foreach($cities as $city){
			$city_array[] = $city;
		}*/
		return implode(',',$cities);
	}
}

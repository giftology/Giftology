<?php
App::uses('AppController', 'Controller');
/**
 * CitySegments Controller
 *
 * @property CitySegment $CitySegment
 */
class CitySegmentsController extends AppController {
	public $helpers = array('Minify.Minify');
    public $uses = array('CitySegment','City','LocationSegment');
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
                $this->location_segments($this->CitySegment->getLastInsertID(),$city_data['CitySegment']['segment']);
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
                $this->update_location_segments($id,$city_data['CitySegment']['segment']);
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
		return serialize($segment_ids);
	}

	public function city_from_ids($city_ids){
		$city_ids_array = unserialize($city_ids);
		$cities = $this->City->find('list', array('fields' => array('city'),'conditions' => array('id' =>  $city_ids_array)));
		return implode(',',$cities);
	}

	public function get_segments($segment_id){
		$coefficient = 111.12;
		$city_name = $this->CitySegment->find('first', array('fields' => array('city'),'conditions' => array('id' => $segment_id)));
		$city_segment_geo_location = $this->City->find('first', array(
			'fields' => array('Y(geo_location) as latitude', 'X(geo_location) as longitude'),
			'conditions' => array('city' => $city_name['CitySegment']['city'])
			));
        if(isset($city_segment_geo_location) && !empty($city_segment_geo_location)){
            $segment_search_condition = "(POW((Y(geo_location)-".$city_segment_geo_location[0]['latitude'].")*111.12, 2) + POW((X(geo_location) - ".$city_segment_geo_location[0]['longitude'].")*111.12, 2))";
            $conditions[$segment_search_condition.' <= '] = pow(CITY_SEGMENT_RADIUS,2);
            $city_segments = NULL;
            $city_segments = $this->City->find('list', array('fields' => array('id'), 'conditions' => $conditions));
            $this->CitySegment->id = $segment_id;
            $city_segment_data = NULL;
            $city_segment_data['CitySegment']['segment'] = serialize($city_segments);
            $this->CitySegment->save($city_segment_data);
            $this->location_segments($segment_id,$city_segment_data['CitySegment']['segment']); 
        }
        return;
        //$this->autoRender = $this->autoLayout = false;
	}
    
    public function auto_city_segment(){
        $city_segments = $this->CitySegment->find('list', array('fields' => array('id')));
        foreach($city_segments as $city_segment){
            if($city_segment!=ALL_CITIES)
                $this->get_segments($city_segment);
        }
        $this->autoRender = $this->autoLayout = false;
    }
    
    public function location_segments($city_segment_id, $city_data){
        $cities = unserialize($city_data);
        $this->LocationSegment->create();
        $location_data = array();
        if(isset($cities) && !empty($cities)){
            $this->LocationSegment->create();
            foreach($cities as $k => $city){
                $location_data[$k]['LocationSegment']['city_segment_id'] = $city_segment_id;
                $location_data[$k]['LocationSegment']['city_id'] = $city;                    
            }
            $this->LocationSegment->saveMany($location_data);       
        }
    }
    
    public function update_location_segments($city_segment_id, $city_data){
        $cities = unserialize($city_data);
        $cities_location_segment = $this->LocationSegment->find('list', array('fields' => array('city_id'),'conditions'=> array('city_segment_id' => $city_segment_id)));
        $cities_deleted = array_diff($cities_location_segment,$cities);
        $cities_added = array_diff($cities, $cities_location_segment);
        $this->LocationSegment->create();
        $location_data = array();
        if(isset($cities_added) && !empty($cities_added)){
            foreach($cities_added as $k => $city){
                $location_data[$k]['LocationSegment']['city_segment_id'] = $city_segment_id;
                $location_data[$k]['LocationSegment']['city_id'] = $city;                    
            }
            $this->LocationSegment->saveMany($location_data);    
        }
        
        if(isset($cities_deleted) && !empty($cities_deleted)){
            foreach($cities_deleted as $k => $cities){
                $this->LocationSegment->id = $k;
                $this->LocationSegment->delete();        
            }
        }
    }
}

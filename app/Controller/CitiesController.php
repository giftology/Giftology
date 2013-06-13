<?php
App::uses('AppController', 'Controller');
/**
 * CitySegments Controller
 *
 * @property CitySegment $CitySegment
 */
class CitiesController extends AppController {
	public $helpers = array('Minify.Minify');

	public $uses = array( 'City','LocationSegment','Reminder');



/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->City->recursive = 0;
		$this->set('cities', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->City->id = $id;
		if (!$this->City->exists()) {
			throw new NotFoundException(__('Invalid city'));
		}
		$cities = $this->City->find('first', array('fields' => array('id', 'city', 'state','country','Y(geo_location) as latitude', 'X(geo_location) as longitude'), 'conditions' => array('id' => $id)));
		$this->set('city', $cities);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->City->create();
			$data['city'] = $this->data['City']['city'];
			$data['state'] = $this->data['City']['state'];
			$data['country'] = $this->data['City']['country'];
			$data['geo_location'] = $this->City->getDataSource()->expression("GEOMFROMTEXT('POINT(".$this->data['City']['latitude']." ".$this->data['City']['longitude'].")',0)");
			if ($this->City->save($data)) {
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
		$this->City->id = $id;
		if (!$this->City->exists()) {
			throw new NotFoundException(__('Invalid city'));
		}
		
		if ($this->request->is('post') || $this->request->is('put')) {
				$city=array();
				$city['city'] = $this->data['City']['city'];
				$city['state'] = $this->data['City']['state'];
				$city['country'] = $this->data['City']['country'];
				$city['geo_location'] = $this->City->getDataSource()->expression("GEOMFROMTEXT('POINT(".$this->data['City']['latitude']." ".$this->data['City']['longitude'].")',0)");
			if ($this->City->save($city)) { 
				$this->Session->setFlash(__('The city has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The city could not be saved. Please, try again.'));
			}
		} else {
            $city = $this->City->find('first', array(
                'fields' => array('id', 'city', 'state','country','Y(geo_location) as latitude', 'X(geo_location) as longitude'),
                'conditions' => array('id' => $id)
            ));
            $city['City']['longitude'] = $city[0]['longitude'];
            $city['City']['latitude'] = $city[0]['latitude'];
            unset($city[0]);
			$this->request->data = $city;
			unset($city);
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
		$this->City->id = $id;
		if (!$this->City->exists()) {
			throw new NotFoundException(__('Invalid city'));
		}
		if ($this->City->delete()) {
			$this->Session->setFlash(__('City deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('City was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->City->recursive = 0;
		$this->set('cities', $this->paginate());
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
			$this->City->create();
			$data['city'] = $this->data['City']['city'];
			$data['state'] = $this->data['City']['state'];
			$data['country'] = $this->data['City']['country'];
			$data['geo_location'] = $this->City->getDataSource()->expression("GEOMFROMTEXT('POINT(".$this->data['City']['latitude']." ".$this->data['City']['longitude'].")',0)");
			if ($this->City->save($data)) {
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
		$this->City->id = $id;
		if (!$this->City->exists()) {
			throw new NotFoundException(__('Invalid city'));
		}
		
		if ($this->request->is('post') || $this->request->is('put')) {
				$city=array();
				$city['city'] = $this->data['City']['city'];
				$city['state'] = $this->data['City']['state'];
				$city['country'] = $this->data['City']['country'];
				$city['geo_location'] = $this->City->getDataSource()->expression("GEOMFROMTEXT('POINT(".$this->data['City']['latitude']." ".$this->data['City']['longitude'].")',0)");
			if ($this->City->save($city)) { 
				$this->Session->setFlash(__('The city has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The city could not be saved. Please, try again.'));
			}
		} else {
            $city = $this->City->find('first', array(
                'fields' => array('id', 'city', 'state','country','Y(geo_location) as latitude', 'X(geo_location) as longitude'),
                'conditions' => array('id' => $id)
            ));
            $city['City']['longitude'] = $city[0]['longitude'];
            $city['City']['latitude'] = $city[0]['latitude'];
            unset($city[0]);
			$this->request->data = $city;
			unset($city);
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
		$this->City->id = $id;
		if (!$this->City->exists()) {
			throw new NotFoundException(__('Invalid city segment'));
		}
		if ($this->City->delete()) {
			$this->Session->setFlash(__('City segment deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('City segment was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	public function city_name_fiter_from_fb(){
		$exisitng_cities = NULL;
		$exisitng_cities = $this->City->find('list', array('fields' => array('city')));
		$this->Reminder->recursive = -1;
        //$geo_locations = $this->Reminder->find('all', array('fields' => array('DISTINCT astext(geo_location)'), 'conditions' => array('geo_location !=' => '')));
        if(isset($exisitng_cities) && !empty($exisitng_cities)){
        	$conditions['current_location NOT'] = $exisitng_cities;
        }
        else {
        	$conditions[] = 1;
        }
        $cities = $this->Reminder->find('all', array('fields' => array('DISTINCT current_location'), 'conditions' => $conditions));
        $city_array = array();
        $city_search_key = array();
        foreach($cities as $k => $city){
            if($city['Reminder']['current_location']){
                $city_search_key[] = $city['Reminder']['current_location'];
            }
        }

        $city_details = NULL;
        $condtions = array();

        $city_details = $this->Reminder->find('all', array(
                    'fields' => array('DISTINCT current_location', 'state', 'country', 'geo_location'),
                    'conditions' => array('geo_location IS NOT NULL', 'state IS NOT NULL', 'country IS NOT NULL', 'current_location' => $city_search_key)
                    )
                );
                
        $city_array = NULL;
        foreach($city_details as $k => $city){
        	set_time_limit(300);
            if($city['Reminder']['current_location']){
                $city_array[$k]['city'] = $city['Reminder']['current_location']; 
                $city_array[$k]['state'] = $city['Reminder']['state'];
                $city_array[$k]['country'] = $city['Reminder']['country'];
                $city_array[$k]['geo_location'] = $city['Reminder']['geo_location'];     
            }
        }

		$city_chunk = NULL;
		if(!empty($city_array)){
			$city_chunk  = array_chunk($city_array, 1000);
			foreach($city_chunk as $a){
				set_time_limit(300);
				$this->City->saveMany($a);
			}

		}
	}
}

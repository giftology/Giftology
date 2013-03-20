<?php
App::uses('AppController', 'Controller');
/**
 * UploadedProductCodes Controller
 *
 * @property UploadedProductCode $UploadedProductCode
 */
class UploadedProductCodesController extends AppController {
	public $helpers = array('Minify.Minify');
	public $components = array('Giftology');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->UploadedProductCode->recursive = 0;
		$this->set('uploadedProductCodes', $this->paginate());
	}

    public function new_index() {
    	$this->UploadedProductCode->recursive = -1; 
    	$this->UploadedProductCode->Product->recursive = -1;
        $products = $this->UploadedProductCode->find('all',
                array('fields' => 'DISTINCT UploadedProductCode.product_id',
                      'group' => 'UploadedProductCode.product_id'));
        $ret = array(); $i = 0;
        foreach($products as $product) {
                $ret[$i]['prod_id'] = $product['UploadedProductCode']['product_id'];
                $ret[$i]['avail_count'] = $this->UploadedProductCode->find('count',                        
                        array('conditions' => array('available' => 1, 'product_id' => $product['UploadedProductCode']['product_id'])));
        		$ret[$i]['used_count'] = $this->UploadedProductCode->find('count',                        
                        array('conditions' => array('available' => 0, 'product_id' => $product['UploadedProductCode']['product_id'])));
        		$tmp =$this->UploadedProductCode->find('first', array('conditions' => array(
        			'available' => 1, 'product_id' => $ret[$i]['prod_id'])));
        		$ret[$i]['expires'] = $tmp['UploadedProductCode']['expiry'];
        		$i++;
        }

              $this->set('ret',$ret);
}


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->UploadedProductCode->id = $id;
		if (!$this->UploadedProductCode->exists()) {
			throw new NotFoundException(__('Invalid uploaded product code'));
		}
		$this->set('uploadedProductCode', $this->UploadedProductCode->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			if (!is_dir(WWW_ROOT.'files')) {
    			mkdir(WWW_ROOT.'files');
			}
			$new_file_name = 'files/'.$this->request->data['UploadedProductCode']['product_id'].$this->request->data['UploadedProductCode']['upload']['name'];
			copy($this->request->data['UploadedProductCode']['upload']['tmp_name'], $new_file_name);
			/*$query = "load data local infile '".WWW_ROOT.'/'.$new_file_name."' into table uploaded_product_codes fields terminated by ',' lines terminated by '\n' (product_id, code, value, expiry);";
			echo debug($query);
			$results = $this->UploadedProductCode->query($query);
			echo debug($results);*/
			$fp = fopen(WWW_ROOT.'/'.$new_file_name, 'r');
            $new_array = NULL;
            $line_array = NULL;
			while($line_array = fgetcsv($fp)) {
                $new_array = array();
                $new_array['product_id'] = $line_array[0];
                $new_array['code'] = $line_array[1];
                $new_array['value'] = $line_array[2];
                $new_array['expiry'] = $line_array[3];
            	$csv_data[] = $new_array;
                unset($new_arryay, $line_array);
        	}
        	fclose($fp);
        	$results = $this->UploadedProductCode->saveMany($csv_data);
        	//echo debug($results);
		}
		$products = $this->UploadedProductCode->Product->find('list');
		$this->set(compact('products'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->UploadedProductCode->id = $id;
		if (!$this->UploadedProductCode->exists()) {
			throw new NotFoundException(__('Invalid uploaded product code'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->UploadedProductCode->save($this->request->data)) {
				$this->Session->setFlash(__('The uploaded product code has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The uploaded product code could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->UploadedProductCode->read(null, $id);
		}
		$products = $this->UploadedProductCode->Product->find('list');
		$this->set(compact('products'));
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
		$this->UploadedProductCode->id = $id;
		if (!$this->UploadedProductCode->exists()) {
			throw new NotFoundException(__('Invalid uploaded product code'));
		}
		if ($this->UploadedProductCode->delete()) {
			$this->Session->setFlash(__('Uploaded product code deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Uploaded product code was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	public function deleteAll($ProductId = null) {
		if ($this->UploadedProductCode->deleteAll(array('product_id' => $ProductId, 'available' => 1))) {
			$this->Session->setFlash(__('Uploaded product codes deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Uploaded product codes was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->UploadedProductCode->recursive = 0;
		$this->set('uploadedProductCodes', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->UploadedProductCode->id = $id;
		if (!$this->UploadedProductCode->exists()) {
			throw new NotFoundException(__('Invalid uploaded product code'));
		}
		$this->set('uploadedProductCode', $this->UploadedProductCode->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->UploadedProductCode->create();
			if ($this->UploadedProductCode->save($this->request->data)) {
				$this->Session->setFlash(__('The uploaded product code has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The uploaded product code could not be saved. Please, try again.'));
			}
		}
		$products = $this->UploadedProductCode->Product->find('list');
		$this->set(compact('products'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->UploadedProductCode->id = $id;
		if (!$this->UploadedProductCode->exists()) {
			throw new NotFoundException(__('Invalid uploaded product code'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->UploadedProductCode->save($this->request->data)) {
				$this->Session->setFlash(__('The uploaded product code has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The uploaded product code could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->UploadedProductCode->read(null, $id);
		}
		$products = $this->UploadedProductCode->Product->find('list');
		$this->set(compact('products'));
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
		$this->UploadedProductCode->id = $id;
		if (!$this->UploadedProductCode->exists()) {
			throw new NotFoundException(__('Invalid uploaded product code'));
		}
		if ($this->UploadedProductCode->delete()) {
			$this->Session->setFlash(__('Uploaded product code deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Uploaded product code was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function generate_codes ($prod_id, $value, $expiry, $num) {
		$data = array();
		for($count = $num;$count>0;$count--) {
			array_push($data, array(
				'code' => $this->Giftology->generateGiftCode($prod_id),
				'product_id' => $prod_id,
				'expiry' => $expiry,
				'value' => $value));
		}
		$this->UploadedProductCode->create();
		$this->UploadedProductCode->saveMany($data);
		$this->Session->setFlash(__($num.' new gift codes of '.$value.' created for product '.$prod_id));
		$this->set('data', $data);
	}
	public function update_expiry_date ($prod_id, $value, $new_date) {
		$this->UploadedProductCode->updateAll(array('expiry' => $new_date),
						      array('product_id' => $prod_id,
							    'available' => 1,
							    'value' => $value));
		$this->Session->setFlash(__('Updated.  Please verify operation by listing Uploading product Codes'));
		$this->redirect($this->referer());
	}
}

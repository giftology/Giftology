<?php
App::uses('AppController', 'Controller');
/**
 * Vendors Controller
 *
 * @property Vendor $Vendor
 */
class VendorsController extends AppController {
	public $helpers = array('Minify.Minify');

public $components = array('Search.Prg'); 
/**
 * index method
 *
 * @return void
 */
public $presetVars = array(
            array('field' => 'id', 'type' => 'value'),
            array('field' => 'name', 'type' => 'value'),
            
            array('field'=> 'created','type'=>'value'),
            array('field'=> 'modified','type'=>'value'),
        
        );
         public function download_vendor_csv(){
				
                    $filename = "Vendors ".date("Y.m.d").".csv";
                    $csv_file = fopen('php://output', 'w');
                    header('Content-type: application/csv');
                    header('Content-Disposition: attachment; filename="'.$filename.'"');
                    $header_row= array('Id','Vendor Name','Created','Modified');
                    fputcsv($csv_file,$header_row,',','"');
                    if( !empty( $this->data ))
                    {
                        foreach($this->data['chk1'] as $id)  
                        {
                            $ab=" ";
                            $result= $this->Vendor->find('first', array('conditions'=>array('Vendor.id'=>$id)));
                            $row = array(
                            $result['Vendor']['id'],
                            $result['Vendor']['name'],
                            $result['Vendor']['created'],
                            $result['Vendor']['modified'],

                             );
                            fputcsv($csv_file,$row,',','"');
                        }
                    }
                    die;
                  	}

	public function index() {
		 $this->Prg->commonProcess('Vendor');
	
		 if(($this->passedArgs['created_start'])||($this->passedArgs['modified_start']))
        { 
            if(!($this->passedArgs['created_start'])){
                 $modified_end=$this->passedArgs['modified_end'].' 23:59:59';
                 $modified_start=$this->passedArgs['modified_start'].' 00:00:00';
                if(!$this->passedArgs['modified_end']){
                    $modified_end=$this->passedArgs['modified_start'].' 23:59:59';
                }
                
               $conditions=array('conditions' => array($this->Vendor->parseCriteria($this->passedArgs),'Vendor.modified >'=>$modified_start,'Vendor.modified <' => $modified_end
               
               ),'order'=>array('Vendor.modified'=>'DESC')); 
            }
            
            if(!($this->passedArgs['modified_start'])){
                 $created_end=$this->passedArgs['created_end'].' 23:59:59';
                 $created_start=$this->passedArgs['created_start'].' 00:00:00';
                if(!$this->passedArgs['created_end']){
                    $created_end=$this->passedArgs['created_start'].' 23:59:59';
                }
             $conditions=array('conditions' => array($this->Vendor->parseCriteria($this->passedArgs) ,'Vendor.created >'=>$created_start,'Vendor.created <' => $created_end
               ),'order'=>array('Vendor.modified'=>'DESC')); 
            }


        
           
           if(($this->passedArgs['created_start'])&&(($this->passedArgs['modified_start'])) )
            { 
                 $modified_end=$this->passedArgs['modified_end'].' 23:59:59';
                 $modified_start=$this->passedArgs['modified_start'].' 00:00:00';
                 $created_end=$this->passedArgs['created_end'].' 23:59:59';
                 $created_start=$this->passedArgs['created_start'].' 00:00:00';
                if(!$this->passedArgs['modified_end']){
                    $modified_end=$this->passedArgs['modified_start'].' 23:59:59';
                }
                if(!$this->passedArgs['created_end']){
                    $created_end=$this->passedArgs['created_start'].' 23:59:59';
                }
                
          $conditions=array('conditions' => array($this->Vendor->parseCriteria($this->passedArgs),'Vendor.modified >'=>$modified_start,'Vendor.modified <' => $modified_end
           ,'Vendor.created >'=>$created_start,'Vendor.created <' => $created_end
            ),'order'=>array('Vendor.modified'=>'DESC'));  
             }  
            
    
        }
        else{
		$conditions= array('conditions' => array($this->Vendor->parseCriteria($this->passedArgs)
   ),'order'=>array('Vendor.modified'=>'DESC'));
}
		$this->paginate = $conditions;
		$this->Vendor->recursive = 0;
		$this->set('vendors', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Vendor->id = $id;
		if (!$this->Vendor->exists()) {
			throw new NotFoundException(__('Invalid vendor'));
		}
		$this->set('vendor', $this->Vendor->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Vendor->create();
			$this->Vendor->set($this->request->data);
			if (!$this->Vendor->validates())
            {
                 $errors1 = $this->Vendor->validationErrors;
                 $errors=(array_values($errors1));
                 $errorString1 = null;
                   foreach($errors as $err)
                   {
                       if($errorString1 == null)
                           $errorString1 = $err[0];
                       else
                           $errorString1 = $errorString1.', '.$err[0];
                       
                   }
                $finalErrorString = 'Please Enter: '.$errorString1.'<br/>';
                $this->Session->setFlash(__($finalErrorString));
                $this->redirect(array('controller' => 'vendors', 'action'=>'add'));   
            }
			
			if($this->data['Vendor']['description'] == "")
			{
				$this->Session->setFlash(__('Please enter the description'));
                    $this->redirect(array('controller' => 'vendors', 'action'=>'add'));   
			}
			$error_array= array();
                $allowed =  array('png' ,'jpg');
                $i = 1;
                foreach($_FILES['data']['name']['Vendor'] as $file){
                        $ext = pathinfo($file, PATHINFO_EXTENSION);
                        if ($i++ == 4) break;
                        if(!in_array($ext,$allowed) ) {
                            $error_array[]=  $file;
                        }      
                    }
            if(!$error_array){
			//facebook linter doesnt like image links with space in them, convert all space to underscore	
			$this->request->data['Vendor']['thumb_file']['name']
				= $this->request->data['Vendor']['name'].str_replace(" ","_", $this->request->data['Vendor']['thumb_file']['name']);
			$this->request->data['Vendor']['wide_file']['name']
				= $this->request->data['Vendor']['name'].str_replace(" ","_", $this->request->data['Vendor']['wide_file']['name']);
			$this->request->data['Vendor']['facebook_file']['name']
				= $this->request->data['Vendor']['name'].str_replace(" ","_", $this->request->data['Vendor']['facebook_file']['name']);
			$this->request->data['Vendor']['carousel_image']['name']
				= $this->request->data['Vendor']['name'].str_replace(" ","_", $this->request->data['Vendor']['carousel_image']['name']);
					
			$this->request->data['Vendor']['thumb_image'] = 'files/'.$this->request->data['Vendor']['thumb_file']['name'];
			copy($this->request->data['Vendor']['thumb_file']['tmp_name'], $this->request->data['Vendor']['thumb_image']);

			$this->request->data['Vendor']['wide_image'] = 'files/'.$this->request->data['Vendor']['wide_file']['name'];
			copy($this->request->data['Vendor']['wide_file']['tmp_name'], $this->request->data['Vendor']['wide_image']);
			
			$this->request->data['Vendor']['redeem_image'] = 'files/'.$this->request->data['Vendor']['redeem_file']['name'];
			copy($this->request->data['Vendor']['redeem_file']['tmp_name'], $this->request->data['Vendor']['redeem_image']);
			
			$this->request->data['Vendor']['facebook_image'] = 'files/'.$this->request->data['Vendor']['facebook_file']['name'];
			copy($this->request->data['Vendor']['facebook_file']['tmp_name'], $this->request->data['Vendor']['facebook_image']);

			$this->request->data['Vendor']['carousel_image'] = 'files/carousel/'.$this->request->data['Vendor']['carousel_image_file']['name'];
			copy($this->request->data['Vendor']['carousel_image_file']['tmp_name'], $this->request->data['Vendor']['carousel_image']);
		}
		else { 
            	$err1;
                    foreach($error_array as $err){
                        $err1= $err1.' ';
                        $err1= $err1.$err.' ' ;
                        
                        
                        
                    }
                    $this->Session->setFlash(__('Please upload an image in JPEG/PNG format only'));
                    $this->redirect(array('controller' => 'vendors', 'action'=>'add'));   
                }

			if ($this->Vendor->save($this->request->data)) {
				$this->Session->setFlash(__('The vendor has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The vendor could not be saved. Please, try again.'));
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
		$this->Vendor->id = $id;
		if (!$this->Vendor->exists()) {
			throw new NotFoundException(__('Invalid vendor'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {

			if (isset($this->request->data['Vendor']['thumb_file']['name']) && $this->request->data['Vendor']['thumb_file']['name']) {
				$this->request->data['Vendor']['thumb_file']['name']
					= $this->request->data['Vendor']['name'].str_replace(" ","_", $this->request->data['Vendor']['thumb_file']['name']);
				$this->request->data['Vendor']['thumb_image'] = 'files/'.$this->request->data['Vendor']['thumb_file']['name'];
				copy($this->request->data['Vendor']['thumb_file']['tmp_name'], $this->request->data['Vendor']['thumb_image']);
			}
			if (isset($this->request->data['Vendor']['wide_file']['name']) && $this->request->data['Vendor']['wide_file']['name']) {
				$this->request->data['Vendor']['wide_file']['name']
					= $this->request->data['Vendor']['name'].str_replace(" ","_", $this->request->data['Vendor']['wide_file']['name']);
				$this->request->data['Vendor']['wide_image'] = 'files/'.$this->request->data['Vendor']['wide_file']['name'];
				copy($this->request->data['Vendor']['wide_file']['tmp_name'], $this->request->data['Vendor']['wide_image']);
			}
			if (isset($this->request->data['Vendor']['facebook_file']['name']) && $this->request->data['Vendor']['facebook_file']['name']) {
				$this->request->data['Vendor']['facebook_file']['name']	
					= $this->request->data['Vendor']['name'].str_replace(" ","_", $this->request->data['Vendor']['facebook_file']['name']);
				$this->request->data['Vendor']['facebook_image'] = 'files/'.$this->request->data['Vendor']['facebook_file']['name'];
				copy($this->request->data['Vendor']['facebook_file']['tmp_name'], $this->request->data['Vendor']['facebook_image']);
			}
			if (isset($this->request->data['Vendor']['carousel_image_file']['name']) && $this->request->data['Vendor']['carousel_image_file']['name']) {
				$this->request->data['Vendor']['carousel_image_file']['name']
					= $this->request->data['Vendor']['name'].str_replace(" ","_", $this->request->data['Vendor']['carousel_image_file']['name']);
				$this->request->data['Vendor']['carousel_image'] = 'files/carousel/'.$this->request->data['Vendor']['carousel_image_file']['name'];
				copy($this->request->data['Vendor']['carousel_image_file']['tmp_name'], $this->request->data['Vendor']['carousel_image']);
			}
			if ($this->Vendor->save($this->request->data)) {
				$this->Session->setFlash(__('The vendor has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The vendor could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Vendor->read(null, $id);
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
		$this->Vendor->id = $id;
		if (!$this->Vendor->exists()) {
			throw new NotFoundException(__('Invalid vendor'));
		}
		if ($this->Vendor->delete()) {
			$this->Session->setFlash(__('Vendor deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Vendor was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
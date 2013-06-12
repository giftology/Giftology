<?php
App::uses('AppController', 'Controller');
/**
 * UserUtms Controller
 *
 * @property UserUtm $UserUtm
 */
class UserUtmsController extends AppController {
	public $helpers = array('Minify.Minify');
	   public $components = array('Giftology','Search.Prg');
    public $presetVars = array(
            array('field' => 'id', 'type' => 'value'),
            array('field' => 'user_id', 'type' => 'value'),
            array('field' => 'utm_source', 'type' => 'value'),
            array('field' => 'utm_medim', 'type' => 'value'),
            array('field' => 'utm_campaign', 'type' => 'value'),
            array('field' => 'utm_term', 'type'=> 'value'),
            array('field' => 'utm_content', 'type'=>'value'),
            array('field'=> 'created','type'=>'value'),
            array('field'=> 'modified','type'=>'value'),
           
        );
/**
 * index method
 *
 * @return void
 */
public function download_utm_all($download_selected = null){
        $this->Prg->commonProcess('UserUtm');
        $array1 = unserialize($download_selected);
        if(($array1['created_start'])||($array1['modified_start']))
        { 
            if(!($array1['created_start'])){
                 $modified_end=$array1['modified_end'].' 23:59:59';
                 $modified_start=$array1['modified_start'].' 00:00:00';
                if(!$array1['modified_end']){
                    $modified_end=$array1['modified_start'].' 23:59:59';
                }
                
               $conditions=array('conditions' => array($this->UserUtm->parseCriteria($array1),'UserUtm.modified >'=>$modified_start,'UserUtm.modified <' => $modified_end
               
               ),'order'=>array('UserUtm.modified'=>'DESC')); 
            }
            
            if(!($array1['modified_start'])){
                 $created_end=$array1['created_end'].' 23:59:59';
                 $created_start=$array1['created_start'].' 00:00:00';
                if(!$array1['created_end']){
                    $created_end=$array1['created_start'].' 23:59:59';
                }
             $conditions=array('conditions' => array($this->UserUtm->parseCriteria($array1) ,'UserUtm.created >'=>$created_start,'UserUtm.created <' => $created_end
               ),'order'=>array('UserUtm.modified'=>'DESC')); 
            }


        
           
           if(($array1['created_start'])&&(($array1['modified_start'])) )
            { 
                 $modified_end=$array1['modified_end'].' 23:59:59';
                 $modified_start=$array1['modified_start'].' 00:00:00';
                 $created_end=$array1['created_end'].' 23:59:59';
                 $created_start=$array1['created_start'].' 00:00:00';
                if(!$array1['modified_end']){
                    $modified_end=$array1['modified_start'].' 23:59:59';
                }
                if(!$array1['created_end']){
                    $created_end=$array1['created_start'].' 23:59:59';
                }
                
          $conditions=array('conditions' => array($this->UserUtm->parseCriteria($array1),'UserUtm.modified >'=>$modified_start,'UserUtm.modified <' => $modified_end
           ,'UserUtm.created >'=>$created_start,'UserUtm.created <' => $created_end
            ),'order'=>array('UserUtm.modified'=>'DESC'));  
             }  
            
    
        }
        else{
        $conditions= array('conditions' => array($this->UserUtm->parseCriteria($array1)),'order'=>array('UserUtm.modified'=>'DESC'));
       	}
        $result1= $this->UserUtm->find('all', $conditions);

                    $filename = "UserUtm ".date("Y.m.d").".csv";
                    $csv_file = fopen('php://output', 'w');
                    header('Content-type: application/csv');
                    header('Content-Disposition: attachment; filename="'.$filename.'"');
                    $header_row= array('Id','User_id','Utm Source','Utm Medium','Utm Campaign','Utm Term','Utm Content','Created','Modified');
                    fputcsv($csv_file,$header_row,',','"');
                    if( !empty( $this->data ))
                    {
                        foreach($result1 as $id)  
                        {
                            $result= $this->UserUtm->find('first', array('conditions'=>array('UserUtm.id'=>$id['UserUtm']['id'])));
                            $row = array(
                            $result['UserUtm']['id'],
                            $result['UserUtm']['user_id'],
                            $result['UserUtm']['utm_source'],
                            $result['UserUtm']['utm_medium'],
                            $result['UserUtm']['utm_campaign'],
                            $result['UserUtm']['utm_term'],
                            $result['UserUtm']['utm_content'],

                            $result['UserUtm']['created'],
                            $result['UserUtm']['modified'],

                             );
                            fputcsv($csv_file,$row,',','"');
                        }
                    }
                    die;
}
         public function download_utm_csv(){
				
                    $filename = "UserUtm ".date("Y.m.d").".csv";
                    $csv_file = fopen('php://output', 'w');
                    header('Content-type: application/csv');
                    header('Content-Disposition: attachment; filename="'.$filename.'"');
                    $header_row= array('Id','User_id','Utm Source','Utm Medium','Utm Campaign','Utm Term','Utm Content','Created','Modified');
                    fputcsv($csv_file,$header_row,',','"');
                    if( !empty( $this->data ))
                    {
                        foreach($this->data['chk1'] as $id)  
                        {
                            $ab=" ";
                            $result= $this->UserUtm->find('first', array('conditions'=>array('UserUtm.id'=>$id)));
                            $row = array(
                            $result['UserUtm']['id'],
                            $result['UserUtm']['user_id'],
                            $result['UserUtm']['utm_source'],
                            $result['UserUtm']['utm_medium'],
                            $result['UserUtm']['utm_campaign'],
                            $result['UserUtm']['utm_term'],
                            $result['UserUtm']['utm_content'],

                            $result['UserUtm']['created'],
                            $result['UserUtm']['modified'],

                             );
                            fputcsv($csv_file,$row,',','"');
                        }
                    }
                    die;
               }
	public function index() {
		//DebugBreak();

        $this->UserUtm->recursive = 0;

        $this->Prg->commonProcess('UserUtm');
        	 if(($this->passedArgs['created_start'])||($this->passedArgs['modified_start']))
        { 
            if(!($this->passedArgs['created_start'])){
                 $modified_end=$this->passedArgs['modified_end'].' 23:59:59';
                 $modified_start=$this->passedArgs['modified_start'].' 00:00:00';
                if(!$this->passedArgs['modified_end']){
                    $modified_end=$this->passedArgs['modified_start'].' 23:59:59';
                }
                
               $conditions=array('conditions' => array($this->UserUtm->parseCriteria($this->passedArgs),'UserUtm.modified >'=>$modified_start,'UserUtm.modified <' => $modified_end
               
               ),'order'=>array('UserUtm.modified'=>'DESC')); 
            }
            
            if(!($this->passedArgs['modified_start'])){
                 $created_end=$this->passedArgs['created_end'].' 23:59:59';
                 $created_start=$this->passedArgs['created_start'].' 00:00:00';
                if(!$this->passedArgs['created_end']){
                    $created_end=$this->passedArgs['created_start'].' 23:59:59';
                }
             $conditions=array('conditions' => array($this->UserUtm->parseCriteria($this->passedArgs) ,'UserUtm.created >'=>$created_start,'UserUtm.created <' => $created_end
               ),'order'=>array('UserUtm.modified'=>'DESC')); 
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
                
          $conditions=array('conditions' => array($this->UserUtm->parseCriteria($this->passedArgs),'UserUtm.modified >'=>$modified_start,'UserUtm.modified <' => $modified_end
           ,'UserUtm.created >'=>$created_start,'UserUtm.created <' => $created_end
            ),'order'=>array('UserUtm.modified'=>'DESC'));  
             }  
            
    
        }
        else{
		$conditions= array('conditions' => array($this->UserUtm->parseCriteria($this->passedArgs)),'order'=>array('UserUtm.created'=>'DESC'));
		 }
        $this->paginate = $conditions;
     	$users=$this->paginate();
		$this->set('userUtms', $users);
		$this->set('download_selected',serialize($this->passedArgs));


	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->UserUtm->id = $id;
		if (!$this->UserUtm->exists()) {
			throw new NotFoundException(__('Invalid user utm'));
		}
		$this->set('userUtm', $this->UserUtm->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->UserUtm->create();
			if ($this->UserUtm->save($this->request->data)) {
				$this->Session->setFlash(__('The user utm has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user utm could not be saved. Please, try again.'));
			}
		}
		$users = $this->UserUtm->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->UserUtm->id = $id;
		if (!$this->UserUtm->exists()) {
			throw new NotFoundException(__('Invalid user utm'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->UserUtm->save($this->request->data)) {
				$this->Session->setFlash(__('The user utm has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user utm could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->UserUtm->read(null, $id);
		}
		$users = $this->UserUtm->User->find('list');
		$this->set(compact('users'));
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
		$this->UserUtm->id = $id;
		if (!$this->UserUtm->exists()) {
			throw new NotFoundException(__('Invalid user utm'));
		}
		if ($this->UserUtm->delete()) {
			$this->Session->setFlash(__('User utm deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User utm was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

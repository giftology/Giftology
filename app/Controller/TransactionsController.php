<?php
App::uses('AppController', 'Controller');
/**
 * Transactions Controller
 *
 * @property Transaction $Transaction
 */
class TransactionsController extends AppController {
	public $helpers = array('Minify.Minify');
	public $components = array('CCAvenue','Search.Prg');
   
	public function isAuthorized($user) {
	    if (($this->action == 'start_transaction')) {
	        return true;
	    }
	    return parent::isAuthorized($user);
	}
	public $presetVars = array(
            array('field' => 'id', 'type' => 'value'),
            array('field' => 'amount_paid', 'type' => 'value'),
            array('field' => 'transaction_status_id', 'type' => 'value'),
            array('field'=> 'sender_id','type'=>'value'),
            array('field'=> 'receiver_id','type'=>'value'),
            array('field'=> 'product_id','type'=>'value'),
            array('field'=> 'gift_id','type'=>'value'),
            array('field'=> 'gift_amount','type'=>'value'),
            array('field'=> 'gift_status_id','type'=>'value'),
            array('field'=> 'expiry_date','type'=>'value'),
            array('field'=> 'created','type'=>'value'),
            array('field'=> 'modified','type'=>'value'),
        
        );

/**
 * index method
 *
 * @return void
 */
public function download_transaction_csv(){
				
                    $filename = "Transaction ".date("Y.m.d").".csv";
                    $csv_file = fopen('php://output', 'w');
                    header('Content-type: application/csv');
                    header('Content-Disposition: attachment; filename="'.$filename.'"');
                    $header_row= array('Id','Sender Id','Receiver Id','Product Id','Gif Id','Amount','Status','Created','Modified');
                    fputcsv($csv_file,$header_row,',','"');
                    if( !empty( $this->data ))
                    {
                        foreach($this->data['chk1'] as $id)  
                        {
                            
                            $result= $this->Transaction->find('first', array('conditions'=>array('Transaction.id'=>$id)));
                           
                            $row = array(
                            $result['Transaction']['id'],
                            $result['Gift']['sender_id'],
                            $result['Gift']['receiver_id'],
                            $result['Gift']['product_id'],
                            $result['Gift']['id'],
                             $result['Transaction']['amount_paid'],
                            $result['Transaction']['transaction_status_id'],
                            $result['Transaction']['created'],
                            $result['Transaction']['modified'],

                             );
                            fputcsv($csv_file,$row,',','"');
                        }
                    }
                    die;
                  	}
	public function index() {
		
        $this->Prg->commonProcess('Transaction');

		
		 if(($this->passedArgs['created_start'])||($this->passedArgs['modified_start']))
        { 
            if(!($this->passedArgs['created_start'])){
                 $modified_end=$this->passedArgs['modified_end'].' 23:59:59';
                 $modified_start=$this->passedArgs['modified_start'].' 00:00:00';
                if(!$this->passedArgs['modified_end']){
                    $modified_end=$this->passedArgs['modified_start'].' 23:59:59';
                }
                
               $conditions=array('conditions' => array($this->Transaction->parseCriteria($this->passedArgs),'Transaction.modified >'=>$modified_start,'Transaction.modified <' => $modified_end
               
               )); 
            }
            
            if(!($this->passedArgs['modified_start'])){
                 $created_end=$this->passedArgs['created_end'].' 23:59:59';
                 $created_start=$this->passedArgs['created_start'].' 00:00:00';
                if(!$this->passedArgs['created_end']){
                    $created_end=$this->passedArgs['created_start'].' 23:59:59';
                }
             $conditions=array('conditions' => array($this->Transaction->parseCriteria($this->passedArgs) ,'Transaction.created >'=>$created_start,'Transaction.created <' => $created_end
               )); 
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
                
          $conditions=array('conditions' => array($this->Transaction->parseCriteria($this->passedArgs),'Transaction.modified >'=>$modified_start,'Transaction.modified <' => $modified_end
           ,'Transaction.created >'=>$created_start,'Transaction.created <' => $created_end
            ));  
             }  
            
    
        }
        else{
        $conditions= array('conditions' => array($this->Transaction->parseCriteria($this->passedArgs)));

        }
       
		$this->paginate = $conditions;
		$this->Transaction->recursive = 0;
		$this->set('transactions', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Transaction->id = $id;
		if (!$this->Transaction->exists()) {
			throw new NotFoundException(__('Invalid transaction'));
		}
		$this->set('transaction', $this->Transaction->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Transaction->create();
			if ($this->Transaction->save($this->request->data)) {
				$this->Session->setFlash(__('The transaction has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The transaction could not be saved. Please, try again.'));
			}
		}
		$senders = $this->Transaction->Sender->find('list');
		$receivers = $this->Transaction->Receiver->find('list');
		$products = $this->Transaction->Product->find('list');
		$gifts = $this->Transaction->Gift->find('list');
		$transactionStatuses = $this->Transaction->TransactionStatus->find('list');
		$this->set(compact('senders', 'receivers', 'products', 'gifts', 'transactionStatuses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Transaction->id = $id;
		if (!$this->Transaction->exists()) {
			throw new NotFoundException(__('Invalid transaction'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Transaction->save($this->request->data)) {
				$this->Session->setFlash(__('The transaction has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The transaction could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Transaction->read(null, $id);
		}
		$senders = $this->Transaction->Sender->find('list');
		$receivers = $this->Transaction->Receiver->find('list');
		$products = $this->Transaction->Product->find('list');
		$gifts = $this->Transaction->Gift->find('list');
		$transactionStatuses = $this->Transaction->TransactionStatus->find('list');
		$pgs = $this->Transaction->Pg->find('list');
		$this->set(compact('senders', 'receivers', 'products', 'gifts', 'transactionStatuses', 'pgs'));
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
		$this->Transaction->id = $id;
		if (!$this->Transaction->exists()) {
			throw new NotFoundException(__('Invalid transaction'));
		}
		if ($this->Transaction->delete()) {
			$this->Session->setFlash(__('Transaction deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Transaction was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	public function start_transaction () {

		$Merchant_Id = CCAV_MERCHANT_ID;//This id(also User Id)  available at "Generate Working Key" of "Settings & Options" 
		$Amount = $this->request->params['named']['amount'] ;//your script should substitute the amount in the quotes provided here
		// Note: we are prepending GIFT here to avoid duplicate conflicts on CCAv with the Old giftology.  If you change the GIFT prepend
		// below, then be sure to also change tx_callback with strips this out. 
		$Order_Id = 'G1FT'.$this->request->params['named']['OrderId'] ;//your script should substitute the order description in the quotes provided here
		$Redirect_Url = FULL_BASE_URL.Router::url(array('controller'=>'gifts', 'action'=>'tx_callback')); //your redirect URL where your customer will be redirected after authorisation from CCAvenue
		$WorkingKey = CCAV_WORKING_KEY  ;//put in the 32 bit alphanumeric key in the quotes provided here.Please note that get this key ,login to your CCAvenue merchant account and visit the "Generate Working Key" section at the "Settings & Options" page. 
		$Checksum = $this->CCAvenue->getchecksum($Merchant_Id,$Amount,$Order_Id ,$Redirect_Url,$WorkingKey);
		$this->set('Merchant_Id', $Merchant_Id);
		$this->set('Amount', $Amount);
		$this->set('Order_Id', $Order_Id);
		$this->set('Redirect_Url', $Redirect_Url);
		$this->set('WorkingKey', $WorkingKey);
		$this->set('Checksum', $Checksum);
	}
}

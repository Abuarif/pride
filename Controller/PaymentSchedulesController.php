<?php
App::uses('PrideAppController', 'Pride.Controller');
App::uses('OrganizationsController', 'Pride.Controller');
App::uses('PaymentAdvicesController', 'Members.Controller');
App::uses('CakeTime', 'Utility');
App::uses('NumberHelper', 'View/Helper');
/**
 * PaymentSchedules Controller
 *
 * @property PaymentSchedule $PaymentSchedule
 * @property PaginatorComponent $Paginator
 */
class PaymentSchedulesController extends PrideAppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->PaymentSchedule->recursive = 0;
		$this->set('paymentSchedules', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PaymentSchedule->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid payment schedule'));
		}
		$options = array('conditions' => array('PaymentSchedule.' . $this->PaymentSchedule->primaryKey => $id));
		$this->set('paymentSchedule', $this->PaymentSchedule->find('first', $options));
	}
	
	public function getPaymentSchedule($id = null) {
		/* if (!$this->PaymentSchedule->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid payment schedule'));
		} */
		$options = array('conditions' => array('PaymentSchedule.payment_advice_id'  => $id));
		return  $this->PaymentSchedule->find('all', $options);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PaymentSchedule->create();
			if ($this->PaymentSchedule->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The payment schedule has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The payment schedule could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$users = $this->PaymentSchedule->User->find('list');
		$organizations = $this->PaymentSchedule->Organization->find('list');
		$campaigns = $this->PaymentSchedule->Campaign->find('list');
		$campaignOrders = $this->PaymentSchedule->CampaignOrder->find('list');
		$paymentAdvices = $this->PaymentSchedule->PaymentAdvice->find('list');
		$this->set(compact('users', 'organizations', 'campaigns', 'campaignOrders', 'paymentAdvices'));
	}

	public function multi_create($org_id = null, $reservation_id = null, $payment_advice_id = null, $quantity = null) {
	
		//$this->log("multi_create: ".$reservation_id." ". $quantity);
		if (isset($reservation_id) && isset($quantity)) {
			for ($iterate = 1; $iterate <= $quantity; $iterate ++) {
				$this->create_schedule($org_id, $reservation_id, $payment_advice_id, $iterate);
			}
			
			$this->redirect(
						array(
							'plugin' => 'members',
							'controller' => 'payment_advices',
							'action' => 'view',
							$payment_advice_id
							)
						);
					
		}
	}

/**
 * create_order method
 *
 * @return void
 */
	public function create_schedule($org_id = null, $reservation_id = null, $payment_advice_id = null, $order_number = null) {
			
		//$this->log("create_order: ".$reservation_id." ". $order_number);
		
		$row['user_id']				= $this->Session->read('Auth.User.id');
		$row['organization_id']		= $org_id;
		$row['reservation_id']		= $reservation_id;
		$row['payment_advice_id']	= $payment_advice_id;
		$row['schedule_number'] 	= $order_number;

		$this->PaymentSchedule->create();
		$this->PaymentSchedule->set($row);
		if ($this->PaymentSchedule->save()) {
			$this->Session->setFlash(__d('croogo', 'The payment schedule has been created'), 'default', array('class' => 'alert alert-success'));	
		} else {
			$this->Session->setFlash(__d('croogo', 'The payment schedule could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
	}
	
	public function create($org_id = null, $reservation_id = null, $payment_advice_id = null, $order_number = null) {
			
		$this->log("create_order: ".$reservation_id." ". $order_number);
		
		$row['user_id']				= $this->Session->read('Auth.User.id');
		$row['organization_id']		= $org_id;
		$row['reservation_id']	= $reservation_id;
		$row['payment_advice_id']	= $payment_advice_id;
		$row['schedule_number'] 	= $order_number;
				
		$this->PaymentSchedule->create();
		$this->PaymentSchedule->set($row);
		if ($this->PaymentSchedule->save()) {
			$this->Session->setFlash(__d('croogo', 'The payment schedule has been created'), 'default', array('class' => 'alert alert-success'));

			$this->redirect(
						array(
							'plugin' => 'members',
							'controller' => 'payment_advices',
							'action' => 'view',
							$payment_advice_id,
							'#' => 'tab_2-2'
							)
						);
		} else {
			$this->Session->setFlash(__d('croogo', 'The payment schedule could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
	}
	
	public function create_approve_payment($paymentSchedule_id = null, $paymentAdvice_id = null) {
		if (!$this->PaymentSchedule->exists($paymentSchedule_id)) {
			throw new NotFoundException(__d('croogo', 'Invalid payment schedule'));
		}
					
		if (!empty($paymentSchedule_id)){
			
			$this->PaymentSchedule->id = $paymentSchedule_id;
			$this->PaymentSchedule->saveField('approval_status', '1');			
			
			$this->Session->setFlash(__d('croogo', 'The payment schedule has been approved'), 'default', array('class' => 'alert alert-success'));
			
			$this->redirect(array('plugin' => 'members', 'controller' => 'payment_advices', 'action' => 'view', $paymentAdvice_id, '#' => 'tab_2-2'));		
					
		}else{
		
			$this->Session->setFlash(__d('croogo', 'The payment schedule could not be approved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			
			$this->redirect(array('plugin' => 'members', 'controller' => 'payment_advices', 'action' => 'view', $paymentAdvice_id, '#' => 'tab_2-2'));
		}
	}
	
/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	
	public function split_date($input) {
		$arr = explode("/", $input);
	   
		//Display the Start Date array format
		return array(
			 "day" => $arr[1], 
			 "month" => $arr[0], 
			 "year" => $arr[2]
		);
	}
	
	
	public function edit($id = null, $paymentAdvice_id = null) {
		if (!$this->PaymentSchedule->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid payment schedule'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
		
			$this->request->data['PaymentSchedule']['due_date'] = $this->split_date($this->request->data['PaymentSchedule']['due_date']);
			
			$this->PaymentSchedule->create();
						
			if ($this->PaymentSchedule->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The payment schedule has been saved'), 'default', array('class' => 'alert alert-success'));
				
				$this->redirect(array('plugin' => 'members', 'controller' => 'payment_advices', 'action' => 'view', $paymentAdvice_id, '#' => 'tab_2-2'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The payment schedule could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
			
		} else {
			// get the unallocated invoice amount
			$advice = new PaymentAdvicesController;
			
			$unallocated = $advice->getUnallocatedInvoiceAmount($paymentAdvice_id);
			
			$options = array('conditions' => array('PaymentSchedule.' . $this->PaymentSchedule->primaryKey => $id));
			$this->request->data = $this->PaymentSchedule->find('first', $options);
			if ($this->request->data['PaymentSchedule']['due_date'] == 0) {
				$this->request->data['PaymentSchedule']['due_date'] = date('m/d/Y');
			} else {
				$this->request->data['PaymentSchedule']['due_date'] = CakeTime::format($this->request->data['PaymentSchedule']['due_date'], '%m/%d/%Y');
			}
			
		}
		
		$users = $this->PaymentSchedule->User->find('list');
		$organizations = $this->PaymentSchedule->Organization->find('list');
		$campaignOrders = $this->PaymentSchedule->Reservation->find('list');
		$paymentAdvices = $this->PaymentSchedule->PaymentAdvice->find('list');
		$this->set(compact('users', 'organizations', 'campaignOrders', 'paymentAdvices', 'unallocated'));
		
		$number = new NumberHelper(new View());
			
		$this->Session->setFlash(__d('croogo', 'The total invoice amount unallocated is <b>'.$number->currency($unallocated, 'RM').'</b><br/> Please configure the payment schedules accordingly.'), 'default', array('class' => 'alert alert-warning'));
		
		if ($unallocated > 0) {
				$this->Session->setFlash(__d('croogo', 'The total invoice amount unallocated is <b>'.$number->currency($unallocated, 'RM').'</b><br/> Please configure the payment schedules accordingly.'), 'default', array('class' => 'alert alert-warning'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The total invoice amount <b>'.$number->currency($this->request->data['PaymentAdvice']['amount'], 'RM').'</b> has been allocated.'), 'default', array('class' => 'alert alert-success'));
			}
	}

	public function update($id = null) {
		if (!$this->PaymentSchedule->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid payment advice'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->PaymentSchedule->saveReceipt($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The payment schedule has been saved'), 'default', array('class' => 'alert alert-success'));
				
				$org_id = $this->Session->read('Auth.User.organization_id');
			
				$this->notify_finance($org_id);
				
				$this->redirect(array('plugin' => 'members', 'controller' => 'payment_advices', 'action' => 'client_view', $this->request->data['PaymentSchedule']['payment_advice_id']));
			} else {
				$this->Session->setFlash(__d('croogo', 'The payment advice could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('PaymentSchedule.' . $this->PaymentSchedule->primaryKey => $id));
			$this->request->data = $this->PaymentSchedule->find('first', $options);
		}
		$users = $this->PaymentSchedule->User->find('list');
		$organizations = $this->PaymentSchedule->Organization->find('list');
		$this->set(compact('users', 'organizations'));
	}
	
	public function notify_finance($organization_id) {
	
		$organization = new OrganizationsController;
		
		$options = array('conditions' => array(
			'Organization.id' => $organization_id));
		$myOrg = $organization->Organization->find('first', $options);
		
		$options = array('conditions' => array(
			'PaymentSchedule.organization_id' => $organization_id));
		$myAdvice = $this->PaymentSchedule->find('first', $options);
		
		/* //debug
		print_r($myOrg).'<br/>';
		print_r($myAdvice).'<br/>'; */
			
		// define email content
		$emailContent['email']['title'] = 'PRIDE AMS - Payment Updates from '.$myOrg['Organization']['name'];
		$emailContent['email']['activity'] 			= 'Payment Receipt';
		$emailContent['email']['advertiser'] 		= $myOrg['Organization']['name'];
		$emailContent['email']['descriptions'] 		= $myAdvice['PaymentSchedule']['descriptions'];
		$emailContent['email']['amount'] 			= $myAdvice['PaymentSchedule']['amount'];
		$emailContent['email']['attachment'] 		= $myAdvice['PaymentSchedule']['receipt_attachment'];
		$emailContent['email']['created'] 			= $myAdvice['PaymentSchedule']['created'];
		
		$template = 'Members.new_payment_advice';
		$label = 'New Advertiser registration';
		$coreUserEmail[0] = 'suhaimi.albakri@gmail.com';
		$coreUserEmail[1] = 'nizar.azik@prasarana.com.my';
		$myOrgUser[0] =  $myOrg['Organization']['contact_email'];
		
		//append all email receipients into 1 array
		$toEmail = array_merge ($coreUserEmail, $myOrgUser);
		
		// send notification email to Pride  group
		$this->sendEmail(
				array(Configure::read('Site.title'), 
				$this->getSenderEmail()),
				$toEmail,
				$emailContent['email']['title'],
				$template,
				$label,
				$this->theme,
				array('user' => $emailContent)
		);
	}
/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null, $paymentAdvice_id = null) {
		$this->PaymentSchedule->id = $id;
		
		if (!$this->PaymentSchedule->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid payment schedule'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PaymentSchedule->delete()) {
			$this->Session->setFlash(__d('croogo', 'Payment schedule has been deleted'), 'default', array('class' => 'alert alert-success'));
			
			//Commented by Nizar 04/12/2014 [10:15 AM]
			//$this->redirect(array('action' => 'index'));
			
			$this->redirect(array('plugin' => 'members', 'controller' => 'payment_advices', 'action' => 'view', $paymentAdvice_id, '#' => 'tab_2-2'));
		}
		$this->Session->setFlash(__d('croogo', 'Payment schedule was not deleted'), 'default', array('class' => 'alert alert-danger'));
		$this->redirect(array('action' => 'index'));
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->PaymentSchedule->recursive = 0;
		$this->set('paymentSchedules', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->PaymentSchedule->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid payment schedule'));
		}
		$options = array('conditions' => array('PaymentSchedule.' . $this->PaymentSchedule->primaryKey => $id));
		$this->set('paymentSchedule', $this->PaymentSchedule->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->PaymentSchedule->create();
			if ($this->PaymentSchedule->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The payment schedule has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The payment schedule could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$users = $this->PaymentSchedule->User->find('list');
		$organizations = $this->PaymentSchedule->Organization->find('list');
		$campaigns = $this->PaymentSchedule->Campaign->find('list');
		$campaignOrders = $this->PaymentSchedule->CampaignOrder->find('list');
		$paymentAdvices = $this->PaymentSchedule->PaymentAdvice->find('list');
		$this->set(compact('users', 'organizations', 'campaigns', 'campaignOrders', 'paymentAdvices'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->PaymentSchedule->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid payment schedule'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->PaymentSchedule->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The payment schedule has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The payment schedule could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('PaymentSchedule.' . $this->PaymentSchedule->primaryKey => $id));
			$this->request->data = $this->PaymentSchedule->find('first', $options);
		}
		$users = $this->PaymentSchedule->User->find('list');
		$organizations = $this->PaymentSchedule->Organization->find('list');
		$campaigns = $this->PaymentSchedule->Campaign->find('list');
		$campaignOrders = $this->PaymentSchedule->CampaignOrder->find('list');
		$paymentAdvices = $this->PaymentSchedule->PaymentAdvice->find('list');
		$this->set(compact('users', 'organizations', 'campaigns', 'campaignOrders', 'paymentAdvices'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->PaymentSchedule->id = $id;
		if (!$this->PaymentSchedule->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid payment schedule'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PaymentSchedule->delete()) {
			$this->Session->setFlash(__d('croogo', 'Payment schedule deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Payment schedule was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function getUpdatedCount($id = null, $payee = null, $organization_id = null) {
		
		$query['fields'] = array('count(PaymentSchedule.id) as total');
		$query['conditions'] = array(
						'PaymentSchedule.payment_advice_id' => $id, 
						'PaymentSchedule.payee' => $payee, 
						'PaymentSchedule.organization_id' => $organization_id
						);
		
		return $this->PaymentSchedule->find('first', $query);
	
	}
	
	public function getStatusCount($id = null, $payee = null, $organization_id = null) {
	
		$query['fields'] = array('count(PaymentSchedule.id) as total');
		$query['conditions'] = array(
						'PaymentSchedule.payment_advice_id' => $id, 
						'PaymentSchedule.approval_status' => true, 
						'PaymentSchedule.payee' => $payee, 
						'PaymentSchedule.organization_id' => $organization_id
						);
		
		return $this->PaymentSchedule->find('first', $query);
	}
}

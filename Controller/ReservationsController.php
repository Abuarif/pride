<?php
App::uses('PrideAppController', 'Pride.Controller');
App::uses('CampaignOrderDetailsController', 'Pride.Controller');
/**
 * Reservations Controller
 *
 * @property Reservation $Reservation
 * @property PaginatorComponent $Paginator
 */
class ReservationsController extends PrideAppController {

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
	public function index($option = null) {
		$this->Reservation->recursive = 0;
		
		$approvedEntry = array(
			'limit' => 5,
			'conditions' => array('Reservation.status' => true),
			'order' => array(
				'Reservation.created' => 'desc'
			)
		);

		$newEntry = array(
			'limit' => 5,
			'conditions' => array('Reservation.status' => false), 
			'order' => array(
				'Reservation.created' => 'desc'
			)
		);
		
		if(!empty($option) && $option == 1) {
			$this->Paginator->settings = $approvedEntry;
		} else {
			$this->Paginator->settings = $newEntry;
		}
		// Only role = advertiser will be filtered
		if ( CakeSession::read('Auth.User.Role.id') == 4) {
			$criteria['Reservation.organization_id'] = CakeSession::read('Auth.User.Organization.id');
			$reservations = $this->paginate($criteria);
		} else {
			$reservations = $this->paginate();
		}
		
		$this->set('reservations', $reservations);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Reservation->exists($id)) {
			//throw new NotFoundException(__d('croogo', 'Invalid reservation'));
			$this->Session->setFlash(__d('croogo', 'Invalid URL request. Please re-try.'), 'default', array('class' => 'alert alert-danger'));
			$this->redirect($this->request->referer());
		}
		$options = array('conditions' => array('Reservation.' . $this->Reservation->primaryKey => $id));
		$this->set('reservation', $this->Reservation->find('first', $options));
	}
	
	public function approval_preview($id = null) {
		if (!$this->Reservation->exists($id)) {
			//throw new NotFoundException(__d('croogo', 'Invalid reservation'));
			$this->Session->setFlash(__d('croogo', 'Invalid URL request. Please re-try.'), 'default', array('class' => 'alert alert-danger'));
			$this->redirect($this->request->referer());
		}
		$options = array('conditions' => array('Reservation.' . $this->Reservation->primaryKey => $id));
		$this->set('reservation', $this->Reservation->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Reservation->create();
			if ($this->Reservation->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The reservation has been saved'), 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('action' => 'index',0));
			} else {
				$this->Session->setFlash(__d('croogo', 'The reservation could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$organizations = $this->Reservation->Organization->find('list');
		$users = $this->Reservation->User->find('list');
		$this->set(compact('organizations', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Reservation->exists($id)) {
			//throw new NotFoundException(__d('croogo', 'Invalid reservation'));
			$this->Session->setFlash(__d('croogo', 'Invalid URL request. Please re-try.'), 'default', array('class' => 'alert alert-danger'));
			$this->redirect($this->request->referer());
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Reservation->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The reservation has been saved'), 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The reservation could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Reservation.' . $this->Reservation->primaryKey => $id));
			$this->request->data = $this->Reservation->find('first', $options);
		}
		$organizations = $this->Reservation->Organization->find('list');
		$users = $this->Reservation->User->find('list');
		$this->set(compact('organizations', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Reservation->id = $id;
		if (!$this->Reservation->exists()) {
			//throw new NotFoundException(__d('croogo', 'Invalid reservation'));
			$this->Session->setFlash(__d('croogo', 'Invalid URL request. Please re-try.'), 'default', array('class' => 'alert alert-danger'));
			$this->redirect($this->request->referer());
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Reservation->delete()) {
			$this->Session->setFlash(__d('croogo', 'Reservation deleted'), 'default', array('class' => 'alert alert-success'));
			$this->redirect(array('action' => 'index',0));
		}
		$this->Session->setFlash(__d('croogo', 'Reservation was not deleted'), 'default', array('class' => 'alert alert-danger'));
		$this->redirect(array('action' => 'index',0));
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Reservation->recursive = 0;
		$this->set('reservations', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Reservation->exists($id)) {
			//throw new NotFoundException(__d('croogo', 'Invalid reservation'));
			$this->Session->setFlash(__d('croogo', 'Invalid URL request. Please re-try.'), 'default', array('class' => 'alert alert-danger'));
			$this->redirect($this->request->referer());
		}
		$options = array('conditions' => array('Reservation.' . $this->Reservation->primaryKey => $id));
		$this->set('reservation', $this->Reservation->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Reservation->create();
			if ($this->Reservation->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The reservation has been saved'), 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The reservation could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$organizations = $this->Reservation->Organization->find('list');
		$users = $this->Reservation->User->find('list');
		$this->set(compact('organizations', 'users'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Reservation->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid reservation'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Reservation->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The reservation has been saved'), 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The reservation could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Reservation.' . $this->Reservation->primaryKey => $id));
			$this->request->data = $this->Reservation->find('first', $options);
		}
		$organizations = $this->Reservation->Organization->find('list');
		$users = $this->Reservation->User->find('list');
		$this->set(compact('organizations', 'users'));
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
		$this->Reservation->id = $id;
		if (!$this->Reservation->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid reservation'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Reservation->delete()) {
			$this->Session->setFlash(__d('croogo', 'Reservation deleted'), 'default', array('class' => 'alert alert-success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Reservation was not deleted'), 'default', array('class' => 'alert alert-danger'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function getLastReservation() {
	
		$options = array(
					'conditions' => array('Reservation.organization_id' => CakeSession::read('Auth.User.organization_id'), 'Reservation.status' => 0), 
					'order' => 'id DESC'	
					);
		
		$reservation = $this->Reservation->find('first', $options);
		
		$this->set(compact('reservation'));
	
	}
	
	public function rental_contract ($id = null) {
		//Release the layout for reporting
		$this->autoLayout = false;
		
		if (!$this->Reservation->exists($id)) {
			//throw new NotFoundException(__d('croogo', 'Invalid reservation'));
			$this->Session->setFlash(__d('croogo', 'Invalid URL request. Please re-try.'), 'default', array('class' => 'alert alert-danger'));
			$this->redirect($this->request->referer());
		}
		$options = array('conditions' => array('Reservation.' . $this->Reservation->primaryKey => $id));
		$this->set('reservation', $this->Reservation->find('first', $options));
		
		
		/* $sql = "SELECT *, (month(end_date) - month(start_date)) as month FROM campaign_order_details as CampaignOrderDetail, campaigns as Campaign, organizations as Organization, jobs as Job, job_tasks as JobTask, provision_buses as ProvisionBus
		WHERE 
		CampaignOrderDetail.organization_id = Organization.id AND
		CampaignOrderDetail.campaign_id = Campaign.id AND
		CampaignOrderDetail.job_id = Job.id AND
		CampaignOrderDetail.id = JobTask.campaign_order_detail_id AND
		CampaignOrderDetail.id = ProvisionBus.campaign_order_detail_id AND
		CampaignOrderDetail.id = '" .$id. "' LIMIT 1";
		
		$campaignOrderDetails = $this->CampaignOrderDetail->query($sql);
		
		$this->set('campaignOrderDetails', $campaignOrderDetails); */
		
		/* $options = array('conditions' => array('CampaignOrderDetail.' . $this->CampaignOrderDetail->primaryKey => $id));
		$this->set('campaignOrderDetail', $this->CampaignOrderDetail->find('first', $options)); */
	}
	
	public function debug_rental_contract ($id = null) {
				
		if (!$this->Reservation->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid reservation'));
		}
		$options = array('conditions' => array('Reservation.' . $this->Reservation->primaryKey => $id));
		$this->set('reservation', $this->Reservation->find('first', $options));
	}
	
	public function getEndDate($start_date = null, $month = null) {
		//date('m/d/Y', 1299446702)
		$sql = "
			SELECT DATE_ADD('".date('Y-m-d',$start_date)."', INTERVAL  ".$month." MONTH) as end_date
		";
		$this->log($sql);
		return $this->Reservation->query($sql);
	}
}


/* $campaignOrderDetail = new CampaignOrderDetailsController;
		
		$sql = "SELECT *, (month(end_date) - month(start_date)) as month FROM campaign_order_details as CampaignOrderDetail, campaigns as Campaign, organizations as Organization, jobs as Job, job_tasks as JobTask, provision_buses as ProvisionBus
		WHERE 
		CampaignOrderDetail.organization_id = Organization.id AND
		CampaignOrderDetail.campaign_id = Campaign.id AND
		CampaignOrderDetail.job_id = Job.id AND
		CampaignOrderDetail.id = JobTask.campaign_order_detail_id AND
		CampaignOrderDetail.id = ProvisionBus.campaign_order_detail_id AND
		CampaignOrderDetail.id = '" .$id. "' LIMIT 1";
		
		$cod = $campaignOrderDetail->CampaignOrderDetail->query($sql);
		
		$this->set('cod', $cod); */
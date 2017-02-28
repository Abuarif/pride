<?php
App::uses('PrideAppController', 'Pride.Controller');
App::uses('PrideAppController', 'Pride.Controller');
App::uses('ProvisionBusesController', 'Pride.Controller');
App::uses('JobTasksController', 'Pride.Controller');
App::uses('OrganizationDiscountsController', 'Pride.Controller');
App::uses('PackagesController', 'Pride.Controller');
App::uses('CampaignOrderDetailsController', 'Pride.Controller');
/**
 * CampaignOrders Controller
 *
 * @property CampaignOrder $CampaignOrder
 * @property PaginatorComponent $Paginator
 */
 
class CampaignOrdersController extends PrideAppController {

	public $approvedEntry = array(
        'limit' => 5,
		'conditions' => array('CampaignOrder.status' => true),
		'order' => array(
            'CampaignOrder.created' => 'desc'
			)
    );

	public $newEntry = array(
        'limit' => 5,
		'conditions' => array('CampaignOrder.status' => false),
		'order' => array(
            'CampaignOrder.created' => 'desc'
        )
    );
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator',  
	'RequestHandler' => array(
        'viewClassMap' => array('pdf' => 'CakePdf.Pdf')
    ));

/**
 * index method
 *
 * @return void
 */
 
	public function index($option = null) {
		$this->CampaignOrder->recursive = 0;
		
		$filter = array();
		
		$approvedEntry = array(
			'limit' => 5,
			'conditions' => array('CampaignOrder.status' => 1, $filter),
			'order' => array(
				'CampaignOrder.created' => 'desc'
			)
		);

		$newEntry = array(
			'limit' => 5,
			'conditions' => array('CampaignOrder.status' => 0, $filter),
			'order' => array(
				'CampaignOrder.created' => 'desc'
			)
		);
		
		if(!empty($option) && $option == 1) {
			$this->Paginator->settings = $approvedEntry;
		} else {
			$this->Paginator->settings = $newEntry;
		}
		// Only role = advertiser will be filtered
		if ( CakeSession::read('Auth.User.Role.id') == 4) {
			$criteria['CampaignOrder.organization_id'] = CakeSession::read('Auth.User.Organization.id');
			$campaignOrders = $this->paginate($criteria);
		} else {
			$campaignOrders = $this->paginate();
		}
		
		$this->set('campaignOrders', $campaignOrders);
		$this->active_view();
	}

/*
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CampaignOrder->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid campaign order'));
		}
		$options = array('conditions' => array('CampaignOrder.' . $this->CampaignOrder->primaryKey => $id));
		$campaignOrder = $this->CampaignOrder->find('first', $options);
		$this->set('campaignOrder', $campaignOrder);
		
		$discount = new OrganizationDiscountsController;
		$options = array('conditions' => array('OrganizationDiscount.organization_id' => $campaignOrder['CampaignOrder']['organization_id'], 'OrganizationDiscount.status' => 1, 'OrganizationDiscount.validity_start_date <= now()', 'OrganizationDiscount.validity_end_date >= now()'));
		$organizationDiscount = $discount->OrganizationDiscount->find('first', $options);
		$this->set('organizationDiscount', $organizationDiscount);
		
		$cod = new CampaignOrderDetailsController;
		$choice = array('conditions' => array('CampaignOrderDetail.organization_id' => $campaignOrder['Organization']['id']));
		
		$campaignOrderDetail = $cod->CampaignOrderDetail->find('all', $choice);
		$this->set('campaignOrderDetail', $campaignOrderDetail);
		
		// list available bus
		$this->loadModel('Bus');
		$this->Bus->read(null, '1');
		
	}

	public function download($id = null) {
		
		if (!$this->CampaignOrder->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid campaign order'));
		}
		$options = array('conditions' => array('CampaignOrder.' . $this->CampaignOrder->primaryKey => $id));
		$campaignOrder = $this->CampaignOrder->find('first', $options);
		$this->set('campaignOrder', $campaignOrder);
		
		// list available bus
		$this->loadModel('Bus');
		$this->Bus->read(null, '1');
		
		/* // only for advertiser
		if ($this->Session->read('Auth.User.Role.alias') == Configure::read('AMS.role_pride_advertiser') ) {
			$this->getConfigurationStatus($campaignOrder['CampaignOrder']['id']);
		} */
		
		/*  $params = array(
			'download' => false,
			'name' => 'campaign_order_'.$campaignOrder['CampaignOrder']['id'].'.pdf',
			'paperOrientation' => 'portrait',
			'paperSize' => 'A4'
		);
		$this->set($params); */
	}

	public function view_approval($id = null) {
		if (!$this->CampaignOrder->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid campaign order'));
		}
		$options = array('conditions' => array('CampaignOrder.' . $this->CampaignOrder->primaryKey => $id));
		$this->set('campaignOrder', $this->CampaignOrder->find('first', $options));
		
		// list available bus
		$this->loadModel('Bus');
		$this->Bus->read(null, '1');
		
		
	}
	
	public function view_campaign_summary($id = null) { 
		if (!$this->CampaignOrder->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid campaign order'));
		}
		$options = array('conditions' => array('CampaignOrder.' . $this->CampaignOrder->primaryKey => $id));
		$this->set('campaignOrder', $this->CampaignOrder->find('first', $options));
		
		
	}
/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CampaignOrder->create();
			if ($this->CampaignOrder->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The campaign order has been saved'), 'default', array('class' => 'alert alert-success', 'role' => 'alert'));
				//$this->redirect(array('action' => 'index'));
				$this->redirect(array(
				'plugin' => 'pride',
				//'controller' => 'campaign_order_approvals',
				//'action' => 'registration_approval', $register['organization_id']));
				'controller' => 'campaign_orders',
				'action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The campaign order could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger', 'role' => 'alert'));
			}
		}
		$campaign_criteria = array(
							'conditions' => array('Campaign.organization_id' => CakeSession::read('Auth.User.Organization.id')));
		//$campaigns = $this->CampaignDesign->Campaign->find('list', $campaign_criteria);
		$campaigns = $this->CampaignOrder->Campaign->find('list', $campaign_criteria);
		$packages = $this->CampaignOrder->Package->find('list');
		//$CampaignOrderApproval = $this->CampaignOrder->CampaignOrderApproval->find('list');
		$this->set(compact('campaigns', 'packages', 'campaignOrderApproval'));
	}

	public function purchase_package($campaign_id = null) {
		if ($this->request->is('post')) {
		
			// pre-empt campaign_id
			$row['campaign_id'] = $campaign_id;
			$this->CampaignOrder->create();
			$this->CampaignOrder->set($row);
			$this->CampaignOrder->set($this->request->data);
			if ($this->CampaignOrder->save()) {
				$this->Session->setFlash(__d('croogo', 'The campaign order has been saved'), 'default', array('class' => 'alert alert-success'));
				//$this->redirect(array('action' => 'index'));
				
				// auto provision bus
				$campaignOrderId = $this->CampaignOrder->getLastInsertId();
				//$myBus = new ProvisionBusesController;
				//$myBus->multi_create($campaignOrderId, $quantity);
				
				$this->redirect(array(
				'plugin' => 'pride',
				'controller' => 'campaign_order_approvals',
				'action' => 'add_purchase_approval', $campaign_id, $campaignOrderId));
			} else {
				$this->Session->setFlash(__d('croogo', 'The campaign order could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		/*
		$campaign_criteria = array(
							'conditions' => array('Campaign.organization_id' => CakeSession::read('Auth.User.Organization.id')));
		//$campaigns = $this->CampaignDesign->Campaign->find('list', $campaign_criteria);
		$campaigns = $this->CampaignOrder->Campaign->find('list', $campaign_criteria);
		*/
		$packages = $this->CampaignOrder->Package->find('list');
		$this->set(compact('campaigns', 'packages', 'campaignOrderApproval'));
	}
	
	public function purchase_selection($campaign_id = null, $job_id = null, $package_id = null) {
		
		
		// pre-empt campaign_id
		$row['campaign_id'] = $campaign_id;
		$row['job_id'] = $job_id;
		$row['package_id'] = $package_id;
		$this->CampaignOrder->create();
		$this->CampaignOrder->set($row);
		$this->CampaignOrder->set($this->request->data);
		if ($this->CampaignOrder->save()) {
			$this->Session->setFlash(__d('croogo', 'The campaign order has been saved'), 'default', array('class' => 'alert alert-success'));
			$campaignOrderId = $this->CampaignOrder->getLastInsertId();
			
			// create job tasks; job id always refer to S.P.A.D Approval Job id for the campaign
			/* $jobTask = new JobTasksController;
			$jobTask->create_job_task($job_id, $campaignOrderId); */
			
			// add provision placeholder for asset and visual pairing process
			// get package provision allocation quantity
			$package = new PackagesController;
			$options = array('conditions' => array('Package.' . $package->Package->primaryKey => $package_id));
			$myPackage = $package->Package->find('first', $options);
			
			$quantity = $myPackage['Package']['quantity'];
			
			// create provision
			$provision = new ProvisionBusesController;
			$provision->multi_create($campaign_id, $campaignOrderId, $quantity, $job_id);
			
			$this->redirect(array(
			'plugin' => 'pride',
			'controller' => 'campaign_order_approvals',
			'action' => 'add_purchase_approval', $campaign_id, $campaignOrderId));
		} else {
			$this->Session->setFlash(__d('croogo', 'The campaign order could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		
	}

	
	public function purchase_promotion($package_id = null, $reservation_id = null) {
		
		
		// pre-empt 
		$organization_id = $this->Session->read('Auth.User.organization_id');
		$row['organization_id'] = $organization_id;
		$row['reservation_id'] = $reservation_id;
		$row['package_id'] = $package_id;
		$this->CampaignOrder->create();
		$this->CampaignOrder->set($row);
		$this->CampaignOrder->set($this->request->data);
		if ($this->CampaignOrder->save()) {
			$this->Session->setFlash(__d('croogo', 'The campaign order has been saved'), 'default', array('class' => 'alert alert-success'));
			$campaignOrderId = $this->CampaignOrder->getLastInsertId();
			
			$this->redirect(array(
			'plugin' => 'pride',
			'controller' => 'reservations',
			'action' => 'view', $reservation_id, '#' => 'tab_2-1'));
		} else {
			$this->Session->setFlash(__d('croogo', 'The campaign order could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
		if (!$this->CampaignOrder->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid campaign order'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->CampaignOrder->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The campaign order has been saved'), 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The campaign order could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('CampaignOrder.' . $this->CampaignOrder->primaryKey => $id));
			$this->request->data = $this->CampaignOrder->find('first', $options);
		}
		$campaigns = $this->CampaignOrder->Campaign->find('list');
		$packages = $this->CampaignOrder->Package->find('list');
		$approvals = $this->CampaignOrder->Approval->find('list');
		$this->set(compact('campaigns', 'packages', 'approvals'));
	}

	public function update($id = null) {
		if (!$this->CampaignOrder->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid campaign order'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->CampaignOrder->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The campaign order has been saved'), 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The campaign order could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('CampaignOrder.' . $this->CampaignOrder->primaryKey => $id));
			$this->request->data = $this->CampaignOrder->find('first', $options);
		}
		$campaigns = $this->CampaignOrder->Campaign->find('list');
		$packages = $this->CampaignOrder->Package->find('list');
		$approvals = $this->CampaignOrder->Approval->find('list');
		$this->set(compact('campaigns', 'packages', 'approvals'));
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
		$this->CampaignOrder->id = $id;
		if (!$this->CampaignOrder->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid campaign order'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CampaignOrder->delete()) {
			$this->Session->setFlash(__d('croogo', 'Campaign order was deleted.'), 'default', array('class' => 'alert alert-success'));
			//$this->redirect(array('action' => 'index'));
			$this->redirect($this->referer());
		}
		$this->Session->setFlash(__d('croogo', 'Campaign order was not deleted'), 'default', array('class' => 'alert alert-danger'));
		$this->redirect(array('action' => 'index'));
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->CampaignOrder->recursive = 0;
		$this->set('campaignOrders', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->CampaignOrder->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid campaign order'));
		}
		$options = array('conditions' => array('CampaignOrder.' . $this->CampaignOrder->primaryKey => $id));
		$this->set('campaignOrder', $this->CampaignOrder->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->CampaignOrder->create();
			if ($this->CampaignOrder->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The campaign order has been saved'), 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The campaign order could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$campaigns = $this->CampaignOrder->Campaign->find('list');
		$packages = $this->CampaignOrder->Package->find('list');
		$approvals = $this->CampaignOrder->Approval->find('list');
		$this->set(compact('campaigns', 'packages', 'approvals'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->CampaignOrder->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid campaign order'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->CampaignOrder->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The campaign order has been saved'), 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The campaign order could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('CampaignOrder.' . $this->CampaignOrder->primaryKey => $id));
			$this->request->data = $this->CampaignOrder->find('first', $options);
		}
		$campaigns = $this->CampaignOrder->Campaign->find('list');
		$packages = $this->CampaignOrder->Package->find('list');
		$approvals = $this->CampaignOrder->Approval->find('list');
		$this->set(compact('campaigns', 'packages', 'approvals'));
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
		$this->CampaignOrder->id = $id;
		if (!$this->CampaignOrder->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid campaign order'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CampaignOrder->delete()) {
			$this->Session->setFlash(__d('croogo', 'Campaign order deleted'), 'default', array('class' => 'alert alert-success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Campaign order was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function getConfigurationStatus($campaign_order_id = null) {
	
		$sql = "SELECT 	(pack.quantity - count(pb.status)) as balance
				FROM 	
						provision_buses pb, 
						packages pack, 
						campaign_orders co, 
						campaigns campaign, 
						organizations organization
				WHERE 	pb.status = 1
				AND		pb.campaign_order_id = ".$campaign_order_id ."
				AND 	pb.campaign_order_id = co.id
				AND 	co.package_id = pack.id
				AND 	co.campaign_id = campaign.id
				AND 	campaign.organization_id = organization.id
				AND 	campaign.organization_id = ".$this->Session->read('Auth.User.organization_id') ."
				GROUP BY pb.campaign_order_id";
				
		$campaign_progress = $this->CampaignOrder->query($sql);
		
		$this->set(compact('campaign_progress'));
	}
	
	public function submit_order($campaign_id = null, $campaign_order_id = null) {
	
		$this->CampaignOrder->id = $campaign_order_id;
		$this->CampaignOrder->saveField('isSubmitted', true);
		//$this->CampaignOrder->hasSubmitted($campaign_order_id);
		
		$this->redirect(array('controller' => 'campaigns', 'action' => 'view', $campaign_id));
	}
	
	public function configure_package() {
	
	
	}
	
	public function confirm_campaign_orders($reservation_id = null) {
	
		$organization_id = $this->Session->read('Auth.User.organization_id');
		$conditions = array(
			'CampaignOrder.organization_id' => $organization_id, 'CampaignOrder.reservation_id' => $reservation_id
			);
		$fields = array('status' => true);
		
		if ($this->CampaignOrder->updateAll($fields, $conditions)) {
			$this->Session->setFlash(__d('croogo', 'The campaign resources has been confirmed'), 'default', array('class' => 'alert alert-success'));
			
			$this->redirect(array(
			'plugin' => 'pride',
			'controller' => 'reservation_approvals',
			'action' => 'add_reservation_approval', $organization_id, $reservation_id));
		} else {
			$this->Session->setFlash(__d('croogo', 'The campaign order could not be confirmed. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
	}
}

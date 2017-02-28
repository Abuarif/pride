<?php
App::uses('PrideAppController', 'Pride.Controller');
App::uses('CakeEmail', 'Network/Email');
App::uses('ProcessStatesController', 'Pride.Controller');
App::uses('CampaignOrderApprovalsController', 'Pride.Controller');
App::uses('CampaignOrdersController', 'Pride.Controller');
App::uses('CampaignsController', 'Pride.Controller');
App::uses('OrganizationsController', 'Pride.Controller');
App::uses('PackagesController', 'Pride.Controller');
App::uses('UsersController', 'Users.Controller');

/**
 * CampaignOrderApprovals Controller
 *
 * @property CampaignOrderApproval $CampaignOrderApproval
 * @property PaginatorComponent $Paginator
 */
class CampaignOrderApprovalsController extends PrideAppController {

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
		$this->CampaignOrderApproval->recursive = 0;
		$this->set('campaignOrderApprovals', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CampaignOrderApproval->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid campaign order approval'));
		}
		$options = array('conditions' => array('CampaignOrderApproval.' . $this->CampaignOrderApproval->primaryKey => $id));
		$this->set('campaignOrderApproval', $this->CampaignOrderApproval->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CampaignOrderApproval->create();
			if ($this->CampaignOrderApproval->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The campaign order approval has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The campaign order approval could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$campaignOrders = $this->CampaignOrderApproval->CampaignOrder->find('list');
		$users = $this->CampaignOrderApproval->User->find('list');
		$processStates = $this->CampaignOrderApproval->ProcessState->find('list');
		$approvalLevels = $this->CampaignOrderApproval->ApprovalLevel->find('list');
		$this->set(compact('campaignOrders', 'users', 'processStates', 'approvalLevels'));
	}

	public function add_purchase_approval($organization_id = null, $campaign_order_id = null) {
		$pending = 10;
		$approval_level = 4; // finance approval - new campaign order
		$role_id = 5; // finance 
		$user_role_id = 5; // Pride finance role
		
		$this->CampaignOrderApproval->create();
		$data['process_state_id'] = $pending; 
		$data['approval_level_id'] = $approval_level; 
		$data['role_id'] = $role_id; 
		$data['campaign_order_id'] = $campaign_order_id; 
		$data['name'] = 'Finance Approval required.';
		$data['comments'] = 'Please update your comment here ...';
		
		if ($this->CampaignOrderApproval->save($data)) {
			// add provision approval for Pride Administrator
			$this->add_provisioning_approval($organization_id, $campaign_order_id);
		}
	}
	
	public function add_provisioning_approval($organization_id = null, $campaign_order_id = null) {
		$pending = 10;
		$approval_level = 5; // admin approval - completed provision
		$role_id = 6; // administrator 
		$user_role_id = 6; // Pride admin role
		
		$this->CampaignOrderApproval->create();
		$data['process_state_id'] = $pending; 
		$data['approval_level_id'] = $approval_level; 
		$data['role_id'] = $role_id; 
		$data['campaign_order_id'] = $campaign_order_id; 
		$data['name'] = 'Administrator Approval required.';
		$data['comments'] = 'Please update your comment here ...';
		
		if ($this->CampaignOrderApproval->save($data)) {
			// need to send email notification to each of group members
			$this->approval_notification($campaign_order_id);
			
			// redirect to campaign page
			$this->redirect(array(
				'controller' => 'campaign_orders',
				'action' => 'index', 0
				)
			);
			
		}
	}
	
	public function approval_notification($data) {
		
		// instantiate objects
		$campaign_order_id = $data;
		$organization 		= new OrganizationsController;
		/* $campaign 			= new CampaignsController; */
		$approval 			= new CampaignOrderApprovalsController;
		$design 			= new CampaignOrdersController;
		$user 				= new UsersController;	
		$package 			= new PackagesController;	
		$process 			= new ProcessStatesController;	

		$orderOptions = array('conditions' => array('CampaignOrder.id' => $campaign_order_id));
		$myOrder = $design->CampaignOrder->find('first', $orderOptions);
		
		/* $options = array('conditions' => array('Campaign.id' => $myOrder['CampaignOrder']['campaign_id']));
		$myCampaign = $campaign->Campaign->find('first', $options); */
		
		$options = array('conditions' => array('CampaignOrderApproval.campaign_order_id' => $myOrder['CampaignOrder']['id']));
		$myApproval = $approval->CampaignOrderApproval->find('first', $options); 
		
		$options = array('conditions' => array('ProcessState.id' => $myApproval['CampaignOrderApproval']['process_state_id']));
		$myProcess = $process->ProcessState->find('first', $options);
		
		$options = array('conditions' => array('Organization.id' => $myOrder['CampaignOrder']['organization_id']));
		$myOrg = $organization->Organization->find('first', $options);
		
		$options = array('conditions' => array('Package.id' => $myOrder['CampaignOrder']['package_id']));
		$myPackage = $package->Package->find('first', $options);
		
		$options = array(
				'conditions' 	=> 	array('User.role_id' => Configure::read('AMS.role_id_pride_administrator')),
				'fields'		=>	array('email')
					); //pride administrator
		$myAdmin = $user->User->find('list', $options);
		
		$options = array(
				'conditions' 	=> 	array('User.role_id' => Configure::read('AMS.role_id_pride_finance')),
				'fields'		=>	array('email')
					); //pride finance
		$myFinance = $user->User->find('list', $options);
		
		$options = array(
				'conditions' 	=> 	array(
										'User.role_id' => Configure::read('AMS.role_id_advertiser'),
										'User.organization_id' => $myOrg['Organization']['id'], 
											),
				'fields'		=>	array('email')
					);  //advertiser
		$myUser = $user->User->find('list', $options);
		
		// update tag code in CampaignOrder if process state id = 13;
		//if ($myProcess['ProcessState']['id'] == 13) { 
		// Campaign Design Approved
			//$design->updateTagCode($campaign_design_id);
			//refetch myDesign upon tag_code update.
			//$myDesign = $design->CampaignDesign->find('first', $designOptions);
		//}
		
		// define email content
		$emailContent['email']['title'] = 'PRIDE AMS - '.$myOrg['Organization']['name'].' Purchase Package Notification';
		$emailContent['email']['activity'] 				= 'Purchase Package';
		$emailContent['email']['advertiser'] 			= $myOrg['Organization']['name'];
		//$emailContent['email']['campaignName'] 			= $myCampaign['Campaign']['name'];
		$emailContent['email']['campaignOrderId'] 		= $myOrder['CampaignOrder']['id'];
		$emailContent['email']['packageName']			= $myPackage['Package']['name'];
		$emailContent['email']['approvalStatus'] 		= $myProcess['ProcessState']['name'];
		$emailContent['email']['comments'] 				= $myApproval['CampaignOrderApproval']['comments'];
		$emailContent['email']['submissionDate'] 		= $myApproval['CampaignOrderApproval']['updated'];
		
		$template = 'Pride.campaignOrderRequestApproval';
		$label = 'CampaignDesign Approval Status Updates';
		$coreUserEmail[0] = 'suhaimi.albakri@gmail.com';
		$coreUserEmail[1] = 'suhaimi.maidin@prasarana.com.my';
		$coreUserEmail[2] = 'nizar.azik@prasarana.com.my';
		$coreUserEmail[3] = $this->Session->read('Auth.User.email');
		
		//die;
		//append all email receipients into 1 array
		$toEmail = array_merge ($coreUserEmail, $myAdmin);
		$toEmail = array_merge ($toEmail, $myUser);
		$toEmail = array_merge ($toEmail, $myFinance);
		
		// send notification email to Pride administrator group
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
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->CampaignOrderApproval->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid campaign order approval'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->CampaignOrderApproval->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The campaign order approval has been saved'), 'default', array('class' => 'success'));
				
				// Update campaign_order upon approval
				if ($this->request->data['CampaignOrderApproval']['process_state_id'] == 16) { //payment approved
					$order = new CampaignOrdersController;
					$data['CampaignOrder']['id'] = $this->request->data['CampaignOrderApproval']['campaign_order_id'];
					$data['CampaignOrder']['status'] = true;
					$order->CampaignOrder->save($data);
				}
				$this->redirect(array(
                                                                    'controller' => 'campaign_orders',
                                                                     'action' => 'index',0));
			} else {
				$this->Session->setFlash(__d('croogo', 'The campaign order approval could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('CampaignOrderApproval.' . $this->CampaignOrderApproval->primaryKey => $id));
			$this->request->data = $this->CampaignOrderApproval->find('first', $options);
		}
		//$campaignOrders = $this->CampaignOrderApproval->CampaignOrder->find('list');
		//$users = $this->CampaignOrderApproval->User->find('list');
		$filter = array('conditions' => array('ProcessState.role_id' => $this->Session->read('Auth.User.Role.id'), 'ProcessState.object' => 'CampaignOrder')); 
		$processStates = $this->CampaignOrderApproval->ProcessState->find('list', $filter);
               //$processStates = $this->CampaignOrderApproval->ProcessState->find('list');
		//$approvalLevels = $this->CampaignOrderApproval->ApprovalLevel->find('list');
		$this->set(compact( 'processStates'));
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
		$this->CampaignOrderApproval->id = $id;
		if (!$this->CampaignOrderApproval->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid campaign order approval'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CampaignOrderApproval->delete()) {
			$this->Session->setFlash(__d('croogo', 'Campaign order approval deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Campaign order approval was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->CampaignOrderApproval->recursive = 0;
		$this->set('campaignOrderApprovals', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->CampaignOrderApproval->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid campaign order approval'));
		}
		$options = array('conditions' => array('CampaignOrderApproval.' . $this->CampaignOrderApproval->primaryKey => $id));
		$this->set('campaignOrderApproval', $this->CampaignOrderApproval->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->CampaignOrderApproval->create();
			if ($this->CampaignOrderApproval->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The campaign order approval has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The campaign order approval could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$campaignOrders = $this->CampaignOrderApproval->CampaignOrder->find('list');
		$users = $this->CampaignOrderApproval->User->find('list');
		$processStates = $this->CampaignOrderApproval->ProcessState->find('list');
		$approvalLevels = $this->CampaignOrderApproval->ApprovalLevel->find('list');
		$this->set(compact('campaignOrders', 'users', 'processStates', 'approvalLevels'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->CampaignOrderApproval->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid campaign order approval'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->CampaignOrderApproval->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The campaign order approval has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The campaign order approval could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('CampaignOrderApproval.' . $this->CampaignOrderApproval->primaryKey => $id));
			$this->request->data = $this->CampaignOrderApproval->find('first', $options);
		}
		$campaignOrders = $this->CampaignOrderApproval->CampaignOrder->find('list');
		$users = $this->CampaignOrderApproval->User->find('list');
		$processStates = $this->CampaignOrderApproval->ProcessState->find('list');
		$approvalLevels = $this->CampaignOrderApproval->ApprovalLevel->find('list');
		$this->set(compact('campaignOrders', 'users', 'processStates', 'approvalLevels'));
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
		$this->CampaignOrderApproval->id = $id;
		if (!$this->CampaignOrderApproval->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid campaign order approval'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CampaignOrderApproval->delete()) {
			$this->Session->setFlash(__d('croogo', 'Campaign order approval deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Campaign order approval was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
}

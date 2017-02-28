<?php
App::uses('CakeEmail', 'Network/Email');
App::uses('PrideAppController', 'Pride.Controller');
App::uses('ProcessStatesController', 'Pride.Controller');
App::uses('CampaignDesignApprovalsController', 'Pride.Controller');
App::uses('CampaignDesignsController', 'Pride.Controller');
App::uses('CampaignsController', 'Pride.Controller');
App::uses('OrganizationsController', 'Pride.Controller');
App::uses('UsersController', 'Users.Controller');
/**
 * CampaignDesignApprovals Controller
 *
 * @property CampaignDesignApproval $CampaignDesignApproval
 * @property PaginatorComponent $Paginator
 
 // Instantiation // mention within cron function
$Products = new ProductsController;
// Call a method from
$Products->ControllerFunction();


 */
class CampaignDesignApprovalsController extends PrideAppController {

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
		$this->CampaignDesignApproval->recursive = 0;
		$this->set('campaignDesignApprovals', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CampaignDesignApproval->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid campaign design approval'));
		}
		$options = array('conditions' => array('CampaignDesignApproval.' . $this->CampaignDesignApproval->primaryKey => $id));
		$this->set('campaignDesignApproval', $this->CampaignDesignApproval->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CampaignDesignApproval->create();
			if ($this->CampaignDesignApproval->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The campaign design approval has been saved'), 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The campaign design approval could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$campaignDesigns = $this->CampaignDesignApproval->CampaignDesign->find('list');
		$users = $this->CampaignDesignApproval->User->find('list');
		$processStates = $this->CampaignDesignApproval->ProcessState->find('list');
		$approvalLevels = $this->CampaignDesignApproval->ApprovalLevel->find('list');
		$this->set(compact('campaignDesigns', 'users', 'processStates', 'approvalLevels'));
	}

	public function visual_approval($campaign_design_id = null) {
		$pending = 12; // Campaign Design Pending Approval 
		$approval_level_id = 1 ;// New Submission
		$this->CampaignDesignApproval->create();	
		$data['process_state_id'] = $pending; 
		$data['approval_level_id'] = $approval_level_id; 
		$data['campaign_design_id'] = $campaign_design_id; 
		$data['name'] = 'Administrator Approval required.';
		$data['comments'] = 'Please add your comment here ...';
		
		if ($this->CampaignDesignApproval->save($data)) {
		
			$organization = new OrganizationsController;
			$campaign 	= new CampaignsController;
			$approval 	= new CampaignDesignApprovalsController;
			$design 	= new CampaignDesignsController;
			$user 		= new UsersController;	
			
			$options = array('conditions' => array('CampaignDesign.id' => $campaign_design_id));
			$myDesign = $design->CampaignDesign->find('first', $options);
			
			$options = array('conditions' => array('Campaign.id' => $myDesign['CampaignDesign']['campaign_id']));
			$myCampaign = $campaign->Campaign->find('first', $options);
			
			$options = array('conditions' => array('CampaignDesignApproval.campaign_design_id' => $myDesign['CampaignDesign']['id']));
			$myApproval = $approval->CampaignDesignApproval->find('first', $options);
			
			$options = array('conditions' => array('Organization.id' => $myCampaign['Campaign']['organization_id']));
			$myOrg = $organization->Organization->find('first', $options);
			
			$options = array(
						'conditions' 	=> 	array('User.role_id' => 6),
						'fields'		=>	array('email')
							); //pride administrator
			$myUser = $user->User->find('list', $options);
			
			// define email content
			$emailContent['email']['title'] = 'PRIDE AMS - Approval Required: New CampaignDesign Submission';
			$emailContent['email']['activity'] = 'New Campaign Design Submission';
			$emailContent['email']['advertiser'] = $myOrg['Organization']['name'];
			$emailContent['email']['campaignName'] = $myCampaign['Campaign']['name'];
			$emailContent['email']['campaignDesignName'] = $myDesign['CampaignDesign']['name'];
			$emailContent['email']['campaignDesignId'] = $myDesign['CampaignDesign']['id'];
			$emailContent['email']['submissionDate'] = $myDesign['CampaignDesign']['created'];
			
			$template = 'Pride.campaignDesignRequestApproval';
			$label = 'CampaignDesign Request Approval';
			$coreUserEmail[0] = 'suhaimi.albakri@gmail.com';
			$coreUserEmail[1] = 'suhaimi.maidin@prasarana.com.my';
			$coreUserEmail[2] = 'nizar.azik@prasarana.com.my';
			
			//append all email receipients into 1 array
			$toEmail = array_merge ($coreUserEmail, $myUser);
			
			// Get all user emails from Role = 6 // pride administrator
			
			// update tag code in CampaignDesign if process state id = 13;
			//if ($myApproval['CampaignDesignApproval']['process_state_id'] == 13) { 
			// Campaign Design Approved
				//$design->updateTagCode($campaign_design_id);
			//}
			// send notification email to Pride administrator group
			$this->_sendEmail(
					array(Configure::read('Site.title'), 
					$this->_getSenderEmail()),
					$toEmail,
					$emailContent['email']['title'],
					$template,
					$label,
					$this->theme,
					array('user' => $emailContent)
			);
			// redirect to management page
			/* $this->redirect(array(
				'plugin' => 'pride',
				'controller' => 'campaign_designs',
				'action' => 'index', $campaign_design_id)); */
				
				$this->redirect(array(
				'plugin' => 'pride',
				'controller' => 'campaigns',
				'action' => 'view', $myCampaign['Campaign']['id']));
			
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
		if (!$this->CampaignDesignApproval->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid campaign design approval'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
		
			$campaign_design_id = $this->request->data['CampaignDesignApproval']['campaign_design_id'];
		
			if ($this->CampaignDesignApproval->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The campaign design approval has been saved'), 'default', array('class' => 'alert alert-success'));
				
				// send notification
				$this->approval_notification($campaign_design_id);
				
			} else {
				$this->Session->setFlash(__d('croogo', 'The campaign design approval could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('CampaignDesignApproval.' . $this->CampaignDesignApproval->primaryKey => $id));
			$this->request->data = $this->CampaignDesignApproval->find('first', $options);
		}
		$campaignDesigns = $this->CampaignDesignApproval->CampaignDesign->find('list');
		$users = $this->CampaignDesignApproval->User->find('list');
		$filter = array('conditions' => array('ProcessState.role_id' => 6, 'ProcessState.object' => 'CampaignDesign')); //pride_administrator
		$processStates = $this->CampaignDesignApproval->ProcessState->find('list', $filter);
		$approvalLevels = $this->CampaignDesignApproval->ApprovalLevel->find('list');
		$this->set(compact('campaignDesigns', 'users', 'processStates', 'approvalLevels'));
	}

	public function approval_notification($data) {
		
		// instantiate objects
		$campaign_design_id = $data;
		$organization 		= new OrganizationsController;
		$campaign 			= new CampaignsController;
		$approval 			= new CampaignDesignApprovalsController;
		$design 			= new CampaignDesignsController;
		$user 				= new UsersController;	
		$process 			= new ProcessStatesController;	

		$designOptions = array('conditions' => array('CampaignDesign.id' => $campaign_design_id));
		$myDesign = $design->CampaignDesign->find('first', $designOptions);
		
		$options = array('conditions' => array('Campaign.id' => $myDesign['CampaignDesign']['campaign_id']));
		$myCampaign = $campaign->Campaign->find('first', $options);
		
		$options = array('conditions' => array('CampaignDesignApproval.campaign_design_id' => $myDesign['CampaignDesign']['id']));
		$myApproval = $approval->CampaignDesignApproval->find('first', $options); 
		
		$options = array('conditions' => array('ProcessState.id' => $myApproval['CampaignDesignApproval']['process_state_id']));
		$myProcess = $process->ProcessState->find('first', $options);
		
		$options = array('conditions' => array('Organization.id' => $myCampaign['Campaign']['organization_id']));
		$myOrg = $organization->Organization->find('first', $options);
		
		$options = array(
				'conditions' 	=> 	array('User.role_id' => 6),
				'fields'		=>	array('email')
					); //pride administrator
		$myAdmin = $user->User->find('list', $options);
		
		$options = array(
				'conditions' 	=> 	array(
										'User.role_id' => 4, //advertiser
										'User.organization_id' => $myOrg['Organization']['id'], //advertiser
											),
				'fields'		=>	array('email')
					); //pride administrator
		$myUser = $user->User->find('list', $options);
		
		// update tag code in CampaignDesign if process state id = 13;
		if ($myProcess['ProcessState']['id'] == 13) { 
		// Campaign Design Approved
			$design->updateTagCode($campaign_design_id);
			//refetch myDesign upon tag_code update.
			$myDesign = $design->CampaignDesign->find('first', $designOptions);
		}
		
		//refetch myDesign upon tag_code update.
		// define email content
		$emailContent['email']['title'] = 'PRIDE AMS - '.$myOrg['Organization']['name'].' CampaignDesign Approval Status Update';
		$emailContent['email']['activity'] 				= 'Campaign Design Approval Status Update';
		$emailContent['email']['advertiser'] 			= $myOrg['Organization']['name'];
		$emailContent['email']['campaignName'] 			= $myCampaign['Campaign']['name'];
		$emailContent['email']['campaignDesignName']	= $myDesign['CampaignDesign']['name'];
		$emailContent['email']['approvalStatus'] 		= $myProcess['ProcessState']['name'];
		$emailContent['email']['approvalTagCode'] 		= $myDesign['CampaignDesign']['tag_code'];
		$emailContent['email']['comments'] 				= $myApproval['CampaignDesignApproval']['comments'];
		$emailContent['email']['submissionDate'] 		= $myApproval['CampaignDesignApproval']['updated'];
		
		$template = 'Pride.campaignDesignApprovalStatusUpdate';
		$label = 'CampaignDesign Approval Status Upda';
		$coreUserEmail[0] = 'suhaimi.albakri@gmail.com';
		$coreUserEmail[1] = 'suhaimi.maidin@prasarana.com.my';
		$coreUserEmail[2] = 'nizar.azik@prasarana.com.my';
		$coreUserEmail[3] = $this->Session->read('Auth.User.email');
		
		//append all email receipients into 1 array
		$toEmail = array_merge ($coreUserEmail, $myAdmin);
		$toEmail = array_merge ($toEmail, $myUser);
		
		//debug
		
		//print_r($emailContent); echo '<br/>';
		//print_r($myDesign);echo '<br/>';
		//print_r($myCampaign);echo '<br/>';
		//print_r($myApproval);echo '<br/>';
		//print_r($myOrg);echo '<br/>';
		//print_r($myUser);echo '<br/>';
		
		//die;
		
		// send notification email to Pride administrator group
		$this->_sendEmail(
				array(Configure::read('Site.title'), 
				$this->_getSenderEmail()),
				$toEmail,
				$emailContent['email']['title'],
				$template,
				$label,
				$this->theme,
				array('user' => $emailContent)
		);
		// redirect to management page
		$this->redirect(array('controller' => 'campaign_designs', 'action' => 'index'));
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
		$this->CampaignDesignApproval->id = $id;
		if (!$this->CampaignDesignApproval->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid campaign design approval'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CampaignDesignApproval->delete()) {
			$this->Session->setFlash(__d('croogo', 'Campaign design approval deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Campaign design approval was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->CampaignDesignApproval->recursive = 0;
		$this->set('campaignDesignApprovals', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->CampaignDesignApproval->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid campaign design approval'));
		}
		$options = array('conditions' => array('CampaignDesignApproval.' . $this->CampaignDesignApproval->primaryKey => $id));
		$this->set('campaignDesignApproval', $this->CampaignDesignApproval->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->CampaignDesignApproval->create();
			if ($this->CampaignDesignApproval->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The campaign design approval has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The campaign design approval could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$campaignDesigns = $this->CampaignDesignApproval->CampaignDesign->find('list');
		$users = $this->CampaignDesignApproval->User->find('list');
		$processStates = $this->CampaignDesignApproval->ProcessState->find('list');
		$approvalLevels = $this->CampaignDesignApproval->ApprovalLevel->find('list');
		$this->set(compact('campaignDesigns', 'users', 'processStates', 'approvalLevels'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->CampaignDesignApproval->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid campaign design approval'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->CampaignDesignApproval->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The campaign design approval has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The campaign design approval could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('CampaignDesignApproval.' . $this->CampaignDesignApproval->primaryKey => $id));
			$this->request->data = $this->CampaignDesignApproval->find('first', $options);
		}
		$campaignDesigns = $this->CampaignDesignApproval->CampaignDesign->find('list');
		$users = $this->CampaignDesignApproval->User->find('list');
		$processStates = $this->CampaignDesignApproval->ProcessState->find('list');
		$approvalLevels = $this->CampaignDesignApproval->ApprovalLevel->find('list');
		$this->set(compact('campaignDesigns', 'users', 'processStates', 'approvalLevels'));
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
		$this->CampaignDesignApproval->id = $id;
		if (!$this->CampaignDesignApproval->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid campaign design approval'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CampaignDesignApproval->delete()) {
			$this->Session->setFlash(__d('croogo', 'Campaign design approval deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Campaign design approval was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
	
	protected function _getSenderEmail() {
		return 'admin@' . preg_replace('#^www\.#', '', strtolower($_SERVER['SERVER_NAME']));
	}
	
	/**
 * Convenience method to send email
 *
 * @param string $from Sender email
 * @param string $to Receiver email
 * @param string $subject Subject
 * @param string $template Template to use
 * @param string $theme Theme to use
 * @param array  $viewVars Vars to use inside template
 * @param string $emailType user activation, reset password, used in log message when failing.
 * @return boolean True if email was sent, False otherwise.
 */
	protected function _sendEmail($from, $users, $subject, $template, $emailType, $theme = null, $viewVars = null) {
		if (is_null($theme)) {
			$theme = $this->theme;
		}
		$success = false;

		try {
			$email = new CakeEmail();
			$email->emailFormat('html');
			$email->from($from[1], $from[0]);
			//$email->to($to);
			foreach($users as $user) {
				$email->addTo($user);
			}		
			$email->subject($subject);
			$email->template($template);
			$email->viewVars($viewVars);
			$email->theme($theme);
			$success = $email->send();
		} catch (SocketException $e) {
			$this->log(sprintf('Error sending %s notification : %s', $emailType, $e->getMessage()));
		}

		return $success;
	}
}

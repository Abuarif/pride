<?php
App::uses('PrideAppController', 'Pride.Controller');
App::uses('ReferenceCodesController', 'Pride.Controller');
App::uses('ProcessStatesController', 'Pride.Controller');
App::uses('CampaignDesignApprovalsController', 'Pride.Controller');
App::uses('CampaignsController', 'Pride.Controller');
App::uses('OrganizationsController', 'Pride.Controller');
App::uses('UsersController', 'Users.Controller');
/**
 * CampaignDesigns Controller
 *
 * @property CampaignDesign $CampaignDesign
 * @property PaginatorComponent $Paginator
 */
class CampaignDesignsController extends PrideAppController {

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

		$this->Session->write('NavBar.id', '100');
	
		$this->CampaignDesign->recursive = 0;
		
		$filter = array();
		
		if (!empty($this->request->data['CampaignDesign']['name'])) {
			
			$filter = array(
							'OR' => array(
								'CampaignDesign.name LIKE' => '%'.$this->request->data['CampaignDesign']['name'].'%', 
								'Campaign.name LIKE' => '%'.$this->request->data['CampaignDesign']['name'].'%'
								)
							);
		}
		
		$approvedEntry = array(
			'limit' => 3,
			'conditions' => array("CampaignDesign.tag_code != ''", $filter),
			'order' => array(
				'CampaignDesign.created' => 'desc'
			)
		);

		$newEntry = array(
			'limit' => 3,
			'conditions' => array("CampaignDesign.tag_code = ''", $filter),
			'order' => array(
				'CampaignDesign.created' => 'desc'
			)
		);
		
		if(!empty($option) && $option == 1) {
			$this->Paginator->settings = $approvedEntry;
		} else {
			$this->Paginator->settings = $newEntry;
		}
		
		// Only role = advertiser will be filtered
		if ( CakeSession::read('Auth.User.Role.id') == 4) {
			$criteria['Campaign.organization_id'] = CakeSession::read('Auth.User.Organization.id');
			$campaigndesign = $this->paginate($criteria);
		} else {
			$campaigndesign = $this->paginate();
		}
		
		$this->set('campaignDesigns', $campaigndesign);
		//$this->active_view();
	}
	
	public function get_visual($id = null) {
	
		$criteria['conditions'] = array('CampaignDesign.' . $this->CampaignDesign->primaryKey => $id);
		
		$campaignDesign = $this->CampaignDesign->find('first', $criteria);
		
		$this->set(compact('campaignDesign'));
		
		return $campaignDesign;
	
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CampaignDesign->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid campaign design'));
		}
		$options = array('conditions' => array('CampaignDesign.' . $this->CampaignDesign->primaryKey => $id));
		$this->set('campaignDesign', $this->CampaignDesign->find('first', $options));
		
		$this->active_view();
	}
	
	public function approval_preview($id = null) {
		if (!$this->CampaignDesign->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid campaign design'));
		}
		$options = array('conditions' => array('CampaignDesign.' . $this->CampaignDesign->primaryKey => $id));
		$this->set('campaignDesign', $this->CampaignDesign->find('first', $options));
		
		$this->active_view();
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CampaignDesign->create();
			if ($this->CampaignDesign->save($this->request->data)) {
			//saveAll($this->request->data, array('atomic' => false, 'deep' => true))) {
			
				$this->Session->setFlash(__d('croogo', 'The campaign design has been saved'), 'default', array('class' => 'alert alert-success'));
				// redirect to add campaign design approval using the latest campaign design id.
				$this->redirect(array(
				'plugin' => 'pride',
				'controller' => 'campaign_design_approvals',
				'action' => 'visual_approval', $this->CampaignDesign->getLastInsertId()));
				
				//$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The campaign design could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$campaign_criteria = array(
							'conditions' => array('Campaign.organization_id' => CakeSession::read('Auth.User.Organization.id')));
		$campaigns = $this->CampaignDesign->Campaign->find('list', $campaign_criteria);
		//$campaigns = $this->CampaignDesign->Campaign->find('list');
		$this->set(compact('campaigns'));
		$this->active_view();
	}
	
	public function add_visual($campaign_id = null) {
		if ($this->request->is('post')) {
			$this->CampaignDesign->create();
			$this->request->data['CampaignDesign']['campaign_id'] = $campaign_id;
			if ($this->CampaignDesign->save($this->request->data)) {
			//saveAll($this->request->data, array('atomic' => false, 'deep' => true))) {
			
				$this->Session->setFlash(__d('croogo', 'The campaign design has been saved'), 'default', array('class' => 'alert alert-success'));
				// redirect to add campaign design approval using the latest campaign design id.
				$this->redirect(array(
				'plugin' => 'pride',
				'controller' => 'campaign_design_approvals',
				'action' => 'visual_approval', $this->CampaignDesign->getLastInsertId()));
				
				//$this->redirect($this->referer());
			} else {
				$this->Session->setFlash(__d('croogo', 'The campaign design could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$campaign_criteria = array(
							'conditions' => array('Campaign.organization_id' => CakeSession::read('Auth.User.Organization.id')));
		$campaigns = $this->CampaignDesign->Campaign->find('list', $campaign_criteria);
		//$campaigns = $this->CampaignDesign->Campaign->find('list');
		$this->set(compact('campaigns'));
		$this->active_view();
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->CampaignDesign->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid campaign design'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->CampaignDesign->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The campaign design has been updated.'), 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The campaign design could not be updated. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('CampaignDesign.' . $this->CampaignDesign->primaryKey => $id));
			$this->request->data = $this->CampaignDesign->find('first', $options);
		}
		if ( CakeSession::read('Auth.User.Role.id') == 4 ) {
			$criteria['Campaign.organization_id'] = CakeSession::read('Auth.User.Organization.id');
			$campaigns = $this->CampaignDesign->Campaign->find('list',$criteria);
		} else {
			$campaigns = $this->CampaignDesign->Campaign->find('list');
		}
		
		$this->set(compact('campaigns'));
		$this->active_view();
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

		$options = array('conditions' => array('CampaignDesign.id' => $campaign_design_id));
		$myDesign = $design->CampaignDesign->find('first', $options);
		
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
		$myUser = $user->User->find('list', $options);
		
		// update tag code in CampaignDesign if process state id = 13;
		if ($myProcess['ProcessState']['id'] == 13) { 
		// Campaign Design Approved
			$design->updateTagCode($campaign_design_id);
		}
		
		// define email content
		$emailContent['email']['title'] = 'PRIDE AMS - '.$myOrg['Organization']['name'].' CampaignDesign Approval Status Update';
		$emailContent['email']['activity'] 				= 'Campaign Design Approval Status Update';
		$emailContent['email']['advertiser'] 			= $myOrg['Organization']['name'];
		$emailContent['email']['campaignName'] 			= $myCampaign['Campaign']['name'];
		$emailContent['email']['campaignDesignName']	= $myDesign['CampaignDesign']['name'];
		$emailContent['email']['approvalStatus'] 		= $myProcess['ProcessState']['name'];
		$emailContent['email']['comments'] 				= $myApproval['CampaignDesignApproval']['comments'];
		$emailContent['email']['submissionDate'] 		= $myApproval['CampaignDesignApproval']['updated'];
		
		$template = 'Pride.campaignDesignApprovalStatusUpdate';
		$label = 'CampaignDesign Approval Status Upda';
		$coreUserEmail[0] = 'suhaimi.albakri@gmail.com';
		$coreUserEmail[1] = 'suhaimi.maidin@prasarana.com.my';
		$coreUserEmail[2] = 'nizar.azik@prasarana.com.my';
		$coreUserEmail[3] = $this->Session->read('Auth.User.email');
		
		//append all email receipients into 1 array
		$toEmail = array_merge ($coreUserEmail, $myUser);
		
		//debug
		
		print_r($emailContent); echo '<br/>';
		print_r($myDesign);echo '<br/>';
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
		$this->redirect(array('action' => 'index'));
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
		$this->CampaignDesign->id = $id;
		if (!$this->CampaignDesign->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid campaign design'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CampaignDesign->delete()) {
			$this->Session->setFlash(__d('croogo', 'Campaign design deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Campaign design was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->CampaignDesign->recursive = 0;
		$this->set('campaignDesigns', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->CampaignDesign->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid campaign design'));
		}
		$options = array('conditions' => array('CampaignDesign.' . $this->CampaignDesign->primaryKey => $id));
		$this->set('campaignDesign', $this->CampaignDesign->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->CampaignDesign->create();
			if ($this->CampaignDesign->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The campaign design has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The campaign design could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$campaigns = $this->CampaignDesign->Campaign->find('list');
		$this->set(compact('campaigns'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->CampaignDesign->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid campaign design'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->CampaignDesign->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The campaign design has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The campaign design could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('CampaignDesign.' . $this->CampaignDesign->primaryKey => $id));
			$this->request->data = $this->CampaignDesign->find('first', $options);
		}
		$campaigns = $this->CampaignDesign->Campaign->find('list');
		$this->set(compact('campaigns'));
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
		$this->CampaignDesign->id = $id;
		if (!$this->CampaignDesign->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid campaign design'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CampaignDesign->delete()) {
			$this->Session->setFlash(__d('croogo', 'Campaign design deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Campaign design was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function updateTagCode($campaign_design_id = null) {
		
		//generate tagCode
		//format: ID/VA/COMPANY/CODE/MTH-YEAR
		$organization_name = 'RKL';
		
		$reference = new ReferenceCodesController;
		$code = $reference->getReferenceCode($campaign_design_id); // paddding 0001
		$mon_year = date('n').'-'.date('Y'); //date format 1-2014, 12-2014
		$tagCode = 'ID/VA/'.$organization_name.'/'.$code.'/'.$mon_year;
		$this->log('CampaignDesign: updateTagCode'.$tagCode );
		// update campaigndesign table
		$this->CampaignDesign->create();
		$data['id'] = $campaign_design_id; 
		$data['tag_code'] = $tagCode;
		$this->CampaignDesign->set($data);
		$this->CampaignDesign->save();
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
	
	public function get_provision_visual($id = null) {
	
		//$options['fields'] = array('count(provision_buses.status) as total');
		$options['conditions'] = array(
									'CampaignDesign.id' => 'provision_buses.campaign_design_id',
								);
		$options['joins'] = array(
								array('table' => 'provision_buses',
									'type' => 'INNER',
									'conditions' => array(
										'provision_buses.campaign_order_detail_id' => $id, 'provision_buses.status' => 1,
									)
								) ,
								array('table' => 'campaign_order_details',
									'type' => 'INNER',
									'conditions' => array(
										'campaign_order_details.id' => $id,
									)
								) 
							);

		$campaign_visuals = $this->CampaignDesign->find('all', $options);
		
		return $campaign_visuals;
	}
}

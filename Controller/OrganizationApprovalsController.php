<?php
App::uses('PrideAppController', 'Pride.Controller');
App::uses('OrganizationsController', 'Pride.Controller');
App::uses('OrganizationApprovalsController', 'Pride.Controller');
App::uses('UsersController', 'Users.Controller');
App::uses('ProcessStatesController', 'Pride.Controller');

/**
 * OrganizationApprovals Controller
 *
 * @property OrganizationApproval $OrganizationApproval
 * @property PaginatorComponent $Paginator
 */
class OrganizationApprovalsController extends PrideAppController {

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
		$this->OrganizationApproval->recursive = 0;
		$this->set('organizationApprovals', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->OrganizationApproval->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid organization approval'));
		}
		$options = array('conditions' => array('OrganizationApproval.' . $this->OrganizationApproval->primaryKey => $id));
		$this->set('organizationApproval', $this->OrganizationApproval->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->OrganizationApproval->create();
			if ($this->OrganizationApproval->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The organization approval has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The organization approval could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$organizations = $this->OrganizationApproval->Organization->find('list');
		$users = $this->OrganizationApproval->User->find('list');
		$processStates = $this->OrganizationApproval->ProcessState->find('list');
		$approvalLevels = $this->OrganizationApproval->ApprovalLevel->find('list');
		$this->set(compact('organizations', 'users', 'processStates', 'approvalLevels'));
	}
	
	public function registration_approval($organization_id = null) {
		
		$pending = 20; // Administrator verification required 
		$approval_level_id = 1 ;// Pride Administrator 
		$role_id = 6 ;// Pride Administrator 
		$this->OrganizationApproval->create();
		$data['process_state_id'] = $pending; 
		$data['approval_level_id'] = $approval_level_id; 
		$data['role_id'] = $role_id; 
		$data['organization_id'] = $organization_id; 
		$data['name'] = 'Administrator Verification required.';
		$data['comments'] = 'Please add your comment here ...';
		//debug
		/* print_r($data);
		die; */
		if ($this->OrganizationApproval->save($data)) {
			$this->finance_approval($organization_id);
		}
	}

	public function finance_approval($organization_id = null) {
		
		$pending = 3; // Campaign Design Pending Approval 
		$approval_level_id = 1 ;// Pride finance 
		$role_id = 5 ;// Pride Administrator 
		$this->OrganizationApproval->create();
		$data['process_state_id'] = $pending; 
		$data['approval_level_id'] = $approval_level_id; 
		$data['role_id'] = $role_id; 
		$data['organization_id'] = $organization_id; 
		$data['name'] = 'Finance Approval required.';
		$data['comments'] = 'Please add your comment here ...';
		
		if ($this->OrganizationApproval->save($data)) {
			$this->approval_notification($organization_id);
			$this->redirect('/page/thank-you');
		}
	}
	
	public function resubmit_notification($organization_id = null) {
		
		// send notification email to finance and admin
		$organization 		= new OrganizationsController;
		/* $approval 	 		= new OrganizationApprovalsController; */
		$user 				= new UsersController;	
		/* $process 			= new ProcessStatesController; */	

		/* $options = array('conditions' => array(
			'OrganizationApproval.organization_id' => $organization_id,
			 'OrganizationApproval.role_id' => $this->Session->read('Auth.User.Role.id') 
												));
		$myApproval = $approval->OrganizationApproval->find('first', $options);  */
		
		//print_r($myApproval);
		//echo "my value: ".$myApproval['OrganizationApproval']['process_state_id'];
		
		/* $options = array('conditions' => array(
			'ProcessState.id' => $myApproval['OrganizationApproval']['process_state_id']));
			
		$myProcess = $process->ProcessState->find('first', $options); */
		
		$options = array('conditions' => array(
			'Organization.id' => $organization_id));
			
		$myOrg = $organization->Organization->find('first', $options);
		
		$options = array(
				'conditions' 	=> 	array('User.role_id' => 6),
				'fields'		=>	array('email')
					); //pride finance
		$myAdmin = $user->User->find('list', $options);
		
		$options = array(
				'conditions' 	=> 	array('User.role_id' => 5),
				'fields'		=>	array('email')
					); //pride finance
		$myFinance = $user->User->find('list', $options);
		
		$options = array(
				'conditions' 	=> 	array(
										'User.role_id' => 4, //advertiser
										'User.organization_id' => $organization_id, //advertiser
											),
				'fields'		=>	array('email')
					); //pride administrator
		$myUser = $user->User->find('list', $options);
		
		// define email content
		$emailContent['email']['title'] = 'PRIDE AMS - Application Resubmission from '.$myOrg['Organization']['name'];
		$emailContent['email']['activity'] 				= 'Application Resubmission';
		$emailContent['email']['advertiser'] 			= $myOrg['Organization']['name'];
		$emailContent['email']['approvalStatus'] 		= 'Application Review';
		$emailContent['email']['comments'] 				= 'Please revisit the application entry.';
		$emailContent['email']['submissionDate'] 		= $myOrg['Organization']['updated'];
		
		$template = 'Pride.new_advertiser_registration';
		$label = 'New Advertiser registration';
		$coreUserEmail[0] = 'suhaimi.albakri@gmail.com';
		//$coreUserEmail[1] = 'suhaimi.maidin@prasarana.com.my';
		$coreUserEmail[2] = 'nizar.azik@prasarana.com.my';
		
		//append all email receipients into 1 array
		$toEmail = array_merge ($coreUserEmail, $myAdmin);
		$toEmail = array_merge ($toEmail, $myFinance);
		
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
		
		$this->redirect('/members');
	}
	
	public function approval_notification($organization_id = null) {
		
		// send notification email to finance and admin
		$organization 		= new OrganizationsController;
		$approval 	 		= new OrganizationApprovalsController;
		$user 				= new UsersController;	
		$process 			= new ProcessStatesController;	

		$options = array('conditions' => array(
			'OrganizationApproval.organization_id' => $organization_id,
			/* 'OrganizationApproval.role_id' => $this->Session->read('Auth.User.Role.id') */
												));
		$myApproval = $approval->OrganizationApproval->find('first', $options); 
		
		//print_r($myApproval);
		//echo "my value: ".$myApproval['OrganizationApproval']['process_state_id'];
		
		$options = array('conditions' => array(
			'ProcessState.id' => $myApproval['OrganizationApproval']['process_state_id']));
			
		$myProcess = $process->ProcessState->find('first', $options);
		
		$options = array('conditions' => array(
			'Organization.id' => $organization_id));
			
		$myOrg = $organization->Organization->find('first', $options);
		
		$options = array(
				'conditions' 	=> 	array('User.role_id' => 6),
				'fields'		=>	array('email')
					); //pride finance
		$myAdmin = $user->User->find('list', $options);
		
		$options = array(
				'conditions' 	=> 	array('User.role_id' => 5),
				'fields'		=>	array('email')
					); //pride finance
		$myFinance = $user->User->find('list', $options);
		
		$options = array(
				'conditions' 	=> 	array(
										'User.role_id' => 4, //advertiser
										'User.organization_id' => $organization_id, //advertiser
											),
				'fields'		=>	array('email')
					); //pride administrator
		$myUser = $user->User->find('list', $options);
		
		// define email content
		$emailContent['email']['title'] = 'PRIDE AMS - New Advertiser Registration from '.$myOrg['Organization']['name'];
		$emailContent['email']['activity'] 				= 'New Advertiser Registration';
		$emailContent['email']['advertiser'] 			= $myOrg['Organization']['name'];
		$emailContent['email']['approvalStatus'] 		= $myProcess['ProcessState']['name'];
		$emailContent['email']['comments'] 				= $myApproval['OrganizationApproval']['comments'];
		$emailContent['email']['submissionDate'] 		= $myApproval['OrganizationApproval']['updated'];
		
		$template = 'Pride.new_advertiser_registration';
		$label = 'New Advertiser registration';
		$coreUserEmail[0] = 'suhaimi.albakri@gmail.com';
		//$coreUserEmail[1] = 'suhaimi.maidin@prasarana.com.my';
		$coreUserEmail[2] = 'nizar.azik@prasarana.com.my';
		
		//append all email receipients into 1 array
		$toEmail = array_merge ($coreUserEmail, $myAdmin);
		$toEmail = array_merge ($toEmail, $myFinance);
		
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
	public function edit_notification($organization_id = null) {
		
		// send notification email to finance and admin
		$organization 		= new OrganizationsController;
		$approval 	 		= new OrganizationApprovalsController;
		$user 				= new UsersController;	
		$process 			= new ProcessStatesController;	

		$options = array('conditions' => array(
			'OrganizationApproval.organization_id' => $organization_id,
			'OrganizationApproval.role_id' => $this->Session->read('Auth.User.Role.id') 
												));
		$myApproval = $approval->OrganizationApproval->find('first', $options); 
		
		//print_r($myApproval);
		//echo "my value: ".$myApproval['OrganizationApproval']['process_state_id'];
		
		$options = array('conditions' => array(
			'ProcessState.id' => $myApproval['OrganizationApproval']['process_state_id']));
			
		$myProcess = $process->ProcessState->find('first', $options);
		
		$options = array('conditions' => array(
			'Organization.id' => $organization_id));
			
		$myOrg = $organization->Organization->find('first', $options);
		
		$options = array(
				'conditions' 	=> 	array('User.role_id' => $this->Session->read('Auth.User.Role.id')),
				'fields'		=>	array('email')
					); //pride finance
		$myAdmin = $user->User->find('list', $options);
		
		$options = array(
				'conditions' 	=> 	array('User.organization_id' => $organization_id),
				'fields'		=>	array('id')
					); //pride finance
		$myuser = $user->User->find('first', $options);
		
		
		
		// define email content
		$emailContent['email']['title'] = 'PRIDE AMS - New Advertiser Registration from '.$myOrg['Organization']['name'];
		$emailContent['email']['activity'] 				= 'New Advertiser Registration';
		$emailContent['email']['advertiser'] 			= $myOrg['Organization']['name'];
		$emailContent['email']['approvalStatus'] 		= $myProcess['ProcessState']['name'];
		$emailContent['email']['comments'] 				= $myApproval['OrganizationApproval']['comments'];
		$emailContent['email']['submissionDate'] 		= $myApproval['OrganizationApproval']['updated'];
		
		$template = 'Pride.new_advertiser_registration';
		$label = 'New Advertiser registration';
		//$coreUserEmail[0] = 'mohd.aidid@prasarana.com.my';
		$coreUserEmail[0] = 'suhaimi.albakri@gmail.com';
		//$coreUserEmail[1] = 'suhaimi.maidin@prasarana.com.my';
		$coreUserEmail[1] = 'nizar.azik@prasarana.com.my';
		
		//append all email receipients into 1 array
		$toEmail = array_merge ($coreUserEmail, $myAdmin);
		//$toEmail = array_merge ($toEmail, $myUser);
		
		//start added by Nizar 03/11/2014
		if ($myApproval['OrganizationApproval']['process_state_id'] == 22) {
			$organization->Organization->id = $organization_id;
			$organization->Organization->saveField('isSubmitted', false);
			
			$this->Session->write('Auth.User.Organization.isSubmitted', false);
		}
		//end added by Nizar 03/11/2014
		
		// activate organization and send activation email
		if ($myApproval['OrganizationApproval']['process_state_id'] == 23) {
			$organization->isVerified($organization_id);
		}	
		
		if ($myApproval['OrganizationApproval']['process_state_id'] == 25) {
			$organization->isApproved($organization_id);
			$user->upgrade_as_advertiser($myuser);
		}	
		
		//start added by Nizar 05/11/2014
		if ($myApproval['OrganizationApproval']['process_state_id'] == 26) {
			$organization->Organization->id = $organization_id;
			$organization->Organization->saveField('isSubmitted', false);
			
			$this->Session->write('Auth.User.Organization.isSubmitted', false);
		}
		//end added by Nizar 05/11/2014
		
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
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->OrganizationApproval->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid organization approval'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			/*print_r($this->request->data);
			die;*/
			
			if ($this->OrganizationApproval->save($this->request->data)) {
								
				// send notification
				$this->edit_notification($this->request->data['OrganizationApproval']['organization_id']);
				
				$this->Session->setFlash(__d('croogo', 'The organization approval has been saved.'), 'default', array('class' => 'alert alert-success'));
				$this->redirect('/pride/organizations/index');
			} else {
				$this->Session->setFlash(__d('croogo', 'The organization approval could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			} 
		} else {
			$options = array('conditions' => array('OrganizationApproval.' . $this->OrganizationApproval->primaryKey => $id));
			$this->request->data = $this->OrganizationApproval->find('first', $options);
		}
		
		$organizations = $this->OrganizationApproval->Organization->find('list');
		$users = $this->OrganizationApproval->User->find('list');
		$filter = array('conditions' => array('ProcessState.role_id' => $this->Session->read('Auth.User.Role.id'), 'ProcessState.object' => 'Organization')); 
		
		//pride_administrator
		$processStates = $this->OrganizationApproval->ProcessState->find('list', $filter);
		$approvalLevels = $this->OrganizationApproval->ApprovalLevel->find('list');
		$this->set(compact('organizations', 'users', 'processStates', 'approvalLevels'));
		//$this->set(compact('processStates'));
		
	}
	
	
	public function editold($id = null) {
		if (!$this->OrganizationApproval->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid organization approval'));
		}
		
		if ($this->request->is('post') || $this->request->is('put')) {
		
			 echo 'lululululu';
			/*die;
			
			if ($this->OrganizationApproval->save($this->request->data)) {
				// send notification
				$this->edit_notification($this->request->data['OrganizationApproval']['organization_id']);
				
				$this->redirect('/pride/organizations/index');
			} else {
				$this->Session->setFlash(__d('croogo', 'The organization approval could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}*/
		} else {
			$options = array('conditions' => array('OrganizationApproval.' . $this->OrganizationApproval->primaryKey => $id));
			$this->request->data = $this->OrganizationApproval->find('first', $options);
			$this->request->data['User']['id'] = $this->Session->read('Auth.User.id');
		}
		$filter = array('conditions' => array('ProcessState.role_id' => $this->Session->read('Auth.User.Role.id'), 'ProcessState.object' => 'Organization')); //pride_administrator
		$processStates = $this->OrganizationApproval->ProcessState->find('list', $filter);
		
		$this->set(compact('processStates')); 
		
		echo 'lalalla';
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
		$this->OrganizationApproval->id = $id;
		if (!$this->OrganizationApproval->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid organization approval'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->OrganizationApproval->delete()) {
			$this->Session->setFlash(__d('croogo', 'Organization approval deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Organization approval was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->OrganizationApproval->recursive = 0;
		$this->set('organizationApprovals', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->OrganizationApproval->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid organization approval'));
		}
		$options = array('conditions' => array('OrganizationApproval.' . $this->OrganizationApproval->primaryKey => $id));
		$this->set('organizationApproval', $this->OrganizationApproval->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->OrganizationApproval->create();
			if ($this->OrganizationApproval->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The organization approval has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The organization approval could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$organizations = $this->OrganizationApproval->Organization->find('list');
		$users = $this->OrganizationApproval->User->find('list');
		$processStates = $this->OrganizationApproval->ProcessState->find('list');
		$approvalLevels = $this->OrganizationApproval->ApprovalLevel->find('list');
		$this->set(compact('organizations', 'users', 'processStates', 'approvalLevels'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->OrganizationApproval->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid organization approval'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->OrganizationApproval->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The organization approval has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The organization approval could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('OrganizationApproval.' . $this->OrganizationApproval->primaryKey => $id));
			$this->request->data = $this->OrganizationApproval->find('first', $options);
		}
		$organizations = $this->OrganizationApproval->Organization->find('list');
		$users = $this->OrganizationApproval->User->find('list');
		$processStates = $this->OrganizationApproval->ProcessState->find('list');
		$approvalLevels = $this->OrganizationApproval->ApprovalLevel->find('list');
		$this->set(compact('organizations', 'users', 'processStates', 'approvalLevels'));
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
		$this->OrganizationApproval->id = $id;
		if (!$this->OrganizationApproval->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid organization approval'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->OrganizationApproval->delete()) {
			$this->Session->setFlash(__d('croogo', 'Organization approval deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Organization approval was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
	
	protected function _getSenderEmail() {
		return Configure::read('AMS.email_from').'@' . preg_replace('#^www\.#', '', strtolower($_SERVER['SERVER_NAME']));
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


<?php
App::uses('CakeEmail', 'Network/Email');
App::uses('CakeTime', 'Utility');
App::uses('PrideAppController', 'Pride.Controller');
App::uses('DocumentReferencesController', 'Pride.Controller');
App::uses('OrganizationShareholdersController', 'Pride.Controller');
App::uses('OrganizationKeyPersonnelsController', 'Pride.Controller');
App::uses('OrganizationAttachmentsController', 'Pride.Controller');
App::uses('UsersController', 'Users.Controller');
App::uses('OrganizationApprovalsController', 'Pride.Controller');
App::uses('OrganizationTypesController', 'Pride.Controller');

/**
 * Organizations Controller
 *
 * @property Organization $Organization
 * @property PaginatorComponent $Paginator
 */
class OrganizationsController extends PrideAppController {

/**
 * Components 
 *
 * @var array
 */
    
	
		//$this->active_view(); // call active_view in PrideAppController for default layout special for Pride Plugin
	
	
	public $components = array('Paginator', 'Croogo.Recaptcha','RequestHandler');
	public $paginate = array(
        'limit' => 5,
		'conditions' => array('Organization.isVerified' => 0),
        'order' => array(
            'Organization.created' => 'desc'
        )
    );
/**
 * index method
 *
 * @return void
 */
	
	public function index() {
		$this->Organization->recursive = 0;
		
		if ($this->Session->read('Auth.User.role_id') == 6) { 
			$paginate = array(
				'limit' => 5,
				'conditions' => array(
					'Organization.isSubmitted' => 1,
					'Organization.isVerified' => 0,
					'Organization.isApproved' => 0,
					'Organization.organization_type_id = 4', 
					'Organization.organization_type_id = 5', 
					'Organization.organization_type_id = 6'),
				'order' => array(
					'Organization.created' => 'desc'
				)
			);
		} else if ($this->Session->read('Auth.User.role_id') == 5){  
			$paginate = array(
				'limit' => 5,
				'conditions' => array(
					'Organization.isSubmitted' => 1,
					'Organization.isVerified' => 1,
					'Organization.isApproved' => 0,
					'Organization.organization_type_id = 4', 
					'Organization.organization_type_id = 5', 
					'Organization.organization_type_id = 6' 
					),
				'order' => array(
					'Organization.created' => 'desc'
				)
			);
		}
		
		if (!empty($this->request->data['Organization']['name'])) {
			
			$this->Paginator->settings = array(
				'conditions' => array('Organization.name LIKE' => '%'.$this->request->data['Organization']['name'].'%'),
				'limit' => 5,
				'order' => array(
					'Organization.name' => 'asc'
				)
			);
			//print_r($this->request->data);
		} else {
			
			$this->Paginator->settings = $paginate;
		}
		
		$this->set('organizations', $this->paginate());
		
		
	}

	public function signup() {
		$this->Organization->recursive = 0;
		
		if ($this->Session->read('Auth.User.role_id') == 6) { 
			$paginate = array(
				'limit' => 5,
				'conditions' => array(
					'Organization.isSubmitted' => 0,
					'Organization.isVerified' => 0,
					'Organization.isApproved' => 0,
					'Organization.organization_type_id > 2'),
				'order' => array(
					'Organization.created' => 'desc'
				)
			);
		} else if ($this->Session->read('Auth.User.role_id') == 5){  
			$paginate = array(
				'limit' => 5,
				'conditions' => array(
					'Organization.isSubmitted' => 0,
					'Organization.isVerified' => 0,
					'Organization.isApproved' => 0,
					'Organization.organization_type_id > 2'),
				'order' => array(
					'Organization.created' => 'desc'
				)
			);
		}
		
		if (!empty($this->request->data['Organization']['name'])) {
			
			$this->Paginator->settings = array(
				'conditions' => array('Organization.name LIKE' => '%'.$this->request->data['Organization']['name'].'%'),
				'limit' => 5,
				'order' => array(
					'Organization.name' => 'asc'
				)
			);
			//print_r($this->request->data);
		} else {
			
			$this->Paginator->settings = $paginate;
		}
		
		$this->set('organizations', $this->paginate());
		
		
	}

	public function approved_index() {
	
		if ($this->Session->read('Auth.User.role_id') == 6) { 
			$paginate = array(
				'limit' => 5,
				'conditions' => array(
					'Organization.isVerified' => 1, 
					'Organization.isApproved' => 0,
					'Organization.organization_type_id > 2'),
				'order' => array(
					'Organization.created' => 'desc'
				)
			);
		} else if ($this->Session->read('Auth.User.role_id') == 5){
			$paginate = array(
				'limit' => 5,
				'conditions' => array(
					'Organization.isVerified' => 1, 
					'Organization.isApproved' => 1,
					'Organization.organization_type_id > 2'),
				'order' => array(
					'Organization.created' => 'desc'
				)
			);
		}
		$this->Organization->recursive = 0;
		
		if (!empty($this->request->data['Organization']['name'])) {
			 
			$this->Paginator->settings = array(
				'conditions' => array(	'Organization.isVerified' => 1,
										'Organization.organization_type_id > 2',
										'Organization.name LIKE' => '%'.$this->request->data['Organization']['name'].'%'),
				'limit' => 5,
				'order' => array(
					'Organization.name' => 'asc'
				)
			);
			
		} else {
			
			$this->Paginator->settings = $paginate;
		}
		
		$this->set('organizations', $this->paginate());
		
		
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Organization->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid organization'));
		}
		$options = array('conditions' => array('Organization.' . $this->Organization->primaryKey => $id));
		$organization = $this->Organization->find('first', $options);
		$this->set('organization', $organization);
		
		$orgType = new OrganizationTypesController;
		$optType = array('conditions' => array('OrganizationType.id' => $organization['Organization']['organization_type_id']));
		$organizationType = $orgType->OrganizationType->find('first', $optType);
		$this->set('organizationType', $organizationType);
		
		$sqlOrgs = "SELECT * FROM organizations, users where organizations.id = users.organization_id AND organizations.id = '". $organization['Organization']['id'] ."'";
		$myUsers = $this->Organization->query($sqlOrgs);
		$this->set('myUsers', $myUsers);
					
	}
	
	public function get_organization($id = null) {
		$options = array('conditions' => array('Organization.' . $this->Organization->primaryKey => $id));
		
		return $this->Organization->find('first', $options);
	}

	public function approval_preview($id = null) {
		if (!$this->Organization->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid organization'));
		}
		$options = array('conditions' => array('Organization.' . $this->Organization->primaryKey => $id));
		$organization = $this->Organization->find('first', $options);
		$this->set('organization', $organization);
		
		$orgType = new OrganizationTypesController;
		$optType = array('conditions' => array('OrganizationType.id' => $organization['Organization']['organization_type_id']));
		$organizationType = $orgType->OrganizationType->find('first', $optType);
		$this->set('organizationType', $organizationType);
		
		$sqlOrgs = "SELECT * FROM organizations, users where organizations.id = users.organization_id AND organizations.id = '". $organization['Organization']['id'] ."'";
		$myUsers = $this->Organization->query($sqlOrgs);
		$this->set('myUsers', $myUsers);
		
		/* $user = new UsersController;
		$optUser = array('conditions' => array('organization_id' => $id));
		$users = $user->User->find('first', $optUser);
		$this->set('users', $users); */
		
		
	}

	public function download($id = null) {
		if (!$this->Organization->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid organization'));
		}
		$options = array('conditions' => array('Organization.' . $this->Organization->primaryKey => $id));
		$organization = $this->Organization->find('first', $options);
		$this->set('organization', $organization);
		
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Organization->create();
			if ($this->Organization->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The organization has been saved'), 'default', array('class' => 'success'));
				//$this->redirect(array('action' => 'index'));
				$this->redirect('/');
			} else {
				$this->Session->setFlash(__d('croogo', 'The organization could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$organizationTypes = $this->Organization->OrganizationType->find('list');
		$this->set(compact('organizationTypes'));
	}
	
	
/**
 * add method
 *
 * @return void
 */
	public function register_company() {
		if ($this->request->is('post')) {
			$this->Organization->create();
			/*
			$continue = $this->_captcha($continue, $this->request->data);
			// send notification email
			$this->set(compact('continue'));
			if ($continue === true) {
			*/
				// set organization type
				// default as advertiser
				$this->request->data['Organization']['organization_type_id'] = 4; 
				if ($this->Organization->save($this->request->data)) {
					$this->Session->setFlash(__d('croogo', 'The organization has been saved'), 'default', array('class' => 'success'));
					// need to get database new registered organization id.
/* 					$this->Session->write('Register.organization_id',$this->Organization->getLastInsertId());
					$this->Session->write('Register.contact_person', $this->request->data['Organization']['contact_person']);
					$this->Session->write('Register.contact_email', $this->request->data['Organization']['contact_email']); */
					
					// redirect to register user using the new orgazation id.
					/* $this->redirect(array(
					'plugin' => 'users',
					'controller' => 'users',
					'action' => 'register_user')); */
					//$this->redirect('/');
			
				} else {
					$this->Session->setFlash(__d('croogo', 'The organization could not be saved. Please, try again.'), 'default', array('class' => 'error'));
				}
			//}
		}
	}
	
	public function upload_documentation ($id = null) {
		if (!$this->Organization->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid organization'));
		}
		$options = array('conditions' => array('Organization.' . $this->Organization->primaryKey => $id));
		$organization = $this->Organization->find('first', $options);
		$this->set('organization', $organization);
		
		$doc = new DocumentReferencesController;
		$documentReferences = $doc->DocumentReference->find('all');
		$this->set('documentReferences', $documentReferences);
		
	}
	
	public function declare_shareholder($id = null) {
		if (!$this->Organization->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid organization'));
		}
		$options = array('conditions' => array('Organization.' . $this->Organization->primaryKey => $id));
		$organization = $this->Organization->find('first', $options);
		$this->set('organization', $organization);
		
		// sum allotted share and find balance paid-up capital
		$myShare = new OrganizationShareholdersController;
		
		$options = array('conditions' => array(
						'OrganizationShareholder.organization_id' => $this->Session->read('Auth.User.organization_id'),
						//'fields' => array('id', 'shareholding')
					));
		$shares = $myShare->OrganizationShareholder->find('all', $options);
		$totalShare = 0;
		if (!empty($shares)) {
			foreach($shares as $share) {
				$totalShare += $share['OrganizationShareholder']['shareholding']; 
			}
			$balance = $this->Session->read('Auth.User.Organization.paid_capital') - $totalShare;
		} else {
			$balance = $this->Session->read('Auth.User.Organization.paid_capital');
		}
		
		// redirect to shareholder is balance is already zero
		if ($balance != 0) {
			$number = new NumberHelper(new View());
			
			$this->Session->setFlash(__d('croogo', 'The organization '.$number->currency($this->Session->read('Auth.User.Organization.paid_capital'), 'RM').' shares still has a balance of '.$number->currency($balance, 'RM').'. Please review your allotment of shares. '), 'default', array('class' => 'alert alert-danger'));
		}
	
	}
	
	public function declare_keypersonnel($id = null) {
		if (!$this->Organization->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid organization'));
		}
		$options = array('conditions' => array('Organization.' . $this->Organization->primaryKey => $id));
		$organization = $this->Organization->find('first', $options);
		$this->set('organization', $organization);
		
		/* $keypersonnel = new OrganizationKeyPersonnelsController;
		$options = array('conditions' => array('OrganizationKeyPersonnel.organization_id' => $id));
		$myKeyPersonnels = $keypersonnel->OrganizationKeyPersonnel->find('all', $options);
		$this->set(compact('myKeyPersonnels')); */
	
	}
	
	public function submit_application ($id = null) {
		if (!$this->Organization->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid organization'));
		}
		$options = array('conditions' => array('Organization.' . $this->Organization->primaryKey => $id));
		$organization = $this->Organization->find('first', $options);
		$this->set('organization', $organization);
		
		$orgAppr = new OrganizationApprovalsController;
		$option = array('conditions' => array('organization_id' => $this->Session->read('Auth.User.Organization.id')));
		$organizationApprovals = $orgAppr->OrganizationApproval->find('all', $option);
		$this->set('organizationApprovals',$organizationApprovals);
		
		$orgType = new OrganizationTypesController;
		$optType = array('conditions' => array('OrganizationType.id' => $organization['Organization']['organization_type_id']));
		$organizationType = $orgType->OrganizationType->find('first', $optType);
		$this->set('organizationType', $organizationType);
		
		if(!empty($organizationApprovals)){
			if (!empty($this->request->data['OrganizationApproval']['id'])){
			
				$this->Organization->id = $id;
				$this->Organization->saveField('isSubmitted', true);
				
				// reload session 
				$this->Session->write('Auth.User.Organization.isSubmitted', true);
				
				$this->redirect(array(
				'plugin' => 'pride',
				'controller' => 'organization_approvals',
				'action' => 'resubmit_notification', $this->request->data['OrganizationApproval']['id']));			
				
				//$this->redirect('/members');
			}
			
		}else{
		
			if (!empty($this->request->data['OrganizationApproval']['id'])){
				
				$this->Organization->id = $id;
				$this->Organization->saveField('isSubmitted', true);
				
				// reload session 
				$this->Session->write('Auth.User.Organization.isSubmitted', true);
				
				$this->redirect(array(
				'plugin' => 'pride',
				'controller' => 'organization_approvals',
				'action' => 'registration_approval', $this->request->data['OrganizationApproval']['id']));
			}
		}
		
		/* --commented by Nizar 04/11/2014
		if (!empty($this->request->data['OrganizationApproval']['id'])){	
			$this->Organization->id = $id;
			$this->Organization->saveField('isSubmitted', true);
			
			// reload session 
			$this->Session->write('Auth.User.Organization.isSubmitted', true);
			
			// redirect to register user using the new organization id.
			$this->redirect(array(
			'plugin' => 'pride',
			'controller' => 'organization_approvals',
			'action' => 'registration_approval', $this->request->data['OrganizationApproval']['id']));
		} 
		*/
	}
	
	
/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Organization->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid organization'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Organization->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The organization has been saved.'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The organization could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Organization.' . $this->Organization->primaryKey => $id));
			$this->request->data = $this->Organization->find('first', $options);
		}
		$organizationTypes = $this->Organization->OrganizationType->find('list');
		$this->set(compact('organizationTypes'));
	}
	
	public function split_date($input) {
		$arr = explode("/", $input);
	   
		//Display the Start Date array format
		return array(
			 "day" => $arr[0], 
			 "month" => $arr[1], 
			 "year" => $arr[2]
		);
	}
	
	public function edit_my_organization($id = null) {
		if (!$this->Organization->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid organization'));
		}
		
		
		//$this->Organization->create();
		
		if ($this->request->is('post') || $this->request->is('put')) {
			
			$this->request->data['Organization']['registered_date'] = $this->split_date($this->request->data['Organization']['registered_date']);
			
			$web_site = $this->request->data['Organization']['website'];
			
			$this->Organization->create();
			
			if ($this->Organization->save($this->request->data)) {
				
				$users = new UsersController;
				$users_id = $users->User->read(null, $this->Auth->User('id'));
				$users->User->id = $users_id;
				$users->User->saveField('website', $web_site);

				
				$this->Session->setFlash(__d('croogo', 'The company details has been saved.'), 'default', array('class' => 'alert alert-success'));
				/*Commented by Nizar [11/11/2014]
				$this->redirect(array('plugin' => 'members', 'controller' => 'members', 'action' => 'index'));
				*/
				// push session paid_capital
				$this->Session->write('Auth.User.Organization.paid_capital', $this->Organization->cleanData($this->request->data['Organization']['paid_capital']));
				
				// push session staffs
				$this->Session->write('Auth.User.Organization.staffs', $this->request->data['Organization']['staffs']);
				
				$this->redirect(array('plugin' => 'pride', 'controller' => 'organizations', 'action' => 'declare_shareholder/'.$id));
			} else {
				$this->Session->setFlash(__d('croogo', 'The organization could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Organization.id' => $this->Session->read('Auth.User.Organization.id')));
			$this->request->data = $this->Organization->find('first', $options);
			
			
			if($this->request->data['Organization']['registered_date'] == '0000-00-00'){
				$this->request->data['Organization']['registered_date'] = '';
			}else{
				$this->request->data['Organization']['registered_date'] = CakeTime::format($this->request->data['Organization']['registered_date'], '%d/%m/%Y');
			}
		}
	}
	
	public function isVerified($id = null) {
		
		$this->Organization->id = $id;
		$this->Organization->saveField('isVerified', 1);
		
	}

	public function isAdviced($id = null) {
		
		$this->Organization->id = $id;
		$this->Organization->saveField('isAdviced', 1);
		
	}

	public function hasPaid($id = null) {
		
		$this->Organization->id = $id;
		$this->Organization->saveField('hasPaid', 1);
		
	}
	
	public function isApproved($id = null) {
		
		$this->Organization->id = $id;
		$this->Organization->saveField('status', 1);
		$this->Organization->saveField('isApproved', 1);
		
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
		$this->Organization->id = $id;
		if (!$this->Organization->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid organization'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Organization->delete()) {
			$this->Session->setFlash(__d('croogo', 'Organization deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Organization was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Organization->recursive = 0;
		$this->set('organizations', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Organization->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid organization'));
		}
		$options = array('conditions' => array('Organization.' . $this->Organization->primaryKey => $id));
		$this->set('organization', $this->Organization->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Organization->create();
			if ($this->Organization->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The organization has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The organization could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$organizationTypes = $this->Organization->OrganizationType->find('list');
		$this->set(compact('organizationTypes'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Organization->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid organization'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Organization->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The organization has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The organization could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Organization.' . $this->Organization->primaryKey => $id));
			$this->request->data = $this->Organization->find('first', $options);
		}
		$organizationTypes = $this->Organization->OrganizationType->find('list');
		$this->set(compact('organizationTypes'));
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
		$this->Organization->id = $id;
		if (!$this->Organization->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid organization'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Organization->delete()) {
			$this->Session->setFlash(__d('croogo', 'Organization deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Organization was not deleted'), 'default', array('class' => 'error'));
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
			$email->to($users);
			//foreach($users as $user) {
				//$email->addTo($user);
			//}		
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
	
	protected function _captcha($continue, $organization) {
		if (!empty($this->request->data) &&
			$organization['Organization']['message_captcha'] &&
			$continue === true &&
			!$this->Recaptcha->valid($this->request)) {
			$continue = false;
			$this->Session->setFlash(__d('croogo', 'Invalid captcha entry'), 'default', array('class' => 'error'));
		}

		return $continue;
	}
	
	public function is_ready($organization_id = null ) {
	
		$totalMandatory = $this->Organization->find("all", array(
			"joins" => array(
				array(
					"table" => "organization_attachments",
					"alias" => "Attachment",
					'type' => 'inner',
					"conditions" => array(
						"OrganizationAttachment.organization_id = Organization.id"
					)
				),
				array(
					"table" => "document_references",
					"alias" => "Document",
					'type' => 'inner',
					"conditions" => array(
						"OrganizationAttachment.document_reference_id = DocumentReference.id"
					)
				)
			),
			'conditions' => array(
				'Organization.id' => $organization_id,
				'Document.doc_type' => 1,
			)
		));
	
		print_r($totalMandatory);
		
		$doc = new DocumentReferencesController;
		
		$filter = array('conditions' => array(
			'DocumentReference.doc_type' => 1
		));
		$totalDocuments = $doc->DocumentReference->find('count', $filter);
		
		$this->set('totalMandatory', $totalMandatory);
		$this->set('totalDocuments', $totalDocuments);
	}
	
	public function organization_forms($id = null) {
		$this->autoLayout = false;
		
		$options = array('conditions' => array('Organization.' . $this->Organization->primaryKey => $id));
		$organization = $this->Organization->find('first', $options);
		$this->set('organization', $organization);
		
		$orgType = new OrganizationTypesController;
		$optType = array('conditions' => array('OrganizationType.id' => $organization['Organization']['organization_type_id']));
		$organizationType = $orgType->OrganizationType->find('first', $optType);
		$this->set('organizationType', $organizationType);
		
		$sqlOrgs = "SELECT * FROM organizations, users where organizations.id = users.organization_id AND organizations.id = '". $organization['Organization']['id'] ."'";
		$myUsers = $this->Organization->query($sqlOrgs);
		$this->set('myUsers', $myUsers);
		
	}
	
	public function debug_org_details($id = null) {
		$options = array('conditions' => array('Organization.' . $this->Organization->primaryKey => $id));
		$organization = $this->Organization->find('first', $options);
		$this->set('organization', $organization);
		
		$orgType = new OrganizationTypesController;
		$optType = array('conditions' => array('OrganizationType.id' => $organization['Organization']['organization_type_id']));
		$organizationType = $orgType->OrganizationType->find('first', $optType);
		$this->set('organizationType', $organizationType);
		
		$sqlOrgs = "SELECT * FROM organizations, users where organizations.id = users.organization_id AND organizations.id = '". $organization['Organization']['id'] ."'";
		$myUsers = $this->Organization->query($sqlOrgs);
		$this->set('myUsers', $myUsers);
			
	}
}



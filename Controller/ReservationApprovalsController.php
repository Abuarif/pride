<?php
App::uses('PrideAppController', 'Pride.Controller');
App::uses('CakeEmail', 'Network/Email');
App::uses('ProcessStatesController', 'Pride.Controller');
App::uses('ReservationApprovalsController', 'Pride.Controller');
App::uses('ReservationsController', 'Pride.Controller');
App::uses('OrganizationsController', 'Pride.Controller');
App::uses('PackagesController', 'Pride.Controller');
App::uses('UsersController', 'Users.Controller');

/**
 * ReservationApprovals Controller
 *
 * @property ReservationApproval $ReservationApproval
 * @property PaginatorComponent $Paginator
 */
class ReservationApprovalsController extends PrideAppController {

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
		$this->ReservationApproval->recursive = 0;
		$this->set('reservationApprovals', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ReservationApproval->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid reservation approval'));
		}
		$options = array('conditions' => array('ReservationApproval.' . $this->ReservationApproval->primaryKey => $id));
		$this->set('reservationApproval', $this->ReservationApproval->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ReservationApproval->create();
			if ($this->ReservationApproval->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The reservation approval has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The reservation approval could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$reservations = $this->ReservationApproval->Reservation->find('list');
		$users = $this->ReservationApproval->User->find('list');
		$roles = $this->ReservationApproval->Role->find('list');
		$processStates = $this->ReservationApproval->ProcessState->find('list');
		$approvalLevels = $this->ReservationApproval->ApprovalLevel->find('list');
		$this->set(compact('reservations', 'users', 'roles', 'processStates', 'approvalLevels'));
	}

	public function add_reservation_approval($organization_id = null, $reservation_id = null) {
		$pending = 10;
		$approval_level = 4; // finance approval - new campaign order
		$role_id = 5; // finance 
		$user_role_id = 5; // Pride finance role
		
		$this->ReservationApproval->create();
		$data['process_state_id'] = $pending; 
		$data['approval_level_id'] = $approval_level; 
		$data['role_id'] = $role_id; 
		$data['reservation_id'] = $reservation_id; 
		$data['name'] = 'Finance Approval required.';
		$data['comments'] = 'Please update your comment here ...';
		
		if ($this->ReservationApproval->save($data)) {
			// add provision approval for Pride Administrator
			$this->add_provisioning_approval($organization_id, $reservation_id);
		}
	}
	
	public function add_provisioning_approval($organization_id = null, $reservation_id = null) {
		$pending = 10;
		$approval_level = 5; // admin approval - completed provision
		$role_id = 6; // administrator 
		$user_role_id = 6; // Pride admin role
		
		$this->ReservationApproval->create();
		$data['process_state_id'] = $pending; 
		$data['approval_level_id'] = $approval_level; 
		$data['role_id'] = $role_id; 
		$data['reservation_id'] = $reservation_id; 
		$data['name'] = 'Administrator Approval required.';
		$data['comments'] = 'Please update your comment here ...';
		
		if ($this->ReservationApproval->save($data)) {
			// need to send email notification to each of group members
			$this->approval_notification($reservation_id);
			
			// redirect to campaign page
			$this->redirect(array(
				'controller' => 'reservations',
				'action' => 'view', $reservation_id, '#' => 'tab_2-1'
				)
			);
			
		}
	}
	
	public function approval_notification($reservation_id) {
		
		// instantiate objects
		$organization 		= new OrganizationsController;
		$approval 			= new ReservationApprovalsController;
		$reservation 		= new ReservationsController;
		$user 				= new UsersController;	
		$process 			= new ProcessStatesController;	

		$orderOptions = array('conditions' => array('Reservation.id' => $reservation_id));
		$myReservation = $reservation->Reservation->find('first', $orderOptions);
		
		$options = array('conditions' => array('ReservationApproval.reservation_id' => $myReservation['Reservation']['id']));
		$myApproval = $approval->ReservationApproval->find('first', $options); 
		
		$options = array('conditions' => array('ProcessState.id' => $myApproval['ReservationApproval']['process_state_id']));
		$myProcess = $process->ProcessState->find('first', $options);
		
		$options = array('conditions' => array('Organization.id' => $myReservation['Reservation']['organization_id']));
		$myOrg = $organization->Organization->find('first', $options);
		
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
		$emailContent['email']['activity'] 				= 'Campaign Resources Reservation';
		$emailContent['email']['reservation_id'] 			= $myReservation['Reservation']['id'];
		$emailContent['email']['advertiser'] 			= $myOrg['Organization']['name'];
		$emailContent['email']['approvalStatus'] 		= $myProcess['ProcessState']['name'];
		$emailContent['email']['comments'] 				= $myApproval['ReservationApproval']['comments'];
		$emailContent['email']['submissionDate'] 		= $myApproval['ReservationApproval']['updated'];
		
		$template = 'Pride.reservationRequestApproval';
		$label = 'Campaign Resources Approval Status Updates';
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
		if (!$this->ReservationApproval->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid reservation approval'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ReservationApproval->save($this->request->data)) {
				
				// Update campaign_order upon approval
				if ($this->request->data['ReservationApproval']['process_state_id'] == 16) { //payment approved
					$reservation = new ReservationsController;
					$data['Reservation']['id'] = $this->request->data['ReservationApproval']['reservation_id'];
					$data['Reservation']['status'] = true;
					$reservation->Reservation->save($data);
				}
				$this->redirect(array(
							'controller' => 'reservations',
							 'action' => 'approval_preview', $this->request->data['ReservationApproval']['reservation_id']));
																	 
				$this->Session->setFlash(__d('croogo', 'The reservation approval has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The reservation approval could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('ReservationApproval.' . $this->ReservationApproval->primaryKey => $id));
			$this->request->data = $this->ReservationApproval->find('first', $options);
		}
		/* $reservations = $this->ReservationApproval->Reservation->find('list');
		$users = $this->ReservationApproval->User->find('list');
		$roles = $this->ReservationApproval->Role->find('list');
		$processStates = $this->ReservationApproval->ProcessState->find('list');
		$approvalLevels = $this->ReservationApproval->ApprovalLevel->find('list');
		$this->set(compact('reservations', 'users', 'roles', 'processStates', 'approvalLevels')); */
		$filter = array('conditions' => array('ProcessState.role_id' => $this->Session->read('Auth.User.Role.id'), 'ProcessState.object' => 'Reservation')); 
		$processStates = $this->ReservationApproval->ProcessState->find('list', $filter);
               
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
		$this->ReservationApproval->id = $id;
		if (!$this->ReservationApproval->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid reservation approval'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ReservationApproval->delete()) {
			$this->Session->setFlash(__d('croogo', 'Reservation approval deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Reservation approval was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->ReservationApproval->recursive = 0;
		$this->set('reservationApprovals', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->ReservationApproval->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid reservation approval'));
		}
		$options = array('conditions' => array('ReservationApproval.' . $this->ReservationApproval->primaryKey => $id));
		$this->set('reservationApproval', $this->ReservationApproval->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->ReservationApproval->create();
			if ($this->ReservationApproval->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The reservation approval has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The reservation approval could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$reservations = $this->ReservationApproval->Reservation->find('list');
		$users = $this->ReservationApproval->User->find('list');
		$roles = $this->ReservationApproval->Role->find('list');
		$processStates = $this->ReservationApproval->ProcessState->find('list');
		$approvalLevels = $this->ReservationApproval->ApprovalLevel->find('list');
		$this->set(compact('reservations', 'users', 'roles', 'processStates', 'approvalLevels'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->ReservationApproval->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid reservation approval'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ReservationApproval->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The reservation approval has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The reservation approval could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('ReservationApproval.' . $this->ReservationApproval->primaryKey => $id));
			$this->request->data = $this->ReservationApproval->find('first', $options);
		}
		$reservations = $this->ReservationApproval->Reservation->find('list');
		$users = $this->ReservationApproval->User->find('list');
		$roles = $this->ReservationApproval->Role->find('list');
		$processStates = $this->ReservationApproval->ProcessState->find('list');
		$approvalLevels = $this->ReservationApproval->ApprovalLevel->find('list');
		$this->set(compact('reservations', 'users', 'roles', 'processStates', 'approvalLevels'));
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
		$this->ReservationApproval->id = $id;
		if (!$this->ReservationApproval->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid reservation approval'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ReservationApproval->delete()) {
			$this->Session->setFlash(__d('croogo', 'Reservation approval deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Reservation approval was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
}

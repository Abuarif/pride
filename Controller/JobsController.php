<?php
App::uses('PrideAppController', 'Pride.Controller');
App::uses('JobTasksController', 'Pride.Controller');
App::uses('JobTypesController', 'Pride.Controller');
App::uses('ProvisionBusesController', 'Pride.Controller');
/**
 * Jobs Controller
 *
 * @property Job $Job
 * @property PaginatorComponent $Paginator
 */
class JobsController extends PrideAppController {

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
		
		$this->Job->recursive =0;
		// check for role
		/* if ($this->Session->read('Auth.User.Role.alias') == Configure::read('AMS.role_pride_contractor')) { */
			$paginate = array('limit' => 10,
				'conditions' => array(
					/* 'OR' => array(
					array('Job.job_type_id' => 2),
					array('Job.job_type_id' => 3)
					), */
					'Campaign.id !=' => null
					
				)
			);
			$this->Paginator->settings = $paginate;
		/* }  */
		$this->set('jobs', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Job->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid job'));
		}
		$options = array('conditions' => array('Job.' . $this->Job->primaryKey => $id));
		$this->set('job', $this->Job->find('first', $options));
		
	}

	public function spad_view($id = null) {
		if (!$this->Job->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid job'));
		}
		$options = array('conditions' => array('Job.' . $this->Job->primaryKey => $id));
		$this->set('job', $this->Job->find('first', $options));
		
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Job->create();
			if ($this->Job->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The job has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The job could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$filter = array('conditions' => array('JobType.level' => 1));
		$jobTypes = $this->Job->JobType->find('list', $filter);
		$users = $this->Job->User->find('list');
		$organizations = $this->Job->Organization->find('list');
		$campaigns = $this->Job->Campaign->find('list');
		$this->set(compact('jobTypes', 'users', 'organizations', 'campaigns'));
	}

	public function create_job($job_type_id = null, $campaign_id = null) {
		$job_id = null;
		
		$this->log("create_job: ".$job_type_id);
		$row['job_type_id']	= $job_type_id;
		$row['campaign_id']	= $campaign_id;
		$row['organization_id'] 	= CakeSession::read('Auth.User.organization_id');
		$row['user_id'] 			= CakeSession::read('Auth.User.id');
		

		$this->Job->create();
		$this->Job->set($row);
		if ($this->Job->save()) {
			
			$job_id = $this->Job->getLastInsertID();
			$this->log("Successfully create_job: ".$job_id." for :".$job_type_id);
			
			if ($job_type_id == 1) { // create jobs for SPAD approval
				$jobTask = new JobTasksController;
				$jobTask->create_job_task($this->Job->getLastInsertID());
			}
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
		if (!$this->Job->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid job'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Job->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The job has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The job could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Job.' . $this->Job->primaryKey => $id));
			$this->request->data = $this->Job->find('first', $options);
		}
		$jobTypes = $this->Job->JobType->find('list');
		$users = $this->Job->User->find('list');
		$organizations = $this->Job->Organization->find('list');
		$campaigns = $this->Job->Campaign->find('list');
		$this->set(compact('jobTypes', 'users', 'organizations', 'campaigns'));
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
		$this->Job->id = $id;
		if (!$this->Job->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid job'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Job->delete()) {
			$this->Session->setFlash(__d('croogo', 'Job deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Job was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Job->recursive = 0;
		$this->set('jobs', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Job->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid job'));
		}
		$options = array('conditions' => array('Job.' . $this->Job->primaryKey => $id));
		$this->set('job', $this->Job->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Job->create();
			if ($this->Job->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The job has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The job could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$jobTypes = $this->Job->JobType->find('list');
		$users = $this->Job->User->find('list');
		$organizations = $this->Job->Organization->find('list');
		$campaigns = $this->Job->Campaign->find('list');
		$this->set(compact('jobTypes', 'users', 'organizations', 'campaigns'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Job->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid job'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Job->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The job has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The job could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Job.' . $this->Job->primaryKey => $id));
			$this->request->data = $this->Job->find('first', $options);
		}
		$jobTypes = $this->Job->JobType->find('list');
		$users = $this->Job->User->find('list');
		$organizations = $this->Job->Organization->find('list');
		$campaigns = $this->Job->Campaign->find('list');
		$this->set(compact('jobTypes', 'users', 'organizations', 'campaigns'));
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
		$this->Job->id = $id;
		if (!$this->Job->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid job'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Job->delete()) {
			$this->Session->setFlash(__d('croogo', 'Job deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Job was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
	
}

<?php
App::uses('PrideAppController', 'Pride.Controller');
App::uses('JobTypesController', 'Pride.Controller');
App::uses('ProvisionBusesController', 'Pride.Controller');
App::uses('CakeTime', 'Utility');
App::uses('DocumentReferencesController', 'Pride.Controller');
/**
 * JobTasks Controller
 *
 * @property JobTask $JobTask
 * @property PaginatorComponent $Paginator
 */
class JobTasksController extends PrideAppController {

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
		$this->JobTask->recursive = 0;
		$this->set('jobTasks', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->JobTask->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid job task'));
		}
		$options = array('conditions' => array('JobTask.' . $this->JobTask->primaryKey => $id));
		$this->set('jobTask', $this->JobTask->find('first', $options));
	}

	public function getJobTask($id = null) {
		if (!$this->JobTask->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid job task'));
		}
		$this->JobTask->recursive = 0;
		$options = array('conditions' => array('JobTask.' . $this->JobTask->primaryKey => $id));
		
		return $this->JobTask->find('first', $options);
	}

	public function getJobTaskDetail($campaign_order_detail_id = null, $provision_bus_id = null) {
		
		$options = array('conditions' => array(
				'JobTask.campaign_order_detail_id' => $campaign_order_detail_id, 
				'JobTask.provision_bus_id' => $provision_bus_id, ));
		
		return $this->JobTask->find('first', $options);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->JobTask->create();
			if ($this->JobTask->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The job task has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The job task could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$users = $this->JobTask->User->find('list');
		$jobs = $this->JobTask->Job->find('list');
		$provisionBuses = $this->JobTask->ProvisionBus->find('list');
		$filter = array('conditions' => array('JobType.level' => 2));
		$jobTypes = $this->JobTask->JobType->find('list', $filter);
		$this->set(compact('users', 'jobs', 'provisionBuses', 'jobTypes'));
	}

	public function create_job_task($job_id = null, $campaign_order_detail_id = null) {
		
		$jobType = new JobTypesController;
		
		// for S.P.A.D Approval only
		$filter = array('conditions' => array('JobType.level' => 2), 
							'fields' => array('id', 'name'));
		$myJobTypes = $jobType->JobType->find('list', $filter);
		
		foreach($myJobTypes as $key=>$value) {
			$this->create_task($job_id, $key, 0);
			//$this->create_task($job_id, $key, $campaign_order_detail_id);
		} 
	}
	
	public function create_task($job_id = null, $job_type_id = null, $campaign_order_detail_id = null) {
		
			$this->log("create_task: ".$job_type_id);
			$row['job_id']	= $job_id;
			$row['job_type_id']	= $job_type_id;
			$row['campaign_order_detail_id']	= $campaign_order_detail_id;
			$row['user_id'] 			= CakeSession::read('Auth.User.id');
			

			$this->JobTask->create();
			$this->JobTask->set($row);
			$this->JobTask->save();
	}
	
	
	public function create_task_work($job_id = null, $job_type_id = null, $campaign_order_detail_id = null, $provision_bus_id = null) {
		
			$this->log("create_task: ".$job_type_id);
			$row['job_id']				= $job_id;
			$row['job_type_id']			= $job_type_id;
			$row['provision_bus_id']	= $provision_bus_id;
			$row['campaign_order_detail_id']	= $campaign_order_detail_id;
			$row['user_id'] 			= CakeSession::read('Auth.User.id');
			

			$this->JobTask->create();
			$this->JobTask->set($row);
			$this->JobTask->save();
	}
/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->JobTask->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid job task'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->JobTask->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The job task has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The job task could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('JobTask.' . $this->JobTask->primaryKey => $id));
			$this->request->data = $this->JobTask->find('first', $options);
		}
		$users = $this->JobTask->User->find('list');
		$jobs = $this->JobTask->Job->find('list');
		$provisionBuses = $this->JobTask->ProvisionBus->find('list');
		$jobTypes = $this->JobTask->JobType->find('list');
		$this->set(compact('users', 'jobs', 'provisionBuses', 'jobTypes'));
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
		$this->JobTask->id = $id;
		if (!$this->JobTask->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid job task'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->JobTask->delete()) {
			$this->Session->setFlash(__d('croogo', 'Job task deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Job task was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->JobTask->recursive = 0;
		$this->set('jobTasks', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->JobTask->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid job task'));
		}
		$options = array('conditions' => array('JobTask.' . $this->JobTask->primaryKey => $id));
		$this->set('jobTask', $this->JobTask->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->JobTask->create();
			if ($this->JobTask->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The job task has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The job task could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$users = $this->JobTask->User->find('list');
		$jobs = $this->JobTask->Job->find('list');
		$provisionBuses = $this->JobTask->ProvisionBus->find('list');
		$jobTypes = $this->JobTask->JobType->find('list');
		$this->set(compact('users', 'jobs', 'provisionBuses', 'jobTypes'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->JobTask->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid job task'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->JobTask->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The job task has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The job task could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('JobTask.' . $this->JobTask->primaryKey => $id));
			$this->request->data = $this->JobTask->find('first', $options);
		}
		$users = $this->JobTask->User->find('list');
		$jobs = $this->JobTask->Job->find('list');
		$provisionBuses = $this->JobTask->ProvisionBus->find('list');
		$jobTypes = $this->JobTask->JobType->find('list');
		$this->set(compact('users', 'jobs', 'provisionBuses', 'jobTypes'));
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
		$this->JobTask->id = $id;
		if (!$this->JobTask->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid job task'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->JobTask->delete()) {
			$this->Session->setFlash(__d('croogo', 'Job task deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Job task was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function spad ($id = null) {
		//Remove layout for generating PDF report
		$this->autoLayout = false;
	}
	
	public function update_submission($job_id = null, $id = null ) {
	
		if ($this->request->is('post') || $this->request->is('put')) {
		
			if ($this->JobTask->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The job task has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('controller' => 'jobs', 'action' => 'view', $job_id));
			} else {
				$this->Session->setFlash(__d('croogo', 'The job task could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('JobTask.' . $this->JobTask->primaryKey => $id));
			$this->request->data = $this->JobTask->find('first', $options);
		}
		
	}
	
	public function update_approval($id = null ) {
	
	}
	
	public function update_job($id = null, $job_id = null) {
		if ($this->request->is('post') || $this->request->is('put')) {
			$this->request->data['JobTask']['installation_date'] = $this->split_date($this->request->data['JobTask']['installation_date']);
			$this->request->data['JobTask']['puspakom_date'] = $this->split_date($this->request->data['JobTask']['puspakom_date']);
			if ($this->JobTask->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The job task has been updated'), 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('controller' => 'jobs', 'action' => 'view', $job_id, '#' => 'tab_2-2'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The job task could not be updated. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('JobTask.' . $this->JobTask->primaryKey => $id));
			$this->request->data = $this->JobTask->find('first', $options);
					
			if($this->request->data['JobTask']['installation_date'] == '0000-00-00 00:00:00') {
				$this->request->data['JobTask']['installation_date'] = '';
			}else{
				$this->request->data['JobTask']['installation_date'] = CakeTime::format($this->request->data['JobTask']['installation_date'], '%d/%m/%Y');
			}
			
			
			if($this->request->data['JobTask']['puspakom_date'] == '0000-00-00') {
				$this->request->data['JobTask']['puspakom_date'] = '';
			}else{
				$this->request->data['JobTask']['puspakom_date'] = CakeTime::format($this->request->data['JobTask']['puspakom_date'], '%d/%m/%Y');
			}			
		}
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
	
}

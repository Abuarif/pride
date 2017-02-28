<?php
App::uses('PrideAppController', 'Pride.Controller');
/**
 * JobTypes Controller
 *
 * @property JobType $JobType
 * @property PaginatorComponent $Paginator
 */
class JobTypesController extends PrideAppController {

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
		$this->JobType->recursive = 0;
		$this->set('jobTypes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->JobType->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid job type'));
		}
		$options = array('conditions' => array('JobType.' . $this->JobType->primaryKey => $id));
		$this->set('jobType', $this->JobType->find('first', $options));
	}
	
	public function get_job_type($id = null) {
	
		$options = array('conditions' => array('JobType.' . $this->JobType->primaryKey => $id));
	
		return $this->JobType->find('first', $options);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->JobType->create();
			if ($this->JobType->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The job type has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The job type could not be saved. Please, try again.'), 'default', array('class' => 'error'));
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
		if (!$this->JobType->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid job type'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->JobType->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The job type has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The job type could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('JobType.' . $this->JobType->primaryKey => $id));
			$this->request->data = $this->JobType->find('first', $options);
		}
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
		$this->JobType->id = $id;
		if (!$this->JobType->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid job type'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->JobType->delete()) {
			$this->Session->setFlash(__d('croogo', 'Job type deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Job type was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->JobType->recursive = 0;
		$this->set('jobTypes', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->JobType->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid job type'));
		}
		$options = array('conditions' => array('JobType.' . $this->JobType->primaryKey => $id));
		$this->set('jobType', $this->JobType->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->JobType->create();
			if ($this->JobType->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The job type has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The job type could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->JobType->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid job type'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->JobType->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The job type has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The job type could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('JobType.' . $this->JobType->primaryKey => $id));
			$this->request->data = $this->JobType->find('first', $options);
		}
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
		$this->JobType->id = $id;
		if (!$this->JobType->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid job type'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->JobType->delete()) {
			$this->Session->setFlash(__d('croogo', 'Job type deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Job type was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
}

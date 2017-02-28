<?php
App::uses('PrideAppController', 'Pride.Controller');
/**
 * JobTaskAssignments Controller
 *
 * @property JobTaskAssignment $JobTaskAssignment
 * @property PaginatorComponent $Paginator
 */
class JobTaskAssignmentsController extends PrideAppController {

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
		$this->JobTaskAssignment->recursive = 0;
		$this->set('jobTaskAssignments', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->JobTaskAssignment->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid job task assignment'));
		}
		$options = array('conditions' => array('JobTaskAssignment.' . $this->JobTaskAssignment->primaryKey => $id));
		$this->set('jobTaskAssignment', $this->JobTaskAssignment->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->JobTaskAssignment->create();
			if ($this->JobTaskAssignment->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The job task assignment has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The job task assignment could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$jobs = $this->JobTaskAssignment->Job->find('list');
		$organizations = $this->JobTaskAssignment->Organization->find('list');
		$this->set(compact('jobs', 'organizations'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->JobTaskAssignment->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid job task assignment'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->JobTaskAssignment->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The job task assignment has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The job task assignment could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('JobTaskAssignment.' . $this->JobTaskAssignment->primaryKey => $id));
			$this->request->data = $this->JobTaskAssignment->find('first', $options);
		}
		$jobs = $this->JobTaskAssignment->Job->find('list');
		$organizations = $this->JobTaskAssignment->Organization->find('list');
		$this->set(compact('jobs', 'organizations'));
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
		$this->JobTaskAssignment->id = $id;
		if (!$this->JobTaskAssignment->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid job task assignment'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->JobTaskAssignment->delete()) {
			$this->Session->setFlash(__d('croogo', 'Job task assignment deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Job task assignment was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->JobTaskAssignment->recursive = 0;
		$this->set('jobTaskAssignments', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->JobTaskAssignment->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid job task assignment'));
		}
		$options = array('conditions' => array('JobTaskAssignment.' . $this->JobTaskAssignment->primaryKey => $id));
		$this->set('jobTaskAssignment', $this->JobTaskAssignment->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->JobTaskAssignment->create();
			if ($this->JobTaskAssignment->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The job task assignment has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The job task assignment could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$jobs = $this->JobTaskAssignment->Job->find('list');
		$organizations = $this->JobTaskAssignment->Organization->find('list');
		$this->set(compact('jobs', 'organizations'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->JobTaskAssignment->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid job task assignment'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->JobTaskAssignment->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The job task assignment has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The job task assignment could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('JobTaskAssignment.' . $this->JobTaskAssignment->primaryKey => $id));
			$this->request->data = $this->JobTaskAssignment->find('first', $options);
		}
		$jobs = $this->JobTaskAssignment->Job->find('list');
		$organizations = $this->JobTaskAssignment->Organization->find('list');
		$this->set(compact('jobs', 'organizations'));
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
		$this->JobTaskAssignment->id = $id;
		if (!$this->JobTaskAssignment->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid job task assignment'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->JobTaskAssignment->delete()) {
			$this->Session->setFlash(__d('croogo', 'Job task assignment deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Job task assignment was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
}

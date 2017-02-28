<?php
App::uses('PrideAppController', 'Pride.Controller');
/**
 * WorkOrders Controller
 *
 * @property WorkOrder $WorkOrder
 * @property PaginatorComponent $Paginator
 */
class WorkOrdersController extends PrideAppController {

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
		$this->WorkOrder->recursive = 0;
		$this->set('workOrders', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->WorkOrder->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid work order'));
		}
		$options = array('conditions' => array('WorkOrder.' . $this->WorkOrder->primaryKey => $id));
		$this->set('workOrder', $this->WorkOrder->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->WorkOrder->create();
			if ($this->WorkOrder->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The work order has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The work order could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$users = $this->WorkOrder->User->find('list');
		$provisionBuses = $this->WorkOrder->ProvisionBus->find('list');
		$processStates = $this->WorkOrder->ProcessState->find('list');
		$this->set(compact('users', 'provisionBuses', 'processStates'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->WorkOrder->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid work order'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->WorkOrder->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The work order has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The work order could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('WorkOrder.' . $this->WorkOrder->primaryKey => $id));
			$this->request->data = $this->WorkOrder->find('first', $options);
		}
		$users = $this->WorkOrder->User->find('list');
		$provisionBuses = $this->WorkOrder->ProvisionBus->find('list');
		$processStates = $this->WorkOrder->ProcessState->find('list');
		$this->set(compact('users', 'provisionBuses', 'processStates'));
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
		$this->WorkOrder->id = $id;
		if (!$this->WorkOrder->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid work order'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->WorkOrder->delete()) {
			$this->Session->setFlash(__d('croogo', 'Work order deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Work order was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function spad ($id = null) {
		//Remove layout for generating PDF report
		$this->autoLayout = false;
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->WorkOrder->recursive = 0;
		$this->set('workOrders', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->WorkOrder->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid work order'));
		}
		$options = array('conditions' => array('WorkOrder.' . $this->WorkOrder->primaryKey => $id));
		$this->set('workOrder', $this->WorkOrder->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->WorkOrder->create();
			if ($this->WorkOrder->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The work order has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The work order could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$users = $this->WorkOrder->User->find('list');
		$provisionBuses = $this->WorkOrder->ProvisionBus->find('list');
		$processStates = $this->WorkOrder->ProcessState->find('list');
		$this->set(compact('users', 'provisionBuses', 'processStates'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->WorkOrder->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid work order'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->WorkOrder->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The work order has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The work order could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('WorkOrder.' . $this->WorkOrder->primaryKey => $id));
			$this->request->data = $this->WorkOrder->find('first', $options);
		}
		$users = $this->WorkOrder->User->find('list');
		$provisionBuses = $this->WorkOrder->ProvisionBus->find('list');
		$processStates = $this->WorkOrder->ProcessState->find('list');
		$this->set(compact('users', 'provisionBuses', 'processStates'));
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
		$this->WorkOrder->id = $id;
		if (!$this->WorkOrder->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid work order'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->WorkOrder->delete()) {
			$this->Session->setFlash(__d('croogo', 'Work order deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Work order was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
}

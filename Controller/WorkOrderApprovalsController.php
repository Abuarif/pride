<?php
App::uses('PrideAppController', 'Pride.Controller');
/**
 * WorkOrderApprovals Controller
 *
 * @property WorkOrderApproval $WorkOrderApproval
 * @property PaginatorComponent $Paginator
 */
class WorkOrderApprovalsController extends PrideAppController {

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
		$this->WorkOrderApproval->recursive = 0;
		$this->set('workOrderApprovals', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->WorkOrderApproval->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid work order approval'));
		}
		$options = array('conditions' => array('WorkOrderApproval.' . $this->WorkOrderApproval->primaryKey => $id));
		$this->set('workOrderApproval', $this->WorkOrderApproval->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->WorkOrderApproval->create();
			if ($this->WorkOrderApproval->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The work order approval has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The work order approval could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$workOrders = $this->WorkOrderApproval->WorkOrder->find('list');
		$users = $this->WorkOrderApproval->User->find('list');
		$processStates = $this->WorkOrderApproval->ProcessState->find('list');
		$approvalLevels = $this->WorkOrderApproval->ApprovalLevel->find('list');
		$this->set(compact('workOrders', 'users', 'processStates', 'approvalLevels'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->WorkOrderApproval->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid work order approval'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->WorkOrderApproval->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The work order approval has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The work order approval could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('WorkOrderApproval.' . $this->WorkOrderApproval->primaryKey => $id));
			$this->request->data = $this->WorkOrderApproval->find('first', $options);
		}
		$workOrders = $this->WorkOrderApproval->WorkOrder->find('list');
		$users = $this->WorkOrderApproval->User->find('list');
		$processStates = $this->WorkOrderApproval->ProcessState->find('list');
		$approvalLevels = $this->WorkOrderApproval->ApprovalLevel->find('list');
		$this->set(compact('workOrders', 'users', 'processStates', 'approvalLevels'));
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
		$this->WorkOrderApproval->id = $id;
		if (!$this->WorkOrderApproval->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid work order approval'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->WorkOrderApproval->delete()) {
			$this->Session->setFlash(__d('croogo', 'Work order approval deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Work order approval was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->WorkOrderApproval->recursive = 0;
		$this->set('workOrderApprovals', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->WorkOrderApproval->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid work order approval'));
		}
		$options = array('conditions' => array('WorkOrderApproval.' . $this->WorkOrderApproval->primaryKey => $id));
		$this->set('workOrderApproval', $this->WorkOrderApproval->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->WorkOrderApproval->create();
			if ($this->WorkOrderApproval->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The work order approval has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The work order approval could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$workOrders = $this->WorkOrderApproval->WorkOrder->find('list');
		$users = $this->WorkOrderApproval->User->find('list');
		$processStates = $this->WorkOrderApproval->ProcessState->find('list');
		$approvalLevels = $this->WorkOrderApproval->ApprovalLevel->find('list');
		$this->set(compact('workOrders', 'users', 'processStates', 'approvalLevels'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->WorkOrderApproval->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid work order approval'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->WorkOrderApproval->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The work order approval has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The work order approval could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('WorkOrderApproval.' . $this->WorkOrderApproval->primaryKey => $id));
			$this->request->data = $this->WorkOrderApproval->find('first', $options);
		}
		$workOrders = $this->WorkOrderApproval->WorkOrder->find('list');
		$users = $this->WorkOrderApproval->User->find('list');
		$processStates = $this->WorkOrderApproval->ProcessState->find('list');
		$approvalLevels = $this->WorkOrderApproval->ApprovalLevel->find('list');
		$this->set(compact('workOrders', 'users', 'processStates', 'approvalLevels'));
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
		$this->WorkOrderApproval->id = $id;
		if (!$this->WorkOrderApproval->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid work order approval'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->WorkOrderApproval->delete()) {
			$this->Session->setFlash(__d('croogo', 'Work order approval deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Work order approval was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
}

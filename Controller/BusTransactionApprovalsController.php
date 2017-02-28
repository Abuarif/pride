<?php
App::uses('PrideAppController', 'Pride.Controller');
/**
 * BusTransactionApprovals Controller
 *
 * @property BusTransactionApproval $BusTransactionApproval
 * @property PaginatorComponent $Paginator
 */
class BusTransactionApprovalsController extends PrideAppController {

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
		$this->BusTransactionApproval->recursive = 0;
		$this->set('busTransactionApprovals', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->BusTransactionApproval->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid bus transaction approval'));
		}
		$options = array('conditions' => array('BusTransactionApproval.' . $this->BusTransactionApproval->primaryKey => $id));
		$this->set('busTransactionApproval', $this->BusTransactionApproval->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->BusTransactionApproval->create();
			if ($this->BusTransactionApproval->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The bus transaction approval has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The bus transaction approval could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$busTransactions = $this->BusTransactionApproval->BusTransaction->find('list');
		$users = $this->BusTransactionApproval->User->find('list');
		$processStates = $this->BusTransactionApproval->ProcessState->find('list');
		$approvalLevels = $this->BusTransactionApproval->ApprovalLevel->find('list');
		$this->set(compact('busTransactions', 'users', 'processStates', 'approvalLevels'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->BusTransactionApproval->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid bus transaction approval'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->BusTransactionApproval->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The bus transaction approval has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The bus transaction approval could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('BusTransactionApproval.' . $this->BusTransactionApproval->primaryKey => $id));
			$this->request->data = $this->BusTransactionApproval->find('first', $options);
		}
		$busTransactions = $this->BusTransactionApproval->BusTransaction->find('list');
		$users = $this->BusTransactionApproval->User->find('list');
		$processStates = $this->BusTransactionApproval->ProcessState->find('list');
		$approvalLevels = $this->BusTransactionApproval->ApprovalLevel->find('list');
		$this->set(compact('busTransactions', 'users', 'processStates', 'approvalLevels'));
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
		$this->BusTransactionApproval->id = $id;
		if (!$this->BusTransactionApproval->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid bus transaction approval'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->BusTransactionApproval->delete()) {
			$this->Session->setFlash(__d('croogo', 'Bus transaction approval deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Bus transaction approval was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->BusTransactionApproval->recursive = 0;
		$this->set('busTransactionApprovals', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->BusTransactionApproval->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid bus transaction approval'));
		}
		$options = array('conditions' => array('BusTransactionApproval.' . $this->BusTransactionApproval->primaryKey => $id));
		$this->set('busTransactionApproval', $this->BusTransactionApproval->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->BusTransactionApproval->create();
			if ($this->BusTransactionApproval->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The bus transaction approval has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The bus transaction approval could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$busTransactions = $this->BusTransactionApproval->BusTransaction->find('list');
		$users = $this->BusTransactionApproval->User->find('list');
		$processStates = $this->BusTransactionApproval->ProcessState->find('list');
		$approvalLevels = $this->BusTransactionApproval->ApprovalLevel->find('list');
		$this->set(compact('busTransactions', 'users', 'processStates', 'approvalLevels'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->BusTransactionApproval->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid bus transaction approval'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->BusTransactionApproval->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The bus transaction approval has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The bus transaction approval could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('BusTransactionApproval.' . $this->BusTransactionApproval->primaryKey => $id));
			$this->request->data = $this->BusTransactionApproval->find('first', $options);
		}
		$busTransactions = $this->BusTransactionApproval->BusTransaction->find('list');
		$users = $this->BusTransactionApproval->User->find('list');
		$processStates = $this->BusTransactionApproval->ProcessState->find('list');
		$approvalLevels = $this->BusTransactionApproval->ApprovalLevel->find('list');
		$this->set(compact('busTransactions', 'users', 'processStates', 'approvalLevels'));
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
		$this->BusTransactionApproval->id = $id;
		if (!$this->BusTransactionApproval->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid bus transaction approval'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->BusTransactionApproval->delete()) {
			$this->Session->setFlash(__d('croogo', 'Bus transaction approval deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Bus transaction approval was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
}

<?php
App::uses('PrideAppController', 'Pride.Controller');
/**
 * Approvals Controller
 *
 * @property Approval $Approval
 * @property PaginatorComponent $Paginator
 */
class ApprovalsController extends PrideAppController {

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
		$this->Approval->recursive = 0;
		$this->set('approvals', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Approval->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid approval'));
		}
		$options = array('conditions' => array('Approval.' . $this->Approval->primaryKey => $id));
		$this->set('approval', $this->Approval->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Approval->create();
			if ($this->Approval->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The approval has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The approval could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$users = $this->Approval->User->find('list');
		$objectReferences = $this->Approval->ObjectReference->find('list');
		$processStates = $this->Approval->ProcessState->find('list');
		$this->set(compact('users', 'objectReferences', 'processStates'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Approval->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid approval'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Approval->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The approval has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The approval could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Approval.' . $this->Approval->primaryKey => $id));
			$this->request->data = $this->Approval->find('first', $options);
		}
		$users = $this->Approval->User->find('list');
		$objectReferences = $this->Approval->ObjectReference->find('list');
		$processStates = $this->Approval->ProcessState->find('list');
		$this->set(compact('users', 'objectReferences', 'processStates'));
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
		$this->Approval->id = $id;
		if (!$this->Approval->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid approval'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Approval->delete()) {
			$this->Session->setFlash(__d('croogo', 'Approval deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Approval was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Approval->recursive = 0;
		$this->set('approvals', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Approval->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid approval'));
		}
		$options = array('conditions' => array('Approval.' . $this->Approval->primaryKey => $id));
		$this->set('approval', $this->Approval->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Approval->create();
			if ($this->Approval->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The approval has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The approval could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$users = $this->Approval->User->find('list');
		$objectReferences = $this->Approval->ObjectReference->find('list');
		$processStates = $this->Approval->ProcessState->find('list');
		$this->set(compact('users', 'objectReferences', 'processStates'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Approval->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid approval'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Approval->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The approval has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The approval could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Approval.' . $this->Approval->primaryKey => $id));
			$this->request->data = $this->Approval->find('first', $options);
		}
		$users = $this->Approval->User->find('list');
		$objectReferences = $this->Approval->ObjectReference->find('list');
		$processStates = $this->Approval->ProcessState->find('list');
		$this->set(compact('users', 'objectReferences', 'processStates'));
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
		$this->Approval->id = $id;
		if (!$this->Approval->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid approval'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Approval->delete()) {
			$this->Session->setFlash(__d('croogo', 'Approval deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Approval was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
}

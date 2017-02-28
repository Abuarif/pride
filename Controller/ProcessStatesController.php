<?php
App::uses('PrideAppController', 'Pride.Controller');
/**
 * ProcessStates Controller
 *
 * @property ProcessState $ProcessState
 * @property PaginatorComponent $Paginator
 */
class ProcessStatesController extends PrideAppController {

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
		$this->ProcessState->recursive = 0;
		$this->set('processStates', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ProcessState->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid process state'));
		}
		$options = array('conditions' => array('ProcessState.' . $this->ProcessState->primaryKey => $id));
		$this->set('processState', $this->ProcessState->find('first', $options));
	}
	
	public function getProcessState($id = null) {
		if (!$this->ProcessState->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid process state'));
		}
		$options = array('conditions' => array('ProcessState.' . $this->ProcessState->primaryKey => $id));
		
		return	$this->ProcessState->find('first', $options);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ProcessState->create();
			if ($this->ProcessState->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The process state has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The process state could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$roles = $this->ProcessState->Role->find('list');
		$this->set(compact('roles'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ProcessState->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid process state'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ProcessState->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The process state has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The process state could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('ProcessState.' . $this->ProcessState->primaryKey => $id));
			$this->request->data = $this->ProcessState->find('first', $options);
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
		$this->ProcessState->id = $id;
		if (!$this->ProcessState->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid process state'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ProcessState->delete()) {
			$this->Session->setFlash(__d('croogo', 'Process state deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Process state was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->ProcessState->recursive = 0;
		$this->set('processStates', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->ProcessState->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid process state'));
		}
		$options = array('conditions' => array('ProcessState.' . $this->ProcessState->primaryKey => $id));
		$this->set('processState', $this->ProcessState->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->ProcessState->create();
			if ($this->ProcessState->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The process state has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The process state could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$roles = $this->ProcessState->Role->find('list');
		$this->set(compact('roles'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->ProcessState->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid process state'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ProcessState->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The process state has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The process state could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('ProcessState.' . $this->ProcessState->primaryKey => $id));
			$this->request->data = $this->ProcessState->find('first', $options);
		}
		$roles = $this->ProcessState->Role->find('list');
		$this->set(compact('roles'));
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
		$this->ProcessState->id = $id;
		if (!$this->ProcessState->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid process state'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ProcessState->delete()) {
			$this->Session->setFlash(__d('croogo', 'Process state deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Process state was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
}

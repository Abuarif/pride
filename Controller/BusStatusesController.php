<?php
App::uses('PrideAppController', 'Pride.Controller');
/**
 * BusStatuses Controller
 *
 * @property BusStatus $BusStatus
 * @property PaginatorComponent $Paginator
 */
class BusStatusesController extends PrideAppController {

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
		$this->BusStatus->recursive = 0;
		$this->set('busStatuses', $this->paginate());
	}



/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->BusStatus->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid bus status'));
		}
		$options = array('conditions' => array('BusStatus.' . $this->BusStatus->primaryKey => $id));
		$this->set('busStatus', $this->BusStatus->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->BusStatus->create();
			if ($this->BusStatus->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The bus status has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The bus status could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$roles = $this->BusStatus->Role->find('list');
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
		if (!$this->BusStatus->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid bus status'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->BusStatus->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The bus status has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The bus status could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('BusStatus.' . $this->BusStatus->primaryKey => $id));
			$this->request->data = $this->BusStatus->find('first', $options);
		}
		$roles = $this->BusStatus->Role->find('list');
		$this->set(compact('roles'));
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
		$this->BusStatus->id = $id;
		if (!$this->BusStatus->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid bus status'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->BusStatus->delete()) {
			$this->Session->setFlash(__d('croogo', 'Bus status deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Bus status was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->BusStatus->recursive = 0;
		$this->set('busStatuses', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->BusStatus->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid bus status'));
		}
		$options = array('conditions' => array('BusStatus.' . $this->BusStatus->primaryKey => $id));
		$this->set('busStatus', $this->BusStatus->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->BusStatus->create();
			if ($this->BusStatus->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The bus status has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The bus status could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$roles = $this->BusStatus->Role->find('list');
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
		if (!$this->BusStatus->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid bus status'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->BusStatus->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The bus status has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The bus status could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('BusStatus.' . $this->BusStatus->primaryKey => $id));
			$this->request->data = $this->BusStatus->find('first', $options);
		}
		$roles = $this->BusStatus->Role->find('list');
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
		$this->BusStatus->id = $id;
		if (!$this->BusStatus->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid bus status'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->BusStatus->delete()) {
			$this->Session->setFlash(__d('croogo', 'Bus status deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Bus status was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
}

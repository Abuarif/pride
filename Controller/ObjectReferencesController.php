<?php
App::uses('PrideAppController', 'Pride.Controller');
/**
 * ObjectReferences Controller
 *
 * @property ObjectReference $ObjectReference
 * @property PaginatorComponent $Paginator
 */
class ObjectReferencesController extends PrideAppController {

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
		$this->ObjectReference->recursive = 0;
		$this->set('objectReferences', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ObjectReference->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid object reference'));
		}
		$options = array('conditions' => array('ObjectReference.' . $this->ObjectReference->primaryKey => $id));
		$this->set('objectReference', $this->ObjectReference->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ObjectReference->create();
			if ($this->ObjectReference->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The object reference has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The object reference could not be saved. Please, try again.'), 'default', array('class' => 'error'));
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
		if (!$this->ObjectReference->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid object reference'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ObjectReference->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The object reference has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The object reference could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('ObjectReference.' . $this->ObjectReference->primaryKey => $id));
			$this->request->data = $this->ObjectReference->find('first', $options);
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
		$this->ObjectReference->id = $id;
		if (!$this->ObjectReference->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid object reference'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ObjectReference->delete()) {
			$this->Session->setFlash(__d('croogo', 'Object reference deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Object reference was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->ObjectReference->recursive = 0;
		$this->set('objectReferences', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->ObjectReference->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid object reference'));
		}
		$options = array('conditions' => array('ObjectReference.' . $this->ObjectReference->primaryKey => $id));
		$this->set('objectReference', $this->ObjectReference->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->ObjectReference->create();
			if ($this->ObjectReference->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The object reference has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The object reference could not be saved. Please, try again.'), 'default', array('class' => 'error'));
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
		if (!$this->ObjectReference->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid object reference'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ObjectReference->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The object reference has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The object reference could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('ObjectReference.' . $this->ObjectReference->primaryKey => $id));
			$this->request->data = $this->ObjectReference->find('first', $options);
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
		$this->ObjectReference->id = $id;
		if (!$this->ObjectReference->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid object reference'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ObjectReference->delete()) {
			$this->Session->setFlash(__d('croogo', 'Object reference deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Object reference was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
}

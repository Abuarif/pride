<?php
App::uses('PrideAppController', 'Pride.Controller');
/**
 * OrganizationKeyPersonnels Controller
 *
 * @property OrganizationKeyPersonnel $OrganizationKeyPersonnel
 * @property PaginatorComponent $Paginator
 */
class OrganizationKeyPersonnelsController extends PrideAppController {

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
		$this->OrganizationKeyPersonnel->recursive = 0;
		$this->set('organizationKeyPersonnels', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->OrganizationKeyPersonnel->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid organization key personnel'));
		}
		$options = array('conditions' => array('OrganizationKeyPersonnel.' . $this->OrganizationKeyPersonnel->primaryKey => $id));
		$this->set('organizationKeyPersonnel', $this->OrganizationKeyPersonnel->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->OrganizationKeyPersonnel->create();
			$this->request->data['OrganizationKeyPersonnel']['organization_id'] = $this->Session->read('Auth.User.organization_id');
			if ($this->OrganizationKeyPersonnel->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The organization key personnel has been saved'), 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('plugin' => 'pride', 'controller' => 'organizations', 'action' => 'declare_keypersonnel', $this->Session->read('Auth.User.organization_id')));
			} else {
				$this->Session->setFlash(__d('croogo', 'The organization key personnel could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$organizations = $this->OrganizationKeyPersonnel->Organization->find('list');
		$this->set(compact('organizations'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->OrganizationKeyPersonnel->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid organization key personnel'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->OrganizationKeyPersonnel->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The organization key personnel has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The organization key personnel could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('OrganizationKeyPersonnel.' . $this->OrganizationKeyPersonnel->primaryKey => $id));
			$this->request->data = $this->OrganizationKeyPersonnel->find('first', $options);
		}
		$organizations = $this->OrganizationKeyPersonnel->Organization->find('list');
		$this->set(compact('organizations'));
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
		$this->OrganizationKeyPersonnel->id = $id;
		if (!$this->OrganizationKeyPersonnel->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid organization key personnel'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->OrganizationKeyPersonnel->delete()) {
			$this->Session->setFlash(__d('croogo', 'Organization key personnel deleted'), 'default', array('class' => 'alert alert-success'));
			$this->redirect(array('plugin' => 'pride', 'controller' => 'organizations', 'action' => 'declare_keypersonnel', $this->Session->read('Auth.User.organization_id')));
		}
		$this->Session->setFlash(__d('croogo', 'Organization key personnel was not deleted'), 'default', array('class' => 'alert alert-danger'));
		$this->redirect(array('action' => 'index'));
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->OrganizationKeyPersonnel->recursive = 0;
		$this->set('organizationKeyPersonnels', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->OrganizationKeyPersonnel->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid organization key personnel'));
		}
		$options = array('conditions' => array('OrganizationKeyPersonnel.' . $this->OrganizationKeyPersonnel->primaryKey => $id));
		$this->set('organizationKeyPersonnel', $this->OrganizationKeyPersonnel->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->OrganizationKeyPersonnel->create();
			if ($this->OrganizationKeyPersonnel->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The organization key personnel has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The organization key personnel could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$organizations = $this->OrganizationKeyPersonnel->Organization->find('list');
		$this->set(compact('organizations'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->OrganizationKeyPersonnel->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid organization key personnel'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->OrganizationKeyPersonnel->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The organization key personnel has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The organization key personnel could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('OrganizationKeyPersonnel.' . $this->OrganizationKeyPersonnel->primaryKey => $id));
			$this->request->data = $this->OrganizationKeyPersonnel->find('first', $options);
		}
		$organizations = $this->OrganizationKeyPersonnel->Organization->find('list');
		$this->set(compact('organizations'));
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
		$this->OrganizationKeyPersonnel->id = $id;
		if (!$this->OrganizationKeyPersonnel->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid organization key personnel'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->OrganizationKeyPersonnel->delete()) {
			$this->Session->setFlash(__d('croogo', 'Organization key personnel deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Organization key personnel was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
}

<?php
App::uses('PrideAppController', 'Pride.Controller');
/**
 * OrganizationUnits Controller
 *
 * @property OrganizationUnit $OrganizationUnit
 * @property PaginatorComponent $Paginator
 */
class OrganizationUnitsController extends PrideAppController {

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
		$this->OrganizationUnit->recursive = 0;
		$this->set('organizationUnits', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->OrganizationUnit->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid organization unit'));
		}
		$options = array('conditions' => array('OrganizationUnit.' . $this->OrganizationUnit->primaryKey => $id));
		$this->set('organizationUnit', $this->OrganizationUnit->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->OrganizationUnit->create();
			if ($this->OrganizationUnit->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The organization unit has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The organization unit could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$parentOrganizationUnits = $this->OrganizationUnit->ParentOrganizationUnit->find('list');
		$organizations = $this->OrganizationUnit->Organization->find('list');
		$organizationUnitTypes = $this->OrganizationUnit->OrganizationUnitType->find('list');
		$this->set(compact('parentOrganizationUnits', 'organizations', 'organizationUnitTypes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->OrganizationUnit->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid organization unit'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->OrganizationUnit->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The organization unit has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The organization unit could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('OrganizationUnit.' . $this->OrganizationUnit->primaryKey => $id));
			$this->request->data = $this->OrganizationUnit->find('first', $options);
		}
		$parentOrganizationUnits = $this->OrganizationUnit->ParentOrganizationUnit->find('list');
		$organizations = $this->OrganizationUnit->Organization->find('list');
		$organizationUnitTypes = $this->OrganizationUnit->OrganizationUnitType->find('list');
		$this->set(compact('parentOrganizationUnits', 'organizations', 'organizationUnitTypes'));
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
		$this->OrganizationUnit->id = $id;
		if (!$this->OrganizationUnit->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid organization unit'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->OrganizationUnit->delete()) {
			$this->Session->setFlash(__d('croogo', 'Organization unit deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Organization unit was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->OrganizationUnit->recursive = 0;
		$this->set('organizationUnits', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->OrganizationUnit->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid organization unit'));
		}
		$options = array('conditions' => array('OrganizationUnit.' . $this->OrganizationUnit->primaryKey => $id));
		$this->set('organizationUnit', $this->OrganizationUnit->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->OrganizationUnit->create();
			if ($this->OrganizationUnit->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The organization unit has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The organization unit could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$parentOrganizationUnits = $this->OrganizationUnit->ParentOrganizationUnit->find('list');
		$organizations = $this->OrganizationUnit->Organization->find('list');
		$organizationUnitTypes = $this->OrganizationUnit->OrganizationUnitType->find('list');
		$this->set(compact('parentOrganizationUnits', 'organizations', 'organizationUnitTypes'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->OrganizationUnit->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid organization unit'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->OrganizationUnit->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The organization unit has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The organization unit could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('OrganizationUnit.' . $this->OrganizationUnit->primaryKey => $id));
			$this->request->data = $this->OrganizationUnit->find('first', $options);
		}
		$parentOrganizationUnits = $this->OrganizationUnit->ParentOrganizationUnit->find('list');
		$organizations = $this->OrganizationUnit->Organization->find('list');
		$organizationUnitTypes = $this->OrganizationUnit->OrganizationUnitType->find('list');
		$this->set(compact('parentOrganizationUnits', 'organizations', 'organizationUnitTypes'));
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
		$this->OrganizationUnit->id = $id;
		if (!$this->OrganizationUnit->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid organization unit'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->OrganizationUnit->delete()) {
			$this->Session->setFlash(__d('croogo', 'Organization unit deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Organization unit was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
}

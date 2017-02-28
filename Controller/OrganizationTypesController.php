<?php
App::uses('PrideAppController', 'Pride.Controller');
/**
 * OrganizationTypes Controller
 *
 * @property OrganizationType $OrganizationType
 * @property PaginatorComponent $Paginator
 */
class OrganizationTypesController extends PrideAppController {

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
		$this->OrganizationType->recursive = 0;
		$this->set('organizationTypes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->OrganizationType->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid organization type'));
		}
		$options = array('conditions' => array('OrganizationType.' . $this->OrganizationType->primaryKey => $id));
		$this->set('organizationType', $this->OrganizationType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->OrganizationType->create();
			if ($this->OrganizationType->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The organization type has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The organization type could not be saved. Please, try again.'), 'default', array('class' => 'error'));
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
		if (!$this->OrganizationType->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid organization type'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->OrganizationType->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The organization type has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The organization type could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('OrganizationType.' . $this->OrganizationType->primaryKey => $id));
			$this->request->data = $this->OrganizationType->find('first', $options);
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
		$this->OrganizationType->id = $id;
		if (!$this->OrganizationType->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid organization type'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->OrganizationType->delete()) {
			$this->Session->setFlash(__d('croogo', 'Organization type deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Organization type was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->OrganizationType->recursive = 0;
		$this->set('organizationTypes', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->OrganizationType->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid organization type'));
		}
		$options = array('conditions' => array('OrganizationType.' . $this->OrganizationType->primaryKey => $id));
		$this->set('organizationType', $this->OrganizationType->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->OrganizationType->create();
			if ($this->OrganizationType->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The organization type has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The organization type could not be saved. Please, try again.'), 'default', array('class' => 'error'));
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
		if (!$this->OrganizationType->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid organization type'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->OrganizationType->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The organization type has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The organization type could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('OrganizationType.' . $this->OrganizationType->primaryKey => $id));
			$this->request->data = $this->OrganizationType->find('first', $options);
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
		$this->OrganizationType->id = $id;
		if (!$this->OrganizationType->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid organization type'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->OrganizationType->delete()) {
			$this->Session->setFlash(__d('croogo', 'Organization type deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Organization type was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function get_organization_type($id = null) {
		if (!$this->OrganizationType->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid organization type'));
		}
		$options = array('conditions' => array('OrganizationType.' . $this->OrganizationType->primaryKey => $id));
		return $this->OrganizationType->find('first', $options);
	}
}

<?php
App::uses('PrideAppController', 'Pride.Controller');
App::uses('ReservationsController', 'Pride.Controller');
/**
 * Packages Controller
 *
 * @property Package $Package
 * @property PaginatorComponent $Paginator
 */
class PackagesController extends PrideAppController {

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
		$this->Package->recursive = 0;
		$this->set('packages', $this->paginate());
	}

	public function selection($campaign_id = null, $job_id = null) {
		$this->Package->recursive = 0;
		$filter = array('conditions' => array('Package.status' => true));
		$this->set('packages', $this->Package->find('all', $filter));
	}

	public function promotion() {
		$this->Package->recursive = 0;
		$filter = array('conditions' => array('Package.status' => true));
		$this->set('packages', $this->Package->find('all', $filter));
		
		$reservation = new ReservationsController;
		
		$myReservation = $reservation->getLastReservation();
		
		$this->set(compact('myReservation'));
		
		if (empty($myReservation)) { // new resource reservation redirect to create reservation
			//$this->Session->setFlash(__d('croogo', 'Please create a fresh resource reservation before  booking any product packages. <br/>You are not allowed to add more resources in the approved resource reservation. <br/>Thank you'), 'default', array('class' => 'alert alert-danger'));
			//$this->redirect(array('controller' => 'reservations', 'action' => 'add'));
		}
	}
	
	

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Package->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid package'));
		}
		$options = array('conditions' => array('Package.' . $this->Package->primaryKey => $id));
		$this->set('package', $this->Package->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post') || $this->request->is('put')) {
			$this->Package->create();
			if ($this->Package->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The package has been saved'), 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The package could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$itemTypes = $this->Package->ItemType->find('list');
			$this->set(compact('itemTypes'));
			
			$filter = array('conditions' => array('Organization.organization_type_id' => 6));
			//Find business owner
			$organizations = $this->Package->Organization->find('list', $filter);
			$this->set(compact('organizations'));
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
		if (!$this->Package->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid package'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Package->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The package has been updated'), 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The package could not be updated. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Package.' . $this->Package->primaryKey => $id));
			$this->request->data = $this->Package->find('first', $options);
			
			$itemTypes = $this->Package->ItemType->find('list');
			$this->set(compact('itemTypes'));
			
			$filter = array('conditions' => array('Organization.organization_type_id' => 6));
			//Find business owner
			$organizations = $this->Package->Organization->find('list', $filter);
			$this->set(compact('organizations'));
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
		$this->Package->id = $id;
		if (!$this->Package->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid package'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Package->delete()) {
			$this->Session->setFlash(__d('croogo', 'Package was successfully deleted'), 'default', array('class' => 'alert alert-success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Package was not deleted'), 'default', array('class' => 'alert alert-danger'));
		$this->redirect(array('action' => 'index'));
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Package->recursive = 0;
		$this->set('packages', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Package->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid package'));
		}
		$options = array('conditions' => array('Package.' . $this->Package->primaryKey => $id));
		$this->set('package', $this->Package->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Package->create();
			if ($this->Package->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The package has been saved'), 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The package could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$itemTypes = $this->Package->ItemType->find('list');
		$this->set(compact('itemTypes'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Package->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid package'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Package->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The package has been saved'), 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The package could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Package.' . $this->Package->primaryKey => $id));
			$this->request->data = $this->Package->find('first', $options);
		}
		$itemTypes = $this->Package->ItemType->find('list');
		$this->set(compact('itemTypes'));
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
		$this->Package->id = $id;
		if (!$this->Package->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid package'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Package->delete()) {
			$this->Session->setFlash(__d('croogo', 'Package deleted'), 'default', array('class' => 'alert alert-success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Package was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function get_package($id = null) {
	
		$options = array('conditions' => array('Package.' . $this->Package->primaryKey => $id));
	
		return $this->Package->find('first', $options);
	}
}

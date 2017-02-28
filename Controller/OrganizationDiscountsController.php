<?php
App::uses('PrideAppController', 'Pride.Controller');
App::uses('CakeTime', 'Utility');
/**
 * OrganizationDiscounts Controller
 *
 * @property OrganizationDiscount $OrganizationDiscount
 * @property PaginatorComponent $Paginator
 */
class OrganizationDiscountsController extends PrideAppController {

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
		$this->OrganizationDiscount->recursive = 0;
		$this->set('organizationDiscounts', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->OrganizationDiscount->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid organization discount'));
		}
		$options = array('conditions' => array('OrganizationDiscount.' . $this->OrganizationDiscount->primaryKey => $id));
		$this->set('organizationDiscount', $this->OrganizationDiscount->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
 
	public function split_date($input) {
		$arr = explode("/", $input);
	   
		//Display the Start Date array format
		return array(
			 "day" => $arr[0], 
			 "month" => $arr[1], 
			 "year" => $arr[2]
		);
	}
	
	public function add() {
		if ($this->request->is('post')) {
			// suhaimi - append balik
			$this->request->data['OrganizationDiscount']['validity_start_date'] = $this->split_date($this->request->data['OrganizationDiscount']['validity_start_date']);
			$this->request->data['OrganizationDiscount']['validity_end_date'] = $this->split_date($this->request->data['OrganizationDiscount']['validity_end_date']);
		
			$this->OrganizationDiscount->create();
			if ($this->OrganizationDiscount->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The organization discount has been saved'), 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('plugin' => 'pride', 'controller' => 'organizations', 'action' => 'approval_preview', $this->request->data['OrganizationDiscount']['organization_id']));
			} else {
				$this->Session->setFlash(__d('croogo', 'The organization discount could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		/* $users = $this->OrganizationDiscount->User->find('list');
		$organizations = $this->OrganizationDiscount->Organization->find('list');
		$this->set(compact('users', 'organizations')); */
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->OrganizationDiscount->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid organization discount'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			// suhaimi - append balik
			$this->request->data['OrganizationDiscount']['validity_start_date'] = $this->split_date($this->request->data['OrganizationDiscount']['validity_start_date']);
			$this->request->data['OrganizationDiscount']['validity_end_date'] = $this->split_date($this->request->data['OrganizationDiscount']['validity_end_date']);
		
			if ($this->OrganizationDiscount->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The organization discount has been updated'), 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('plugin' => 'pride', 'controller' => 'organizations', 'action' => 'approval_preview', $this->request->data['OrganizationDiscount']['organization_id']));
				//$this->redirect($this->request->referer());
			} else {
				$this->Session->setFlash(__d('croogo', 'The organization discount could not be updated. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('OrganizationDiscount.' . $this->OrganizationDiscount->primaryKey => $id));
			$this->request->data = $this->OrganizationDiscount->find('first', $options);
			$this->request->data['OrganizationDiscount']['validity_start_date'] = CakeTime::format($this->request->data['OrganizationDiscount']['validity_start_date'], '%d/%m/%Y');
			$this->request->data['OrganizationDiscount']['validity_end_date'] = CakeTime::format($this->request->data['OrganizationDiscount']['validity_end_date'], '%d/%m/%Y');
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
	public function delete($id = null, $org_id = null) {
		$this->OrganizationDiscount->id = $id;
		if (!$this->OrganizationDiscount->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid organization discount'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->OrganizationDiscount->delete()) {
			$this->Session->setFlash(__d('croogo', 'Organization discount deleted'), 'default', array('class' => 'alert alert-success'));
			$this->redirect(array('plugin' => 'pride', 'controller' => 'organizations', 'action' => 'approval_preview', $org_id));
			//$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Organization discount was not deleted'), 'default', array('class' => 'alert alert-danger'));
		$this->redirect(array('action' => 'index'));
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->OrganizationDiscount->recursive = 0;
		$this->set('organizationDiscounts', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->OrganizationDiscount->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid organization discount'));
		}
		$options = array('conditions' => array('OrganizationDiscount.' . $this->OrganizationDiscount->primaryKey => $id));
		$this->set('organizationDiscount', $this->OrganizationDiscount->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->OrganizationDiscount->create();
			if ($this->OrganizationDiscount->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The organization discount has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The organization discount could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$users = $this->OrganizationDiscount->User->find('list');
		$organizations = $this->OrganizationDiscount->Organization->find('list');
		$this->set(compact('users', 'organizations'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->OrganizationDiscount->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid organization discount'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->OrganizationDiscount->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The organization discount has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The organization discount could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('OrganizationDiscount.' . $this->OrganizationDiscount->primaryKey => $id));
			$this->request->data = $this->OrganizationDiscount->find('first', $options);
		}
		$users = $this->OrganizationDiscount->User->find('list');
		$organizations = $this->OrganizationDiscount->Organization->find('list');
		$this->set(compact('users', 'organizations'));
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
		$this->OrganizationDiscount->id = $id;
		if (!$this->OrganizationDiscount->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid organization discount'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->OrganizationDiscount->delete()) {
			$this->Session->setFlash(__d('croogo', 'Organization discount deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Organization discount was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
}

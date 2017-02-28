<?php
App::uses('PrideAppController', 'Pride.Controller');
App::uses('NumberHelper', 'View/Helper');
/**
 * OrganizationShareholders Controller
 *
 * @property OrganizationShareholder $OrganizationShareholder
 * @property PaginatorComponent $Paginator
 */
class OrganizationShareholdersController extends PrideAppController {

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
		$this->OrganizationShareholder->recursive = 0;
		$this->set('organizationShareholders', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->OrganizationShareholder->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid organization shareholder'));
		}
		$options = array('conditions' => array('OrganizationShareholder.' . $this->OrganizationShareholder->primaryKey => $id));
		$this->set('organizationShareholder', $this->OrganizationShareholder->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */

	public function cleanData($a) {
		$a = str_replace(',', '', $a);
		return $a;

	}
	
	public function add() {
		if ($this->request->is('post')) {
		
			if ($this->request->data['OrganizationShareholder']['shareholding'] <= $this->request->data['OrganizationShareholder']['balance']) { // exceed balanced on the allocated shares
				$this->request->data['OrganizationShareholder']['organization_id'] = $this->Session->read('Auth.User.organization_id');
				$this->OrganizationShareholder->create();
				
				if ($this->OrganizationShareholder->save($this->request->data)) {
					$this->Session->setFlash(__d('croogo', 'The organization shareholder has been saved'), 'default', array('class' => 'alert alert-success'));
					$this->redirect(array('plugin' => 'pride', 'controller' => 'organizations', 'action' => 'declare_shareholder', $this->Session->read('Auth.User.organization_id')));
				} else {
					$this->Session->setFlash(__d('croogo', 'The organization shareholder could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
				}
			} else {
				$this->Session->setFlash(__d('croogo', 'The total allocate shares are more than the paid-up capital. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		// sum allotted share and find balance paid-up capital
		$options = array('conditions' => array(
						'OrganizationShareholder.organization_id' => $this->Session->read('Auth.User.organization_id'),
						//'fields' => array('id', 'shareholding')
					));
		$shares = $this->OrganizationShareholder->find('all', $options);
		$totalShare = 0;
		if (!empty($shares)) {
			foreach($shares as $share) {
				$totalShare += $share['OrganizationShareholder']['shareholding']; 
			}
			$balance = $this->Session->read('Auth.User.Organization.paid_capital') - $totalShare;
		} else {
			$balance = $this->Session->read('Auth.User.Organization.paid_capital');
		}
		
		// redirect to shareholder is balance is already zero
		if ($balance == 0) {
			$number = new NumberHelper(new View());
			
			$this->Session->setFlash(__d('croogo', 'The organization shares ('.$number->currency($this->Session->read('Auth.User.Organization.paid_capital'), 'RM').') has been exhausted. Please review your allotment of shares. '), 'default', array('class' => 'alert alert-warning'));
			$this->redirect(array('plugin' => 'pride', 'controller' => 'organizations', 'action' => 'declare_shareholder', $this->Session->read('Auth.User.organization_id')));
		}
		
		$this->set(compact('balance', 'shares'));
		
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->OrganizationShareholder->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid organization shareholder'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->OrganizationShareholder->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The organization shareholder has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The organization shareholder could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('OrganizationShareholder.' . $this->OrganizationShareholder->primaryKey => $id));
			$this->request->data = $this->OrganizationShareholder->find('first', $options);
		}
		$organizations = $this->OrganizationShareholder->Organization->find('list');
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
		$this->OrganizationShareholder->id = $id;
		if (!$this->OrganizationShareholder->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid organization shareholder'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->OrganizationShareholder->delete()) {
			$this->Session->setFlash(__d('croogo', 'Organization shareholder deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('plugin' => 'pride', 'controller' => 'organizations', 'action' => 'declare_shareholder', $this->Session->read('Auth.User.organization_id')));
		}
		$this->Session->setFlash(__d('croogo', 'Organization shareholder was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->OrganizationShareholder->recursive = 0;
		$this->set('organizationShareholders', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->OrganizationShareholder->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid organization shareholder'));
		}
		$options = array('conditions' => array('OrganizationShareholder.' . $this->OrganizationShareholder->primaryKey => $id));
		$this->set('organizationShareholder', $this->OrganizationShareholder->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->OrganizationShareholder->create();
			if ($this->OrganizationShareholder->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The organization shareholder has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The organization shareholder could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$organizations = $this->OrganizationShareholder->Organization->find('list');
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
		if (!$this->OrganizationShareholder->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid organization shareholder'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->OrganizationShareholder->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The organization shareholder has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The organization shareholder could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('OrganizationShareholder.' . $this->OrganizationShareholder->primaryKey => $id));
			$this->request->data = $this->OrganizationShareholder->find('first', $options);
		}
		$organizations = $this->OrganizationShareholder->Organization->find('list');
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
		$this->OrganizationShareholder->id = $id;
		if (!$this->OrganizationShareholder->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid organization shareholder'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->OrganizationShareholder->delete()) {
			$this->Session->setFlash(__d('croogo', 'Organization shareholder deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Organization shareholder was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
}

<?php
App::uses('PrideAppController', 'Pride.Controller');
/**
 * Depots Controller
 *
 * @property Depot $Depot
 * @property PaginatorComponent $Paginator
 */
class DepotsController extends PrideAppController {

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
		$this->Depot->recursive = 0;
		$this->set('depots', $this->paginate());
	
		$this->active_view();
	}
	
	public function get_depot($id = null) {
	
		$criteria['conditions'] = array('Depot.' . $this->Depot->primaryKey => $id);
		
		$depot = $this->Depot->find('first', $criteria);
		
		return $depot;
	
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Depot->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid depot'));
		}
		$options = array('conditions' => array('Depot.' . $this->Depot->primaryKey => $id));
		$this->set('depot', $this->Depot->find('first', $options));
		
		$this->active_view();
	}
	
	

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Depot->create();
			if ($this->Depot->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The depot has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The depot could not be saved. Please, try again.'), 'default', array('class' => 'error'));
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
		if (!$this->Depot->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid depot'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Depot->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The depot has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The depot could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Depot.' . $this->Depot->primaryKey => $id));
			$this->request->data = $this->Depot->find('first', $options);
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
		$this->Depot->id = $id;
		if (!$this->Depot->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid depot'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Depot->delete()) {
			$this->Session->setFlash(__d('croogo', 'Depot deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Depot was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Depot->recursive = 0;
		$this->set('depots', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Depot->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid depot'));
		}
		$options = array('conditions' => array('Depot.' . $this->Depot->primaryKey => $id));
		$this->set('depot', $this->Depot->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Depot->create();
			if ($this->Depot->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The depot has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The depot could not be saved. Please, try again.'), 'default', array('class' => 'error'));
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
		if (!$this->Depot->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid depot'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Depot->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The depot has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The depot could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Depot.' . $this->Depot->primaryKey => $id));
			$this->request->data = $this->Depot->find('first', $options);
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
		$this->Depot->id = $id;
		if (!$this->Depot->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid depot'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Depot->delete()) {
			$this->Session->setFlash(__d('croogo', 'Depot deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Depot was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}

}

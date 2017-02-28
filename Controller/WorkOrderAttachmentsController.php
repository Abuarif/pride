<?php
App::uses('PrideAppController', 'Pride.Controller');
/**
 * WorkOrderAttachments Controller
 *
 * @property WorkOrderAttachment $WorkOrderAttachment
 * @property PaginatorComponent $Paginator
 */
class WorkOrderAttachmentsController extends PrideAppController {

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
		$this->WorkOrderAttachment->recursive = 0;
		$this->set('workOrderAttachments', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->WorkOrderAttachment->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid work order attachment'));
		}
		$options = array('conditions' => array('WorkOrderAttachment.' . $this->WorkOrderAttachment->primaryKey => $id));
		$this->set('workOrderAttachment', $this->WorkOrderAttachment->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->WorkOrderAttachment->create();
			if ($this->WorkOrderAttachment->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The work order attachment has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The work order attachment could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$workOrders = $this->WorkOrderAttachment->WorkOrder->find('list');
		$this->set(compact('workOrders'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->WorkOrderAttachment->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid work order attachment'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->WorkOrderAttachment->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The work order attachment has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The work order attachment could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('WorkOrderAttachment.' . $this->WorkOrderAttachment->primaryKey => $id));
			$this->request->data = $this->WorkOrderAttachment->find('first', $options);
		}
		$workOrders = $this->WorkOrderAttachment->WorkOrder->find('list');
		$this->set(compact('workOrders'));
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
		$this->WorkOrderAttachment->id = $id;
		if (!$this->WorkOrderAttachment->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid work order attachment'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->WorkOrderAttachment->delete()) {
			$this->Session->setFlash(__d('croogo', 'Work order attachment deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Work order attachment was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->WorkOrderAttachment->recursive = 0;
		$this->set('workOrderAttachments', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->WorkOrderAttachment->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid work order attachment'));
		}
		$options = array('conditions' => array('WorkOrderAttachment.' . $this->WorkOrderAttachment->primaryKey => $id));
		$this->set('workOrderAttachment', $this->WorkOrderAttachment->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->WorkOrderAttachment->create();
			if ($this->WorkOrderAttachment->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The work order attachment has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The work order attachment could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$workOrders = $this->WorkOrderAttachment->WorkOrder->find('list');
		$this->set(compact('workOrders'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->WorkOrderAttachment->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid work order attachment'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->WorkOrderAttachment->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The work order attachment has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The work order attachment could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('WorkOrderAttachment.' . $this->WorkOrderAttachment->primaryKey => $id));
			$this->request->data = $this->WorkOrderAttachment->find('first', $options);
		}
		$workOrders = $this->WorkOrderAttachment->WorkOrder->find('list');
		$this->set(compact('workOrders'));
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
		$this->WorkOrderAttachment->id = $id;
		if (!$this->WorkOrderAttachment->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid work order attachment'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->WorkOrderAttachment->delete()) {
			$this->Session->setFlash(__d('croogo', 'Work order attachment deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Work order attachment was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
}

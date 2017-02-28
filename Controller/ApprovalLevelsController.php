<?php
App::uses('PrideAppController', 'Pride.Controller');
/**
 * ApprovalLevels Controller
 *
 * @property ApprovalLevel $ApprovalLevel
 * @property PaginatorComponent $Paginator
 */
class ApprovalLevelsController extends PrideAppController {

	public $displayField = array('name');
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
		$this->ApprovalLevel->recursive = 0;
		$this->set('approvalLevels', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ApprovalLevel->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid approval level'));
		}
		$options = array('conditions' => array('ApprovalLevel.' . $this->ApprovalLevel->primaryKey => $id));
		$this->set('approvalLevel', $this->ApprovalLevel->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ApprovalLevel->create();
			if ($this->ApprovalLevel->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The approval level has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The approval level could not be saved. Please, try again.'), 'default', array('class' => 'error'));
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
		if (!$this->ApprovalLevel->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid approval level'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ApprovalLevel->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The approval level has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The approval level could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('ApprovalLevel.' . $this->ApprovalLevel->primaryKey => $id));
			$this->request->data = $this->ApprovalLevel->find('first', $options);
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
		$this->ApprovalLevel->id = $id;
		if (!$this->ApprovalLevel->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid approval level'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ApprovalLevel->delete()) {
			$this->Session->setFlash(__d('croogo', 'Approval level deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Approval level was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->ApprovalLevel->recursive = 0;
		$this->set('approvalLevels', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->ApprovalLevel->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid approval level'));
		}
		$options = array('conditions' => array('ApprovalLevel.' . $this->ApprovalLevel->primaryKey => $id));
		$this->set('approvalLevel', $this->ApprovalLevel->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->ApprovalLevel->create();
			if ($this->ApprovalLevel->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The approval level has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The approval level could not be saved. Please, try again.'), 'default', array('class' => 'error'));
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
		if (!$this->ApprovalLevel->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid approval level'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ApprovalLevel->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The approval level has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The approval level could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('ApprovalLevel.' . $this->ApprovalLevel->primaryKey => $id));
			$this->request->data = $this->ApprovalLevel->find('first', $options);
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
		$this->ApprovalLevel->id = $id;
		if (!$this->ApprovalLevel->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid approval level'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ApprovalLevel->delete()) {
			$this->Session->setFlash(__d('croogo', 'Approval level deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Approval level was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
}

<?php
App::uses('PrideAppController', 'Pride.Controller');
/**
 * ReferenceCodes Controller
 *
 * @property ReferenceCode $ReferenceCode
 * @property PaginatorComponent $Paginator
 */
class ReferenceCodesController extends PrideAppController {

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
		$this->ReferenceCode->recursive = 0;
		$this->set('referenceCodes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ReferenceCode->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid reference code'));
		}
		$options = array('conditions' => array('ReferenceCode.' . $this->ReferenceCode->primaryKey => $id));
		$this->set('referenceCode', $this->ReferenceCode->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ReferenceCode->create();
			if ($this->ReferenceCode->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The reference code has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The reference code could not be saved. Please, try again.'), 'default', array('class' => 'error'));
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
		if (!$this->ReferenceCode->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid reference code'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ReferenceCode->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The reference code has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The reference code could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('ReferenceCode.' . $this->ReferenceCode->primaryKey => $id));
			$this->request->data = $this->ReferenceCode->find('first', $options);
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
		$this->ReferenceCode->id = $id;
		if (!$this->ReferenceCode->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid reference code'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ReferenceCode->delete()) {
			$this->Session->setFlash(__d('croogo', 'Reference code deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Reference code was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->ReferenceCode->recursive = 0;
		$this->set('referenceCodes', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->ReferenceCode->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid reference code'));
		}
		$options = array('conditions' => array('ReferenceCode.' . $this->ReferenceCode->primaryKey => $id));
		$this->set('referenceCode', $this->ReferenceCode->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->ReferenceCode->create();
			if ($this->ReferenceCode->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The reference code has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The reference code could not be saved. Please, try again.'), 'default', array('class' => 'error'));
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
		if (!$this->ReferenceCode->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid reference code'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ReferenceCode->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The reference code has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The reference code could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('ReferenceCode.' . $this->ReferenceCode->primaryKey => $id));
			$this->request->data = $this->ReferenceCode->find('first', $options);
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
		$this->ReferenceCode->id = $id;
		if (!$this->ReferenceCode->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid reference code'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ReferenceCode->delete()) {
			$this->Session->setFlash(__d('croogo', 'Reference code deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Reference code was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function getReferenceCode($campaign_design_id) {
		
		// insert new value
		$this->ReferenceCode->create();
		$data['value'] = $campaign_design_id;
		$this->ReferenceCode->set($data);
		$this->ReferenceCode->save();
		
		//return $this->padding($this->ReferenceCode->getLastInsertId(), 4);
		return str_pad($this->ReferenceCode->getLastInsertId(), 4, "0", STR_PAD_LEFT);
	}
}

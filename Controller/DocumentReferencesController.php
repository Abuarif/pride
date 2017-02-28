<?php
App::uses('PrideAppController', 'Pride.Controller');
/**
 * DocumentReferences Controller
 *
 * @property DocumentReference $DocumentReference
 * @property PaginatorComponent $Paginator
 */
class DocumentReferencesController extends PrideAppController {

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
		$this->DocumentReference->recursive = 0;
		$this->set('documentReferences', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->DocumentReference->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid document reference'));
		}
		$options = array('conditions' => array('DocumentReference.' . $this->DocumentReference->primaryKey => $id));
		$this->set('documentReference', $this->DocumentReference->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->DocumentReference->create();
			if ($this->DocumentReference->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The document reference has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The document reference could not be saved. Please, try again.'), 'default', array('class' => 'error'));
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
		if (!$this->DocumentReference->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid document reference'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->DocumentReference->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The document reference has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The document reference could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('DocumentReference.' . $this->DocumentReference->primaryKey => $id));
			$this->request->data = $this->DocumentReference->find('first', $options);
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
		$this->DocumentReference->id = $id;
		if (!$this->DocumentReference->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid document reference'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->DocumentReference->delete()) {
			$this->Session->setFlash(__d('croogo', 'Document reference deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Document reference was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->DocumentReference->recursive = 0;
		$this->set('documentReferences', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->DocumentReference->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid document reference'));
		}
		$options = array('conditions' => array('DocumentReference.' . $this->DocumentReference->primaryKey => $id));
		$this->set('documentReference', $this->DocumentReference->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->DocumentReference->create();
			if ($this->DocumentReference->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The document reference has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The document reference could not be saved. Please, try again.'), 'default', array('class' => 'error'));
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
		if (!$this->DocumentReference->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid document reference'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->DocumentReference->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The document reference has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The document reference could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('DocumentReference.' . $this->DocumentReference->primaryKey => $id));
			$this->request->data = $this->DocumentReference->find('first', $options);
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
		$this->DocumentReference->id = $id;
		if (!$this->DocumentReference->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid document reference'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->DocumentReference->delete()) {
			$this->Session->setFlash(__d('croogo', 'Document reference deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Document reference was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function total_mandatory() {
	
		
		$filter = array('conditions' => array(
			'DocumentReference.doc_type' => 1,
		));
		$total_doc = $this->DocumentReference->find('count', $filter);
		
		$this->set('total_doc', $total_doc);
		return $total_doc;
	}
}

<?php
App::uses('PrideAppController', 'Pride.Controller');
/**
 * AdviceTypes Controller
 *
 * @property AdviceType $AdviceType
 * @property PaginatorComponent $Paginator
 */
class AdviceTypesController extends PrideAppController {

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
		$this->AdviceType->recursive = 0;
		$this->set('adviceTypes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->AdviceType->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid advice type'));
		}
		$options = array('conditions' => array('AdviceType.' . $this->AdviceType->primaryKey => $id));
		$this->set('adviceType', $this->AdviceType->find('first', $options));
	}

	public function get_advice_type($id = null) {
		if (!$this->AdviceType->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid advice type'));
		}
		$options = array('conditions' => array('AdviceType.' . $this->AdviceType->primaryKey => $id));
		$advice = $this->AdviceType->find('first', $options);
		
		return $advice;
	}
/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->AdviceType->create();
			if ($this->AdviceType->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The advice type has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The advice type could not be saved. Please, try again.'), 'default', array('class' => 'error'));
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
		if (!$this->AdviceType->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid advice type'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->AdviceType->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The advice type has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The advice type could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('AdviceType.' . $this->AdviceType->primaryKey => $id));
			$this->request->data = $this->AdviceType->find('first', $options);
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
		$this->AdviceType->id = $id;
		if (!$this->AdviceType->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid advice type'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->AdviceType->delete()) {
			$this->Session->setFlash(__d('croogo', 'Advice type deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Advice type was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->AdviceType->recursive = 0;
		$this->set('adviceTypes', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->AdviceType->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid advice type'));
		}
		$options = array('conditions' => array('AdviceType.' . $this->AdviceType->primaryKey => $id));
		$this->set('adviceType', $this->AdviceType->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->AdviceType->create();
			if ($this->AdviceType->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The advice type has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The advice type could not be saved. Please, try again.'), 'default', array('class' => 'error'));
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
		if (!$this->AdviceType->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid advice type'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->AdviceType->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The advice type has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The advice type could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('AdviceType.' . $this->AdviceType->primaryKey => $id));
			$this->request->data = $this->AdviceType->find('first', $options);
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
		$this->AdviceType->id = $id;
		if (!$this->AdviceType->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid advice type'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->AdviceType->delete()) {
			$this->Session->setFlash(__d('croogo', 'Advice type deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Advice type was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
}

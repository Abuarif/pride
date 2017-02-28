<?php
App::uses('PrideAppController', 'Pride.Controller');
/**
 * ItemTypes Controller
 *
 * @property ItemType $ItemType
 * @property PaginatorComponent $Paginator
 */
class ItemTypesController extends PrideAppController {

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
		$this->ItemType->recursive = 0;
		$this->set('itemTypes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ItemType->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid item type'));
		}
		$options = array('conditions' => array('ItemType.' . $this->ItemType->primaryKey => $id));
		$this->set('itemType', $this->ItemType->find('first', $options));
	}
	
	public function get_item_type($id = null) {
		if (!$this->ItemType->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid item type'));
		}
		$options = array('conditions' => array('ItemType.' . $this->ItemType->primaryKey => $id));
		return $this->ItemType->find('first', $options);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ItemType->create();
			if ($this->ItemType->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The item type has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The item type could not be saved. Please, try again.'), 'default', array('class' => 'error'));
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
		if (!$this->ItemType->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid item type'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ItemType->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The item type has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The item type could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('ItemType.' . $this->ItemType->primaryKey => $id));
			$this->request->data = $this->ItemType->find('first', $options);
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
		$this->ItemType->id = $id;
		if (!$this->ItemType->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid item type'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ItemType->delete()) {
			$this->Session->setFlash(__d('croogo', 'Item type deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Item type was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->ItemType->recursive = 0;
		$this->set('itemTypes', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->ItemType->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid item type'));
		}
		$options = array('conditions' => array('ItemType.' . $this->ItemType->primaryKey => $id));
		$this->set('itemType', $this->ItemType->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->ItemType->create();
			if ($this->ItemType->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The item type has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The item type could not be saved. Please, try again.'), 'default', array('class' => 'error'));
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
		if (!$this->ItemType->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid item type'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ItemType->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The item type has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The item type could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('ItemType.' . $this->ItemType->primaryKey => $id));
			$this->request->data = $this->ItemType->find('first', $options);
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
		$this->ItemType->id = $id;
		if (!$this->ItemType->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid item type'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ItemType->delete()) {
			$this->Session->setFlash(__d('croogo', 'Item type deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Item type was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function get_item ($item_id = null) {
		$options = array('conditions' => array('ItemType.' . $this->ItemType->primaryKey => $item_id));
		
		return $this->ItemType->find('first', $options); 
	}
}

<?php
App::uses('PrideAppController', 'Pride.Controller');
/**
 * CampaignOrderTypes Controller
 *
 * @property CampaignOrderType $CampaignOrderType
 * @property PaginatorComponent $Paginator
 */
class CampaignOrderTypesController extends PrideAppController {

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
		$this->CampaignOrderType->recursive = 0;
		$this->set('campaignOrderTypes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CampaignOrderType->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid campaign order type'));
		}
		$options = array('conditions' => array('CampaignOrderType.' . $this->CampaignOrderType->primaryKey => $id));
		$this->set('campaignOrderType', $this->CampaignOrderType->find('first', $options));
	}

	public function get_campaign_order_type($id = null) {
		$options = array('conditions' => array('CampaignOrderType.' . $this->CampaignOrderType->primaryKey => $id));
		
		return $this->CampaignOrderType->find('first', $options); 
	}
/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CampaignOrderType->create();
			if ($this->CampaignOrderType->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The campaign order type has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The campaign order type could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$itemTypes = $this->CampaignOrderType->ItemType->find('list');
		$this->set(compact('itemTypes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->CampaignOrderType->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid campaign order type'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->CampaignOrderType->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The campaign order type has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The campaign order type could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('CampaignOrderType.' . $this->CampaignOrderType->primaryKey => $id));
			$this->request->data = $this->CampaignOrderType->find('first', $options);
		}
		$itemTypes = $this->CampaignOrderType->ItemType->find('list');
		$this->set(compact('itemTypes'));
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
		$this->CampaignOrderType->id = $id;
		if (!$this->CampaignOrderType->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid campaign order type'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CampaignOrderType->delete()) {
			$this->Session->setFlash(__d('croogo', 'Campaign order type deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Campaign order type was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->CampaignOrderType->recursive = 0;
		$this->set('campaignOrderTypes', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->CampaignOrderType->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid campaign order type'));
		}
		$options = array('conditions' => array('CampaignOrderType.' . $this->CampaignOrderType->primaryKey => $id));
		$this->set('campaignOrderType', $this->CampaignOrderType->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->CampaignOrderType->create();
			if ($this->CampaignOrderType->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The campaign order type has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The campaign order type could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$itemTypes = $this->CampaignOrderType->ItemType->find('list');
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
		if (!$this->CampaignOrderType->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid campaign order type'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->CampaignOrderType->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The campaign order type has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The campaign order type could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('CampaignOrderType.' . $this->CampaignOrderType->primaryKey => $id));
			$this->request->data = $this->CampaignOrderType->find('first', $options);
		}
		$itemTypes = $this->CampaignOrderType->ItemType->find('list');
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
		$this->CampaignOrderType->id = $id;
		if (!$this->CampaignOrderType->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid campaign order type'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CampaignOrderType->delete()) {
			$this->Session->setFlash(__d('croogo', 'Campaign order type deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Campaign order type was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
}

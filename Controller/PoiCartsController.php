<?php
App::uses('PrideAppController', 'Pride.Controller');
App::uses('RoutesController', 'Pride.Controller');
/**
 * PoiCarts Controller
 *
 * @property PoiCart $PoiCart
 * @property PaginatorComponent $Paginator
 */
class PoiCartsController extends PrideAppController {

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
		$this->PoiCart->recursive = 0;
		
		if ( $this->Session->read('Auth.User.Role.id') == 4) {
			$criteria['PoiCart.user_id'] = $this->Session->read('Auth.User.id');
			$poiCarts = $this->paginate($criteria);
		} else {
			$poiCarts = $this->paginate();
		}
		
		$this->set('poiCarts',$poiCarts);
	}

	public function isAlreadySave($route_id = null) {
	
		$criteria = array(
						'conditions' => array(
										'PoiCart.user_id' => $this->Session->read('Auth.User.id'), 
										'PoiCart.route_id' => $route_id
										)
						);
		
		$poiCart = $this->PoiCart->find('first', $criteria);
		
		//$this->set(compact('poiCart'));
		
		return $poiCart;
	
	}
	
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PoiCart->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid poi cart'));
		}
		$options = array('conditions' => array('PoiCart.' . $this->PoiCart->primaryKey => $id));
		$this->set('poiCart', $this->PoiCart->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PoiCart->create();
			if ($this->PoiCart->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The poi cart has been saved'), 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The poi cart could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$users = $this->PoiCart->User->find('list');
		$depots = $this->PoiCart->Depot->find('list');
		$this->set(compact('users', 'depots'));
	}
	
	public function add_cart($depot_id = null, $route_id = null, $route_number = null) {
	
		// Assign content
		$this->PoiCart->create();
		
		$data['user_id'] = $this->Session->read('Auth.User.id');
		$data['depot_id'] = $depot_id;
		$data['route_id'] = $route_id;
		$data['route_number'] = $route_number;
		$data['status'] = 1;
		
		
		if ($this->PoiCart->save($data)) {
			$this->Session->setFlash(__d('croogo', 'The poi cart has been saved'), 'default', array('class' => 'alert alert-success'));
			$this->redirect(array('plugin' => 'pride', 'controller' => 'poi_carts', 'action' => 'index'));
		} else {
			$this->Session->setFlash(__d('croogo', 'The poi cart could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			$this->redirect(array('plugin' => 'pride', 'controller' => 'route_details', 'action' => 'index'));
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
		if (!$this->PoiCart->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid poi cart'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->PoiCart->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The poi cart has been saved'), 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The poi cart could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('PoiCart.' . $this->PoiCart->primaryKey => $id));
			$this->request->data = $this->PoiCart->find('first', $options);
		}
		$users = $this->PoiCart->User->find('list');
		$depots = $this->PoiCart->Depot->find('list');
		$this->set(compact('users', 'depots'));
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
		$this->PoiCart->id = $id;
		if (!$this->PoiCart->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid poi cart'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PoiCart->delete()) {
			$this->Session->setFlash(__d('croogo', 'Poi cart deleted'), 'default', array('class' => 'alert alert-success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Poi cart was not deleted'), 'default', array('class' => 'alert alert-danger'));
		$this->redirect(array('action' => 'index'));
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->PoiCart->recursive = 0;
		$this->set('poiCarts', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->PoiCart->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid poi cart'));
		}
		$options = array('conditions' => array('PoiCart.' . $this->PoiCart->primaryKey => $id));
		$this->set('poiCart', $this->PoiCart->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->PoiCart->create();
			if ($this->PoiCart->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The poi cart has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The poi cart could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$users = $this->PoiCart->User->find('list');
		$depots = $this->PoiCart->Depot->find('list');
		$this->set(compact('users', 'depots'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->PoiCart->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid poi cart'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->PoiCart->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The poi cart has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The poi cart could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('PoiCart.' . $this->PoiCart->primaryKey => $id));
			$this->request->data = $this->PoiCart->find('first', $options);
		}
		$users = $this->PoiCart->User->find('list');
		$depots = $this->PoiCart->Depot->find('list');
		$this->set(compact('users', 'depots'));
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
		$this->PoiCart->id = $id;
		if (!$this->PoiCart->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid poi cart'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PoiCart->delete()) {
			$this->Session->setFlash(__d('croogo', 'Poi cart deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Poi cart was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
}

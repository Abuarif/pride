<?php
App::uses('PrideAppController', 'Pride.Controller');
/**
 * Routes Controller
 *
 * @property Route $Route
 * @property PaginatorComponent $Paginator
 */
class RoutesController extends PrideAppController {

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
		$this->Route->recursive = 0;
		if ($this->Session->read('Auth.User.Role.alias') == Configure::read('AMS.role_rapidbus_administrator')) {
			$criteria['Route.depot_id'] = $this->Session->read('Auth.User.Depot.id');
			$routes = $this->paginate($criteria);
		} else {
			$routes = $this->paginate();
		}


		$this->set('routes', $routes);
		
		$this->active_view();
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Route->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid route'));
		}
		$options = array('conditions' => array('Route.' . $this->Route->primaryKey => $id));
		$this->set('route', $this->Route->find('first', $options));
	
		$this->active_view();
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Route->create();
			if ($this->Route->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The route has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The route could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$depots = $this->Route->Depot->find('list');
		$this->set(compact('depots'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Route->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid route'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Route->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The route has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The route could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Route.' . $this->Route->primaryKey => $id));
			$this->request->data = $this->Route->find('first', $options);
		}
		$depots = $this->Route->Depot->find('list');
		$this->set(compact('depots'));
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
		$this->Route->id = $id;
		if (!$this->Route->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid route'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Route->delete()) {
			$this->Session->setFlash(__d('croogo', 'Route deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Route was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Route->recursive = 0;
		$this->set('routes', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Route->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid route'));
		}
		$options = array('conditions' => array('Route.' . $this->Route->primaryKey => $id));
		$this->set('route', $this->Route->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Route->create();
			if ($this->Route->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The route has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The route could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$depots = $this->Route->Depot->find('list');
		$this->set(compact('depots'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Route->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid route'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Route->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The route has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The route could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Route.' . $this->Route->primaryKey => $id));
			$this->request->data = $this->Route->find('first', $options);
		}
		$depots = $this->Route->Depot->find('list');
		$this->set(compact('depots'));
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
		$this->Route->id = $id;
		if (!$this->Route->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid route'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Route->delete()) {
			$this->Session->setFlash(__d('croogo', 'Route deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Route was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
}

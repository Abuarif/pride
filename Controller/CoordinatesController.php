<?php
App::uses('PrideAppController', 'Pride.Controller');
/**
 * Coordinates Controller
 *
 * @property Coordinate $Coordinate
 * @property PaginatorComponent $Paginator
 */
class CoordinatesController extends PrideAppController {

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
		$this->Coordinate->recursive = 0;
		$this->set('coordinates', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Coordinate->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid coordinate'));
		}
		$options = array('conditions' => array('Coordinate.' . $this->Coordinate->primaryKey => $id));
		$this->set('coordinate', $this->Coordinate->find('first', $options));
	}
	
	public function get_map_version($route_id = null) {
	
		/* $sql = "
			SELECT route_id, date_format(created, '%d/%m/%Y') as created, status
			FROM coordinates
			GROUP BY date_format(created, '%d/%m/%Y')	
		";
		
		return $this->RouteDetail->query($sql); */
		$option = array('conditions' => array('Coordinate.route_id' => $route_id),
						'fields' => array('route_id', 'created', 'status' ), 
						'group' => 'created');
		return $this->Coordinate->find('all', $option);
		
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Coordinate->create();
			if ($this->Coordinate->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The coordinate has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The coordinate could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$routes = $this->Coordinate->Route->find('list');
		$this->set(compact('routes'));
	}
	
	public function save_coordinates($route_id = null, $lat = null, $long = null, $ctr_lat = null, $ctr_long = null, $zoom = null) {
	
		$data['Coordinate']['route_id'] = $route_id;
		$data['Coordinate']['lat'] = $lat;
		$data['Coordinate']['long'] = $long;
		$data['Coordinate']['ctr_lat'] = $ctr_lat;
		$data['Coordinate']['ctr_long'] = $ctr_long;
		$data['Coordinate']['zoom'] = $zoom;
	
		$this->Coordinate->create();
		$this->Coordinate->save($data);
	}

	public function publish($route_id = null, $route_number = null, $created = null) {
		// set all as draft
		$this->Coordinate->updateAll(
			array('Coordinate.status' => false)
		);
		
		/* //debug
		echo date('Y-m-d H:i:s', $created);
		die; */
		
		
		// set publish for the specified date only
		$this->Coordinate->updateAll(
			array('Coordinate.status' => true),
			array('Coordinate.route_id' => $route_id, 'Coordinate.created' => date('Y-m-d H:i:s', $created) )
		);
		
		$this->redirect(array('controller' => 'route_details', 'action' => 'create_route', $route_id, $route_number, $created));
	}
	
	public function remove($route_id = null, $route_number = null, $created = null) {
	
		$this->Coordinate->deleteAll(
			array('Coordinate.route_id' => $route_id, 'Coordinate.created' => date('Y-m-d H:i:s', $created) )
		);
		
		$this->redirect(array('controller' => 'route_details', 'action' => 'create_route', $route_id, $route_number));
	}
/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Coordinate->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid coordinate'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Coordinate->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The coordinate has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The coordinate could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Coordinate.' . $this->Coordinate->primaryKey => $id));
			$this->request->data = $this->Coordinate->find('first', $options);
		}
		$routes = $this->Coordinate->Route->find('list');
		$this->set(compact('routes'));
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
		$this->Coordinate->id = $id;
		if (!$this->Coordinate->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid coordinate'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Coordinate->delete()) {
			$this->Session->setFlash(__d('croogo', 'Coordinate deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Coordinate was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Coordinate->recursive = 0;
		$this->set('coordinates', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Coordinate->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid coordinate'));
		}
		$options = array('conditions' => array('Coordinate.' . $this->Coordinate->primaryKey => $id));
		$this->set('coordinate', $this->Coordinate->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Coordinate->create();
			if ($this->Coordinate->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The coordinate has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The coordinate could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$routes = $this->Coordinate->Route->find('list');
		$this->set(compact('routes'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Coordinate->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid coordinate'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Coordinate->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The coordinate has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The coordinate could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Coordinate.' . $this->Coordinate->primaryKey => $id));
			$this->request->data = $this->Coordinate->find('first', $options);
		}
		$routes = $this->Coordinate->Route->find('list');
		$this->set(compact('routes'));
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
		$this->Coordinate->id = $id;
		if (!$this->Coordinate->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid coordinate'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Coordinate->delete()) {
			$this->Session->setFlash(__d('croogo', 'Coordinate deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Coordinate was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
	
	
	public function generate_map($route_id = null) {
	
		$options = array(
				'conditions' => array('Coordinate.route_id' => $route_id),
				'fields' => array('id','route_id','lat','long'));
		$coordinates = $this->Coordinate->find('all', $options);
		
		$this->set('coordinates', $coordinates);
	
	}
}

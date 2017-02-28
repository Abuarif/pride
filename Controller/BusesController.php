<?php
App::uses('PrideAppController', 'Pride.Controller');
/**
 * Buses Controller
 *
 * @property Bus $Bus
 * @property PaginatorComponent $Paginator
 */
class BusesController extends PrideAppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	public $paginate = array(
        'limit' => 10,
		//'conditions' => array('Campaign.status' => 0),
        'order' => array(
            'Bus.registration_number' => 'asc'
        )
    );
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Bus->recursive = 0;
		
		if (!empty($this->request->data['Bus']['search_bus'])) {
			
			$this->Paginator->settings = array(
				'conditions' => array('OR' => 
					array(
					'RouteDetail.route_number LIKE' 	=> '%'.$this->request->data['Bus']['search_bus'].'%', 
					'RouteDetail.depot_present LIKE' 	=> '%'.$this->request->data['Bus']['search_bus'].'%', 
					'RouteDetail.origin LIKE' 			=> '%'.$this->request->data['Bus']['search_bus'].'%', 
					'RouteDetail.destination LIKE' 		=> '%'.$this->request->data['Bus']['search_bus'].'%', 
					'RouteDetail.route_way_1 LIKE' 		=> '%'.$this->request->data['Bus']['search_bus'].'%', 
					'RouteDetail.route_way_2 LIKE' 		=> '%'.$this->request->data['Bus']['search_bus'].'%', 
					'Depot.name LIKE' 					=> '%'.$this->request->data['Bus']['search_bus'].'%', 
					'Bus.registration_number LIKE' 		=> '%'.$this->request->data['Bus']['search_bus'].'%', 
					'Bus.brand LIKE' 					=> '%'.$this->request->data['Bus']['search_bus'].'%')
				),
				'limit' => 10,
				'order' => array(
					'Bus.registration_number' => 'asc'
				)
			);
			
		} else {
			
			$this->Paginator->settings = $this->paginate;
		}
		
		
		$criteria['Bus.depot_id'] = $this->Session->read('Auth.User.depot_id');
		if ($this->Session->read('Auth.User.Role.alias') == Configure::read('AMS.role_rapidbus_administrator')) {
			$buses = $this->paginate($criteria);
		} else {
			$buses = $this->paginate();
		}
		$this->set('buses', $buses);
	
		$this->active_view();
	}

	public function get_list($route_id = null) {
		$sql = "SELECT b.registration_number 
				FROM buses b, 
					 poi_carts p
				WHERE 1
				AND p.depot_id = b.depot_id
				AND p.route_id = b.route_id
				AND p.route_id = '".$route_id."'
				";
		
		$buses = $this->Bus->query($sql);
		
		$this->set('buses', $buses);
	}
	
	public function get_bus($id = null) {
	
		$criteria['conditions'] = array('Bus.' . $this->Bus->primaryKey => $id);
		
		$bus = $this->Bus->find('first', $criteria);
		
		return $bus;
	
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Bus->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid bus'));
		}
		$options = array('conditions' => array('Bus.' . $this->Bus->primaryKey => $id));
		$this->set('bus', $this->Bus->find('first', $options));
	
		$this->active_view();
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Bus->create();
			if ($this->Bus->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The bus has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The bus could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		
		// for depot manager only
		
		$this->Bus->RouteDetail->virtualFields = array(
			'full_name' => "CONCAT(RouteDetail.depot_present, ' - ', RouteDetail.route_number)"
		);
		$options = array('fields' => array('full_name'));
		$routes = $this->Bus->RouteDetail->find('list', $options); 
		
		//$routes = $this->Bus->RouteDetail->find('list');
		$this->set(compact('routes'));
	
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Bus->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid bus'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Bus->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The bus has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The bus could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Bus.' . $this->Bus->primaryKey => $id));
			$this->request->data = $this->Bus->find('first', $options);
		}
		
		// for depot manager only
		if ($this->Session->read('Auth.User.role_id') == Configure::read('AMS.role_pride_advertiser')) {
			$options = array('conditions' => array('RouteDetail.depot_id' => $this->Session->read('Auth.User.depot_id'), 'RouteDetail.depot_id' => $this->request->data['Bus']['depot_id']));
		} else {
			$options = array('conditions' => array('RouteDetail.depot_id' => $this->request->data['Bus']['depot_id']), 'fields' => array('RouteDetail.id', 'RouteDetail.full_name'));
		}
		
		$this->Bus->RouteDetail->virtualFields = array(
			'full_name' => "CONCAT(RouteDetail.depot_present, ' - ', RouteDetail.route_number)"
		);
		$routes = $this->Bus->RouteDetail->find('list', $options);
		
		$this->Bus->Brand->virtualFields = array(
			'name' => "CONCAT(Brand.brandname, ' : ', Brand.model)"
		);
		$criteria = array('fields' => array('id', 'name'));
		$brands = $this->Bus->Brand->find('list', $criteria);
		
		$this->set(compact('routes', 'brands'));
	}
	
	public function pickedUp($id = null) {
		
		if (isset($id)) {
			$row['id'] 			= $id;
			$row['isPicked'] 	= true;
	
			$this->Bus->create();
			$this->Bus->set($row);
			$this->Bus->save();
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
		$this->Bus->id = $id;
		if (!$this->Bus->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid bus'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Bus->delete()) {
			$this->Session->setFlash(__d('croogo', 'Bus deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Bus was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Bus->recursive = 0;
		$this->set('buses', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Bus->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid bus'));
		}
		$options = array('conditions' => array('Bus.' . $this->Bus->primaryKey => $id));
		$this->set('bus', $this->Bus->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Bus->create();
			if ($this->Bus->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The bus has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The bus could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$routes = $this->Bus->RouteDetail->find('list');
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
		if (!$this->Bus->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid bus'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Bus->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The bus has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The bus could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Bus.' . $this->Bus->primaryKey => $id));
			$this->request->data = $this->Bus->find('first', $options);
		}
		$this->Bus->RouteDetail->virtualFields = array(
			'full_name' => "CONCAT(RouteDetail.depot_present, ' - ', RouteDetail.route_number)"
		);
		$filter = array(
						'conditions' => array('RouteDetail.depot_id' => $this->request->data['Bus']['depot_id']),
						'fields' => array('RouteDetail.id', 'RouteDetail.full_name'));
		$routes = $this->Bus->RouteDetail->find('list', $filter);
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
		$this->Bus->id = $id;
		if (!$this->Bus->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid bus'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Bus->delete()) {
			$this->Session->setFlash(__d('croogo', 'Bus deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Bus was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
}

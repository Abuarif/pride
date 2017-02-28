<?php
App::uses('PrideAppController', 'Pride.Controller');
App::uses('PoiCartsController', 'Pride.Controller');
App::uses('CoordinatesController', 'Pride.Controller');
/**
 * RouteDetails Controller
 *
 * @property RouteDetail $RouteDetail
 * @property PaginatorComponent $Paginator
 */
class RouteDetailsController extends PrideAppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	public function map() {
		$this->helpers[] = 'GoogleMapV3';
	}								
	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		if(empty($this->Session->read('Auth'))) {
			$this->set('title_for_layout', 'default');
			$this->layout = 'default';
		}else{
			$this->set('title_for_layout', '');
		}
		
		$this->RouteDetail->recursive = 0;
		
		$searchArray = array();
				
		if (!empty($this->request->data['RouteDetail']['poi1'])) {
			$this->request->params['named']['q1'] = $this->request->data['RouteDetail']['poi1'];
			$q1 = $this->request->data['RouteDetail']['poi1'];
		} else if(!empty($this->request->params['named']['q1'])) {
			$q1 = $this->request->params['named']['q1'];
		}
		
		if (!empty($this->request->data['RouteDetail']['poi2'])) {
			$this->request->params['named']['q2'] = $this->request->data['RouteDetail']['poi2'];
			$q2 = $this->request->data['RouteDetail']['poi2'];
		} else if(!empty($this->request->params['named']['q2'])) {
			$q2 = $this->request->params['named']['q2'];
		}
		
		if (!empty($this->request->data['RouteDetail']['poi3'])) {
			$this->request->params['named']['q3'] = $this->request->data['RouteDetail']['poi3'];
			$q3 = $this->request->data['RouteDetail']['poi3'];
		} else if(!empty($this->request->params['named']['q3'])) {
			$q3 = $this->request->params['named']['q3'];
		}
		
		if (!empty($this->request->data['RouteDetail']['poi4'])) {
			$this->request->params['named']['q4'] = $this->request->data['RouteDetail']['poi4'];
			$q4 = $this->request->data['RouteDetail']['poi4'];
		} else if(!empty($this->request->params['named']['q4'])) {
			$q4 = $this->request->params['named']['q4'];
		}
		
		if (!empty($this->request->data['RouteDetail']['searchString'])) {
			// explode the searchString by blank space
			$delimiter = '+';
			$parts = explode($delimiter, $this->request->data['RouteDetail']['searchString'] );
			foreach ($parts as $part) {
				if (!empty($part)) {
					$delimiter = ' ';
					$locations = explode($delimiter, $part);
					foreach ($locations as $location) {
						if (!empty($location)) {
							$location = preg_replace('/\s+/', '', $location);
							$where = array(
											'RouteDetail.origin LIKE' 		=> '%'.$location.'%',
											'RouteDetail.destination LIKE' 	=> '%'.$location.'%',
											'RouteDetail.route_number LIKE' => '%'.$location.'%',
											'RouteDetail.route_way_1 LIKE' 	=> '%'.$location.'%',
											'RouteDetail.route_way_2 LIKE' 	=> '%'.$location.'%',
											);
							$searchOrArray['OR'] = $where;
						}
						$searchMultiORArray[] = $searchOrArray;
					}
					$searchANDArray['AND'] = $searchMultiORArray;
				}
				$searchArray[] = $searchANDArray;
			}
			
			$this->set(compact('searchArray'));
			
			$this->Paginator->settings = array(
				'conditions' => $searchArray,
				'limit' => 100,
				'order' => array(
					'RouteDetail.route_number' => 'ASC'
				)
			);
			
		} else if (isset($q1) || isset($q2) || isset($q3) || isset($q4) ) {
			
			if (isset($q1) && isset($q2) && isset($q3) && isset($q4)) {
				$lock = 4;
				$searchArray = array(
								array('OR' => array(
									'RouteDetail.origin LIKE' 		=> '%'.$q1.'%',
									'RouteDetail.destination LIKE' 	=> '%'.$q1.'%',
									'RouteDetail.route_number LIKE' => '%'.$q1.'%',
									'RouteDetail.route_way_1 LIKE' 	=> '%'.$q1.'%',
									'RouteDetail.route_way_2 LIKE' 	=> '%'.$q1.'%',
										)
									),
								array('OR' => array(
									'RouteDetail.origin LIKE' 		=> '%'.$q3.'%',
									'RouteDetail.destination LIKE' 	=> '%'.$q3.'%',
									'RouteDetail.route_number LIKE' => '%'.$q3.'%',
									'RouteDetail.route_way_1 LIKE' 	=> '%'.$q3.'%',
									'RouteDetail.route_way_2 LIKE' 	=> '%'.$q3.'%',
										)
									),
								array('OR' => array(
									'RouteDetail.origin LIKE' 		=> '%'.$q4.'%',
									'RouteDetail.destination LIKE' 	=> '%'.$q4.'%',
									'RouteDetail.route_number LIKE' => '%'.$q4.'%',
									'RouteDetail.route_way_1 LIKE' 	=> '%'.$q4.'%',
									'RouteDetail.route_way_2 LIKE' 	=> '%'.$q4.'%',
										)
									),
								array('OR' => array(
									'RouteDetail.origin LIKE' 		=> '%'.$q2.'%',
									'RouteDetail.destination LIKE' 	=> '%'.$q2.'%',
									'RouteDetail.route_number LIKE' => '%'.$q2.'%',
									'RouteDetail.route_way_1 LIKE' 	=> '%'.$q2.'%',
									'RouteDetail.route_way_2 LIKE' 	=> '%'.$q2.'%',
										)
									)
								);
			} else if (isset($q1) && isset($q2) && isset($q3)) {
				$lock = 3;
				$searchArray = array(
								array('OR' => array(
									'RouteDetail.origin LIKE' 		=> '%'.$q1.'%',
									'RouteDetail.destination LIKE' 	=> '%'.$q1.'%',
									'RouteDetail.route_number LIKE' => '%'.$q1.'%',
									'RouteDetail.route_way_1 LIKE' 	=> '%'.$q1.'%',
									'RouteDetail.route_way_2 LIKE' 	=> '%'.$q1.'%',
										)
									),
								array('OR' => array(
									'RouteDetail.origin LIKE' 		=> '%'.$q3.'%',
									'RouteDetail.destination LIKE' 	=> '%'.$q3.'%',
									'RouteDetail.route_number LIKE' => '%'.$q3.'%',
									'RouteDetail.route_way_1 LIKE' 	=> '%'.$q3.'%',
									'RouteDetail.route_way_2 LIKE' 	=> '%'.$q3.'%',
										)
									),
								array('OR' => array(
									'RouteDetail.origin LIKE' 		=> '%'.$q2.'%',
									'RouteDetail.destination LIKE' 	=> '%'.$q2.'%',
									'RouteDetail.route_number LIKE' => '%'.$q2.'%',
									'RouteDetail.route_way_1 LIKE' 	=> '%'.$q2.'%',
									'RouteDetail.route_way_2 LIKE' 	=> '%'.$q2.'%',
										)
									)
								);
			} else if (isset($q1) && isset($q2)) {
				$lock = 2;
				$searchArray = array(
								array('OR' => array(
									'RouteDetail.origin LIKE' 		=> '%'.$q1.'%',
									'RouteDetail.destination LIKE' 	=> '%'.$q1.'%',
									'RouteDetail.route_number LIKE' => '%'.$q1.'%',
									'RouteDetail.route_way_1 LIKE' 	=> '%'.$q1.'%',
									'RouteDetail.route_way_2 LIKE' 	=> '%'.$q1.'%',
										)
									),
								array('OR' => array(
									'RouteDetail.origin LIKE' 		=> '%'.$q2.'%',
									'RouteDetail.destination LIKE' 	=> '%'.$q2.'%',
									'RouteDetail.route_number LIKE' => '%'.$q2.'%',
									'RouteDetail.route_way_1 LIKE' 	=> '%'.$q2.'%',
									'RouteDetail.route_way_2 LIKE' 	=> '%'.$q2.'%',
										)
									)
								);
			} else if (isset($q1)) {
				$lock = 1;
				$searchArray = array(
								array('OR' => array(
									'RouteDetail.origin LIKE' 		=> '%'.$q1.'%',
									'RouteDetail.destination LIKE' 	=> '%'.$q1.'%',
									'RouteDetail.route_number LIKE' => '%'.$q1.'%',
									'RouteDetail.route_way_1 LIKE' 	=> '%'.$q1.'%',
									'RouteDetail.route_way_2 LIKE' 	=> '%'.$q1.'%',
										)
									)
								);
			} 
			
			$this->set(compact('searchArray', 'lock'));
			
			$this->Paginator->settings = array(
				'conditions' => array('AND' => $searchArray),
				'limit' => 100,
				'order' => array(
					'RouteDetail.route_number' => 'ASC'
				)
			);
		} else {
			$this->Paginator->settings = array(
				//'conditions' => array('AND' => $searchArray),
				'limit' => 100,
				'order' => array(
					'RouteDetail.id' => 'ASC'
				)
			);
		
		}
		$this->set('routeDetails', $this->paginate());
	}
	
	public function get_route_details($id = null) {
	
		$criteria['conditions'] = array('RouteDetail.' . $this->RouteDetail->primaryKey => $id);
		
		$routeDetail = $this->RouteDetail->find('first', $criteria);
		
		return $routeDetail;
	
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->RouteDetail->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid route detail'));
		}
		$options = array('conditions' => array('RouteDetail.' . $this->RouteDetail->primaryKey => $id));
		$routeDetail = $this->RouteDetail->find('first', $options);
		$this->set('routeDetail', $routeDetail);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->RouteDetail->create();
			if ($this->RouteDetail->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The route detail has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The route detail could not be saved. Please, try again.'), 'default', array('class' => 'error'));
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
		if (!$this->RouteDetail->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid route detail'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->RouteDetail->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The route detail has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The route detail could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('RouteDetail.' . $this->RouteDetail->primaryKey => $id));
			$this->request->data = $this->RouteDetail->find('first', $options);
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
		$this->RouteDetail->id = $id;
		if (!$this->RouteDetail->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid route detail'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->RouteDetail->delete()) {
			$this->Session->setFlash(__d('croogo', 'Route detail deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Route detail was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->RouteDetail->recursive = 0;
		$this->set('routeDetails', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->RouteDetail->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid route detail'));
		}
		$options = array('conditions' => array('RouteDetail.' . $this->RouteDetail->primaryKey => $id));
		$this->set('routeDetail', $this->RouteDetail->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->RouteDetail->create();
			if ($this->RouteDetail->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The route detail has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The route detail could not be saved. Please, try again.'), 'default', array('class' => 'error'));
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
		if (!$this->RouteDetail->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid route detail'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->RouteDetail->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The route detail has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The route detail could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('RouteDetail.' . $this->RouteDetail->primaryKey => $id));
			$this->request->data = $this->RouteDetail->find('first', $options);
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
		$this->RouteDetail->id = $id;
		if (!$this->RouteDetail->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid route detail'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->RouteDetail->delete()) {
			$this->Session->setFlash(__d('croogo', 'Route detail deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Route detail was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function create_route($id = null) {
	
		if ($this->request->is('post') || $this->request->is('put')) {
			
			$latlongs = $this->array2String($this->request->data['RouteDetail']['savedata']);
			$coordinates = explode(',',$this->request->data['RouteDetail']['center_coordinate']);
			$center_lat = $coordinates[0];
			$center_lng = $coordinates[1];
			$zoom = $this->request->data['RouteDetail']['zoom'];

			//$this->update_route_coordinate($id, $center_lat, $center_lng, $zoom);
		
			$coo = new CoordinatesController;
			foreach ($latlongs as $latlong) {
				$myLatLong = $coo->save_coordinates(
										$id, 
										$latlong['lat'], 
										$latlong['long'],
										$center_lat, 
										$center_lng, 
										$zoom
									);
			}
		}
		$options = array('conditions' => array('RouteDetail.' . $this->RouteDetail->primaryKey => $id));
		$routeDetail = $this->RouteDetail->find('first', $options);
		
		$coord = new CoordinatesController;
		$mapVersions =  $coord->get_map_version($id);
		
		$this->set(compact('routeDetail', 'mapVersions'));
	}


	public function view_route($id = null) {
	
		$options = array('conditions' => array('RouteDetail.' . $this->RouteDetail->primaryKey => $id));
		$routeDetail = $this->RouteDetail->find('first', $options);
		
		$coord = new CoordinatesController;
		$mapVersions =  $coord->get_map_version($id);
		
		$this->set(compact('routeDetail', 'mapVersions'));
	}


	public function update_route_coordinate($route_id = null, $lat = null, $lng = null, $zoom = null) {
	
		$data['RouteDetail']['lat'] = $lat;
		$data['RouteDetail']['long'] = $lng;
		$data['RouteDetail']['zoom'] = $zoom;
	
		$this->RouteDetail->id = $route_id;
		$this->RouteDetail->save($data);
	}
	
	public function array2String($data) {
	
		$result = array();
		
		$pairs = explode("|", $data);
		foreach ($pairs as $pair) {
			if (!empty($pair)) {
				$point = explode(",", $pair);
				$latlong['lat'] = $point[0];
				$latlong['long'] = $point[1];
				
				$result[] = $latlong;
			}
		}
		
		return $result;
	}
}

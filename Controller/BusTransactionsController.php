<?php
App::uses('PrideAppController', 'Pride.Controller');
App::uses('CakeTime', 'Utility');
/**
 * BusTransactions Controller
 *
 * @property BusTransaction $BusTransaction
 * @property PaginatorComponent $Paginator
 */
class BusTransactionsController extends PrideAppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'RequestHandler');

	public $paginate = array(
        'limit' => 10,
		'order' => array(
            'BusTransaction.created' => 'asc'
        )
    );
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->BusTransaction->recursive = 0;
		
		if (!empty($this->request->data['Bus']['registration_number'])) {
			
			$this->Paginator->settings = array(
				'conditions' => array('Bus.registration_number LIKE' => '%'.$this->request->data['Bus']['registration_number'].'%'),
				'limit' => 10,
				'order' => array(
					'Bus.registration_number' => 'asc'
				)
			);
			//print_r($this->request->data);
		} else {
			
			$this->Paginator->settings = $this->paginate;
		}
		
		$criteria['Bus.depot_id'] = $this->Session->read('Auth.User.depot_id');
		if ($this->Session->read('Auth.User.Role.alias') == Configure::read('AMS.role_rapidbus_administrator')) {
			$busTransactions = $this->paginate($criteria);
		} else {
			$busTransactions = $this->paginate();
		}
		$this->set('busTransactions', $busTransactions);
	
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
		if (!$this->BusTransaction->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid bus transaction'));
		}
		$options = array('conditions' => array('BusTransaction.' . $this->BusTransaction->primaryKey => $id));
		$this->set('busTransaction', $this->BusTransaction->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function split_date($input) {
		$arr = explode("/", $input);
	   
		//Display the Start Date array format
		return array(
			 "day" => $arr[0], 
			 "month" => $arr[1], 
			 "year" => $arr[2]
		);
	}
	
	
	public function add() {
		if ($this->request->is('ajax')) {
			$term = $this->request->query('term');
			$busList = $this->BusTransaction->getBusList($term);
			$this->set(compact('busList'));
			$this->set('_serialize', 'busList');
		}

		if ($this->request->is('post')) {
			$this->BusTransaction->create();
			
			$this->request->data['BusTransaction']['start_date'] = $this->split_date($this->request->data['BusTransaction']['start_date']);
			
			$this->request->data['BusTransaction']['end_date'] = $this->split_date($this->request->data['BusTransaction']['end_date']);
		
			if ($this->BusTransaction->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The bus transaction has been saved'), 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The bus transaction could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		
		
		$buses = $this->BusTransaction->Bus->find('list');
		$organizations = $this->BusTransaction->Organization->find('list');
		$provisionBuses = $this->BusTransaction->ProvisionBus->find('list');
		$busStatuses = $this->BusTransaction->BusStatus->find('list');
		$users = $this->BusTransaction->User->find('list');
		$this->set(compact('buses', 'organizations', 'provisionBuses', 'busStatuses', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->BusTransaction->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid bus transaction'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			$this->request->data['BusTransaction']['start_date'] = $this->split_date($this->request->data['BusTransaction']['start_date']);
			$this->request->data['BusTransaction']['end_date'] = $this->split_date($this->request->data['BusTransaction']['end_date']);
		
			if ($this->BusTransaction->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The bus calendar details has been updated'), 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The bus calendar details could not be updated. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('BusTransaction.' . $this->BusTransaction->primaryKey => $id));
			$this->request->data = $this->BusTransaction->find('first', $options);
			
			$this->request->data['BusTransaction']['start_date'] = CakeTime::format($this->request->data['BusTransaction']['start_date'], '%d/%m/%Y');
			
			$this->request->data['BusTransaction']['end_date'] = CakeTime::format($this->request->data['BusTransaction']['end_date'], '%d/%m/%Y');
		}
		
		$buses = $this->BusTransaction->Bus->find('list');
		$organizations = $this->BusTransaction->Organization->find('list');
		$provisionBuses = $this->BusTransaction->ProvisionBus->find('list');
		$busStatuses = $this->BusTransaction->BusStatus->find('list');
		$users = $this->BusTransaction->User->find('list');
		$this->set(compact('buses', 'organizations', 'provisionBuses', 'busStatuses', 'users'));
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
		$this->BusTransaction->id = $id;
		if (!$this->BusTransaction->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid bus transaction'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->BusTransaction->delete()) {
			$this->Session->setFlash(__d('croogo', 'Bus transaction deleted'), 'default', array('class' => 'alert alert-success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Bus transaction was not deleted'), 'default', array('class' => 'alert alert-danger'));
		$this->redirect(array('action' => 'index'));
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->BusTransaction->recursive = 0;
		$this->set('busTransactions', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->BusTransaction->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid bus transaction'));
		}
		$options = array('conditions' => array('BusTransaction.' . $this->BusTransaction->primaryKey => $id));
		$this->set('busTransaction', $this->BusTransaction->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->BusTransaction->create();
			if ($this->BusTransaction->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The bus transaction has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The bus transaction could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$buses = $this->BusTransaction->Bus->find('list');
		$organizations = $this->BusTransaction->Organization->find('list');
		$provisionBuses = $this->BusTransaction->ProvisionBus->find('list');
		$busStatuses = $this->BusTransaction->BusStatus->find('list');
		$users = $this->BusTransaction->User->find('list');
		$this->set(compact('buses', 'organizations', 'provisionBuses', 'busStatuses', 'users'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->BusTransaction->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid bus transaction'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->BusTransaction->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The bus transaction has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The bus transaction could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('BusTransaction.' . $this->BusTransaction->primaryKey => $id));
			$this->request->data = $this->BusTransaction->find('first', $options);
		}
		$buses = $this->BusTransaction->Bus->find('list');
		$organizations = $this->BusTransaction->Organization->find('list');
		$provisionBuses = $this->BusTransaction->ProvisionBus->find('list');
		$busStatuses = $this->BusTransaction->BusStatus->find('list');
		$users = $this->BusTransaction->User->find('list');
		$this->set(compact('buses', 'organizations', 'provisionBuses', 'busStatuses', 'users'));
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
		$this->BusTransaction->id = $id;
		if (!$this->BusTransaction->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid bus transaction'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->BusTransaction->delete()) {
			$this->Session->setFlash(__d('croogo', 'Bus transaction deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Bus transaction was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
}

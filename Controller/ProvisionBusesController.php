<?php
App::uses('PrideAppController', 'Pride.Controller');
App::uses('CampaignDesignsController', 'Pride.Controller');
App::uses('CampaignsController', 'Pride.Controller');
App::uses('CampaignOrderDetailsController', 'Pride.Controller');
App::uses('OrganizationsController', 'Pride.Controller');
App::uses('PoiCartsController', 'Pride.Controller');
App::uses('BusesController', 'Pride.Controller');
App::uses('JobsController', 'Pride.Controller');
App::uses('JobTasksController', 'Pride.Controller');
App::uses('JobTypesController', 'Pride.Controller');
/**
 * ProvisionBuses Controller
 *
 * @property ProvisionBus $ProvisionBus
 * @property PaginatorComponent $Paginator
 */
class ProvisionBusesController extends PrideAppController {

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
		$this->ProvisionBus->recursive = 0;
                
                $criteria['ProvisionBus.status'] = 1;
		$this->set('provisionBuses', $this->paginate($criteria));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ProvisionBus->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid provision bus'));
		}
		$options = array('conditions' => array('ProvisionBus.' . $this->ProvisionBus->primaryKey => $id));
                $provisionBus = $this->ProvisionBus->find('first', $options);
		$this->set('provisionBus', $provisionBus);

		// instantiate object
		/* $campaign = new CampaignsController;
		$organization = new OrganizationsController; */

		// get the campaign
		/* $campaignOptions = array('conditions' => array('Campaign.id' => $provisionBus['CampaignOrderDetail']['campaign_id'] ));
		$myCampaign = $campaign->Campaign->find('first', $campaignOptions); */

		//print_r('org_id: '.$myCampaign ['Campaign']['organization_id']);
		/* $orgOptions = array('conditions' => array('Organization.id' => $myCampaign ['Campaign']['organization_id'] ));
		$myOrg = $organization->Organization->find('first', $orgOptions); */
		
		/* $this->set('myCampaign', $myCampaign);
		$this->set('myOrg', $myOrg);
		$this->set(compact('myCampaign', 'myOrg')); */
		
		//$this->active_view();
		
		//---------------------Nizar Try On : 02/03/2015 09:50 AM------------------------------------------------------//
		$campaignOrderDetail = new CampaignOrderDetailsController;
		
		$campaignOrderDetailOptions = array('conditions' => array('CampaignOrderDetail.id' => $provisionBus['ProvisionBus']['campaign_order_detail_id']));
		$myCampaignOrderDetail = $campaignOrderDetail->CampaignOrderDetail->find('first', $campaignOrderDetailOptions);
		$this->set('myCampaignOrderDetail', $myCampaignOrderDetail);
		
		if(!empty($myCampaignOrderDetail)) {
			$organization = new OrganizationsController;
			$orgOptions = array('conditions' => array('Organization.id' => $myCampaignOrderDetail ['CampaignOrderDetail']['organization_id'] ));
			$myOrg = $organization->Organization->find('first', $orgOptions);
			$this->set('myOrg', $myOrg);
			
			
			$campaign = new CampaignsController;
			$campaignOptions = array('condition' => array('Campaign.id' => $myOrg['Organization']['id']));
			$myCampaign = $campaign->Campaign->find('first', $campaignOptions);
			$this->set('myCampaign', $myCampaign);
			
		}
	}

	public function getProvisionBus($id = null) {
		if (!$this->ProvisionBus->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid provision bus'));
		}
		//$this->ProvisionBus->recursive = 0;
		
		$options = array('conditions' => array('ProvisionBus.' . $this->ProvisionBus->primaryKey => $id));
                $provisionBus = $this->ProvisionBus->find('first', $options);
	
		return $provisionBus;
	}

	public function provision_download($id = null) {
	
		//Release the layout for reporting
		$this->autoLayout = false;
		
		if (!$this->ProvisionBus->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid provision bus'));
		}
		$options = array('conditions' => array('ProvisionBus.' . $this->ProvisionBus->primaryKey => $id));
                $provisionBus = $this->ProvisionBus->find('first', $options);
		$this->set('provisionBus', $provisionBus);


		// instantiate object
		 $campaign = new CampaignsController;
		 $organization = new OrganizationsController;

		// get the campaign
		$campaignOptions = array('conditions' => array('Campaign.id' => $provisionBus['CampaignOrderDetail']['campaign_id'] ));
		 $myCampaign = $campaign->Campaign->find('first', $campaignOptions);

		//print_r('org_id: '.$myCampaign ['Campaign']['organization_id']);
		$orgOptions = array('conditions' => array('Organization.id' => $myCampaign ['Campaign']['organization_id'] ));
		$myOrg = $organization->Organization->find('first', $orgOptions);
		
		$this->set('myCampaign', $myCampaign);
		$this->set('myOrg', $myOrg); 
	
		/* if (!$this->ProvisionBus->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid provision bus'));
		}
		$options = array('conditions' => array('ProvisionBus.' . $this->ProvisionBus->primaryKey => $id));
                $provisionBus = $this->ProvisionBus->find('first', $options);
		$this->set('provisionBus', $provisionBus);


		// instantiate object
		 $campaign = new CampaignsController;
		 $organization = new OrganizationsController; */

		// get the campaign
		/* $campaignOptions = array('conditions' => array('Campaign.id' => $provisionBus['CampaignOrder']['campaign_id'] ));
		 $myCampaign = $campaign->Campaign->find('first', $campaignOptions);

		$orgOptions = array('conditions' => array('Organization.id' => $myCampaign ['Campaign']['organization_id'] ));
		$myOrg = $organization->Organization->find('first', $orgOptions);
		 $this->set(compact('myCampaign', 'myOrg')); */
		
		/* $params = array(
			'download' => false,
			'name' => 'provision_bus_'.$id.'.pdf',
			'paperOrientation' => 'portrait',
			'paperSize' => 'A4'
		);
		$this->set($params);
		 */
		//$this->active_view();
	}

	public function download_all($id = null) {
		if (!$this->ProvisionBus->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid provision bus'));
		}
		$options = array('conditions' => array('ProvisionBus.' . $this->ProvisionBus->primaryKey => $id));
                $provisionBus = $this->ProvisionBus->find('first', $options);
		$this->set('provisionBus', $provisionBus);


		// instantiate object
		 $campaign = new CampaignsController;
		 $organization = new OrganizationsController;

		// get the campaign
		$campaignOptions = array('conditions' => array('Campaign.id' => $provisionBus['CampaignOrder']['campaign_id'] ));
		 $myCampaign = $campaign->Campaign->find('first', $campaignOptions);

		$orgOptions = array('conditions' => array('Organization.id' => $myCampaign ['Campaign']['organization_id'] ));
		$myOrg = $organization->Organization->find('first', $orgOptions);
		 $this->set(compact('myCampaign', 'myOrg'));
		
		$params = array(
			'download' => false,
			'name' => 'provision_bus_'.$id.'.pdf',
			'paperOrientation' => 'portrait',
			'paperSize' => 'A4'
		);
		$this->set($params);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ProvisionBus->create();
			//print_r($this->request->data);
			if ($this->ProvisionBus->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The provision bus has been saved'), 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The provision bus could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$campaignOrders = $this->ProvisionBus->CampaignOrder->find('list');
		$depots = $this->ProvisionBus->Depot->find('list');
		$routes = $this->ProvisionBus->Route->find('list');
		$buses = $this->ProvisionBus->Bus->find('list');
		$approvals = $this->ProvisionBus->Approval->find('list');
		$this->set(compact('campaignOrders', 'depots', 'routes', 'buses', 'approvals'));
	}
	
/**
 * add method
 *
 * @return void
 */
	public function multi_create($campaignId = null, $campaignOrderDetailId = null, $quantity  = null, $job_id = null) {
		//$this->log("multi_create: ".$campaignOrderDetailId." ". $quantity);
		if (isset($campaignOrderDetailId) && isset($quantity)) {
			
			for ($iterate = 1; $iterate <= $quantity; $iterate ++) {
				// create provision
				$provision_bus_ids[] = $this->create_order($campaignOrderDetailId, $iterate);
			}
			
			$jobType = new JobTypesController;
			$filter = array('conditions' => array('JobType.level' => 3), 
								'fields' => array('id', 'name'));
			$myJobTypes = $jobType->JobType->find('list', $filter);
			
			foreach ($provision_bus_ids as $prov_key=>$provision_id) {
				$task = new JobTasksController;
			
				// installation
				foreach($myJobTypes as $key=>$value) {
					$task->create_task_work($job_id + 1, $key, $campaignOrderDetailId, $provision_id);
				}
			}
			
			foreach ($provision_bus_ids as $prov_key=>$provision_id) {
				$task = new JobTasksController;
			
				// installation
				foreach($myJobTypes as $key=>$value) {
					$task->create_task_work($job_id + 2, $key, $campaignOrderDetailId, $provision_id);
				}
			}
				
			// update campaign order detail status to 1 as to block redundant provision
			$this->loadModel('CampaignOrderDetail');
			
			$this->CampaignOrderDetail->create();
			$row['id']	= $campaignOrderDetailId;
			$row['status']	= true;
			$this->CampaignOrderDetail->set($row);
			$this->CampaignOrderDetail->save();	

			$this->redirect(
						array(
							'plugin' => 'pride',
							'controller' => 'campaigns',
							'action' => 'view',
							$campaignId
							)
						);
		}
	}

/**
 * create_order method
 *
 * @return void
 */
	public function create_order($campaignOrderDetailId = null, $order_number = null, $job_task_id = null) {
		
		$provision_bus_id = 0;
		
		//$this->log("create_order: ".$campaignOrderId." ". $order_number);
		$row['job_task_id']			= $job_task_id;
		$row['campaign_order_detail_id']	= $campaignOrderDetailId;
		$row['order_number'] 		= $order_number;

		$this->ProvisionBus->create();
		$this->ProvisionBus->set($row);
		if ($this->ProvisionBus->save()) {
		
			$provision_bus_id = $this->ProvisionBus->getLastInsertId();
			
		}
		
		return $provision_bus_id ;
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
	
		if (!$this->ProvisionBus->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid provision bus'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ProvisionBus->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The provision bus has been saved'), 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('controller' => 'campaign_orders',  'action' => 'view'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The provision bus could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('ProvisionBus.' . $this->ProvisionBus->primaryKey => $id));
			$this->request->data = $this->ProvisionBus->find('first', $options);
		}
		$campaignOrders = $this->ProvisionBus->CampaignOrder->find('list');
		$depots = $this->ProvisionBus->Depot->find('list');
		$mydepots = $this->ProvisionBus->Depot->find('list',  array(
        'fields' => array('Depot.id')));
		$routes = $this->ProvisionBus->Route->find('list');
		$buses = $this->ProvisionBus->Bus->find('list',  array(
        'fields' => array('Bus.registration_number')));
		$campaignDesigns = $this->ProvisionBus->CampaignDesign->find('list');
		$approvals = $this->ProvisionBus->Approval->find('list');
		$this->set(compact('campaignOrders', 'mydepots', 'depots', 'routes', 'buses', 'campaignDesigns', 'approvals'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function replacement($id = null, $campaign_order_detail_id = null, $order_number = null) {
	
		// to do - need to replace the campaign order number with a different bus due to bus unavailability
		$row['campaign_order_detail_id']	= $campaign_order_detail_id;
		$row['order_number'] 		= $order_number.'-rep';

		$this->ProvisionBus->create();
		$this->ProvisionBus->set($row);
		if ($this->ProvisionBus->save()) {
			$id = $this->ProvisionBus->getLastInsertId();
		}
		
		// select a new bus
		if (!$this->ProvisionBus->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid provision bus'));
		}
		
		if ($this->request->is('post') || $this->request->is('put')) {
			$this->redirect(array('controller' => 'provision_buses',  'action' => 'step2', $id, $this->request->data['ProvisionBus']['depot_id']));
		} else {
			$options = array('conditions' => array('ProvisionBus.' . $this->ProvisionBus->primaryKey => $id));
			$this->request->data = $this->ProvisionBus->find('first', $options);
		} 
		$campaignOrders = $this->ProvisionBus->CampaignOrder->find('list');
		$depots = $this->ProvisionBus->Depot->find('list');
		$this->set(compact('campaignOrders', 'depots'));
	}
	public function array2String($data) {
	
		$result = array();
		
		$raw = explode(";", $data);
		
		foreach($raw as $key => $value){
			if(substr($value,0,4) == 'slot'){
				 $slots[] = $value;
			}
		}

		if(isset($slots)){
			//print_r($slots);
			foreach ($slots as $slot) {
				$split = explode("|", $slot);
				foreach($split as $key => $value){
					if(substr($value,0,2) == 'v-'){
						$visual = explode("-", $value);
						$result['visual_id'] = $visual[1];
					} else if(substr($value,0,2) == 'b-'){
						$bus = explode("-", $value);
						$result['bus_id'] = $bus[1];
					}
				}
				
			}
		}
		
		return $result;
	}
	
	public function step_a($id = null, $campaign_id = null, $campaign_order_detail_id = null) {
	
		if (!$this->ProvisionBus->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid provision bus'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
		
			if (!empty($this->request->data)) {
				// parse / explode string 
				/* allBuses|b-193;allBuses|b-256;allBuses|b-257;allBuses|b-258;allVisuals|v-55;allVisuals|v-56;slot-425|b-186;slot-425|v-55 */
			
				$result = $this->array2String($this->request->data['ProvisionBus']['slot']);
				
				//debug
				/* echo 'result: ';
				print_r($result);
				echo 'visual: '.$result['visual_id']; */
				if (!empty($result['visual_id']))
				$data['ProvisionBus']['campaign_design_id'] = $result['visual_id'];
				
				if (!empty($result['bus_id']))
				$data['ProvisionBus']['bus_id'] = $result['bus_id'];
				
			} else {
				$this->Session->setFlash(__d('croogo', 'Empty post value'), 'default', array('class' => 'alert alert-success'));
			}
				
			// bus_id is available
			if (!empty($data['ProvisionBus']['bus_id']) && !empty($data['ProvisionBus']['campaign_design_id'])) {
				// change status to 1 if all items configured else change to 1 - done, 2 - missing visual
				if ($data['ProvisionBus']['campaign_design_id'] == '') {
					$data['ProvisionBus']['status'] = 2;
				} else {
					$data['ProvisionBus']['status'] = 1;
				}
				$data['ProvisionBus']['id'] = $id;
				$data['ProvisionBus']['campaign_order_detail_id'] = $campaign_order_detail_id;
				
				 // get bus depot and route data
				$busObj = new BusesController;
				$criteria['conditions'] = array('Bus.' . $busObj->Bus->primaryKey => $data['ProvisionBus']['bus_id']);
				$myBus = $busObj->Bus->find('first', $criteria); // get_bus($data['ProvisionBus']['bus_id']);
				
				$data['ProvisionBus']['depot_id'] = $myBus['Bus']['depot_id'];
				$data['ProvisionBus']['route_id'] = $myBus['Bus']['route_id'];
				
				if ($this->ProvisionBus->save($data)) {
					$this->Session->setFlash(__d('croogo', 'The provision bus has been saved'), 'default', array('class' => 'alert alert-success'));
					$this->redirect(array('controller' => 'campaign_order_details',  'action' => 'view', $data['ProvisionBus']['campaign_order_detail_id']));
				}
			} else {
				$this->Session->setFlash(__d('croogo', 'The Provision Order could not be saved. Select a bus and a visual. You have to give confirmation before submitting it. Please try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		
	
		$sql = "
		SELECT DISTINCT depot.name, route.route_number, bus.id, bus.brand, bus.registration_number
		FROM 
			poi_carts cart, routes route, 
			depots depot, buses bus,
			bus_transactions trans
		WHERE 1
		AND cart.user_id = ".$this->Session->read('Auth.User.id')."
		AND depot.id = cart.depot_id
		AND route.id = cart.route_id
		AND bus.route_id = route.id
		AND bus.id NOT IN 
			(
                SELECT DISTINCT provision.bus_id 
            	FROM 
                	provision_buses provision
                WHERE 18
				-- provision.campaign_order_detail_id = ".$campaign_order_detail_id."
				AND provision.bus_id is not NULL
                
            )
			";
		$buses = $this->ProvisionBus->query($sql);
		
		$sql = "
		SELECT id, name, files, tag_code
		FROM campaign_designs 
		WHERE campaign_id = ".$campaign_id." 
		AND tag_code != ''
		";
		$visuals = $this->ProvisionBus->query($sql);
		
		$this->set(compact('buses', 'visuals'));
	}
	
	public function step_b($id = null, $campaign_id = null, $campaign_order_detail_id = null) {
	
		// reset provision_buses, set bus_id, visual_id as NULL, status = 0
		$this->ProvisionBus->id = $id;
		$this->ProvisionBus->saveField('bus_id', NULL);
		$this->ProvisionBus->saveField('campaign_design_id', NULL);
		$this->ProvisionBus->saveField('status', 0);
		
		// redirect to step_a with gui
		$this->redirect(array('action' => 'step_a', $id, $campaign_id, $campaign_order_detail_id));
	}
	
	public function step1($id = null) {
	
		if (!$this->ProvisionBus->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid provision bus'));
		}
		
		if ($this->request->is('post') || $this->request->is('put')) {
			$this->redirect(array('controller' => 'provision_buses',  'action' => 'step2', $id, $this->request->data['ProvisionBus']['depot_id']));
		} else {
			$options = array('conditions' => array('ProvisionBus.' . $this->ProvisionBus->primaryKey => $id));
			$this->request->data = $this->ProvisionBus->find('first', $options);
		} 
		$campaignOrders = $this->ProvisionBus->CampaignOrder->find('list');
		$depots = $this->ProvisionBus->Depot->find('list');
		
		// instantiate poi_carts
		$cart = new PoiCartsController;
		$filter = array(
			'conditions' => array(
							'PoiCart.user_id' => $this->Session->read('Auth.User.id')),
			//'fields' => array('id', 'depot_id', 'route_number')
							);
		$myCarts = $cart->PoiCart->find('all', $filter);
		
		$this->set(compact('campaignOrders', 'depots', 'myCarts'));
		
		//$this->active_view();
	}
	
	public function step2($id = null, $depot_id = null) {
	
		if (!$this->ProvisionBus->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid provision bus'));
		}
		if ($this->request->is('post') || $this->request->is('put') ) {
			$this->redirect(array('controller' => 'provision_buses',  'action' => 'step3', $id, $this->request->data['ProvisionBus']['depot_id'], $this->request->data['ProvisionBus']['route_id']));
		} else {
			$options = array('conditions' => array('ProvisionBus.' . $this->ProvisionBus->primaryKey => $id));
			$this->request->data = $this->ProvisionBus->find('first', $options);
		} 
		$campaignOrders = $this->ProvisionBus->CampaignOrder->find('list');
		
		$options = array('conditions' => array('Depot.id' => $depot_id));
		$depots = $this->ProvisionBus->Depot->find('list', $options);
		//$depots = $this->ProvisionBus->Depot->find('list');
		
		$options = array('conditions' => array('Route.depot_id' => $depot_id));
		$routes = $this->ProvisionBus->Route->find('list', $options);
		
		$this->set(compact('campaignOrders', 'depots', 'routes'));
	}
	
	public function step3($id = null, $depot_id = null, $route_id = null) {
	
		if (!$this->ProvisionBus->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid provision bus'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			// change status to 1 if all items configured else change to 1 - done, 2 - missing visual
			if ($this->request->data['ProvisionBus']['campaign_design_id'] == '') {
				$this->request->data['ProvisionBus']['status'] = 2;
			} else {
				$this->request->data['ProvisionBus']['status'] = 1;
			}
			
			if ($this->ProvisionBus->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The provision bus has been saved'), 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('controller' => 'campaign_orders',  'action' => 'view', $this->request->data['ProvisionBus']['campaign_order_detail_id']));
			} else {
				$this->Session->setFlash(__d('croogo', 'The provision bus could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
			
		} else {
			$options = array('conditions' => array('ProvisionBus.' . $this->ProvisionBus->primaryKey => $id));
			$this->request->data = $this->ProvisionBus->find('first', $options);
		} 
		$campaignOrders = $this->ProvisionBus->CampaignOrder->find('list');
		$options = array('conditions' => array('Depot.id' => $depot_id));
		$depots = $this->ProvisionBus->Depot->find('list', $options);
		//$depots = $this->ProvisionBus->Depot->find('list');
		
		$options = array('conditions' => array('Route.depot_id' => $depot_id));
		$routes = $this->ProvisionBus->Route->find('list', $options);
		
		$options = array('conditions' => array('Bus.route_id' => $route_id));
		$buses = $this->ProvisionBus->Bus->find('list',  
							array(
									'fields' => array('Bus.registration_number'), 
									'conditions' => array('Bus.route_id' => $route_id),
									)
								);
		
		$design = New CampaignDesignsController;
		
		//$options = array('conditions' => array('CampaignDesign.campaign_id' => $this->request->data['CampaignOrder']['campaign_id'], "CampaignDesign.tag_code != ''"));
		$options = array('fields' => array('id', 'tag_code'), 'conditions' => array('CampaignDesign.campaign_id' => $this->request->data['CampaignOrder']['campaign_id'], "CampaignDesign.tag_code != ''"));
		$campaignDesigns = $design->CampaignDesign->find('list', $options);
		
		/*
			$campaignDesigns = $design->CampaignDesign->query("SELECT `id` , CONCAT( `CampaignDesign`.`name` , ' - ', `CampaignDesign`.`tag_code` ) as name
                                        FROM `campaign_designs` AS `CampaignDesign`
                                            WHERE `CampaignDesign`.`tag_code` != ''
                                            ORDER BY `CampaignDesign`.`tag_code` ASC");
		*/
		
		$this->set(compact('campaignOrders', 'mydepots', 'depots', 'routes', 'buses', 'campaignDesigns'));
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
		$this->ProvisionBus->id = $id;
		if (!$this->ProvisionBus->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid provision bus'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ProvisionBus->delete()) {
			$this->Session->setFlash(__d('croogo', 'Provision bus deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Provision bus was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->ProvisionBus->recursive = 0;
		$this->set('provisionBuses', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->ProvisionBus->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid provision bus'));
		}
		$options = array('conditions' => array('ProvisionBus.' . $this->ProvisionBus->primaryKey => $id));
		$this->set('provisionBus', $this->ProvisionBus->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->ProvisionBus->create();
			if ($this->ProvisionBus->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The provision bus has been saved'), 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The provision bus could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$campaignOrders = $this->ProvisionBus->CampaignOrder->find('list');
		$depots = $this->ProvisionBus->Depot->find('list');
		$routes = $this->ProvisionBus->Route->find('list');
		$buses = $this->ProvisionBus->Bus->find('list');
		$approvals = $this->ProvisionBus->Approval->find('list');
		$this->set(compact('campaignOrders', 'depots', 'routes', 'buses', 'approvals'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->ProvisionBus->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid provision bus'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ProvisionBus->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The provision bus has been saved'), 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The provision bus could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('ProvisionBus.' . $this->ProvisionBus->primaryKey => $id));
			$this->request->data = $this->ProvisionBus->find('first', $options);
		}
		$campaignOrders = $this->ProvisionBus->CampaignOrder->find('list');
		$depots = $this->ProvisionBus->Depot->find('list');
		$routes = $this->ProvisionBus->Route->find('list');
		$buses = $this->ProvisionBus->Bus->find('list');
		$approvals = $this->ProvisionBus->Approval->find('list');
		$this->set(compact('campaignOrders', 'depots', 'routes', 'buses', 'approvals'));
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
		$this->ProvisionBus->id = $id;
		if (!$this->ProvisionBus->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid provision bus'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ProvisionBus->delete()) {
			$this->Session->setFlash(__d('croogo', 'Provision bus deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Provision bus was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
	
/**
 * Ajax Dropdown
 **/
 
	function ajax_routes() {

		$this->log("ajax_routes: ". $_GET['data']['Depot']['id']);
		
		$option =	$this->ProvisionBus->Route->find('list',
				array(
					'conditions' => array(
						'Route.parent_id' => $_GET['data']['Depot']['id']
					)
				)
			);
			
		print_r($option);
		
		$this->set('options', $option);

		$this->render('/elements/ajax_dropdown', 'ajax');
	}
	
	public function get_completed_provision($campaign_order_detail_id = null) {
	
		$options = array(
				'fields' => 'DISTINCT ProvisionBus.id',
				'conditions' => array(	
							'ProvisionBus.status' => 1,
							'ProvisionBus.campaign_order_detail_id' => $campaign_order_detail_id)
						);
	
		return $this->ProvisionBus->find('count', $options);
	}
}

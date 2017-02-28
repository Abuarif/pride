<?php
App::uses('PrideAppController', 'Pride.Controller');
App::uses('JobsController', 'Pride.Controller');
App::uses('JobTypesController', 'Pride.Controller');
App::uses('CampaignOrdersController', 'Pride.Controller');
App::uses('PackagesController', 'Pride.Controller');
App::uses('CakeTime', 'Utility');
/**
 * Campaigns Controller
 *
 * @property Campaign $Campaign
 * @property PaginatorComponent $Paginator
 */
class CampaignsController extends PrideAppController {

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
            'Campaign.created' => 'desc'
        )
    );
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Campaign->recursive = 0;
		$this->Paginator->settings = $this->paginate;
		
		if ( CakeSession::read('Auth.User.Role.id') == 4 ) {
			$criteria['Campaign.organization_id'] = CakeSession::read('Auth.User.Organization.id');
			$campaign = $this->paginate($criteria);
		} else {
			$campaign = $this->paginate();
		}
		//$criteria['Campaign.organization_id'] = CakeSession::read('Auth.User.Organization.id');
        //$campaign = $this->paginate($criteria);
		$this->set('campaigns', $campaign);
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
		if (!$this->Campaign->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid campaign'));
		}
		$options = array('conditions' => array('Campaign.' . $this->Campaign->primaryKey => $id));
		$campaign = $this->Campaign->find('first', $options);
		$this->set(compact('campaign'));
		
		$campaignOrder = new CampaignOrdersController;
		$package = new PackagesController;
		//$itemType = new ItemTypesController;
		
		$options = array(
			'conditions' => array
					(
						'CampaignOrder.organization_id' => $campaign['Organization']['id'],
						'CampaignOrder.reservation_id' => $campaign['Reservation']['id'],
					));
		$myCampaignOrders = $campaignOrder->CampaignOrder->find('all', $options);
		
		foreach ($myCampaignOrders as $myCampaignOrder) {
			$options = array('conditions' => array('Package.id' => $myCampaignOrder['CampaignOrder']['package_id']), 'order' => 'Package.item_type_id DESC');
			$myPackages[] = $package->Package->find('first', $options);
		}
		
		$this->set(compact('myPackages', 'myCampaignOrders'));
		$this->get_resources($campaign['Organization']['id'], $campaign['Reservation']['id']);
	}
	
	public function get_campaign($id = null) {
		if (!$this->Campaign->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid campaign'));
		}
		$options = array('conditions' => array('Campaign.' . $this->Campaign->primaryKey => $id));
		$campaign = $this->Campaign->find('first', $options);
		$this->set(compact('campaign'));
		
		return $campaign;
	}
	
	public function timeline($id = null) {
		
		$this->Paginator->settings = $this->paginate;
		
		// show all campaigns based on role
		if (CakeSession::read('Auth.User.Role.alias') == Configure::read('AMS.role_pride_advertiser')) {
			if (isset($id)) {
				$criteria['Campaign.id'] = $id;
			}
			
			$criteria['Campaign.organization_id'] = CakeSession::read('Auth.User.Organization.id');	
		} else {
			$criteria = '';
		}
        $campaign = $this->paginate($criteria);
		
		
		$this->set('campaigns', $campaign);

		$options = array('conditions' => array('CampaignOrderDetail.campaign_id' => $this->Campaign->id));
		$campaignOrderDetail = $this->Campaign->CampaignOrderDetail->find('list', $options);
		$this->set('campaignOrder', $campaignOrderDetail);

		// //$campaigns = $this->Campaign->CampaignOrder->Campaign->find('list', $criteria);
		// $packages = $this->Campaign->CampaignOrder->Package->find('list');
		// //$CampaignOrderApproval = $this->CampaignOrder->CampaignOrderApproval->find('list');
		// $this->set('packages', $packages);

		//$this->active_view();
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
	
	public function add($reservation_id = null) {
		
		/* $now = new DateTime();
		date_add($now, date_interval_create_from_date_string('1 month'));
		 *///echo date_format($now, 'd/m/Y');
		
		// get date from mysql_affected_rows
		$myDate = $this->Campaign->query('SELECT DATE_FORMAT(DATE_ADD( now(), INTERVAL 1 month ),"%d/%m/%Y")  as now');
		
		$now = $myDate[0][0]['now'];
		$this->request->data['Campaign']['start_date'] = $now;
		
		if ($this->request->is('post')) {
	
		//Get value for each posted data
	    $strCId = $this->request->data['Campaign']['id'];
		$strOrgId = $this->request->data['Campaign']['organization_id'];
		$strName = $this->request->data['Campaign']['name'];
		$strSD = $this->request->data['Campaign']['start_date'];
		$strED = $this->request->data['Campaign']['end_date'];
		
		//Split the posted value from Start Date
		$strSD = $this->request->data['Campaign']['start_date'];
		$arr = explode("/", $strSD);
	   
		//Display the Start Date array format
		$sDateArray = array(
			 "day" => $arr[1], 
			 "month" => $arr[0], 
			 "year" => $arr[2]
		);
		
		//Split the posted value from End Date
		$strED = $this->request->data['Campaign']['end_date'];
		$arr2 = explode("/", $strED);

		//Display the Start Date array format
		$eDateArray = array(
			 "day" => $arr[1], 
			 "month" => $arr[0], 
			 "year" => $arr2[2]
		);
	
		//Display the Organization array format
		
		$arrayOrg = array(
			'id' => $strCId,
			'organization_id' => $strOrgId,
			'name' => $strName,
			'start_date' => $sDateArray,
			'end_date' => $eDateArray
		);
		
		//Display the Campaigns array format
		$mainArray = array(
			'Campaign' => $arrayOrg
		);
		
		// suhaimi - append balik
		$this->request->data['Campaign']['start_date'] = $this->split_date($this->request->data['Campaign']['start_date']);
		$this->request->data['Campaign']['end_date'] = $this->split_date($this->request->data['Campaign']['end_date']);
		$this->request->data['Campaign']['reservation_id'] = $reservation_id;
		$this->Campaign->create();
		//if ($this->Campaign->save($mainArray)) {
		if ($this->Campaign->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The campaign has been saved'), 'default', array('class' => 'alert alert-success', 'role' => 'alert'));
				
				// create jobs for SPAD approval, installation, dismantle
				$job = new JobsController;
				$jobType = new JobTypesController;
				
				$filter = array('conditions' => array('JobType.level' => 1), 
								'fields' => array('id', 'name'));
				$myJobTypes = $jobType->JobType->find('list', $filter);
				
				foreach($myJobTypes as $key=>$value) {
					$job->create_job($key, $this->Campaign->getLastInsertID());
				
				}
				
				// Redirect to campaign list
				$this->redirect(array('action' => 'index'));
				
			} else {
				$this->Session->setFlash(__d('croogo', 'The campaign could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger', 'role' => 'alert'));
			}
		}
		
		//$this->active_view();
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Campaign->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid campaign'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			// suhaimi - append balik
			$this->request->data['Campaign']['start_date'] = $this->split_date($this->request->data['Campaign']['start_date']);
			$this->request->data['Campaign']['end_date'] = $this->split_date($this->request->data['Campaign']['end_date']);
			
			if ($this->Campaign->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The campaign has been updated'), 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The campaign could not be updated. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Campaign.' . $this->Campaign->primaryKey => $id));
			$this->request->data = $this->Campaign->find('first', $options);
			$this->request->data['Campaign']['start_date'] = CakeTime::format($this->request->data['Campaign']['start_date'], '%d/%m/%Y');
			$this->request->data['Campaign']['end_date'] = CakeTime::format($this->request->data['Campaign']['end_date'], '%d/%m/%Y');
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
		$this->Campaign->id = $id;
		if (!$this->Campaign->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid campaign'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Campaign->delete()) {
			$this->Session->setFlash(__d('croogo', 'The campaign has been deleted'), 'default', array('class' => 'alert alert-success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'The campaign was not deleted'), 'default', array('class' => 'alert alert-danger'));
		$this->redirect(array('action' => 'index'));
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Campaign->recursive = 0;
		$this->set('campaigns', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Campaign->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid campaign'));
		}
		$options = array('conditions' => array('Campaign.' . $this->Campaign->primaryKey => $id));
		$this->set('campaign', $this->Campaign->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Campaign->create();
			if ($this->Campaign->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The campaign has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The campaign could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$organizations = $this->Campaign->Organization->find('list');
		$this->set(compact('organizations'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Campaign->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid campaign'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Campaign->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The campaign has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The campaign could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Campaign.' . $this->Campaign->primaryKey => $id));
			$this->request->data = $this->Campaign->find('first', $options);
		}
		$organizations = $this->Campaign->Organization->find('list');
		$this->set(compact('organizations'));
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
		$this->Campaign->id = $id;
		if (!$this->Campaign->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid campaign'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Campaign->delete()) {
			$this->Session->setFlash(__d('croogo', 'Campaign deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Campaign was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function get_resources($organization_id = null, $reservation_id = null) {
	
		$sql = "
			SELECT 	it.name as product_name, 
					-- od.item_type_id as product_id, 
					-- od.id as campaign_order_id, 
					sum(pack.quantity) as reserved, 
					-- sum(od.quantity) as booked, 
					-- (sum(pack.quantity) - sum(od.quantity)) as available, 
					it.id
			FROM 
					organizations org 
					-- , campaign_order_details od 
					, campaign_orders co 
					, packages pack
					, item_types it
			WHERE 1
			AND org.id = ".$organization_id."
			-- AND od.organization_id = org.id
			-- AND od.item_type_id = pack.item_type_id
			AND co.package_id = pack.id
			AND co.organization_id = org.id
			AND co.reservation_id = ".$reservation_id."
			AND co.status = 1
			AND pack.item_type_id = it.id
			GROUP BY 
				it.id 
		";
		$resources = $this->Campaign->query($sql);
		$this->set(compact('resources'));
		//return $resources;
		
		
	}
	
	public function get_resource($organization_id = null, $owner_id = null, $reservation_id = null, $item_type_id = null) {
	
		/* $options['fields'] = array(
								'packages.organization_id as owner_id',
								'packages.item_type_id as product_id', 
								'sum(packages.quantity) as reserved',
							);
		$options['joins'] = array(
								array('table' => 'organizations',
									'type' => 'LEFT',
									'conditions' => array(
										'organizations.id' => $organization_id
									)
								),
								array('table' => 'reservations',
									'type' => 'LEFT',
									'conditions' => array(
										'reservations.organization_id' => 'organizations.id'
									)
								),
								array('table' => 'campaign_orders',
									'type' => 'LEFT',
									'conditions' => array(
										'campaign_orders.reservation_id' => 'reservations.id'
									)
								),
								array('table' => 'packages',
									'type' => 'LEFT',
									'conditions' => array(
										'packages.id' => 'campaign_orders.packageid'
									)
								),
							);
		$options['conditions'] = array(
										'reservations.id' => $reservation_id,
										'packages.organization_id' => $owner_id,
									);
		$options['groups'] = array('packages.organization_id', 'campaign_order_details.item_type_id');
		
		$result['reserved'] = $this->Campaign->find('first', $options); */
		
		$options['fields'] = array(
								'campaign_order_details.owner_id as owner_id',
								'campaign_order_details.item_type_id as product_id', 
								'campaign_order_details.id as campaign_order_id', 
								'sum(campaign_order_details.quantity) as booked',
							);
		$options['joins'] = array(
								array('table' => 'campaign_order_details',
									'type' => 'LEFT',
									'conditions' => array(
										'campaign_order_details.campaign_id' => 'Campaign.id',
										'campaign_order_details.owner_id' =>  $owner_id,
										'campaign_order_details.organization_id' => $organization_id,
										'campaign_order_details.item_type_id' => $item_type_id,
									)
								),
							);
		$options['conditions'] = array(
										'Campaign.reservation_id' => $reservation_id,
									);
		$options['groups'] = array('CampaignOrderDetail.owner_id', 'CampaignOrderDetail.item_type_id');
		
		$result['booked'] = $this->Campaign->find('first', $options);
		
		return $result;
		
		//$this->set('result', $result);
	
	}
	
	
	public function get_resource1($organization_id = null, $item_type_id = null, $reservation_id = null) {
	
		// find the total reserved resources for each item_type
		$sql = "
			SELECT 	it.name as product_name, 
					-- od.item_type_id as product_id, 
					-- od.id as campaign_order_id, 
					sum(pack.quantity) as reserved, 
					-- sum(od.quantity) as booked, 
					-- (sum(pack.quantity) - sum(od.quantity)) as available, 
					it.id
			FROM 
					organizations org 
					-- , campaign_order_details od 
					, campaign_orders co 
					, packages pack
					, item_types it
			WHERE 1
			AND org.id = ".$organization_id."
			-- AND od.organization_id = org.id
			-- AND od.item_type_id = pack.item_type_id
			AND co.package_id = pack.id
			AND co.organization_id = org.id
			AND co.reservation_id = ".$reservation_id."
			AND co.status = 1
			AND pack.item_type_id = it.id
			AND it.id = '".$item_type_id."'  
			GROUP BY 
				it.id
		";
		
		$resources = $this->Campaign->query($sql);	
		$this->log('Resource: '.$sql);
		
		// find the total booked resources from order details
		$sql = "
			SELECT 	od.item_type_id as product_id, 
					od.id as campaign_order_id, 
					sum(od.quantity) as booked
			FROM 
					organizations org, campaign_order_details od 
			WHERE 1
			AND org.id = ".$organization_id."
			AND od.organization_id = org.id
			AND od.item_type_id = '".$item_type_id."'  
			GROUP BY 
				od.item_type_id
		";
		$this->log('Booked: '.$sql);
		$orders = $this->Campaign->query($sql);	
		$available = 0;
		
		//compare resource vs booked
		foreach($resources as $resource) {
			if (!empty($orders)) {
				foreach($orders as $order) {
					if ($order['od']['product_id'] == $resource['it']['id']) {
						$resource[0]['available'] = $resource[0]['reserved'] - $order[0]['booked'];
						array_push($resources, $resource[0]['available']);
						 //$this->log('available: '. print_r($resource));
					}
				}
			}
			//$this->log('$resource[0]['available']: '. $resource['available']);
		}
		
		
		//$this->set(compact('resources', 'booked'));
		print_r( $resources);
		return $resources;
	}
	
	public function check_resource($organization_id = null, $item_type_id = null, $quantity = null) {
	
		$sql = "
			SELECT pack.name as package_name, it.name as product_name, od.item_type_id as product_id, od.id as campaign_order_id, sum(pack.quantity) as reserved, sum(od.quantity) as booked, (sum(pack.quantity) - sum(od.quantity)) as available, co.id
			FROM 
				organizations org 
			    , campaign_order_details od 
				, campaign_orders co 
				, packages pack
				, item_types it
			WHERE 1
			AND org.id = ".$organization_id."
			AND od.organization_id = org.id
			AND od.item_type_id = pack.item_type_id
			AND co.package_id = pack.id
			AND co.organization_id = org.id
			AND co.status = 1
			AND pack.item_type_id = it.id
			AND od.item_type_id = '".$item_type_id."'  
			GROUP BY od.id
		";
		
		/* $sql = "
			SELECT 	it.name as product_name, 
					-- od.item_type_id as product_id, 
					-- od.id as campaign_order_id, 
					sum(pack.quantity) as reserved, 
					-- sum(od.quantity) as booked, 
					-- (sum(pack.quantity) - sum(od.quantity)) as available, 
					co.id
			FROM 
					organizations org 
					-- , campaign_order_details od 
					, campaign_orders co 
					, packages pack
					, item_types it
			WHERE 1
			AND org.id = ".$organization_id."
			-- AND od.organization_id = org.id
			-- AND od.item_type_id = pack.item_type_id
			AND co.package_id = pack.id
			AND co.organization_id = org.id
			AND pack.item_type_id = it.id
			-- AND od.item_type_id = '".$item_type_id."'  
			GROUP BY 
				it.id 
				-- , od.id
		";
		*/
		
		$resources = $this->Campaign->query($sql);	
		
		$sql = "
			SELECT pack.name as package_name, it.name as product_name, sum(pack.quantity) as reserved, co.id
			FROM 
				organizations org 
			    -- , campaign_order_details od 
				, campaign_orders co 
				, packages pack
				, item_types it
			WHERE 1
			AND org.id = ".$organization_id."
			-- AND od.organization_id = org.id
			-- AND od.item_type_id = pack.item_type_id
			AND co.package_id = pack.id
			AND co.organization_id = org.id
			AND co.status = 1
			AND pack.item_type_id = it.id
			-- AND od.item_type_id = '".$item_type_id."'  
			AND pack.item_type_id = '".$item_type_id."'  
			GROUP BY co.id
		";
		$packages = $this->Campaign->query($sql);
		
		print_r($packages);
		//die; 
		
		(isset($resources['0']['0']['available']) ? $balance = $resources['0']['0']['available']: $balance = $packages['0']['0']['reserved'] );
		
		($balance >= $quantity ? $result = true: $result = false);
		
		return $result;
	}
}


/**
 *  
 *  $sql = "
			SELECT pack.name as package_name, it.name as product_name, od.item_type_id as product_id, od.id as campaign_order_id, sum(pack.quantity) as reserved, sum(od.quantity) as booked, (sum(pack.quantity) - sum(od.quantity)) as available, co.id
			FROM 
				organizations org 
				, campaign_order_details od 
				, campaign_orders co 
				, packages pack
				, item_types it
			WHERE 1
			AND org.id = ".$organization_id."
			AND od.organization_id = org.id
			AND od.item_type_id = pack.item_type_id
			AND co.package_id = pack.id
			AND co.organization_id = org.id
			AND pack.item_type_id = it.id
			AND od.item_type_id = '".$item_type_id."'  
			GROUP BY od.id
		";
		
 */

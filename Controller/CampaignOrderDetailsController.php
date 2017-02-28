<?php
App::uses('PrideAppController', 'Pride.Controller');
App::uses('PackagesController', 'Pride.Controller');
App::uses('CampaignOrdersController', 'Pride.Controller');
App::uses('CampaignsController', 'Pride.Controller');
App::uses('CampaignOrderTypesController', 'Pride.Controller');
App::uses('CampaignDesignsController', 'Pride.Controller');
App::uses('ItemTypesController', 'Pride.Controller');
App::uses('ProvisionBusesController', 'Pride.Controller');
App::uses('DepotsController', 'Pride.Controller');
App::uses('RoutesController', 'Pride.Controller');
App::uses('BusesController', 'Pride.Controller');
App::uses('OrganizationsController', 'Pride.Controller');
App::uses('OrganizationTypesController', 'Pride.Controller');
App::uses('CakeTime', 'Utility');
/**
 * CampaignOrderDetails Controller
 *
 * @property CampaignOrderDetail $CampaignOrderDetail
 * @property PaginatorComponent $Paginator
 */
class CampaignOrderDetailsController extends PrideAppController {

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
		$this->CampaignOrderDetail->recursive = 0;
		$this->set('campaignOrderDetails', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CampaignOrderDetail->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid campaign order detail'));
		}
		$options = array('conditions' => array('CampaignOrderDetail.' . $this->CampaignOrderDetail->primaryKey => $id));
		$this->set('campaignOrderDetail', $this->CampaignOrderDetail->find('first', $options));
	}

	public function getCampaignOrderDetail($campaign_id = null) {
	
		$options = array('conditions' => array('CampaignOrderDetail.campaign_id' => $campaign_id));
		return	$this->CampaignOrderDetail->find('all', $options);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CampaignOrderDetail->create();
			if ($this->CampaignOrderDetail->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The campaign order detail has been saved'), 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The campaign order detail could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$campaigns = $this->CampaignOrderDetail->Campaign->find('list');
		$jobs = $this->CampaignOrderDetail->Job->find('list');
		$this->set(compact('campaigns', 'jobs'));
	}
	
	public function configure_site($campaign_id = null, $job_id = null, $balance = null, $item_type_id = null, $campaign_order_id = null ) {
	
	//$campaign['Campaign']['id'], $campaignOrderDetail['id'], $campaignOrderDetail['quantity'], $campaign['Job'][0]['id']
	
		if (!is_null($campaign_id) && !is_null($job_id) && !is_null($balance)) {
			if ($balance > 0) {
				if ($this->request->is('post')) {
					// check resource balance
					if ($this->request->data['CampaignOrderDetail']['quantity'] <= $balance){
						
						$this->request->data['CampaignOrderDetail']['item_type_id'] = $item_type_id;
						$this->request->data['CampaignOrderDetail']['campaign_id'] = $campaign_id;
						$this->request->data['CampaignOrderDetail']['campaign_order_id'] = $campaign_order_id;
						$this->request->data['CampaignOrderDetail']['job_id'] = $job_id;
						
						$this->CampaignOrderDetail->create();
						if ($this->CampaignOrderDetail->save($this->request->data)) {
							$this->Session->setFlash(__d('croogo', 'The campaign order detail has been saved'), 'default', array('class' => 'alert alert-success'));
							
							// provision campaign order detail
							$this->redirect(array('controller' => 'provision_buses', 'action' => 'multi_create', $campaign_id, $this->CampaignOrderDetail->getLastInsertId(), $this->request->data['CampaignOrderDetail']['quantity'], $job_id));
							
							$this->redirect(array('controller' => 'campaigns', 'action' => 'view', $campaign_id));
						} else {
							$this->Session->setFlash(__d('croogo', 'The campaign order detail could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
						}
					} else {
						$this->Session->setFlash(__d('croogo', 'The requested quantity exceeded the available resource. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
					}
					
				}
			} else {
				$this->Session->setFlash(__d('croogo', 'The requested resources has been exhausted. Please, purchase more site/unit as necessary. Thank you.'), 'default', array('class' => 'alert alert-danger'));
				$this->redirect(array('controller' => 'campaigns', 'action' => 'view', $campaign_id,'#' =>'tab_2-1'));
			}
			$this->set(compact('balance'));
			
			// define the campaign type by item_type_id
			$orderType = new CampaignOrderTypesController;
			
			$options['conditions'] = array('CampaignOrderType.item_type_id' => $item_type_id);
			$campaignOrderTypes = $orderType->CampaignOrderType->find('list', $options);
			$this->set(compact('campaignOrderTypes'));
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
		if (!$this->CampaignOrderDetail->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid campaign order detail'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->CampaignOrderDetail->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The campaign order detail has been saved'), 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The campaign order detail could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('CampaignOrderDetail.' . $this->CampaignOrderDetail->primaryKey => $id));
			$this->request->data = $this->CampaignOrderDetail->find('first', $options);
		}
		$campaigns = $this->CampaignOrderDetail->Campaign->find('list');
		$jobs = $this->CampaignOrderDetail->Job->find('list');
		$this->set(compact('campaigns', 'jobs'));
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
		$this->CampaignOrderDetail->id = $id;
		if (!$this->CampaignOrderDetail->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid campaign order detail'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CampaignOrderDetail->delete()) {
			$this->Session->setFlash(__d('croogo', 'Campaign order detail deleted'), 'default', array('class' => 'alert alert-success'));
			$this->redirect($this->request->referer());
		}
		$this->Session->setFlash(__d('croogo', 'Campaign order detail was not deleted'), 'default', array('class' => 'alert alert-danger'));
		$this->redirect(array('action' => 'index'));
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->CampaignOrderDetail->recursive = 0;
		$this->set('campaignOrderDetails', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->CampaignOrderDetail->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid campaign order detail'));
		}
		$options = array('conditions' => array('CampaignOrderDetail.' . $this->CampaignOrderDetail->primaryKey => $id));
		$this->set('campaignOrderDetail', $this->CampaignOrderDetail->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->CampaignOrderDetail->create();
			if ($this->CampaignOrderDetail->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The campaign order detail has been saved'), 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The campaign order detail could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$campaigns = $this->CampaignOrderDetail->Campaign->find('list');
		$jobs = $this->CampaignOrderDetail->Job->find('list');
		$this->set(compact('campaigns', 'jobs'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->CampaignOrderDetail->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid campaign order detail'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->CampaignOrderDetail->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The campaign order detail has been saved'), 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The campaign order detail could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('CampaignOrderDetail.' . $this->CampaignOrderDetail->primaryKey => $id));
			$this->request->data = $this->CampaignOrderDetail->find('first', $options);
		}
		$campaigns = $this->CampaignOrderDetail->Campaign->find('list');
		$jobs = $this->CampaignOrderDetail->Job->find('list');
		$this->set(compact('campaigns', 'jobs'));
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
		$this->CampaignOrderDetail->id = $id;
		if (!$this->CampaignOrderDetail->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid campaign order detail'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CampaignOrderDetail->delete()) {
			$this->Session->setFlash(__d('croogo', 'Campaign order detail deleted'), 'default', array('class' => 'alert alert-success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Campaign order detail was not deleted'), 'default', array('class' => 'alert alert-danger'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function rental_contract ($id = null, $org_id = null, $camp_id = null) {
		//Release the layout for reporting
		$this->autoLayout = false;
		
		$sql = "SELECT *, (month(end_date) - month(start_date)) as month FROM campaign_order_details as CampaignOrderDetail, campaigns as Campaign, organizations as Organization, jobs as Job, job_tasks as JobTask, provision_buses as ProvisionBus
		WHERE 
		CampaignOrderDetail.organization_id = Organization.id AND
		CampaignOrderDetail.campaign_id = Campaign.id AND
		CampaignOrderDetail.job_id = Job.id AND
		CampaignOrderDetail.id = JobTask.campaign_order_detail_id AND
		CampaignOrderDetail.id = ProvisionBus.campaign_order_detail_id AND
		CampaignOrderDetail.id = '" .$id. "' LIMIT 1";
		
		$campaignOrderDetails = $this->CampaignOrderDetail->query($sql);
		
		$this->set('campaignOrderDetails', $campaignOrderDetails);
		
		/* $options = array('conditions' => array('CampaignOrderDetail.' . $this->CampaignOrderDetail->primaryKey => $id));
		$this->set('campaignOrderDetail', $this->CampaignOrderDetail->find('first', $options)); */
	}
	
	public function debug_rental_contract ($id = null, $org_id = null, $camp_id = null) {
		//Release the layout for reporting
		//$this->autoLayout = false;
				
		//Query for Campaign Details
		/* $sql = "SELECT DISTINCT 
				organizations.id, organizations.organization_type_id, organizations.name, organizations.roc, organizations.address,  organizations.address2, organizations.address3, organizations.town, 	organizations.state, organizations.country, organizations.postcode, organizations.contact_person, organizations.contact_email, organizations.contact_number, organizations.extension, organizations.directline, organizations.fax_number, organizations.paid_capital, organizations.authorized_capital, organizations.staffs, organizations.registered_date, organizations.files, organizations.website
				FROM organizations, campaign_order_details 
				WHERE campaign_order_details.organization_id = organizations.id 
				AND campaign_order_details.organization_id = '".$org_id."'
				";
		
		$organizations = $this->CampaignOrderDetail->query($sql);
		
		$this->set('organizations', $organizations); */
		
		//Query for Campaigns
		/* $sql = "SELECT * FROM campaign_order_details as CampaignOrderDetails, campaigns as 	
				Campaign, organizations as Organization
				WHERE 
				CampaignOrderDetails.organization_id = Organization.id AND
				CampaignOrderDetails.campaign_id = Campaign.id AND
				CampaignOrderDetails.id = '" .$id. "'
				"; */
				
		$sql = "SELECT *, (month(end_date) - month(start_date)) as month FROM campaign_order_details as CampaignOrderDetail, campaigns as Campaign, organizations as Organization, jobs as Job, job_tasks as JobTask, provision_buses as ProvisionBus
		WHERE 
		CampaignOrderDetail.organization_id = Organization.id AND
		CampaignOrderDetail.campaign_id = Campaign.id AND
		CampaignOrderDetail.job_id = Job.id AND
		CampaignOrderDetail.id = JobTask.campaign_order_detail_id AND
		CampaignOrderDetail.id = ProvisionBus.campaign_order_detail_id AND
		CampaignOrderDetail.id = '" .$id. "' LIMIT 1";
		
		$campaignOrderDetails = $this->CampaignOrderDetail->query($sql);
		
		$this->set('campaignOrderDetails', $campaignOrderDetails);
		
		
	
	}
	
	public function has_configured($id = null) {
	
		//$options['fields'] = array('count(provision_buses.status) as total');
		$options['conditions'] = array(
									'CampaignOrderDetail.id' => $id,
									'provision_buses.status' => 1,
										
								);
		$options['joins'] = array(
								array('table' => 'provision_buses',
									'type' => 'LEFT',
									'conditions' => array(
										'provision_buses.campaign_order_detail_id' => $id
									)
								)
							);

		$campaign_progress = $this->CampaignOrderDetail->find('all', $options);
		
		$this->set(compact('campaign_progress'));
		return $campaign_progress;
	}
	
	public function get_provision_visual($id = null) {
	
		$options['fields'] = array('campaign_designs.id');
		$options['conditions'] = array(
									'CampaignOrderDetail.id' => $id,
									'provision_buses.status' => 1,
										
								);
		$options['joins'] = array(
								array('table' => 'provision_buses',
									'type' => 'LEFT',
									'conditions' => array(
										'provision_buses.campaign_order_detail_id' => $id
									)
								) ,
								array('table' => 'campaign_designs',
									'type' => 'LEFT',
									'conditions' => array(
										'provision_buses.campaign_design_id' => 'campaign_designs.id'
									)
								) 
							);

		$campaign_progress = $this->CampaignOrderDetail->find('all', $options);
		
		//$this->set(compact('campaign_progress'));
		return $campaign_progress;
	}
	
	public function debug_provision_download ($id = null, $campaign_id = null, $organization_id = null) {
		
		$provisionBus = new ProvisionBusesController;
		$options = array('conditions' => array('ProvisionBus.id' => $id));
		$provisionBuses = $provisionBus->ProvisionBus->find('first', $options);
		$this->set('provisionBuses', $provisionBuses);
		
		// instantiate object
		$campaign = new CampaignsController;
		$organization = new OrganizationsController;
		$organizationType = new OrganizationTypesController;
		$depot = new DepotsController;
		$route = new RoutesController;
		$bus = new BusesController;
		$campaignDesign = new CampaignDesignsController;
		
		// get the campaign
		$campaignOptions = array('conditions' => array('Campaign.id' => $campaign_id));
		$myCampaign = $campaign->Campaign->find('first', $campaignOptions);
		$orgOptions = array('conditions' => array('Organization.id' => $organization_id));
		$myOrg = $organization->Organization->find('first', $orgOptions);
		
		$sqlDepots = "SELECT * FROM depots WHERE id = '". $provisionBuses['ProvisionBus']['depot_id'] ."'";
		$myDepots = $route->Route->query($sqlDepots);
		
		$sqlRoutes = "SELECT * FROM routes WHERE id = '". $provisionBuses['ProvisionBus']['route_id'] ."'";
		$myRoutes = $route->Route->query($sqlRoutes);
		
		$sqlBuses = "SELECT * FROM buses WHERE id = '". $provisionBuses['ProvisionBus']['bus_id'] ."'";
		$myBuses = $bus->Bus->query($sqlBuses);
		
		$sqlCampaignDesign = "SELECT * FROM campaign_order_details, campaigns, campaign_designs WHERE campaign_order_details.campaign_id = campaigns.id AND campaigns.id = campaign_designs.campaign_id AND campaign_designs.id = '". $provisionBuses['ProvisionBus']['campaign_design_id'] ."' AND campaign_order_details.id = '". $provisionBuses['ProvisionBus']['campaign_order_detail_id'] ."'";
		$myCampaignDesigns = $campaignDesign->CampaignDesign->query($sqlCampaignDesign);
		
		$sqlOrgs = "SELECT * FROM organizations, users where organizations.id = users.organization_id AND organizations.id = '". $myCampaign['Campaign']['organization_id'] ."'";
		$myOrganizations = $organization->Organization->query($sqlOrgs);
		
		$sqlOrgTypes = "SELECT * FROM organization_types WHERE organization_types.id = '". $myOrganizations[0]['organizations']['organization_type_id'] ."'";
		$myOrgTypes = $organizationType->OrganizationType->query($sqlOrgTypes);
		
		$this->set('myCampaign', $myCampaign);
		$this->set('myOrg', $myOrg);
		$this->set('myDepots', $myDepots);
		$this->set('myRoutes', $myRoutes);
		$this->set('myBuses', $myBuses);
		$this->set('myCampaignDesigns', $myCampaignDesigns);
		$this->set('myOrganizations', $myOrganizations);
		$this->set('myOrgTypes', $myOrgTypes);
	}
	
	public function provision_download ($id = null, $campaign_id = null, $organization_id = null) {
		$this->autoLayout = false;
		
		$provisionBus = new ProvisionBusesController;
		$options = array('conditions' => array('ProvisionBus.id' => $id));
		$provisionBuses = $provisionBus->ProvisionBus->find('first', $options);
		$this->set('provisionBuses', $provisionBuses);
		
		// instantiate object
		$campaign = new CampaignsController;
		$organization = new OrganizationsController;
		$organizationType = new OrganizationTypesController;
		$depot = new DepotsController;
		$route = new RoutesController;
		$bus = new BusesController;
		$campaignDesign = new CampaignDesignsController;
		
		// get the campaign
		$campaignOptions = array('conditions' => array('Campaign.id' => $campaign_id));
		$myCampaign = $campaign->Campaign->find('first', $campaignOptions);
		$orgOptions = array('conditions' => array('Organization.id' => $organization_id));
		$myOrg = $organization->Organization->find('first', $orgOptions);
		
		$sqlDepots = "SELECT * FROM depots WHERE id = '". $provisionBuses['ProvisionBus']['depot_id'] ."'";
		$myDepots = $route->Route->query($sqlDepots);
		
		$sqlRoutes = "SELECT * FROM routes WHERE id = '". $provisionBuses['ProvisionBus']['route_id'] ."'";
		$myRoutes = $route->Route->query($sqlRoutes);
		
		$sqlBuses = "SELECT * FROM buses WHERE id = '". $provisionBuses['ProvisionBus']['bus_id'] ."'";
		$myBuses = $bus->Bus->query($sqlBuses);
		
		$sqlCampaignDesign = "SELECT * FROM campaign_order_details, campaigns, campaign_designs WHERE campaign_order_details.campaign_id = campaigns.id AND campaigns.id = campaign_designs.campaign_id AND campaign_designs.id = '". $provisionBuses['ProvisionBus']['campaign_design_id'] ."' AND campaign_order_details.id = '". $provisionBuses['ProvisionBus']['campaign_order_detail_id'] ."'";
		$myCampaignDesigns = $campaignDesign->CampaignDesign->query($sqlCampaignDesign);
		
		$sqlOrgs = "SELECT * FROM organizations, users where organizations.id = users.organization_id AND organizations.id = '". $myCampaign['Campaign']['organization_id'] ."'";
		$myOrganizations = $organization->Organization->query($sqlOrgs);
		
		$sqlOrgTypes = "SELECT * FROM organization_types WHERE organization_types.id = '". $myOrganizations[0]['organizations']['organization_type_id'] ."'";
		$myOrgTypes = $organizationType->OrganizationType->query($sqlOrgTypes);
		
		$this->set('myCampaign', $myCampaign);
		$this->set('myOrg', $myOrg);
		$this->set('myDepots', $myDepots);
		$this->set('myRoutes', $myRoutes);
		$this->set('myBuses', $myBuses);
		$this->set('myCampaignDesigns', $myCampaignDesigns);
		$this->set('myOrganizations', $myOrganizations);
		$this->set('myOrgTypes', $myOrgTypes);
	}
	
	public function debug_spad_letter ($id = null, $campaign_id = null, $organization_id = null, $provision_bus_id = null) {
	
		$options = array('conditions' => array('CampaignOrderDetail.' . $this->CampaignOrderDetail->primaryKey => $id));
		$this->set('campaignOrderDetail', $this->CampaignOrderDetail->find('first', $options));
		
		$campaignDesign = new CampaignDesignsController;
		$campaignDesignoptions = array('conditions' => array('CampaignDesign.campaign_id' => $campaign_id));
		$campaignDesigns = $campaignDesign->CampaignDesign->find('all', $campaignDesignoptions);
		$this->set('campaignDesigns', $campaignDesigns);
		
		$this->set('doc_number', $this->generate_doc_number($id));
		
	}
	
	public function spad_letter ($id = null, $campaign_id = null, $organization_id = null, $provision_bus_id = null) {
		
		$this->autoLayout = false;
		
		$options = array('conditions' => array('CampaignOrderDetail.' . $this->CampaignOrderDetail->primaryKey => $id));
		$this->set('campaignOrderDetail', $this->CampaignOrderDetail->find('first', $options));
		
		$campaignDesign = new CampaignDesignsController;
		$campaignDesignoptions = array('conditions' => array('CampaignDesign.campaign_id' => $campaign_id));
		$campaignDesigns = $campaignDesign->CampaignDesign->find('all', $campaignDesignoptions);
		$this->set('campaignDesigns', $campaignDesigns);
		
		$this->set('doc_number', $this->generate_doc_number($id));
		
	}

	public function generate_doc_number($campaign_order_detail_id) {
	
		// if campaign_order_details still hvn't generate doc number
		$options['conditions'] = array(
										'CampaignOrderDetail.id' => $campaign_order_detail_id,
										'CampaignOrderDetail.ref_number !=' => 0,
									);
		
		$myRefNumber = $this->CampaignOrderDetail->find('first', $options);
		
		if (empty($myRefNumber)) { // then generate doc number
		
			$year = date("Y");
			
			// find last generated ref_number
			$options['fields'] = array('ref_number', 'created');
			$options['conditions'] = array('CampaignOrderDetail.ref_number !=' => '0');
			$options['order'] = array('CampaignOrderDetail.ref_number DESC');
			
			$lastRefNumber = $this->CampaignOrderDetail->find('first', $options);
			
			//print_r($campaignOrderDetail);
			
			if (empty($lastRefNumber)) { 		// generate ref_number
			
				$ref_number = 1;
				
			} else {			// increment ref_number
			
				$ref_number = $lastRefNumber['CampaignOrderDetail']['ref_number'] + 1;
				
			}
			
			// generate document number with left-zero padding ref_number 
			$doc_number = Configure::read('AMS.spad_doc_number'). str_pad($ref_number, 4, '0', STR_PAD_LEFT).'-'.$year;
				
			// update to the respective campaign_order_details row
			$this->CampaignOrderDetail->updateAll(
				array( //set
					'CampaignOrderDetail.doc_number' => "'".$doc_number."'", 
					'CampaignOrderDetail.ref_number' => $ref_number, 
					),
				array( // where
					'CampaignOrderDetail.id' => $campaign_order_detail_id, 
					'CampaignOrderDetail.ref_number' => 0, 
					)
				);
		} else {
		
			$doc_number = $myRefNumber['CampaignOrderDetail']['doc_number'];
		}
		
		return $doc_number;
	}
	
	public function get_resource($campaign_order_id = null) {
	
		// find all campaign order detail object which is related to the campaign order
		
		$options['fields'] = array('sum(CampaignOrderDetail.quantity) as booked');
		$options['conditions'] = array('CampaignOrderDetail.campaign_order_id' => $campaign_order_id);
		$options['groups'] = array('CampaignOrderDetail.campaign_order_id');
		
		return $this->CampaignOrderDetail->find('first', $options);
		
		
		
	}
}

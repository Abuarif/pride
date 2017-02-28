<?php
App::uses('PrideAppController', 'Pride.Controller');
App::uses('OrganizationsController', 'Pride.Controller');
App::uses('CampaignsController', 'Pride.Controller');
App::uses('CampaignOrdersController', 'Pride.Controller');
App::uses('CampaignDesignsController', 'Pride.Controller');
App::uses('ReservationsController', 'Pride.Controller');
App::uses('PaymentAdvicesController', 'Members.Controller');
/**
 * Approvals Controller
 *
 * @property Approval $Approval
 * @property PaginatorComponent $Paginator
 */
class ReportsController extends PrideAppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	/* function beforeFilter() {
		$this->Auth->allow('assignment');
	} */
/**
 * index method
 *
 * @return void
 */
	public function index() {
		//$this->Approval->recursive = 0;
		//$this->set('approvals', $this->paginate());
	}

	public function dashboard() {
	
		$this->advertiser_summary();
		
		$this->campaign_progress();
	}

	public function business_activity() {
	
		$this->advertiser_summary();
	}

	public function advertiser_summary() {
	
		// Instantiate objects for manipulation
		$organization 	= new OrganizationsController;
		$campaign		= new CampaignsController;
		$campaignOrder 	= new CampaignOrdersController;
		$campaignDesign	= new CampaignDesignsController;
		
		// organizations
		
		$orgOptions 	= array('conditions' => array('Organization.status=1', 'Organization.organization_type_id=4'));
		$myApprovedOrg = $organization->Organization->find('all', $orgOptions);
		
		$orgOptions 	= array('conditions' => array('Organization.status=0', 'Organization.organization_type_id=4'));
		$myNewOrg = $organization->Organization->find('all', $orgOptions);

		$approved = count($myApprovedOrg);
		$new = count($myNewOrg);
		
		$total = $approved + $new;
		$percentApproved = round($approved/$total*100, 0, PHP_ROUND_HALF_UP);
		$percentNew = round($new/$total*100, 0, PHP_ROUND_HALF_UP);
		
		// visuals
		
		$visualOptions 	= array('conditions' => array('CampaignDesign.tag_code != ""'));
		$myApprovedDesigns = $campaignDesign->CampaignDesign->find('all', $visualOptions);
		
		$visualOptions 	= array('conditions' => array("CampaignDesign.tag_code = ''"));
		$myNewDesigns = $campaignDesign->CampaignDesign->find('all', $visualOptions);
		
		$approvedDesign = count($myApprovedDesigns);
		$newDesign = count($myNewDesigns);
		
		$totalDesign = $approvedDesign + $newDesign;
		$percentApprovedDesign = round($approvedDesign/$totalDesign*100, 0, PHP_ROUND_HALF_UP);
		$percentNewDesign = round($newDesign/$totalDesign*100, 0, PHP_ROUND_HALF_UP);
		
		// orders
		
		$orderOptions 	= array('conditions' => array('CampaignOrder.status = 1'));
		$myApprovedOrders = $campaignOrder->CampaignOrder->find('all', $orderOptions);
		
		$orderOptions 	= array('conditions' => array("CampaignOrder.status = 0"));
		$myNewOrders = $campaignOrder->CampaignOrder->find('all', $orderOptions);
		
		$approvedOrder = count($myApprovedOrders);
		$newOrder = count($myNewOrders);
		
		$totalOrder = $approvedOrder + $newOrder;
		$percentApprovedOrder = round($approvedOrder/$totalOrder*100, 0, PHP_ROUND_HALF_UP);
		$percentNewOrder = round($newOrder/$totalOrder*100, 0, PHP_ROUND_HALF_UP);
		
		
		$this->set(compact('total','approved','new','percentApproved','percentNew'));
		$this->set(compact('totalOrder','approvedOrder','newOrder','percentApprovedOrder','percentNewOrder'));
		$this->set(compact('totalDesign','approvedDesign','newDesign','percentApprovedDesign','percentNewDesign'));
	
		
	}
	
	public function financial() {
	
	}
	
	public function activity() {
	
	
		// Query the total registered bus in depot
		
		$sql = "SELECT 	depot.name 
						,count(route.id) as total_route
					
				FROM 	depots depot, routes route
				WHERE 	1
				AND 	route.depot_id 	= depot.id
				";
				
		
		if ($this->Session->read('Auth.User.Role.alias') == Configure::read('AMS.role_rapidbus_administrator') ) {
			$sql .= " AND depot.id = ". $this->Session->read('Auth.User.depot_id');
		}
		
		$sql .= " GROUP BY depot.name";
		
		$routeStats = $this->Report->query($sql);
		
		$sql = "SELECT 	depot.name 
						,count(bus.id) as total_bus
				FROM 	depots depot, buses bus
				WHERE 	1
				AND 	bus.depot_id 	= depot.id
				";
				
		
		if ($this->Session->read('Auth.User.Role.alias') == Configure::read('AMS.role_rapidbus_administrator') ) {
			$sql .= " AND depot.id = ". $this->Session->read('Auth.User.depot_id');
		}
		
		$sql .= " GROUP BY depot.name";
		
		$busStats = $this->Report->query($sql);
		
		$this->set(compact('routeStats', 'busStats'));
		
		echo $this->campaign_progress();
		
		//$this->active_view();
	}
	
	public function assignment() {
	
	}
	
	public function excutive() {
	
	}
	
	public function audit() {
	
	}
	
	public function advertiser() {
	
		$this->campaign_progress();
		
		$this->active_view();
	}
	
	public function my_progress() {
	
		$this->campaign_progress();
		
		//$this->active_view();
	}
	
	public function campaign_progress() {
	
		$sql = "SELECT 	organization.name , 
						campaign.name,
						pb.campaign_order_detail_id, 
						co.id,
						pack.quantity, 
						count(pb.status) as totalProvisionedBus,
						(pack.quantity - count(pb.status)) as balance
				FROM 	provision_buses pb, 
						packages pack, campaign_orders co, campaigns campaign, organizations organization
				WHERE 	1
				AND 	pb.campaign_order_detail_id = co.id
				AND 	co.package_id = pack.id
				AND 	co.campaign_id = campaign.id 
				AND 	campaign.organization_id = organization.id
			    AND	    pb.status = 1
			";
		
		if ($this->Session->read('Auth.User.Role.alias') == Configure::read('AMS.role_pride_advertiser') ) {
			$sql .= " AND 	organization.id = ". $this->Session->read('Auth.User.organization_id');
		}
		
		$sql .= " GROUP BY pb.campaign_order_detail_id";
		
		//debug
		//echo $sql;
		
		$campaign_progress = $this->Report->query($sql);
		
		$this->set(compact('campaign_progress'));
		

	}
	
	public function getCampaign() {
	
		$sql = "select count(id) as total
				from campaigns
				where organization_id = ".$this->Session->read('Auth.User.organization_id')."
				and status = 0
				";
		
		$campaign = $this->Report->query($sql);
		
		return $campaign;
	}
	
	public function getPOI() {
	
		$sql = "select count(id) as total
				from poi_carts
				where user_id = ".$this->Session->read('Auth.User.id')."
				and status = 1
				";
		
		$poi = $this->Report->query($sql);
		
		return $poi;
	}
	
	public function getSignUp($status = null) {
	
		$sql = "select status , count(id) as total
				from users
				where role_id = 2
				and status = ".$status."
				group by status
				";
		
		$signup = $this->Report->query($sql);
		
		return $signup;
	}
	
	public function getAdvertiserRegistration($status = null) {
	
		if ($status == 0) {
			$sql = "select count(id) as total
				from organizations
				where organization_type_id in(4, 5, 6)
				and isSubmitted = 1
				and isVerified = 0
				and isApproved = 0
				";
		} else if ($status == 1) {
			$sql = "select count(id) as total
				from organizations
				where organization_type_id in(4, 5, 6)
				and status = 1
				and isSubmitted = 1
				and isVerified = 1
				";
		}
		$advertiserRegistration = $this->Report->query($sql);
		
		//$this->set(compact('advertiserRegistration'));
		
		return $advertiserRegistration;
	}
	
	public function getVisuals($status = null) {
	
		$sql = "select count(c.id) as total
				from campaigns c, campaign_designs d
				where 1
				and c.id = d.campaign_id";
		if ($this->Session->read('Auth.User.Role.alias') == Configure::read('AMS.role_pride_advertiser') ) {
			$sql .= " and c.organization_id = ".$this->Session->read('Auth.User.organization_id');
		}
				
		if ($status == 0) {
			$sql .= "
				and d.tag_code = ''
				";
		} else if ($status == 1) { 
			$sql .= "
				and tag_code != ''
				";
		}
		$visuals = $this->Report->query($sql);
		
		return $visuals;
	}
	public function getBookings($status = null) {
	
		
		/* 	$sql = "select count(co.id) as total
				from organizations org, campaign_orders co
				where 1
				and org.id = co.organization_id
				and co.organization_id = ".$this->Session->read('Auth.User.organization_id')."
				and co.status = ".$status."
				";
		$this->log($sql);
		$bookings = $this->Report->query($sql); */
		
		 
		$campaignOrder = new CampaignOrdersController;
				
		$query = array(
			'fields' => array('count(CampaignOrder.id) as total'),
			'conditions' => 
				array(
					'CampaignOrder.status' => $status, 
					'CampaignOrder.organization_id' => CakeSession::read('Auth.User.Organization.id') 
					),
				);
		
		$bookings = $campaignOrder->CampaignOrder->find('first', $query);
		
		return $bookings;
	}
	
	public function getReservations($status = null) {
	
		$reservation = new ReservationsController;
		
		if ($this->Session->read('Auth.User.Role.alias') == Configure::read('AMS.role_pride_advertiser') ) {
			$query = array(
				'fields' => array('count(Reservation.id) as total'),
				'conditions' => 
					array(
						'Reservation.status' => $status, 
						'Reservation.organization_id' => CakeSession::read('Auth.User.Organization.id') 
					),
				);
		} else {
			$query = array(
				'fields' => array('count(Reservation.id) as total'),
				'conditions' => 
					array(
						'Reservation.status' => $status, 
					),
				);
		}
		
		return $reservation->Reservation->find('first', $query); 
	}
	
	public function getPaymentAdvices($status = null) {
	
		$advice = new PaymentAdvicesController;
		
		$query = array(
			'fields' => array('count(PaymentAdvice.id) as total'),
			'conditions' => 
				array(
					'PaymentAdvice.status' => $status, 
					'PaymentAdvice.organization_id' => CakeSession::read('Auth.User.Organization.id') 
					),
				);
		
		return $advice->PaymentAdvice->find('first', $query);  
	}
}

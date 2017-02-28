<?php 
	// submit if total mandatory attachment equals to total mandatory document requirement
	
	if ($this->requestAction('/pride/organization_attachments/count_attachment/'.$this->Session->read('Auth.User.organization_id')) == $this->requestAction('/pride/document_references/total_mandatory') ) {
		$isUploaded  = true;
	}else{
		$isUploaded  = false;
	}

	// echo 'HERE: '.$this->request->here;
?>

<?php  if ($this->Session->read('Auth.User.Role.alias') == Configure::read('AMS.role_pride_administrator') ) { ?>

<!-- --------------------------------- AMS Admin ---------------------------------------->
	<ul class="sidebar-menu">
		<!-- ../temporary closed <li>
			<a href="<?php echo $this->webroot; ?>">
				<i class="fa fa-home"></i> <span>Home</span>
			</a>
		</li> ../ end temporary closed -->
		<li>
			<a href="<?php echo $this->webroot.'members/members/dashboard'; ?>">
				<i class="fa fa-dashboard"></i> <span>Dashboard</span>
			</a>
		</li>
		<li class="treeview">
			<a href="#">
				<i class="fa fa-user"></i> <span>Advertisers</span>
				<i class="fa fa-angle-left pull-right"></i>
			</a>
			<ul class="treeview-menu">
				<li><a href="<?php echo $this->webroot.'pride/organizations'; ?>"><i class="fa fa-angle-double-right"></i> New Registrations</a></li>
				<li><a href="<?php echo $this->webroot.'pride/organizations/approved_index'; ?>"><i class="fa fa-angle-double-right"></i> Verified Companies</a></li>
			</ul>
		</li>						
		<li class="treeview">
			<a href="#">
				<i class="fa fa-tag"></i> <span>Resource Reservations</span>
				<i class="fa fa-angle-left pull-right"></i>
			</a>
			<ul class="treeview-menu">
				<li><a href="<?php echo $this->webroot.'pride/reservations/index/0'; ?>"><i class="fa fa-angle-double-right"></i> Pre-Approved List</a></li>
				<li><a href="<?php echo $this->webroot.'pride/reservations/index/1'; ?>"><i class="fa fa-angle-double-right"></i> Approved List</a></li>
			</ul>
		</li>	
		<li class="treeview">
			<a href="#">
				<i class="fa fa-external-link-square"></i> <span>Running Campaigns</span>
				<i class="fa fa-angle-left pull-right"></i>
			</a>
			<ul class="treeview-menu">
				<li><a href="<?php echo $this->webroot.'pride/campaigns'; ?>"><i class="fa fa-angle-double-right"></i> Active Campaigns</a></li>
				<li><a href="<?php echo $this->webroot.'pride/campaigns/index/archieved'; ?>"><i class="fa fa-angle-double-right"></i> Archived Campaigns</a></li>
			</ul>
		</li>
		<li class="treeview">
			<a href="#">
				<i class="fa fa-upload"></i> <span>Visual Submissions</span>
				<i class="fa fa-angle-left pull-right"></i>
			</a>
			<ul class="treeview-menu">
				<li><a href="<?php echo $this->webroot.'pride/campaign_designs'; ?>"><i class="fa fa-angle-double-right"></i> New Submissions</a></li>
				<li><a href="<?php echo $this->webroot.'pride/campaign_designs/index/1'; ?>"><i class="fa fa-angle-double-right"></i> Approved List</a></li>
				<li><a href="<?php echo $this->webroot.'pride/campaign_designs/index/1#'; ?>"><i class="fa fa-angle-double-right"></i> Templates ( .ai format)</a></li>
			</ul>
		</li>
		<li class="treeview">
			<a href="#">
				<i class="fa fa-calendar "></i> <span>Bus Calendar</span>
				<i class="fa fa-angle-left pull-right"></i>
			</a>
			<ul class="treeview-menu">
				<li><a href="<?php echo $this->webroot.'pride/bus_transactions'; ?>"><i class="fa fa-angle-double-right"></i>List of Buses</a></li>
				<li><a href="<?php echo $this->webroot.'pride/bus_transactions/add'; ?>"><i class="fa fa-angle-double-right"></i>New Bus Calendar</a></li>
			</ul>
		</li>
		<li class="treeview">
			<a href="#">
				<i class="fa fa-check-square"></i> <span>Work Orders</span>
				<i class="fa fa-angle-left pull-right"></i>
			</a>
			<ul class="treeview-menu">
				<li><a href="<?php echo $this->webroot.'pride/jobs'; ?>"><i class="fa fa-angle-double-right"></i>List of Jobs</a></li>
				<!-- 
				<li><a href="<?php echo $this->webroot.'pride/jobs/add'; ?>"><i class="fa fa-angle-double-right"></i>New Job</a></li>
				<li><a href="<?php echo $this->webroot.'pride/job_types/add'; ?>"><i class="fa fa-angle-double-right"></i>New Job Type</a></li>
				<li><a href="<?php echo $this->webroot.'pride/job_types'; ?>"><i class="fa fa-angle-double-right"></i>List of Job Types</a></li>
				<li><a href="<?php echo $this->webroot.'pride/job_tasks/add'; ?>"><i class="fa fa-angle-double-right"></i>New Job Task</a></li>
				<li><a href="<?php echo $this->webroot.'pride/job_tasks'; ?>"><i class="fa fa-angle-double-right"></i>List of Job Tasks</a></li>
				<li><a href="<?php echo $this->webroot.'pride/job_task_assignments/add'; ?>"><i class="fa fa-angle-double-right"></i>New Job Task Assignment</a></li>
				<li><a href="<?php echo $this->webroot.'pride/job_task_assignments'; ?>"><i class="fa fa-angle-double-right"></i>List of Job Task Assignments</a></li>
				-->
			</ul>
		</li>
		<li class="treeview">
			<a href="#">
				<i class="fa fa-gear"></i> <span>System Settings</span>
				<i class="fa fa-angle-left pull-right"></i>
			</a>
			<ul class="treeview-menu">
				<li><a href="<?php echo $this->webroot.'pride/packages/index'; ?>"><i class="fa fa-angle-double-right"></i> List of Packages</a></li>
				<li><a href="<?php echo $this->webroot.'pride/packages/add'; ?>"><i class="fa fa-angle-double-right"></i> New Packages</a></li>
				<li><a href="<?php echo $this->webroot.'pride/route_details'; ?>"><i class="fa fa-angle-double-right"></i> Route Management</a></li>
				<li><a href="<?php echo $this->webroot.'depots'; ?>"><i class="fa fa-angle-double-right"></i> List of Depots</a></li>
				<li><a href="<?php echo $this->webroot.'pride/depots/add'; ?>"><i class="fa fa-angle-double-right"></i> New Depot</a></li>
				<li><a href="<?php echo $this->webroot.'provision_my_bus'; ?>"><i class="fa fa-angle-double-right"></i> List of Provision Buses</a></li>
				<li><a href="<?php echo $this->webroot.'pride/buses/index'; ?>"><i class="fa fa-angle-double-right"></i> List of Buses</a></li>
				<li><a href="<?php echo $this->webroot.'pride/buses/add'; ?>"><i class="fa fa-angle-double-right"></i> New Bus</a></li>
				<li><a href="<?php echo $this->webroot.'pride/routes'; ?>"><i class="fa fa-angle-double-right"></i> List of Routes</a></li>
				<li><a href="<?php echo $this->webroot.'pride/routes/add'; ?>"><i class="fa fa-angle-double-right"></i> New Route</a></li>
			</ul>
		</li>
		<!-- <li>
			<a href="<?php echo $this->webroot.'pride/reports/dashboard'; ?>">
				<i class="fa fa-clipboard"></i> <span>Reports</span>
			</a>
		</li> -->
	</ul>

<?php  } else if ($this->Session->read('Auth.User.Role.alias') == Configure::read('AMS.role_pride_advertiser') ) { ?>

<!-- --------------------------------- AMS Advertiser ---------------------------------------->

	<ul class="sidebar-menu">
		<!-- ../temporary closed  -->
		<li>
			<a href="<?php echo $this->webroot; ?>promoted">
				<i class="fa fa-home"></i> <span>Home</span>
			</a>
		</li> 
		<li>
			<a href="<?php echo $this->webroot.'members/members/advertiser_dashboard'; ?>">
				<i class="fa fa-dashboard"></i> <span>Dashboard</span>
			</a>
		</li>
		<!-- <li>
			<a href="<?php echo $this->webroot.'pride/packages/promotion'; ?>">
				<i class="fa fa-th"></i> <span>Promotion Packages</span>
			</a>
		</li> -->
		<li>
			<a href="<?php echo $this->webroot.'pride/campaigns/timeline'; ?>">
				<i class="fa  fa-clock-o"></i> <span>Campaign Timeline</span>
			</a>
		</li>
		<li class="treeview">
			<a href="#">
				<i class="fa fa-user"></i> <span>Company Profiles</span>
				<?php if ($this->Session->read('Auth.User.Organization.isSubmitted')) { ?>
					<!-- ../temporary closed 
					<small class="badge pull-right bg-green"><i class="fa fa-check"></i></small> 
					../temporary closed -->
					<i class="fa fa-angle-left pull-right"></i>
				<?php } else { ?>
					<i class="fa fa-angle-left pull-right"></i>
				<?php } ?>
			</a>
			
				<ul class="treeview-menu">
					<li><a href="<?php echo $this->webroot.'pride/organizations/edit_my_organization/'.$this->Session->read('Auth.User.organization_id'); ?>"><i class="fa fa-angle-double-right"></i> Profile Update</a></li>
					<li><a href="<?php echo $this->webroot.'pride/organizations/declare_shareholder/'.$this->Session->read('Auth.User.organization_id'); ?>"><i class="fa fa-angle-double-right"></i> Shareholders</a></li>
					<li><a href="<?php echo $this->webroot.'pride/organizations/declare_keypersonnel/'.$this->Session->read('Auth.User.organization_id'); ?>"><i class="fa fa-angle-double-right"></i> Key Personnels</a></li>
					<li><a href="<?php echo $this->webroot.'pride/organizations/upload_documentation/'.$this->Session->read('Auth.User.organization_id'); ?>"><i class="fa fa-angle-double-right"></i> Upload Documentation</a></li>
			<?php if ( !$this->Session->read('Auth.User.Organization.isSubmitted') && ($isUploaded) ) { ?>
					<li><a href="<?php echo $this->webroot.'pride/organizations/submit_application/'.$this->Session->read('Auth.User.organization_id'); ?>"><i class="fa fa-angle-double-right"></i>Submit Application</a></li>
			<?php } else { ?>	
					<li><a href="<?php echo $this->webroot.'pride/organizations/view/'.$this->Session->read('Auth.User.organization_id'); ?>"><i class="fa fa-angle-double-right"></i> Submitted Form</a></li>
				
			<?php } ?>
			</ul>
		</li>
		<li class="treeview">
			<a href="#">
				<i class="fa fa-map-marker"></i> <span>Point of Interest (P.O.I)</span>
				<i class="fa fa-angle-left pull-right"></i>
			</a>
			<ul class="treeview-menu">
				<li><a href="<?php echo $this->webroot.'pride/route_details'; ?>"><i class="fa fa-angle-double-right"></i>Search Location</a></li>
				<li><a href="<?php echo $this->webroot.'pride/poi_carts/index'; ?>"><i class="fa fa-angle-double-right"></i>My P.O.I</a></li>				
			</ul>
		</li>
		<li class="treeview">
			<a href="#">
				<i class="fa fa-credit-card"></i> <span>My Payments</span>
				<i class="fa fa-angle-left pull-right"></i>
			</a> 
			<ul class="treeview-menu">
				<li><a href="<?php echo $this->webroot.'members/payment_advices/myview/0'; ?>"><i class="fa fa-angle-double-right"></i> Pending Payments</a></li>
				<li><a href="<?php echo $this->webroot.'members/payment_advices/myview/1'; ?>"><i class="fa fa-angle-double-right"></i> Approved Payments</a></li>
			</ul>
		</li>
		<li class="treeview">
			<a href="#">
				<i class="fa fa-tags"></i> <span>My Reservations</span>
				<i class="fa fa-angle-left pull-right"></i>
			</a> 
			<ul class="treeview-menu">
				<li><a href="<?php echo $this->webroot.'pride/reservations/add'; ?>"><i class="fa fa-angle-double-right"></i> Create New Resources</a></li>
				<li><a href="<?php echo $this->webroot.'pride/reservations/index/0'; ?>"><i class="fa fa-angle-double-right"></i> Pre-Approved List</a></li>
				<li><a href="<?php echo $this->webroot.'pride/reservations/index/1'; ?>"><i class="fa fa-angle-double-right"></i> Approved List</a></li>
			</ul>
		</li>
		<li class="treeview">
			<a href="#">
				<i class="fa fa-flag"></i> <span>My Campaigns</span>
				<i class="fa fa-angle-left pull-right"></i>
			</a>
			<ul class="treeview-menu">
				<li><a href="<?php echo $this->webroot.'pride/campaigns'; ?>"><i class="fa fa-angle-double-right"></i>Campaign List</a></li>
				<!-- ../temporary closed 
				<li><a href="<?php echo $this->webroot.'pride/campaigns/timeline'; ?>"><i class="fa fa-angle-double-right"></i>Campaign Timeline</a></li>
				../temporary closed -->
			</ul>
		</li>						
		<li class="treeview">
			<a href="#">
				<i class="fa fa-picture-o"></i> <span>My Visuals</span>
				<i class="fa fa-angle-left pull-right"></i>
			</a>
			<ul class="treeview-menu">
				<li><a href="<?php echo $this->webroot.'pride/campaign_designs/add'; ?>"><i class="fa fa-angle-double-right"></i> Add New Visual</a></li>
				<li><a href="<?php echo $this->webroot.'pride/campaign_designs'; ?>"><i class="fa fa-angle-double-right"></i> New Visual List</a></li>
				<li><a href="<?php echo $this->webroot.'pride/campaign_designs/index/1'; ?>"><i class="fa fa-angle-double-right"></i> Approved Visual List</a></li>
			</ul>
		</li>
		<!-- <li>
			<a href="<?php echo $this->webroot.'pride/reports/dashboard'; ?>">
				<i class="fa fa-clipboard"></i> <span>Reports</span>
			</a>
		</li> -->
	</ul>
	
	
<?php  } else if ($this->Session->read('Auth.User.Role.alias') == Configure::read('AMS.role_pride_registered') ) { ?>

<!-- --------------------------------- Registered User ---------------------------------------->

	<ul class="sidebar-menu">
		<!-- ../temporary closed/.. <li>
			<a href="<?php echo $this->webroot; ?>">
				<i class="fa fa-home"></i> <span>Home</span>
			</a>
		</li> ../end temporary closed/.. -->
		<li>
			<a href="<?php echo $this->webroot.'members'; ?>">
				<i class="fa fa-dashboard"></i> <span>Dashboard</span>
			</a>
		</li>
		<li>
			<a href="<?php echo $this->webroot.'info'; ?>">
				<i class="fa fa-sign-in"></i> <span>Signup</span> 
				<!-- ../temporary closed 
					<small class="badge pull-right bg-green"><i class="fa fa-check"></i></small> 
				../temporary closed -->
			</a>
		</li>
		<?php //if ($this->Session->read('Auth.User.Organization.isAdviced') == 1) { ?>
		<li class="treeview">
			<a href="#">
				<i class="fa fa-credit-card"></i> <span>Payment Advice</span>
				<?php if ($this->Session->read('Auth.User.Organization.isAdviced')) { ?>
					<small class="badge pull-right bg-green"><i class="fa fa-check"></i></small>
				<?php } else { ?>
					<i class="fa fa-angle-left pull-right"></i>
				<?php } ?>
			</a>
		
			<ul class="treeview-menu">
				<li><a href="<?php echo $this->webroot.'members/payment_advices/myview/0'; ?>"><i class="fa fa-angle-double-right"></i>Due List</a></li>
				<li><a href="<?php echo $this->webroot.'members/payment_advices/myview/1'; ?>"><i class="fa fa-angle-double-right"></i>Archive List</a></li>
			</ul>
		</li>
		<?php //} ?>
		<li class="treeview">
			<a href="#">
				<i class="fa fa-edit"></i> <span>Advertiser Application</span>
				<?php if ($this->Session->read('Auth.User.Organization.isSubmitted')) { ?>
					<small class="badge pull-right bg-green"><i class="fa fa-check"></i></small>
				<?php } else { ?>
					<i class="fa fa-angle-left pull-right"></i>
				<?php } ?>
			</a>
			
				<ul class="treeview-menu">
					<li><a href="<?php echo $this->webroot.'pride/organizations/edit_my_organization/'.$this->Session->read('Auth.User.organization_id'); ?>"><i class="fa fa-angle-double-right"></i> Company Profile</a></li>
					<li><a href="<?php echo $this->webroot.'pride/organizations/declare_shareholder/'.$this->Session->read('Auth.User.organization_id'); ?>"><i class="fa fa-angle-double-right"></i> Shareholders</a></li>
					<li><a href="<?php echo $this->webroot.'pride/organizations/declare_keypersonnel/'.$this->Session->read('Auth.User.organization_id'); ?>"><i class="fa fa-angle-double-right"></i> Key Personnels</a></li>
					<li><a href="<?php echo $this->webroot.'pride/organizations/upload_documentation/'.$this->Session->read('Auth.User.organization_id'); ?>"><i class="fa fa-angle-double-right"></i> Upload Documentation</a></li>
			<?php if ( !$this->Session->read('Auth.User.Organization.isSubmitted') && ($isUploaded) ) { ?>
					<li><a href="<?php echo $this->webroot.'pride/organizations/submit_application/'.$this->Session->read('Auth.User.organization_id'); ?>"><i class="fa fa-angle-double-right"></i>Submit Application</a></li>
			<?php } else { ?>	
					<li><a href="<?php echo $this->webroot.'pride/organizations/view/'.$this->Session->read('Auth.User.organization_id'); ?>"><i class="fa fa-angle-double-right"></i> Submitted Form</a></li>
				
			<?php } ?>
			</ul>
		</li>
	</ul>

<?php  } else if ($this->Session->read('Auth.User.Role.alias') == Configure::read('AMS.role_pride_finance') ) { ?>

<!-- --------------------------------- AMS Finance  ---------------------------------------->

	<ul class="sidebar-menu">
		<!-- ../temporary closed/..<li>
			<a href="<?php echo $this->webroot; ?>">
				<i class="fa fa-home"></i> <span>Home</span>
			</a>
		</li>../end temporary closed/.. -->
		<li>
			<a href="<?php echo $this->webroot.'members/members/finance_dashboard'; ?>">
				<i class="fa fa-dashboard"></i> <span>Dashboard</span>
			</a>
		</li>
		<li class="treeview">
			<a href="#">
				<i class="fa fa-user"></i> <span>Sign Ups</span>
				<i class="fa fa-angle-left pull-right"></i>
			</a>
			<ul class="treeview-menu">
				<li><a href="<?php echo $this->webroot.'pride/organizations/signup/'; ?>"><i class="fa fa-angle-double-right"></i> New Submissions</a></li>
			</ul>
		</li>
		<li class="treeview">
			<a href="#">
				<i class="fa fa-user"></i> <span>Advertisers</span>
				<i class="fa fa-angle-left pull-right"></i>
			</a>
			<ul class="treeview-menu">
				<li><a href="<?php echo $this->webroot.'pride/organizations'; ?>"><i class="fa fa-angle-double-right"></i> New Submissions</a></li>
				<li><a href="<?php echo $this->webroot.'pride/organizations/approved_index'; ?>"><i class="fa fa-angle-double-right"></i> Approved List</a></li>
			</ul>
		</li>
		<li class="treeview">
			<a href="#">
				<i class="fa fa-tag"></i> <span>Resource Reservations</span>
				<i class="fa fa-angle-left pull-right"></i>
			</a>
			<ul class="treeview-menu">
				<li><a href="<?php echo $this->webroot.'pride/reservations/index/0'; ?>"><i class="fa fa-angle-double-right"></i> Pre-Approved List</a></li>
				<li><a href="<?php echo $this->webroot.'pride/reservations/index/1'; ?>"><i class="fa fa-angle-double-right"></i> Approved List</a></li>
			</ul>
		</li>					
		<li class="treeview">
			<a href="#">
				<i class="fa fa-credit-card"></i> <span>Payment Advice</span>
				<i class="fa fa-angle-left pull-right"></i>
			</a>
			<ul class="treeview-menu">
				<li><a href="<?php echo $this->webroot.'members/payment_advices/add'; ?>"><i class="fa fa-angle-double-right"></i> New Advice Creation</a></li>
				<li><a href="<?php echo $this->webroot.'members/payment_advices/index'; ?>"><i class="fa fa-angle-double-right"></i> Payment Advices List</a></li>
				<li><a href="<?php echo $this->webroot.'pride/advice_types/add'; ?>"><i class="fa fa-angle-double-right"></i> New Payment Advice Types</a></li>
				<li><a href="<?php echo $this->webroot.'pride/advice_types'; ?>"><i class="fa fa-angle-double-right"></i> Payment Advice Types</a></li>
			</ul>
		</li>
		<!-- <li>
			<a href="<?php echo $this->webroot.'pride/reports/dashboard'; ?>">
				<i class="fa fa-clipboard"></i> <span>Reports</span>
			</a>
		</li> -->
	</ul>

<?php  } else if ($this->Session->read('Auth.User.Role.alias') == Configure::read('AMS.role_pride_contractor') ) { ?>

<!-- --------------------------------- AMS Contractor ---------------------------------------->

	<ul class="sidebar-menu">
		<!-- ../temporary closed/..<li>
			<a href="<?php echo $this->webroot; ?>">
				<i class="fa fa-home"></i> <span>Home</span>
			</a>
		</li>../end temporary closed/.. -->
		<li>
			<a href="<?php echo $this->webroot.'members/members/contractor_dashboard'; ?>">
				<i class="fa fa-dashboard"></i> <span>Dashboard</span>
			</a>
		</li>
		<li class="treeview">
			<a href="#">
				<i class="fa fa-user"></i> <span>Advertisers</span>
				<i class="fa fa-angle-left pull-right"></i>
			</a>
			<ul class="treeview-menu">
				<li><a href="<?php echo $this->webroot.'pride/organizations'; ?>"><i class="fa fa-angle-double-right"></i> New Submissions</a></li>
				<li><a href="<?php echo $this->webroot.'pride/organizations/approved_index'; ?>"><i class="fa fa-angle-double-right"></i> Approved List</a></li>
			</ul>
		</li>
		<li class="treeview">
			<a href="#">
				<i class="fa fa-user"></i> <span>Works on Campaign</span>
				<i class="fa fa-angle-left pull-right"></i>
			</a>
			<ul class="treeview-menu">
				<li><a href="<?php echo $this->webroot.'pride/campaigns'; ?>"><i class="fa fa-angle-double-right"></i>List of Campaigns</a></li>
				<li><a href="<?php echo $this->webroot.'pride/campaigns/timeline'; ?>"><i class="fa fa-angle-double-right"></i>Campaign Timeline</a></li>
			</ul>
		</li>						
		<li class="treeview">
			<a href="#">
				<i class="fa fa-check-square"></i> <span>All Work Orders</span>
				<i class="fa fa-angle-left pull-right"></i>
			</a>
			<ul class="treeview-menu">
				<li><a href="<?php echo $this->webroot.'pride/jobs'; ?>"><i class="fa fa-angle-double-right"></i>List of Jobs</a></li>
				<li><a href="<?php echo $this->webroot.'pride/job_tasks'; ?>"><i class="fa fa-angle-double-right"></i>List of Job Tasks</a></li>
			</ul>
		</li>
		
	</ul>
	
<?php } ?>


	
					
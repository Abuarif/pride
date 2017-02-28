<!-- Get resources 

<script language="Javascript">
	
	function refreshCode(){  
	  alert('test'); 
	  $.ajax({
			  url: "<?php echo $this->webroot;?>pride/campaigns/view/<?php echo $this->request->pass[0]; ?>",
			  cache: false,
			  success: function(html){
				$("#refresh").html(html);
				alert('elo.. elo..');
			  }
			})
			setTimeout("refreshCode()",1000);
			
    } 
    refreshCode();
</script> -->

<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		My Campaigns
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-external-link"></i>Home</a></li>
		<li><a href="#">Design Approval Preview</a></li>
		<li class="active">Visual Details</li>
	</ol>
</section>

<section class="content">
	<!-- Custom location sessionFlash -->
		<div style="margin-left:-14px;">
			<?php echo $this->Layout->sessionFlash(); ?>
		</div>
	<!--./location sessionFlash -->
	
	<!-- Multiple Tab -->
		<div class="nav-tabs-custom">
			<ul class="nav nav-tabs">
				<li class="active"><a href="#tab_1-1" data-toggle="tab">Details</a></li>
				<!-- <li class=""><a href="#tab_2-1" data-toggle="tab">Campaign Resources</a></li>	 -->
				<li class=""><a href="#tab_2-1a" data-toggle="tab">Campaign Resources Summary</a></li>	
				<li class=""><a href="#tab_2-2" data-toggle="tab">Campaign Process Tracking</a></li>	
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="tab_1-1">
					<!-- Campaign Details -->
						<div class="box box-success">
							<div class="box-header">
								<h3 class="box-title">Campaign Details</h3>
								<div class="box-tools">
									<div class="no-margin pull-right">
										<?php
											echo $this->Html->link($this->Form->button('<i class="fa fa-briefcase"></i>&nbsp;&nbsp;&nbsp;Return to Resource Reservation', array('class'=>'btn btn-danger', 'style'=>'color:#fff;width:300px;')), array('plugin' => 'pride', 'controller' => 'reservations', 'action' => 'view', $campaign['Reservation']['id']), array('escape'=>false));
										?>
									</div>
								</div>
							</div>
							<?php 
								if ($this->Session->read('Auth.User.Organization.alias') != Configure::read('AMS.role_pride_advertiser')) { // if organization not advertiser. 
									$orgType = $this->requestAction('/pride/organization_types/get_organization_type/'.$this->Session->read('Auth.User.Organization.organization_type_id'));
									$label = $orgType['OrganizationType']['name'];
								
								}
							?>
							<div class="box-body table-responsive no-padding">
								<table class="table table-hover">
									<tr>
										<th style="width:130px;"><?php echo $label; ?> Name</th>
										<td style="width:30px;">:</td>
										<td><?php echo h($campaign['Organization']['name']); ?></td>
									</tr>
									<tr>
										<th style="width:130px;">Advertiser Name</th>
										<td style="width:30px;">:</td>
										<td><?php echo h($campaign['Campaign']['advertiser_name']); ?></td>
									</tr>
									<tr>
										<th>Campaign Name</th>
										<td>:</td>
										<td><?php echo h($campaign['Campaign']['name']); ?></td>
									</tr>
									<tr>
										<th>Start Date</th>
										<td>:</td>
										<td><?php echo $this->Time->format($campaign['Campaign']['start_date'], '%d %B %Y'); ?></td>
									</tr>
									<tr>
										<th>End Date</th>
										<td>:</td>
										<td><?php echo $this->Time->format($campaign['Campaign']['end_date'], '%d %B %Y'); ?></td>
									</tr>
								</table>
							</div>
						</div>
					<!-- End Campaign Details -->

					<!-- Design Details -->
						<div class="box box-danger" id="refresh">
							<div class="box-header">
								<h3 class="box-title">Campaign Visuals</h3>
								<div class="box-tools">
									<div class="no-margin pull-right">
										<?php
											echo $this->Html->link($this->Form->button('<i class="fa fa-upload"></i>&nbsp;&nbsp;&nbsp;Upload Campaign Visuals', array('class'=>'btn btn-warning', 'style'=>'color:#fff;width:300px;')), array('plugin' => 'pride', 'controller' => 'campaign_designs', 'action' => 'add_visual', $campaign['Campaign']['id']), array('escape'=>false));
										?>
									</div>
								</div>
							</div>
							<div class="box-body table-responsive no-padding">
								<?php if (!empty($campaign['CampaignDesign'])) {?>
								<table class="table table-hover">
								<tr>
									<th style="text-align:center;width:30px;height:30px;">No</th>
									<th style="text-align:center;width:150px;height:30px;">Visual Name</th>
									<!-- <th style="text-align:center;width:80px;height:30px;">Image</th> -->
									<th style="text-align:center;width:80px;height:30px;">Tag Code</th>
									<th style="text-align:center;width:80px;height:30px;">Action</th>
								</tr>
								<?php $counter = 1; ?>
								<?php foreach ($campaign['CampaignDesign'] as $campaignDesign): ?>
									<tr>
										<td style="text-align:center;width:30px;height:30px;vertical-align:middle;"><?php echo h($counter); ?></td>
										<td style="text-align:center;width:100px;height:30px;vertical-align:middle;"><?php echo $campaignDesign['name']; ?></td>
										<!-- <td style="text-align:center;width:50px;height:30px;vertical-align:middle;">
											<?php	
												//echo $this->Html->image("../attachments/".$campaignDesign['files'], array('height'=> '50px', 'width'=>'50px'),array('style' => 'float:right'));
											?>
										</td> -->
										<td style="text-align:center;width:50px;height:30px;vertical-align:middle;"><?php echo $campaignDesign['tag_code']; ?></td>
										<td style="text-align:center;width:50px;height:30px;vertical-align:middle;">
											<?php  if ($this->Session->read('Auth.User.role_id') == 6) { ?>
																	
												<?php
													echo $this->Html->link('', array('controller' => 'campaign_designs', 'action' => 'approval_preview', $campaignDesign['id']), array('class'=>'fa fa-desktop', 'style'=>'color:#000;','data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'View', 'escape' => false));
												?>
											
											<?php } else if ($this->Session->read('Auth.User.role_id') == 4) {  ?>
																		
												<?php
													echo $this->Html->link('', array('controller' => 'campaign_designs', 'action' => 'view', $campaignDesign['id']), array('class'=>'fa fa-desktop', 'style'=>'color:#000;','data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'View', 'escape' => false));
												?>							
												
												&nbsp;
												
												<?php
													echo $this->Html->link('', array('controller' => 'campaign_designs', 'action' => 'edit', $campaignDesign['id']), array('class'=>'fa fa-edit', 'style'=>'color:#000;','data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Edit', 'escape' => false));
												?>							
												
												&nbsp;	
												
												<?php			
													echo $this->Form->postLink('', array('controller' => 'campaign_designs', 'action' => 'delete', $campaignDesign['id']), array('class'=>'fa fa-trash-o', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Delete', 'escape' => false, 'confirm' => __('Are you sure you want to delete # %s?', $campaignDesign['id'])));			
												?>	
												
												
												<!-- Original Delete Method	-->						
												<?php //echo $this->Form->postLink(__('Delete'), array('controller' => 'campaign_designs', 'action' => 'delete', $campaignDesign['id']), array(), __('Are you sure you want to delete # %s?', $campaignDesign['id'])); ?>
												
											<?php } else { ?>
												
												<?php
													echo $this->Html->link('', array('controller' => 'campaign_designs', 'action' => 'view', $campaignDesign['id']), array('class'=>'fa fa-desktop', 'style'=>'color:#000;','data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'View', 'escape' => false));
												?>
												
											<?php } ?>
										</td>
									</tr>
									<?php $counter++ ?>
									<?php endforeach; ?>
								</table>
								
								<?php }else{ ?>
								
								<table class="table table-hover">
										<tr>
											<td>
												<br />
												<div class="alert alert-warning alert-dismissable">
													<i class="fa fa-info"></i>
													<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
													No design details are available.
												</div>
											</td>
										</tr>
								</table>
								
								<?php } ?>
							</div>
						</div>
					<!-- End Design Details -->

					<!-- Site/Unit Provision Details -->
						<div class="box box-success">
							<div class="box-header">
								<h3 class="box-title">Site/Unit Provision Details</h3>
								<div class="box-tools">
									&nbsp;
								</div>
							</div>
							<div class="box-body table-responsive no-padding">
								<?php if (!empty($campaign['CampaignOrderDetail'])){ ?>
								<table class="table table-hover">
								<tr>
									<th style="text-align:center;width:30px;height:30px;">No</th>
									<th style="text-align:center;width:30px;height:30px;">Site/Unit Type</th>
									<th style="text-align:center;width:30px;height:30px;">Installation Type</th>
									<th style="text-align:center;width:30px;height:30px;">Quantity</th>
									<th style="text-align:center;width:30px;height:30px;">Total Site/Unit Configured</th>
									<th style="text-align:center;width:150px;height:30px;">Actions</th>
								</tr>
								<?php $counter = 1; ?>
								<?php foreach ($campaign['CampaignOrderDetail'] as $campaignOrderDetail): ?>
								<?php 
									// get item type object details
									$myItemType = $this->requestAction('/pride/item_types/get_item_type/'.$campaignOrderDetail['item_type_id']);
									
									// get provision count
									$myCompletedProvision = $this->requestAction('/pride/campaign_order_details/has_configured/'.$campaignOrderDetail['id']);
									
									// get campaign_order_type
									$myOrderType = $this->requestAction('/pride/campaign_order_types/get_campaign_order_type/'.$campaignOrderDetail['campaign_order_type_id']);
								
								?>
									<tr>
										<td style="text-align:center;width:30px;height:30px;vertical-align:middle;"><?php echo h($counter); ?></td>
										<td style="text-align:center;width:100px;height:30px;vertical-align:middle;"><?php echo $myItemType['ItemType']['name']; ?></td>
										<td style="text-align:center;width:100px;height:30px;vertical-align:middle;"><?php echo $myOrderType['CampaignOrderType']['name']; ?></td>
										<td style="text-align:center;width:100px;height:30px;vertical-align:middle;"><?php echo $campaignOrderDetail['quantity']; ?></td>
										<td style="text-align:center;width:100px;height:30px;vertical-align:middle;"><?php echo count($myCompletedProvision); ?></td>
										<td style="text-align:center;width:50px;height:30px;vertical-align:middle;">
											<?php 
												echo $this->Html->link('', array('controller' => 'campaign_order_details', 'action' => 'view',$campaignOrderDetail['id']), array('class'=>'fa fa-gears', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Configure', 'escape' => false));	
											?>
											&nbsp;&nbsp;
											<?php			
												echo $this->Form->postLink('', array('controller' => 'campaign_order_details', 'action' => 'delete', $campaignOrderDetail['id']), array('class'=>'fa fa-trash-o', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Delete', 'escape' => false, 'confirm' => __('Are you sure you want to delete # %s?', $counter)));			
											?>
											&nbsp;&nbsp;
											<?php
												/*echo $this->Html->link('', array('controller' => 'campaign_order_details', 'action' => 'debug_spad_letter',$campaignOrderDetail['id'], $campaign['Campaign']['id']), array('class'=>'fa fa-file-text-o', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Generate SPAD Approval Letter', 'target' => '_blank', 'escape' => false));*/
												
												echo $this->Html->link('', array('controller' => 'campaign_order_details', 'action' => 'spad_letter',$campaignOrderDetail['id'], $campaign['Campaign']['id'], 'ext' => 'pdf'), array('class'=>'fa fa-file-text-o', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Generate SPAD Approval Letter', 'target' => '_blank', 'escape' => false));											
											?>
										</td>
									</tr>
									<?php $counter++ ?>
									<?php endforeach; ?>
								</table>
								
								<?php }else{ ?>
								
								<table class="table table-hover">
										<tr>
											<td>
												<br />
												<div class="alert alert-success alert-dismissable">
													<i class="fa fa-info"></i>
													<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
													No provision details available. Please proceed to configure Site/Unit based on the Campaign available resources.
												</div>
											</td>
										</tr>
								</table>
								
								<?php } ?>
							</div>
						</div>
					<!-- End Site/Unit Provision Details -->
				</div>
				<!-- /.tab-pane -->
				
				<div class="tab-pane" id="tab_2-1">
					<div class="box box-primary">
						<div class="box-body table-responsive no-padding">
							<?php if (!empty($myPackages)) { ?>
								<table class="table table-hover">
									<tr>
											<th style="text-align:center;width:20px;height:30px;">No</th>
											<th style="text-align:center;width:50px;height:30px;">Product Owner</th>
											<th style="text-align:center;width:50px;height:30px;">Unit Type</th>
											<th style="text-align:center;width:50px;height:30px;">Total Site/Unit</th>
											<th style="text-align:center;width:50px;height:30px;">Available Site/Unit</th>
											<th style="text-align:center;width:50px;height:30px;">Action</th>
									</tr>
									<?php $counter = 1; ?>
									<?php foreach ($myPackages as $myPackage): ?>
									<?php 
										// get item type object details
										$myItemType = $this->requestAction('/pride/item_types/get_item_type/'.$myPackage['Package']['item_type_id']);
									
										// get resources
										$available = $this->requestAction('/pride/campaigns/get_resource/'.$campaign['Campaign']['organization_id'].'/'. $myPackage['Package']['organization_id'].'/'.$campaign['Campaign']['reservation_id'].'/'.$myPackage['Package']['item_type_id']);
										
										print_r($available);
										(isset($available[1]) ? $balance = $available[1]: $balance = $resource[0]['reserved'] );
										
										// get product owner
										$myOrg = $this->requestAction('/pride/organizations/get_organization/'.$myPackage['Package']['organization_id']);
										
									?>
									<tr>
										<td style="text-align:center;width:20px;height:30px;">
											<?php echo h($counter); ?>
										</td>
										<td style="text-align:center;width:50px;height:30px;">
											<?php echo h($myOrg['Organization']['name']); ?>
										</td>
										<td style="text-align:center;width:50px;height:30px;">
											<?php echo h($myItemType['ItemType']['name']); ?>
										</td>
										<td style="text-align:center;width:50px;height:30px;">
											<?php echo h($myPackage['Package']['quantity']); ?>
										</td>
										<td style="text-align:center;width:50px;height:30px;">
											<?php //echo h($balance); ?>
										</td>
										<td style="text-align:center;width:50px;height:30px;">
											
										<?php
											
											echo $this->Html->link('',  array('plugin' => 'pride', 'controller' => 'campaign_order_details', 'action' => 'configure_site', $campaign['Campaign']['id'], $campaign['Job'][0]['id'], $balance, $resource['it']['id']), array('class'=>'fa fa-gears', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Allocate Site/Unit', 'escape' => false));
										?>
									
										</td>
									</tr>
									<?php $counter++; ?>
									<?php endforeach; ?>
								</table>
							<?php } else { ?>
								<table class="table table-hover">
										<tr>
											<td>
												<br />
												<div class="alert alert-success alert-dismissable">
													<i class="fa fa-info"></i>
													<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
													No available campaign resources found. Please proceed to purchase our promotional package. 
													<div class="no-margin pull-right">
														<?php
															echo $this->Html->link($this->Form->button('<i class="fa fa-upload"></i>&nbsp;&nbsp;&nbsp;Purchase Campaign Resources', array('class'=>'btn btn-warning', 'style'=>'color:#fff;width:300px;')), array('plugin' => 'pride', 'controller' => 'packages', 'action' => 'promotion'), array('escape'=>false));
														?>
													</div><br/>
													&nbsp;
												</div>
											</td>
										</tr>
								</table>
							<?php } ?>
						</div>
					</div>
				</div>
				<!-- /.tab-pane -->
				
				<div class="tab-pane" id="tab_2-1a">
					<div class="box box-primary">
						<div class="box-body table-responsive no-padding">
							<?php if (!empty($myCampaignOrders)) { ?>
								<table class="table table-hover">
									<tr>
											<th style="text-align:center;width:20px;height:30px;">No</th>
											<th style="text-align:center;width:50px;height:30px;">Product Owner</th>
											<th style="text-align:center;width:50px;height:30px;">Unit Type</th>
											<th style="text-align:center;width:50px;height:30px;">Total Site/Unit</th>
											<th style="text-align:center;width:50px;height:30px;">Available Site/Unit</th>
											<th style="text-align:center;width:50px;height:30px;">Action</th>
									</tr>
									<?php $counter = 1; ?>
									<?php foreach ($myCampaignOrders as $myCampaignOrder): ?>
									<?php 
									
										// get package
										$myPackage = $this->requestAction('/pride/packages/get_package/'.$myCampaignOrder['CampaignOrder']['package_id']);
										// get item type object details
										$myItemType = $this->requestAction('/pride/item_types/get_item_type/'.$myPackage['Package']['item_type_id']);
									
										// get resources
										$myOrders = $this->requestAction('/pride/campaign_order_details/get_resource/'.$myCampaignOrder['CampaignOrder']['id']);
										
										// count for available resource for each campaign order
										if ($myOrders[0]['booked'] == 0) {
											$available = $myPackage['Package']['quantity'];
										} else {
											$available = $myPackage['Package']['quantity'] - $myOrders[0]['booked'] ;
										}
										
										// get product owner
										$myOrg = $this->requestAction('/pride/organizations/get_organization/'.$myPackage['Package']['organization_id']);
										
									?>
									<tr>
										<td style="text-align:center;width:20px;height:30px;">
											<?php echo h($counter); ?>
										</td>
										<td style="text-align:center;width:50px;height:30px;">
											<?php echo h($myOrg['Organization']['name']); ?>
										</td>
										<td style="text-align:center;width:50px;height:30px;">
											<?php echo h($myItemType['ItemType']['name']); ?>
										</td>
										<td style="text-align:center;width:50px;height:30px;">
											<?php echo h($myPackage['Package']['quantity']); ?>
										</td>
										<td style="text-align:center;width:50px;height:30px;">
											<?php echo h($available); ?>
										</td>
										<td style="text-align:center;width:50px;height:30px;">
											
										<?php
											
											echo $this->Html->link('',  array('plugin' => 'pride', 'controller' => 'campaign_order_details', 'action' => 'configure_site', $campaign['Campaign']['id'], $campaign['Job'][0]['id'], $available, $myPackage['Package']['item_type_id'], $myCampaignOrder['CampaignOrder']['id']), array('class'=>'fa fa-gears', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Allocate Site/Unit', 'escape' => false));
										?>
									
										</td>
									</tr>
									<?php $counter++; ?>
									<?php endforeach; ?>
								</table>
							<?php } else { ?>
								<table class="table table-hover">
										<tr>	
											<td>
												<br />
												<div class="alert alert-success alert-dismissable">
													<i class="fa fa-info"></i>
													<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
													No available campaign resources found. Please proceed to purchase our promotional package. 
													<div class="no-margin pull-right">
														<?php
															echo $this->Html->link($this->Form->button('<i class="fa fa-upload"></i>&nbsp;&nbsp;&nbsp;Purchase Campaign Resources', array('class'=>'btn btn-warning', 'style'=>'color:#fff;width:300px;')), array('plugin' => 'pride', 'controller' => 'packages', 'action' => 'promotion'), array('escape'=>false));
														?>
													</div><br/>
													&nbsp;
												</div>
											</td>
										</tr>
								</table>
							<?php } ?>
						</div>
					</div>
				</div>
				<!-- /.tab-pane -->
				
				<div class="tab-pane" id="tab_2-2">
					<div class="box box-primary">
						<div class="box-body table-responsive no-padding">
							<table class="table table-hover">
								<tr>
										<th style="text-align:center;width:20px;height:30px;">No</th>
										<th style="text-align:center;width:50px;height:30px;">Job</th> 
										<th style="text-align:center;width:50px;height:30px;">Last Updated</th>
										<th style="text-align:center;width:50px;height:30px;">Status</th>
								</tr>
								<?php $counter = 1; ?>
								<?php foreach ($campaign['Job'] as $job): ?>
								<?php
									// get job type
									if ($job['job_type_id'] != 0) {
										$jobType = $this->requestAction('/pride/job_types/get_job_type/'. $job['job_type_id']);
										
										
									}
								?>
								<tr>
									<td style="text-align:center;width:20px;height:30px;">
										<?php echo h($counter); ?>
									</td>
									<td style="text-align:center;width:50px;height:30px;">
										<?php echo h($jobType['JobType']['name']); ?>
									</td>
									<td style="text-align:center;width:50px;height:30px;">
										<?php echo h($this->Time->niceShort( $job['updated'])); ?>
									</td>
									<td style="text-align:center;width:50px;height:30px;">
										<?php
											if ($job['job_type_id'] == 1) { 
												echo $this->Html->link('', array('controller' => 'jobs', 'action' => 'spad_view', $job['id']), array('class'=>'fa fa-desktop', 'style'=>'color:#000;','data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'View Details','escape' => false));
											
											} else {
												echo $this->Html->link('', array('controller' => 'jobs', 'action' => 'view', $job['id']), array('class'=>'fa fa-desktop', 'style'=>'color:#000;','data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'View Details','escape' => false));
											}
										?>
										<?php
										
											
										?>
									</td>
									
								</tr>
								<?php $counter++; ?>
								<?php endforeach; ?>
							</table>
						</div>
					</div>
				</div>
				<!-- /.tab-pane -->
				
			</div>
		</div>	
	<!-- End Multiple Tab -->
	
</section>

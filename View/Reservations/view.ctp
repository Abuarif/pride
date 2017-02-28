<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		My Reservations - Pre Approved List
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?php echo $this->webroot; ?>"><i class="fa fa-external-link"></i>Home</a></li>
		<li><a href="#">My Reservations</a></li>
		<li class="active">Pre-Approved</li>
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
				<li class=""><a href="#tab_2-1" data-toggle="tab">Campaign Resources</a></li>	
				<li class=""><a href="#tab_2-2" data-toggle="tab">Related Campaign(s)</a></li>	
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="tab_1-1">
					<!-- Reservation Details -->
						<div class="box box-success">
							<div class="box-header">
								<h3 class="box-title">Reservation Details</h3>
								<div class="box-tools">
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
										<td><?php echo h($reservation['Organization']['name']); ?></td>
									</tr>
									<tr>
										<th style="width:130px;">Contact Person</th>
										<td style="width:30px;">:</td>
										<td><?php echo h($reservation['User']['name']); ?></td>
									</tr>
									<tr>
										<th>Created</th>
										<td>:</td>
										<td><?php echo h($this->Time->niceShort($reservation['Reservation']['created'])); ?></td>
									</tr>
									<tr>
										<th>Updated</th>
										<td>:</td>
										<td><?php echo h($this->Time->niceShort($reservation['Reservation']['updated'])); ?></td>
									</tr>
								</table>
							</div>
						</div>
					<!-- End Campaign Details -->
					<!-- Payment Advices -->
					<div class="box box-success">
						<div class="box-header">
							<h3 class="box-title">Payment Advices</h3>
							<div class="box-tools">
								&nbsp;
							</div>
						</div>
						<div class="box-body table-responsive no-padding">
							<?php if (!empty($reservation['PaymentAdvice'])) { ?>
							<table class="table table-hover">
								<tr>
									<th style="text-align:center;width:30px;height:30px;">No</th>
									<th style="text-align:center;width:50px;height:30px;"><?php echo __('Invoice Number'); ?></th>
									<th style="text-align:center;width:50px;height:30px;"><?php echo __('Payment Type'); ?></th>
									<th style="text-align:center;width:50px;height:30px;"><?php echo __('Invoice for Download'); ?></th>
									<th style="text-align:center;width:50px;height:30px;"><?php echo __('Payment Receipt'); ?></th>
									<th style="text-align:center;width:50px;height:30px;"><?php echo __('Receipt File'); ?></th>
									<th style="text-align:center;width:50px;height:30px;"><?php echo __('Amount Due'); ?></th>
									<th style="text-align:center;width:50px;height:30px;"><?php echo __(' Payment Breakdown(s)'); ?></th>
									<th style="text-align:center;width:50px;height:30px;"><?php echo __('Updated Payment(s)'); ?></th>
									<th style="text-align:center;width:50px;height:30px;"><?php echo __('Approved Payment(s)'); ?></th>
									<th style="text-align:center;width:50px;height:30px;">Actions</th>
								</tr>
								<?php 
									$page = $this->params['paging']['PaymentAdvice']['page'];
									$limit = $this->params['paging']['PaymentAdvice']['limit'];
									$counter = ($page * $limit) - $limit + 1; 
								?>
								<?php foreach ($reservation['PaymentAdvice'] as $advice): ?>
								<?php
									// get paymentSchedule count Updated vs Created
									$updatedPaymentSchedules = $this->requestAction('/pride/payment_schedules/getUpdatedCount/'.$advice['id'].'/'.$reservation['User']['id'].'/'.$advice['organization_id']);
									
									$approvedPaymentSchedules = $this->requestAction('/pride/payment_schedules/getStatusCount/'.$advice['id'].'/'.$reservation['User']['id'].'/'.$advice['organization_id']);
								?>
									<tr>
										<td style="text-align:center;width:30px;height:30px;vertical-align:middle;"><?php echo $counter; ?></td>
										<td style="text-align:center;width:50px;height:30px;vertical-align:middle;"><?php echo $advice['invoice_number']; ?></td>
										<td style="text-align:center;width:50px;height:30px;vertical-align:middle;"><?php $adviceType =  $this->requestAction('/pride/advice_types/get_advice_type/'.$advice['advice_type_id']); echo $adviceType['AdviceType']['name']; ?></td>
										<td style="text-align:center;width:50px;height:30px;vertical-align:middle;"><?php	echo $this->Html->link('Download', "/payments/".$advice['invoice_attachment'], array('target' => '_blank')); ?></td>
										<td style="text-align:center;width:50px;height:30px;vertical-align:middle;">
										<?php if (!empty($advice['receipt_number'])) { ?>
											<?php echo $advice['receipt_number']; ?>
										<?php } else { ?>
											Please update your receipt number
										<?php } ?>
										</td>
										<td style="text-align:center;width:50px;height:30px;vertical-align:middle;">
										<?php if (!empty($advice['receipt_attachment'])) { ?>
											<?php	echo $this->Html->link('Download', "/payments/".$advice['receipt_attachment'], array('target' => '_blank')); ?>
										<?php } else { ?>
											Pending receipt file
										<?php } ?>
										</td>
										<td style="text-align:center;width:50px;height:30px;vertical-align:middle;"><?php echo $this->Number->currency($advice['amount'], 'RM'); ?></td>
										<td style="text-align:center;width:50px;height:30px;vertical-align:middle;"><?php echo $advice['schedule_count']; ?></td>
										<td style="text-align:center;width:50px;height:30px;vertical-align:middle;"><?php echo $updatedPaymentSchedules[0]['total'].'/'. $advice['schedule_count']; ?></td>
										<td style="text-align:center;width:50px;height:30px;vertical-align:middle;"><?php echo $approvedPaymentSchedules[0]['total'].'/'. $advice['schedule_count']; ?></td>
										<td class="actions" style="text-align:center;width:30px;height:30px;">
											<?php  if ($this->Session->read('Auth.User.Role.alias') == Configure::read('AMS.role_pride_advertiser')) { ?>
											<?php
												echo $this->Html->link('', array('plugin' => 'members', 'controller' => 'payment_advices', 'action' => 'client_view', $advice['id']), array('class'=>'fa fa-desktop', 'style'=>'color:#000;','data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Update Payment Details',
												'escape' => false));
											?>	
											<?php } else { ?>
											<?php
												echo $this->Html->link('', array('plugin' => 'members', 'controller' => 'payment_advices', 'action' => 'view', $advice['id']), array('class'=>'fa fa-desktop', 'style'=>'color:#000;','data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'View Payment Details',
												'escape' => false));
												
											?>
											&nbsp;&nbsp;
											<?php
												echo $this->Html->link('', array('plugin' => 'members', 'controller' => 'payment_advices', 'action' => 'edit', $advice['id']), array('class'=>'fa fa-pencil', 'style'=>'color:#000;','data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Modify Payment Details',
												'escape' => false));
												
											?>
											&nbsp;&nbsp;
											<?php								
												echo $this->Form->postLink('', array('plugin' => 'members', 'controller' => 'payment_advices', 'action' => 'delete_payment_advice', $advice['id'], $reservation['Reservation']['id']), array('class'=>'fa fa-trash-o', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Delete', 'escape' => false, 'confirm' => __('Are you sure you want to delete invoice no : %s?', $advice['invoice_number'])));
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
											<div class="alert alert-success alert-dismissable">
												<i class="fa fa-info"></i>
												<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
												No payment advices are available yet.
											</div>
										</td>
									</tr>
								</table>
								
								<?php } ?>
						</div>
						
						<!-- Footer -->
							<div class="panel-footer">
								<div class="span12" align="center">
									<?php
												echo $this->Html->link($this->Form->button('<i class="fa fa-briefcase"></i>&nbsp;&nbsp;&nbsp;Return to Resource Reservation List', array('class'=>'btn btn-danger', 'style'=>'color:#fff;width:300px;')), array('plugin' => 'pride', 'controller' => 'reservations', 'action' => 'index', 0), array('escape'=>false));
											?>
								</div>
							</div>
						<!-- End Footer -->
						
					</div>
					<!-- End Payment Advices -->
					
				</div>
				<!-- /.tab-pane -->
				
				<div class="tab-pane" id="tab_2-1">
					<div class="box box-primary">
						<div class="box-body table-responsive no-padding">
							<?php if (!empty($reservation['CampaignOrder'])) { ?>
								<table class="table table-hover">
									<tr>
											<th style="text-align:center;width:20px;height:30px;">No</th>
											<th style="text-align:center;width:50px;height:30px;">Package Name</th>
											<th style="text-align:center;width:50px;height:30px;">Product Owner</th>
											<th style="text-align:center;width:50px;height:30px;">Product Type</th>
											<th style="text-align:center;width:50px;height:30px;">Total Products (Unit)</th>
											<th style="text-align:center;width:120px;height:30px;">Purchased Date</th>
											<th style="text-align:center;width:50px;height:30px;">Action</th>
									</tr>
									<?php $counter = 1; ?>
									<?php foreach ($reservation['CampaignOrder'] as $campaignOrder): ?>
									<?php
										$package = $this->requestAction('/pride/packages/get_package/'.$campaignOrder['package_id']);
										if (!empty($package['Package']['item_type_id'])) {
											// get item type
											$itemType = $this->requestAction('/pride/item_types/get_item_type/'.$package['Package']['item_type_id']);
											
											// get organization
											$owner = $this->requestAction('/pride/organizations/get_organization/'.$package['Package']['organization_id']);
											
										} else {
											$itemType = array('ItemType' => array('name' => ''));
										}
									?>
									<tr>
										<td style="text-align:center;width:20px;height:30px;">
											<?php echo h($counter); ?>
										</td>
										<td style="text-align:center;width:50px;height:30px;">
											<?php echo h($package['Package']['name']); ?>
										</td>
										<td style="text-align:center;width:50px;height:30px;">
											<?php echo h($owner['Organization']['name']);?></td>
										</td>
										<td style="text-align:center;width:50px;height:30px;">
											<?php echo h($itemType['ItemType']['name']);?></td>
										</td>
										<td style="text-align:center;width:50px;height:30px;">
											<?php echo h($package['Package']['quantity']);?></td>
										</td>
										<td style="text-align:center;width:50px;height:30px;">
											<?php echo h($this->Time->nice($campaignOrder['updated']));?></td>
										<td style="text-align:center;width:50px;height:30px;">
								 
											<?php
												echo $this->Html->link('', array('controller' => 'campaign_orders', 'action' => 'view', $campaignOrder['id']), array('class'=>'fa fa-desktop', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'View', 'escape' => false));
											?>
											
											&nbsp;&nbsp;
											<?php if ($campaignOrder['status'] == false) { ?>
											<?php			
												echo $this->Form->postLink('', array('controller' => 'campaign_orders', 'action' => 'delete', $campaignOrder['id']), array('class'=>'fa fa-trash-o', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Delete', 'escape' => false, 'confirm' => __('Are you sure you want to delete # %s?', $counter)));			
											?>	
											<?php } ?>
											
											
											
										</td>
									</tr>
									<?php $counter++; ?>
									
									<?php 
									
										$checkStatus = $campaignOrder['status'];
									?>
									
									<?php endforeach; ?>
								</table>
							<?php 
								} else { 
									$checkStatus = false;
							?>
								<table class="table table-hover">
										<tr>
											<td>
												<br />
												<div class="alert alert-success alert-dismissable">
													<i class="fa fa-info"></i>
													<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
													No available campaign resources found. Please proceed to purchase our promotional package. 
													
												</div>
											</td>
										</tr>
								</table>
							<?php } ?>
						</div>
						
						<?php 
							if (1) {
							//if (!$checkStatus) {
						?>
						
						<div class="panel-footer">
							<div class="span12" align="center">
								<?php
									echo $this->Html->link($this->Form->button('<i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;&nbsp;Purchase Campaign Resources', array('class'=>'btn btn-success', 'style'=>'color:#fff;width:300px;')), array('plugin' => 'pride', 'controller' => 'packages', 'action' => 'promotion', $reservation['Reservation']['id']), array('escape'=>false));
								?>
								&nbsp;&nbsp;
								<?php
									echo $this->Html->link($this->Form->button('<i class="fa fa-briefcase"></i>&nbsp;&nbsp;&nbsp;Confirm Campaign Resources', array('class'=>'btn btn-danger', 'style'=>'color:#fff;width:300px;')), array('plugin' => 'pride', 'controller' => 'campaign_orders', 'action' => 'confirm_campaign_orders', $reservation['Reservation']['id']), array('escape'=>false));
								?>
							</div>
						</div>
						
						<?php } ?>
					</div>								
				</div>
				<!-- /.tab-pane -->
				
				<div class="tab-pane" id="tab_2-2">
					
<div class="campaigns index">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-danger">
				<div class="box-header">
					<div class="box-tools"> 
						&nbsp;
					</div>
				</div>
				<div class="box-body table-responsive no-padding">
					<?php if (!empty($reservation['Campaign'])) { ?>
						<table class="table table-hover">
						<tr>
							<th style="text-align:center;width:20px;height:30px;">No</th>
							<th style="text-align:center;width:200px;height:30px;">Advertiser Name</th>
							<th style="text-align:center;width:200px;height:30px;">Campaign Name</th>
							<th style="text-align:center;width:100px;height:30px;">Start Date</th>
							<th style="text-align:center;width:100px;height:30px;">End Date</th>
							<th class="actions" style="text-align:center;width:100px;height:30px;">Actions</th>
						</tr>
						<?php foreach ($reservation['Campaign'] as $campaign): ?>
						<tr>
							<td style="text-align:center;width:20px;height:25px;">
								<?php echo h($counter); ?>
							</td>
							<td style="text-align:center;width:150px;height:30px;">
								<?php echo h($campaign['advertiser_name']); ?>
							</td>
							<td style="text-align:center;width:150px;height:30px;">
								<?php echo h($campaign['name']); ?>
							</td>
							<td style="text-align:center;width:80px;height:30px;">
								<?php echo $this->Time->format($campaign['start_date'], '%d-%m-%Y'); ?>
							</td>
							<td style="text-align:center;width:50px;height:30px;">
								<?php echo $this->Time->format($campaign['end_date'], '%d-%m-%Y'); ?>
							</td>
							<td class="actions" style="text-align:center;width:100px;height:30px;">							
								
								<?php
									echo $this->Html->link('', array('controller' => 'campaigns', 'action' => 'view', $campaign['id']), array('class'=>'fa fa-desktop', 'style'=>'color:#000;','data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'View Details',
									'escape' => false));
								?>
								
								&nbsp;&nbsp;
								
								<?php
									echo $this->Html->link('', array('controller' => 'campaigns', 'action' => 'edit', $campaign['id']), array('class'=>'fa fa-edit', 'style'=>'color:#000;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Modify',
									'escape' => false));
								?>
								
								&nbsp;&nbsp;
								
								<?php
									echo $this->Html->link('', array('controller' => 'campaigns', 'action' => 'timeline', $campaign['id']), array('class'=>'fa fa-clock-o', 'style'=>'color:#000;','data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'View Campaign Timeline',
									'escape' => false));
								?>
								
								&nbsp;	&nbsp;
													
								<?php			
									echo $this->Form->postLink('', array('controller' => 'campaigns', 'action' => 'delete', $campaign['id']), array('class'=>'fa fa-trash-o', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Delete', 'escape' => false, 'confirm' => __('Are you sure you want to delete # %s?', $counter)));			
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
													No available campaign found. Please proceed to create it. 
													
												</div>
											</td>
										</tr>
								</table>
					<?php } ?>
				</div>
				<div class="panel-footer">
					<div class="span12" align="center">
						<?php
							echo $this->Html->link($this->Form->button('<i class="fa fa-gears"></i>&nbsp;&nbsp;&nbsp;Create Campaign', array('class'=>'btn btn-success', 'style'=>'color:#fff;')), array('plugin' => 'pride', 'controller' => 'campaigns', 'action' => 'add', $reservation['Reservation']['id']), array('escape'=>false));
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
				</div>
				<!-- /.tab-pane -->
				
			</div>
		</div>	
	<!-- End Multiple Tab -->
	
</section>

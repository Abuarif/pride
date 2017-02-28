<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		My Reservation
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-external-link"></i>Home</a></li>
		<li><a href="#">Campaign Orders</a></li>
		<li class="active">Provision Order</li>
	</ol>
</section>


<section class="content">
	<!-- Custom location sessionFlash -->
		<div style="margin-left:-14px;">
			<?php echo $this->Layout->sessionFlash(); ?>
		</div>
	<!--./location sessionFlash -->

	<!-- Purchased Campaign Details -->
	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title">Package Details</h3>
			<div class="box-tools">
			</div>
		</div>
		<div class="box-body table-responsive no-padding">
			<table class="table table-hover">
			<?php if (!empty($organizationDiscount)) { ?>
				<tr>
					<th style="width:250px;">Favourite Client Discount</th>
					<td style="width:20px;">:</td>
					<td>
						<?php 
							echo $organizationDiscount['OrganizationDiscount']['rate']; 
						?>%
					</td>
				</tr>
				<?php } ?>
				<tr>
					<th style="width:250px;">Purchased Package</th>
					<td style="width:20px;">:</td>
					<td><?php echo $campaignOrder['Package']['name']; ?></td>
				</tr>
				<tr>
					<th>No. Of Sites/Units (Payable - FOC)</th>
					<td>:</td>
					<td><?php echo $campaignOrder['Package']['quantity']; ?> (<?php echo $campaignOrder['Package']['quantity'] - $campaignOrder['Package']['foc']; ?> payable - <?php echo $campaignOrder['Package']['foc']; ?> FOC)</td>
				</tr>
				<tr>
					<th>Period</th>
					<td>:</td>
					<td><?php echo $campaignOrder['Package']['duration'].' '.$campaignOrder['Package']['duration_unit']; ?></td>
				</tr>
				
			</table>
			<table class="table table-hover">
				<tr>
					<td style="padding-top:25px;">
						<div class="box box-danger">
							<div class="box-header">
								<!-- <h3 class="box-title">Condensed Full Width Table</h3> -->
							</div>
							<div class="box-body no-padding">
								<table class="table table-condensed">
									<tr>
										<th style="width:235px;">Gross Rental Price</th>
										<td style="text-align:center;width:30px;">:</td>
										<td><?php echo $this->Number->currency($campaignOrder['Package']['price'], 'RM'); ?></td>
									</tr>
									<tr>
										<th>Less Agency Fees (<?php echo $campaignOrder['Package']['discount']; ?>%)</th>
										<td style="text-align:center;">:</td>
										<td>
											<?php 
											$discountedPrice = $campaignOrder['Package']['price'] * ( $campaignOrder['Package']['discount']) / 100;
											echo $this->Number->currency($discountedPrice, 'RM'); ?>
										</td>
									</tr>
									<tr>
										<th>Rental Charges</th>
										<td style="text-align:center;">:</td>
										<td>
											<?php 
											$totalRental = $campaignOrder['Package']['price'] - $discountedPrice;
											echo $this->Number->currency($totalRental, 'RM'); ?>
										</td>
									</tr>
								</table>
							</div>
						</div>
					</td>
					<td style="padding-top:25px;">
						<div class="box box-danger">
							<div class="box-header">
								<!-- <h3 class="box-title">Condensed Full Width Table</h3> -->
							</div>
							<div class="box-body no-padding">
								<table class="table table-condensed">
									<tr>
										<th style="width:235px;">Production Amount Per Unit</th>
										<td style="text-align:center;width:30px;">:</td>
										<td><?php echo $this->Number->currency($campaignOrder['Package']['production_cost'], 'RM'); ?></td>
									</tr>
									<tr>
										<th>Production Amount Charges</th>
										<td style="text-align:center;">:</td>
										<td>
										<?php
											$total_production = $campaignOrder['Package']['production_cost']*$campaignOrder['Package']['quantity'];
											echo $this->Number->currency($total_production, 'RM'); ?>
										</td>
									</tr>
								</table>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td colspan="2" style="padding-top:25px;">
						<div class="box box-danger">
							<div class="box-header">
								<!-- <h3 class="box-title">Condensed Full Width Table</h3> -->
							</div>
							<div class="box-body no-padding">
								<table class="table table-condensed">
									<?php if (Configure::read('AMS.GST_type') == 1) { 
										$gst = $totalRental * 0.06;
									?>
									<tr>
										<th style="width:310px;">Government Service Tax - 6% on Rental Charges</th>
										<td style="text-align:center;width:30px;">:</td>
										<td><?php echo $this->Number->currency($gst, 'RM'); ?></td>
									</tr>
									<?php } else if (Configure::read('AMS.GST_type') == 2){ 
										
										
										$payable = $totalRental + $total_production;
										$gst = $payable * 0.06;
									?>
									<tr>
										<th style="width:310px;">Government Service Tax - 6% on Rental and Production Amount Charges</th>
										<td style="text-align:center;width:30px;">:</td>
										<td><?php echo $this->Number->currency($gst, 'RM'); ?></td>
									</tr>
									<?php } ?>
									<tr>
										<th>Total Payable Amount</th>
										<td style="text-align:center;">:</td>
										<td>
										<?php
											$total_payable = $totalRental + $total_production + $gst;
											echo $this->Number->currency($total_payable, 'RM'); ?>
										</td>
									</tr>
								</table>
							</div>
						</div>
					</td>
				</tr>
			</table>
		</div>
	</div>
	<!-- End Purchased Campaign Details -->

	<!-- Payment Advices -->
	<div class="box box-success">
		<div class="box-header">
			<h3 class="box-title">Payment Advices</h3>
			<div class="box-tools">
				<?php if ($this->Session->read('Auth.User.Role.alias') == Configure::read('AMS.role_pride_finance')) {?>
					<div class="no-margin pull-right">
						<?php
							echo $this->Html->link($this->Form->button('<i class="fa fa-upload"></i>&nbsp;&nbsp;&nbsp;Create Payment Advice : Upload Invoice', array('class'=>'btn btn-warning', 'style'=>'color:#fff;width:300px;')), array('plugin' => 'members', 'controller' => 'payment_advices', 'action' => 'add_booking_invoice', $campaignOrder['CampaignOrder']['organization_id'], $campaignOrder['CampaignOrder']['id'] ), array('escape'=>false));
						?>
					</div>
				<?php } ?>
			</div>
		</div>
		<div class="box-body table-responsive no-padding">
			<?php if (!empty($campaignOrder['PaymentAdvice'])) { ?>
			<table class="table table-hover">
				<tr>
					<th style="text-align:center;width:30px;height:30px;">No</th>
					<th style="text-align:center;width:50px;height:30px;"><?php echo __('Invoice Number'); ?></th>
					<th style="text-align:center;width:50px;height:30px;"><?php echo __('Payment Type'); ?></th>
					<th style="text-align:center;width:50px;height:30px;"><?php echo __('Invoice for Download'); ?></th>
					<th style="text-align:center;width:50px;height:30px;"><?php echo __('Payment Receipt'); ?></th>
					<th style="text-align:center;width:50px;height:30px;"><?php echo __('Receipt File'); ?></th>
					<th style="text-align:center;width:50px;height:30px;"><?php echo __('Amount Due'); ?></th>
					<th style="text-align:center;width:50px;height:30px;"><?php echo __('Updated'); ?></th>
					<th style="text-align:center;width:50px;height:30px;">Actions</th>
				</tr>
				<?php 
					$page = $this->params['paging']['PaymentAdvice']['page'];
					$limit = $this->params['paging']['PaymentAdvice']['limit'];
					$counter = ($page * $limit) - $limit + 1; 
				?>
				<?php foreach ($campaignOrder['PaymentAdvice'] as $advice): ?>
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
						<td style="text-align:center;width:50px;height:30px;vertical-align:middle;"><?php echo $advice['updated']; ?></td>
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
								echo $this->Form->postLink('', array('plugin' => 'members', 'controller' => 'payment_advices', 'action' => 'delete_payment_advice', $advice['id'], $campaignOrder['CampaignOrder']['id']), array('class'=>'fa fa-trash-o', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Delete', 'escape' => false, 'confirm' => __('Are you sure you want to delete invoice no : %s?', $advice['invoice_number'])));
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
		
		<?php if ($this->Session->read('Auth.User.Role.alias') == Configure::read('AMS.role_pride_advertiser')):?>
		
		<!-- Footer -->
			<div class="panel-footer">
				<div class="span12" align="center">
					<?php
						echo $this->Html->link($this->Form->button('Back', array('class'=>'btn btn-danger', 'style'=>'color:#fff;')), $this->request->referer(), array('escape'=>false));
					?>
				</div>
			</div>
		<!-- End Footer -->
		
		<?php endif; ?>
	</div>
	<!-- End Payment Advices -->
	
	<?php if (!empty($campaignOrder['CampaignOrderApproval']) && ($this->Session->read('Auth.User.Role.alias') == Configure::read('AMS.role_pride_administrator') || $this->Session->read('Auth.User.Role.alias') == Configure::read('AMS.role_pride_finance'))): ?>
		<div class="box box-info">
			<div class="box-header">
				<h3 class="box-title">Approval</h3>
				<div class="box-tools">
				</div>
			</div>
			<div class="box-body table-responsive no-padding">
				<table class="table table-hover">
					<tr>
						<th style="text-align:center;width:10%;height:30px;">No</th>
						<th style="text-align:center;width:80%;height:30px;">Requirement</th>
						<th style="text-align:center;width:10%;height:30px;">Action</th>
					</tr>
					<?php $counter = 1; ?>
					<?php foreach ($campaignOrder['CampaignOrderApproval'] as $campaignOrderApproval): ?>
						<?php if ($campaignOrderApproval['role_id'] == $this->Session->read('Auth.User.Role.id')) { ?>
							<tr>
								<td style="text-align:center;height:30px;">
									<?php echo h($counter); ?>
								</td>
								<td style="text-align:center;height:30px;">
									<?php echo $campaignOrderApproval['name']; ?>
								</td>
								<td style="text-align:center;height:30px;">
									<?php
										echo $this->Html->link('', array('controller' => 'campaign_order_approvals', 'action' => 'edit', $campaignOrderApproval['id']), array('class'=>'fa fa-gavel', 'style'=>'color:#000;','data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Approval', 'escape' => false));
									?>
								</td>
							</tr>
						<?php } ?>
					<?php $counter++ ?>
					<?php endforeach; ?>
				</table>
			  </div>
			  
				<!-- Footer -->
					<div class="panel-footer">
						<div class="span12" align="center">
							<?php
								echo $this->Html->link($this->Form->button('Back', array('class'=>'btn btn-danger', 'style'=>'color:#fff;')), $this->request->referer(), array('escape'=>false));
							?>
							&nbsp;&nbsp;
							<?php
								//echo $this->Html->link($this->Form->button('Generate Rental Contract', array('class'=>'btn btn-success', 'style'=>'color:#fff;')), $this->request->referer(), array('style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Generate Rental Contract', 'escape' => false, 'confirm' => __('Are you sure you want to generate rental contract?')));
								
								echo $this->Html->link($this->Form->button('Generate Rental Contract', array('class'=>'btn btn-success', 'style'=>'color:#fff;')), $this->request->referer(), array('style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Generate Rental Contract', 'escape' => false, 'confirm' => __('Are you sure you want to generate rental contract?')));
							?>
						</div>
					</div>
				<!-- End Footer -->
				
			</div>
		<?php endif; ?>
</section>
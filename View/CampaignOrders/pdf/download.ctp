<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Provision Order
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
			<h3 class="box-title">Purchased Campaign Details</h3>
			<div class="box-tools">
			</div>
		</div>
		<div class="box-body table-responsive no-padding">
			<table class="table table-hover">
				<tr>
					<th style="width:150px;">Campaign Name</th>
					<td style="width:30px;">:</td>
					<td>
						<?php 
							echo $this->Html->link($campaignOrder['Campaign']['name'], array('controller' => 'campaigns', 'action' => 'view', $campaignOrder['Campaign']['id'])); 
						?>
					</td>
				</tr>
				<tr>
					<th>Purchased Package</th>
					<td>:</td>
					<td><?php echo $campaignOrder['Package']['name']; ?></td>
				</tr>
				<tr>
					<th>Quantity</th>
					<td>:</td>
					<td><?php echo $campaignOrder['Package']['quantity']; ?></td>
				</tr>
			</table>
		</div>
	</div>
	<!-- End Purchased Campaign Details -->

	<!-- Payment Advices -->
	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title">Payment Advices</h3>
			<div class="box-tools">
				<?php if ($this->Session->read('Auth.User.Role.alias') == Configure::read('AMS.role_pride_finance')) {?>
					<div class="no-margin pull-right">
						<?php
							echo $this->Html->link($this->Form->button('<i class="fa fa-upload"></i>&nbsp;&nbsp;&nbsp;Create Payment Advice : Upload Invoice', array('class'=>'btn btn-warning', 'style'=>'color:#fff;width:300px;')), array('plugin' => 'members', 'controller' => 'payment_advices', 'action' => 'add_booking_invoice', $campaignOrder['Campaign']['organization_id'], $campaignOrder['Campaign']['id'], $campaignOrder['CampaignOrder']['id'] ), array('escape'=>false));
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
						<td style="text-align:center;width:50px;height:30px;vertical-align:middle;"><?php echo $advice['amount']; ?></td>
						<td style="text-align:center;width:50px;height:30px;vertical-align:middle;"><?php echo $advice['updated']; ?></td>
						<td class="actions" style="text-align:center;width:30px;height:30px;">
							<?php
								/*Temporary closed
								echo $this->Html->link('', array('plugin' => 'members', 'controller' => 'payment_advices', 'action' => 'edit', $advice['id']), array('class'=>'fa fa-pencil', 'style'=>'color:#000;','data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Modify Payment Invoice',
								'escape' => false));
								*/
							?>
							<?php								
								echo $this->Form->postLink('', array('plugin' => 'members', 'controller' => 'payment_advices', 'action' => 'delete_payment_advice', $advice['id'], $campaignOrder['CampaignOrder']['id']), array('class'=>'fa fa-trash-o', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Delete', 'escape' => false, 'confirm' => __('Are you sure you want to delete invoice no : %s?', $advice['invoice_number'])));
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
								No payment advices are available yet.
							</div>
						</td>
					</tr>
				</table>
				
				<?php } ?>
		</div>
	</div>
	<!-- End Payment Advices -->

	
	<!-- My Buses -->
	<div class="box box-danger">
		<div class="box-header">
			<h3 class="box-title"> My Buses </h3>
		<div class="box-tools"></div>
		</div>
		<div class="box-body table-responsive no-padding">
		<?php if (!empty($campaignOrder['ProvisionBus'])) { ?>
		
			<?php echo $this->element('Pride.campaign_order_table'); ?>
		
		<?php }else{ ?>
		
			<table class="table table-hover">
					<tr>
						<td>
							<br />
							<div class="alert alert-warning alert-dismissable">
								<i class="fa fa-bar-chart-o"></i>
								<?php 
									//if (!$campaignOrder['CampaignOrder']['status'] && $campaignOrder['CampaignOrderApproval'][0]['process_state_id'] == 7) { //approved payment
										echo $this->Html->link('PROVISION MY ORDER NOW !', array('controller' => 'provision_buses', 'action' => 'multi_create', $campaignOrder['Campaign']['id'], $campaignOrder['CampaignOrder']['id'], $campaignOrder['Package']['quantity']), array('style' => 'font-size:16px;color:orange;')); 
								?>
							</div>
						</td>
					</tr>
			</table>
		
		<?php } ?>
		
		<?php if (	!empty($campaign_progress) 
					&& $campaign_progress[0][0]['balance'] == 0 
					&& !$campaignOrder['CampaignOrder']['isSubmitted'] 
				) { ?>
			<?php 
				//echo $this->Form->postButton('Submit Campaign Order',array('action' => 'submit_order', //$campaignOrder['Campaign']['id'], $campaignOrder['CampaignOrder']['id'] ), array('class'=>'button blue //medium')); 
			?>
			
			<div class="panel-footer">
				<div class="span12" align="center">
					<?php
						echo $this->Html->link($this->Form->button('Submit Campaign Order', array('class'=>'btn btn-primary', 'style'=>'color:#fff;')), array('action' => 'submit_order', $campaignOrder['Campaign']['id'], $campaignOrder['CampaignOrder']['id']), array('escape'=>false));
					?>				
				</div>
			</div>
			
			
		<?php } else {  ?>
			<?php 
				//echo $this->Form->postButton('View Campaign Summary',array('action' => 'view_campaign_summary', $campaignOrder['CampaignOrder']['id']), array('class'=>'button blue medium')); 
			?>
		<?php } ?>
	    </div>
	</div>

		<?php if (!empty($campaignOrder['CampaignOrderApproval']) && ($this->Session->read('Auth.User.Role.alias') == Configure::read('AMS.role_pride_administrator') || $this->Session->read('Auth.User.Role.alias') == Configure::read('AMS.role_pride_finance'))): ?>
		<div class="box box-success">
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
					<?php $counter++ ?>
					<?php endforeach; ?>
				</table>
			  </div>
			</div>
		<?php endif; ?>
	</div>
	<!-- End My Buses -->
	
	
</section>
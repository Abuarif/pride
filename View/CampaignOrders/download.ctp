<?php

	echo $this->Html->css(array(
            'bootstrap.min'
        ));
?>


<div class="campaignOrders view">




<div class="panel panel-primary">
  <div class="panel-heading">
		<div style="font-size:36px;color:#FFFFFF">Purchased Campaign Package</div>
  </div>
  <div class="panel-body" align="center">
	<table cellpadding="0" cellspacing="0" width="100%" class="table" style="border-width:1px;border-style:solid;border-left-color:#D6D7D7;border-right-color:#D6D7D7;border-top-color:#D6D7D7;border-bottom-color:#D6D7D7;">
		<thead>
		<tr style="background:#F1F0F0;">
				<th style="text-align:center;width:50%;height:30px;">Campaign</th>
				<th style="text-align:center;width:30%;height:30px;">Package</th>
				<th style="text-align:center;width:30%;height:30px;">Quantity (Unit)</th>
		</tr>
		</thead>
		<tr>
			<td style="text-align:center;width:50%;height:30px;">
				<?php echo $this->Html->link($campaignOrder['Campaign']['name'], array('controller' => 'campaigns', 'action' => 'view', $campaignOrder['Campaign']['id'])); ?>
			</td>
			<td style="text-align:center;width:30%;height:30px;">
				<?php echo $campaignOrder['Package']['name']; ?>
			</td>
			<td style="text-align:center;width:30%;height:30px;">
				<?php echo $campaignOrder['Package']['quantity']; ?>
			</td>
		</tr>
	</table>
  </div>
</div>

<div class="panel panel-primary">
  <div class="panel-heading">
		<div style="font-size:36px;color:#FFFFFF">My Buses</div>
  </div>
  <div class="panel-body" align="center">
	<table cellpadding = "0" cellspacing = "0" class="table" width="100%" style="border-width:1px;border-style:solid;border-left-color:#D6D7D7;border-right-color:#D6D7D7;border-top-color:#D6D7D7;border-bottom-color:#D6D7D7;" class="TFtable">
	<thead>
	<tr style="background:#F1F0F0;">
		<th style="text-align:center;width:50px;height:30px;"><?php echo __('Order No'); ?></th>
		<th style="text-align:center;width:200px;height:30px;"><?php echo __('Status'); ?></th>
		<th class="actions" style="text-align:center;width:70px;height:30px;"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<?php foreach ($campaignOrder['ProvisionBus'] as $provisionBus): ?>
		<tr 
		<?php if($provisionBus['status'] == 1) {?> bgcolor="#FFFFFF" 
		<?php } else if($provisionBus['status'] == 2) { ?> bgcolor="#FFFFFF" 
		<?php } else { ?> bgcolor="#FFFFFF" <?php } ?> >
			<td style="text-align:center;width:50px;height:30px;"><?php echo $provisionBus['order_number']; ?></td>
			<td style="text-align:center">
			
			<div class="progress">
			  
			<?php if($provisionBus['status'] == 1) { ?> 
				
				
				<div class="progress-bar progress-bar-success progress-bar-striped" style="width: 100%">
				<span class="sr-only"><strong>&nbsp;&nbsp;100% Completed</strong></span>
				</div>
			
			<?php } else if ($provisionBus['status'] == 2) { ?>
			
				<div class="progress-bar progress-bar-warning progress-bar-striped" style="width: 80%">
					<span class="sr-only"><strong>&nbsp;&nbsp;80% Visual Reconfiguration Required</strong></span>
				</div>
			
			<?php } else { ?>
			
				<div class="progress-bar progress-bar-danger progress-bar-striped" style="width: 10%">
					<span class="sr-only"><strong>&nbsp;&nbsp;0% </strong></span>
				</div>
				
			<?php } ?>
			
			</div>
			</td>
			<td style="text-align:center;" class="actions">

			<?php if($this->Session->read('Auth.User.Role.alias') ==  Configure::read('AMS.role_pride_contractor')) { ?>
			 
			<?php echo $this->Html->link(
			$this->Html->image('/uploads/viewBig22.png'),
			array(
				'controller' => 'provision_buses',
				'action' => 'view', $provisionBus['id']),
			array('rel'=>'tooltip', 'data-placement'=>'top', 'title'=>'View',
				'escape' => false)
			); ?>&nbsp;&nbsp;
			 			 		 

			<?php } else { ?>			
			
				<?php if (!$campaignOrder['CampaignOrder']['isSubmitted']) { ?>
					<?php echo $this->Html->link(
					$this->Html->image('/uploads/configure22.png'),
					array(
						'controller' => 'provision_buses',
						'action' => 'step1', $provisionBus['id']),
					array('rel'=>'tooltip', 'data-placement'=>'top', 'title'=>'Configure',
						'escape' => false)
					); ?>&nbsp;&nbsp;
				<?php } ?>
				
				<?php echo $this->Html->link(
				$this->Html->image('/uploads/viewBig22.png'),
				array(
					'controller' => 'provision_buses',
					'action' => 'view', $provisionBus['id']),
				array('rel'=>'tooltip', 'data-placement'=>'top', 'title'=>'View',
					'escape' => false)
				); ?>&nbsp;&nbsp;
				
				<?php if (!$campaignOrder['CampaignOrder']['isSubmitted']) { ?>					
					<?php echo $this->Html->link(
					$this->Html->image('/uploads/replacement22.png'),
					array(
						'controller' => 'provision_buses',
						'action' => 'replacement', $provisionBus['id'], $provisionBus['campaign_order_id'], $provisionBus['order_number']),
					array('rel'=>'tooltip', 'data-placement'=>'top', 'title'=>'Replacement',
						'escape' => false)
					);?>
				<?php } ?>
				
			<?php  }  ?>
			</td>
			<script>
				  $('[rel="tooltip"]').tooltip('toggle')
				  $('[rel="tooltip"]').tooltip('hide');   
			</script>
		</tr>
		<?php endforeach; ?>
	</table>
	
	<?php if (	!empty($campaign_progress) 
				&& $campaign_progress[0][0]['balance'] == 0 
				&& !$campaignOrder['CampaignOrder']['isSubmitted'] 
			) { ?>
		<?php echo $this->Form->postButton('Submit Campaign Order',array('action' => 'submit_order', $provisionBus['campaign_order_id'] ), array('class'=>'button blue medium')); ?>
	<?php } else {  ?>
		<?php echo $this->Form->postButton('View Campaign Summary',array('action' => 'view_campaign_summary', $campaignOrder['CampaignOrder']['id']), array('class'=>'button blue medium')); ?>
	<?php } ?>
  </div>
</div>

<?php if (!empty($campaignOrder['CampaignOrderApproval']) && ($this->Session->read('Auth.User.Role.alias') == Configure::read('AMS.role_pride_administrator') || $this->Session->read('Auth.User.Role.alias') == Configure::read('AMS.role_pride_finance'))): ?>

<div class="panel panel-primary">
  <div class="panel-heading">
		<div style="font-size:36px;color:#FFFFFF">Approval</div>
  </div>
  <div class="panel-body" align="center">
	<table cellpadding="0" cellspacing="0" width="100%" class="table" style="border-width:1px;border-style:solid;border-left-color:#D6D7D7;border-right-color:#D6D7D7;border-top-color:#D6D7D7;border-bottom-color:#D6D7D7;">
			<thead>
			<tr style="background:#F1F0F0;">
					<th style="text-align:center;width:100%;height:30px;"  colspan="2">Approval Required</th>
			</tr>
			</thead>
			<?php foreach ($campaignOrder['CampaignOrderApproval'] as $campaignOrderApproval): ?>
		<tr>
			<td style="text-align:center;width:50px;height:30px;"><?php echo $campaignOrderApproval['name']; ?></td>
			
			<td style="text-align:center; class="actions">
				<?php echo $this->Html->link(__('Approval'), array('controller' => 'campaign_order_approvals', 'action' => 'edit', $campaignOrderApproval['id'])); ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	
	
  </div>
</div>


	
<?php endif; ?>

</div>

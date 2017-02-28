<table class="table table-hover">
	<tr>
		<td style="text-align:center;width:50px;height:30px;"><?php echo __('Order No'); ?></td>
		<td style="text-align:center;width:500px;height:30px;"><?php echo __('Status'); ?></td>
		<td class="actions" style="text-align:center;width:70px;height:30px;"><?php echo __('Actions'); ?></td>
	</tr>
	<?php foreach ($campaignOrderDetail['ProvisionBus'] as $provisionBus): ?>
		<tr <?php if($provisionBus['status'] == 1) {?> bgcolor="#FFFFFF" <?php } else if($provisionBus['status'] == 2) { ?> bgcolor="#FFFFFF" <?php } else { ?> bgcolor="#FFFFFF" <?php } ?> >
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
					
					<?php
						echo $this->Html->link('', array('controller' => 'provision_buses', 'action' => 'view', $provisionBus['id']), array('class'=>'fa fa-desktop', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'View', 'escape' => false));
					?>
					
					&nbsp;&nbsp;	 

				<?php } else { ?>			
			
					<?php if (!$campaignOrderDetail['CampaignOrderDetail']['isSubmitted']) { ?>			
						<?php if (!$provisionBus['status'] == 1) { ?>
							<?php
								echo $this->Html->link('', array('controller' => 'provision_buses', 'action' => 'step_a', $provisionBus['id'], $campaignOrderDetail['Campaign']['id'], $provisionBus['campaign_order_detail_id']), array('class'=>'fa fa-gears', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Configure', 'escape' => false));
							?>		
						<?php } else { ?>
							<?php
								echo $this->Html->link('', array('controller' => 'provision_buses', 'action' => 'step_b', $provisionBus['id'], $campaignOrderDetail['Campaign']['id'], $provisionBus['campaign_order_detail_id']), array('class'=>'fa fa-gears', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Re-configure', 'escape' => false));
							?>			
						<?php } ?>
					&nbsp;&nbsp;
					
					<?php } ?>
					
						
				
						<?php
							echo $this->Html->link('', array('controller' => 'provision_buses', 'action' => 'view', $provisionBus['id']), array('class'=>'fa fa-desktop', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'View', 'escape' => false));
						?>
					
					&nbsp;&nbsp;
					
					<?php
						//echo $this->Html->link('', array('action' => 'rental_contract', $campaignOrderDetail['CampaignOrderDetail']['id'], $campaignOrderDetail['CampaignOrderDetail']['organization_id'], $campaignOrderDetail['Campaign']['id'],  'ext' => 'pdf'), array('class'=>'fa fa-download', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Download',  'target' => '_blank', 'escape' => false));
						
						//echo $this->Html->link('', array('action' => 'debug_rental_contract', $campaignOrderDetail['CampaignOrderDetail']['id'], $campaignOrderDetail['CampaignOrderDetail']['organization_id'], $campaignOrderDetail['Campaign']['id']), array('class'=>'fa fa-download', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Download',  'target' => '_blank', 'escape' => false));
						
						echo $this->Html->link('', array('action' => 'provision_download', $provisionBus['id'], $campaignOrderDetail['Campaign']['id'], $campaignOrderDetail['Campaign']['organization_id'],  'ext' => 'pdf'), array('class'=>'fa fa-download', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Download',  'target' => '_blank', 'escape' => false));
						
						//echo $this->Html->link('', array('action' => 'debug_provision_download', $provisionBus['id'], $campaignOrderDetail['Campaign']['id'], $campaignOrderDetail['Campaign']['organization_id']), array('class'=>'fa fa-download', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Download',  'target' => '_blank', 'escape' => false));
					?>
					
				
					<?php if (!$campaignOrderDetail['CampaignOrderDetail']['isSubmitted']) { ?>	
						&nbsp;&nbsp;
						<?php
							//echo $this->Html->link('', array('controller' => 'provision_buses', 'action' => 'replacement', $provisionBus['id'], $provisionBus['campaign_order_detail_id'], $provisionBus['order_number']), array('class'=>'fa fa-refresh', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Replacement', 'escape' => false));
						?>
					<?php } ?>
				<?php  }  ?>
			</td>
		</tr>
		<tr>
			<td colspan="4">
			<?php 
				// get Job Task Details
				$busDetail = $this->requestAction('/pride/provision_buses/getProvisionBus/'.$provisionBus['id']);
				
				$depot = $this->requestAction('/pride/depots/get_depot/'.$busDetail['ProvisionBus']['depot_id']);
				
				$route = $this->requestAction('/pride/route_details/get_route_details/'.$busDetail['ProvisionBus']['route_id']);
				
				$bus = $this->requestAction('/pride/buses/get_bus/'.$busDetail['ProvisionBus']['bus_id']);
				
				if (!empty($depot)) {
			?>
			&nbsp; 
				<table class="table table-bordered">
					<tr>
						<th style="width:150px;">Depot</th>
						<td style="width:30px;text-align:center;">:</td>
						<td>
							<?php 
								echo $this->Html->link($depot['Depot']['name'], array('controller' => 'depots', 'action' => 'view', $depot['Depot']['id'])); 
							?>
						</td>
					</tr>
					<tr>
						<th>Route</th>
						<td style="text-align:center;">:</td>
						<td>
							<?php 
								echo $this->Html->link($route['RouteDetail']['route_number'], array('controller' => 'route_details', 'action' => 'view', $route['RouteDetail']['id'])); 
							?>
						</td>
					</tr>
					<tr>
						<th>Bus Registration No</th>
						<td style="text-align:center;">:</td>
						<td>
							<?php 
								echo $this->Html->link($bus['Bus']['registration_number'], array('controller' => 'buses', 'action' => 'view', $bus['Bus']['id'])); 
							?>
						</td>
					</tr>
				</table>
				<br/>
			</td>
		</tr>
	<?php }
		endforeach; ?>
</table>
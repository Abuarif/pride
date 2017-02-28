<table class="table table-hover">
	<tr>
		<td style="text-align:center;width:50px;height:30px;"><?php echo __('Order No'); ?></td>
		<td style="text-align:center;width:500px;height:30px;"><?php echo __('Status'); ?></td>
		<td class="actions" style="text-align:center;width:70px;height:30px;"><?php echo __('Actions'); ?></td>
	</tr>
	<?php foreach ($campaignOrder['ProvisionBus'] as $provisionBus): ?>
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
			
					<?php if (!$campaignOrder['CampaignOrder']['isSubmitted']) { ?>			
						<?php if (!$provisionBus['status'] == 1) { ?>
							<?php
								echo $this->Html->link('', array('controller' => 'provision_buses', 'action' => 'step_a', $provisionBus['id'], $campaignOrder['Campaign']['id'], $provisionBus['campaign_order_id']), array('class'=>'fa fa-gears', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Configure', 'escape' => false));
							?>		
						<?php } else { ?>
							<?php
								echo $this->Html->link('', array('controller' => 'provision_buses', 'action' => 'step_b', $provisionBus['id'], $campaignOrder['Campaign']['id'], $provisionBus['campaign_order_id']), array('class'=>'fa fa-gears', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Re-configure', 'escape' => false));
							?>			
						<?php } ?>
					&nbsp;&nbsp;
					
					<?php } ?>
					
						
				
						<?php
							echo $this->Html->link('', array('controller' => 'provision_buses', 'action' => 'view', $provisionBus['id']), array('class'=>'fa fa-desktop', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'View', 'escape' => false));
						?>
					
					&nbsp;&nbsp;
					
					<?php
						echo $this->Html->link('', array('controller' => 'provision_buses', 'action' => 'provision_download', $provisionBus['id'],  'ext' => 'pdf'), array('class'=>'fa fa-download', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Download',  'target' => '_blank', 'escape' => false));
					?>
					
				
					<?php if (!$campaignOrder['CampaignOrder']['isSubmitted']) { ?>	
						&nbsp;&nbsp;
						<?php
							echo $this->Html->link('', array('controller' => 'provision_buses', 'action' => 'replacement', $provisionBus['id'], $provisionBus['campaign_order_id'], $provisionBus['order_number']), array('class'=>'fa fa-refresh', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Replacement', 'escape' => false));
						?>
					<?php } ?>
				<?php  }  ?>
			</td>
		</tr>
	<?php endforeach; ?>
</table>
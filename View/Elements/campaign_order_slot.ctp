<?php foreach ($campaignOrder['ProvisionBus'] as $provisionBus): ?>
<!-- Slots -->
	<div class="row">
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-aqua">
				<div class="inner">
					<h3>
						[Bus #]
					</h3>
					<table border="0" cellpadding = "0" cellspacing = "0" style="width:80%;height:30px;">
						<tr>
							<td> [depot] </td>
							<td> [route] </td>
						</tr>
					</table>
				</div>
				<div class="icon">
					<i>[gambo]</i>
				</div>
				<a href="<?php echo $this->webroot; ?>members/members/advertiser_dashboard" class="small-box-footer">
					 <?php if($this->Session->read('Auth.User.Role.alias') ==  Configure::read('AMS.role_pride_contractor')) { ?>
								
								<?php
									echo $this->Html->link('', array('controller' => 'provision_buses', 'action' => 'view', $provisionBus['id']), array('class'=>'fa fa-desktop', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'View', 'escape' => false));
								?>
								
								&nbsp;&nbsp;	 

							<?php } else { ?>			
						
								<?php if (!$campaignOrder['CampaignOrder']['isSubmitted']) { ?>									
									<?php
										echo $this->Html->link('', array('controller' => 'provision_buses', 'action' => 'step_a', $provisionBus['id'], $campaignOrder['Campaign']['id'], $provisionBus['campaign_order_id']), array('class'=>'fa fa-gears', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Configure', 'escape' => false));
									?>									
								
								&nbsp;&nbsp;
								
								<?php } ?>
							
									<?php
										echo $this->Html->link('', array('controller' => 'provision_buses', 'action' => 'view', $provisionBus['id']), array('class'=>'fa fa-desktop', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'View', 'escape' => false));
									?>
								
								&nbsp;&nbsp;
								
								<?php
									echo $this->Html->link('', array('controller' => 'provision_buses', 'action' => 'download', $provisionBus['id'],  'ext' => 'pdf'), array('class'=>'fa fa-download', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Download', 'escape' => false));
								?>
								
							
								<?php if (!$campaignOrder['CampaignOrder']['isSubmitted']) { ?>	
									&nbsp;&nbsp;
									<?php
										echo $this->Html->link('', array('controller' => 'provision_buses', 'action' => 'replacement', $provisionBus['id'], $provisionBus['campaign_order_id'], $provisionBus['order_number']), array('class'=>'fa fa-refresh', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Replacement', 'escape' => false));
									?>
								<?php } ?>
							<?php  }  ?>
				</a>
			</div>
		</div><!-- ./col -->
	</div><!-- /.row -->
<!-- Slots -->
<?php endforeach; ?>
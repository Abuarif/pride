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

	
	<!-- My Buses -->
	<div class="box box-danger">
		<div class="box-header">
			<h3 class="box-title"> List of Sites/Units</h3>
		<div class="box-tools"></div>
		</div>
		<div class="box-body table-responsive no-padding">
		<?php if (!empty($campaignOrderDetail['ProvisionBus'])) { ?>
		
			<?php echo $this->element('Pride.campaign_order_detail_table'); ?>
		
		<?php }else{ ?>
		
			<table class="table table-hover">
					<tr>
						<td>
							<br />
							<div class="alert alert-warning alert-dismissable">
								<i class="fa fa-bar-chart-o"></i>
								<?php 
									//if (!$campaignOrder['CampaignOrder']['status'] && $campaignOrder['CampaignOrderApproval'][0]['process_state_id'] == 7) { //approved payment
										echo $this->Html->link('PROVISION MY ORDER NOW !', array('controller' => 'provision_buses', 'action' => 'multi_create', $campaignOrderDetail['Campaign']['id'], $campaignOrderDetail['CampaignOrder']['id'], $campaignOrderDetail['Package']['quantity'], $campaignOrder['Job']['id']), array('style' => 'font-size:16px;color:orange;')); 
								?>
							</div>
						</td>
					</tr>
			</table>
		
		<?php } ?>
		
		<?php if (	!empty($campaign_progress) 
					&& $campaign_progress[0][0]['balance'] == 0 
					&& !$campaignOrderDetail['CampaignOrderDetail']['isSubmitted'] 
				) { ?>
			<?php 
				//echo $this->Form->postButton('Submit Campaign Order',array('action' => 'submit_order', //$campaignOrder['Campaign']['id'], $campaignOrder['CampaignOrder']['id'] ), array('class'=>'button blue //medium')); 
			?>
			
			<div class="panel-footer">
				<div class="span12" align="center">
					<?php
						echo $this->Html->link($this->Form->button('Submit Campaign Order', array('class'=>'btn btn-primary', 'style'=>'color:#fff;')), array('action' => 'submit_order', $campaignOrderDetail['Campaign']['id'], $campaignOrderDetail['CampaignOrderDetail']['id']), array('escape'=>false));
					?>				
				</div>
			</div>
			
			
		<?php } else {  ?>
			<?php 
				//echo $this->Form->postButton('View Campaign Summary',array('action' => 'view_campaign_summary', $campaignOrder['CampaignOrder']['id']), array('class'=>'button blue medium')); 
			?>
		<?php } ?>
	    </div>
		<div class="panel-footer">
				<div class="span12" align="center">
					<?php
						echo $this->Html->link($this->Form->button('Back to Campaign', array('class'=>'btn btn-primary', 'style'=>'color:#fff;')), array('controller' => 'campaigns', 'action' => 'view', $campaignOrderDetail['Campaign']['id']), array('escape'=>false));
					?>	
					&nbsp;&nbsp;
					<?php
						//echo $this->Html->link($this->Form->button('Generate SPAD Approval Formal Letter', array('class'=>'btn btn-danger', 'style'=>'color:#fff;')), array('action' => 'debug_spad_letter', $campaignOrderDetail['CampaignOrderDetail']['id'],  $campaignOrderDetail['Campaign']['id'], $campaignOrderDetail['Campaign']['organization_id']), array('target' => '_blank', 'escape'=>false));
						
						//echo $this->Html->link('', array('action' => 'spad_letter', $provisionBus['id'], $campaignOrderDetail['Campaign']['id'], $campaignOrderDetail['Campaign']['organization_id'],  'ext' => 'pdf'), array('class'=>'fa fa-download', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Download',  'target' => '_blank', 'escape' => false));
						
						//echo $this->Html->link('', array('action' => 'debug_spad_letter', $provisionBus['id'], $campaignOrderDetail['Campaign']['id'], $campaignOrderDetail['Campaign']['organization_id']), array('class'=>'fa fa-download', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Download',  'target' => '_blank', 'escape' => false));
						
						
					?>
				</div>
			</div>
	</div>
	
		
	</div>
	<!-- End My Buses -->
	
	
</section>
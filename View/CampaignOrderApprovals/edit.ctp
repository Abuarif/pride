<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Campaign Order Approval
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-external-link"></i>Home</a></li>
		<li><a href="#">Provision Order</a></li>
		<li class="active">Campaign Order Approval</li>
	</ol>
</section>

<section class="content">
	<?php echo $this->Form->create('CampaignOrderApproval'); ?>
	<div class="panel panel-default">
	  <div class="panel-body">
		<div class="tab-content">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td style="height:40px;width:11%;color:black">Approval Status</td>
				<td style="width:30px;">:</td>
				<td colspan="3" style="width:1000px;height:40px;">
					<?php 						
						echo $this->Form->input('id');
						$this->Form->inputDefaults(array('label' => false, 'class' => 'span10'));
						echo $this->Form->hidden('campaign_order_id', array(
							'value' => $this->request->data['CampaignOrder']['id'],
						));
						echo $this->Form->hidden('user_id', array(
							'value' => $this->Session->read('Auth.User.id'),
						));
						echo $this->Form->input('process_state_id', array(
							'style' => 'width:370px'
						));
						echo $this->Form->hidden('approval_level_id', array(
							'value' => $this->request->data['ApprovalLevel']['id'],
						));
					?>
				</td>
			  </tr>
			  <?php if ($this->Session->read('Auth.User.Role.alias') == Configure::read('AMS.role_pride_finance')) { ?>
			  <tr>
				<td style="height:40px;width:18%;color:black">Payment Reference Number</td>
				<td style="width:30px;">:</td>
				<td colspan="3" style="width:1000px;height:40px;">
					<?php 
						echo $this->Form->input('payment_reference_number', array(
							'style' => 'width:370px'
						));
					?>
				</td>
			  </tr>
			  <tr>
				<td style="height:40px;color:black">Payment Method</td>
				<td style="width:30px;">:</td>
				<td colspan="3" style="width:1000px;height:40px;">
					<?php 
						echo $this->Form->input('payment_method', array(
							'style' => 'width:370px'
						));
					?>
				</td>
			  </tr>
			  <tr>
				<td style="height:40px;color:black">Bank Name</td>
				<td style="width:30px;">:</td>
				<td colspan="3" style="width:1000px;height:40px;">
					<?php 
						echo $this->Form->input('bank_name', array(
							'style' => 'width:370px'
						));
					?>
				</td>
			  </tr>
			  <?php } ?>
			  <tr>
				<td style="height:40px;color:black">Comment</td>
				<td style="width:30px;">:</td>
				<td colspan="3" style="width:1000px;height:40px;">
					<?php 
						echo '<br/>'.$this->Form->input('comments', array(
							'style' => 'width:370px'
						));
					?>
				</td>
			  </tr>
			</table>  
		</div>
	  </div>
	  <div class="panel-footer">
		<div class="span12" align="center">
			<?php
				echo 
				$this->Form->button(__d('croogo', 'Submit'), array('class' => 'btn btn-primary')) . '&nbsp;&nbsp;' .
				$this->Form->button(__d('croogo', 'Reset'), array('type'=>'reset', 'class' => 'btn btn-info')).'&nbsp;&nbsp;'.
				$this->Html->link(__d('croogo', 'Cancel'), array('controller' => 'campaign_orders', 'action' => 'view',  $this->request->data['CampaignOrder']['id']), array('class' => 'btn btn-danger'));
			?>
		</div>
	  </div>
	</div>
	<?php echo $this->Form->end(); ?>
</section>
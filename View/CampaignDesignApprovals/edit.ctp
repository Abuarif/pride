<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Campaign Design Approval
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-external-link"></i>Home</a></li>
		<li><a href="#">Design Approval Preview</a></li>
		<li class="active">Campaign Design Approval</li>
	</ol>
</section>

<section class="content">
	<?php echo $this->Form->create('CampaignDesignApproval'); ?>
	<div class="panel panel-default">
	  <div class="panel-body">
		<div class="tab-content">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td style="height:40px;width:11%;color:black">Campaign Name</td>
				<td style="width:30px;">:</td>
				<td colspan="3" style="width:2000px;height:40px;">
					<?php 
						$this->Form->inputDefaults(array('label' => false, 'class' => 'span10'));
						echo $this->Form->hidden('id', array(
							'value' => $this->request->data['CampaignDesignApproval']['id'],
						));
						echo $this->Form->hidden('campaign_design_id', array(
							'label' => 'Campaign Design Id',
							'value' => $this->request->data['CampaignDesign']['id'],
						));
						echo $this->Form->hidden('user_id', array(
							'label' => 'User Id',
							'value' => $this->Session->read('Auth.User.id'),
						));
						echo $this->Form->input('process_state_id', array(
							'style' => 'width:370px',
						));
					?>
				</td>
			  </tr>
			  <tr>
				<td style="height:40px;width:11%;color:black">Comment</td>
				<td style="width:30px;">:</td>
				<td colspan="3" style="width:2000px;height:40px;">
					<?php 
						echo $this->Form->hidden('approval_level_id', array(
							'label' => 'Approval Level Id',
							'value' => $this->request->data['ApprovalLevel']['id'],
						));
						echo '<br/>'.$this->Form->input('comments', array(
							'style' => 'width:370px;resize:none;',
							'placeholder' => 'Comment'
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
				$this->Html->link(__d('croogo', 'Cancel'), array('controller' => 'campaignDesigns',  'action' => 'approval_preview', $this->request->data['CampaignDesign']['id']), array('class' => 'btn btn-danger'));
			?>
		</div>
	  </div>
	</div>
<?php echo $this->Form->end(); ?>
</section>
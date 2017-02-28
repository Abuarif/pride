<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Organization Approvals
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-external-link"></i>Home</a></li>
		<li class="active">Organization Approvals</li>
	</ol>
</section>

<section class="content">
	<?php echo $this->Form->create('OrganizationApproval'); ?>
	<div class="panel panel-default">
	  <div class="panel-body">
		<div class="tab-content">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td style="height:40px;width:15%;color:black">Approval Level</td>
				<td style="width:30px;">:</td>
				<td colspan="3" style="width:1000px;height:40px;">
					<?php echo($this->request->data['ApprovalLevel']['name']);  ?>
				</td>
			  </tr>
			  <tr>
				<td style="height:40px;color:black">Organization</td>
				<td style="width:30px;">:</td>
				<td colspan="3" style="height:40px;">
					<?php echo($this->request->data['Organization']['name']);  ?>
				</td>
			  </tr>
			  <tr>
				<td style="height:40px;color:black">Approval Process Status</td>
				<td style="width:30px;">:</td>
				<td colspan="3" style="height:40px;">
					<?php
						 
						echo $this->Form->input('id', array(
							'value' => $this->request->data['OrganizationApproval']['id'],
						));
						$this->Form->inputDefaults(array('label' => false, 'class' => 'span10'));
						echo $this->Form->hidden('organization_id', array(
							'value' => $this->request->data['Organization']['id'],
						));
						echo $this->Form->hidden('role_id', array(
							'value' => $this->request->data['Role']['id'],
						));
						echo $this->Form->input('process_state_id', array(
						//	'label' => 'Approval Process Status',
						));
						echo $this->Form->hidden('approval_level_id', array(
							'value' => $this->request->data['ApprovalLevel']['id'],
						));
						echo $this->Form->hidden('user_id', array(
							//'value' => $this->request->data['User']['id'],
							'value' => $this->Session->read('Auth.User.id'),
						));
						
					?>
				</td>
			  </tr>
			  <tr>
				<td style="height:40px;color:black">Comments</td>
				<td style="width:30px;">:</td>
				<td colspan="3" style="height:40px;width:130px">
					<?php
						echo '<br/>'.$this->Form->input('comments', array(
						
							'style' => 'width:45.5%;height:150px;margin-top:-10px;resize:none;',
							'placeholder' => 'Comments'
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
				echo $this->Html->beginBox(__d('croogo', 'Publishing')) .
				$this->Form->button(__d('croogo', 'Update'), array('class' => 'btn btn-primary')) . '&nbsp;&nbsp;'.
				$this->Form->button(__d('croogo', 'Reset'), array('type'=>'reset', 'class' => 'btn btn-info')).'&nbsp;&nbsp;'.
				$this->Html->link(__d('croogo', 'Cancel'), 
								array(
									'controller' => 'organizations',
									'action' => 'approval_preview', $this->request->data['Organization']['id']
									), 
									array('class' => 'btn btn-danger')) .
				$this->Html->endBox();
			?>
		</div>
	  </div>
	</div>
<?php echo $this->Form->end(); ?>
</section>

<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		New Job
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-external-link"></i>Home</a></li>
		<li><a href="#">Work Orders</a></li>
		<li class="active">New Job</li>
	</ol>
</section>

<section class="content">
	<?php echo $this->Form->create('Job'); ?>
	<div class="panel panel-default">
	  <div class="panel-body">
		<div class="tab-content">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td style="height:40px;width:11%;color:black">Job Type</td>
				<td style="width:30px;">:</td>
				<td colspan="3" style="width:1000px;height:40px;">
					<?php 
						echo $this->Form->input('id');
						$this->Form->inputDefaults(array('label' => false, 'class' => 'span10'));
						echo $this->Form->input('job_type_id', array(
							'style' => 'width:370px'
						));
					?>
				</td>
			  </tr>
			  <tr>
				<td style="height:40px;color:black">User</td>
				<td style="width:30px;">:</td>
				<td colspan="3" style="height:40px;">
					<?php
						echo $this->Form->input('user_id', array(
							'style' => 'width:370px'
						));
					?>
				</td>
			  </tr>
			  <tr>
				<td style="height:40px;color:black">Organization</td>
				<td style="width:30px;">:</td>
				<td colspan="3" style="height:40px;">
					<?php
						echo $this->Form->input('organization_id', array(
							'style' => 'width:370px'
						));
					?>
				</td>
			  </tr>
			  <tr>
				<td style="height:40px;color:black">Campaign</td>
				<td style="width:30px;">:</td>
				<td colspan="3" style="height:40px;">
					<?php
						echo $this->Form->input('campaign_id', array(
							'style' => 'width:370px'
						));
					?>
				</td>
			  </tr>
			  <tr>
				<td style="height:40px;color:black">Campaign Order</td>
				<td style="width:30px;">:</td>
				<td colspan="3" style="height:40px;">
					<?php
						echo $this->Form->input('campaign_order_id', array(
							'style' => 'width:370px'
						));
					?>
				</td>
			  </tr>
			  <tr>
				<td style="height:40px;color:black">Status</td>
				<td style="width:30px;">:</td>
				<td colspan="3" style="height:40px;">
					<?php
						echo $this->Form->input('status');
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
				$this->Form->button(__d('croogo', 'Save'), array('class' => 'btn btn-primary')) . '&nbsp;&nbsp;' .
				$this->Form->button(__d('croogo', 'Reset'), array('type'=>'reset', 'class' => 'btn btn-info')).'&nbsp;&nbsp;'.
				$this->Html->link(__d('croogo', 'Cancel'), array('action' => 'index'), array('class' => 'btn btn-danger'));
			?>
		</div>
	  </div>
	</div>
	<?php echo $this->Form->end(); ?>
</section>
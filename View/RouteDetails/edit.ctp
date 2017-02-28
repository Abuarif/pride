<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Edit Route Detail
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-external-link"></i>Home</a></li>
		<li><a href="#">Route Details</a></li>
		<li class="active">Edit Route Detail</li>
	</ol>
</section>

<section class="content">
	<?php echo $this->Form->create('RouteDetail'); ?>
	<div class="panel panel-default">
	  <div class="panel-body">
		<div class="tab-content">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td style="height:40px;width:10%;color:black">Depot</td>
				<td style="width:30px;">:</td>
				<td colspan="3" style="width:1000px;height:40px;">
					<?php 
						echo $this->Form->input('id');
						$this->Form->inputDefaults(array('label' => false, 'class' => 'span10'));
						echo $this->Form->input('depot_present', array(
							'style' => 'width:370px',
						));
					?>
				</td>
			  </tr>
			  <tr>
				<td style="height:40px;color:black">Route Number</td>
				<td style="width:30px;">:</td>
				<td colspan="3" style="height:40px;">
					<?php 
						echo $this->Form->input('route_number', array(
							'style' => 'width:370px',
						));
					?>
				</td>
			  </tr>
			  <tr>
				<td style="height:40px;color:black">Origin</td>
				<td style="width:30px;">:</td>
				<td colspan="3" style="height:40px;">
					<?php
						echo $this->Form->input('origin', array(
							'style' => 'width:370px',
						));
					?>
				</td>
			  </tr>
			  <tr>
				<td style="height:40px;color:black">Destination</td>
				<td style="width:30px;">:</td>
				<td colspan="3" style="height:40px;">
					<?php
						echo $this->Form->input('destination', array(
							'style' => 'width:370px',
						));
					?>
				</td>
			  </tr>
			  <tr>
				<td style="height:40px;color:black">Route Way 1</td>
				<td style="width:30px;">:</td>
				<td colspan="3" style="height:150px;">
					<?php
						echo $this->Form->input('route_way_1', array(
							'style' => 'width:370px',
						));
					?>
				</td>
			  </tr>
			  <tr>
				<td style="height:40px;color:black">Route Way 2</td>
				<td style="width:30px;">:</td>
				<td colspan="3" style="height:150px;">
					<?php
						echo $this->Form->input('route_way_2', array(
							'style' => 'width:370px',
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
				$this->Form->button(__d('croogo', 'Save'), array('class' => 'btn btn-primary')) . '&nbsp;&nbsp;' .
				$this->Form->button(__d('croogo', 'Reset'), array('type'=>'reset', 'class' => 'btn btn-info')).'&nbsp;&nbsp;'.
				$this->Html->link(__d('croogo', 'Cancel'), array('action' => 'index'), array('class' => 'btn btn-danger'));
			?>
		</div>
	  </div>
	</div>
	<?php echo $this->Form->end(); ?>
</section>
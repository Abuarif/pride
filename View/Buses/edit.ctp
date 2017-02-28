<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Bus Edit
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-external-link"></i>Home</a></li>
		<li><a href="#">List of Buses</a></li>
		<li class="active">Bus Edit</li>
	</ol>
</section>

<section class="content">
	<?php echo $this->Form->create('Bus'); ?>
	<div class="panel panel-default">
	  <div class="panel-body">
		<div class="tab-content">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td style="height:40px;width:13.5%;color:black">Registration Number</td>
				<td style="width:30px;">:</td>
				<td colspan="3" style="width:1000px;height:40px;">
					<?php 
						echo $this->Form->input('id');
						$this->Form->inputDefaults(array('label' => false, 'class' => 'span10'));
						echo $this->Form->hidden('registration_number', array(
							'style' => 'width:370px',
							'value' => $this->request->data['Bus']['registration_number'],
						));
						
						echo $this->request->data['Bus']['registration_number'];
					?>
				</td>
			  </tr>
			  <tr>
				<td style="height:40px;color:black">Brand & Model</td>
				<td style="width:30px;">:</td>
				<td colspan="3" style="height:40px;">
					<?php
						echo $this->Form->input('brand_id', array(
							'style' => 'width:370px',
							'empty' => 'Assign bus brand',
						));
					?>
				</td>
			  </tr>
			  <tr>
				<td style="height:40px;color:black">Route Name</td>
				<td style="width:30px;">:</td>
				<td colspan="3" style="height:40px;">
					<?php
						echo $this->Form->input('route_id', array(
							'style' => 'width:370px',
							'empty' => 'Pick a route',
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
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Add New Visual
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-external-link"></i>Home</a></li>
		<li><a href="#">My Visual</a></li>
		<li class="active">Add New Visual</li>
	</ol>
</section>

<section class="content">
	<?php echo $this->Form->create('CampaignDesign', array('type' => 'file')); ?>
	<div class="panel panel-default">
	  <div class="panel-body">
		<div class="tab-content">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td style="height:40px;width:20%;color:black">Campaign Name</td>
				<td style="width:30px;">:</td>
				<td colspan="3" style="width:1000px;height:40px;">
					<?php 
						echo $this->Form->input('id');
						$this->Form->inputDefaults(array('label' => false, 'class' => 'span10'));
						echo $this->Form->input('campaign_id', array(
							'value' => $this->request->pass['0'],
							'style' => 'width:370px',
						));
					?>
				</td>
			  </tr>
			  <tr>
				<td style="height:40px;width:20%;color:black">Visual Name</td>
				<td style="width:30px;">:</td>
				<td colspan="3" style="width:1000px;height:40px;">
					<?php 
						echo $this->Form->input('name', array(
							'style' => 'width:370px',
						));
					?>
				</td>
			  </tr>
			  <tr>
				<td style="height:40px;color:black">Design Preview Attachment</td>
				<td style="width:30px;">:</td>
				<td colspan="3" style="height:40px;">
					<?php
						echo $this->Form->input('file', array(
						'type' => 'file', 
						));
					?>
				</td>
			  </tr>
			  <tr>
				<td style="height:40px;color:black">Source Design Attachment (.ai)</td>
				<td style="width:30px;">:</td>
				<td colspan="3" style="height:40px;">
					<?php
						echo $this->Form->input('src_file', array(
							'type' => 'file', 
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
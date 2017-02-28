<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Update Submission
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-external-link"></i>Home</a></li>
		<li><a href="#">Jobs Listing</a></li>
		<li class="active">Update Submission</li>
	</ol>
</section>

<section class="content">
	<?php echo $this->Form->create('JobTask', array('type' => 'file')); ?>
	<div class="panel panel-default">
	  <div class="panel-body">
		<div class="tab-content">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td style="height:40px;color:black">Submission Evidence (stamped copy)</td>
				<td style="width:30px;">:</td>
				<td colspan="3" style="height:40px;">
					<?php
						$this->Form->inputDefaults(array('label' => false, 'class' => 'span10'));
						echo $this->Form->input('file', array(
							'type' => 'file'
						));
					?>
				</td>
			  </tr>
			  <tr>
				<td style="height:40px;width:22%;color:black">Notes</td>
				<td style="width:30px;">:</td>
				<td colspan="3" style="width:1000px;height:40px;">
					<?php 
						echo $this->Form->hidden('id');
						echo $this->Form->input('notes', array(
							'style' => 'width:370px;resize:none',
							'placeholder' => 'Notes'
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
				$this->Form->button(__d('croogo', 'Update'), array('class' => 'btn btn-primary')) . '&nbsp;&nbsp;' .
				$this->Form->button(__d('croogo', 'Reset'), array('type'=>'reset', 'class' => 'btn btn-info')).'&nbsp;&nbsp;'.
				$this->Html->link(__d('croogo', 'Cancel'), $this->request->referer(), array('class' => 'btn btn-danger'));
			?>
		</div>
	  </div>
	</div>
	<?php echo $this->Form->end(); ?>
</section>
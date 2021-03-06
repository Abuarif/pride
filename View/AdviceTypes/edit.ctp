<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Edit Payment Advice Type
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-external-link"></i>Home</a></li>
		<li><a href="#">Payment Advice Types</a></li>
		<li class="active">Edit Payment Advice Type</li>
	</ol>
</section>

<section class="content">
	<?php echo $this->Form->create('AdviceType'); ?>
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="tab-content">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td style="height:40px;width:6%;color:black">Name</td>
							<td style="width:30px;">:</td>
							<td colspan="3" style="width:1000px;height:40px;">
								<?php 						
									echo $this->Form->input('id');
									$this->Form->inputDefaults(array('label' => false, 'class' => 'span10'));
									echo $this->Form->input('name', array(
										'style' => 'width:370px',
									));
								?>
							</td>
						</tr>
						<tr>
							<td style="height:40px;color:black">Status</td>
							<td style="width:30px;">:</td>
							<td colspan="3" style="width:1000px;height:40px;">
								<?php 
									echo $this->Form->input('status', array(
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
						$this->Form->button(__d('croogo', 'Update'), array('class' => 'btn btn-primary')) . '&nbsp;&nbsp;' .
						$this->Form->button(__d('croogo', 'Reset'), array('type'=>'reset', 'class' => 'btn btn-info')).'&nbsp;&nbsp;'.
						$this->Html->link($this->Form->button('Cancel', array('class'=>'btn btn-danger', 'style'=>'color:#fff;')), $this->request->referer(), array('escape'=>false)); 
					?>
				</div>
			</div>
		</div>
<?php echo $this->Form->end(); ?>

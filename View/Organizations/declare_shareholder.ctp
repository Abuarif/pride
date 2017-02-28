<script type="text/javascript">
	$(document).ready(function() {
		$('#example').dataTable();
	} );
</script>

<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Shareholders Declaration
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-external-link"></i>Home</a></li>
		<li class="active">Shareholders Declaration</li>
	</ol>
</section>

<section class="content">
	<!-- Custom location sessionFlash -->
		<div style="margin-left:-14px;">
			<?php echo $this->Layout->sessionFlash(); ?>
		</div>
	<!--./location sessionFlash -->
	
	<?php if (empty($organization['OrganizationShareholder'])){ ?>
		<div class="alert alert-info alert-dismissable">
			<i class="fa fa-info"></i>
			
			No shareholder declaration available.
			
			<div class="no-margin pull-right">
				<?php
					echo $this->Html->link($this->Form->button('<i class="fa fa-file"></i>&nbsp;&nbsp;Add New Shareholder', array('class'=>'btn btn-warning', 'style'=>'color:#fff;margin-top:-1.5px;')), array('plugin' => 'pride', 'controller' => 'organization_shareholders','action' => 'add'), array('escape'=>false));
				?>
			</div>
			<br/>&nbsp;	
		</div>
	<?php } else { ?>
	
	<!--Content Uploaded Documentation -->
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">&nbsp;</h3>
					<div class="box-tools">
						<div class="no-margin pull-right">
							<?php
								echo $this->Html->link($this->Form->button('<i class="fa fa-file"></i>&nbsp;&nbsp;Add New Shareholder', array('class'=>'btn btn-warning', 'style'=>'color:#fff;margin-top:-1.5px;')), array('plugin' => 'pride', 'controller' => 'organization_shareholders','action' => 'add'), array('escape'=>false));
							?>
						</div>
					</div>
				</div>
				<div class="box-body table-responsive no-padding">
					<!-- list document references -->								
					
					<table class="table table-hover">
					<tr>
						<th style="text-align:center;width:30px;height:30px;">No</th>
						<th style="text-align:center;width:150px;height:30px;">Full Name</th>
						<th style="text-align:center;width:200px;height:30px;">MyKad / Passport Number / MyCoID</th>
						<th style="text-align:center;width:30px;height:30px;">Director</th>
						<th style="text-align:center;width:30px;height:30px;">Shareholder</th>
						<th style="text-align:center;width:30px;height:30px;">Key Personnel</th>
						<th style="text-align:center;width:30px;height:30px;">Shares Allotted</th>
						<th style="text-align:center;width:30px;height:30px;">Action</th>
					</tr>
					<?php 
						$page = $this->params['paging']['OrganizationShareholder']['page'];
						$limit = $this->params['paging']['OrganizationShareholder']['limit'];
						$counter = ($page * $limit) - $limit + 1; 
					?>
					<?php foreach ($organization['OrganizationShareholder'] as $shareHolder): ?>
					
						<?php
							$orgId = $this->Session->read('Auth.User.organization_id');
							//$myDoc = $this->requestAction('/pride/organization_attachments/getFilename/'.$orgId.'/'.$documentReference['DocumentReference']['id']);
						?>
						
						<tr>
							<td style="text-align:center;width:30px;height:30px;"><?php echo $counter; ?></td>
							<td style="text-align:center;width:50px;height:30px;"><?php echo $shareHolder['name']; ?></td>
							<td style="text-align:center;width:50px;height:30px;"><?php echo $shareHolder['nric']; ?></td>
							<td style="text-align:center;width:50px;height:30px;">
								<?php 
									if($shareHolder['is_director'] == true){
										echo ($shareHolder['is_director'] ? '<i class="fa fa-check-circle" style = "color:green"></i>': ''); 
									}else{
										echo '<i class="fa fa-times-circle" style = "color:red"></i>';
									}
								?>
							</td>
							<td style="text-align:center;width:50px;height:30px;">
								<?php 
									
									if($shareHolder['is_shareholder'] == true){
										echo ($shareHolder['is_shareholder'] ? '<i class="fa fa-check-circle" style = "color:green"></i>': ''); 
									}else{
										echo '<i class="fa fa-times-circle" style = "color:red"></i>'; 
									}
								?>
							</td>
							<td style="text-align:center;width:50px;height:30px;">
								<?php 
									if($shareHolder['is_active_personal'] == true){
										echo ($shareHolder['is_active_personal'] ? '<i class="fa fa-check-circle" style = "color:green"></i>': ''); 
									}else{
										echo '<i class="fa fa-times-circle" style = "color:red"></i>';
									}
								?>
							</td>
							<td style="text-align:center;width:50px;height:30px;"><?php echo $this->Number->currency($shareHolder['shareholding'], 'RM'); ?></td>
							<td style="text-align:center;width:30px;height:30px;">
								<?php if (!empty($shareHolder)) {
										echo $this->Form->postLink('', array('controller' => 'organization_shareholders', 'action' => 'delete', $shareHolder['id']), array('class'=>'fa fa-trash-o', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Delete', 'escape' => false, 'confirm' => __('Are you sure you want to delete this person:  %s?', $shareHolder['name'])));	
									}
								?>
							</td>
						</tr>
					<?php $counter++ ?>
					<?php endforeach; ?>
					</table>
					
					<!-- end list document references -->
					
				</div>
				<div class="panel-footer">
					<div class="span12" align="center">
						<?php
							echo
								$this->Html->link(__d('croogo', 'Next'), array('plugin' => 'pride', 'controller' => 'organizations', 'action' => 'declare_keypersonnel', $this->Session->read('Auth.User.organization_id')),array('class' => 'btn btn-primary')).'&nbsp;&nbsp;'.
								$this->Html->link(__d('croogo', 'Cancel'), array('plugin' => 'members', 'controller' => 'members', 'action' => 'index'), array('class' => 'btn btn-danger'));
						?>
					</div>
				</div>
			</div>
		<!-- End Content Uploaded Documentation -->	
	<?php } ?>
</section>
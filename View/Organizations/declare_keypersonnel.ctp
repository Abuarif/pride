<style type="text/css">
    .popover{
        max-width:800px;
    }
</style>

<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Key Personnels Declaration
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-external-link"></i>Home</a></li>
		<li class="active">Key Personnels Declaration</li>
	</ol>
</section>

<section class="content">
	<!-- Custom location sessionFlash -->	
		<div style="margin-left:-14px;">	
			<?php echo $this->Layout->sessionFlash(); ?>
		</div>
	<!--./location sessionFlash -->

	<?php if (empty($organization['OrganizationKeyPersonnel'])){ ?>
		<div class="alert alert-info alert-dismissable">
			<i class="fa fa-info"></i>
			No of Key Personnels declared: <?php echo $organization['Organization']['staffs']; ?> personnels. <br/> Please declare the top 5 most important personnels.
				<div class="no-margin pull-right">
					<?php
						echo $this->Html->link($this->Form->button('<i class="fa fa-file"></i>&nbsp;&nbsp;Add New Key Personnel', array('class'=>'btn btn-warning', 'style'=>'color:#fff;margin-top:-1.5px;')), array('plugin' => 'pride', 'controller' => 'organization_key_personnels','action' => 'add'), array('escape'=>false));
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
							echo $this->Html->link($this->Form->button('<i class="fa fa-file"></i>&nbsp;&nbsp;Add New Key Personnel', array('class'=>'btn btn-warning', 'style'=>'color:#fff;margin-top:-1.5px;')), array('plugin' => 'pride', 'controller' => 'organization_key_personnels','action' => 'add'), array('escape'=>false));
						?>
					</div>
				</div>
			</div><?php //foreach ($organization['OrganizationKeyPersonnel'] as $keyPersonnel): ?>
				
					<?php
						//$orgId = $this->Session->read('Auth.User.organization_id');
						//$myDoc = $this->requestAction('/pride/organization_attachments/getFilename/'.$orgId.'/'.$documentReference['DocumentReference']['id']);
					?>
					
			<div class="box-body table-responsive no-padding">
				<!-- list document references -->								
				
				<table class="table table-hover">
				<tr>
					<th style="text-align:center;width:30px;height:30px;">No</th>
					<th style="text-align:center;width:200px;height:30px;"><?php echo __('Full Name'); ?></th>
					<th style="text-align:center;width:200px;height:30px;"><?php echo __('Position'); ?></th>
					<th style="text-align:center;width:30px;height:30px;"><?php echo __('Background'); ?></th>
					<th class="actions" style="text-align:center;width:30px;height:30px;">Action</th>
				</tr>
				<?php 
					$page = $this->params['paging']['OrganizationKeyPersonnel']['page'];
					$limit = $this->params['paging']['OrganizationKeyPersonnel']['limit'];
					$counter = ($page * $limit) - $limit + 1; 
				?>
				<?php foreach ($organization['OrganizationKeyPersonnel'] as $keyPersonnel): ?>
					<tr>
						<td style="text-align:center;width:30px;height:30px;"><?php echo $counter; ?></td>
						<td style="text-align:center;width:200px;height:30px;"><?php echo $keyPersonnel['name']; ?></td>
						<td style="text-align:center;width:30px;height:30px;"><?php echo $keyPersonnel['position']; ?></td>
						<td style="text-align:center;width:30px;height:30px;">
							<button type="button" data-container="body" data-toggle="popover" data-placement="left" data-content="<?php echo $keyPersonnel['background']; ?>" style="background-color:transparent;border:none;">
									 <span class="label label-danger">View Details</span>
							</button>
						</td>
						<td style="text-align:center;width:30px;height:30px;">
							<?php if (!empty($keyPersonnel)) {
									echo 
									/*'<button type="button" data-container="body" data-toggle="popover" data-placement="left" data-content="' . $keyPersonnel['background'] . '" style="background-color:transparent;border:none;">
									 <i class="fa fa-file"></i>
									</button>' .
									
									'&nbsp;&nbsp;' .*/
									
									$this->Form->postLink('', array('controller' => 'organization_key_personnels', 'action' => 'delete', $keyPersonnel['id']), array('class'=>'fa fa-trash-o', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Delete', 'escape' => false, 'confirm' => __('Are you sure you want to delete this person:  %s?', $keyPersonnel['name'])));	
								}
							?>
						</td>										
					</tr>
					<?php $counter++ ?>
					<?php endforeach; ?>
				</table>
				<!-- end list document references -->
				
				<!-- Custom location sessionFlash -->
					<div style="margin-left:-14px;">
						<?php echo $this->Layout->sessionFlash(); ?>
					</div>
				<!--./location sessionFlash -->
			</div>
			<div class="panel-footer">
				<div class="span12" align="center">
					<?php
						echo
							$this->Html->link(__d('croogo', 'Next'), array('plugin' => 'pride', 'controller' => 'organizations', 'action' => 'upload_documentation', $this->Session->read('Auth.User.organization_id')),array('class' => 'btn btn-primary')).'&nbsp;&nbsp;'.
							$this->Html->link(__d('croogo', 'Cancel'), array('plugin' => 'members', 'controller' => 'members', 'action' => 'index'), array('class' => 'btn btn-danger'));
					?>
				</div>
			</div>
		</div>
		<!-- End Content Uploaded Documentation -->
	<?php } ?>		
</section>
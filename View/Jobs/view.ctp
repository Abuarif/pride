<?php
	echo $this->Html->css(array(
            'jquery-ui.css',
        ));
		
	echo $this->Html->script(array(
            'jquery.min',
            'jquery-1.4.2.min.js',
            'jquery-ui.min.js',
		));
?>

<script>
  $(function() {
    $( "#CompletedDate" ).datepicker({
      changeMonth: true,
	  dateFormat: 'dd-mm-yy',
	  altFormat: 'mm-dd-yy',
      changeYear: true
    });
  }); 
  
  
  $(document).ready(function(){
    $(".toggler").click(function(e){
        e.preventDefault();
        $('.cat'+$(this).attr('data-prod-cat')).toggle();
    });
});
</script>


<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Job Listing Details
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-sign-in"></i>Home</a></li>
		<li><a href="#">Job Listing</a></li>
		<li class="active">Job Listing Details</li>
	</ol>
</section>

<section class="content">
	<!-- Custom location sessionFlash -->	
		<div style="margin-left:-14px;">	
			<?php echo $this->Layout->sessionFlash(); ?>
		</div>
	<!--./location sessionFlash -->
	
	<!-- Multiple Tab -->
	<div class="nav-tabs-custom">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#tab_1-1" data-toggle="tab">Details</a></li>
			<li class=""><a href="#tab_2-2" data-toggle="tab">Tasks</a></li>	
			
		</ul>
		<div class="tab-content">
			<div class="tab-pane active" id="tab_1-1">
				<div class="box box-primary">
				<div class="box-body table-responsive no-padding">
					<table class="table table-hover">
						<tr>
							<th style="width:130px;">Job Type</th>
							<td style="width:30px;">:</td>
							<td>
								<?php 
									echo $this->Html->link($job['JobType']['name'], array('controller' => 'job_types', 'action' => 'view', $job['JobType']['id'])); 
								?>
							</td>
						</tr>
						<tr>
							<th>User</th>
							<td>:</td>
							<td>
								<?php 
									echo $this->Html->link($job['User']['name'], array('controller' => 'users', 'action' => 'view', $job['User']['id'])); 
								?>
							</td>
						</tr>
						<tr>
							<th>Organization</th>
							<td>:</td>
							<td>
								<?php 
									echo $this->Html->link($job['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $job['Organization']['id'])); 
								?>
							</td>
						</tr>
						<tr>
							<th>Campaign</th>
							<td>:</td>
							<td>
								<?php 
									echo $this->Html->link($job['Campaign']['name'], array('controller' => 'campaigns', 'action' => 'view', $job['Campaign']['id'])); 
								?>
							</td>
						</tr>
					</table>
				</div><!-- /.box-body -->
			</div>
			</div><!-- /.tab-pane -->
			<div class="tab-pane" id="tab_2-2">
				<div class="box box-primary">
					<div class="box-body table-responsive no-padding">
						<table class="table table-hover">
							<tr>
									<th style="text-align:center;width:20px;height:30px;">No</th>
									<th style="text-align:center;width:50px;height:30px;">Task</th> 
									<th style="text-align:center;width:50px;height:30px;">Last Updated</th>
									<th style="text-align:center;width:50px;height:30px;">Action</th>
							</tr>
							<?php $counter = 1; ?>
							<?php foreach ($job['JobTask'] as $jobTask): ?>
							<?php
								// get job type
								if ($jobTask['job_type_id'] != 0) {
									$jobType = $this->requestAction('/pride/job_types/get_job_type/'. $jobTask['job_type_id']);
									
									/*
									$model = $brand['Brand']['model'];
									$viewImage = $this->Html->link('[Preview]', "/templates/".$brand['Brand']['files'], array('target' => '_blank')); 
									$aiImage = $this->Html->link('[Download Template]', "/templates/".$brand['Brand']['src_files'], array('target' => '_blank')); 
									
									*/
								}
							?>
							<tr>
								<td style="text-align:center;width:20px;height:30px;">
									<?php echo h($counter); ?>
								</td>
								<td style="text-align:center;width:50px;height:30px;">
									<?php echo h($jobType['JobType']['name']); ?>
								</td>
								<td style="text-align:center;width:50px;height:30px;">
									<?php echo h($this->Time->niceShort( $jobTask['updated'])) . ' ' . date('A', strtotime($jobTask['updated'])); ?>
									<?php //echo $this->Time->format($jobTask['updated'], '%d-%m-%Y %A'); ?>
									<?php //echo date('h:i A', strtotime($jobTask['updated'])); ?>
								</td>
								<td style="text-align:center;width:50px;height:30px;">
									<?php
									
										if ($jobTask['job_type_id'] == 4) {
									
											echo $this->Html->link('', array('controller' => 'job_tasks', 'action' => 'spad', $job['Job']['id'],  'ext' => 'pdf'), array('class'=>'fa fa-download', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Download Form',  'target' => '_blank', 'escape' => false));
										
										} else if ($jobTask['job_type_id'] == 5){
										
											echo $this->Html->link('', array('controller' => 'job_tasks', 'action' => 'update_submission', $job['Job']['id'], $jobTask['id']), array('class'=>'glyphicon glyphicon-export', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Update Submission', 'escape' => false));
										
										} else if ($jobTask['job_type_id'] == 6){
										
											echo $this->Html->link('', array('controller' => 'job_tasks', 'action' => 'update_approval', $job['Job']['id'], $jobTask['id']), array('class'=>'glyphicon glyphicon-import', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Update Approval', 'escape' => false));
											
										} else {
										
											//echo $this->Html->link('', array('controller' => 'job_tasks', 'action' => 'view', $jobTask['id']), array('class'=>'fa fa-desktop', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Update Approval', 'escape' => false));
											
											echo 
											
											$this->Html->link('', array('controller' => 'job_tasks', 'action' => 'view', $jobTask['id'], $jobTask['job_id']), array('class'=>'fa fa-desktop', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'View Job Task Details', 'escape' => false)) . 
											
											'&nbsp;&nbsp;&nbsp;' . 
											
											$this->Html->link('', array('controller' => 'job_tasks', 'action' => 'update_job', $jobTask['id'], $jobTask['job_id']), array('class'=>'fa fa-edit', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Update Job Task', 'escape' => false));
											
										}
									?>
									
									<a href="#" class="toggler" data-prod-cat="<?php echo $counter; ?>" style="color:black;"><i class="fa fa-fw fa-plus-square"></i></a>
								</td>
								
							</tr>
							<tr class="<?php echo 'cat'.$counter; ?>" style="display:none">
								<td colspan="4">
									<?php 
										// get Job Task Details
										$provisionBus = $this->requestAction('/pride/provision_buses/getProvisionBus/'.$jobTask['provision_bus_id']);
									?> 
									<table class="table table-bordered">
										<tr>
											<th style="width:150px;">Depot</th>
											<td style="width:30px;text-align:center;">:</td>
											<td>
												<?php 
													echo $this->Html->link($provisionBus['Depot']['name'], array('controller' => 'depots', 'action' => 'view', $provisionBus['Depot']['id'])); 
												?>
											</td>
										</tr>
										<tr>
											<th>Route</th>
											<td style="width:30px;text-align:center;">:</td>
											<td>
												<?php 
													echo $this->Html->link($provisionBus['RouteDetail']['route_number'], array('controller' => 'route_details', 'action' => 'view', $provisionBus['RouteDetail']['id'])); 
												?>
											</td>
										</tr>
										<tr>
											<th>Bus Registration No</th>
											<td style="width:30px;text-align:center;">:</td>
											<td>
												<?php 
													echo $this->Html->link($provisionBus['Bus']['registration_number'], array('controller' => 'buses', 'action' => 'view', $provisionBus['Bus']['id'])); 
												?>
											</td>
										</tr>
										<tr>
											<th>Tag No</th>
											<td style="width:30px;text-align:center;">:</td>
											<td>
												<?php 
													echo $this->Html->link($provisionBus['CampaignDesign']['tag_code'], array('controller' => 'campaign_designs', 'action' => 'view', $provisionBus['CampaignDesign']['id'])); 
												?>
											</td>
										</tr>
									</table>
									
									<?php if(!empty($provisionBus['CampaignDesign']['files'])) { ?>
									<br/>
									<table class="table table-bordered">
										<tr>
											<td>
												<div align="center">
													<?php	
														echo $this->Html->image("../attachments/".$provisionBus['CampaignDesign']['files'], array('height'=> '400', 'width'=>'500'),array('style' => 'float:right'));
													?>
												</div>
											</td>
										</tr>
									</table>
									<?php } ?>
								</td>
							</tr>
							<?php $counter++; ?>
							<?php endforeach; ?>
						</table>
					</div>
				</div>
			</div><!-- /.tab-pane -->
		</div>
</section>
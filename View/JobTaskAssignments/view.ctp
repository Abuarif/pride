<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Job Task Assignment Details
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-sign-in"></i>Home</a></li>
		<li><a href="#">List of Job Task Assignments</a></li>
		<li class="active">Job Task Assignment Details</li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
				<div class="box-body table-responsive no-padding">
					<table class="table table-hover">
						<tr>
							<th style="width:110px;">Job ID</th>
							<td style="width:30px;">:</td>
							<td>
								<?php 
									echo $this->Html->link($jobTaskAssignment['Job']['id'], array('controller' => 'jobs', 'action' => 'view', $jobTaskAssignment['Job']['id'])); 
								?>
							</td>
						</tr>
						<tr>
							<th>Organization</th>
							<td>:</td>
							<td>
								<?php 
									echo $this->Html->link($jobTaskAssignment['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $jobTaskAssignment['Organization']['id'])); 
								?>
							</td>
						</tr>
						<tr>
							<th>Status</th>
							<td>:</td>
							<td>
								<?php echo h($jobTaskAssignment['JobTaskAssignment']['status']); ?>
							</td>
						</tr>
					</table>
				</div><!-- /.box-body -->
			</div><!-- /.box -->
		</div>
	</div>
</section>
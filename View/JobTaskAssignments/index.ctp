<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		List of Job Task Assignments
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-external-link"></i>Home</a></li>
		<li><a href="#">Work Orders</a></li>
		<li class="active">List of Job Task Assignments</li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
				<?php if(!empty ($jobTaskAssignments)) { ?>
				<div class="box-header">
					<h3 class="box-title">Jobs</h3>
					<div class="box-tools"> 
						<ul class="pagination pagination-sm no-margin pull-right">
								<?php
							   echo $this->Paginator->prev(__('Prev'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
						   
						   echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1));
						   
						   echo $this->Paginator->next(__('Next'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
							   ?>
						</ul>
					</div>
				</div>
				<?php } ?>
				<div class="box-body table-responsive no-padding">
					<?php if(!empty ($jobTaskAssignments)) { ?>
					<table class="table table-hover">
						<tr>
							<th style="text-align:center;width:20px;height:30px;">No</th>
							<th style="text-align:center;width:150px;height:30px;">Job ID</th>
							<th style="text-align:center;width:150px;height:30px;">Organization</th>
							<th style="text-align:center;width:120px;height:30px;">Status</th>
							<th class="actions" style="text-align:center;width:120px;height:30px;">Actions</th>
						</tr>
						<?php 
							$page = $this->params['paging']['JobTaskAssignment']['page'];
							$limit = $this->params['paging']['JobTaskAssignment']['limit'];
							$counter = ($page * $limit) - $limit + 1; 
						?>
						<?php foreach ($jobTaskAssignments as $jobTaskAssignment): ?>
						<tr>
							<td style="text-align:center;width:20px;height:25px;"><?php echo h($counter); ?></td>
							<td style="text-align:center;width:150px;height:30px;">
								<?php 
									echo $this->Html->link($jobTaskAssignment['Job']['id'], array('controller' => 'jobs', 'action' => 'view', $jobTaskAssignment['Job']['id']));
								?>
							</td>
							<td style="text-align:center;width:150px;height:30px;">
								<?php 
									echo $this->Html->link($jobTaskAssignment['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $jobTaskAssignment['Organization']['id']));
								?>
							</td>
							<td style="text-align:center;width:120px;height:30px;"> 
								<?php 
									echo h($jobTaskAssignment['JobTaskAssignment']['status']);
								?>
							</td>
							<td class="actions" style="text-align:center;width:30px;height:30px;">
								<?php
									echo $this->Html->link('', array('action' => 'view', $jobTaskAssignment['JobTaskAssignment']['id']), array('class'=>'fa fa-desktop', 'style'=>'color:#000;','data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'View', 'escape' => false));
								?>
								
								&nbsp;&nbsp;
						
								<?php
									echo $this->Html->link('', array('action' => 'edit', $jobTaskAssignment['JobTaskAssignment']['id']), array('class'=>'fa fa-edit', 'style'=>'color:#000;','data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Edit', 'escape' => false));
								?>
									
								&nbsp;&nbsp;
								
								<?php
									echo $this->Form->postLink('', array('action' => 'delete', $jobTaskAssignment['JobTaskAssignment']['id']), array('class'=>'fa fa-trash-o', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Delete', 'escape' => false, 'confirm' => __('Are you sure you want to delete job %s?', $jobTaskAssignment['JobTaskAssignment']['id'])));
								?>									
							</td>
						</tr>
						<?php $counter++; ?>
						<?php endforeach; ?>
					</table>
					<?php }else{ ?>
					<table class="table table-hover">
						<tr>
							<td>
								<br />
								<div class="alert alert-warning alert-dismissable">
									<i class="fa fa-info"></i>
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									No job types are available yet.
								</div>
							</td>
						</tr>
					</table>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>
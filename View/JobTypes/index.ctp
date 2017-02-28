<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		List of Job Types
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-external-link"></i>Home</a></li>
		<li><a href="#">Work Orders</a></li>
		<li class="active">List of Job Types</li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
				<?php if(!empty ($jobTypes)) { ?>
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
					<?php if(!empty ($jobTypes)) { ?>
					<table class="table table-hover">
						<tr>
							<th style="text-align:center;width:20px;height:30px;">No</th>
							<th style="text-align:center;width:150px;height:30px;">Level</th>
							<th style="text-align:center;width:150px;height:30px;">Name</th>
							<th style="text-align:center;width:120px;height:30px;">Status</th>
							<th class="actions" style="text-align:center;width:120px;height:30px;">Actions</th>
						</tr>
						<?php 
							$page = $this->params['paging']['JobType']['page'];
							$limit = $this->params['paging']['JobType']['limit'];
							$counter = ($page * $limit) - $limit + 1; 
						?>
						<?php foreach ($jobTypes as $jobType): ?>
						<tr>
							<td style="text-align:center;width:20px;height:25px;"><?php echo h($counter); ?></td>
							<td style="text-align:center;width:150px;height:30px;">
								<?php 
									echo h($jobType['JobType']['level']);
								?>
							</td>
							<td style="text-align:center;width:150px;height:30px;">
								<?php 
									echo h($jobType['JobType']['name']);
								?>
							</td>
							<td style="text-align:center;width:120px;height:30px;"> 
								<?php 
									echo h($jobType['JobType']['status']); 
								?>
							</td>
							<td class="actions" style="text-align:center;width:30px;height:30px;">
								<?php
									echo $this->Html->link('', array('action' => 'view', $jobType['JobType']['id']), array('class'=>'fa fa-desktop', 'style'=>'color:#000;','data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'View', 'escape' => false));
								?>
								
								&nbsp;&nbsp;
						
								<?php
									echo $this->Html->link('', array('action' => 'edit', $jobType['JobType']['id']), array('class'=>'fa fa-edit', 'style'=>'color:#000;','data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Edit', 'escape' => false));
								?>
									
								&nbsp;&nbsp;
								
								<?php
									echo $this->Form->postLink('', array('action' => 'delete', $jobType['JobType']['id']), array('class'=>'fa fa-trash-o', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Delete', 'escape' => false, 'confirm' => __('Are you sure you want to delete job %s?', $jobType['JobType']['name'])));
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
	
	<!-- ../temporary closed
	<div class="actions">
		<h3><?php echo __('Actions'); ?></h3>
		<ul>
			<li><?php //echo $this->Html->link(__('New Job Type'), array('action' => 'add')); ?></li>
			<li><?php //echo $this->Html->link(__('List Job Tasks'), array('controller' => 'job_tasks', 'action' => 'index')); ?> </li>
			<li><?php //echo $this->Html->link(__('New Job Task'), array('controller' => 'job_tasks', 'action' => 'add')); ?> </li>
			<li><?php //echo $this->Html->link(__('List Jobs'), array('controller' => 'jobs', 'action' => 'index')); ?> </li>
			<li><?php //echo $this->Html->link(__('New Job'), array('controller' => 'jobs', 'action' => 'add')); ?> </li>
		</ul>
	</div>
	../temporary closed -->
</section>
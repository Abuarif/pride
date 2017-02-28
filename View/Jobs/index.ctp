<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Job Listing
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-external-link"></i>Home</a></li>
		<li><a href="#">System Settings</a></li>
		<li class="active">Job Listing</li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
				<?php if(!empty ($jobs)) { ?>
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
					<?php if(!empty ($jobs)) { ?>
					<table class="table table-hover">
						<tr>
							<th style="text-align:center;width:20px;height:30px;">No</th>
							<th style="text-align:center;width:150px;height:30px;">Job Type</th>
							<th style="text-align:center;width:150px;height:30px;">User</th>
							<th style="text-align:center;width:120px;height:30px;">Organization</th>
							<th style="text-align:center;width:120px;height:30px;">Campaign</th>
							<th class="actions" style="text-align:center;width:80px;height:30px;">Actions</th>
						</tr>
						<?php 
							$page = $this->params['paging']['Job']['page'];
							$limit = $this->params['paging']['Job']['limit'];
							$counter = ($page * $limit) - $limit + 1; 
						?>
						<?php foreach ($jobs as $job): ?>
						<tr>
							<td style="text-align:center;width:20px;height:25px;"><?php echo h($counter); ?></td>
							<td style="text-align:center;width:150px;height:30px;">
								<?php 
									echo $this->Html->link($job['JobType']['name'], array('controller' => 'job_types', 'action' => 'view', $job['JobType']['id']));
								?>
							</td>
							<td style="text-align:center;width:150px;height:30px;">
								<?php 
									echo $this->Html->link($job['User']['name'], array('controller' => 'users', 'action' => 'view', $job['User']['id']));
								?>
							</td>
							<td style="text-align:center;width:150px;height:30px;">
								<?php 
									echo $this->Html->link($job['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $job['Organization']['id']));
								?>
							</td>
							<td style="text-align:center;width:120px;height:30px;"> 
								<?php 
									echo $this->Html->link($job['Campaign']['name'], array('controller' => 'campaigns', 'action' => 'view', $job['Campaign']['id']));
								?>
							</td>
							<td class="actions" style="text-align:center;width:30px;height:30px;">
								<?php
								
									if ($job['JobType']['id'] == 1) { 
										echo $this->Html->link('', array('controller' => 'jobs', 'action' => 'spad_view', $job['Job']['id']), array('class'=>'fa fa-desktop', 'style'=>'color:#000;','data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'View Details','escape' => false));
									
									} else {
										echo $this->Html->link('', array('controller' => 'jobs', 'action' => 'view', $job['Job']['id']), array('class'=>'fa fa-desktop', 'style'=>'color:#000;','data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'View Details','escape' => false));
									}
									//echo $this->Html->link('', array('action' => 'view', $job['Job']['id']), array('class'=>'fa fa-desktop', 'style'=>'color:#000;','data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'View', 'escape' => false));
								?>
								<!-- ../temporary closed
								&nbsp;&nbsp;
						
								<?php
									//echo $this->Html->link('', array('action' => 'edit', $job['Job']['id']), array('class'=>'fa fa-edit', 'style'=>'color:#000;','data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Edit', 'escape' => false));
								?>
									
								&nbsp;&nbsp;
								
								<?php
									//echo $this->Form->postLink('', array('action' => 'delete', $job['Job']['id']), array('class'=>'fa fa-trash-o', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Delete', 'escape' => false, 'confirm' => __('Are you sure you want to delete job %s?', $job['JobType']['name'])));
								?>	
								../temporary closed -->
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
									No jobs are available yet.
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
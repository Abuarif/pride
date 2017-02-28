<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Approved List
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-external-link"></i>Home</a></li>
		<li><a href="#">Advertisers</a></li>
		<li class="active">Approved List</li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Organization Details</h3>
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
				<div class="box-body table-responsive no-padding">
					<table class="table table-hover">
					<tr>
						<th style="text-align:center;width:20px;height:30px;">No</th>
						<th style="text-align:center;width:150px;height:30px;">Name</th>
						<th style="text-align:center;width:150px;height:30px;">Contact Person</th>
						<th style="text-align:center;width:120px;height:30px;">Contact Number</th>
						<th class="actions" style="text-align:center;width:100px;height:30px;">Actions</th>
					</tr>
					<?php 
						$page = $this->params['paging']['Organization']['page'];
						$limit = $this->params['paging']['Organization']['limit'];
						$counter = ($page * $limit) - $limit + 1; 
					?>
					<?php foreach ($organizations as $organization): ?>
					<tr>
						<td style="text-align:center;width:20px;height:25px;"><?php echo h($counter); ?></td>
						<td style="text-align:center;width:150px;height:30px;"><?php echo h($organization['Organization']['name']); ?>&nbsp;</td>
						<td style="text-align:center;width:80px;height:30px;"><?php echo h($organization['Organization']['contact_person']); ?>&nbsp;</td>
						<td style="text-align:center;width:50px;height:30px;"><?php echo h($organization['Organization']['contact_number']); ?>&nbsp;</td>
						<td class="actions" style="text-align:center;width:100px;height:30px;">							
							<?php
								echo $this->Html->link('', array('action' => 'view', $organization['Organization']['id']), array('class'=>'fa fa-desktop', 'style'=>'color:#000;','data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'View',
								'escape' => false));
							?>
							
							&nbsp;	
							
							<?php
								echo $this->Html->link('', array('action' => 'edit', $organization['Organization']['id']), array('class'=>'fa fa-pencil-square-o', 'style'=>'color:#000;','data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Edit',
								'escape' => false));
							?>
							
							&nbsp;
							
							<?php			
								echo $this->Form->postLink('', array('action' => 'delete', $organization['Organization']['id']), array('class'=>'fa fa-trash-o', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Delete', 'escape' => false, 'confirm' => __('Are you sure you want to delete # %s?', $organization['Organization']['id'])));			
							?>	
						</td>
					</tr>
					<?php $counter++; ?>
					<?php endforeach; ?>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
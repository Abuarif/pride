<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		List of Buses Calendar
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-external-link"></i>Home</a></li>
		<li><a href="#">Bus Calendar</a></li>
		<li class="active">List of Buses Calendar</li>
	</ol>
</section>

<section class="content">

<!-- Custom location sessionFlash -->	
    <div style="margin-left:-14px;">	
        <?php echo $this->Layout->sessionFlash(); ?>
    </div>
<!--./location sessionFlash -->

	<div class="campaigns index">
	<?php echo $this->element('Pride.search_bus'); ?>
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Bus Organizer</h3>
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
						<th style="text-align:center;width:200px;height:30px;">Bus</th>
						<th style="text-align:center;width:200px;height:30px;">Organization</th>
						<th style="text-align:center;width:300px;height:30px;">Bus Status</th>
						<th style="text-align:center;width:100px;height:30px;">Start Date</th>
						<th style="text-align:center;width:100px;height:30px;">End Date</th>
						<th class="actions" style="text-align:center;width:100px;height:30px;">Actions</th>
					</tr>
					<?php 
						$page = $this->params['paging']['BusTransaction']['page'];
						$limit = $this->params['paging']['BusTransaction']['limit'];
						$counter = ($page * $limit) - $limit + 1; 
					?>
					<?php foreach ($busTransactions as $busTransaction): ?>
					<tr>
						<td style="text-align:center;width:20px;height:25px;">
							<?php echo h($counter); ?>
						</td>
						<td style="text-align:center;width:150px;height:30px;">
							<?php 
								echo $this->Html->link($busTransaction['Bus']['name'], array('controller' => 'buses', 'action' => 'view', $busTransaction['Bus']['id'])); 
							?>
						</td>
						<td style="text-align:center;width:150px;height:30px;">
							<?php 
								echo $this->Html->link($busTransaction['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $busTransaction['Organization']['id'])); 
							?>
						</td>
						<td style="text-align:center;width:80px;height:30px;">
							<?php 
								echo $this->Html->link($busTransaction['BusStatus']['name'], array('controller' => 'bus_statuses', 'action' => 'view', $busTransaction['BusStatus']['id'])); 
							?>
						</td>
						<td style="text-align:center;width:80px;height:30px;">
							<?php 
								echo $this->Time->format($busTransaction['BusTransaction']['start_date'], '%d-%m-%Y'); 
							?>
						</td>
						<td style="text-align:center;width:80px;height:30px;">
							<?php 
								echo $this->Time->format($busTransaction['BusTransaction']['end_date'], '%d-%m-%Y'); 
							?>
						</td>
						<td class="actions" style="text-align:center;width:100px;height:30px;">		
							
							<?php
								echo $this->Html->link('', array('action' => 'view', $busTransaction['BusTransaction']['id']), array('class'=>'fa fa-desktop', 'style'=>'color:#000;','data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'View Details', 'escape' => false));
							?>
							
							&nbsp;&nbsp;
							
							<?php
								echo $this->Html->link('', array('action' => 'edit', $busTransaction['BusTransaction']['id']), array('class'=>'fa fa-edit', 'style'=>'color:#000;','data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Modify', 'escape' => false));
							?>
							
							&nbsp;&nbsp;
												
							<?php			
								echo $this->Form->postLink('', array('controller' => 'campaigns', 'action' => 'delete', $busTransaction['BusTransaction']['id']), array('class'=>'fa fa-trash-o', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Delete', 'escape' => false, 'confirm' => __('Are you sure you want to delete # %s?', $busTransaction['BusTransaction']['id'])));			
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
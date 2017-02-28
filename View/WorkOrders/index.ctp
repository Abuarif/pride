<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		List of Work Orders
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-external-link"></i>Home</a></li>
		<li><a href="#">Work Orders</a></li>
		<li class="active">List of Work Orders</li>
	</ol>
</section>

<section class="content">
	<!-- Custom location sessionFlash -->	
		<div style="margin-left:-14px;">
			<?php echo $this->Layout->sessionFlash(); ?>
		</div>
	<!--./location sessionFlash -->
	
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Work Order Details</h3>
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
					<?php if (!empty($workOrders)) {?>
					<table class="table table-hover">
						<tr>
							<th style="text-align:center;width:20px;height:30px;">No</th>
							<th style="text-align:center;width:50px;height:30px;">User</th>
							<!-- <th style="text-align:center;width:50px;height:30px;">Provision Bus</th> -->
							<th style="text-align:center;width:120px;height:30px;">Process State Status</th>
							<th style="text-align:center;width:120px;height:30px;">Work Order</th>
							<th style="text-align:center;width:80px;height:30px;">Actions</th>
						</tr>
					<?php 
						$page = $this->params['paging']['WorkOrder']['page'];
						$limit = $this->params['paging']['WorkOrder']['limit'];
						$counter = ($page * $limit) - $limit + 1; 
					?>
					<?php foreach ($workOrders as $workOrder): ?>
						<tr>
							<td style="text-align:center;width:20px;height:25px;">
								<?php echo h($counter); ?>
							</td>
							<td style="text-align:center;width:50px;height:25px;">
								<?php echo h($workOrder['User']['name']); ?>
							</td>
							<!-- ../temporary closed
							<td style="text-align:center;width:50px;height:30px;">
								<?php //echo h($workOrder['ProvisionBus']['id']); ?>
							</td>
							../temporary closed -->
							<td style="text-align:center;width:50px;height:30px;">
								<?php echo h($workOrder['ProcessState']['name']); ?>
							</td>
							<td style="text-align:center;width:50px;height:30px;">
								<?php echo h($workOrder['WorkOrder']['name']); ?>
							</td>
							<td style="text-align:center;width:50px;height:30px;">
									
								<?php
									echo $this->Html->link('', array('action' => 'view', $workOrder['WorkOrder']['id']), array('class'=>'fa fa-desktop', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'View', 'escape' => false));
								?>
								
								&nbsp;&nbsp;
								
								<?php
									echo $this->Html->link('', array('action' => 'edit', $workOrder['WorkOrder']['id']), array('class'=>'fa fa-edit', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Edit', 'escape' => false));
								?>	
								
								&nbsp;&nbsp;
								
								<?php
									echo $this->Html->link('', array('action' => 'spad', $workOrder['WorkOrder']['id'],  'ext' => 'pdf'), array('class'=>'fa fa-download', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Download',  'target' => '_blank', 'escape' => false));
								?>	
								
								&nbsp;&nbsp;
								
								<?php			
									echo $this->Form->postLink('', array('action' => 'delete', $workOrder['WorkOrder']['id']), array('class'=>'fa fa-trash-o', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Delete', 'escape' => false, 'confirm' => __('Are you sure you want to delete # %s?', $workOrder['WorkOrder']['id'])));			
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
										No list of work orders are available.
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
			<li><?php echo $this->Html->link(__('New Work Order'), array('action' => 'add')); ?></li>
			<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List Provision Buses'), array('controller' => 'provision_buses', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Provision Bus'), array('controller' => 'provision_buses', 'action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List Process States'), array('controller' => 'process_states', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Process State'), array('controller' => 'process_states', 'action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List Work Order Approvals'), array('controller' => 'work_order_approvals', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Work Order Approval'), array('controller' => 'work_order_approvals', 'action' => 'add')); ?> </li>
		</ul>
	</div>
	../temporary closed -->
</section>
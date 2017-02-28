<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		List of Packages
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-external-link"></i>Home</a></li>
		<li><a href="#">System Settings</a></li>
		<li class="active">List of Packages</li>
	</ol>
</section>

<section class="content">

<!-- Custom location sessionFlash -->	
    <div style="margin-left:-14px;">	
        <?php echo $this->Layout->sessionFlash(); ?>
    </div>
<!--./location sessionFlash -->


<div class="packages index">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">&nbsp;</h3>
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
						<th style="text-align:center;width:200px;height:30px;">Name</th>
						<th style="text-align:center;width:200px;height:30px;">Quantity</th>
						<th style="text-align:center;width:100px;height:30px;">Duration (Month)</th>
						<th style="text-align:center;width:100px;height:30px;">Price (RM)</th>
						<th style="text-align:center;width:100px;height:30px;">Type</th>
						<th class="actions" style="text-align:center;width:100px;height:30px;">Actions</th>
					</tr>
					<?php 
						$page = $this->params['paging']['Package']['page'];
						$limit = $this->params['paging']['Package']['limit'];
						$counter = ($page * $limit) - $limit + 1; 
						
						foreach ($packages as $package): 
					?>
					<tr>
						<td style="text-align:center;width:20px;height:25px;">
							<?php echo h($counter); ?>
						</td>
						<td style="text-align:center;width:150px;height:30px;">
							<?php echo h($package['Package']['name']); ?>
						</td>
						<td style="text-align:center;width:150px;height:30px;">
							<?php echo h($package['Package']['quantity']); ?>
						</td>
						<td style="text-align:center;width:80px;height:30px;">
							<?php echo h($package['Package']['duration']); ?>
						</td>
						<td style="text-align:center;width:80px;height:30px;">
							<?php echo h($this->Number->currency($package['Package']['price'], '')); ?>
						</td>
						<td style="text-align:center;width:80px;height:30px;">
							<?php 
								echo 
								$this->Html->link($package['ItemType']['name'], array(
													'controller' => 'item_types', 
													'action' => 'view', 
													$package['ItemType']['id']
								)); 
							?>
						</td>
						<td class="actions" style="text-align:center;width:100px;height:30px;">	
							
							<?php
								echo $this->Html->link('', array('action' => 'view', $package['Package']['id']), array('class'=>'fa fa-desktop', 'style'=>'color:#000;','data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'View Details',
								'escape' => false));
							?>
							
							&nbsp;&nbsp;
							
							<?php
								echo $this->Html->link('', array('action' => 'edit', $package['Package']['id']), array('class'=>'fa fa-edit', 'style'=>'color:#000;','data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Modify',
								'escape' => false));
							?>
														
							<?php			
								/*echo $this->Form->postLink('', array('action' => 'delete', $package['Package']['id']), array('class'=>'fa fa-trash-o', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Delete', 'escape' => false, 'confirm' => __('Are you sure you want to delete # %s?', $counter)));*/			
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
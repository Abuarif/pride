<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		List of Campaigns
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-external-link"></i>Home</a></li>
		<li><a href="#">My Campaigns</a></li>
		<li class="active">List of Campaigns</li>
	</ol>
</section>

<section class="content">

<!-- Custom location sessionFlash -->	
    <div style="margin-left:-14px;">	
        <?php echo $this->Layout->sessionFlash(); ?>
    </div>
<!--./location sessionFlash -->

<div class="campaigns index">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">My Campaigns</h3>
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
						<th style="text-align:center;width:200px;height:30px;">Advertiser Name</th>
						<th style="text-align:center;width:200px;height:30px;">Campaign Name</th>
						<th style="text-align:center;width:100px;height:30px;">In Charge Date</th>
						<th style="text-align:center;width:100px;height:30px;">Out Charge Date</th>
						<th style="text-align:center;width:100px;height:30px;">Period</th>
						<th class="actions" style="text-align:center;width:100px;height:30px;">Actions</th>
					</tr>
					<?php 
						$page = $this->params['paging']['Campaign']['page'];
						$limit = $this->params['paging']['Campaign']['limit'];
						$counter = ($page * $limit) - $limit + 1; 
					?>
					<?php foreach ($campaigns as $campaign): ?>
					<tr>
						<td style="text-align:center;width:20px;height:25px;">
							<?php echo h($counter); ?>
						</td>
						<td style="text-align:center;width:150px;height:30px;">
							<?php echo h($campaign['Campaign']['advertiser_name']); ?>
						</td>
						<td style="text-align:center;width:150px;height:30px;">
							<?php echo h($campaign['Campaign']['name']); ?>
						</td>
						<td style="text-align:center;width:80px;height:30px;">
							<?php echo $this->Time->format($campaign['Campaign']['start_date'], '%d-%m-%Y'); ?>
						</td>
						<td style="text-align:center;width:80px;height:30px;">
							<?php echo $this->Time->format($campaign['Campaign']['end_date'], '%d-%m-%Y'); ?>
						</td>
						<td style="text-align:center;width:80px;height:30px;">
							<?php 
								
								if ($campaign['Campaign']['period'] > 1) {
									$varMonth = 'Months';
								}else{
									$varMonth = 'Month';
								}
								echo h($campaign['Campaign']['period']) . '&nbsp;' . $varMonth; 
							?>
						</td>
						<td class="actions" style="text-align:center;width:100px;height:30px;">							
							<?php
								//echo $this->Html->link('', array('controller' => 'campaign_orders', 'action' => 'purchase_package', $campaign['Campaign']['id']), array('class'=>'fa fa-shopping-cart', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Purchase Package','escape' => false));
								
								//echo $this->Html->link('', array('controller' => 'packages', 'action' => 'selection', $campaign['Campaign']['id']), array('class'=>'fa fa-shopping-cart', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Purchase Package','escape' => false));
							?>				
							
							&nbsp;&nbsp;	
							
							<?php
								echo $this->Html->link('', array('action' => 'view', $campaign['Campaign']['id']), array('class'=>'fa fa-desktop', 'style'=>'color:#000;','data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'View Details',
								'escape' => false));
							?>
							
							&nbsp;&nbsp;
							
							<?php
								echo $this->Html->link('', array('action' => 'edit', $campaign['Campaign']['id']), array('class'=>'fa fa-edit', 'style'=>'color:#000;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Modify',
								'escape' => false));
							?>
							
							&nbsp;&nbsp;
							
							<?php
								echo $this->Html->link('', array('action' => 'timeline', $campaign['Campaign']['id']), array('class'=>'fa fa-clock-o', 'style'=>'color:#000;','data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'View Campaign Timeline',
								'escape' => false));
							?>
							
							&nbsp;	&nbsp;
												
							<?php			
								echo $this->Form->postLink('', array('controller' => 'campaigns', 'action' => 'delete', $campaign['Campaign']['id']), array('class'=>'fa fa-trash-o', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Delete', 'escape' => false, 'confirm' => __('Are you sure you want to delete # %s?', $counter)));			
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
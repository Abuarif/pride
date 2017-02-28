<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		List Provision Buses
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-external-link"></i>Home</a></li>
		<li><a href="#">System Settings</a></li>
		<li class="active">List Provision Buses</li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
				<?php if(!empty ($provisionBuses)) { ?>
				<div class="box-header">
					<h3 class="box-title">Provision Buses</h3>
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
					<?php if(!empty ($provisionBuses)) { ?>
					<table class="table table-hover">
						<tr>
							<th style="text-align:center;width:20px;height:30px;">No</th>
							<th style="text-align:center;width:150px;height:30px;">Depot</th>
							<th style="text-align:center;width:150px;height:30px;">Origin</th>
							<th style="text-align:center;width:120px;height:30px;">Destination</th>
							<th style="text-align:center;width:120px;height:30px;">Bus Plate Number</th>
							<th class="actions" style="text-align:center;width:30px;height:30px;">Actions</th>
						</tr>
						<?php 
							$page = $this->params['paging']['ProvisionBus']['page'];
							$limit = $this->params['paging']['ProvisionBus']['limit'];
							$counter = ($page * $limit) - $limit + 1; 
						?>
						<?php foreach ($provisionBuses as $provisionBus): ?>
						<tr>
							<td style="text-align:center;width:20px;height:25px;"><?php echo h($counter); ?></td>
							<td style="text-align:center;width:150px;height:30px;">
								<?php 
									echo $this->Html->link($provisionBus['Depot']['name'], array('controller' => 'depots', 'action' => 'view', $provisionBus['Depot']['id'])); 
								?>
							</td>
							<td style="text-align:center;width:150px;height:30px;">
								<?php 
									echo $this->Html->link($provisionBus['RouteDetail']['origin'], array('controller' => 'route_details', 'action' => 'view', $provisionBus['RouteDetail']['id']));
								?>
							</td>
							<td style="text-align:center;width:150px;height:30px;">
								<?php 
									echo $this->Html->link($provisionBus['RouteDetail']['destination'], array('controller' => 'route_details', 'action' => 'view', $provisionBus['RouteDetail']['id']));
								?>
							</td>
							<td style="text-align:center;width:120px;height:30px;"> 
								<?php 
									echo $this->Html->link($provisionBus['Bus']['name'], array('controller' => 'buses', 'action' => 'view', $provisionBus['Bus']['id'])); 
								?>
							</td>
							<td class="actions" style="text-align:center;width:30px;height:30px;">
								<?php
									echo $this->Html->link('', array('action' => 'view', $provisionBus['ProvisionBus']['id']), array('class'=>'fa fa-desktop', 'style'=>'color:#000;','data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'View',
									'escape' => false));
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
									No provision buses are available yet.
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
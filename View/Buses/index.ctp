<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		List of Buses
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-external-link"></i>Home</a></li>
		<li><a href="#">System Settings</a></li>
		<li class="active">List of Buses</li>
	</ol>
</section>

<section class="content">
	<!-- Custom location sessionFlash -->
		<div style="margin-left:-14px;">
			<?php echo $this->Layout->sessionFlash(); ?>
		</div>
	<!--./location sessionFlash -->
	
	<?php echo $this->element('Pride.search_bus'); ?>
	
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
				<?php if(!empty ($buses)) { ?>				
				<div class="box-header">
					<h3 class="box-title">Buses</h3>
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
					<?php if(!empty ($buses)) { ?>				
					
					<table class="table table-hover">
						<tr>
							<th style="text-align:center;width:20px;height:30px;">No</th>
							<th style="text-align:center;width:120px;height:30px;">Depot</th>
							<th style="text-align:center;width:350px;height:30px;">Route</th>
							<th style="text-align:center;width:120px;height:30px;">Brand</th>
							<th style="text-align:center;width:120px;height:30px;">Registration No</th>
							<th class="actions" style="text-align:center;width:30px;height:30px;">Actions</th>
						</tr>
						<?php 
							$page = $this->params['paging']['Bus']['page'];
							$limit = $this->params['paging']['Bus']['limit'];
							$counter = ($page * $limit) - $limit + 1; 
						?>
						<?php foreach ($buses as $bus): ?>
						<tr>
							<td style="text-align:center;width:20px;height:25px;">
								<?php echo h($counter); ?>
							</td>
							<td style="text-align:center;width:150px;height:30px;">
								<?php echo $this->Html->link($bus['Depot']['name'], array('controller' => 'routes', 'action' => 'view', $bus['Depot']['id'])); ?>
							</td>
							<td style="text-align:center;width:150px;height:30px;">
								<?php echo h($bus['RouteDetail']['route_number']); ?> 
									[
										<?php 
											echo $this->Html->link($bus['RouteDetail']['origin'], array('controller' => 'route_details', 'action' => 'view', $bus['RouteDetail']['id'])).'&nbsp;-&nbsp;'. 
											$this->Html->link($bus['RouteDetail']['destination'], array('controller' => 'route_details', 'action' => 'view', $bus['RouteDetail']['id'])); 
										?>
									]
							</td>
							<td style="text-align:center;width:150px;height:30px;">
								<?php echo h($bus['Bus']['brand']); ?>
							</td>
							<td style="text-align:center;width:120px;height:30px;">
								<?php echo h($bus['Bus']['registration_number']); ?>
							</td>
							<td class="actions" style="text-align:center;width:30px;height:30px;">
								<?php
									echo $this->Html->link('', array('action' => 'view', $bus['Bus']['id']), array('class'=>'fa fa-desktop', 'style'=>'color:#000;','data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'View',
									'escape' => false));
								?>	
								
								&nbsp;&nbsp;
								
								<?php
									echo $this->Html->link('', array('action' => 'edit', $bus['Bus']['id']), array('class'=>'fa fa-edit', 'style'=>'color:#000;','data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Edit',
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
									No new buses available yet.
								</div>
							</td>
						</tr>
					</table>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>

<!-- ../temporary close
<div class="panel panel-success">
  <div class="panel-heading">
	<h3 class="panel-title">
		<div class="box-title" align="center">
			<?php echo $this->Html->image('/uploads/listOrdered23.png', array('style' => 'height:22px;width:22px')).'&nbsp;'. __('Actions'); ?>
		</div>
	</h3>
  </div>
  <div class="panel-body" align="center">
	<?php
		echo
			$this->Html->image('/uploads/newBusTrans22.png', array('style' => 'height:22px;width:22px')).
			'&nbsp;&nbsp;' .
			$this->Html->link(__('New Bus'), array('action' => 'add')) . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' .
			$this->Html->image('/uploads/routeList22.png', array('style' => 'height:22px;width:22px')). '&nbsp;&nbsp;' .
			$this->Html->link(__('List Routes'), array('controller' => 'routes', 'action' => 'index')).	'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' .
			$this->Html->image('/uploads/routesNew22.png', array('style' => 'height:22px;width:22px')).
			'&nbsp;&nbsp;' .
			$this->Html->link(__('New Route'), array('controller' => 'routes', 'action' => 'add'));
			
		?>
  </div>
</div>
../temporary close -->
</section>
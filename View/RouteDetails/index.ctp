<?php if($title_for_layout == 'default') { ?>
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h1>Point of Interest</h1>
		</div>
		<div class="panel-body">
			<?php echo $this->element('Pride.search_poi_searchString'); ?>
			<?php //echo $this->element('Pride.search_poi'); ?>
			
			<?php //if (isset($lock)) echo $lock; ?>	 
			<?php if (
						//!empty($this->$routeDetails) 
						true
					 )   
				{ 
			?>
			<!------------------------------------------------------------------------------------------>
			
			<?php if(!empty($routeDetails)) {?>
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="panel panel-default">
						<!-- Default panel contents -->
						<div class="panel-heading">Route Details</div>
						
						<!-- Table -->
						<table class="table">
							<tr>
								<th style="text-align:center;width:20px;height:30px;">No</th>
								<th style="text-align:center;width:150px;height:30px;">Origin</th>
								<th style="text-align:center;width:150px;height:30px;">Destination</th>
								<th style="text-align:center;width:150px;height:30px;">Route Number</th>
							</tr>
							<?php 
								$page = $this->params['paging']['RouteDetail']['page'];
								$limit = $this->params['paging']['RouteDetail']['limit'];
								$counter = ($page * $limit) - $limit + 1;  
							?>
							<?php foreach ($routeDetails as $routeDetail): ?>
							<tr>
								<td style="text-align:center;width:20px;height:25px;">
									<?php echo h($routeDetail['RouteDetail']['id']); ?>
								</td>
								<td style="text-align:center;width:150px;height:30px;">
									<?php echo h($routeDetail['RouteDetail']['origin']); ?>
								</td>
								<td style="text-align:center;width:150px;height:30px;">
									<?php echo h($routeDetail['RouteDetail']['destination']); ?>
								</td>
								<td style="text-align:center;width:80px;height:30px;">
									<?php echo h($routeDetail['RouteDetail']['route_number']); ?>
								</td>
							</tr>
							<?php $counter++; ?>
							<?php endforeach; ?>
						</table>
					</div>
				</div>
			</div>			
				<div class="well well-sm">
					<div align="center">
						<ul class="pagination">
								<?php
							   echo $this->Paginator->prev(__('Prev'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
						   
						   echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1));
						   
						   echo $this->Paginator->next(__('Next'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
							   ?>
						</ul>
					</div>
				</div>
				<?php }else{ ?>
					<div class="panel panel-danger">
						<div class="panel-heading">
							<h3 class="panel-title">Route Details</h3>
						</div>
						<div class="panel-body" align="center">
							Your Point of Interest was no found. Please try again.
						</div>
					</div>
				<?php } ?>
			<?php } ?>
		</div>
    </div>
	
<?php }else{ ?>

<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Point of Interest (P.O.I)
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-external-link"></i>Home</a></li>
		<li><a href="#">Point of Interest (P.O.I)</a></li>
		<li class="active">Search Location</li>
	</ol>
</section>

<section class="content">
	<?php //echo $this->element('Pride.search_poi_searchString'); ?>

	<?php //if (isset($lock)) echo $lock; ?>	 
	<?php if (
				//!empty($this->$routeDetails) 
				true
			 )   
		{ 
	?>
	<!-- Results Query Table -->
	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title">Route Details</h3>
		</div>
		<div class="box-body">
				<table id="route_details" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>No</th>
							<th>Origin</th>
							<th>Destination</th>
							<th>Route Number</th>
							<?php if ($this->Session->read('Auth')) { ?>
							<th>Action</th>
							<?php } ?>
						</tr>
					</thead>			 
					<tbody>
						<?php 
							$page = $this->params['paging']['RouteDetail']['page'];
							$limit = $this->params['paging']['RouteDetail']['limit'];
							$counter = ($page * $limit) - $limit + 1;  
							
							foreach ($routeDetails as $routeDetail): 
						?>
						<tr>
							<td style="text-align:center;"><?php echo h($routeDetail['RouteDetail']['id']); ?></td>
							<td><?php echo h($routeDetail['RouteDetail']['origin']); ?></td>
							<td><?php echo h($routeDetail['RouteDetail']['destination']); ?></td>
							<td style="text-align:center;"><?php echo h($routeDetail['RouteDetail']['route_number']); ?></td>
							<?php if ($this->Session->read('Auth')) { ?>
							<td style="text-align:center;">
								<?php
									echo $this->Html->link('', array('action' => 'view', $routeDetail['RouteDetail']['id']), array('class'=>'fa fa-desktop', 'style'=>'color:#000;','data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'View',
									'escape' => false));
								?>	&nbsp;&nbsp;
								
								<?php 
								if ($this->Session->read('Auth.User.Role.alias') != Configure::read('AMS.role_pride_advertiser') ) { 

									echo $this->Html->link('', array('action' => 'create_route', $routeDetail['RouteDetail']['id'], $routeDetail['RouteDetail']['route_number']), array('class'=>'fa fa-gears', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Configure Map', 'escape' => false));
								
								} else {

									echo $this->Html->link('', array('action' => 'view_route', $routeDetail['RouteDetail']['id'], $routeDetail['RouteDetail']['route_number']), array('class'=>'fa fa-globe', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'View Map', 'escape' => false));

								} ?>
							</td>
							<?php } ?>
						</tr>
						<?php $counter++; ?>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
		<!-- End Results Query Table -->
	<?php } ?>
</section>
<?php } ?>
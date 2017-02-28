<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Route Details
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-external-link"></i>Home</a></li>
		<li><a href="#">Point of Interest (P.O.I)</a></li>
		<li class="active">Route Details</li>
	</ol>
</section>

<section class="content">
	<!-- Multiple Tab -->
	<div class="nav-tabs-custom">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#tab_1-1" data-toggle="tab">Details</a></li>
			<li class=""><a href="#tab_2-2" data-toggle="tab">Route Way</a></li>	
			<li class=""><a href="#tab_3-3" data-toggle="tab">List of Buses</a></li>	
			<!-- <li class=""><a href="#tab_4-4" id="map-tab" data-toggle="tab">Interactive Map</a></li> -->	
		</ul>
		<div class="tab-content">
			<div class="tab-pane active" id="tab_1-1">
				<div class="box box-primary">
					<div class="box-body table-responsive no-padding">
						<table class="table table-hover">
							<tr>
								<th style="width:130px;">Depot</th>
								<td style="width:30px;">:</td>
								<td><?php echo h($routeDetail['RouteDetail']['depot_present']); ?></td>
							</tr>
							<tr>
								<th>Route Number</th>
								<td>:</td>
								<td><?php echo h($routeDetail['RouteDetail']['route_number']); ?></td>
							</tr>
							<tr>
								<th>Origin</th>
								<td>:</td>
								<td><?php echo h($routeDetail['RouteDetail']['origin']); ?></td>
							</tr>
							<tr>
								<th>Destination</th>
								<td>:</td>
								<td><?php echo h($routeDetail['RouteDetail']['destination']); ?></td>
							</tr>
						</table>
					</div>
				</div>
			</div><!-- /.tab-pane -->
			<div class="tab-pane" id="tab_2-2">
				<div class="box box-primary">
					<div class="box-body table-responsive no-padding">
						<table class="table table-hover">
							<tr>
								<td style="text-align:center;width:50%;height:30px;">Route Way 1</td>
								<td style="text-align:center;width:50%;height:30px;">Route Way 2</td>
							</tr>
							<tr>
								<td>
									<?php echo h($routeDetail['RouteDetail']['route_way_1']); ?>
								</td>
								<td>
									<?php echo h($routeDetail['RouteDetail']['route_way_2']); ?>
								</td>
							</tr>
							<?php if ((isset($routeDetail['RouteDetail']['map']) && $routeDetail['RouteDetail']['map'] != '')) { ?>
							<tr>
								<td style="text-align:center;height:30px;" colspan=4>
									<?php 
										//echo $routeDetail['RouteDetail']['map']; 
										echo $this->Html->image($routeDetail['RouteDetail']['map'], array('width' => '80%')); 
									?>
								</td>
							</tr>
							<?php } ?>
						</table>
					</div>
				</div>
			</div><!-- /.tab-pane -->
			<div class="tab-pane" id="tab_3-3">
				<div class="box box-primary">
					<div class="box-body table-responsive no-padding">
					
						<table class="table table-hover">
							<tr>
									<th style="text-align:center;width:20px;height:30px;">No</th>
									<th style="text-align:center;width:50px;height:30px;">Brand</th>
									<th style="text-align:center;width:50px;height:30px;">Model</th>
									<th style="text-align:center;width:50px;height:30px;">Graphics</th>
									<th style="text-align:center;width:50px;height:30px;">Registration Number</th>
							</tr>
							<?php $counter = 1; ?>
							<?php foreach ($routeDetail['Bus'] as $bus): ?>
							<?php
								// get brand data
								$model = 'Not specified';
								$viewImage = 'Not specified';
								$aiImage = 'Not specified';
								if ($bus['brand_id'] != 0) {
									$brand = $this->requestAction('/pride/brands/get_brand/'. $bus['brand_id']);
									$model = $brand['Brand']['model'];
									$viewImage = $this->Html->link('[Preview]', "/templates/".$brand['Brand']['files'], array('target' => '_blank')); 
									$aiImage = $this->Html->link('[Download Template]', "/templates/".$brand['Brand']['src_files'], array('target' => '_blank')); 
								}
							?>
							<tr>
								<td style="text-align:center;width:20px;height:30px;">
									<?php echo h($counter); ?>
								</td>
								<td style="text-align:center;width:50px;height:30px;"><?php echo h($bus['brand']); ?>&nbsp;</td>
								<td style="text-align:center;width:50px;height:30px;"><?php echo h($model); ?>&nbsp;</td>
								<td style="text-align:center;width:50px;height:30px;"><?php echo $viewImage; ?>&nbsp;<?php echo $aiImage; ?></td>
								<td style="text-align:center;width:50px;height:30px;"><?php echo h($bus['registration_number']); ?>&nbsp;</td>
								
							</tr>
							<?php $counter++; ?>
							<?php endforeach; ?>
						</table>
					</div>
				</div>
			</div><!-- /.tab-pane -->
			<!-- <div class="tab-pane" id="tab_4-4">
				<div>
					<div class="box-body table-responsive no-padding">
						<?php //echo $this->element('Pride.view_googlemap'); ?>
					</div>
				</div>
			</div> -->
			</div>
			<?php //if(empty($routeDetail['PoiCart'])) { ?>
			<div class="panel-footer">
				<div class="span12" align="center">
					<?php
						echo $this->Html->link($this->Form->button('Save Location', array('class'=>'btn btn-primary', 'style'=>'color:#fff;')), array('plugin' => 'pride', 'controller' => 'poi_carts','action' => 'add_cart', $routeDetail['RouteDetail']['depot_id'], $routeDetail['RouteDetail']['id'], $routeDetail['RouteDetail']['route_number']), array('escape'=>false));
					?>				
				</div>
			</div>
	</div>	
	<!-- End Multiple Tab -->

	<!--/.temporary closed 
	<div class="actions">
		<h3><?php echo __('Actions'); ?></h3>
		<ul>
			<li><?php echo $this->Html->link(__('Edit Route Detail'), array('action' => 'edit', $routeDetail['RouteDetail']['id'])); ?> </li>
			<li><?php echo $this->Form->postLink(__('Delete Route Detail'), array('action' => 'delete', $routeDetail['RouteDetail']['id']), array(), __('Are you sure you want to delete # %s?', $routeDetail['RouteDetail']['id'])); ?> </li>
			<li><?php echo $this->Html->link(__('List Route Details'), array('action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Route Detail'), array('action' => 'add')); ?> </li>
		</ul>
	</div>
	/.temporary closed-->
</section>
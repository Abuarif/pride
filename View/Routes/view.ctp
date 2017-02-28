<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Route
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-external-link"></i>Home</a></li>
		<li><a href="#">Route Management</a></li>
		<li class="active">Route</li>
	</ol>
</section>

<section class="content">
	<!-- Multiple Tab -->
	<div class="nav-tabs-custom">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#tab_1-1" data-toggle="tab">Details</a></li>
			<li class=""><a href="#tab_2-2" data-toggle="tab">Route Way</a></li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane active" id="tab_1-1">
				<div class="box box-primary">
					<div class="box-body table-responsive no-padding">
						<table class="table table-hover">
							<tr>
								<th style="width:130px;">Depot</th>
								<td style="width:30px;">:</td>
								<td><?php echo h($route['Depot']['name']); ?></td>
							</tr>
							<tr>
								<th style="width:130px;">Depot Number</th>
								<td style="width:30px;">:</td>
								<td>
									<?php echo h($route['Depot']['depot_number']); ?>
								</td>
							</tr>
							<tr>
								<th>Route Number</th>
								<td>:</td>
								<td><?php echo h($route['Route']['route_number']); ?></td>
							</tr>
							<tr>
								<th>Origin</th>
								<td>:</td>
								<td><?php echo h($route['Route']['origin']); ?></td>
							</tr>
							<tr>
								<th>Destination</th>
								<td>:</td>
								<td><?php echo h($route['Route']['destination']); ?></td>
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
									<?php echo h($route['Route']['route_way_1']); ?>
								</td>
								<td>
									<?php echo h($route['Route']['route_way_2']); ?>
								</td>
							</tr>
							<?php if ((isset($route['Route']['map']) && $route['Route']['map'] != '')) { ?>
							<tr>
								<td style="text-align:center;height:30px;" colspan=4>
									<?php 
										//echo $route['RouteDetail']['map']; 
										echo $this->Html->image($route['Route']['map'], array('width' => '80%')); 
									?>
								</td>
							</tr>
							<?php } ?>
						</table>
					</div>
				</div>
			</div><!-- /.tab-pane -->
		</div><!-- /.tab-content -->
	</div>	
	<!-- End Multiple Tab -->
</section>
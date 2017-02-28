<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Bus Calendar Details
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-external-link"></i>Home</a></li>
		<li><a href="#">List of Bus Calendar</a></li>
		<li class="active">Bus Calendar Details</li>
	</ol>
</section>

<section class="content">
<!-- Organization Details -->
	<div class="box box-primary">
		<div class="box-header">
		</div>
		<div class="box-body table-responsive no-padding">
			<table class="table table-hover">
				<tr>
					<th style="width:110px;">Bus</th>
					<td style="width:30px;">:</td>
					<td>
						<?php 
							echo $this->Html->link($busTransaction['Bus']['name'], array('controller' => 'buses', 'action' => 'view', $busTransaction['Bus']['id'])); 
						?>
					</td>
				</tr>
				<tr>
					<th>Organization</th>
					<td>:</td>
					<td>
						<?php 
							echo $this->Html->link($busTransaction['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $busTransaction['Organization']['id'])); 
						?>
					</td>
				</tr>
				<tr>
					<th>Bus Status</th>
					<td>:</td>
					<td>
						<?php 
							echo $this->Html->link($busTransaction['BusStatus']['name'], array('controller' => 'bus_statuses', 'action' => 'view', $busTransaction['BusStatus']['id'])); 
						?>
					</td>
				</tr>
				<tr>
					<th>Start Date</th>
					<td>:</td>
					<td>
						<?php 
							echo $this->Time->format($busTransaction['BusTransaction']['start_date'], '%d-%m-%Y'); 
						?>
					</td>
				</tr>
				<tr>
					<th>End Date</th>
					<td>:</td>
					<td>
						<?php 
							echo $this->Time->format($busTransaction['BusTransaction']['end_date'], '%d-%m-%Y'); 
						?>
					</td>
				</tr>
				<tr>
					<th>Comments</th>
					<td>:</td>
					<td>
						<?php echo $busTransaction['BusTransaction']['comments']; ?>
					</td>
				</tr>
			</table>
		</div>
	</div>
<!-- End Organization Details -->
</section>
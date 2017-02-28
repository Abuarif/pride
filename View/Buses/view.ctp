<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Bus
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-external-link"></i>Home</a></li>
		<li><a href="#">List Provision Buses</a></li>
		<li class="active">Bus</li>
	</ol>
</section>

<section class="content">
<!-- Bus Details -->
	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title">Bus Details</h3>
			<div class="box-tools">
			</div>
		</div>
		<div class="box-body table-responsive no-padding">
			<table class="table table-hover">
				<tr>
					<th style="width:130px;">Origin</th>
					<td style="width:30px;">:</td>
					<td><?php echo h($bus['RouteDetail']['origin']); ?></td>
				</tr>
				<tr>
					<th>Destination</th>
					<td>:</td>
					<td><?php echo h($bus['RouteDetail']['destination']); ?></td>
				</tr>
				<tr>
					<th>Bus Brand</th>
					<td>:</td>
					<td><?php echo h($bus['Bus']['brand']); ?></td>
				</tr>
				<tr>
					<th>Bus Model</th>
					<td>:</td>
					<td><?php echo h($bus['Brand']['model']); ?></td>
				</tr>
				<tr>
					<th>Bus Plate Number</th>
					<td>:</td>
					<td><?php echo h($bus['Bus']['registration_number']); ?></td>
				</tr>
			</table>
		</div>
	</div>
<!-- End Bus Details -->
</section>
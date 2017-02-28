<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Bus Brand & Model Details
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-sign-in"></i>Home</a></li>
		<li><a href="#">List of Bus Brand & Model</a></li>
		<li class="active">Bus Brand & Model Details</li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
				<div class="box-body table-responsive no-padding">
					<table class="table table-hover">
						<tr>
							<th style="width:130px;">Brand Name</th>
							<td style="width:30px;">:</td>
							<td>
								<?php echo h($brand['Brand']['name']); ?>
							</td>
						</tr>
						<tr>
							<th>Brand Model</th>
							<td>:</td>
							<td>
								<?php echo h($brand['Brand']['model']); ?>
							</td>
						</tr>
						<tr>
							<th>File</th>
							<td>:</td>
							<td>
								<?php
									echo $this->Html->link('Preview Graphic', "/templates/".$brand['Brand']['files'], array('target' => '_blank', 'escape' => false));	
								?>
							</td>
						</tr>
						<tr>
							<th>Source File</th>
							<td>:</td>
							<td>
								<?php
									echo $this->Html->link('Download Graphic', "/templates/".$brand['Brand']['src_files'], array('target' => '_blank', 'escape' => false));	
								?>
							</td>
						</tr>
					</table>
				</div><!-- /.box-body -->
			</div><!-- /.box -->
		</div>
	</div>
</section>
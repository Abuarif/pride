<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		View Advice Type
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-sign-in"></i>Home</a></li>
		<li><a href="#">Payment Advice Types</a></li>
		<li class="active">View Advice Type</li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
				<div class="box-body table-responsive no-padding">
					<table class="table table-hover">
						<tr>
							<th style="width:70px;">Name</th>
							<td style="width:30px;">:</td>
							<td>
								<?php
									echo h($adviceType['AdviceType']['name']);
								?>
							</td>
						</tr>
						<tr>
							<th>Status</th>
							<td>:</td>
							<td>
								<?php 
									echo h($adviceType['AdviceType']['status']);
								?>
							</td>
						</tr>
					</table>
				</div><!-- /.box-body -->
			</div><!-- /.box -->
		</div>
	</div>
</section>
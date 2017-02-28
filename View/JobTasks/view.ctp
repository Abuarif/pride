<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Job Task Details
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-sign-in"></i>Home</a></li>
		<li><a href="#">Job Task</a></li>
		<li class="active">Job Task Details</li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
				<div class="box-body table-responsive no-padding">
					<table class="table table-hover">
						<tr>
							<th style="width:130px;">Installation Date</th>
							<td style="width:30px;">:</td>
							<td>
								<?php
									if($jobTask['JobTask']['installation_date'] == '0000-00-00 00:00:00') {
										echo '';
									}else{
										echo $this->Time->format($jobTask['JobTask']['installation_date'], '%d-%m-%Y');
									}
								?>
							</td>
						</tr>
						<tr>
							<th>Puspakom Date</th>
							<td style="width:30px;">:</td>
							<td>
								<?php
									if($jobTask['JobTask']['puspakom_date'] == '0000-00-00') {
										echo '';
									}else{
										echo $this->Time->format($jobTask['JobTask']['puspakom_date'], '%d-%m-%Y');
									}
								?>
							</td>
						</tr>
						<tr>
							<th>Comment</th>
							<td style="width:30px;">:</td>
							<td>
								<?php
									echo $jobTask['JobTask']['notes'];
								?>
							</td>
						</tr>
						<tr>
							<th>File Evidence</th>
							<td>:</td>
							<td>
								<?php
									if(!empty($jobTask['JobTask']['files'])) {
										echo $this->Html->link('Download', "/jobs/".$jobTask['JobTask']['files'], array('target' => '_blank'));
									}
									
								?>
							</td>
						</tr>
						<tr>
							<th>Last Updated</th>
							<td>:</td>
							<td>
								<?php
									echo $this->Time->niceShort($jobTask['JobTask']['updated']) . ' ' . date('A', strtotime($jobTask['JobTask']['updated']));
								?>
							</td>
						</tr>
					</table>
				</div><!-- /.box-body -->
				
				<div class="panel-footer">
					<div class="span12" align="center">
						<?php
							echo $this->Html->link($this->Form->button('Back', array('class'=>'btn btn-danger', 'style'=>'color:#fff;')), array('controller' => 'jobs', 'action' => 'view', $jobTask['Job']['id'], '#' => 'tab_2-2'), array('escape'=>false));
						?>
					</div>
				</div>
				
			</div><!-- /.box -->
		</div>
	</div>
</section>
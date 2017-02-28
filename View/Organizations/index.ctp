<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		New Submissions
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-external-link"></i>Home</a></li>
		<li><a href="#">Advertisers</a></li>
		<li class="active">New Submissions</li>
	</ol>
</section>

<section class="content">
	<!-- Custom location sessionFlash -->
		<div style="margin-left:-14px;">
			<?php echo $this->Layout->sessionFlash(); ?>
		</div>
	<!--./location sessionFlash -->
	
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
				<?php if(!empty ($organizations)) { ?>
				<div class="box-header">
					<h3 class="box-title">Organization Details</h3>
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
					<?php if(!empty ($organizations)) { ?>
					<table class="table table-hover">
						<tr>
							<th style="text-align:center;width:20px;height:30px;">No</th>
							<th style="text-align:left;width:150px;height:30px;">Name</th>
							<th style="text-align:center;width:150px;height:30px;">Contact Person</th>
							<th style="text-align:center;width:120px;height:30px;">Contact Number</th>
							<th class="actions" style="text-align:center;width:30px;height:30px;">Actions</th>
						</tr>
						<?php 
							$page = $this->params['paging']['Organization']['page'];
							$limit = $this->params['paging']['Organization']['limit'];
							$counter = ($page * $limit) - $limit + 1; 
						?>
						<?php foreach ($organizations as $organization): ?>
						<tr>
							<td style="text-align:center;width:20px;height:25px;"><?php echo h($counter); ?></td>
							<td style="text-align:left;width:150px;height:30px;"><?php echo h($organization['Organization']['name']); ?>&nbsp;</td>
							<td style="text-align:center;width:150px;height:30px;"><?php echo h($organization['Organization']['contact_person']); ?>&nbsp;</td>
							<td style="text-align:center;width:120px;height:30px;"><?php echo h($organization['Organization']['contact_number']); ?>&nbsp;</td>
							<td class="actions" style="text-align:center;width:30px;height:30px;">
								<?php
									echo $this->Html->link('', array('action' => 'approval_preview', $organization['Organization']['id']), array('class'=>'fa fa-desktop', 'style'=>'color:#000;','data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Approval Preview',
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
									No new submissions available yet.
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
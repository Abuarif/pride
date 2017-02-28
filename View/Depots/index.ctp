<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		List Depots
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-external-link"></i>Home</a></li>
		<li><a href="#">System Settings</a></li>
		<li class="active">List Depots</li>
	</ol>
</section>

<section class="content">
	<!-- List of Depots -->
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
				<?php if(!empty ($depots)) { ?>
				<div class="box-header">
					<h3 class="box-title">Depot Details</h3>
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
					<?php if(!empty ($depots)) { ?>
					<table class="table table-hover">
						<tr>
							<th style="text-align:center;width:20px;height:30px;">No</th>
							<th style="text-align:center;width:50px;height:30px;">Depot</th>
							<th style="text-align:center;width:50px;height:30px;">Depot No</th>
							<th style="text-align:center;width:50px;height:30px;">Actions</th>
						</tr>
						<?php 
							$page = $this->params['paging']['Depot']['page'];
							$limit = $this->params['paging']['Depot']['limit'];
							$counter = ($page * $limit) - $limit + 1; 
						?>
						<?php foreach ($depots as $depot): ?>
						<tr>
							<td style="text-align:center;width:20px;height:25px;"><?php echo h($counter); ?></td>
							<td style="text-align:center;width:150px;height:30px;"><?php echo h($depot['Depot']['name']); ?></td>
							<td style="text-align:center;width:150px;height:30px;"><?php echo h($depot['Depot']['depot_number']); ?></td>
							<td class="actions" style="text-align:center;width:30px;height:30px;">
								
								<?php
									echo $this->Html->link('', array('action' => 'view', $depot['Depot']['id']), array('class'=>'fa fa-desktop', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'View', 'escape' => false));
								?>
																	
								&nbsp;&nbsp;
								
								<?php
									echo $this->Html->link('', array('action' => 'edit', $depot['Depot']['id']), array('class'=>'fa fa-edit', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Edit', 'escape' => false));
								?>
																	
								&nbsp;&nbsp;
								
								<?php			
									echo $this->Form->postLink('', array('action' => 'delete', $depot['Depot']['id']), array('class'=>'fa fa-trash-o', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Delete', 'escape' => false, 'confirm' => __('Are you sure you want to delete # %s?', $depot['Depot']['id'])));			
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
									No new depots available yet.
								</div>
							</td>
						</tr>
					</table>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
	<!-- End List of Depots -->
</section>
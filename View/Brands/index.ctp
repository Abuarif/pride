<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		List of Bus Brand & Model
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-external-link"></i>Home</a></li>
		<li><a href="#">System Settings</a></li>
		<li class="active">List of Bus Brand & Model</li>
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
				<div class="box-header">
					<h3 class="box-title">Bus Brand & Model Details</h3>
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
				<div class="box-body table-responsive no-padding">
					<?php if (!empty($brands)) {?>
					<table class="table table-hover">
						<tr>
							<th style="text-align:center;width:20px;height:30px;">No</th>
							<th style="text-align:center;width:120px;height:30px;">Name</th>
							<th style="text-align:center;width:120px;height:30px;">Model</th>
							<th style="text-align:center;width:50px;height:30px;">File</th>
							<th style="text-align:center;width:50px;height:30px;">Source File</th>
							<th style="text-align:center;width:80px;height:30px;">Actions</th>
						</tr>
					<?php 
						$page = $this->params['paging']['Brand']['page'];
						$limit = $this->params['paging']['Brand']['limit'];
						$counter = ($page * $limit) - $limit + 1; 
					?>
					<?php foreach ($brands as $brand): ?>
						<tr>
							<td style="text-align:center;width:20px;height:25px;">
								<?php echo h($counter); ?>
							</td>
							<td style="text-align:center;width:120px;height:25px;">
								<?php echo h($brand['Brand']['name']); ?>
							</td>
							<td style="text-align:center;width:120px;height:30px;">
								<?php echo h($brand['Brand']['model']); ?>
							</td>
							<td style="text-align:center;width:50px;height:30px;">
								<?php 
									if(!empty($brand['Brand']['files'])) {
										
										echo $this->Html->link('', "/templates/".$brand['Brand']['files'], array('class'=>'fa fa-picture-o', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Preview Graphic', 'target' => '_blank', 'escape' => false));				
										
									}else{
										echo 'Not available';
									}
								?>
							</td>
							<td style="text-align:center;width:50px;height:30px;">
								<?php 
									if(!empty($brand['Brand']['src_files'])) {
										
										echo $this->Html->link('', "/templates/".$brand['Brand']['src_files'], array('class'=>'fa fa-cloud-download', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Download Graphic', 'target' => '_blank', 'escape' => false));	
										
									}else{
										echo 'Not available';
									}
								?>
							</td>
							<td style="text-align:center;width:50px;height:30px;">
									
								<?php
									echo $this->Html->link('', array('action' => 'view', $brand['Brand']['id']), array('class'=>'fa fa-desktop', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'View', 'escape' => false));
								?>
								
								&nbsp;&nbsp;
								
								<?php
									echo $this->Html->link('', array('action' => 'edit', $brand['Brand']['id']), array('class'=>'fa fa-edit', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Edit', 'escape' => false));
								?>			
								
								&nbsp;&nbsp;
								
								<?php			
									echo $this->Form->postLink('', array('action' => 'delete', $brand['Brand']['id']), array('class'=>'fa fa-trash-o', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Delete', 'escape' => false, 'confirm' => __('Are you sure you want to delete # %s?', $brand['Brand']['id'])));			
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
										No list of buses & models are available.
									</div>
								</td>
							</tr>
					</table>
					
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
	
	<!-- ../temporary closed
	<div class="actions">
		<h3><?php echo __('Actions'); ?></h3>
		<ul>
			<li><?php echo $this->Html->link(__('New Brand'), array('action' => 'add')); ?></li>
			<li><?php echo $this->Html->link(__('List Buses'), array('controller' => 'buses', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Bus'), array('controller' => 'buses', 'action' => 'add')); ?> </li>
		</ul>
	</div>
	../temporary closed -->
</section>